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
     * Abstract function that returns whether or not a given string is valid for
     * the character set
     * 
     * @param string $string data string being encoded
     * @return boolean
     */
    abstract function matches($string);
    
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
}