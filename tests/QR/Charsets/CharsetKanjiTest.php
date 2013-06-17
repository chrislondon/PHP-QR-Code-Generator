<?php

use QR\Charsets\CharsetKanji;

require_once __DIR__ . '/../../../src/QR/Charsets/CharsetAbstract.php';
require_once __DIR__ . '/../../../src/QR/Charsets/CharsetKanji.php';
require_once __DIR__ . '/../../../src/QR/ErrorCorrection.php';

class CharsetKanjiTest extends PHPUnit_Framework_TestCase {
    public $charset;
    
    public function SetUp() {
        $this->charset = new CharsetKanji();
    }
    
    public function testMatches() {
        $this->assertTrue($this->charset->matches('ｳﾞｶﾞｷﾞｸﾞ'));
    }
}