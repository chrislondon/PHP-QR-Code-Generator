<?php

namespace QR;

use QR\GF256Polynomial;

class GeneratorPolynomial extends GF256Polynomial {
    public function __construct($numCodeWords = false) {
        if ($numCodeWords) {
            $this->exponents = $this->generatePolynomial($numCodeWords);
        }
    }
    
    public function generatePolynomial($numCodeWords) {
        $exponents = array_fill(0, $numCodeWords - 1, null);
        $exponents[$numCodeWords - 1] = 0;
        $exponents[$numCodeWords] = 0;
        
        for ($i = 1; $i < $numCodeWords; $i++) {
            $exponent1 = $exponent2 = array();
            
            foreach ($exponents as $key => $val) {
                if (!is_null($val)) {
                    $exponent1[$key] = $val + $i;
                    $exponent2[$key - 1] = $val;
                    
                    if ($exponent1[$key] > 255) {
                        $exponent1[$key] %= 255;
                    }
                }
            }
            
            foreach ($exponents as $key => $val) {
                if (!isset($exponent1[$key]) && isset($exponent2[$key])) {
                    $exponents[$key] = $exponent2[$key];
                } elseif (isset($exponent1[$key]) && !isset($exponent2[$key])) {
                    $exponents[$key] = $exponent1[$key];
                } elseif (isset($exponent1[$key]) && isset($exponent2[$key])) {
                    $exponents[$key] = $this->logXor($exponent1[$key], $exponent2[$key]);
                }
            }
        }
        
        return $exponents;
    }
}