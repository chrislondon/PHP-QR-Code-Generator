<?php

namespace QR\Printers;

use QR\Matrix;

interface PrinterInterface {
    public function printMatrix(Matrix $matrix);
}
