<?php

namespace QR\MaskPatterns;

class Pattern101 implements MaskPatternInterface {
    public function isReversed($i, $j) {
        return ($i * $j) % 2 + ($i * $j) % 3 == 0;
    }
    
    public function getReference() {
        return '101';
    }
}