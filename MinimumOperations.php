<?php

// Hi, here's your problem today. This problem was recently asked by LinkedIn:
// You are only allowed to perform 2 operations, multiply a number by 2, or subtract a number by 1. 
// Given a number x and a number y, find the minimum number of operations needed to go from x to y.
// Here's an example and some starter code.

// print(min_operations(6, 20))
// (((6 - 1) * 2) * 2) = 20 : 3 operations needed only
// print 3

$result = minOperations(6, 20);

if ($result != "(((6 - 1) * 2) * 2) = 20 : 3 operations needed only") {
    echo "OUTPUT MISMATCH".PHP_EOL;
    echo $result;
}
echo $result;

function minOperations(int $number, int $target)
{
    if ($number == $target) {
        return [$number ." = ". $target, 0];
    }
    
    $currentNumbers = [$number => $number.""];
    $depth = 0;
    while (!empty($currentNumbers)) {
        $nextNumbers = [];
        $depth++;
        foreach ($currentNumbers as $number => $result) {
            $next1 = $number - 1;
            if ($next1 == $target) {
                return "(".$result." - 1) = ".$target." : ".$depth." operations needed only";
            } else {
                $nextNumbers[$next1] = "(".$result." - 1)";
            }
            $next2 = $number * 2;
            if ($next2 == $target) {
                return "(".$result." * 2) = ".$target." : ".$depth." operations needed only";
            } else {
                $nextNumbers[$next2] = "(".$result." * 2)";
            }
        }
        $currentNumbers = $nextNumbers;
    }
}
