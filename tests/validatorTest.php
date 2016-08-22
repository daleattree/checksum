<?php


class validatorTest extends PHPUnit_Framework_TestCase
{
    public function testMod9710NumericGeneratedValue(){
        $value = 815171511;

        $result = \daleattree\CheckSum\CheckSum::mod9710Validator($value);

        $this->assertTrue($result);
    }

    public function testMod9710NonNumericGeneratedValue(){
        $value = 'A0815171511';

        $result = \daleattree\CheckSum\CheckSum::mod9710Validator($value, true);

        $this->assertTrue($result);
    }
}