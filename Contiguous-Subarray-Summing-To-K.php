<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Lyft.
// Given a list of integers and a number K, return which contiguous elements of the list sum to K.
// For example, if the list is [1, 2, 3, 4, 5] and K is 9, then it should return [2, 3, 4], since 2 + 3 + 4 = 9.

var_dump(getDataSubsetSummingToK([1, 2, 3, 4, 5], 9));

function getDataSubsetSummingToK(array $dataSet, int $k) {
    $start = 0;
    $end = 0;
    $currentSum = 0;
    while ($end < count($dataSet) && $currentSum < $k) {
        $currentSum += $dataSet[$end];
        $end++;
    }
    while ($currentSum !== $k && $end < count($dataSet)) {
        if ($currentSum > $k) {
            $currentSum -= $dataSet[$start++];
        } else {
            $currentSum += $dataSet[$end++];
        }
    }
    if ($currentSum !== $k) {
        return [-1];
    }

    return array_slice($dataSet, $start, $end - $start);
}
