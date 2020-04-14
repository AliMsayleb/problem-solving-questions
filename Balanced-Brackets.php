<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Facebook.
// Given a string of round, curly, and square open and closing brackets, return whether the brackets are balanced (well-formed).
// For example, given the string "([])[]({})", you should return true.
// Given the string "([)]" or "((()", you should return false.

include_once 'Stack.php';

$example1 = "([])[]({})";
$example2 = "([)]";
$example3 = "((()";
echo $example1;
echo isBalanced($example1) ? " is balanced \n" : " is not balanced \n";
echo $example2;
echo isBalanced($example2) ? " is balanced \n" : " is not balanced \n";
echo $example3;
echo isBalanced($example3) ? " is balanced \n" : " is not balanced \n";

function isBalanced(string $string): bool
{
    $stack = new Stack();
    $characters = str_split($string);
    $size = count($characters);
    $openings = ['{', '(', '['];
    $closing = [
        '}' => '{',
        ']' => '[',
        ')' => '(',
    ];

    for ($i = 0; $i < $size; $i++) {
        if (in_array($characters[$i], $openings)) {
            $stack->push($characters[$i]);
        } else {
            if ($stack->isEmpty() || $closing[$characters[$i]] !== $stack->pop()) {
                return false;
            }
        }
    }

    return $stack->isEmpty();
}
