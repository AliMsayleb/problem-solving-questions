<?php

//Hi, here's your problem today. This problem was recently asked by Twitter:
//You are given an array of integers. Find the maximum sum of all possible contiguous subarrays of the array.
//Example:
//[34, -50, 42, 14, -5, 86]
//Given this input array, the output should be 137. The contiguous subarray with the largest sum is [42, 14, -5, 86].
//Your solution should run in linear time.

$example = [34, -50, 42, 14, -5, 86];
$sum = 0;
$maxSum = 0;

foreach($example as $element) {

    if ($element > 0) {
        $sum += $element;
    } else if ($element < 0) {
        $maxSum = max($sum, $maxSum);
        if ($sum + $element <= 0) {
            $sum = 0;
        } else {
            $sum += $element;
        }
    }
}

$maxSum = max($sum, $maxSum);

echo $maxSum;