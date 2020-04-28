<?php

// Hi, here's your problem today. This problem was recently asked by Google:
// Given a binary tree, remove the nodes in which there is only 1 child, so that the binary tree is a full binary tree.
// So leaf nodes with no children should be kept, and nodes with 2 children should be kept as well.

# Given this tree:
#     1
#    / \
#   2   3
#  /   / \
# 0   9   4

# We want a tree like:
#     1
#    / \
#   0   3
#      / \
#     9   4

include_once 'Node.php';

$leaf1 = new BinaryTreeNode(null, null, 0);
$leaf2 = new BinaryTreeNode(null, null, 9);
$leaf3 = new BinaryTreeNode(null, null, 4);
$leaf4 = new BinaryTreeNode($leaf1, null, 2);
$leaf5 = new BinaryTreeNode($leaf2, $leaf3, 3);
$leaf6 = new BinaryTreeNode($leaf4, $leaf5, 1);
$head = $leaf6;

printTree($head);
echo PHP_EOL;
printTree(fullBinaryTree($head));
echo PHP_EOL;

function fullBinaryTree(BinaryTreeNode $head)
{
    if ($head->getLeftNode() == null && $head->getRightNode() == null) {
        return $head;
    }

    if ($head->getLeftNode() == null) {
        return fullBinaryTree($head->getRightNode());
    }

    if ($head->getRightNode() == null) {
        return fullBinaryTree($head->getLeftNode());
    }

    $head->setLeftNode(fullBinaryTree($head->getLeftNode()));
    $head->setRightNode(fullBinaryTree($head->getRightNode()));

    return $head;
}
