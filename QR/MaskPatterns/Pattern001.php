<?php

namespace QR\MaskPatterns;

class Pattern001 implements MaskPatternInterface {
    public function isReversed($i, $j) {
        return $i % 2 == 0;
    }
}