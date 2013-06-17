<?php

namespace QR\Charsets;

use QR\Charsets\CharsetAbstract;
use QR\ErrorCorrection;

class CharsetAlpha extends CharsetAbstract {
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
}
