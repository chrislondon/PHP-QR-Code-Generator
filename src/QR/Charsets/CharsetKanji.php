<?php

namespace QR\Charsets;

use QR\Charsets\CharsetAbstract;
use QR\ErrorCorrection;

class CharsetKanji extends CharsetAbstract {
    protected $modeIndicator = '1000';
    
    protected $codewordCounts = array(
        1 => 9,
        2 => 16,
        3 => 26,
        4 => 36,
        5 => 46,
        6 => 60,
        7 => 66,
        8 => 86,
        9 => 100,
        10 => 122,
        11 => 140,
        12 => 158,
        13 => 180,
        14 => 197,
        15 => 223,
        16 => 253,
        17 => 283,
        18 => 313,
        19 => 341,
        20 => 385,
        21 => 406,
        22 => 442,
        23 => 464,
        24 => 514,
        25 => 538,
        26 => 596,
        27 => 628,
        28 => 661,
        29 => 701,
        30 => 745,
        31 => 793,
        32 => 845,
        33 => 901,
        34 => 961,
        35 => 986,
        36 => 1054,
        37 => 1096,
        38 => 1142,
        39 => 1222,
        40 => 1276
    );
    
    protected $versionCount = array(
        1 => array(
            ErrorCorrection::ECL_L => 10,
            ErrorCorrection::ECL_M => 8,
            ErrorCorrection::ECL_Q => 7,
            ErrorCorrection::ECL_H => 4, 
        ),
        2 => array(
            ErrorCorrection::ECL_L => 20,
            ErrorCorrection::ECL_M => 16,
            ErrorCorrection::ECL_Q => 12,
            ErrorCorrection::ECL_H => 8, 
        ),
        3 => array(
            ErrorCorrection::ECL_L => 32,
            ErrorCorrection::ECL_M => 26,
            ErrorCorrection::ECL_Q => 20,
            ErrorCorrection::ECL_H => 15, 
        ),
        4 => array(
            ErrorCorrection::ECL_L => 48,
            ErrorCorrection::ECL_M => 38,
            ErrorCorrection::ECL_Q => 28,
            ErrorCorrection::ECL_H => 21, 
        ),
        5 => array(
            ErrorCorrection::ECL_L => 65,
            ErrorCorrection::ECL_M => 52,
            ErrorCorrection::ECL_Q => 37,
            ErrorCorrection::ECL_H => 27, 
        ),
        6 => array(
            ErrorCorrection::ECL_L => 82,
            ErrorCorrection::ECL_M => 65,
            ErrorCorrection::ECL_Q => 45,
            ErrorCorrection::ECL_H => 36, 
        ),
        7 => array(
            ErrorCorrection::ECL_L => 95,
            ErrorCorrection::ECL_M => 75,
            ErrorCorrection::ECL_Q => 53,
            ErrorCorrection::ECL_H => 39, 
        ),
        8 => array(
            ErrorCorrection::ECL_L => 118,
            ErrorCorrection::ECL_M => 93,
            ErrorCorrection::ECL_Q => 66,
            ErrorCorrection::ECL_H => 52, 
        ),
        9 => array(
            ErrorCorrection::ECL_L => 141,
            ErrorCorrection::ECL_M => 111,
            ErrorCorrection::ECL_Q => 80,
            ErrorCorrection::ECL_H => 60, 
        ),
        10 => array(
            ErrorCorrection::ECL_L => 167,
            ErrorCorrection::ECL_M => 131,
            ErrorCorrection::ECL_Q => 93,
            ErrorCorrection::ECL_H => 74, 
        ),
        11 => array(
            ErrorCorrection::ECL_L => 198,
            ErrorCorrection::ECL_M => 155,
            ErrorCorrection::ECL_Q => 109,
            ErrorCorrection::ECL_H => 85, 
        ),
        12 => array(
            ErrorCorrection::ECL_L => 226,
            ErrorCorrection::ECL_M => 177,
            ErrorCorrection::ECL_Q => 125,
            ErrorCorrection::ECL_H => 96, 
        ),
        13 => array(
            ErrorCorrection::ECL_L => 262,
            ErrorCorrection::ECL_M => 204,
            ErrorCorrection::ECL_Q => 149,
            ErrorCorrection::ECL_H => 109, 
        ),
        14 => array(
            ErrorCorrection::ECL_L => 282,
            ErrorCorrection::ECL_M => 223,
            ErrorCorrection::ECL_Q => 159,
            ErrorCorrection::ECL_H => 120, 
        ),
        15 => array(
            ErrorCorrection::ECL_L => 320,
            ErrorCorrection::ECL_M => 254,
            ErrorCorrection::ECL_Q => 180,
            ErrorCorrection::ECL_H => 136, 
        ),
        16 => array(
            ErrorCorrection::ECL_L => 361,
            ErrorCorrection::ECL_M => 277,
            ErrorCorrection::ECL_Q => 198,
            ErrorCorrection::ECL_H => 154, 
        ),
        17 => array(
            ErrorCorrection::ECL_L => 397,
            ErrorCorrection::ECL_M => 310,
            ErrorCorrection::ECL_Q => 224,
            ErrorCorrection::ECL_H => 173, 
        ),
        18 => array(
            ErrorCorrection::ECL_L => 442,
            ErrorCorrection::ECL_M => 345,
            ErrorCorrection::ECL_Q => 243,
            ErrorCorrection::ECL_H => 191, 
        ),
        19 => array(
            ErrorCorrection::ECL_L => 488,
            ErrorCorrection::ECL_M => 384,
            ErrorCorrection::ECL_Q => 272,
            ErrorCorrection::ECL_H => 208, 
        ),
        20 => array(
            ErrorCorrection::ECL_L => 528,
            ErrorCorrection::ECL_M => 410,
            ErrorCorrection::ECL_Q => 297,
            ErrorCorrection::ECL_H => 235, 
        ),
        21 => array(
            ErrorCorrection::ECL_L => 572,
            ErrorCorrection::ECL_M => 438,
            ErrorCorrection::ECL_Q => 314,
            ErrorCorrection::ECL_H => 248, 
        ),
        22 => array(
            ErrorCorrection::ECL_L => 618,
            ErrorCorrection::ECL_M => 480,
            ErrorCorrection::ECL_Q => 348,
            ErrorCorrection::ECL_H => 270, 
        ),
        23 => array(
            ErrorCorrection::ECL_L => 672,
            ErrorCorrection::ECL_M => 528,
            ErrorCorrection::ECL_Q => 376,
            ErrorCorrection::ECL_H => 284, 
        ),
        24 => array(
            ErrorCorrection::ECL_L => 721,
            ErrorCorrection::ECL_M => 561,
            ErrorCorrection::ECL_Q => 407,
            ErrorCorrection::ECL_H => 315, 
        ),
        25 => array(
            ErrorCorrection::ECL_L => 784,
            ErrorCorrection::ECL_M => 614,
            ErrorCorrection::ECL_Q => 440,
            ErrorCorrection::ECL_H => 330, 
        ),
        26 => array(
            ErrorCorrection::ECL_L => 842,
            ErrorCorrection::ECL_M => 652,
            ErrorCorrection::ECL_Q => 462,
            ErrorCorrection::ECL_H => 365, 
        ),
        27 => array(
            ErrorCorrection::ECL_L => 902,
            ErrorCorrection::ECL_M => 692,
            ErrorCorrection::ECL_Q => 496,
            ErrorCorrection::ECL_H => 385, 
        ),
        28 => array(
            ErrorCorrection::ECL_L => 940,
            ErrorCorrection::ECL_M => 732,
            ErrorCorrection::ECL_Q => 534,
            ErrorCorrection::ECL_H => 405, 
        ),
        29 => array(
            ErrorCorrection::ECL_L => 1002,
            ErrorCorrection::ECL_M => 778,
            ErrorCorrection::ECL_Q => 559,
            ErrorCorrection::ECL_H => 430, 
        ),
        30 => array(
            ErrorCorrection::ECL_L => 1066,
            ErrorCorrection::ECL_M => 843,
            ErrorCorrection::ECL_Q => 604,
            ErrorCorrection::ECL_H => 457, 
        ),
        31 => array(
            ErrorCorrection::ECL_L => 1132,
            ErrorCorrection::ECL_M => 894,
            ErrorCorrection::ECL_Q => 634,
            ErrorCorrection::ECL_H => 486, 
        ),
        32 => array(
            ErrorCorrection::ECL_L => 1201,
            ErrorCorrection::ECL_M => 947,
            ErrorCorrection::ECL_Q => 684,
            ErrorCorrection::ECL_H => 518, 
        ),
        33 => array(
            ErrorCorrection::ECL_L => 1273,
            ErrorCorrection::ECL_M => 1002,
            ErrorCorrection::ECL_Q => 719,
            ErrorCorrection::ECL_H => 553, 
        ),
        34 => array(
            ErrorCorrection::ECL_L => 1347,
            ErrorCorrection::ECL_M => 1060,
            ErrorCorrection::ECL_Q => 756,
            ErrorCorrection::ECL_H => 590, 
        ),
        35 => array(
            ErrorCorrection::ECL_L => 1417,
            ErrorCorrection::ECL_M => 1113,
            ErrorCorrection::ECL_Q => 790,
            ErrorCorrection::ECL_H => 605, 
        ),
        36 => array(
            ErrorCorrection::ECL_L => 1496,
            ErrorCorrection::ECL_M => 1176,
            ErrorCorrection::ECL_Q => 832,
            ErrorCorrection::ECL_H => 647, 
        ),
        37 => array(
            ErrorCorrection::ECL_L => 1577,
            ErrorCorrection::ECL_M => 1224,
            ErrorCorrection::ECL_Q => 876,
            ErrorCorrection::ECL_H => 673, 
        ),
        38 => array(
            ErrorCorrection::ECL_L => 1661,
            ErrorCorrection::ECL_M => 1292,
            ErrorCorrection::ECL_Q => 923,
            ErrorCorrection::ECL_H => 701, 
        ),
        39 => array(
            ErrorCorrection::ECL_L => 1729,
            ErrorCorrection::ECL_M => 1362,
            ErrorCorrection::ECL_Q => 972,
            ErrorCorrection::ECL_H => 750, 
        ),
        40 => array(
            ErrorCorrection::ECL_L => 1817,
            ErrorCorrection::ECL_M => 1435,
            ErrorCorrection::ECL_Q => 1024,
            ErrorCorrection::ECL_H => 784, 
        )
    );
    
    public function matches($string) {
        return (bool)preg_match('/[^\wぁ-ゔァ-ヺー\x{4E00}-\x{9FAF}_\-]+/u', $string);
    }
    
    public function getCharacterCountBits($version) {
        if ($version >= 1 && $version <= 9) {
            return 8;
        } elseif ($version >= 10 && $version <= 26) {
            return 10;   
        } elseif ($version >= 27 && $version <= 40) {
            return 12;
        }
        
        throw new Exception('Invalid version/mode');
    }
}
