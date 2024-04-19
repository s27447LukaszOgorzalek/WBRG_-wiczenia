<!--
    Sprawdzenie, czy podana liczba jest liczbą pierwszą + licznik iteracji i czas wykonania
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Prime Number</title>
</head>
<body>
    <h1>Check if a number is prime</h1>
    <form action="" method="post">
        <label for="number">Enter a number:</label>
        <input type="text" pattern="[0-9]+" id="number" name="number" required>
        <input type="submit" value="Check">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST['number'];
            if (filter_var($number, FILTER_VALIDATE_INT) && $number > 0) {
                $iterationCount = 0;
                $startTime = microtime(true); 

                function isPrime($num) {
                    global $iterationCount;
                    if ($num <= 1) {
                        return false;
                    }
                    if ($num <= 3) {
                        return true;
                    }
                    if ($num % 2 == 0 || $num % 3 == 0) {
                        return false;
                    }
                    for ($i = 5; $i * $i <= $num; $i += 6) {
                        $iterationCount++;
                        if ($num % $i == 0 || $num % ($i + 2) == 0) {
                            return false;
                        }
                    }
                    return true;
                }

                $isPrime = isPrime($number);
                $endTime = microtime(true); 
                $executionTime = $endTime - $startTime; 

                if ($isPrime) {
                    echo "<p>$number is a prime number.</p>";
                } else {
                    echo "<p>$number is not a prime number.</p>";
                }
                echo "<p>Number of iterations: $iterationCount</p>";
                echo "<p>Execution time: " . number_format($executionTime, 7) . " seconds</p>";
            } else {
                echo "<p>Please enter a positive integer.</p>";
            }
        }
    ?>
</body>
</html>
