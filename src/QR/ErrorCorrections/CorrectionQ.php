<?php

namespace QR\ErrorCorrections;

use QR\ErrorCorrection;
use QR\ErrorCorrections\CorrectionAbstract;

class CorrectionQ extends CorrectionAbstract {
    protected $dataCodeWords = array(
        1 => 13,
        2 => 22,
        3 => 34,
        4 => 48,
        5 => 62,
        6 => 76,
        7 => 88,
        8 => 110,
        9 => 132,
        10 => 154,
        11 => 180,
        12 => 206,
        13 => 244,
        14 => 261,
        15 => 295,
        16 => 325,
        17 => 367,
        18 => 397,
        19 => 445,
        20 => 485,
        21 => 512,
        22 => 568,
        23 => 614,
        24 => 664,
        25 => 718,
        26 => 754,
        27 => 808,
        28 => 871,
        29 => 911,
        30 => 985,
        31 => 1033,
        32 => 1115,
        33 => 1171,
        34 => 1231,
        35 => 1286,
        36 => 1354,
        37 => 1426,
        38 => 1502,
        39 => 1582,
        40 => 1666
    );
    
    public function getLevel() {
        return ErrorCorrection::ECL_Q;
    }
    
    public function getIndicator() {
        return '11';
    }
}