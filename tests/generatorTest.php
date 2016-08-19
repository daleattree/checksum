<?php


class generatorTest extends PHPUnit_Framework_TestCase
{
    public function testNumericGeneratedValue(){
        $expected = 815171511;

        $id = 8151715;

        $generatedValue = \daleattree\CheckSum\CheckSum::mod97_10_generator($id);

        $this->assertEquals($expected, $generatedValue);
    }

    public function testNonNumericGeneratedValue(){
        $expected = 815171511;

        $id = 'A08151715';

        $generatedValue = \daleattree\CheckSum\CheckSum::mod97_10_generator($id, true);

        $this->assertEquals($expected, $generatedValue);
    }
}