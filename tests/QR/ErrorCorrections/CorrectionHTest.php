<?php

use QR\ErrorCorrections\CorrectionH;

require_once __DIR__ . '/../../../src/QR/QR.php';

class CorrectionHTest extends PHPUnit_Framework_TestCase {
    public $correction;
    
    public function SetUp() {
        $this->correction = new CorrectionH;
    }
    
    public function testMatches() {
        $this->assertEquals('H', $this->correction->getLevel());
    }
}
