<?php

use QR\MaskPatterns\Pattern010;

require_once __DIR__ . '/../../../src/QR/MaskPatterns/MaskPatternInterface.php';
require_once __DIR__ . '/../../../src/QR/MaskPatterns/Pattern010.php';

class Pattern010Test extends PHPUnit_Framework_TestCase {
    public $pattern;
    
    public function SetUp() {
        $this->pattern = new Pattern010();
    }
    
    public function testIsReversed() {
        $this->assertTrue($this->pattern->isReversed(1, 3));
        $this->assertFalse($this->pattern->isReversed(2, 1));
    }
}