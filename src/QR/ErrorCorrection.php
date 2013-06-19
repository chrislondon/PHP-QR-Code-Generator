<?php

namespace QR;

class ErrorCorrection {
    
    // Error Correction Level
    const ECL_L = 'L'; // 7%
    const ECL_M = 'M'; // 15%
    const ECL_Q = 'Q'; // 25%
    const ECL_H = 'H'; // 30%
    
    /**
     * Factory functino to get an error correction instance
     * 
     * @param string $level
     * @return \QR\errorCorrection
     */
    public static function getLevel($level) {
        $errorCorrection = 'QR\\ErrorCorrections\\Correction' . $level;
        return new $errorCorrection();
    }
}