<?php

use QR\Charsets\CharsetNumeric;
use QR\Code;
use QR\GeneratorPolynomial;
use QR\GF256Polynomial;
use QR\MessagePolynomial;

require_once __DIR__ . '/../../src/QR/QR.php';

class GF256PolynomialTest extends PHPUnit_Framework_TestCase {
    protected $polynomial;
    
    public function SetUp() {
        $this->polynomial = new GF256Polynomial;
    }
    
    public function testLog() {
        $this->assertEquals(1, $this->polynomial->log(0));
        $this->assertEquals(116, $this->polynomial->log(10));
        $this->assertEquals(180, $this->polynomial->log(20));
        $this->assertEquals(96, $this->polynomial->log(30));
        $this->assertEquals(106, $this->polynomial->log(40));
    }
    
    public function testAntilog() {
        $this->assertEquals(0, $this->polynomial->antilog(1));
        $this->assertEquals(51, $this->polynomial->antilog(10));
        $this->assertEquals(52, $this->polynomial->antilog(20));
        $this->assertEquals(76, $this->polynomial->antilog(30));
        $this->assertEquals(53, $this->polynomial->antilog(40));
    }
    
    public function testLogCompare() {
        for ($i = 1; $i < 255; $i++) {
            $log = $this->polynomial->log($i);
            $this->assertEquals($i, $this->polynomial->antilog($log));
        }
    }
    
    public function testDivideBy() {
        $messagePolynomial = new MessagePolynomial(array(
            '00100000', '01011011', '00001011', '01111000', '11010001', '01110010',
            '11011100', '01001101', '01000011', '01000000', '11101100', '00010001',
            '11101100', '00010001', '11101100', '00010001'
        ));
        
        $exponents = $messagePolynomial->getExponents();       
        $coefficients = array();
        foreach ($exponents as $exponent) {
            $coefficients[] = $messagePolynomial->log($exponent);
        }
        $this->assertEquals(array(32, 91, 11, 120, 209, 114, 220, 77, 67, 64, 236, 17, 236, 17, 236, 17), $coefficients);
        
        $messageCount = $messagePolynomial->getCount();
        $messagePolynomial->multiplyByXn(10);

        $generatorPolynomial = new GeneratorPolynomial(10);
        
        $this->assertEquals(array(0, 251, 67, 46, 61, 118, 70, 64, 94, 32, 45), $generatorPolynomial->getExponents());
        $generatorPolynomial->multiplyByXn($messageCount - 1);
        
        $errorPolynomial = $messagePolynomial->divideBy($generatorPolynomial);
        
        $errorExponents = $errorPolynomial->getExponents();
        $errorCoefficients = array();
        foreach ($errorExponents as $exponent) {
            $errorCoefficients[] = $messagePolynomial->log($exponent);
        }
        
        $this->assertEquals(array(196, 35, 39, 119, 235, 215, 231, 226, 93, 23), $errorCoefficients);
    }
    
    public function testDivide2() {
        $code = new Code();
        $code->setErrorCorrection(QR\ErrorCorrection::getLevel('M'));
        $code->setCharset(new CharsetNumeric);
        $code->setVersion(1);
        $encodedString = $code->encodeString('01234567');
        $codeWords     = $code->convertToCodeWords($encodedString);
        
        $this->assertEquals(array('00010000', '00100000', '00001100', '01010110', '01100001',
            '10000000', '11101100', '00010001', '11101100', '00010001', '11101100',
            '00010001', '11101100', '00010001', '11101100', '00010001'), $codeWords);
        
        $numberErrorCodewords = 10;

        $messagePolynomial = new MessagePolynomial($codeWords);
        $messageCount = $messagePolynomial->getCount();
        $messagePolynomial->multiplyByXn($numberErrorCodewords);

        $generatorPolynomial = new GeneratorPolynomial($numberErrorCodewords);
        $generatorPolynomial->multiplyByXn($messageCount - 1);
        
        $errorPolynomial = $messagePolynomial->divideBy($generatorPolynomial);
        
        $errorExponents = $errorPolynomial->getExponents();
                
        $errorCodeWords = array();
        foreach ($errorExponents as $exponent) {
            $errorCodeWords[] = $code->decBin($exponent, 8);
        }
        
        $this->assertEquals(array('10100101', '00100100',
            '11010100', '11000001', '11101101', '00110110', '11000111', 
            '10000111', '00101100', '01010101'), $errorCodeWords);
    }
}