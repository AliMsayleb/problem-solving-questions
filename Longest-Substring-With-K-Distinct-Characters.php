<?php

// Hi, here's your problem today. This problem was recently asked by Amazon:

// You are given a string s, and an integer k. Return the length of the longest substring in s that contains at most k distinct characters.

// For instance, given the string:
// aabcdefff and k = 3, then the longest substring with 3 distinct characters would be defff. The answer should be 5.

echo longestSubstring("abababababababcdwewqdqweffqqqqyuyuyuyuyuyuyuyuyeeeq", 3);

function longestSubstring(string $string, int $k): int
{
    $string = str_split($string);
    $size = count($string);
    $currentChar = $string[0];
    $currentSet = [$currentChar => 0];
    $length = 1;
    $max = 0;
    $min = 0;
    for ($i = 1; $i < $size; $i++) {
        if ($string[$i] == $currentChar) {
            $length++;
            continue;
        }

        $currentSet[$currentChar] = [$currentSet[$currentChar], $i];
        $currentChar = $string[$i];
        if (isset($currentSet[$currentChar]) || count($currentSet) < $k) {
            $currentSet[$currentChar] = $i; // save the last start of this character
            $length++;
        } else { // remove first non distinct element
            $currentChar = $string[$i];
            $max = max($max, $length);
            $startIndex = cleanArray($currentSet);
            $length = $i - $startIndex;
            $currentSet[$currentChar] = $i;
            $length++;
        }
    }

    $max = max($max, $length);

    if (count($currentSet) < $k) {
        throw new \Exception ("No enough elements \n");
    }

    return $max;
}

function cleanArray(array &$array)
{
    if (count($array) == 1) {
        foreach ($array as $char => $value) {
            $res = $value[1];
        }
        $array = [];
        return $res;
    }

    $min = null;
    $start = null;
    $minChar = null;

    foreach ($array as $char => $firstOccurrence) {
        if (null === $min || $firstOccurrence[0] < $min) {
            $min = $firstOccurrence[0];
            $minChar = $char;
            $start = $firstOccurrence[1];
        }
    }
    unset($array[$minChar]);

    return $start;
}
