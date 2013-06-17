<?php

use QR\MaskPatterns\Pattern100;

require_once __DIR__ . '/../../../src/QR/QR.php';

class Pattern100Test extends PHPUnit_Framework_TestCase {
    public $pattern;
    
    public function SetUp() {
        $this->pattern = new Pattern100();
    }
    
    public function testIsReversed() {
        $this->assertTrue($this->pattern->isReversed(2, 3));
        $this->assertFalse($this->pattern->isReversed(2, 2));
    }
}