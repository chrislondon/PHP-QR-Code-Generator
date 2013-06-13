<?php

namespace QR\MaskPatterns;

class Pattern010 implements MaskPatternInterface {
    public function isReversed($i, $j) {
        return $j % 3 == 0;
    }
}