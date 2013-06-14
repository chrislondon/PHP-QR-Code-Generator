<?php

namespace QR;

use QR\Code;
use QR\MaskPatterns\MaskPatternInterface;
use ReflectionClass;

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

    public static function getMasks() {
        $masks = array();
        $obj = new ReflectionClass('QR\\MaskPatterns');
        
        foreach ($obj->getConstants() as $const => $key) {
            $pattern = 'QR\MaskPatterns\Pattern' . substr($const, -3);
            
            $masks[$key] = new $pattern();
        }
        
        return $masks;
    }
    
    public static function setBest(Code &$code) {
        $bestPenalty = $bestMask = null;
        
        foreach (self::getMasks() as $mask) {
            $tempCode = self::applyMask($code, $mask);
            $penalty = self::calculatePenalties($tempCode);
            
            if (is_null($bestMask) || $bestPenalty > $penalty) {
                $bestPenalty = $penalty;
                $bestMask = $mask;
            }
        }
        
        $code->setMask($bestMask);
    }
    
    public static function applyMask($code, MaskPatternInterface $pattern) {
        foreach ($code as $j => $row) {
            foreach ($row as $i => $module) {
                if (!is_null($code[$j][$i]) && $pattern->isReversed($i, $j)) {
                    $code[$j][$i] = $module ? 0 : 1;
                }
            }
        }
        
        return $code;
    }
    
    public static function calculatePenalties($code) {
        // TODO calculate penalties
        return 0;
    }
}
