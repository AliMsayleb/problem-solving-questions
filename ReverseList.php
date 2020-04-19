<?php

include_once 'Node.php';

$tail = new Node(null, 10);
for($i = 9; $i > 0; $i--) {
    $head = new Node($tail, $i);
    $tail = $head;
}

printList($head);
$head = reverseList($head);
printList($head);
$head = reverseListIterative($head);
printList($head);

function reverseList(Node $head): Node
{
    $current = $head->getNextNode();
    if ($current->getNextNode() == null) {
        $current->setNextNode($head);
        $head->setNextNode(null);

        return $current;
    }
    $temp = $head;
    $head = reverseList($current);
    $temp->setNextNode(null);
    $current->setNextNode($temp);

    return $head;
}

function reverseListIterative(Node $node): Node
{
    $previous = $node;
    $current = $node->getNextNode();
    $next = $current->getNextNode();
    $node->setNextNode(null);
    while($next) {
        $current->setNextNode($previous);
        $previous = $current;
        $current = $next;
        $next = $next->getNextNode();
    }
    $current->setNextNode($previous);

    return $current;
}