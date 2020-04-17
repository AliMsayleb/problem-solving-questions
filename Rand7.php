<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Two Sigma.
// Using a function rand5() that returns an integer from 1 to 5 (inclusive) with uniform probability,
// implement a function rand7() that returns an integer from 1 to 7 (inclusive).

for ($i = 0; $i < 10; $i++) {
    echo rand5() ."\n";
}

function rand5(): int
{
    return rand(1, 5);
}

function rand7(): int
{
    do {
        $randomNumber = rand5() * 5 + rand5() - 5; //[1.. 25];
    } while ($randomNumber >= 21); // [1 .. 21]

    return $randomNumber % 7 + 1; // [1 - 7]
}
