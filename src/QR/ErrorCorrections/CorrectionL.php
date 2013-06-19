<?php

namespace QR\ErrorCorrections;

use QR\ErrorCorrection;
use QR\ErrorCorrections\CorrectionInterface;

class CorrectionL implements CorrectionInterface {
    public function getLevel() {
        return ErrorCorrection::ECL_L;
    }
    
    public function getIndicator() {
        return '01';
    }
}