<?php

// Hi, here's your problem today. This problem was recently asked by LinkedIn:

// Given a 2-dimensional grid consisting of 1's (land blocks) and 0's (water blocks), count the number of islands present in the grid.
// The definition of an island is as follows:
// 1.) Must be surrounded by water blocks.
// 2.) Consists of land blocks (1's) connected to adjacent land blocks (either vertically or horizontally).
// Assume all edges outside of the grid are water.

// example
// 10001
// 11000
// 10110    should output 3
// 00000

$island = [
    [1, 1, 1, 0],
    [0, 1, 0, 0],
    [0, 0, 1, 0],
    [0, 0, 1, 0],
    [1, 0, 0, 0],
];

echo countIslands($island);

function countIslands(array $grid): int
{
    $counter = 0;
    for ($i = 0; $i < count($grid); $i++) {
        for ($j = 0; $j < count($grid[0]); $j++) {
            if (traverseAndClear($grid, $i, $j)) {
                $counter++;
            }
        }
    }

    return $counter;
}

function traverseAndClear(array &$grid, int $i, int $j): bool
{
    if ($i < 0 || $j < 0 || $i >= count($grid) || $j >= count($grid[0])) {
        return false;
    }

    if ($grid[$i][$j] == 0 ) {
        return false;
    }

    $grid[$i][$j] = 0;
    traverseAndClear($grid, $i + 1, $j);
    traverseAndClear($grid, $i - 1, $j);
    traverseAndClear($grid, $i, $j + 1);
    traverseAndClear($grid, $i, $j - 1);

    return true;
}
