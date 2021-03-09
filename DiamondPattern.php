<?php

// https://codeforces.com/problemset/problem/118/B
// Given an integer n > 1
// return the following pattern
// for n = 2
//
//     0
//   0 1 0
// 0 1 2 1 0
//   0 1 0
//     0
//
// for n = 3
//       0
//     0 1 0
//   0 1 2 1 0
// 0 1 2 3 2 1 0
//   0 1 2 1 0
//     0 1 0
//       0

drawPattern(2);
drawPattern(3);

function drawPattern(int $n) {
    for ($x = 0; $x < ($n * 2) + 1; $x++) {
        $spaces = abs($n - $x) * 2;
        echoCharNTimes(" ", $spaces);
        $rowMaxNumber = getRowMaxNumber($x, $n);
        for ($i = 0; $i < $rowMaxNumber; $i++) {
            echo $i." ";
        }
        echo $rowMaxNumber;
        for ($i = $rowMaxNumber - 1; $i >= 0; $i--) {
            echo $i." ";
        }
        echo PHP_EOL;
    }
}

function echoCharNTimes($char, $n) {
    for ($i = 0; $i < $n; $i++) {
        echo $char;
    }
}

function getRowMaxNumber($x, $n) {
    if ($x <= $n) {
        return $x;
    }
    return (2 * $n) - $x;
}
