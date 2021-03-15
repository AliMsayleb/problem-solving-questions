<?php

// Good morning! Here's your coding interview problem for today.

// This problem was asked by Google.
// Given a binary search tree and a range [a, b] (inclusive), 
// return the sum of the elements of the binary search tree within the range.
// For example, given the following tree:
//     5
//   / \
//   3   8
//  / \ / \
// 2  4 6  10
// and the range [4, 9], return 23 (5 + 4 + 6 + 8).

$tree = new Tree(5);
$tree->left = new Tree(3);
$tree->left->left = new Tree(2);
$tree->left->right = new Tree(4);

$tree->right = new Tree(8);
$tree->right->left = new Tree(6);
$tree->right->right = new Tree(10);

echo getSumInclusive([4, 9], $tree);

class Tree
{
    public $data;
    public $left;
    public $right;
    
    public function __construct($data) {
        $this->data = $data;
    }
}

function getSumInclusive($range, $tree) {
    if ($tree == null) {
        return 0;
    }
    
    if ($tree->data < $range[0]) {
        return getSumInclusive($range, $tree->right);
    } else if ($tree->data > $range[1]) {
        return getSumInclusive($range, $tree->left);
    }
    
    $left = getSumInclusive($range, $tree->left);
    $right = getSumInclusive($range, $tree->right);
    
    return $tree->data + $left + $right;
}