<?php

namespace QR\Charsets;

use QR\Charsets\CharsetInterface;
use QR\ErrorCorrection;

class CharsetNumeric extends CharsetInterface {
    protected $versionCount = array(
        1 => array(
            ErrorCorrection::ECL_L => 41,
            ErrorCorrection::ECL_M => 34,
            ErrorCorrection::ECL_Q => 27,
            ErrorCorrection::ECL_H => 17, 
        ),
        2 => array(
            ErrorCorrection::ECL_L => 77,
            ErrorCorrection::ECL_M => 63,
            ErrorCorrection::ECL_Q => 48,
            ErrorCorrection::ECL_H => 34, 
        ),
        3 => array(
            ErrorCorrection::ECL_L => 127,
            ErrorCorrection::ECL_M => 101,
            ErrorCorrection::ECL_Q => 77,
            ErrorCorrection::ECL_H => 58, 
        ),
        4 => array(
            ErrorCorrection::ECL_L => 187,
            ErrorCorrection::ECL_M => 149,
            ErrorCorrection::ECL_Q => 111,
            ErrorCorrection::ECL_H => 82, 
        ),
        5 => array(
            ErrorCorrection::ECL_L => 255,
            ErrorCorrection::ECL_M => 202,
            ErrorCorrection::ECL_Q => 144,
            ErrorCorrection::ECL_H => 106, 
        ),
        6 => array(
            ErrorCorrection::ECL_L => 322,
            ErrorCorrection::ECL_M => 255,
            ErrorCorrection::ECL_Q => 178,
            ErrorCorrection::ECL_H => 139, 
        ),
        7 => array(
            ErrorCorrection::ECL_L => 370,
            ErrorCorrection::ECL_M => 293,
            ErrorCorrection::ECL_Q => 207,
            ErrorCorrection::ECL_H => 154, 
        ),
        8 => array(
            ErrorCorrection::ECL_L => 461,
            ErrorCorrection::ECL_M => 365,
            ErrorCorrection::ECL_Q => 259,
            ErrorCorrection::ECL_H => 202, 
        ),
        9 => array(
            ErrorCorrection::ECL_L => 552,
            ErrorCorrection::ECL_M => 432,
            ErrorCorrection::ECL_Q => 312,
            ErrorCorrection::ECL_H => 235, 
        ),
        10 => array(
            ErrorCorrection::ECL_L => 652,
            ErrorCorrection::ECL_M => 513,
            ErrorCorrection::ECL_Q => 364,
            ErrorCorrection::ECL_H => 288, 
        ),
        11 => array(
            ErrorCorrection::ECL_L => 772,
            ErrorCorrection::ECL_M => 604,
            ErrorCorrection::ECL_Q => 427,
            ErrorCorrection::ECL_H => 331, 
        ),
        12 => array(
            ErrorCorrection::ECL_L => 883,
            ErrorCorrection::ECL_M => 691,
            ErrorCorrection::ECL_Q => 489,
            ErrorCorrection::ECL_H => 374, 
        ),
        13 => array(
            ErrorCorrection::ECL_L => 1022,
            ErrorCorrection::ECL_M => 796,
            ErrorCorrection::ECL_Q => 580,
            ErrorCorrection::ECL_H => 427, 
        ),
        14 => array(
            ErrorCorrection::ECL_L => 1101,
            ErrorCorrection::ECL_M => 871,
            ErrorCorrection::ECL_Q => 621,
            ErrorCorrection::ECL_H => 468, 
        ),
        15 => array(
            ErrorCorrection::ECL_L => 1250,
            ErrorCorrection::ECL_M => 991,
            ErrorCorrection::ECL_Q => 703,
            ErrorCorrection::ECL_H => 530, 
        ),
        16 => array(
            ErrorCorrection::ECL_L => 1408,
            ErrorCorrection::ECL_M => 1082,
            ErrorCorrection::ECL_Q => 775,
            ErrorCorrection::ECL_H => 602, 
        ),
        17 => array(
            ErrorCorrection::ECL_L => 1548,
            ErrorCorrection::ECL_M => 1212,
            ErrorCorrection::ECL_Q => 876,
            ErrorCorrection::ECL_H => 674, 
        ),
        18 => array(
            ErrorCorrection::ECL_L => 1725,
            ErrorCorrection::ECL_M => 1346,
            ErrorCorrection::ECL_Q => 948,
            ErrorCorrection::ECL_H => 746, 
        ),
        19 => array(
            ErrorCorrection::ECL_L => 1903,
            ErrorCorrection::ECL_M => 1500,
            ErrorCorrection::ECL_Q => 1063,
            ErrorCorrection::ECL_H => 813, 
        ),
        20 => array(
            ErrorCorrection::ECL_L => 2061,
            ErrorCorrection::ECL_M => 1600,
            ErrorCorrection::ECL_Q => 1159,
            ErrorCorrection::ECL_H => 919, 
        ),
        21 => array(
            ErrorCorrection::ECL_L => 2232,
            ErrorCorrection::ECL_M => 1708,
            ErrorCorrection::ECL_Q => 1224,
            ErrorCorrection::ECL_H => 969, 
        ),
        22 => array(
            ErrorCorrection::ECL_L => 2409,
            ErrorCorrection::ECL_M => 1872,
            ErrorCorrection::ECL_Q => 1358,
            ErrorCorrection::ECL_H => 1056, 
        ),
        23 => array(
            ErrorCorrection::ECL_L => 2620,
            ErrorCorrection::ECL_M => 2059,
            ErrorCorrection::ECL_Q => 1468,
            ErrorCorrection::ECL_H => 1108, 
        ),
        24 => array(
            ErrorCorrection::ECL_L => 2812,
            ErrorCorrection::ECL_M => 2188,
            ErrorCorrection::ECL_Q => 1588,
            ErrorCorrection::ECL_H => 1228, 
        ),
        25 => array(
            ErrorCorrection::ECL_L => 3057,
            ErrorCorrection::ECL_M => 2395,
            ErrorCorrection::ECL_Q => 1718,
            ErrorCorrection::ECL_H => 1286, 
        ),
        26 => array(
            ErrorCorrection::ECL_L => 3283,
            ErrorCorrection::ECL_M => 2544,
            ErrorCorrection::ECL_Q => 1804,
            ErrorCorrection::ECL_H => 1425, 
        ),
        27 => array(
            ErrorCorrection::ECL_L => 3517,
            ErrorCorrection::ECL_M => 2701,
            ErrorCorrection::ECL_Q => 1933,
            ErrorCorrection::ECL_H => 1501, 
        ),
        28 => array(
            ErrorCorrection::ECL_L => 3669,
            ErrorCorrection::ECL_M => 2857,
            ErrorCorrection::ECL_Q => 2085,
            ErrorCorrection::ECL_H => 1581, 
        ),
        29 => array(
            ErrorCorrection::ECL_L => 3909,
            ErrorCorrection::ECL_M => 3035,
            ErrorCorrection::ECL_Q => 2181,
            ErrorCorrection::ECL_H => 1677, 
        ),
        30 => array(
            ErrorCorrection::ECL_L => 4158,
            ErrorCorrection::ECL_M => 3289,
            ErrorCorrection::ECL_Q => 2358,
            ErrorCorrection::ECL_H => 1782, 
        ),
        31 => array(
            ErrorCorrection::ECL_L => 4417,
            ErrorCorrection::ECL_M => 3486,
            ErrorCorrection::ECL_Q => 2473,
            ErrorCorrection::ECL_H => 1897, 
        ),
        32 => array(
            ErrorCorrection::ECL_L => 4686,
            ErrorCorrection::ECL_M => 3693,
            ErrorCorrection::ECL_Q => 2670,
            ErrorCorrection::ECL_H => 2022, 
        ),
        33 => array(
            ErrorCorrection::ECL_L => 4965,
            ErrorCorrection::ECL_M => 3909,
            ErrorCorrection::ECL_Q => 2805,
            ErrorCorrection::ECL_H => 2157, 
        ),
        34 => array(
            ErrorCorrection::ECL_L => 5253,
            ErrorCorrection::ECL_M => 4134,
            ErrorCorrection::ECL_Q => 2949,
            ErrorCorrection::ECL_H => 2301, 
        ),
        35 => array(
            ErrorCorrection::ECL_L => 5529,
            ErrorCorrection::ECL_M => 4343,
            ErrorCorrection::ECL_Q => 3081,
            ErrorCorrection::ECL_H => 2361, 
        ),
        36 => array(
            ErrorCorrection::ECL_L => 5836,
            ErrorCorrection::ECL_M => 4588,
            ErrorCorrection::ECL_Q => 3244,
            ErrorCorrection::ECL_H => 2524, 
        ),
        37 => array(
            ErrorCorrection::ECL_L => 6153,
            ErrorCorrection::ECL_M => 4775,
            ErrorCorrection::ECL_Q => 3417,
            ErrorCorrection::ECL_H => 2625, 
        ),
        38 => array(
            ErrorCorrection::ECL_L => 6479,
            ErrorCorrection::ECL_M => 5039,
            ErrorCorrection::ECL_Q => 3599,
            ErrorCorrection::ECL_H => 2735, 
        ),
        39 => array(
            ErrorCorrection::ECL_L => 6743,
            ErrorCorrection::ECL_M => 5313,
            ErrorCorrection::ECL_Q => 3791,
            ErrorCorrection::ECL_H => 2927, 
        ),
        40 => array(
            ErrorCorrection::ECL_L => 7089,
            ErrorCorrection::ECL_M => 5596,
            ErrorCorrection::ECL_Q => 3993,
            ErrorCorrection::ECL_H => 3057, 
        )
    );
    
    public function matches($string) {
        return preg_match('/^[0-9]+$/', $string);
    }
}
