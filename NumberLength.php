<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Amazon.
// Write a function that takes a natural number as input and returns the number of digits the input has.
// Constraint: don't use any loops.

$datasets = [
    '0' => 1,
    '1' => 1,
    '9' => 1,
    '10' => 2,
    '99' => 2,
    '100' => 3,
    '101' => 3,
    '999' => 3,
    '999578' => 6,
];

foreach ($datasets as $number => $expectedValue) {
    $length = numberLength($number);
    echo "Number of digits in $number is $expectedValue, my calculation is $length\n";
}

function numberLength($number) {
    return (int)log10($number) + 1;
}

function numberLength2($number) {
    return strlen($number.'');
}
