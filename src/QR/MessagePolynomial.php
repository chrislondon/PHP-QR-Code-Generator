<?php

namespace QR;

use QR\GF256Polynomial;

/**
 * Specific type of polynomial. Maybe TODO turn this into a factory type method 
 * for the GF256 polynomial.
 */
class MessagePolynomial extends GF256Polynomial {
    /**
     * Convert binary codeword strings into exponents
     * 
     * @param array $codeWords
     */
    public function __construct($codeWords) {
        foreach ($codeWords as $codeWord) {
            $this->exponents[] = $this->antilog(bindec($codeWord));
        }
    }
}