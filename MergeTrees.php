<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Salesforce.
// Write a program to merge two binary trees. 
// Each node in the new tree should hold a value equal to the sum of the values
// of the corresponding nodes of the input trees.
// If only one input tree has a node in a given position, 
// the corresponding node in the new tree should match that input node.

//      1
//   2     3
//  4 5   7 8
//+
//      3
//   2
//  3
//
//       =
//       4
//    4      3
//   7 5    7 8

class Tree
{
    public $data;
    public $left;
    public $right;
    
    public function __construct($data) {
        $this->data = $data;
    }
}

$tree1 = new Tree(1);
$tree1->left = new Tree(2);
$tree1->left->left = new Tree(4);
$tree1->left->right = new Tree(5);
$tree1->right = new Tree(3);
$tree1->right->left = new Tree(7);
$tree1->right->right = new Tree(8);

$tree2 = new Tree(3);
$tree2->left = new Tree(2);
$tree2->left->left = new Tree(3);

$mergeTree = mergeTrees($tree1, $tree2);
printTree($mergeTree);
var_dump($mergeTree);

function mergeTrees($tree1, $tree2) {
    $data1 = $tree1 ? $tree1->data : 0;
    $data2 = $tree2 ? $tree2->data : 0;
    if (!$tree1 && !$tree2) {
        return null;
    }
    $head = new Tree($data1 + $data2);
    $head->left = mergeTrees($tree1->left ?? null, $tree2->left ?? null);
    $head->right = mergeTrees($tree1->right ?? null, $tree2->right ?? null);
    
    return $head;
}

function printTree($tree) {
    if (!$tree) {
        return;
    }
    printTree($tree->left);
    echo $tree->data . " ";
    printTree($tree->right);
}
