<?php

// Good morning! Here's your coding interview problem for today.
// This problem was asked by Google.
// You are given a set of synonyms, such as (big, large) and (eat, consume). Using this set, determine if two sentences with the same number of words are equivalent.
// For example, the following two sentences are equivalent:
// "He wants to eat food."
// "He wants to consume food."
// Note that the synonyms (a, b) and (a, c) do not necessarily imply (b, c): consider the case of (coach, bus) and (coach, teacher).
// Follow-up: what if we can assume that (a, b) and (a, c) do in fact imply (b, c)?

$dataSets = [
    ["He wants to pizza food.", "He wants to consume food.", [['big', 'large'], ['eat', 'consume'], ['eat', 'pizza']]],
];

foreach ($dataSets as $dataSevt) {
    $res = areTwoSentencesEquivalentA($dataSet[0], $dataSet[1], $dataSet[2]) ? "" : "not ";
    echo $dataSet[0] . " and " . $dataSet[1] . " are " . $res . "equal\n";
}

class Synonym 
{
    /**
     * @var string
     */
    public $word;

    /**
     * @var string[]
     */
    public $synonyms;

    public function __construct(string $word) {
        $this->word = $word;
    }
}

function areTwoSentencesEquivalentA(string $sentenceOneString, string $sentenceTwoString, array $synonyms) {
    $sentenceOne = explode(' ', $sentenceOneString);
    $sentenceTwo = explode(' ', $sentenceTwoString);
    $synonyms = constructSynonyms($synonyms);
    // it's given that they have the same length
    for ($currentWordIndex = 0; $currentWordIndex < count($sentenceOne); ++$currentWordIndex) {
        $currentWordFromSentenceOne = $sentenceOne[$currentWordIndex];
        $currentWordFromSentenceTwo = $sentenceTwo[$currentWordIndex];
        if (!areEqualWordsA($currentWordFromSentenceOne, $currentWordFromSentenceTwo, $synonyms)) {
            return false;
        }
    } 

    return true;
}

function areEqualWordsA(string $currentWordFromSentenceOne, string $currentWordFromSentenceTwo, array $synonyms) {
    return $currentWordFromSentenceOne === $currentWordFromSentenceTwo
        ||  isset($synonyms[$currentWordFromSentenceOne]) && isset($synonyms[$currentWordFromSentenceOne]->synonyms[$currentWordFromSentenceTwo])
        ||  isset($synonyms[$currentWordFromSentenceTwo]) && isset($synonyms[$currentWordFromSentenceTwo]->synonyms[$currentWordFromSentenceOne]);
}

function constructSynonyms($synonyms) {
    $synonymsObjectsMap = [];
    foreach ($synonyms as $synonym) {
        $word = $synonym[0];
        $meaning = $synonym[1];
        $currentSynonymObject = isset($synonymsObjectsMap[$word]) ? $synonymsObjectsMap[$word] : new Synonym($word);
        $currentSynonymObject->synonyms[$meaning] = true;
        $synonymsObjectsMap[$word] = $currentSynonymObject;
    }

    return $synonymsObjectsMap;
}
