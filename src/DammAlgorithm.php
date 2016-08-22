<?php


namespace daleattree\CheckSum;

/**
 * Class DammAlgorithm
 * @package daleattree\CheckSum
 * @see https://en.wikibooks.org/wiki/Algorithm_Implementation/Checksums/Damm_Algorithm#PHP
 */
class DammAlgorithm
{
    /**
     * The quasigroup table from http://www.md-software.de/math/DAMM_Quasigruppen.txt
     *
     * @var $matrix array
     */
    protected static $matrix = array(
        array(0, 3, 1, 7, 5, 9, 8, 6, 4, 2),
        array(7, 0, 9, 2, 1, 5, 4, 8, 6, 3),
        array(4, 2, 0, 6, 8, 7, 1, 3, 5, 9),
        array(1, 7, 5, 0, 9, 8, 3, 4, 2, 6),
        array(6, 1, 2, 3, 0, 4, 5, 9, 7, 8),
        array(3, 6, 7, 4, 2, 0, 9, 5, 8, 1),
        array(5, 8, 6, 9, 7, 2, 0, 1, 3, 4),
        array(8, 9, 4, 5, 3, 6, 2, 0, 1, 7),
        array(9, 4, 3, 8, 6, 1, 7, 2, 0, 5),
        array(2, 5, 8, 1, 4, 3, 6, 7, 9, 0),
    );

    /**
     * Calculate the checksum digit from provided number
     *
     * @param $number
     * @return int
     * @throws \Exception
     */
    public static function encode($number) {
        if(!is_numeric($number)){
            throw new \Exception('Invalid number provided');
        }

        $number = $number * 1; //do this to remove any leading zero's
        $numbers = str_split($number);
        while(list($k, $v) = each($numbers)){
            $numbers[$k] = (int) $v;
        }
        reset($numbers);

        /* @var $interim int */
        $interim = 0;
        /* @var $i int */
        for ($i=0; $i < count($numbers); $i++) {
            $interim = self::$matrix[$interim][$numbers[$i]];
        }

        return $interim;
    }

    /**
     * Checks the checksum digit from provided number
     *
     * @param $number
     * @return bool
     */
    public static function check($number) {
        return (0 == self::encode($number));
    }
}