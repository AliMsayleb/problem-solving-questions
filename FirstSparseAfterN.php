<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Oracle.
// We say a number is sparse if there are no adjacent ones in its binary representation.
// For example, 21 (10101) is sparse, but 22 (10110) is not.
// For a given input N, find the smallest sparse number greater than or equal to N.
// Do this in faster than O(N log N) time.

// Solution is of complexity log(N)

for ($currentTest = 0; $currentTest < 35; $currentTest++) {
    $result = getFirstSparseAfterN($currentTest);
    echo $currentTest . "(" . decbin($currentTest) . ") becomes " . $result . "(" . decbin($result) . ")" . PHP_EOL;
}

function getFirstSparseAfterN($n)
{
    if ($n <= 2) {
        return $n;
    }
    $binaryCharArray = str_split(decbin($n));
    for ($i = 0; $i < count($binaryCharArray) - 1; $i++) {
        if ($binaryCharArray[$i] == '0' && $binaryCharArray[$i+1] == '0') {
            $lastTwoConsecutiveZerosIndex = $i + 1; // get last index where i can insert a 1 instead of 0
        } else if ($binaryCharArray[$i] == '1' && $binaryCharArray[$i+1] == '1' ) {
            if (!isset($lastTwoConsecutiveZerosIndex)) {
                return firstNumberWithOneMoreBitAfterN($n);
            } else {
                $binaryCharArray[$lastTwoConsecutiveZerosIndex] = '1';
                for ($j = $lastTwoConsecutiveZerosIndex + 1; $j < count($binaryCharArray); $j++) {
                    $binaryCharArray[$j] = '0';
                }
                return bindec(implode($binaryCharArray));
            }
        }
    }
    
    return $n;
}

function firstNumberWithOneMoreBitAfterN($n) {
    $j = 1;
    for (; $j <= $n; $j *= 2) {}

    return $j;
}
