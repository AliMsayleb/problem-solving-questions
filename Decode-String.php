<?php

// Hi, here's your problem today. This problem was recently asked by Google:
// Given a string with a certain rule: k[string] should be expanded to string k times.
// So for example, 3[abc] should be expanded to abcabcabc.
// Nested expansions can happen, so 2[a2[b]c] should be expanded to abbcabbc.

echo "Decoding 2[a2[b]c]: ";
echo decode('2[a2[b]c]').PHP_EOL;


function decode(string $string)
{
    return decodeHelper($string, 1);
}

function decodeHelper(string $string, int $multiplier)
{
    $start = 0;
    $end = strlen($string);
    $currentNumber = "";
    $foundNumeric = false;
    $startingString = "";

    // Find Opening brackets, save the characters while looping
    // Example ab12[d]ef
    for ($i = 0; $i < strlen($string); $i++) {
        if (is_numeric($string[$i])) {
            $foundNumeric = true;
            $currentNumber .= $string[$i];
            continue;
        }
        if ($string[$i] == '[') {
            $start = $i + 1;
            break;
        } else {
            $startingString .= $string[$i];
        }
    }
    // string string ab
    // current number 12[d]
    // start = index of first character after [ which is 5 => d

    // if i didn't find any multiplier then i looped over the whole string => return string * multiplier
    if ($currentNumber == "") {
        $result = "";
        for($i = 0; $i < $multiplier; $i++) {
            $result .= $string;
        }

        return $result;
    }


    $endString = "";
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        if ($string[$i] == ']') {
            $end = $i - 1;
            break;
        } else {
            $endString = $string[$i].$endString;
        }
    }
    // endString is ef
    // end position is at d
    // strlen is 1
    // recursive string is d with count = 12
    // concatenating start with result of middle string with end
    // ab + 12*"d" + ef
    $string =  sprintf(
        "%s%s%s",
        $startingString,
        decodeHelper(substr($string, $start, $end - $start + 1), (int) $currentNumber),
        $endString
    );
    // abddddddddddddef, multiplying by the initial multiplier
    $result = "";
    for($i = 0; $i < $multiplier; $i++) {
        $result .= $string;
    }

    return $result;
}