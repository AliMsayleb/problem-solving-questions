<?php

// Hi, here's your problem today. This problem was recently asked by Facebook:
// Given a file path with folder names, '..' (Parent directory), and '.' (Current directory),
// return the shortest possible file path (Eliminate all the '..' and '.').

$input = '/Users/Joma/Documents/../././././Documents/../Desktop/./../';
$output = '/Users/Joma/';

assert(shorten($input) == $output);

function shorten($path)
{    
    $elements = explode('/', $path);
    
    $results = [];
    $index = 0;
    for ($i = 0; $i < count($elements); $i++) {
        if ($elements[$i] == '.' || $elements[$i] == '') {
            continue;
        } else if ($elements[$i] == '..') {
            $index--;
        } else {
            $results[$index++] = $elements[$i];
        }
    }
    
    $path = '/';
    for ($i = 0; $i < $index; $i++) {
        $path .= $results[$i] .'/';
    }
    
    return $path;
}
