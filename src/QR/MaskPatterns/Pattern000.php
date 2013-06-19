<?php

namespace QR\MaskPatterns;

class Pattern000 implements MaskPatternInterface {
    public function isReversed($i, $j) {
        return ($i + $j) % 2 == 0;
    }
    
    public function getReference() {
        return '000';
    }
}