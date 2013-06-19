<?php

namespace QR\ErrorCorrections;

use QR\ErrorCorrection;
use QR\ErrorCorrections\CorrectionAbstract;

class CorrectionL extends CorrectionAbstract {
    protected $dataCodeWords = array(
        1 => 19,
        2 => 34,
        3 => 55,
        4 => 80,
        5 => 108,
        6 => 136,
        7 => 156,
        8 => 194,
        9 => 232,
        10 => 274,
        11 => 324,
        12 => 370,
        13 => 428,
        14 => 461,
        15 => 523,
        16 => 589,
        17 => 647,
        18 => 721,
        19 => 795,
        20 => 861,
        21 => 932,
        22 => 1006,
        23 => 1094,
        24 => 1174,
        25 => 1276,
        26 => 1370,
        27 => 1468,
        28 => 1531,
        29 => 1631,
        30 => 1735,
        31 => 1843,
        32 => 1955,
        33 => 2071,
        34 => 2191,
        35 => 2306,
        36 => 2434,
        37 => 2566,
        38 => 2702,
        39 => 2812,
        40 => 2956
    );
    
    public function getLevel() {
        return ErrorCorrection::ECL_L;
    }
    
    public function getIndicator() {
        return '01';
    }
}