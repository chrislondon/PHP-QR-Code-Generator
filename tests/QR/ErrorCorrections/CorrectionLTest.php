<?php

use QR\ErrorCorrections\CorrectionL;

require_once __DIR__ . '/../../../src/QR/QR.php';

class CorrectionLTest extends PHPUnit_Framework_TestCase {
    public $correction;
    
    public function SetUp() {
        $this->correction = new CorrectionL;
    }
    
    public function testMatches() {
        $this->assertEquals('L', $this->correction->getLevel());
    }
}
