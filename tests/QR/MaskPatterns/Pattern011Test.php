<?php

use QR\MaskPatterns\Pattern011;

require_once __DIR__ . '/../../../src/QR/QR.php';

class Pattern011Test extends PHPUnit_Framework_TestCase {
    public $pattern;
    
    public function SetUp() {
        $this->pattern = new Pattern011();
    }
    
    public function testIsReversed() {
        $this->assertTrue($this->pattern->isReversed(1, 2));
        $this->assertFalse($this->pattern->isReversed(2, 2));
    }
}