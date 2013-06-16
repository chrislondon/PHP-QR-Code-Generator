<?php

namespace QR\MaskPatterns;

class Pattern110 implements MaskPatternInterface {
    public function isReversed($i, $j) {
        return (($i * $j) % 2 + ($i * $j) % 3) % 2 == 0;
    }
}