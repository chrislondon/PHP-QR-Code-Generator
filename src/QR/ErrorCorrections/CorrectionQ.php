<?php

namespace QR\ErrorCorrections;

use QR\ErrorCorrection;
use QR\ErrorCorrections\CorrectionInterface;

class CorrectionQ implements CorrectionInterface {
    public function getLevel() {
        return ErrorCorrection::ECL_Q;
    }
    
    public function getIndicator() {
        return '11';
    }
}