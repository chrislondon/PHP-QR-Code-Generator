<?php

use QR\GF256Polynomial;

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
}