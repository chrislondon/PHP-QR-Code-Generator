<?php

namespace QR\Printers;

use QR\Matrix;
use QR\Printers\PrinterInterface;

class PrinterAscii implements PrinterInterface {
    public function printMatrix(Matrix $matrix) {
        $code = $matrix->getArray();
        echo '<pre>';
        foreach ($code as $a) {
            foreach ($a as $b) {
                if ((int)$b < 10) {
                    echo ' ';
                }
                echo is_null($b) ? '_' : $b;
            }
            echo '<br />';
        }
            
        echo '</pre>';
    }
}
