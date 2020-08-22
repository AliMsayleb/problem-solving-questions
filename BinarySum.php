<?php

// Hi, here's your problem today. This problem was recently asked by Facebook:
// Given two binary numbers represented as strings, return the sum of the two binary numbers as a new binary represented as a string.
// Do this without converting the whole binary string into an integer.
// Here's an example and some starter code.
// print(sum_binary("11101", "1011"))
// 101000

echo binary_sum("11101", "1011");

function binary_sum(string $num1, string $num2)
{
    $num1 = prefillWithZeros($num1, max(0, strlen($num2) - strlen($num1)));
    $num2 = prefillWithZeros($num2, max(0, strlen($num1) - strlen($num2)));
    $result = "";
    $carry = 0;
    
    for ($i = strlen($num1) - 1; $i >= 0; $i --) {
        $sumAnswer = sumTwoDigits($num1[$i], $num2[$i], $carry);
        $result = $sumAnswer[0] ."". $result;
        $carry = $sumAnswer[1];
    }

    return $carry ? "1".$result : $result;
}

function sumTwoDigits(string $num1, string $num2, int $carry)
{
    $sum = (int)$num1 + (int)$num2 + $carry;
    if ($sum > 1) {
        $carry = 1;
    }
    return [$sum % 2, $carry];
}

function prefillWithZeros(string $str, int $number)
{
    $prefix = "";
    for($i = 0; $i < $number; $i++) {
        $prefix .= "0";
    }
    return $prefix.$str;
}