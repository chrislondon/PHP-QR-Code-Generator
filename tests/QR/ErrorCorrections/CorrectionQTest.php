<?php

use QR\ErrorCorrections\CorrectionQ;

require_once __DIR__ . '/../../../src/QR/QR.php';

class CorrectionQTest extends PHPUnit_Framework_TestCase {
    public $correction;
    
    public function SetUp() {
        $this->correction = new CorrectionQ;
    }
    
    public function testMatches() {
        $this->assertEquals('Q', $this->correction->getLevel());
    }
}
