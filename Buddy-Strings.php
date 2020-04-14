<?php

// Hi, here's your problem today. This problem was recently asked by AirBNB:
// Given two strings A and B of lowercase letters, return true if and only if we can swap two letters in A so that the result equals B.
// Example 1:
// Input: A = "ab", B = "ba"
// Output: true
// Example 2:
// Input: A = "ab", B = "ab"
// Output: false
// Example 3:
// Input: A = "aa", B = "aa"
// Output: true
// Example 4:
// Input: A = "aaaaaaabc", B = "aaaaaaacb"
// Output: true
// Example 5:
// Input: A = "", B = "aa"
// Output: false

$example1 = ["ab", "ba"];
$example2 = ["ab", "ab"];
$example3 = ["aa", "aa"];
$example4 = ["aaaaaaabc", "aaaaaaacb"];
$example5 = ["", "aa"];

echo "$example1[0] and $example1[1]". (isBuddyStrings($example1[0], $example1[1]) ? " are ": " aren't ")."string buddies \n";
echo "$example2[0] and $example2[1]". (isBuddyStrings($example2[0], $example2[1]) ? " are ": " aren't ")."string buddies \n";
echo "$example3[0] and $example3[1]". (isBuddyStrings($example3[0], $example3[1]) ? " are ": " aren't ")."string buddies \n";
echo "$example4[0] and $example4[1]". (isBuddyStrings($example4[0], $example4[1]) ? " are ": " aren't ")."string buddies \n";
echo "$example5[0] and $example5[1]". (isBuddyStrings($example5[0], $example5[1]) ? " are ": " aren't ")."string buddies \n";

function isBuddyStrings(string $a, string $b): bool
{
    if (($size = strlen($a)) != strlen($b)) {
        return false;
    }

    $a = str_split($a);
    $b = str_split($b);
    $chars = [];
    $errors = 0;
    $hasDuplicateChars = false;
    for ($i = 0; $i < $size && $errors < 2; $i++) {
        if ($a[$i] != $b[$i]) {
            $errors++;
        }
        if (!$hasDuplicateChars) {
            if (isset($chars[$a[$i]])) {
                $hasDuplicateChars = true;
            } else {
                $chars[$a[$i]] = true;
            }
        }
    }

    return ($errors == 2 || ($errors == 0 && $hasDuplicateChars == true));
}
