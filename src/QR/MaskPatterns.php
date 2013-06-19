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

    protected static function getMasks() {
        $masks = array();
        $obj = new ReflectionClass('QR\\MaskPatterns');
        
        foreach ($obj->getConstants() as $const => $key) {
            $pattern = 'QR\MaskPatterns\Pattern' . substr($const, -3);
            
            $masks[$key] = new $pattern();
        }
        
        return $masks;
    }
    
    public static function setBest(Matrix $code) {
        $bestPenalty = $bestMask = null;
        
        foreach (self::getMasks() as $mask) {
            $tempCode = self::tempApplyMask($code, $mask);
            $penalty  = self::calculatePenalties($tempCode);
            
            if (is_null($bestMask) || $bestPenalty > $penalty) {
                $bestPenalty = $penalty;
                $bestMask = $mask;
            }
        }
        
        return $bestMask;
    }
    
    public static function applyMask(Matrix &$code, MaskPatternInterface $pattern) {
        $size = $code->getSize();
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $module = $code->get($i, $j);
                if (!is_null($module) && $pattern->isReversed($i, $j)) {
                    $code->markCode($i, $j, $module ? 0 : 1);
                }
            }
        }
        
        return $code;
    }
    
    public static function tempApplyMask(Matrix $code, MaskPatternInterface $pattern) {
        $size = $code->getSize();
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $module = $code->get($i, $j);
                if (!is_null($module) && $pattern->isReversed($i, $j)) {
                    $code->markCode($i, $j, $module ? 0 : 1);
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
