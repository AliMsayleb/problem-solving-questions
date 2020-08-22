<!-- Good morning! Here's your coding interview problem for today.
This problem was asked by Dropbox.
Given a string s and a list of words words, where each word is the same length,
find all starting indices of substrings in s that is a concatenation of every word in words exactly once.
For example, given s = "dogcatcatcodecatdog" and words = ["cat", "dog"], return [0, 13], since "dogcat" starts at index 0 and "catdog" starts at index 13.
Given s = "barfoobazbitbyte" and words = ["dog", "cat"], return [] since there are no substrings composed of "dog" and "cat" in s.
The order of the indices does not matter. -->

<?php

$result = substring_indices("dogcatcatcodecatdog", ["cat", "dog"]);

function substring_indices(string $s, array $words)
{
  $wordSize = strlen($words[0]);
  $result = [];
  for ($i = 0; $i < strlen($s); $i++) {
      $set = [];
      for ($j = $i; $j <= strlen($s) - $wordSize; $j += $wordSize) {              
          $current = substr($s, $j, $wordSize);
          if (isset($set[$current]) || !in_array($current, $words)) {
            break;
          } else {
              $set[$current] = 1;
          }
      }
      if (count($set) == count($words)) {
          $result[] = $i;
      }
  }
  
  return $result;
}