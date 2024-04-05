<?php

/*
    1. Wczytanie pliku lorem_ipsum.txt z tekstem;
    2. Podzielenie tekstu na słowa;
    3. Usunięcie znaków interpunkcyjnych z każdego słowa;
    4. Utworzenie tablicy asocjacyjnej;
    5. Wyświetlenie tablicy asocjacyjnej.
*/

require_once 'zadanie4_funkcje.php';

$text = file_get_contents('lorem_ipsum.txt');

$words = explode(' ', $text);

for ($i = 0; $i < count($words); $i++) {
    $words[$i] = removePunctuation($words[$i]);
}

$associativeArray = createAssociativeArrayFromWords($words);

print_r($associativeArray);

// Alternatywnie zamiast print_r:

    // foreach ($associativeArray as $key => $value) {
    //     echo "$key => $value" . PHP_EOL;
    // }


// Alternatywna metoda bez tworzenia tablicy asocjacyjnej,
// imitująca wyświetlanie parami klucz => wartość,
// uwzględniając powtarzające się klucze:

    // for ($i = 0; $i < count($words); $i += 2) {
    //     $key = isset($words[$i]) ? $words[$i] : "[null]";
    //     $value = isset($words[$i + 1]) ? $words[$i + 1] : "[null]";
    //     echo "$key => $value" . PHP_EOL;
    // }
