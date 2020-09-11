<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Google.
// The edit distance between two strings refers to the minimum number of character insertions, deletions, and substitutions required to change one string to the other.
// For example, the edit distance between “kitten” and “sitting” is three: substitute the “k” for “s”, substitute the “e” for “i”, and append a “g”.
// Given two strings, compute the edit distance between them.

// Solution is using Levenshtein distance algorithm
// Follow it on https://en.wikipedia.org/wiki/Levenshtein_distance

assert(distance('sitting', 'kitten') == 3);
assert(distance('kitten', 'sitting') == 3);
assert(distance('Satur', 'Spuus') == 3);
assert(distance('Saturday', 'Sunday') == 3);

function min3($a, $b, $c) 
{
    if ($a <= $b && $a <= $c) {
        return $a;
    } else if ($b <= $a && $b <= $c) {
        return $b;
    }
    return $c;
}

function distance($str1, $str2)
{
    $matrix = [];
    for ($i = 0; $i <= strlen($str1); $i++) {
        $matrix[$i][0] = $i;
    }
    for ($i = 0; $i <= strlen($str2); $i++) {
        $matrix[0][$i] = $i;
    }
    for ($i = 1; $i <= strlen($str1); $i++) {
        for ($j = 1; $j <= strlen($str2); $j++) {
            $min = min3($matrix[$i - 1][$j], $matrix[$i][$j - 1], $matrix[$i - 1][$j - 1]);
            if ($str1[$i - 1] != $str2[$j - 1]) {
                $min++;
            }
            $matrix[$i][$j] = $min;
        }
    }
    
    return $matrix[count($matrix)-1][count($matrix[0]) - 1];
}