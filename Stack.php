<?php

class Stack
{
    private $stack;
    private $lastElementIndex;

    public function __construct()
    {
        $this->stack = [];
        $this->lastElementIndex = -1;
    }

    public function isEmpty(): bool
    {
        return $this->lastElementIndex < 0;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new \Exception("Stack is empty");
        }

        return $this->stack[$this->lastElementIndex--];
    }

    public function push($value)
    {
        $this->stack[++$this->lastElementIndex] = $value;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            throw new \Exception("Stack is empty");
        }

        return $this->stack[$this->lastElementIndex];
    }
}
