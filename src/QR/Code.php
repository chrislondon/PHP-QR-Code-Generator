<?php

namespace QR;

use QR\Charsets\CharsetAbstract;
use QR\Code;
use QR\ErrorCorrections\CorrectionAbstract;
use QR\GeneratorPolynomial;
use QR\MaskPatterns;
use QR\MaskPatterns\MaskPatternInterface;
use QR\MaskPatterns\Pattern011;
use QR\Matrix;
use QR\MessagePolynomial;
use QR\Printers\PrinterInterface;

class Code {
    /**
     * @var CharsetAbstract
     */
    protected $charset;
    
    /**
     * @var CorrectionAbstract
     */
    protected $correction;
    
    /**
     * @var string
     */
    protected $string;
    
    /**
     * @var Matrix
     */
    protected $code;
    
    /**
     * @var Matrix
     */
    protected $codeFunctions;
    
    /**
     * @var MaskPatternInterface
     */
    protected $mask;
    
    /**
     * @var int
     */
    protected $version;
    
    /**
     * @var PrinterInterface
     */
    protected $printer;
    
    /**
     * Wrapper method to add finder/timing/alignment/etc patterns
     * 
     * @param Matrix $code
     */
    public function addStaticPatterns(Matrix $code) {
        $this->addFinderPatterns($code);
        $this->addTimingPattern($code);
        $this->addAlignmentPatterns($code);
        $this->addVersionInformation($code);
        $this->addFormatInformation($code);  
    }
    
    /**
     * Process the QR code.
     * 
     * TODO make this function less bloated and more easily tested
     */
    public function process() {
        // Generate function patterns
        $this->codeFunctions = new Matrix($this->version);
        $this->addStaticPatterns($this->codeFunctions);
                
        $encodedString = $this->encodeString($this->string);
        $codeWords     = $this->convertToCodeWords($encodedString);

        // TODO fix this hard coded value
        $numberErrorCodewords = 10;
        
        $messagePolynomial   = new MessagePolynomial($codeWords);
        $generatorPolynomial = new GeneratorPolynomial($numberErrorCodewords);
        
        $errorPolynomial = $messagePolynomial->divideBy($generatorPolynomial);
        
        $errorExponents = $errorPolynomial->getExponents();
        
        foreach ($errorExponents as $exponent) {
            $codeWords[] = $this->decBin($errorPolynomial->log($exponent), 8);
        }
        
        $bitStream = join('', $codeWords);
                
        $this->code = new Matrix($this->version);
        $this->addBitStream($bitStream, $this->code, $this->codeFunctions);
        
        //$this->mask = MaskPatterns::setBest($this->code);
        $this->mask = new Pattern011;
        $this->addFormatInformation($this->codeFunctions);
        MaskPatterns::applyMask($this->code, $this->mask);
        
        $this->code->mergeCodes($this->codeFunctions);
    }
    
    /**
     * Convert string to binary string
     * 
     * @param string $string
     * @return string
     */
    public function encodeString($string) {
        $numericModeIndicator = $this->charset->getModeIndicator();
        
        $characterCount = $this->decBin(strlen($string), $this->charset->getCharacterCountBits($this->version));
        
        $encodedString = $numericModeIndicator . $characterCount;
        
        $encodedString .= $this->charset->encodeString($string);
                
        // terminator string
        $encodedString .= '0000';
        
        return $encodedString;
    }
    
    /**
     * Run the string through the selected characterset to find the minimum
     * version. This will need to be improved when we add optimized string
     * encoded
     */
    public function determineVersion() {
        $this->version = $this->charset->getBestVersion($this->string, $this->correction->getLevel());
    }
    
    /**
     * Send the matrix to the printer
     */
    public function printCode() {
        $this->printer->printMatrix($this->code);
    }
    
    public function getNumErrorBlocks($version, $ecl) {
        
    }
    
    public function convertToCodeWords($string) {
        $codeWords = str_split($string, 8);
        
        if (strlen($codeWords[count($codeWords) - 1]) < 8) {
            $codeWords[count($codeWords) - 1] = str_pad($codeWords[count($codeWords) - 1], 8, '0');
        }
        
        $codeWordCount = count($codeWords);
        
        $totalCodeWordCount = $this->correction->getDataCodeWordCount($this->version);
        
        // Add pad code words if we didn't fill it up
        $padCodeWords = array('11101100', '00010001');
        
        for ($i = $codeWordCount; $i < $totalCodeWordCount; $i++) {
            $codeWords[] = $padCodeWords[($i - $codeWordCount % 2) % 2];
        }
        
        return $codeWords;
    }
    
    /**
     * Extends the PHP decbin function to add string padding of zeros onto the left
     * 
     * @param integer $number the decimal to convert to binary
     * @param integer $length the minimum length of the binary string
     * @return string
     */
    public function decBin($number, $length) {
        return str_pad(decbin($number), $length, '0', STR_PAD_LEFT);
    }
    
    /**
     * This function is run twice. Once to return an array of 0's for 
     * placeholding when we are determining where to add the bit stream. The
     * other is when we actually have the mask and we're adding it to the matrix
     * 
     * @return array
     */
    public function generateFormatInformation() {
        if (is_null($this->mask)) {
            return $formatInformation = array_fill(0, 15, 0);
        }
        
        $originalData = $this->correction->getIndicator() . $this->mask->getReference();
        
        // Generate format info
        $data      = ltrim($originalData . '0000000000', '0');
        $generator = $originialGenerator = '10100110111';        

        // Divide the indicator values from the generator
        do {
            $generator = str_pad($originialGenerator, strlen($data), '0');
            // XOR the two values which reduces the length by one.
            $data      = decbin(bindec($data) ^ bindec($generator));
        } while (strlen($data) > 10);
        // once our string is 10 or less digits long, continue;
        
        // combine the original data with the padded BCH
        $data = $originalData . str_pad($data, 10, '0', STR_PAD_LEFT);
        
        // Static mask that's to always be used to mask the return string
        $mask = '101010000010010';
        
        // XOR the data with the mask
        $data = str_pad(decbin(bindec($data) ^ bindec($mask)), 15, '0', STR_PAD_LEFT);
        $data = array_reverse(str_split($data));
        
        return $data;
    }
    
    /**
     * Apply format information to matrix
     * 
     * @param Matrix $matrix
     */
    public function addFormatInformation(Matrix $matrix) {
        $size = $matrix->getSize();
       
        // Get either the real format information or a temporary place holder
        $formatInformation = $this->generateFormatInformation();
        
        // Add info to matrix
        $fragment1 = array_reverse(array_slice($formatInformation, 0, 8));
        $matrix->addPattern($fragment1, 8, $size - 8);
        
        $fragment2 = array();
        for ($i = 8; $i < 15; $i++) {
            $fragment2[] = array($formatInformation[$i]);
        }
        $matrix->addPattern($fragment2, $size - 7, 8);
        
        $fragment3 = array();
        for ($i = 0; $i < 6; $i++) {
            $fragment3[] = array($formatInformation[$i]);
        }
        $matrix->addPattern($fragment3, 0, 8);
        
        $fragment4 = array();
        for ($i = 6; $i < 8; $i++) {
            $fragment4[] = array($formatInformation[$i]);
        }
        $matrix->addPattern($fragment4, 7, 8);
        
        $matrix->markCode(8, 7, $formatInformation[8]);
        
        $fragment5 = array_reverse(array_slice($formatInformation, 9, 6));
        $matrix->addPattern($fragment5, 8, 0);
        
        $matrix->markCode(4 * $matrix->getVersion() + 9, 8, 1);
    }
    
    /**
     * Add static finder patterns to the matrix
     * 
     * @param Matrix $matrix
     * @return Code
     */
    public function addFinderPatterns(Matrix $matrix) {
        $size = $matrix->getSize();
        
        $finderPattern = array(
            array(0,0,0,0,0,0,0,0,0),
            array(0,1,1,1,1,1,1,1,0),
            array(0,1,0,0,0,0,0,1,0),
            array(0,1,0,1,1,1,0,1,0),
            array(0,1,0,1,1,1,0,1,0),
            array(0,1,0,1,1,1,0,1,0),
            array(0,1,0,0,0,0,0,1,0),
            array(0,1,1,1,1,1,1,1,0),
            array(0,0,0,0,0,0,0,0,0),
        );
        
        $matrix->addPattern($finderPattern, -1, -1)
               ->addPattern($finderPattern, $size - 8, -1)
               ->addPattern($finderPattern, -1, $size - 8);

        return $this;
    }
    
    /**
     * Add extra timing patterns to the matrix
     * 
     * @param Matrix $matrix
     * @return Code
     */
    public function addTimingPattern(Matrix $matrix) {
        $size = $matrix->getSize();
        
        for ($i = 8; $i < $size - 8; $i++) {
            $matrix->markCode(6, $i, ($i + 1) % 2)
                   ->markCode($i, 6, ($i + 1) % 2);
        }
        
        return $this;
    }
    
    /**
     * Add alignment patterns to the matrix
     * 
     * @param Matrix $matrix
     * @return Code
     */
    public function addAlignmentPatterns(Matrix $matrix) {
        $size    = $matrix->getSize();
        $version = $matrix->getVersion();
        
        $alignmentPattern = array(
            array(1,1,1,1,1),
            array(1,0,0,0,1),
            array(1,0,1,0,1),
            array(1,0,0,0,1),
            array(1,1,1,1,1),
        );
        
        $coordinates = array(6);
        
        if ($version > 34) {
            $coordinates[] = ($version % 3) * 4 + floor($version / 3) * 2;
        }
        
        if ($version > 27) {
            // TODO make this function dynamic
            $temp = array(26,30,26,30,34,30,34,54,50,54,58,54,58);
            $coordinates[] = $temp[$version - 28];
        }
        
        if ($version > 20) {
            // TODO make this function dynamic
            $temp = array(28,26,30,28,32,30,34,50,54,52,56,60,58,62,78,76,80,84,82,86);
            $coordinates[] = $temp[$version - 21];
        }
        
        if ($version > 13) {
            // TODO make this function dynamic
            $temp = array(26,26,26,30,30,30,34,50,50,54,54,58,58,62,74,78,78,82,86,86,90,102,102,106,110,110,114);
            $coordinates[] = $temp[$version - 14];
        }
        
        if ($version > 6) {
            // TODO make this function dynamic
            $temp = array(22,24,26,28,30,32,34,46,48,50,54,56,58,62,72,74,78,80,84,86,90,98,102,104,108,112,114,118,126,128,132,136,138,142);
            $coordinates[] = $temp[$version - 7];
        }
                
        if ($version > 1) {
            $coordinates[] = $version * 4 + 10;
        }
        
        foreach ($coordinates as $a) {
            foreach ($coordinates as $b) {
                if (($a == 6 && $b == 6)
                        || ($a == 6 && $b == $size - 7)
                        || ($a == $size - 7 && $b == 6)) {
                    continue;
                }
                
                $matrix->addPattern($alignmentPattern, $a, $b, true);
            }
        }
        
        return $this;
    }
    
    /**
     * Add extra version information to the matrix
     * 
     * @param Matrix $matrix
     * @return Code
     */    
    public function addVersionInformation(Matrix $matrix) {
        $size    = $matrix->getSize();
        $version = $matrix->getVersion();
        
        if ($version < 7) {
            return $this;
        }
        
        $versionInformation = array_fill(0, 18, 0);
        
        $versionBin = decbin($version);
        
        for ($i = 0, $max = strlen($versionBin); $i < $max; $i++) {
            $versionInformation[$i + 6 - $max] = $versionBin[$i];   
        }
        
        // TODO add BCH to versionInformation
        
        $horizontalPattern = array_fill(0, 3, array_fill(0, 6, 0));
        $verticalPattern   = array_fill(0, 6, array_fill(0, 3, 0));
        
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $verticalPattern[$i][$j]   = $versionInformation[($i * 3) + $j];
                $horizontalPattern[$j][$i] = $versionInformation[($i * 3) + $j];
            }
        }
        
        $matrix->addPattern($horizontalPattern, $size - 11, 0)
               ->addPattern($verticalPattern, 0, $size - 11);
        
        return $this;
    }
    
    /**
     * Add the bit stream to the matrix
     * 
     * @param int $bitStream
     * @param Matrix $code
     * @param Matrix $codeFunctions
     */
    public function addBitStream($bitStream, Matrix $code, Matrix $codeFunctions) {        
        $size = $code->getSize();
        $maxI = $size / 2 - 1;
        $maxJ = $size * 2 - 1;
        
        $number = 0;
        
        for ($i = $maxI; $i >= 0; $i--) {
            for ($j = $maxJ; $j >= 0; $j--) {
                if (!isset($bitStream[$number])) {
                    $bitStream[$number] = 0;
                }
                
                $vert = floor($j / 2);
                if ($i % 2 == 0) {
                    $vert = $size - 1 - $vert;
                }
                
                $extra = ($i < 3) ? 1 : 0;
                
                if (!is_null($codeFunctions->get($vert, $i * 2 + $j % 2 - $extra))) {
                    continue;
                }
                
                $code->markCode($vert, $i * 2 + $j % 2 - $extra, $bitStream[$number]);
                
                $number++;
            }
        }
    }
    
    /**
     * GENERIC GETTERS/SETTERS
     */

    /**
     * Generic setter for the mask to be used
     * 
     * @param MaskPatternInterface $mask
     */
    public function setMask(MaskPatternInterface $mask) {
        $this->mask = $mask;
    }
    
    /**
     * Generic setter character set to be used
     * 
     * @param CharsetAbstract $charset
     */
    public function setCharset(CharsetAbstract $charset) {
        $this->charset = $charset;
    }
    
    /**
     * Generic setter for the string to be encoded
     * 
     * @param string $string
     */
    public function setString($string) {
        $this->string = $string;
    }
    
    /**
     * Generic setter for the int version number
     * 
     * @param int $version
     */
    public function setVersion($version) {
        $this->version = $version;
    }
    
    /**
     * Generic setter for the error correction level
     * 
     * @param CorrectionAbstract $correction
     */
    public function setErrorCorrection(CorrectionAbstract $correction) {
        $this->correction = $correction;
    }
    
    /**
     * Generic setter for the output printer
     * 
     * @param PrinterInterface $printer
     */
    public function setPrinter(PrinterInterface $printer) {
        $this->printer = $printer;
    }
}