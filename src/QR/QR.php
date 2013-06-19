<?php

namespace QR;

use QR\Charsets;
use QR\Code;
use QR\ErrorCorrection;
use QR\Printers\PrinterHTML;

/**
 * Autoloader class for all QR classes
 */
spl_autoload_register(function($class) {
    if (substr($class, 0, 3) != 'QR\\') {
        return false;
    }

    include dirname(__DIR__) . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) .'.php';
    return true;
});

/**
 * Helper class to make generating QR codes simpler with fewer steps.
 */
class QR {
    /**
     * Factory function for creating a QR code
     * 
     * @param string $string string to be encoded into qr code.
     * @param string $errorCorrectionLevel Set the desired error correction level
     * @param int $version optional version to force the QR code to be a certain version
     * @return \QR\Code
     */
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