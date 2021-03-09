<?php

// Good morning! Here's your coding interview problem for today.
// This question was asked by Zillow.
// You are given a 2-d matrix where each cell represents number of coins in that cell. 
// Assuming we start at matrix[0][0], and can only move right or down, find the maximum number of coins you can collect by the bottom right corner.
// For example, in this matrix

// 0 3 1 1
// 2 0 0 4
// 1 5 3 1
// The most we can collect is 0 + 2 + 1 + 5 + 3 + 1 = 12 coins.

$grid = [
    [0, 3, 1, 1],
    [2, 0, 0, 4],
    [1, 5, 3, 1]
];

echo getMaxPath($grid);

function getMaxPath($grid) {
    $gridValues = $grid; // copying the original grid
    
    for ($i = 1; $i < count($grid[0]); $i++) {
        $gridValues[0][$i] += $gridValues[0][$i - 1];
    }
    for ($i = 1; $i < count($grid); $i++) {
        $gridValues[$i][0] += $gridValues[$i - 1][0];
    }
    
    for ($i = 1; $i < count($grid); $i++) {
        for ($j = 1; $j < count($grid[0]); $j++) {
            $gridValues[$i][$j] += max($gridValues[$i-1][$j], $gridValues[$i][$j-1]);
        }
    }

    return $gridValues[count($gridValues) - 1][count($gridValues[0]) - 1];
}