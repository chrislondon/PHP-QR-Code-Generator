<?php

namespace QR\ErrorCorrections;

use QR\ErrorCorrection;
use QR\ErrorCorrections\CorrectionAbstract;

class CorrectionM extends CorrectionAbstract {
    protected $dataCodeWords = array(
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
        40 => 2334
    );
    
    public function getLevel() {
        return ErrorCorrection::ECL_M;
    }
    
    public function getIndicator() {
        return '00';
    }
}