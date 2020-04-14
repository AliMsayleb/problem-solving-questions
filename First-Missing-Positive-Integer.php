<?php

// Hi, here's your problem today. This problem was recently asked by Facebook:
// You are given an array of integers. Return the smallest positive integer that is not present in the array. The array may contain duplicate entries.
// For example, the input [3, 4, -1, 1] should return 2 because it is the smallest positive integer that doesn't exist in the array.
// Your solution should run in linear time and use constant space.

// [5,3,2,1,6]

echo firstMissing([5,-2,-2,1,6]);

function firstMissing(array $array): int
{
    $size = count($array);
    for ($i = 0; $i < $size; $i++) {
        if ($array[$i] == $i + 1) {
            continue;
        }

        $current = $array[$i];

        while($current > 0 && $current <= $size && $current != $array[$current - 1]) {
            $temp = $array[$current - 1];
            $array[$current - 1] = $current;
            $current = $temp;
        }
    }

    for ($i = 0; $i < $size; $i++) {
        if($array[$i] != $i + 1) {
            return $i + 1;
        }
    }

    return $size + 1;
}

// [5,3,2,1,6]
// Explanation
// i = 0
// 5 != 1 =>
// $current = 5
// temp = 6
// array becomes [5,3,2,1,5]
// current now is 6 > size: continue
// i = 1
// 3 != 2 =>
// current = 3
// temp = 2
// array becomes [5,3,3,1,5]
// current now is 2
// temp = 3
// array becomes [5,2,3,1,5]
// current now is 2 == array[2-1] => continue
// i = 2, 3 = 2+1 contine
// i = 3
// 1 != 3
// current = 1
// temp = 5
// array becomes [1,2,3,1,5]
// current is now 5
// array[5-1] == 5 // continue
// i = 4
// array [5-1] == 5 // continue
// loop is done
// final array is [1,2,3,1,5]
// first element that is not in its place is 4 so 4 is smallest integer
// if all elements are in their place then the element that's not there is the next element in the array ( size + 1 )
// We're using the array as a hash set without losing any data
