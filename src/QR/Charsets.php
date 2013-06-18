<?php

namespace QR;

class Charsets {    
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
