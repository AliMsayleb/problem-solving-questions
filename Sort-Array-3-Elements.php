<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Google.
// Given an array of strictly the characters 'R', 'G', and 'B', segregate the values of the array so that all the Rs come first,
// the Gs come second, and the Bs come last. You can only swap elements of the array.
// Do this in linear time and in-place.
// For example, given the array ['G', 'B', 'R', 'R', 'B', 'R', 'G'], it should become ['R', 'R', 'R', 'G', 'G', 'B', 'B'].
// B G R R R R R
// R G R R R R B
// 'B', 'G', 'R', 'R', 'R', 'G', 'R' 0 6
// 'R', 'G', 'R', 'R', 'R', 'G', 'B' 0 5

//Solution explanation
// I capture the first occurrence of non R and last occurrence of non B
// I start from first occurrence of non B
// if element is G, proceed to the next element
// if element is B, swap it with the last element that's not a B, $indexOfLastNonB --, check current element again
// if element is R, swap it with first non R position and $indexOfFirstNonR ++,


// $elements = ['B', 'G', 'R', 'R', 'R', 'G', 'R'];
$elements = ['G', 'B', 'R', 'R', 'B', 'R', 'G'];

sort3Elements($elements);
foreach($elements as $element) {
    echo $element."\n";
}

function sort3Elements(array &$array)
{
    $nonRIndex = 0;
    $size = count($array);
    while ($nonRIndex < $size && $array[$nonRIndex] == 'R') {
        $nonRIndex++;
    }
    if ($nonRIndex == $size) {
        return;
    }
    $nonBIndex = $size - 1;
    while ($nonBIndex >= 0 && $array[$nonBIndex] == 'B') {
        $nonBIndex--;
    }
    if ($nonBIndex < 0) {
        return;
    }

    $current = $nonRIndex;
    $end = $nonBIndex;

    while ($current <= $nonBIndex && $current >= $nonRIndex) {
        if ($array[$current] == 'R') {
            swap($array, $current, $nonRIndex);
            $nonRIndex++;
            $current++;
        } else if ($array[$current] == 'B') {
            swap($array, $current, $nonBIndex);
            $nonBIndex--;
        } else if ($array[$current] == 'G') {
            $current++;
        }
    }
}

function swap(array &$array, $i, $j)
{
    $temp = $array[$i];
    $array[$i] = $array[$j];
    $array[$j] = $temp;
}
