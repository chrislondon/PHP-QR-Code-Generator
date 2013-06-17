<?php

use QR\Charsets\CharsetLatin;

require_once __DIR__ . '/../../../src/QR/Charsets/CharsetAbstract.php';
require_once __DIR__ . '/../../../src/QR/Charsets/CharsetLatin.php';
require_once __DIR__ . '/../../../src/QR/ErrorCorrection.php';

class CharsetLatinTest extends PHPUnit_Framework_TestCase {
    public $charset;
    
    public function SetUp() {
        $this->charset = new CharsetLatin();
    }
    
    public function testMatches() {
        $this->assertTrue($this->charset->matches('I <3 Pickles!'));
        $this->assertFalse($this->charset->matches('ｳﾞｶﾞｷﾞｸﾞ'));
    }
}