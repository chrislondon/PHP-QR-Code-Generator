<?php

namespace QR\ErrorCorrections;

abstract class CorrectionAbstract {
    protected $dataCodeWords = array();
        
    abstract public function getLevel();  
    abstract public function getIndicator();
    
    /**
     * Returns the charset codeword count
     */
    public function getDataCodeWordCount($version) {
        return $this->dataCodeWords[$version];
    }
}