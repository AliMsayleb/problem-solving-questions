<?php

class Node
{
    private $nextNode;
    private $value;

    public function __construct(?Node $next, int $value)
    {
        $this->nextNode = $next;
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getNextNode(): ?Node
    {
        return $this->nextNode;
    }

    public function setNextNode(?Node $node): self
    {
        $this->nextNode = $node;

        return $this;
    }
}

class BinaryTreeNode
{
    private $leftNode;
    private $rightNode;
    private $value;

    public function __construct(?BinaryTreeNode $left, ?BinaryTreeNode $right, $value)
    {
        $this->leftNode = $left;
        $this->rightNode = $right;
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): BinaryTreeNode
    {
        $this->value = $value;

        return $this;
    }

    public function getRightNode(): ?BinaryTreeNode
    {
        return $this->rightNode;
    }

    public function getLeftNode(): ?BinaryTreeNode
    {
        return $this->leftNode;
    }

    public function setRightNode(?BinaryTreeNode $node): BinaryTreeNode
    {
        $this->rightNode = $node;

        return $this;
    }

    public function setLeftNode(?BinaryTreeNode $node): BinaryTreeNode
    {
        $this->leftNode = $node;

        return $this;
    }
}

function printList(Node $list)
{
    $currentNode = $list;
    while (null !== $currentNode) {
        echo $currentNode->getValue()."\n";
        $currentNode = $currentNode->getNextNode();
    }
}

function printTree(?BinaryTreeNode $head)
{
    if ($head == null) {
        return;
    }

    printTree($head->getLeftNode());
    echo $head->getValue() . " ";
    printTree($head->getRightNode());
}

function printPreOrder(?BinaryTreeNode $head)
{
    if ($head == null) {
        return;
    }

    echo $head->getValue() . " ";
    printPreOrder($head->getLeftNode());
    printPreOrder($head->getRightNode());
}