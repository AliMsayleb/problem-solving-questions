<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Palantir.
// Write an algorithm to justify text. Given a sequence of words and an integer line length k, return a list of strings which represents each line, fully justified.
// More specifically, you should have as many words as possible in each line. There should be at least one space between each word. Pad extra spaces when necessary so that each line has exactly length k. Spaces should be distributed as equally as possible, with the extra spaces, if any, distributed starting from the left.
// If you can only fit one word on a line, then you should pad the right-hand side with spaces.
// Each word is guaranteed not to be longer than k.
// For example, given the list of words ["the", "quick", "brown", "fox", "jumps", "over", "the", "lazy", "dog"] and k = 16, you should return the following:
// ["the  quick brown", # 1 extra space on the left
// "fox  jumps  over", # 2 extra spaces distributed evenly
// "the   lazy   dog"] # 4 extra spaces distributed evenly

$words = ["the", "quick", "brown", "foxx", "jumps", "over", "the", "lazy", "dog", "mediumword","small", "largewordhere", "sml", 'sml', "largewordhere", "largewordhere"];
$k = 15;

$results = justify($words, $k);
foreach ($results as $result) {
    echo $result . "\n";
}

function justify(array $strings, int $k): array
{
    $results = [];
    $accumulatedLength = 0;
    $accumulatedWords = [];
    $currentWords = 0;

    foreach ($strings as $string) {
        $stringLength = strlen($string);
        if ($accumulatedLength + $stringLength + $currentWords <= $k) { // Can hold the current word
            $currentWords++;
            $accumulatedLength += $stringLength;
            $accumulatedWords[] = $string;
            continue;
        } else { // new sentence
            $results[] = buildSentence($currentWords, $accumulatedWords, $k, $accumulatedLength);
            $accumulatedLength = $stringLength;
            $accumulatedWords = [$string];
            $currentWords = 1;
        }
    }
    $results[] = buildSentence($currentWords, $accumulatedWords, $k, $accumulatedLength);

    return $results;
}

function buildSentence(int $currentWords, array $accumulatedWords, int $k, $accumulatedLength): string
{
    if ($currentWords == 1) { // Fill one word line
        $result = $accumulatedWords[0];
        for($i = strlen($result); $i < $k; $i++) {
            $result .= " ";
        }
    } else {
        $result = "";
        $totalSpaces = $k - $accumulatedLength;
        $distributedSpaces = (int) ($totalSpaces / ($currentWords - 1));
        $extraSpaces = $totalSpaces - ($distributedSpaces * (($currentWords - 1)));
        for ($i = 0; $i < count($accumulatedWords) - 1; $i++) {
            $result .= $accumulatedWords[$i];
            for($j = 0; $j < $distributedSpaces; $j++) {
                $result.= " ";
            }
            if ($extraSpaces > 0) {
                $result.= " ";
                $extraSpaces--;
            }
        }
        $result .= $accumulatedWords[count($accumulatedWords) - 1];
    }

    return $result;
}