<?php

namespace SeoworkTest;

class SumHelper
{
    const SIZE = 10;

    static function sum2($num1, $num2)
    {
        $numArray1 = mb_str_split($num1);
        $numArray2 = mb_str_split($num2);
        $numArray1 = array_reverse($numArray1);
        $numArray2 = array_reverse($numArray2);
        $carry = 0;

        for ($i = 0; $i < max(count($numArray1), count($numArray2)) || $carry; $i++) {
            if ($i == count($numArray1)) {
                $numArray1[] = 0;
            }

            $numArray1[$i] += $carry + ($i < count($numArray2) ? $numArray2[$i] : 0);
            $carry = $numArray1[$i] >= self::SIZE;

            if ($carry) {
                $numArray1[$i] -= self::SIZE;
            }
        }

        return implode(array_reverse($numArray1));
    }

    static function sum($num1, $num2)
    {
        $result = "";
        $flag = 0;
        $num1Count = mb_strlen($num1) - 1;
        $num2Count = mb_strlen($num2) - 1;
        for ($i = max($num1Count, $num2Count); $i >= 0; $i--, $num1Count--, $num2Count--) {
            $num1t = ($num1Count >= 0) ? $num1[$num1Count] : 0;
            $num2t = ($num2Count >= 0) ? $num2[$num2Count] : 0;
            $num = $num1t + $num2t + $flag;
            $flag = intval($num / 10);
            $num -= $flag * 10;
            $result = $num . $result;
        }
        if ($flag == 1)
            $result = $flag . $result;

        return $result;
    }
}
