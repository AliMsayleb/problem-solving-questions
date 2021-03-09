<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Alibaba.
// Given an even number (greater than 2), return two prime numbers whose sum will be equal to the given number.
// A solution will always exist. See Goldbach’s conjecture. https://en.wikipedia.org/wiki/Goldbach%27s_conjecture
// Example:
// Input: 4
// Output: 2 + 2 = 4
// If there are more than one solution possible, return the lexicographically smaller solution.
// If [a, b] is one solution with a <= b, and [c, d] is another solution with c <= d, then
// [a, b] < [c, d]
// If a < c OR a==c AND b < d.

$dataSets = [4, 8, 12, 16, 20, 24, 28, 32, 34];

foreach ($dataSets as $data) {
    $result = getFirstTwoPrimeNumbersSummingToEvenNumber($data);
    echo $data . " is " . $result[0] . " + " . $result[1] . PHP_EOL;
}

function getFirstTwoPrimeNumbersSummingToEvenNumber(int $x) {
    $primeNumbersUpToX = getFirstPrimeNumbersUpToN($x);
    foreach ($primeNumbersUpToX as $primeNumber => $d) {
        if (isset($primeNumbersUpToX[$x - $primeNumber])) {
            return [$primeNumber, $x - $primeNumber];
        }
    }
}

function getFirstPrimeNumbersUpToN($n) {
    $primeNumbers = ['2' => true];
    for ($i = 3; $i <= $n; $i++) {
        $isPrime = true;
        foreach ($primeNumbers as $primeNumber => $x) {
            if ($i % $primeNumber === 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) {
            $primeNumbers[$i] = true;
        }
    }

    return $primeNumbers;
}
