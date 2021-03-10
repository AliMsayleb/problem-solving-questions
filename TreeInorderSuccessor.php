<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Amazon.
// Given a node in a binary search tree, return the next bigger element, also known as the inorder successor.
// For example, the inorder successor of 22 is 30.
//    10
//   /  \
//  5    30
//      /  \
//    22    35
// You can assume each node has a parent pointer.

class Node
{
    public $left;
    public $right;
    public $parent;
    public $data;
    
    public function __construct($data) {
        $this->data = $data;
    }
}

$tree = new Node(10);
$five = new Node(5);
$five->parent = $tree;
$tree->left = $five;
$thirty = new Node(30);
$tt = new Node(22);
$tf = new Node(35);
$thirty->left = $tt;
$thirty->right = $tf;
$tt->parent = $thirty;
$tf->parent = $thirty;
$thirty->parent = $tree;
$tree->right = $thirty;

$data = [$five, $tree, $tt, $thirty, $tf];

foreach($data as $node) {
    echo "After " . $node->data . " comes " . getNext($node).PHP_EOL;
}

function getNext($node) {
    if ($node->right) {
        return minTree($node->right);
    }
    if (!$node->parent) {
        return -9999;
    }
    if ($node === $node->parent->left) {
        return $node->parent->data;
    }
    while ($node->parent && $node === $node->parent->right) {
        $node = $node->parent;
    }
    if (!$node->parent) {
        return -9999;
    }
    
    return $node->data;
}

function minTree($node) {
    if ($node->left) {
        return minTree($node->left);
    }
    
    return $node->data;
}
