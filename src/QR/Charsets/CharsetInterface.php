<?php

namespace QR\Charsets;

abstract class CharsetInterface {
    protected $versionCount = array();
    
    abstract function matches($string);
    
    public function getBestVersion($string, $errorCode) {
        $length = strlen($string);
        
        foreach ($this->versionCount as $version => $countArray) {
            if ($countArray[$errorCode] >= $length) {
                return $version;
            }
        }
    }
}