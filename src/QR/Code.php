<?php

namespace QR;

use Exception;
use QR\Charsets\CharsetAbstract;
use QR\Code;
use QR\ErrorCorrections\CorrectionInterface;
use QR\MaskPatterns\MaskPatternInterface;

class Code {
    /**
     * @var CharsetAbstract
     */
    protected $charset;
    
    /**
     * @var CorrectionInterface
     */
    protected $correction;
    
    /**
     * @var string
     */
    protected $string;
    
    /**
     * @var array
     */
    protected $code = array();
    protected $codeFunctions = array();
    
    /**
     * @var MaskPatternInterface
     */
    protected $mask;
    
    /**
     * @var int
     */
    protected $version;
    
    public function setMask(MaskPatternInterface $mask) {
        $this->mask = $mask;
    }
    
    public function setCharset(CharsetAbstract $charset) {
        $this->charset = $charset;
    }
    
    public function setString($string) {
        $this->string = $string;
    }
        
    public function parseFragments($string) {
        // This function will probably in the future optimize the bit string
        // but for now we will just do it all as one but string
    }
    
    public function process() {
        
    }
    
    public function setVersion($version) {
        $this->version = $version;
    }
    
    public function determineVersion() {
        $this->version = $this->charset->getBestVersion($this->string, $this->correction->getLevel());
    }
    
    public function setErrorCorrection(CorrectionInterface $correction) {
        $this->correction = $correction;
    }
    
    public function printCode() {
        echo '<pre>';
        foreach ($this->code as $a) {
            foreach ($a as $b) {
                echo is_null($b) ? '_' : $b;
            }
            echo '<br />';
        }
            
        echo '</pre>';
    }
    
    
    
    
    
        
    
    
    /*protected $charSets = array(
        CODE::CHARSET_NUMERIC => array(
            '30' => 0,
            '31' => 1,
            '32' => 2,
            '33' => 3,
            '34' => 4,
            '35' => 5,
            '36' => 6,
            '37' => 7,
            '38' => 8,
            '39' => 9,
        )
    );*/
    
    
    /**
     * The following is the list of Alphanumeric characters with their associated
     * character value.
     *  
     * @var array
     */
    protected $alphanumericChars = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', ' ', '$', '%', '*', '+', '-', '.', '/', ':');
    
    
    // Quiet zone is 4 pixels around the outside of 0's
    
    /* public function __construct($string) {
        $code = new Code();
        $code->setErrorCorrection(new CorrectionL());
        
        die("HERE");
        
        
        
        
        $this->version = $version;
        $string = $this->encodeString($string);
        $codeWords = $this->convertToCodeWords($string);
        
        print_r($codeWords);
        die();
        
        $this//->determineCharSet($string)
             ->createBlankCode($version)
             ->addFinderPatterns()
             ->addTimingPattern()
             ->addAlignmentPatterns()
             ->addVersionInformation()
             ->addFormatInformation();
    }*/
    
    public function getNumErrorBlocks($version, $ecl) {
        
    }
    
    public function convertToCodeWords($string) {
        $codeWords = str_split($string, 8);
        
        // TODO Terminator?
        
        if (strlen($codeWords[count($codeWords) - 1]) < 8) {
            $codeWords[count($codeWords) - 1] = str_pad($codeWords[count($codeWords) - 1], 8, '0');
        }
        
        $codeWordCount = count($codeWords);
        $totalCodeWordCount = $this->getCodeWordCount($this->version, 0);
        
        // Add pad code words if we didn't fill it up
        $padCodeWords = array('11101100', '00010001');
        
        for ($i = $codeWordCount; $i < $totalCodeWordCount; $i++) {
            $codeWords[] = $padCodeWords[($i - $codeWordCount % 2) % 2];
        }
        
        return $codeWords;
    }
    
    public function decBin($number, $length) {
        return str_pad(decbin($number), $length, '0', STR_PAD_LEFT);
    }
    
    public function getCodeWordCount($version, $ecl) {
        $counts = array(
            1 => array(   19,   16,   13,    9),
            2 => array(   34,   28,   22,   16),
            3 => array(   55,   44,   34,   26),
            4 => array(   80,   64,   48,   36),
            5 => array(  108,   86,   62,   46),
            6 => array(  136,  108,   76,   60),
            7 => array(  156,  124,   88,   66),
            8 => array(  194,  154,  110,   86),
            9 => array(  232,  182,  132,  100),
            10 => array( 274,  216,  154,  122),
            11 => array( 324,  254,  180,  140),
            12 => array( 370,  290,  106,  158),
            13 => array( 428,  334,  244,  180),
            14 => array( 461,  365,  261,  197),
            15 => array( 523,  415,  295,  223),
            16 => array( 589,  453,  325,  253),
            17 => array( 647,  507,  367,  283),
            18 => array( 721,  563,  397,  313),
            19 => array( 795,  627,  445,  341),
            20 => array( 861,  669,  485,  385),
            21 => array( 932,  714,  512,  406),
            22 => array(1006,  782,  568,  442),
            23 => array(1094,  860,  614,  464),
            24 => array(1174,  914,  664,  514),
            25 => array(1276, 1000,  718,  538),
            26 => array(1370, 1062,  754,  596),
            27 => array(1468, 1128,  808,  628),
            28 => array(1531, 1193,  871,  661),
            29 => array(1631, 1267,  911,  701),
            30 => array(1735, 1373,  985,  745),
            31 => array(1843, 1455, 1033,  793),
            32 => array(1955, 1541, 1115,  845),
            33 => array(2071, 1631, 1171,  901),
            34 => array(2191, 1725, 1231,  961),
            35 => array(2306, 1812, 1286,  986),
            36 => array(2434, 1914, 1354, 1054),
            37 => array(2566, 1992, 1426, 1096),
            38 => array(2702, 2102, 1502, 1142),
            39 => array(2812, 2216, 1582, 1222),
            40 => array(2956, 2334, 1666, 1276)
        );
        
        return $counts[$version][$ecl];
    }
    
    public function getCharacterCountBits($version, $mode) {
        if ($version >= 1 && $version <= 9) {
            switch ($mode) {
                case Code::CHARSET_NUMERIC:      return 10; break;
                case Code::CHARSET_ALPHANUMERIC: return 9; break;
                case Code::CHARSET_LATIN:        return 8; break;
                case Code::CHARSET_KANJI:        return 8; break;
            }
        } elseif ($version >= 10 && $version <= 26) {
            switch ($mode) {
                case Code::CHARSET_NUMERIC:      return 12; break;
                case Code::CHARSET_ALPHANUMERIC: return 11; break;
                case Code::CHARSET_LATIN:        return 16; break;
                case Code::CHARSET_KANJI:        return 10; break;
            }            
        } elseif ($version >= 27 && $version <= 40) {
            switch ($mode) {
                case Code::CHARSET_NUMERIC:      return 14; break;
                case Code::CHARSET_ALPHANUMERIC: return 13; break;
                case Code::CHARSET_LATIN:        return 16; break;
                case Code::CHARSET_KANJI:        return 12; break;
            }
        }
        
        throw new Exception('Invalid version/mode');
    }
    
    public function encodeString($string) {
        $bitGroups = str_split($string, 3);
        
        $numericModeIndicator = '0001';
        
        $characterCount = $this->decBin(strlen($string), $this->getCharacterCountBits($this->version, Code::CHARSET_NUMERIC));
        
        $encodedString = $numericModeIndicator . $characterCount;
        
        foreach ($bitGroups as $bitGroup) {
            $encodedString .= $this->decBin($bitGroup, 3 * strlen($bitGroup) + 1);
        }
        
        return $encodedString;
    }
    
    public function getCharSet($string) {
        if (preg_match('/^[0-9]+$/', $string)) {
            return Code::CHARSET_NUMERIC;
        } elseif (preg_match('|^[0-9A-Z $%*+./:-]+$|', $string)) {
            return Code::CHARSET_ALPHANUMERIC;
        } else {
            return Code::CHARSET_LATIN;
        }
        // TODO add checking for CHARSET_KANJI
    }
    
    public function addFormatInformation() {
        $formatInformation = array_fill(0, 15, 0);
        
        // TODO actually figure out format information
        
        $fragment = array_reverse(array_slice($formatInformation, 0, 8));
        $this->addPattern($fragment, 8, $this->size - 8);
        
        $fragment = array();
        for ($i = 8; $i < 15; $i++) {
            $fragment[] = array($formatInformation[$i]);
        }
        $this->addPattern($fragment, $this->size - 7, 8);
        
        $fragment = array();
        for ($i = 0; $i < 6; $i++) {
            $fragment[] = array($formatInformation[$i]);
        }
        $this->addPattern($fragment, 0, 8);
        
        $fragment = array();
        for ($i = 6; $i < 8; $i++) {
            $fragment[] = array($formatInformation[$i]);
        }
        $this->addPattern($fragment, 7, 8);
        
        $this->markCode(8, 7, $formatInformation[8]);
        
        $fragment = array_reverse(array_slice($formatInformation, 9, 6));
        $this->addPattern($fragment, 8, 0);
        
        $this->markCode(4 * $this->version + 9, 8, 1);
    }
    
    public function createBlankCode($version) {
        $this->version = $version;
        $this->size = 17 + ($version * 4);
        
        $this->code = array_fill(0, $this->size, array_fill(0, $this->size, null));
        return $this;
    }
    
    public function addFinderPatterns() {
        $finderPattern = array(
            array(0,0,0,0,0,0,0,0,0),
            array(0,1,1,1,1,1,1,1,0),
            array(0,1,0,0,0,0,0,1,0),
            array(0,1,0,1,1,1,0,1,0),
            array(0,1,0,1,1,1,0,1,0),
            array(0,1,0,1,1,1,0,1,0),
            array(0,1,0,0,0,0,0,1,0),
            array(0,1,1,1,1,1,1,1,0),
            array(0,0,0,0,0,0,0,0,0),
        );
        
        $this->addPattern($finderPattern, -1, -1);
        $this->addPattern($finderPattern, $this->size - 8, -1);
        $this->addPattern($finderPattern, -1, $this->size - 8);
        return $this;
    }
    
    public function addTimingPattern() {
        for ($i = 8; $i < $this->size - 8; $i++) {
            $this->markCode(6, $i, ($i + 1) % 2);
            $this->markCode($i, 6, ($i + 1) % 2);
        }
        
        return $this;
    }
    
    // TODO make this function dynamic
    public function addAlignmentPatterns() {
        $alignmentPattern = array(
            array(1,1,1,1,1),
            array(1,0,0,0,1),
            array(1,0,1,0,1),
            array(1,0,0,0,1),
            array(1,1,1,1,1),
        );
        
        $coordinates = array(6);
        
        if ($this->version > 34) {
            $coordinates[] = ($this->version % 3) * 4 + floor($this->version / 3) * 2;
        }
        
        if ($this->version > 27) {
            $temp = array(26,30,26,30,34,30,34,54,50,54,58,54,58);
            $coordinates[] = $temp[$this->version - 28];
        }
        
        if ($this->version > 20) {
            $temp = array(28,26,30,28,32,30,34,50,54,52,56,60,58,62,78,76,80,84,82,86);
            $coordinates[] = $temp[$this->version - 21];
        }
        
        if ($this->version > 13) {
            $temp = array(26,26,26,30,30,30,34,50,50,54,54,58,58,62,74,78,78,82,86,86,90,102,102,106,110,110,114);
            $coordinates[] = $temp[$this->version - 14];
        }
        
        if ($this->version > 6) {
            $temp = array(22,24,26,28,30,32,34,46,48,50,54,56,58,62,72,74,78,80,84,86,90,98,102,104,108,112,114,118,126,128,132,136,138,142);
            $coordinates[] = $temp[$this->version - 7];
        }
                
        if ($this->version > 1) {
            $coordinates[] = $this->version * 4 + 10;
        }
        
        foreach ($coordinates as $a) {
            foreach ($coordinates as $b) {
                if (($a == 6 && $b == 6)
                        || ($a == 6 && $b == $this->size - 7)
                        || ($a == $this->size - 7 && $b == 6)) {
                    continue;
                }
                
                $this->addPattern($alignmentPattern, $a, $b, true);
            }
        }
        
        return $this;
    }
    
    
    
    public function addVersionInformation() {
        if ($this->version < 7) {
            return $this;
        }
        
        $versionInformation = array_fill(0, 18, 0);
        
        $versionBin = decbin($this->version);
        
        for ($i = 0, $max = strlen($versionBin); $i < $max; $i++) {
            $versionInformation[$i + 6 - $max] = $versionBin[$i];   
        }
        
        // TODO add BCH to versionInformation
        
        $horizontalPattern = array_fill(0, 3, array_fill(0, 6, 0));
        $verticalPattern   = array_fill(0, 6, array_fill(0, 3, 0));
        
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $verticalPattern[$i][$j]   = $versionInformation[($i * 3) + $j];
                $horizontalPattern[$j][$i] = $versionInformation[($i * 3) + $j];
            }
        }
        
        $this->addPattern($horizontalPattern, $this->size - 11, 0);
        $this->addPattern($verticalPattern, 0, $this->size - 11);
        
        return $this;
    }
    
    public function addPattern($pattern, $i, $j, $centered = false) {
        if ($centered) {
            $i -= floor(count($pattern) / 2);
            $j -= floor(count($pattern[0]) / 2);
        }
        
        foreach ($pattern as $i1 => $a) {
            if (!is_array($a)) {
                $this->markCode($i, $i1 + $j, $a);
            } else {
                foreach ($a as $j1 => $b) {
                    $this->markCode($i1 + $i, $j1 + $j, $b);
                }
            }
        }
        return $this;
    }
    
    public function markCode($i, $j, $value) {
        if ($i < 0 || $j < 0 || $i >= $this->size || $j >= $this->size) return;
        $this->code[$i][$j] = $value;
    }
}