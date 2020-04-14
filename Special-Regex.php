<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Facebook.
// Implement regular expression matching with the following special characters:
// . (period) which matches any single character
// * (asterisk) which matches zero or more of the preceding element
// That is, implement a function that takes in a string and a valid regular expression and returns whether or not the string matches the regular expression.
// For example, given the regular expression "ra." and the string "ray", your function should return true. The same regular expression on the string "raymond" should return false.
// Given the regular expression ".*at" and the string "chat", your function should return true. The same regular expression on the string "chats" should return false.

function match(string $string, string $pattern): bool
{
    $specialCharacters = ['\\', '^', '$', '|', '?', '+', '(', ')', '[', '{'];
    $replacementCharacter = ['\\\\', '\^', '\$', '\|', '\?', '\+', '\(', '\)', '\[','\{'];

    for($i = 0; $i < count($specialCharacters); $i++) {
        $pattern = str_replace($specialCharacters[$i], $replacementCharacter[$i], $pattern);
    }

    return preg_match("/^".$pattern ."$/", $string);
}


echo "Raymond and Ra. (should not match)\n";
echo (match('Raymond', 'Ra.') ? "True" : "False")."\n";
echo "\n";

echo "Rat and Ra. (should match)\n";
echo (match('Rat', 'Ra.') ? "True" : "False")."\n";
echo "\n";

echo 'Ra([$^|)t and R([$^|a). (should match)'."\n";
echo (match('Ra([$^|)t', 'Ra([$^|).') ? "True" : "False")."\n";
echo "\n";

echo 'Ra([$^|)t and R.* (should match)'."\n";
echo (match('Ra([$^|)t', 'R.*') ? "True" : "False")."\n";
echo "\n";
