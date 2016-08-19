<?php
namespace daleattree\CheckSum;

class CheckSum
{
    const MOD97_10_MODULUS = 97;
    const MOD97_10_MULTIPLIER = 100;

    /**
     * Generates a checksum based on MOD97-10 and returns the new value with checksum
     * @param $id
     * @param bool $stripNonNumeric
     * @return float
     * @throws \Exception
     * @see https://usersite.datalab.eu/printclass.aspx?type=wiki&id=91772
     */
    public static function mod97_10_generator($id, $stripNonNumeric = false)
    {
        if($stripNonNumeric){
            $id = preg_replace('/[^0-9]/', '', $id);
        }

        if(!is_numeric($id)){
            throw new \Exception('Invalid ID specified. ID must be numeric');
        }

        $value = $id * self::MOD97_10_MULTIPLIER;
        $checksum = (self::MOD97_10_MODULUS + 1) - ($value % self::MOD97_10_MODULUS);

        echo $value . ' : ' . $checksum . PHP_EOL;

        $reference = $value + $checksum;

        return $reference;
    }

    /**
     * Validates the value containing the checksum against MOD97-10
     * @param $value
     * @param bool $stripNonNumeric
     * @return bool
     * @throws \Exception
     */
    public static function mod97_10_validator($value, $stripNonNumeric = false)
    {
        if($stripNonNumeric){
            $value = preg_replace('/[^0-9]/', '', $value);
        }

        if(!is_numeric($value)){
            throw new \Exception('Invalid ID specified. ID must be numeric');
        }

        if (($value % self::MOD97_10_MODULUS) == 1) {
            return true;
        }

        return false;
    }
}