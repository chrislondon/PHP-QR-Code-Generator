<?php

namespace QR\ErrorCorrections;

use QR\ErrorCorrection;
use QR\ErrorCorrections\CorrectionAbstract;

class CorrectionH extends CorrectionAbstract {
    protected $dataCodeWords = array(
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
    
    public function getLevel() {
        return ErrorCorrection::ECL_H;
    }
    
    public function getIndicator() {
        return '10';
    }
}
