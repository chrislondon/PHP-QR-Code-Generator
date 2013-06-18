<?php

use QR\Charsets;

require_once __DIR__ . '/../../src/QR/QR.php';

class CharsetsTest extends PHPUnit_Framework_TestCase {
    public function testMatches() {
        $this->assertEquals('QR\Charsets\CharsetNumeric', get_class(Charsets::getCharset('0123456789')));
        $this->assertEquals('QR\Charsets\CharsetAlpha', get_class(Charsets::getCharset('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ $%*+-./:')));
        $this->assertEquals('QR\Charsets\CharsetLatin', get_class(Charsets::getCharset('asdf')));
        //$this->assertEquals('QR\Charsets\CharsetKanji', get_class(Charsets::getCharset('ゔァ-')));
    }
}