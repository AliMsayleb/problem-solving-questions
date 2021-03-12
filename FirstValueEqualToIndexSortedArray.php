<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Amazon.
// Given a sorted array arr of distinct integers, return the lowest index i for which arr[i] == i. Return null if there is no such index.
// For example, given the array [-5, -3, 2, 3], return 2 since arr[2] == 2. Even though arr[3] == 3, we return 2 since it's the lowest index.


// Implementation using binary search (since it's a sorted array)
$datasets = [
    [[-5, -3, 2, 3], 2],
    [[-3, -2, 1, 2, 4], 4],
    [[0, 9, 12, 14], 0],
    [[0, 9, 12, 14, 15], 0],
    [[-5, 1, 12, 14, 15], 1],
    [[-5, 1, 12, 14], 1],
    [[-3, -2, -1, 0, 1, 3, 5, 7, 8, 9, 10], 7],
];

foreach ($datasets as $dataset) {
    echo implode(' ', $dataset[0]) ." => ". getLowestElementEqualsToIndex($dataset[0]). " (Should be " . $dataset[1] .")".PHP_EOL;
}

function getLowestElementEqualsToIndex(array $elements) : ?int {
    $start = 0;
    $end = count($elements) - 1;
    while ($end - $start > 1) {
        $mid = intval(($start + $end ) / 2);
        if ($elements[$mid] < $mid) {
            $start = $mid;
        } else if ($elements[$mid] >= $mid) {
            $end = $mid;
        }
    }
    if ($elements[$start] == $start) {
        return $start;
    } else if ($elements[$end] == $end) {
        return $end;
    }

    return null;
}