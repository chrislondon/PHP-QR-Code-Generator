<?php

namespace QR;

class Charsets {
    const CHARSET_NUMERIC = 0;
    const CHARSET_ALPHA   = 1;
    const CHARSET_LATIN   = 2;
    const CHARSET_KANJI   = 3;
    
    protected $charsets = array();
    
    public function __construct() {
        $this->charsets[] = new Charsets\CharsetNumeric();
        $this->charsets[] = new Charsets\CharsetAlpha();
        $this->charsets[] = new Charsets\CharsetLatin();
        $this->charsets[] = new Charsets\CharsetKanji();
    }
    
    public function getCharset($string) {
        foreach ($this->charsets as $charset) {
            if ($charset->matches($string)) {
                return $charset;
            }
        }
    }
}
