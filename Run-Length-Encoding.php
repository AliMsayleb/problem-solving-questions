<?php

// Good morning! Here's your coding interview problem for today.

// This problem was asked by Amazon.

// Run-length encoding is a fast and simple method of encoding strings.
// The basic idea is to represent repeated successive characters as a single count and character.
// For example, the string "AAAABBBCCDAA" would be encoded as "4A3B2C1D2A".

// Implement run-length encoding and decoding.
// You can assume the string to be encoded have no digits and consists solely of alphabetic characters.
// You can assume the string to be decoded is valid.

$decoded = "AAAABBBCCDAA";
$encoded = "4A3B2C1D2A";

echo "Encoding ". $decoded .": " .encode($decoded) ."\n";
echo "Decoding ". $encoded .": " .decode($encoded) ."\n";

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

function decode(string $encoded): string
{
    if ($encoded == "") {
        return "";
    }

    $chars = str_split($encoded);
    $size = count($chars);
    $result = "";
    for ($i = 0; $i < $size; $i = $i + 2) {
        for ($j = 0; $j < $chars[$i]; $j++) {
            $result .= $chars[$i + 1];
        }
    }

    return $result;
}