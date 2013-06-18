<?php

namespace QR;

use QR\GF256Polynomial;

class MessagePolynomial extends GF256Polynomial {
    public function __construct($codeWords) {
        foreach ($codeWords as $codeWord) {
            $this->exponents[] = $this->antilog(bindec($codeWord));
        }
    }
}