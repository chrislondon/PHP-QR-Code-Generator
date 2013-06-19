<?php

namespace QR;

use QR\Charsets;
use QR\Code;
use QR\ErrorCorrection;
use QR\Printers\PrinterHTML;

spl_autoload_register(function($class) {
    if (substr($class, 0, 3) != 'QR\\') {
        return false;
    }

    include dirname(__DIR__) . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) .'.php';
    return true;
});

class QR {
    public static function generate($string, $errorCorrectionLevel = ErrorCorrection::ECL_M, $version = null) {
        $code = new Code();
        
        // Add our string to the code
        $code->setString($string);
        
        $code->setCharset(Charsets::getCharset($string));
        
        // Inject error corrector into code
        $code->setErrorCorrection(ErrorCorrection::getLevel($errorCorrectionLevel));
        
        if (!is_null($version)) {
            // If the version is set then set it on the code
            $code->setVersion($version);
        } else {
            $code->determineVersion();
        }
        
        $code->setPrinter(new PrinterHTML);
        
        $code->process();
        
        return $code;
    }   
}