<?php

// This problem was asked by Microsoft.
// Suppose an arithmetic expression is given as a binary tree.
// Each leaf is an integer and each internal node is one of '+', '−', '∗', or '/'.
// Given the root to such a tree, write a function to evaluate it.
// For example, given the following tree:

//     *
//    / \
//   +    +
//  / \  / \
// 3  2  4  5
// You should return 45, as it is (3 + 2) * (4 + 5).

include_once 'Node.php';

$leaf1 = new BinaryTreeNode(null, null, 3);
$leaf2 = new BinaryTreeNode(null, null, 2);
$leaf3 = new BinaryTreeNode(null, null, 4);
$leaf4 = new BinaryTreeNode(null, null, 5);
$nodeSum1 = new BinaryTreeNode($leaf1, $leaf2, '+');
$nodeSum2 = new BinaryTreeNode($leaf3, $leaf4, '+');
$nodeMultiply = new BinaryTreeNode($nodeSum1, $nodeSum2, '*');
$head = $nodeMultiply;

echo evaluate($head);

function evaluate($node)
{
    if (in_array($node->getValue(), ['-','+', '*', '/'])) {
        return evalOperation(evaluate($node->getLeftNode()), evaluate($node->getRightNode()), $node->getValue());
    } else {
        return $node->getValue();
    }
}

function evalOperation($valueOne, $valueTwo, $operation)
{
    switch($operation) {
        case '-': return $valueOne - $valueTwo;
        case '+': return $valueOne + $valueTwo;
        case '*': return $valueOne * $valueTwo;
        case '/': return $valueOne / $valueTwo;
    }
}
