<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Triplebyte.
// You are given n numbers as well as n probabilities that sum up to 1. Write a function to generate one of the numbers with its corresponding probability.
// For example, given the numbers [1, 2, 3, 4] and probabilities [0.1, 0.5, 0.2, 0.2], 
// your function should return 1 10% of the time, 2 50% of the time, and 3 and 4 20% of the time.
// You can generate random numbers between 0 and 1 uniformly.

$numberGenerator = new NumberGenerator([1, 2, 3, 4], [0.1, 0.5, 0.2, 0.2]);
$counts = [
    '1' => 0,
    '2' => 0,
    '3' => 0,
    '4' => 0,
];

for ($i = 0; $i < 100; $i++) {
    $counts[''.$numberGenerator->getRandomNumber()]++;
}
var_dump($counts);

class NumberGenerator
{
    private $numbers;
    private $cumulativeProbabilties;

    public function __construct($numbers, $probabilities) {
        $this->numbers = $numbers;
        $cumulativeSum = 0;
        $cumulativeProbabilties = [];
        foreach ($probabilities as $probability) {
            $cumulativeSum += $probability;
            $cumulativeProbabilties[] = $cumulativeSum;
        }
        $this->cumulativeProbabilties = $cumulativeProbabilties;
    }

    public function getRandomNumber() {
        $randomFloat = mt_rand() / mt_getrandmax();
        $index = 0;
        while ($this->cumulativeProbabilties[$index] <= $randomFloat) {
            $index++;
        }

        return $this->numbers[$index];
    }
}