<?php

use QR\MaskPatterns\Pattern001;

require_once __DIR__ . '/../../../src/QR/QR.php';

class Pattern001Test extends PHPUnit_Framework_TestCase {
    public $pattern;
    
    public function SetUp() {
        $this->pattern = new Pattern001();
    }
    
    public function testIsReversed() {
        $this->assertTrue($this->pattern->isReversed(2, 1));
        $this->assertFalse($this->pattern->isReversed(1, 1));
    }
}