<?php

/*
    Dla zadanego N napisz program wyliczający N-tą liczbę Fibonacciego. 
    Ciąg powinien zostać zapisany w tablicy, a następnie program wypisze nieparzyste elementy tablicy. 
    Każdy element powinien być w nowej linii, a linie powinny być ponumerowane.
*/

function fibonacci($n) {
    $fib = [0, 1]; 

    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2]; 
    }

    return $fib;
}

$N = 10; 

$fibonacciSequence = fibonacci($N);

$lineNumber = 1;

foreach ($fibonacciSequence as $number) {
    if ($number % 2 !== 0) { 
        echo "Line " . $lineNumber . ": " . $number . PHP_EOL;
        $lineNumber++;
    }
}
