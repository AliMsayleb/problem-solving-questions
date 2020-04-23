<?php

// Hi, here's your problem today. This problem was recently asked by Apple:
// You are given the root of a binary tree. You need to implement 2 functions:
// 1. serialize(root) which serializes the tree into a string representation
// 2. deserialize(s) which deserializes the string back to the original tree that it represents
// For this problem, often you will be asked to design your own serialization format.
// However, for simplicity, let's use the pre-order traversal of the tree. Here's your starting point:

// #     1
// #    / \
// #   3   4
// #  / \   \
// # 2   5   7

// print serialize(tree)
// # 1 3 2 # # 5 # # 4 # 7 # #
// print deserialize('1 3 2 # # 5 # # 4 # 7 # #')
// # 132547

include_once 'Node.php';

$leaf1 = new BinaryTreeNode(null, null, 2);
$leaf2 = new BinaryTreeNode(null, null, 5);
$leaf3 = new BinaryTreeNode(null, null, 7);
$leaf4 = new BinaryTreeNode($leaf1, $leaf2, 3);
$leaf5 = new BinaryTreeNode(null, $leaf3, 4);
$leaf6 = new BinaryTreeNode($leaf4, $leaf5, 1);
$head = $leaf6;

$a = serializeTree($head);
echo $a.PHP_EOL;
$b = deserializeTree($a);
$a = serializeTree($b);
echo $a.PHP_EOL;
$b = deserializeTree($a);
$a = serializeTree($b);
echo $a.PHP_EOL;


function serializeTree($head)
{
    if ($head == null) {
        return "#";
    }

    return sprintf("%s %s %s", $head->getValue(), serializeTree($head->getLeftNode()), serializeTree($head->getRightNode()));
}

function deserializeTree(string $tree)
{
    $result = deserializeTreeHelper($tree);

    return $result[0];
}

function deserializeTreeHelper(string $tree)
{
    if ($tree[0] == '#') {
        return [null, strlen($tree)]; // returns size of the final string that was reached to know where to start with the next tree
    }

    $x = strpos($tree, ' ');
    $value = (int) substr($tree, 0, $x);
    $rest = substr($tree, $x + 1);
    $left = deserializeTreeHelper($rest);
    $right = deserializeTreeHelper(substr($rest, strlen($rest) - $left[1] + 2));

    return [new BinaryTreeNode($left[0], $right[0], $value), $right[1]];
}