<?php

// Hi, here's your problem today. This problem was recently asked by Facebook:

// You are given the root of a binary search tree.
// Return true if it is a valid binary search tree, and false otherwise.
// Recall that a binary search tree has the property that all values in the left subtree are less than or equal to the root,
// and all values in the right subtree are greater than or equal to the root.

#      5
#     / \
#    3   7           Valid tree
#   / \ /
#  1  4 6

#      5
#     / \
#    3   7           Invalid tree since 9 > 5
#   / \ /
#  1  9 6

// Another way would be adding functions maxTree and minTree and validating that each node is
// greater than the max to the left and less than the min to the right

include_once 'Node.php';

$f = new BinaryTreeNode(null, null, 6);
// $e = new BinaryTreeNode(null, null, 4);
$e = new BinaryTreeNode(null, null, 9);
$d = new BinaryTreeNode(null, null, 1);
$c = new BinaryTreeNode($f, null, 7);
$b = new BinaryTreeNode($d, $e, 3);
$a = new BinaryTreeNode($b, $c, 5);

$resultString = "The binary tree is ". (isValidBST($a) ? "" : "not ")."a valid binary search tree";
echo $resultString;

function isValidBST(?BinaryTreeNode $node): bool
{
    $results = [];
    fillInorderTree($node, $results);

    $max = null;
    foreach ($results as $result) {
        if ($result < $max) {
            return false;
        }
        $max = $result;
    }

    return true;
}

function fillInorderTree(?BinaryTreeNode $node, &$results)
{
    if ($node == null) {
        return;
    }

    fillInorderTree($node->getLeftNode(), $results);
    $results[] = $node->getValue();
    fillInorderTree($node->getRightNode(), $results);
}