<?php

use QR\Matrix;

require_once __DIR__ . '/../../src/QR/QR.php';

class MatrixTest extends PHPUnit_Framework_TestCase {
    public function testVersionConstruct() {
        $matrix = new Matrix(1);
        
        $this->assertEquals(1, $matrix->getVersion());
        $this->assertEquals(array_fill(0, 21, array_fill(0, 21, null)), $matrix->getArray());
    }
    
    public function testArrayConstruct() {
        $randArray = array_fill(0, 21, array_fill(0, 21, rand(0, 1)));
        $matrix = new Matrix($randArray);
        
        $this->assertEquals(1, $matrix->getVersion());
        $this->assertEquals($randArray, $matrix->getArray());
    }
    
    public function testSize() {
        $matrix = new Matrix(1);
        
        $matrix->setSize(25);
        $this->assertEquals(2,  $matrix->getVersion());
        $this->assertEquals(25, $matrix->getSize());
             
    }
    
    public function testVersion() {
        $matrix = new Matrix(1);
        
        $matrix->setVersion(2);
        $this->assertEquals(2,  $matrix->getVersion());
        $this->assertEquals(25, $matrix->getSize());
             
    }
    
    public function testGetArray() {
        $randArray = array_fill(0, 21, array_fill(0, 21, rand(0, 1)));
        $matrix = new Matrix($randArray);
        
        $this->assertEquals($randArray, $matrix->getArray());
    }
    
    public function testAddPattern() {
        $pattern = array(
            array(1,0,1),
            array(0,1,0),
            array(1,0,1)
        );
        
        $matrix = new Matrix(1);
        $matrix->addPattern($pattern, 0, 0);
        
        $matrixArray = $matrix->getArray();
        
        $slice = array();
        
        for ($i = 0; $i < 3; $i++) {
            $slice[] = array_slice($matrixArray[$i], 0, 3);
        }
        
        $this->assertEquals($slice, $pattern);
    }
    
    public function testMarkCode() {
        $matrix = new Matrix(1);
        $matrix->markCode(0, 0, 1);
        $this->assertEquals(1, $matrix->get(0, 0));
    }
}