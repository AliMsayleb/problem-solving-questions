<?php

//Hi, here's your problem today. This problem was recently asked by Twitter:
//You are given an array of k sorted singly linked lists. Merge the linked lists into a single sorted linked list and return it.
//Here's your starting point:

include_once 'Node.php';

$a = new Node(null, 5);
$x = new Node($a, 4);
$y = new Node($x, 3);
$b = new Node($y, 1);

$c = new Node(null, 41);
$d = new Node($c, 4);

$e = new Node(null, 14);
$f = new Node($e, 13);

$lists = [$b, $d, $f];
$k = count($lists);

// Initializing results node
[$min, $minList, $minListIndex] = getMinWithIndexes($lists);

$startNode = new Node(null, $min);
$lists[$minListIndex] = $minList->getNextNode();
$currentNode = $startNode;

while(true){
    [$min, $minList, $minListIndex] = getMinWithIndexes($lists);

    if(null == $min){
        break;
    } else {
        $currentNode->setNextNode(new Node(null, $min));
        $currentNode = $currentNode->getNextNode();
        $lists[$minListIndex] = $minList->getNextNode();
    }
}

printList($startNode);

function getMinWithIndexes(array $lists): array
{
    $min = null;
    $minList = null;
    $minListIndex = null;

    for($i = 0; $i < count($lists); $i++){
        if($lists[$i] != null && isMin($lists[$i]->getValue(), $min)) {
            $minList = $lists[$i];
            $min = $lists[$i]->getValue();
            $minListIndex = $i;
        }
    }

    return [$min, $minList, $minListIndex];
}

function isMin(int $value, ?int $min): bool
{
    return null === $min || $value < $min;
}
