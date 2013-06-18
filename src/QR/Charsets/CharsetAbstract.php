<?php

namespace QR\Charsets;

abstract class CharsetAbstract {
    /**
     * Array that contains the maximum amount of characters for a given ECL
     * 
     * @var array
     */
    protected $versionCount = array();
    
    /**
     * String of binary that represents the mode
     * 
     * @var string
     */
    protected $modeIndicator = '';
    
    /**
     * Array of the number of codewords for a give version/ecl
     * 
     * @var int
     */
    protected $codewordCounts = array();
    
    /**
     * Abstract function that returns whether or not a given string is valid for
     * the character set
     * 
     * @param string $string data string being encoded
     * @return boolean
     */
    abstract function matches($string);
    
    /**
     * Abstract function that returns the number of bits in the character count
     * 
     * @param int $version
     * @return int
     */
    abstract function getCharacterCountBits($version);
    
    /**
     * For a given strign and ECL find the best version using the versionCount
     * array
     * 
     * @param string $string data string being encoded
     * @param ErrorCorrection::ECL_* $errorCode ECL
     * @return int version number
     */
    public function getBestVersion($string, $errorCode) {
        $length = strlen($string);
        
        foreach ($this->versionCount as $version => $countArray) {
            if ($countArray[$errorCode] >= $length) {
                return $version;
            }
        }
    }
    
    /**
     * Returns the mode indicator based on Charset class
     * 
     * @return string
     */
    public function getModeIndicator() {
        return $this->modeIndicator;
    }
    
    /**
     * Returns the charset codeword count
     */
    public function getCodeWordCount($version) {
        return $this->codewordCounts[$version];
    }
}