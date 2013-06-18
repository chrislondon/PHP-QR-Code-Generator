<?php

use QR\Charsets\CharsetLatin;

require_once __DIR__ . '/../../../src/QR/QR.php';

class CharsetLatinTest extends PHPUnit_Framework_TestCase {
    public $charset;
    
    public function SetUp() {
        $this->charset = new CharsetLatin();
    }
    
    public function testMatches() {
        $this->assertTrue($this->charset->matches('I <3 Pickles!'));
        //$this->assertFalse($this->charset->matches('榊 さかき'));
    }
}