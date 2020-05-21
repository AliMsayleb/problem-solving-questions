<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Google.
// Given pre-order and in-order traversals of a binary tree, write a function to reconstruct the tree.
// For example, given the following preorder traversal:
// [a, b, d, e, c, f, g]
// And the following inorder traversal:
// [d, b, e, a, f, c, g]
// You should return the following tree:
//     a
//    / \
//   b   c
//  / \ / \
// d  e f  g

include_once 'Node.php';

$preorder = ['a', 'b', 'd', 'e', 'c', 'f', 'g'];
$inorder = ['d', 'b', 'e', 'a', 'f', 'c', 'g'];

$tree = buildTree($preorder, $inorder);

echo printTree($tree); // In order
echo "\n";
echo printPreOrder($tree); // Pre order traversal

function buildTree(array $preorder, array $inorder)
{
    if (count($preorder) == 0) {
        return null;
    }
    $head = new BinaryTreeNode(null, null, $preorder[0]);

    if (count($preorder) == 1) {
        return $head;
    }
    $headInorderIndex = findIndex($inorder, $preorder[0]);

    $leftInorder = array_slice($inorder, 0, $headInorderIndex);
    $rightInorder = array_slice($inorder, $headInorderIndex + 1);
    $leftPreorder = $headInorderIndex === 0 ? [] : array_slice($preorder, 1, findIndex($preorder, $inorder[$headInorderIndex - 1]));
    $rightPreorder = $headInorderIndex === count($preorder) - 1 ? [] :array_slice($preorder, $headInorderIndex + 1);
    $head->setLeftNode(buildTree($leftPreorder, $leftInorder));
    $head->setRightNode(buildTree($rightPreorder, $rightInorder));

    return $head;
}

function findIndex($elements, $item)
{
    foreach ($elements as $index => $element) {
        if ($element === $item) {
            return $index;
        }
    }
}
