<?php

namespace QR;

/**
 * Class for holding onto the 2D matrix modules
 */
class Matrix {
    /**
     * Size of the array
     * 
     * @var int
     */
    protected $size;
    
    /**
     * Version of the array
     * 
     * @var int
     */
    protected $version;
    
    /**
     * 2D array that holds the matrix. NEO!
     * 
     * @var array
     */
    protected $matrix = array();
    
    /**
     * Create a new matrix. If param is an int then it's a blank matrix of that
     * version size. If it's a 2D array then set that as the matrix
     * 
     * @param int|array $versionOrArray
     */
    public function __construct($versionOrArray) {
        if (is_array($versionOrArray)) {
            $this->setSize(count($versionOrArray));
            $this->matrix = $versionOrArray;
        } else {
            $size = $this->setVersion($versionOrArray)->getSize();
            $this->matrix = array_fill(0, $size, array_fill(0, $size, null));
        }
    }
    
    /**
     * Get size of the matrix
     * 
     * @return int
     */
    public function getSize() {
        return $this->size;
    }
    
    /**
     * Set the size and version of the matrix
     * 
     * @param int $size
     * @return \QR\Matrix
     */
    public function setSize($size = null) {
        $this->version = ($size - 17) / 4;
        $this->size    = $size;
        
        return $this;
    }
    
    /**
     * Get the version for the matrix
     * 
     * @return int
     */
    public function getVersion() {
        return $this->version;
    }
    
    /**
     * Set the version for the matrix
     * 
     * @param int $version
     * @return \QR\Matrix
     */
    public function setVersion($version) {
        $this->version = $version;
        $this->size    = 17 + ($version * 4);
        
        return $this;
    }
    
    /**
     * Add a two dimensional pattern to the matrix
     * 
     * @param array $pattern pattern to add
     * @param int $i row to start adding the pattern
     * @param int $j column to start adding the pattern
     * @param bool $centered if the pattern's i/j is the center or top left
     * @return \QR\Matrix
     */
    public function addPattern($pattern, $i, $j, $centered = false) {
        if ($centered) {
            // If the pattern is centered then move the i/j to the top left
            $i -= floor(count($pattern) / 2);
            $j -= floor(count($pattern[0]) / 2);
        }
        
        foreach ($pattern as $i1 => $a) {
            if (!is_array($a)) {
                // If the pattern is a 1D array then mark the code
                $this->markCode($i, $i1 + $j, $a);
            } else {
                // The pattern is a 2D array so we need to loop through those too.
                foreach ($a as $j1 => $b) {
                    $this->markCode($i1 + $i, $j1 + $j, $b);
                }
            }
        }
        return $this;
    }
    
    /**
     * Mark an individual module on the Matrix
     * 
     * @param int $i row to place module
     * @param int $j column to place module
     * @param int $value value wither 0 or 1
     * @return \QR\Matrix
     */
    public function markCode($i, $j, $value) {
        if ($i >= 0 && $j >= 0 && $i < $this->size && $j < $this->size) {
            // Only mark the matrix if it fits in the matrix
            $this->matrix[$i][$j] = $value;
        }        
        
        return $this;
    }
    
    /**
     * Get an individual module from the matrix
     * 
     * @param int $i row to get module
     * @param int $j column to get module
     * @return int
     */
    public function get($i, $j) {
        return $this->matrix[$i][$j];
    }
    
    /**
     * Get entire matrix as 2D array
     * 
     * @return array
     */
    public function getArray() {
        return $this->matrix;
    }
    
    /**
     * Merge another matrix onto this one
     * 
     * @param \QR\Matrix $matrix
     */
    public function mergeCodes(Matrix $matrix) {
        foreach ($matrix->getArray() as $i => $row) {
            foreach ($row as $j => $val) {
                if (!is_null($val)) {
                    $this->matrix[$i][$j] = $val;
                }
            }
        }
    }
}