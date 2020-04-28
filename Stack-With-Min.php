<?php

// Hi, here's your problem today. This problem was recently asked by Uber:
// Design a simple stack that supports push, pop, top, and retrieving the minimum element in constant time.
// push(x) -- Push element x onto stack.
// pop() -- Removes the element on top of the stack.
// top() -- Get the top element.
// getMin() -- Retrieve the minimum element in the stack.
// Note: be sure that pop() and top() handle being called on an empty stack.

include_once('Stack.php');

class StackWithMin
{
    private $stack;
    private $minStack;

    public function __construct()
    {
        $this->stack = new Stack();
        $this->minStack = new Stack();
    }

    public function push($value)
    {
        $this->stack->push($value);
        if ($this->minStack->isEmpty() || $this->minStack->peek() >= $value) {
            $this->minStack->push($value);
        }
    }

    public function pop()
    {
        $value = $this->stack->pop();
        $minPeek = $this->minStack->peek();
        if ($minPeek == $value) {
            $this->minStack->pop();
        }

        return $value;
    }

    public function getMin()
    {
        return $this->minStack->peek();
    }
}

$stackWithMin = new StackWithMin();
try {
    $stackWithMin->pop();
} catch (\Exception $e) {
    echo "Exception thrown \n";
}

$stackWithMin->push(1);
$min = $stackWithMin->getMin();
echo "Min now is $min \n";

$stackWithMin->push(3);
$min = $stackWithMin->getMin();
echo "Min now is $min \n";

$stackWithMin->push(2);
$min = $stackWithMin->getMin();
echo "Min now is $min \n";

$stackWithMin->push(5);
$min = $stackWithMin->getMin();
echo "Min now is $min \n";

$stackWithMin->push(-1);
$min = $stackWithMin->getMin();
echo "Min now is $min \n";

$popped = $stackWithMin->pop();
$min = $stackWithMin->getMin();
echo "Popped $popped, Min now is $min \n";


$popped = $stackWithMin->pop();
$min = $stackWithMin->getMin();
echo "Popped $popped, Min now is $min \n";


$popped = $stackWithMin->pop();
$min = $stackWithMin->getMin();
echo "Popped $popped, Min now is $min \n";

$popped = $stackWithMin->pop();
$min = $stackWithMin->getMin();
echo "Popped $popped, Min now is $min \n";
