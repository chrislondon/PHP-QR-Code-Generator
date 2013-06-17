<?php

use QR\MaskPatterns\Pattern110;

require_once __DIR__ . '/../../../src/QR/QR.php';

class Pattern110Test extends PHPUnit_Framework_TestCase {
    public $pattern;
    
    public function SetUp() {
        $this->pattern = new Pattern110();
    }
    
    public function testIsReversed() {
        $this->assertTrue($this->pattern->isReversed(2, 3));
        $this->assertFalse($this->pattern->isReversed(2, 2));
    }
}