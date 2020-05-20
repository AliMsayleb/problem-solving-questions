<?php

// Hi, here's your problem today. This problem was recently asked by Microsoft:
// A unival tree is a tree where all the nodes have the same value.
// Given a binary tree, return the number of unival subtrees in the tree.
// For example, the following tree should return 5: 3 1's, 1 0's, and [1, 1, 1]
//       0
//      / \
//     1  0
//       / \
//      1  0
//     / \
//    1  1

include_once 'Node.php';

$treeA = new BinaryTreeNode(null, null, 1);
$treeB = new BinaryTreeNode(null, null, 1);
$treeC = new BinaryTreeNode(null, null, 1);
$treeD = new BinaryTreeNode(null, null, 0);

$treeE = new BinaryTreeNode($treeA, $treeB, 1);
$treeF = new BinaryTreeNode($treeE, $treeD, 0);
$treeG = new BinaryTreeNode($treeC, $treeF, 1);

echo countUnivals($treeG)[1];

function countUnivals(?BinaryTreeNode $head)
{
    if ($head == null) {
        return [null, 0];
    }

    $left = countUnivals($head->getLeftNode());
    $right = countUnivals($head->getRightNode());

    $total = $left[1] + $right[1];

    if ($total === 0) { // leaf
        return [$head->getValue(), 1];
    }

    if ($left[1] === 0) { // no left children
        return $right[0] === $head->getValue() ? [$head->getValue(), $right[1] + 1] : [null, $right[1]]; // check if right child is still unival subtree
    }

    if ($right[1] === 0) { // no right children
        return $left[0] === $head->getValue() ? [$head->getValue(), $left[1] + 1] : [null, $left[1]]; // check if left child is still unival subtree
    }

    if ($right[0] === null || $left[0] === null) { // i have 2 childrens, if one of them is no longer unival return just sum
        return [null, $right[1] + $left[1]];
    }

    if ($right[0] === $left[0] && $left[0] === $head->getValue()) { // if my children are same as me, return sum + 1
        return [$right[0], $total + 1];
    }

    return [null, $total]; // children are different than me, return sum of children only
}
