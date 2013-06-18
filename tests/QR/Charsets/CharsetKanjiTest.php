<?php

use QR\Charsets\CharsetKanji;

require_once __DIR__ . '/../../../src/QR/QR.php';

class CharsetKanjiTest extends PHPUnit_Framework_TestCase {
    public $charset;
    
    public function SetUp() {
        $this->charset = new CharsetKanji();
    }
    
    public function testMatches() {
        $this->assertTrue($this->charset->matches('畑 はたけ'));
    }
}