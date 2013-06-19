<?php

namespace QR\Charsets;

use QR\Charsets\CharsetAbstract;
use QR\ErrorCorrection;

class CharsetAlpha extends CharsetAbstract {
    protected $modeIndicator = '0010';
    
    protected $encodingTable = array(
        '0' => 0,
        '1' => 1,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        'A' => 10,
        'B' => 11,
        'C' => 12,
        'D' => 13,
        'E' => 14,
        'F' => 15,
        'G' => 16,
        'H' => 17,
        'I' => 18,
        'J' => 19,
        'K' => 20,
        'L' => 21,
        'M' => 22,
        'N' => 23,
        'O' => 24,
        'P' => 25,
        'Q' => 26,
        'R' => 27,
        'S' => 28,
        'T' => 29,
        'U' => 30,
        'V' => 31,
        'W' => 32,
        'X' => 33,
        'Y' => 34,
        'Z' => 35,
        ' ' => 36,
        '$' => 37,
        '%' => 38,
        '*' => 39,
        '+' => 40,
        '-' => 41,
        '.' => 42,
        '/' => 43,
        ':' => 44
    );
    
    protected $codewordCounts = array(
        1 => 16,
        2 => 28,
        3 => 44,
        4 => 64,
        5 => 86,
        6 => 108,
        7 => 124,
        8 => 154,
        9 => 182,
        10 => 216,
        11 => 254,
        12 => 290,
        13 => 334,
        14 => 365,
        15 => 415,
        16 => 453,
        17 => 507,
        18 => 563,
        19 => 627,
        20 => 669,
        21 => 714,
        22 => 782,
        23 => 860,
        24 => 914,
        25 => 1000,
        26 => 1062,
        27 => 1128,
        28 => 1193,
        29 => 1267,
        30 => 1373,
        31 => 1455,
        32 => 1541,
        33 => 1631,
        34 => 1725,
        35 => 1812,
        36 => 1914,
        37 => 1992,
        38 => 2102,
        39 => 2216,
        40 => 2334,
    );

    protected $versionCount = array(
        1 => array(
            ErrorCorrection::ECL_L => 25,
            ErrorCorrection::ECL_M => 20,
            ErrorCorrection::ECL_Q => 16,
            ErrorCorrection::ECL_H => 10, 
        ),
        2 => array(
            ErrorCorrection::ECL_L => 47,
            ErrorCorrection::ECL_M => 38,
            ErrorCorrection::ECL_Q => 29,
            ErrorCorrection::ECL_H => 20, 
        ),
        3 => array(
            ErrorCorrection::ECL_L => 77,
            ErrorCorrection::ECL_M => 61,
            ErrorCorrection::ECL_Q => 47,
            ErrorCorrection::ECL_H => 35, 
        ),
        4 => array(
            ErrorCorrection::ECL_L => 114,
            ErrorCorrection::ECL_M => 90,
            ErrorCorrection::ECL_Q => 67,
            ErrorCorrection::ECL_H => 50, 
        ),
        5 => array(
            ErrorCorrection::ECL_L => 154,
            ErrorCorrection::ECL_M => 122,
            ErrorCorrection::ECL_Q => 87,
            ErrorCorrection::ECL_H => 64, 
        ),
        6 => array(
            ErrorCorrection::ECL_L => 195,
            ErrorCorrection::ECL_M => 154,
            ErrorCorrection::ECL_Q => 108,
            ErrorCorrection::ECL_H => 84, 
        ),
        7 => array(
            ErrorCorrection::ECL_L => 224,
            ErrorCorrection::ECL_M => 178,
            ErrorCorrection::ECL_Q => 125,
            ErrorCorrection::ECL_H => 93, 
        ),
        8 => array(
            ErrorCorrection::ECL_L => 279,
            ErrorCorrection::ECL_M => 221,
            ErrorCorrection::ECL_Q => 157,
            ErrorCorrection::ECL_H => 122, 
        ),
        9 => array(
            ErrorCorrection::ECL_L => 335,
            ErrorCorrection::ECL_M => 262,
            ErrorCorrection::ECL_Q => 189,
            ErrorCorrection::ECL_H => 143, 
        ),
        10 => array(
            ErrorCorrection::ECL_L => 395,
            ErrorCorrection::ECL_M => 311,
            ErrorCorrection::ECL_Q => 221,
            ErrorCorrection::ECL_H => 174, 
        ),
        11 => array(
            ErrorCorrection::ECL_L => 468,
            ErrorCorrection::ECL_M => 366,
            ErrorCorrection::ECL_Q => 259,
            ErrorCorrection::ECL_H => 200, 
        ),
        12 => array(
            ErrorCorrection::ECL_L => 535,
            ErrorCorrection::ECL_M => 419,
            ErrorCorrection::ECL_Q => 296,
            ErrorCorrection::ECL_H => 227, 
        ),
        13 => array(
            ErrorCorrection::ECL_L => 619,
            ErrorCorrection::ECL_M => 483,
            ErrorCorrection::ECL_Q => 352,
            ErrorCorrection::ECL_H => 259, 
        ),
        14 => array(
            ErrorCorrection::ECL_L => 667,
            ErrorCorrection::ECL_M => 528,
            ErrorCorrection::ECL_Q => 376,
            ErrorCorrection::ECL_H => 283, 
        ),
        15 => array(
            ErrorCorrection::ECL_L => 758,
            ErrorCorrection::ECL_M => 600,
            ErrorCorrection::ECL_Q => 426,
            ErrorCorrection::ECL_H => 321, 
        ),
        16 => array(
            ErrorCorrection::ECL_L => 854,
            ErrorCorrection::ECL_M => 656,
            ErrorCorrection::ECL_Q => 470,
            ErrorCorrection::ECL_H => 365, 
        ),
        17 => array(
            ErrorCorrection::ECL_L => 938,
            ErrorCorrection::ECL_M => 734,
            ErrorCorrection::ECL_Q => 531,
            ErrorCorrection::ECL_H => 408, 
        ),
        18 => array(
            ErrorCorrection::ECL_L => 1046,
            ErrorCorrection::ECL_M => 816,
            ErrorCorrection::ECL_Q => 574,
            ErrorCorrection::ECL_H => 452, 
        ),
        19 => array(
            ErrorCorrection::ECL_L => 1153,
            ErrorCorrection::ECL_M => 909,
            ErrorCorrection::ECL_Q => 644,
            ErrorCorrection::ECL_H => 493, 
        ),
        20 => array(
            ErrorCorrection::ECL_L => 1249,
            ErrorCorrection::ECL_M => 970,
            ErrorCorrection::ECL_Q => 702,
            ErrorCorrection::ECL_H => 557, 
        ),
        21 => array(
            ErrorCorrection::ECL_L => 1352,
            ErrorCorrection::ECL_M => 1035,
            ErrorCorrection::ECL_Q => 742,
            ErrorCorrection::ECL_H => 587, 
        ),
        22 => array(
            ErrorCorrection::ECL_L => 1460,
            ErrorCorrection::ECL_M => 1134,
            ErrorCorrection::ECL_Q => 823,
            ErrorCorrection::ECL_H => 640, 
        ),
        23 => array(
            ErrorCorrection::ECL_L => 1588,
            ErrorCorrection::ECL_M => 1248,
            ErrorCorrection::ECL_Q => 890,
            ErrorCorrection::ECL_H => 672, 
        ),
        24 => array(
            ErrorCorrection::ECL_L => 1704,
            ErrorCorrection::ECL_M => 1326,
            ErrorCorrection::ECL_Q => 963,
            ErrorCorrection::ECL_H => 744, 
        ),
        25 => array(
            ErrorCorrection::ECL_L => 1853,
            ErrorCorrection::ECL_M => 1451,
            ErrorCorrection::ECL_Q => 1041,
            ErrorCorrection::ECL_H => 779, 
        ),
        26 => array(
            ErrorCorrection::ECL_L => 1990,
            ErrorCorrection::ECL_M => 1542,
            ErrorCorrection::ECL_Q => 1094,
            ErrorCorrection::ECL_H => 864, 
        ),
        27 => array(
            ErrorCorrection::ECL_L => 2132,
            ErrorCorrection::ECL_M => 1637,
            ErrorCorrection::ECL_Q => 1172,
            ErrorCorrection::ECL_H => 910, 
        ),
        28 => array(
            ErrorCorrection::ECL_L => 2223,
            ErrorCorrection::ECL_M => 1732,
            ErrorCorrection::ECL_Q => 1263,
            ErrorCorrection::ECL_H => 958, 
        ),
        29 => array(
            ErrorCorrection::ECL_L => 2369,
            ErrorCorrection::ECL_M => 1839,
            ErrorCorrection::ECL_Q => 1322,
            ErrorCorrection::ECL_H => 1016, 
        ),
        30 => array(
            ErrorCorrection::ECL_L => 2520,
            ErrorCorrection::ECL_M => 1994,
            ErrorCorrection::ECL_Q => 1429,
            ErrorCorrection::ECL_H => 1080, 
        ),
        31 => array(
            ErrorCorrection::ECL_L => 2677,
            ErrorCorrection::ECL_M => 2113,
            ErrorCorrection::ECL_Q => 1499,
            ErrorCorrection::ECL_H => 1150, 
        ),
        32 => array(
            ErrorCorrection::ECL_L => 2840,
            ErrorCorrection::ECL_M => 2238,
            ErrorCorrection::ECL_Q => 1618,
            ErrorCorrection::ECL_H => 1226, 
        ),
        33 => array(
            ErrorCorrection::ECL_L => 3009,
            ErrorCorrection::ECL_M => 2369,
            ErrorCorrection::ECL_Q => 1700,
            ErrorCorrection::ECL_H => 1307, 
        ),
        34 => array(
            ErrorCorrection::ECL_L => 3183,
            ErrorCorrection::ECL_M => 2506,
            ErrorCorrection::ECL_Q => 1787,
            ErrorCorrection::ECL_H => 1394, 
        ),
        35 => array(
            ErrorCorrection::ECL_L => 3351,
            ErrorCorrection::ECL_M => 2632,
            ErrorCorrection::ECL_Q => 1867,
            ErrorCorrection::ECL_H => 1431, 
        ),
        36 => array(
            ErrorCorrection::ECL_L => 3537,
            ErrorCorrection::ECL_M => 2780,
            ErrorCorrection::ECL_Q => 1966,
            ErrorCorrection::ECL_H => 1530, 
        ),
        37 => array(
            ErrorCorrection::ECL_L => 3729,
            ErrorCorrection::ECL_M => 2894,
            ErrorCorrection::ECL_Q => 2071,
            ErrorCorrection::ECL_H => 1591, 
        ),
        38 => array(
            ErrorCorrection::ECL_L => 3927,
            ErrorCorrection::ECL_M => 3054,
            ErrorCorrection::ECL_Q => 2181,
            ErrorCorrection::ECL_H => 1658, 
        ),
        39 => array(
            ErrorCorrection::ECL_L => 4087,
            ErrorCorrection::ECL_M => 3220,
            ErrorCorrection::ECL_Q => 2298,
            ErrorCorrection::ECL_H => 1774, 
        ),
        40 => array(
            ErrorCorrection::ECL_L => 4296,
            ErrorCorrection::ECL_M => 3391,
            ErrorCorrection::ECL_Q => 2420,
            ErrorCorrection::ECL_H => 1852, 
        )
    );
    
    public function matches($string) {
        return (bool)preg_match('|^[0-9A-Z $%*+./:-]+$|', $string);
    }
    
    public function getCharacterCountBits($version) {
        if ($version >= 1 && $version <= 9) {
            return 9;
        } elseif ($version >= 10 && $version <= 26) {
            return 11;   
        } elseif ($version >= 27 && $version <= 40) {
            return 13;
        }
        
        throw new Exception('Invalid version/mode');
    }
    
    public function encodeString($string) {
        $encodedString = '';
        
        $bits = str_split($string, 2);
        
        foreach ($bits as $bit) {
            $num = $this->encodingTable[$bit[0]];

            if (strlen($bit) == 2) {
                $num = $num * 45 + $this->encodingTable[$bit[1]];
                $encodedString .= str_pad(decbin($num), 11, '0', STR_PAD_LEFT);
            } else {
                $encodedString .= str_pad(decbin($num), 6, '0', STR_PAD_LEFT);
            } 
        }
        
        return $encodedString;
    }
}
