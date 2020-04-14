<?php

// Hi, here's your problem today. This problem was recently asked by Amazon:

// Given a binary tree, return all values given a certain height h.

#     1
#    / \
#   2   3
#  / \   \
# 4   5   7
#          \
#           9

# h = 3 => [4, 5, 7]

include_once('Node.php');
include_once('Queue.php');

$z = new BinaryTreeNode(null, null, 9);
$a = new BinaryTreeNode(null, null, 4);
$b = new BinaryTreeNode(null, null, 5);
$c = new BinaryTreeNode(null, $z, 7);
$d = new BinaryTreeNode($a, $b, 2);
$e = new BinaryTreeNode(null, $c, 3);
$f = new BinaryTreeNode($d, $e, 1);

$depth = 3;
// $depth = 4;
echo "Values at depth $depth are: ". implode(valuesAtHeight($f, $depth), ', ')."\n";

function valuesAtHeight(?BinaryTreeNode $tree, int $height): array
{
    if (null === $tree) {
        return null;
    }

    $currentHeight = 1;
    $queues = [new Queue(), new Queue()];
    $queues[$currentHeight % 2]->enqueue($tree);
    while($currentHeight < $height) {
        while(!$queues[$currentHeight % 2]->isEmpty()) {
            $tree = $queues[$currentHeight % 2]->dequeue();
            if ($tree->getLeftNode()) {
                $queues[($currentHeight + 1) % 2]->enqueue($tree->getLeftNode());
            }
            if ($tree->getRightNode()) {
                $queues[($currentHeight + 1) % 2]->enqueue($tree->getRightNode());
            }
        }
        $currentHeight++;
    }
    $results = [];
    while(!$queues[$height % 2]->isEmpty()) {
        $results[] = $queues[$height % 2]->dequeue()->getValue();
    }

    return $results;
}