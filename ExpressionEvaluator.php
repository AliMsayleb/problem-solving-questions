<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Facebook.
// Given a string consisting of parentheses, single digits, and positive and negative signs
// convert the string into a mathematical expression to obtain the answer.
// Don't use eval or a similar built-in parser.
// For example, given '-1 + (2 + 3)', you should return 4.

define("DEBUG_MODE", false);

$testCases = [
    "-1 + (2 + 3)",
    "-1 + (2 + 3 - (9 - 8))",
    "1 - ((2 + 3) - (1 - (12 - 8)))",
];

foreach ($testCases as $testCase) {
    solve($testCase);
}

function solve(string $expression)
{
    $answer = parse($expression);
    echo "The expression is $expression; The value is $answer".PHP_EOL;
}

function parse(string $expression): int
{
    $iterator = new StringIterator($expression);
    $sign = '+';
    $stack = new Stack();
    while ($iterator->hasNext()) {
        switch($iterator->peekType()) {
            case StringIterator::SIGN: {
                $sign = $iterator->popChar();
                break;
            }
            case StringIterator::DIGIT: {
                $number = $iterator->popChar();
                $numberValue = getIntValue($number);
                while ($iterator->hasNext() && $iterator->peekType() === StringIterator::DIGIT) {
                    $numberValue *= 10;
                    $numberValue += getIntValue($iterator->popChar());
                }
                if ($sign === '-') {
                    $numberValue *= -1;
                }
                $stack->push($numberValue);
                break;
            }
            case StringIterator::PARENTHESIS: {
                if ($iterator->popChar() === '(') {
                    $stack->push($sign);
                    $stack->push('(');
                    $sign = '+';
                    break;
                } else {
                    $number = evaluateStackTillParenthesis($stack);
                    debug("Pushing back $number".PHP_EOL);
                    $stack->push($number);
                    break;
                }
            }
            default: {
                $iterator->popChar();
                break;
            }
        }
    }
    return evaluateStack($stack);
}

function evaluateStack(&$stack): int
{
    $sum = 0;
    while (!$stack->isEmpty()) {
        $sum += $stack->pop();
    }

    return $sum;
}

function getIntValue($char): int
{
    switch($char) {
        case '0': return 0;
        case '1': return 1;
        case '2': return 2;
        case '3': return 3;
        case '4': return 4;
        case '5': return 5;
        case '6': return 6;
        case '7': return 7;
        case '8': return 8;
        case '9': return 9;
    }
}

function debug(string $expression)
{
    if (DEBUG_MODE) {
        echo $expression;
    }
}

function evaluateStackTillParenthesis(&$stack): int
{
    $currentChar = $stack->pop();
    $sum = 0;
    while ($currentChar != '(') {
        debug("Popped $currentChar".PHP_EOL);
        $sum += $currentChar;
        $currentChar = $stack->pop();
    }
    
    $sign = $stack->pop();
    if ($sign === '-') {
        $sum *= -1;
    }

    return $sum;
}

class StringIterator
{
    private $str;
    private $len;
    private $currentCharIndex = 0;

    const DIGIT = 1;
    const SIGN = 2;
    const PARENTHESIS = 3;
    const SPACE = 4;
    
    public function __construct(string $str)
    {
        $this->str = $str;
        $this->len = strlen($str);
    }

    public function hasNext(): bool
    {
        return $this->currentCharIndex < $this->len;
    }
    
    public function peekType(): int
    {
        if ($this->str[$this->currentCharIndex] === '-' || $this->str[$this->currentCharIndex] === '+') {
            return StringIterator::SIGN;
        } else if ($this->str[$this->currentCharIndex] === '(' || $this->str[$this->currentCharIndex] === ')') {
            return StringIterator::PARENTHESIS;
        } else if ($this->str[$this->currentCharIndex] == ' ') {
            return StringIterator::SPACE;
        } else {
            return StringIterator::DIGIT;
        }
    }

    public function popChar()
    {
        return $this->str[$this->currentCharIndex++];
    }
}

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
}