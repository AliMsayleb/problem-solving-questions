<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Amazon.
// You are given a list of data entries that represent entries and exits of groups of people into a building. An entry looks like this:
// {"timestamp": 1526579928, count: 3, "type": "enter"}
// This means 3 people entered the building. An exit looks like this:
// {"timestamp": 1526580382, count: 2, "type": "exit"}
// This means that 2 people exited the building. timestamp is in Unix time.
// Find the busiest period in the building, that is, the time with the most people in the building.
// Return it as a pair of (start, end) timestamps. You can assume the building always starts off and ends up empty, i.e. with 0 people inside.

$entries = [];
$entries[] = ["timestamp" => 1526579928, "count" => 3, "type": "enter"];
$entries[] = ["timestamp" => 1526580382, "count" => 2, "type": "exit"];
$entries[] = ["timestamp" => 1526580383, "count" => 1, "type": "exit"];

$result = getBusiestTime($entries);
echo($result[0]." ". $result[1]);

function getBusiestTime(array $entries)
{
    $enter = "enter";

    usort($entries, function($entrieA, $entrieB) {
        return $entrieA["timestamp"] - $entrieB["timestamp"];
    })
    $maxSimultaneousPeople = 0;
    $currentPeople = 0;
    $newMax = false;
    foreach($entries as $entry) {
        if ($entry["type"] == ENTER) {
            $currentPeople += $entry["count"];
            if ($currentPeople > $maxSimultaneousPeople) {
                $maxSimultaneousPeople = $currentPeople;
                $maxStart = $entry["timestamp"];
                $newMax = true;
            }
        } else {
            $currentPeople -= $entry["count"];
            if ($newMax == true) {
                $newMax = false;
                $maxEnd = $entry["timestamp"];
            }
        }
    }

    return [$maxStart, $maxEnd];
}