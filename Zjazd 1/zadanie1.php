<?php

/*
    Stwórz tablicę zawierającą nazwy kilku owoców (np. "jabłko", "banan", "pomarańcza"). 
    Napisz pętlę, która wyświetli każdy owoc w osobnej linii, pisany od tyłu 
    (nie używaj żadnej funkcji wbudowanej) oraz informację, czy dany owoc zaczyna się literą "p".
*/

$fruits = ["jabłko", "banan", "pomarańcza", "mandarynka", "pomelo"];

foreach ($fruits as $fruit) {
    $length = strlen($fruit);
    $reversedFruit = "";
    
    for ($i = $length - 1; $i >= 0; $i--) {
        $reversedFruit .= $fruit[$i];
    }
    
    $startsWithP = $fruit[0] === "p" || $fruit[0] === "P";
    
    echo $reversedFruit . " - " . ($startsWithP ? "starts with letter P" : "does not start with letter P") . PHP_EOL;
}

// Rozwiązanie alternatywne, z użyciem funkcji wbudowanych:

    // $fruits = ["jabłko", "banan", "pomarańcza", "mandarynka", "pomelo"];

    // foreach ($fruits as $fruit) {
    //     $reversedFruit = strrev($fruit);
    //     $startsWithP = stripos($fruit, "p") === 0;
        
    //     echo $reversedFruit . " - " . ($startsWithP ? "starts with letter P" : "does not start with letter P") . PHP_EOL;
    // }
