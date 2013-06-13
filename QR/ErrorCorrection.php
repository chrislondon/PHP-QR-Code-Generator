<?php

namespace QR;

class ErrorCorrection {
    
    // Error Correction Level
    const ECL_L = 1; // 7%
    const ECL_M = 0; // 15%
    const ECL_Q = 3; // 25%
    const ECL_H = 2; // 30%
    
    protected $defaultECL = QR::ECL_L;
    
    // Number of erasures and errors correctable is:
    // $e + 2 * $t <= $d - $p
}