<?php

// Good morning! Here's your coding interview problem for today.

// This problem was asked by Microsoft.

// Given a 2D matrix of characters and a target word,
// write a function that returns whether the word can be found in the matrix by going left-to-right, or up-to-down.

// For example, given the following matrix:

// [['F', 'A', 'C', 'I'],
//  ['O', 'B', 'Q', 'P'],
//  ['A', 'N', 'O', 'B'],
//  ['M', 'A', 'S', 'S']]
// and the target word 'FOAM', you should return true, since it's the leftmost column.
// Similarly, given the target word 'MASS', you should return true, since it's the last row.

$grid = [
    ['F', 'A', 'C', 'I'],
    ['O', 'B', 'Q', 'P'],
    ['A', 'N', 'O', 'B'],
    ['M', 'A', 'S', 'S'],
];

$word1 = 'FOAM';
$word2 = 'MASS';
$word3 = 'ALI';

var_dump(findWordInGrid($word1, $grid));
var_dump(findWordInGrid($word2, $grid));
var_dump(findWordInGrid($word3, $grid));

function findWordInGrid(string $word, array $grid) {
    $H = count($grid);
    $W = count($grid[0]);

    for ($i = 0; $i < $H; $i++) {
        for ($j = 0; $j < $W; $j++) {
            if ($grid[$i][$j] == $word[0]) {
                // Look to the right
                $k = 0;
                for (; $k < strlen($word) && $j+$k < $W; $k++) {
                    if ($word[$k] != $grid[$i][$k]) {
                        break;
                    }
                }
                if ($k == strlen($word)) {
                    return true;
                }
                // Look downwards
                $k = 0;
                for (; $k < strlen($word) && $i+$k < $H; $k++) {
                    if ($word[$k] != $grid[$k][$j]) {
                        break;
                    }
                }
                if ($k == strlen($word)) {
                    return true;
                }
            }
        }
    }

    return false;
}
