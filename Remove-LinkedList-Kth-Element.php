<?php

include_once 'Node.php';
// Good morning! Here's your coding interview problem for today.
// This problem was asked by Google.
// Given a singly linked list and an integer k, remove the kth last element from the list. k is guaranteed to be smaller than the length of the list.
// The list is very long, so making more than one pass is prohibitively expensive.
// Do this in constant space and in one pass.

$size = 10;
$start = new Node(null, 0);
$currentNode = $start;
for($i = 1; $i <= $size - 1; $i++) {
    $currentNode->setNextNode(new Node(null, $i));
    $currentNode = $currentNode->getNextNode();
}

printList($start);
echo "\n";
echo "\n";
removeKth($start, 3);
echo "\n";
echo "\n";
printList($start);

function removeKth(Node $list, int $k)
{
    $startPointer = $list;
    $endPointer = $list;
    while($k > 0) {
        $endPointer = $endPointer->getNextNode();
        $k--;
    }

    while($endPointer->getNextNode() !== null) {
        $endPointer = $endPointer->getNextNode();
        $startPointer = $startPointer->getNextNode();
    }
    $startPointer->setNextNode($startPointer->getNextNode()->getNextNode());
}
