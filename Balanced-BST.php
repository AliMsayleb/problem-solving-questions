<?php

// Hi, here's your problem today. This problem was recently asked by LinkedIn:

// Given a sorted list of numbers, change it into a balanced binary search tree.
// You can assume there will be no duplicate numbers in the list.

// [1, 2, 3, 4, 5, 6, 7]

#      4
#    /  \
#   2    6
#  / \  / \
# 1  3 5  7

// A bst has all its leafs having the same height to the root node

include_once 'Node.php';

$tree = createBST([1, 2, 3, 4, 5, 6, 7]);
echo "Post Order traversal: ";
echo printTree($tree);
echo PHP_EOL;

echo "Pre Order traversal: ";
echo printPreOrder($tree);
echo PHP_EOL;

function createBST(array $elements)
{
    return createBSTHelper($elements, 0, count($elements) - 1);
}

function createBSTHelper(array $elements, int $start, int $end)
{
    if ($end - $start == 2) {
        $left = new BinaryTreeNode(null, null, $elements[$start]);
        $right = new BinaryTreeNode(null, null, $elements[$end]);
    } else {
        $left = createBSTHelper($elements, $start, (($end + $start) / 2) - 1);
        $right = createBSTHelper($elements, (($end + $start) / 2) + 1, $end);
    }

    return new BinaryTreeNode($left, $right, $elements[($start + $end) / 2]);
}