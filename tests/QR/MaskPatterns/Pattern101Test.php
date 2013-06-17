<?php

use QR\MaskPatterns\Pattern101;

require_once __DIR__ . '/../../../src/QR/MaskPatterns/MaskPatternInterface.php';
require_once __DIR__ . '/../../../src/QR/MaskPatterns/Pattern101.php';

class Pattern101Test extends PHPUnit_Framework_TestCase {
    public $pattern;
    
    public function SetUp() {
        $this->pattern = new Pattern101();
    }
    
    public function testIsReversed() {
        $this->assertTrue($this->pattern->isReversed(2, 3));
        $this->assertFalse($this->pattern->isReversed(2, 2));
    }
}