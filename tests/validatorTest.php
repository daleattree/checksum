<?php


class validatorTest extends PHPUnit_Framework_TestCase
{
    public function testNumericGeneratedValue(){
        $value = 815171511;

        $result = \daleattree\CheckSum\CheckSum::mod97_10_validator($value);

        $this->assertTrue($result);
    }

    public function testNonNumericGeneratedValue(){
        $value = 'A0815171511';

        $result = \daleattree\CheckSum\CheckSum::mod97_10_validator($value, true);

        $this->assertTrue($result);
    }
}