<?php

// Good morning! Here's your coding interview problem for today.

// This problem was asked by Amazon.

// Implement a stack that has the following methods:

// push(val), which pushes an element onto the stack
// pop(), which pops off and returns the topmost element of the stack. If there are no elements in the stack, then it should throw an error or return null.
// max(), which returns the maximum value in the stack currently. If there are no elements in the stack, then it should throw an error or return null.
// Each method should run in constant time.

include_once('Stack.php');

class StackWithMax
{
    private $stack;
    private $maxStack;

    public function __construct()
    {
        $this->stack = new Stack();
        $this->maxStack = new Stack();
    }

    public function push($value)
    {
        $this->stack->push($value);
        if ($this->maxStack->isEmpty() || $this->maxStack->peek() <= $value) {
            $this->maxStack->push($value);
        }
    }

    public function pop()
    {
        $value = $this->stack->pop();
        $maxPeek = $this->maxStack->peek();
        if ($maxPeek == $value) {
            $this->maxStack->pop();
        }

        return $value;
    }

    public function max()
    {
        return $this->maxStack->peek();
    }
}

$stackWithMax = new StackWithMax();
try {
    $stackWithMax->pop();
} catch (\Exception $e) {
    echo "Exception thrown \n";
}

$stackWithMax->push(1);
$max = $stackWithMax->max();
echo "Max now is $max \n";

$stackWithMax->push(3);
$max = $stackWithMax->max();
echo "Max now is $max \n";

$stackWithMax->push(2);
$max = $stackWithMax->max();
echo "Max now is $max \n";

$stackWithMax->push(5);
$max = $stackWithMax->max();
echo "Max now is $max \n";

$popped = $stackWithMax->pop();
$max = $stackWithMax->max();
echo "Popped $popped, max now is $max \n";


$popped = $stackWithMax->pop();
$max = $stackWithMax->max();
echo "Popped $popped, max now is $max \n";


$popped = $stackWithMax->pop();
$max = $stackWithMax->max();
echo "Popped $popped, max now is $max \n";
