<?php

namespace QR\ErrorCorrections;

use QR\ErrorCorrection;
use QR\ErrorCorrections\CorrectionInterface;

class CorrectionH implements CorrectionInterface {
    public function getLevel() {
        return ErrorCorrection::ECL_H;
    }
    
    public function getIndicator() {
        return '10';
    }
}
