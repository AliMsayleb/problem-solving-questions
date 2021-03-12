<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Facebook.
// Given a list of integers L, find the maximum length of a sequence of consecutive numbers that can be formed using elements from L.
// For example, given L = [5, 2, 99, 3, 4, 1, 100], return 5 as we can build a sequence [1, 2, 3, 4, 5] which has length 5.

$datasets = [
    [[5, 2, 99, 3, 4, 1, 100], 5],
];

foreach ($datasets as $dataset) {
    $result = findLongestSequenceOfConsecutiveNumbers($dataset[0]);
    echo implode(' ', $dataset[0]) ." => ". $result. " (Should be " . $dataset[1] .")".PHP_EOL;
}

function findLongestSequenceOfConsecutiveNumbers(array $elements) {
    $set = [];
    $longestSequence = 0;
    
    foreach ($elements as $element) {
        $set[$element] = true;
    }
    
    foreach ($set as $element => $ignored) {
        if (!isset($set[$element])) {
            continue;
        }
        $currentSequenceLength = 1;
        $currentIndex = $element - 1;
        while (isset($set[$currentIndex])) {
            unset($set[$currentIndex]);
            $currentIndex--;
            $currentSequenceLength++;
        }
        $currentIndex = $element + 1;
        while (isset($set[$currentIndex])) {
            unset($set[$currentIndex]);
            $currentIndex++;
            $currentSequenceLength++;
        }
        unset($set[$element]);
        if ($currentSequenceLength > $longestSequence) {
            $longestSequence = $currentSequenceLength;
        }
    }

    return $longestSequence;
}
