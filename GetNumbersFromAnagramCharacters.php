<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Slack.
// You are given a string formed by concatenating several words corresponding to the integers zero through nine and then anagramming.
// For example, the input could be 'niesevehrtfeev', which is an anagram of 'threefiveseven'. Note that there can be multiple instances of each integer.
// Given this string, return the original integers in sorted order. In the example above, this would be 357.

$word = "ninethroneninefotwoureesetwofourninethreesevenveneighttwo";
$result = solve($word);
echo $word . " is actually " . $result . PHP_EOL;

function solve($word) {
    $firstLevel = [
        'z' => ['z', 'e', 'r', 'o'],
        'w' => ['t', 'w', 'o'],
        'u' => ['f', 'o', 'u', 'r'],
        'x' => ['s', 'i', 'x'],
        'g' => ['e', 'i', 'g', 'h', 't']
    ];
    $charToNumber1 = [
        'z' => '0',
        'w' => '2',
        'u' => '4',
        'x' => '6',
        'g' => '8'
    ];

    $secondLevel = [
        'o' => ['o', 'n', 'e'], 
        'h' => ['t', 'h', 'r', 'e', 'e'], 
        'f' => ['f', 'i', 'v', 'e']
    ];
    $charToNumber2 = [
        'o' => '1',
        'h' => '3',
        'f' => '5',
    ];

    $thirdLevel = [
        'v' => ['s', 'e', 'v', 'e', 'n'],
        'i' => ['n', 'i', 'n', 'e'],
    ];
    $charToNumber3 = [
        'v' => '7',
        'i' => '9',
    ];

    $result = "";
    $result .= process($firstLevel, $word, $charToNumber1);
    $result .= process($secondLevel, $word, $charToNumber2);
    $result .= process($thirdLevel, $word, $charToNumber3);
    $x = str_split($result);
    sort($x);
    return implode($x);
}

function process(&$keyCharactersMap, &$fullWord, $charToNumber) {
    $keyCharactersCount = [];
    $count = [];
    $result = "";
    foreach($keyCharactersMap as $keyCharacter => $keyCharacterWord) {
        $keyCharactersCount[$keyCharacter] = 0;
        foreach($keyCharacterWord as $keyCharacterWordCharacter) {
            $count[$keyCharacterWordCharacter] = 0;
        }
    }

    for ($i = strlen($fullWord) - 1; $i >= 0; $i--) {
        if (isset($keyCharactersMap[$fullWord[$i]])) {
            $wordOfCurrentChar = $keyCharactersMap[$fullWord[$i]];
            $keyCharactersCount[$fullWord[$i]]++;
            foreach ($wordOfCurrentChar as $charTemp) {
                $count[$charTemp]++;
            }
        }
    }

    foreach($keyCharactersMap as $keyCharacter => $keyCharacterWord) {
        for ($i = 0; $i < $count[$keyCharacter]; $i++) {
            $result .= "" . $charToNumber[$keyCharacter];
        }
    }
    
    for ($i = strlen($fullWord) - 1; $i >= 0; $i--) {
        if (shouldRemoveCharacter($fullWord[$i], $count)) {
            $count[$fullWord[$i]]--;
            removeCharacter($fullWord, $i);
        }
    }

    return $result;
}

function shouldRemoveCharacter($char, $count) {
    return isset($count[$char]) && ($count[$char] > 0);
}

function removeCharacter(&$fullWord, $i) {
    $fullWord[$i] = 'M';
}
