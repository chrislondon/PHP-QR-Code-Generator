<?php

use QR\MaskPatterns\Pattern111;

require_once __DIR__ . '/../../../src/QR/MaskPatterns/MaskPatternInterface.php';
require_once __DIR__ . '/../../../src/QR/MaskPatterns/Pattern111.php';

class Pattern111Test extends PHPUnit_Framework_TestCase {
    public $pattern;
    
    public function SetUp() {
        $this->pattern = new Pattern111();
    }
    
    public function testIsReversed() {
        $this->assertTrue($this->pattern->isReversed(3, 3));
        $this->assertFalse($this->pattern->isReversed(2, 2));
    }
}