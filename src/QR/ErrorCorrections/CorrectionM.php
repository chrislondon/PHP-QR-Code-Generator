<?php

namespace QR\ErrorCorrections;

use QR\ErrorCorrection;
use QR\ErrorCorrections\CorrectionInterface;

class CorrectionM implements CorrectionInterface {
    public function getLevel() {
        return ErrorCorrection::ECL_M;
    }
}