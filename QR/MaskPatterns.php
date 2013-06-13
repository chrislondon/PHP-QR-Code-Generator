<?php

namespace QR;

use QR\MaskPatterns\MaskPatternInterface;

class MaskPatterns {
    /** Mask patterns */
    const MASK_000 = 0; // (i + j) % 2 = 0
    const MASK_001 = 1; // i % 2 = 0
    const MASK_010 = 2; // j % 3 = 0
    const MASK_011 = 3; // (i + j) % 3 = 0
    const MASK_100 = 4; // ((i / 2) + (j / 3)) % 2 = 0
    const MASK_101 = 5; // (i * j) % 2 + (i * j) % 3 = 0
    const MASK_110 = 6; // ((i * j) % 2 + (i * j) % 3) % 2 = 0
    const MASK_111 = 7; // ((i * j) % 3 + (i * j) % 2) % 2 = 0
    
    protected $masks = array();
    
    public function __construct() {
        $obj = new \ReflectionClass($this);
        
        foreach ($obj->getConstants() as $const => $key) {
            $pattern = 'QR\MaskPatterns\Pattern' . substr($const, -3);
            
            $this->masks[$key] = new $pattern();
        }
    }
    
    public function getBest($code) {
        $bestPenalty = $bestMask = null;
        
        foreach ($this->masks as $mask) {
            $tempCode = $this->applyMask($code, $mask);
            $penalty = $this->calculatePenalties($tempCode);
            
            if (is_null($bestMask) || $bestPenalty > $penalty) {
                $bestPenalty = $penalty;
                $bestMask = $mask;
            }
        }
        
        return $bestMask;
    }
    
    public function applyMask($code, MaskPatternInterface $pattern) {
        foreach ($code as $j => $row) {
            foreach ($row as $i => $module) {
                if (!is_null($code[$j][$i]) && $pattern->isReversed($i, $j)) {
                    $code[$j][$i] = $module ? 0 : 1;
                }
            }
        }
        
        return $code;
    }
    
    public function calculatePenalties($code) {
        // TODO calculate penalties
        return 0;
    }
}
