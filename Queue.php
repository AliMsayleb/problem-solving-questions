<?php

class Queue
{
    private $head;
    private $tail;

    public function isEmpty(): bool
    {
        return $this->head == null;
    }

    public function enqueue($value)
    {
        $element = new Element();
        if ($this->isEmpty()) {
            $this->tail = $element;
            $this->head = $element;
        } else {
            $this->tail->next = $element;
            $this->tail = $element;
        }

        $element->value = $value;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \Exception("Queue is empty");
        }

        $value = $this->head->value;
        $this->head = $this->head->next;
        if ($this->head == null) {
            $this->tail == null;
        }

        return $value;
    }
}

class Element
{
    public $next;
    public $value;
}
