<?php

use QR\ErrorCorrections\CorrectionM;

require_once __DIR__ . '/../../../src/QR/QR.php';

class CorrectionMTest extends PHPUnit_Framework_TestCase {
    public $correction;
    
    public function SetUp() {
        $this->correction = new CorrectionM;
    }
    
    public function testMatches() {
        $this->assertEquals('M', $this->correction->getLevel());
    }
}
