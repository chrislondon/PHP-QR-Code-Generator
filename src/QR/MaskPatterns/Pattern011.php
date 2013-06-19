<?php

namespace QR\MaskPatterns;

class Pattern011 implements MaskPatternInterface {
    public function isReversed($i, $j) {
        return ($i + $j) % 3 == 0;
    }
    
    public function getReference() {
        return '011';
    }
}