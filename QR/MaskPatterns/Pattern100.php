<?php

namespace QR\MaskPatterns;

class Pattern100 implements MaskPatternInterface {
    public function isReversed($i, $j) {
        return (($i / 2) + ($j / 3)) % 2 == 0;
    }
}