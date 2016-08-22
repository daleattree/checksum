<?php


class generatorTest extends PHPUnit_Framework_TestCase
{
    public function testMod9710NumericGeneratedValue(){
        $expected = 815171511;

        $id = 8151715;

        $generatedValue = \daleattree\CheckSum\CheckSum::mod9710Generator($id);

        $this->assertEquals($expected, $generatedValue);
    }

    public function testMod9710NonNumericGeneratedValue(){
        $expected = 815171511;

        $id = 'A08151715';

        $generatedValue = \daleattree\CheckSum\CheckSum::mod9710Generator($id, true);

        $this->assertEquals($expected, $generatedValue);
    }

    public function testDammNumericGeneratedValue(){
        $expected = 5724;

        $id = 572;

        $generatedValue = \daleattree\CheckSum\CheckSum::dammGenerator($id);

        $this->assertEquals($expected, $generatedValue);
    }

    public function testDammNonNumericGeneratedValue(){
        $expected = 5724;

        $id = 'B000572';

        $generatedValue = \daleattree\CheckSum\CheckSum::dammGenerator($id, true);

        $this->assertEquals($expected, $generatedValue);
    }
}