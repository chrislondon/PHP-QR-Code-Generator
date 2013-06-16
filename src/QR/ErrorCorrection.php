<?php

namespace QR;

class ErrorCorrection {
    
    // Error Correction Level
    const ECL_L = 'L'; // 7%
    const ECL_M = 'M'; // 15%
    const ECL_Q = 'Q'; // 25%
    const ECL_H = 'H'; // 30%
    
    public static function getLevel($level) {
        $errorCorrection = 'QR\\ErrorCorrections\\Correction' . $level;
        return new $errorCorrection();
    }
    
    // Number of erasures and errors correctable is:
    // $e + 2 * $t <= $d - $p
}