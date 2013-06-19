<?php

namespace QR\ErrorCorrections;

interface CorrectionInterface {    
    public function getLevel();  
    public function getIndicator();
}