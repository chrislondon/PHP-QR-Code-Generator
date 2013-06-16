<?php

namespace QR;

class Charsets {
    const CHARSET_NUMERIC = 0;
    const CHARSET_ALPHA   = 1;
    const CHARSET_LATIN   = 2;
    const CHARSET_KANJI   = 3;
    
    public static function getCharset($string) {
        $charsets = array();
        
        $charsets[] = new Charsets\CharsetNumeric();
        $charsets[] = new Charsets\CharsetAlpha();
        $charsets[] = new Charsets\CharsetLatin();
        $charsets[] = new Charsets\CharsetKanji();
        
        foreach ($charsets as $charset) {
            if ($charset->matches($string)) {
                return $charset;
            }
        }
    }
}
