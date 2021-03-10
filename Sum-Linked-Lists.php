<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Microsoft.
// Let's represent an integer in a linked list format by having each node represent a digit in the number. The nodes make up the number in reversed order.
// For example, the following linked list:
// 1 -> 2 -> 3 -> 4 -> 5
// is the number 54321.
// Given two linked lists in this format, return their sum in the same linked list format.
// For example, given
// 9 -> 9
// 5 -> 2
// return 124 (99 + 25) as:
// 4 -> 2 -> 1

$firstNumber = 155;
$secondNumber = 234;
$firstList = constructListFromNumber($firstNumber);
$secondList = constructListFromNumber($secondNumber);

$answerList = sumLists($firstList, $secondList);
$answer = $firstNumber + $secondNumber;
echo $answer . " should be equals to " . listToNumber($answerList).PHP_EOL;


class Node
{
    public $next;
    public $data;
    
    public function __construct($data) {
        $this->data = $data;
    }
}

function sumLists(&$firstList, &$secondList) {
    $carry = 0;
    $head = null;
    $current = null;
    while ($firstList && $secondList) {
        $firstNumber = intval($firstList->data);
        $secondNumber = intval($secondList->data);
        $resNumber = $firstNumber + $secondNumber;
        $carry = ($resNumber + $carry) / 10;
        $data = ($resNumber + $carry) % 10;
        $currentNode = new Node($data);
        if (!$head) {
            $head = $currentNode;
            $current = $head;
        } else {
            $current->next = $currentNode;
            $current = $currentNode;
        }
        $firstList = $firstList->next;
        $secondList = $secondList->next;
    }
    if ($carry == 1) {
        $current->next = new Node(1);
    }
    
    return $head;
}

function constructListFromNumber($number) {
    $numberStr = $number ."";
    $head = null;
    for ($i = 0; $i < strlen($numberStr); $i++) {
        $node = new Node($numberStr[$i]);
        $node->next = $head;
        $head = $node;
    }
    
    return $head;
}

function listToNumber($list) {
    $number = "";
    while ($list) {
        $number = $list->data . $number;
        $list = $list->next;
    }
    
    return intval($number);
}
