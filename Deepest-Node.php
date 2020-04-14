<?php

// Hi, here's your problem today. This problem was recently asked by Google:
// You are given the root of a binary tree. Return the deepest node (the furthest node from the root).
//     a
//    / \
//   b   c
//  /
// d
// (d, 3)

include_once 'Node.php';

$d = new BinaryTreeNode(null, null, 'd');
$b = new BinaryTreeNode($d, null, 'b');
$c = new BinaryTreeNode(null, null, 'c');
$a = new BinaryTreeNode($b, $c, 'a');

$result = findDeepestNode($a);
echo "($result[1], $result[0])\n";

function findDeepestNode(?BinaryTreeNode $a)
{
    if (null == $a) {
        return [0, null];
    }

    $right = findDeepestNode($a->getRightNode());
    $left = findDeepestNode($a->getLeftNode());
    if ($right[1] === null) {
        if ($left[1] === null) {
            return [1, $a->getValue()];
        } else {
            return [$left[0] + 1, $left[1]];
        }
    } else if ($left[1] === null) {
        return [$right[0] + 1, $right[1]];
    } else {
        if ($left[0] >= $right[0]) {
            return [$left[0] + 1, $left[1]];
        }

        return [$right[0] + 1, $right[1]];
    }
}
