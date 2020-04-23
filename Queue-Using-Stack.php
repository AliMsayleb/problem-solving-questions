<?php

// This problem was asked by Apple.

// Implement a queue using two stacks.
// Recall that a queue is a FIFO (first-in, first-out) data structure with the following methods:
// enqueue, which inserts an element into the queue,
// and dequeue, which removes it.

include_once 'Stack.php';
include_once 'Queue.php';

$qfs = new QueueFromStack();
$queue = new Queue();

$qfs->enqueue(1);
echo $qfs->dequeue().PHP_EOL;
$qfs->enqueue(1);
$qfs->enqueue(2);
$qfs->enqueue(3);
echo $qfs->dequeue().PHP_EOL;
$qfs->enqueue(4);
echo $qfs->dequeue().PHP_EOL;
echo $qfs->dequeue().PHP_EOL;
echo $qfs->dequeue().PHP_EOL;
try {
    $qfs->dequeue();
} catch (Exception $e) {
    echo $e->getMessage().PHP_EOL;
}

$queue->enqueue(1);
echo $queue->dequeue().PHP_EOL;
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
echo $queue->dequeue().PHP_EOL;
$queue->enqueue(4);
echo $queue->dequeue().PHP_EOL;
echo $queue->dequeue().PHP_EOL;
echo $queue->dequeue().PHP_EOL;
try {
    $queue->dequeue();
} catch (Exception $e) {
    echo $e->getMessage().PHP_EOL;
}

class QueueFromStack
{
    private $stack1;
    private $stack2;

    public function __construct()
    {
        $this->stack1 = new Stack();
        $this->stack2 = new Stack();
    }

    public function enqueue($element)
    {
        while (!$this->stack1->isEmpty()) {
            $this->stack2->push($this->stack1->pop());
        }
        $this->stack1->push($element);
        while (!$this->stack2->isEmpty()) {
            $this->stack1->push($this->stack2->pop());
        }
    }

    public function dequeue()
    {
        try{
             return $this->stack1->pop();
        } catch (Exception $e) {
            throw new Exception('Queue is empty'); // Overriding the original stack is empty message in case queue is empty
        }
    }
}