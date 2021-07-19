<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Google.
// You are given an M by N matrix consisting of booleans that represents a board. 
// Each True boolean represents a wall. Each False boolean represents a tile you can walk on.
// Given this matrix, a start coordinate, and an end coordinate, 
// return the minimum number of steps required to reach the end coordinate from the start.
// If there is no possible path, then return null. 
// You can move up, left, down, and right. You cannot move through walls. You cannot wrap around the edges of the board.
// For example, given the following board:
// [[f, f, f, f],
// [t, t, f, t],
// [f, f, f, f],
// [f, f, f, f]]
// and start = (3, 0) (bottom left) and end = (0, 0) (top left), 
// the minimum number of steps required to reach the end is 7, 
// since we would need to go through (1, 2) because there is a wall everywhere else on the second row.


$map = [
    [0, 0, 0, 0],
    [1, 1, 1, 0],
    [0, 0, 0, 0],
    [0, 0, 0, 0],
];

$start = [3, 0];
$end = [0, 0];

echo "Answer is :".(solve($map, $start, $end)).PHP_EOL;

function solve($map, $startPoint, $endPoint) {
    show($map, $startPoint, $endPoint);
    $steps = 0;
    $visitedGraph = [];
    $visitedGraph[$startPoint[0]][$startPoint[1]] = true;
    if (equalPoints($startPoint, $endPoint)) {
        return $steps;
    }
    $currentPositions = [];
    $currentPositions[] = $startPoint;
    
    while (!empty($currentPositions)) {
        $nextCurrentPositions = [];
        $steps++;
        foreach($currentPositions as $position) {
            $left = [$position[0], $position[1] - 1];
            $right = [$position[0], $position[1] + 1];
            $up = [$position[0] - 1, $position[1]];
            $down = [$position[0] + 1, $position[1]];
            if (equalPoints($left, $endPoint) 
                || equalPoints($right, $endPoint) 
                || equalPoints($up, $endPoint) 
                || equalPoints($down, $endPoint)) {
                return $steps;
            }
            checkAndAdd($nextCurrentPositions, $left, $visitedGraph, $map);
            checkAndAdd($nextCurrentPositions, $right, $visitedGraph, $map);
            checkAndAdd($nextCurrentPositions, $up, $visitedGraph, $map);
            checkAndAdd($nextCurrentPositions, $down, $visitedGraph, $map);
        }
        $currentPositions = $nextCurrentPositions;
    }
    
    return null;
}

function checkAndAdd(&$currentPositions, $newPosition, &$visitedGraph, $map) {
    $w = count($map);
    $h = count($map[0]);
    if ($newPosition[0] < 0 || $newPosition[0] >= $w || $newPosition[1] < 0 || $newPosition[1] >= $h) {
        return;
    }
    
    if ($map[$newPosition[0]][$newPosition[1]] == true) {
        return;
    }
    
    if (isset($visitedGraph[$newPosition[0]][$newPosition[1]])) {
        return;
    }
    $visitedGraph[$newPosition[0]][$newPosition[1]] = true;
    $currentPositions[] = $newPosition;
}

function equalPoints($startPoint, $endPoint) {
    return $startPoint[0] == $endPoint[0] && $startPoint[1] == $endPoint[1];
}

function show($map, $start, $end) {
    for ($i = 0; $i < count($map); $i++) {
        for ($j = 0; $j < count($map[$i]); $j++) {
            if (equalPoints([$i, $j], $start) || equalPoints([$i, $j], $end)) {
                echo "* ";
            } else {
                echo $map[$i][$j] . " ";
            }
        }
        echo PHP_EOL;
    }
}