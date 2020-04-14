<?php

// Hi, here's your problem today. This problem was recently asked by Google:

// A look-and-say sequence is defined as the integer sequence beginning with a single digit in which the next term is obtained by describing the previous term. An example is easier to understand:

// Each consecutive value describes the prior value.

// 1      #
// 11     # one 1's
// 21     # two 1's
// 1211   # one 2, and one 1.
// 111221 # #one 1, one 2, and two 1's.

$start = 1;
$n = 15;
$result = 1;
while($n > 1) {
    $result = encode($result);
    $n--;
}

echo $result;


function encode(string $decoded): string
{
    if ($decoded == "") {
        return "";
    }

    $chars = str_split($decoded);
    $size = count($chars);
    $currentChar = $chars[0];
    $currentCount = 1;
    $result = "";
    for ($i = 1; $i < $size; $i++) {
        if($chars[$i] == $currentChar) {
            $currentCount++;
        } else {
            $result .= $currentCount . $currentChar;
            $currentChar = $chars[$i];
            $currentCount = 1;
        }
    }

    return $result . $currentCount . $currentChar;
}
