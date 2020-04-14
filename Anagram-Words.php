<?php

// Hi, here's your problem today. This problem was recently asked by AirBNB:

// Given a list of words, group the words that are anagrams of each other. (An anagram are words made up of the same letters).

// Example:

// Input: ['abc', 'bcd', 'cba', 'cbd', 'efg']
// Output: [['abc', 'cba'], ['bcd', 'cbd'], ['efg']]

$results = groupAnagram(['abc', 'bcd', 'cba', 'cbd', 'efg']);
echo json_encode($results)."\n";

function groupAnagram(array $words)
{
    $results = [];
    foreach ($words as $word) {
        $alphabets = initializeAlphabets();
        $letters = str_split($word);
        foreach ($letters as $letter) {
            $alphabets[$letter]++;
        }
        $results[getKey($alphabets)][] = $word;
    }

    return array_values($results);
}

function initializeAlphabets(): array
{
    $alphabets = [
        'a' => 0,
        'b' => 0,
        'c' => 0,
        'd' => 0,
        'e' => 0,
        'f' => 0,
        'g' => 0,
        'h' => 0,
        'i' => 0,
        'j' => 0,
        'k' => 0,
        'l' => 0,
        'm' => 0,
        'n' => 0,
        'o' => 0,
        'p' => 0,
        'q' => 0,
        'r' => 0,
        's' => 0,
        't' => 0,
        'u' => 0,
        'v' => 0,
        'w' => 0,
        'x' => 0,
        'y' => 0,
        'z' => 0,
    ];

    return $alphabets;
}

function getKey($alphabets)
{
    $key = "";
    foreach($alphabets as $char => $rep) {
        if ($rep != 0) {
            $key .= "$rep$char";
        }
    }
    return $key;
}