<?php

use QR\GeneratorPolynomial;

require_once __DIR__ . '/../../src/QR/QR.php';

class GeneratorPolynomialTest extends PHPUnit_Framework_TestCase {
    protected $polynomial;
    
    public function SetUp() {
        $this->polynomial = new GeneratorPolynomial;
    }
    
    public function testGeneratePolynomial() {
        $this->assertEquals(
                array(0, 25, 1),
                $this->polynomial->generatePolynomial(2)
            );
        
        $this->assertEquals(
                array(0, 198, 199, 3),
                $this->polynomial->generatePolynomial(3)
            );
        
        $this->assertEquals(
                array(0, 87, 229, 146, 149, 238, 102, 21),
                $this->polynomial->generatePolynomial(7)
            );
        
        $this->assertEquals(
                array(0, 247, 159, 223, 33, 224, 93, 77, 70, 90, 160, 32, 254, 43, 150, 84, 101, 190, 205, 133, 52, 60, 202, 165, 220, 203, 151, 93, 84, 15, 84, 253, 173, 160, 89, 227, 52, 199, 97, 95, 231, 52, 177, 41, 125, 137, 241, 166, 225, 118, 2, 54, 32, 82, 215, 175, 198, 43, 238, 235, 27, 101, 184, 127, 3, 5, 8, 163, 238),
                $this->polynomial->generatePolynomial(68)
            );
    }
}