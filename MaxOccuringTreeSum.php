<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Apple.
// Given the root of a binary tree, find the most frequent subtree sum.
// The subtree sum of a node is the sum of all values under a node, including the node itself.
// For example, given the following tree:
//   5
//  / \
// 2  -5
// Return 2 as it occurs twice: once as the left leaf, and once as the sum of 2 + 5 - 5.

class Tree
{
    public $left;
    public $right;
    public $value;
    public function __construct($value, $left = null, $right = null)
    {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }
}

$left = new Tree(2);
$right = new Tree(-5);
$root = new Tree(5, $left, $right);
assert(getMostRecurringSum($root), 2);

function getMostRecurringSum($root)
{
    $result = getMostRecurringSumHelper($root);
    $max = 0;
    $maxSum = 0;
    foreach ($result[1] as $sum => $occurence) {
        if ($occurence > $max) {
            $maxSum = $sum;
            $occurence = $max;
        }
    }
    
    return $maxSum;
}

function getMostRecurringSumHelper($root)
{
    if (!$root) {
        return [0, []];
    }
    
    if (!$root->left && !$root->right) {
        return [$root->value, [$root->value => 1]];
    }
    
    $left = getMostRecurringSumHelper($root->left);
    $right = getMostRecurringSumHelper($root->right);
    
    $result = $right;
    $sum = $left[0] + $right[0] + $root->value;
    foreach($left[1] as $key => $value) {
        $result[$key] = isset($result[$key]) ? $result[$key] + $value : $value;
    }
    $result[$sum] = isset($result[$sum]) ? $result[$sum]++ : 1;
    
    return [$sum, $result];
}
