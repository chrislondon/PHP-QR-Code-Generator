<?php

namespace QR\MaskPatterns;

/**
 * Interface for masking patterns
 */
interface MaskPatternInterface {
    /**
     * Return true if the module at the coordinates $i, $j is to be reversed
     * 
     * @param int $i
     * @param int $j
     */
    public function isReversed($i, $j);
    public function getReference();
}