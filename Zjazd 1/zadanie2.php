<?php

/*
    Napisz program, który wypisze na ekranie wszystkie liczby pierwsze z zadanego zakresu.
*/

function isPrime($num) {
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

$start = 1; 
$end = 100; 

for ($num = $start; $num <= $end; $num++) {
    if (isPrime($num)) {
        echo $num . " ";
    }
}
