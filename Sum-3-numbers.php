<?php

// Given an array, nums, of n integers, find all unique triplets (three numbers, a, b, & c) in nums such that a + b + c = 0.
// Note that there may not be any triplets that sum to zero in nums, and that the triplets must not be duplicates.

// Input: nums = [0, -1, 2, -3, 1]
// Output: [0, -1, 1], [2, -3, 1]

foreach (getSetsSummingToZero([0, -1, 2, -3, 1, 2, 1, 0, -3]) as $solution) {
    echo "[$solution[0]. $solution[1], $solution[2]]\n";
}

function getSetsSummingToZero(array $array): array
{

    if (($size = count($array)) <= 3) {
        return [];
    }

    $solvedSet = [];
    $results = [];
    $sortedResults = [];
    for ($i = 0; $i < $size; $i++) {
        if (isset($solvedSet[$array[$i]])) {
            continue;
        } else {
            $solvedSet[$array[$i]] = true;
        }
        $currentSets = [];
        $currentNumber = $array[$i];
        for ($j = $i + 1; $j < $size; $j++) {
            $sum = $currentNumber + $array[$j];
            if (isset($currentSets[($sum) * (-1)])) {
                checkAndAdd($currentNumber, $array[$j], $sortedResults, $results);
            } else {
                $currentSets[$array[$j]] = true;
            }
        }
    }

    return $results;
}

function checkAndAdd(int $firstNumber, int $secondNumber, &$sortedResultsArray, &$results)
{
    $thirdNumber = (0 - $firstNumber) - $secondNumber;
    $minmax = min($firstNumber, $secondNumber, $thirdNumber) ." ". max($firstNumber, $secondNumber, $thirdNumber);
    if (isset($sortedResultsArray[$minmax])) {
        return;
    }
    $results[] = [$firstNumber, $secondNumber, $thirdNumber];
    $sortedResultsArray[$minmax] = true;
}