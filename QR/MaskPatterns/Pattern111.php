<?php

namespace QR\MaskPatterns;

class Pattern111 implements MaskPatternInterface {
    public function isReversed($i, $j) {
        return (($i * $j) % 3 + ($i + $j) % 2) % 2 == 0;
    }
}