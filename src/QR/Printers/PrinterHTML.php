<?php

namespace QR\Printers;

use QR\Matrix;
use QR\Printers\PrinterInterface;

class PrinterHTML implements PrinterInterface {
    protected $moduleSize = 10;
    protected $darkModule = '#000';
    protected $lightModule = '#FFF';
    
    public function printMatrix(Matrix $matrix) {
        $code = $matrix->getArray();
        
        echo '<table style="border-collapse:collapse; margin: ' . ($this->moduleSize * 4) . 'px">';
        foreach ($code as $a) {
            echo '<tr>';
            foreach ($a as $b) {
                echo '<td style="padding: 0; width:' . $this->moduleSize . 'px; height:' . $this->moduleSize . 'px; background-color:' . (!$b ? $this->lightModule : $this->darkModule) . '">';
                echo '</td>';
            }
            echo '</tr>';
        }
            
        echo '</table>';
    }
}
