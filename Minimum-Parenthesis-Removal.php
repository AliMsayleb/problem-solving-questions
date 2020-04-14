<?php


// Hi, here's your problem today. This problem was recently asked by Uber:
// You are given a string of parenthesis.
// Return the minimum number of parenthesis that would need to be removed in order to make the string valid.
// "Valid" means that each open parenthesis has a matching closed parenthesis.
// Example:
// "()())()"
// The following input should return 1.

echo minRemoval("((((()))))((((()()");

function minRemoval(string $parenthesis): int
{
    $characters = str_split($parenthesis);
    $size = count($characters);
    $openingParenthesisCount = 0;
    $result = 0;
    for ($i = 0; $i < $size; $i++) {
        if ($characters[$i] == '(') {
            $openingParenthesisCount++;
        } else {
            if ($openingParenthesisCount <= 0) {
                $result++;
            } else {
                $openingParenthesisCount--;
            }
        }
    }
    $result += $openingParenthesisCount;

    return $result;
}