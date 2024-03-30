<?php

function removePunctuation($word) {
    $punctuationMarks = ['.', ',', ';', ':', '!', '?', '"'];
    
    if (in_array(substr($word, 0, 1), $punctuationMarks)) {
        do {
            $word = substr($word, 1);
        } while (in_array(substr($word, 0, 1), $punctuationMarks));
    }
    
    if (in_array(substr($word, -1), $punctuationMarks)) {
        do {
            $word = substr($word, 0, -1);
        } while (in_array(substr($word, -1), $punctuationMarks));
    }

    return $word;
}

function createAssociativeArrayFromWords($words) {
    $associativeArray = [];
    foreach ($words as $index => $value) {
        if ($index % 2 == 0) {
            $nextValue = isset($words[$index + 1]) ? $words[$index + 1] : null;
            $associativeArray[$value] = $nextValue;
        }
    }
    return $associativeArray;
}
