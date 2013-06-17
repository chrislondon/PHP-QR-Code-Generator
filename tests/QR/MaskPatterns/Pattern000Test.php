<?php

use QR\MaskPatterns\Pattern000;

require_once __DIR__ . '/../../../src/QR/QR.php';

class Pattern000Test extends PHPUnit_Framework_TestCase {
    public $pattern;
    
    public function SetUp() {
        $this->pattern = new Pattern000();
    }
    
    public function testIsReversed() {
        $this->assertTrue($this->pattern->isReversed(1, 1));
        $this->assertFalse($this->pattern->isReversed(1, 2));
    }
}