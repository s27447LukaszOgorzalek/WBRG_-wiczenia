<!--
    Data oraz czas wykonania funkcji silnia rekurencyjnie oraz iteracyjnie.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Birthdate and Factorial Test</title>
</head>
<body>
    <h1>Enter Your Birthdate and Test Factorial Performance</h1>

    <h2>Birthdate Information</h2>
    <form action="" method="GET">
        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required>
        <input type="submit" value="Submit Birthdate">
    </form>
    <?php
        if (isset($_GET['birthdate']) && !empty($_GET['birthdate'])) {
            $birthdate = $_GET['birthdate'];
            echo "<h3>Information</h3>";
            echo "<p>You were born on: " . dayOfWeek($birthdate) . "</p>";
            echo "<p>Your age is: " . calculateAge($birthdate) . "</p>";
            echo "<p>Days left until next birthday: " . daysUntilNextBirthday($birthdate) . "</p>";
        }

        function dayOfWeek($birthdate) {
            $date = new DateTime($birthdate);
            return $date->format('l');
        }

        function calculateAge($birthdate) {
            $date = new DateTime($birthdate);
            $now = new DateTime();
            return $now->diff($date)->y;
        }

        function daysUntilNextBirthday($birthdate) {
            $date = new DateTime($birthdate);
            $now = new DateTime();
            $nextBirthday = new DateTime($now->format('Y') . '-' . $date->format('m-d'));
            if ($now > $nextBirthday) {
                $nextBirthday->modify('+1 year');
            }
            return $nextBirthday->diff($now)->days;
        }
    ?>

    <h2>Factorial Performance Test</h2>
    <form action="" method="post">
        <label for="number">Enter a number for factorial calculation:</label>
        <input type="text" id="number" name="number" pattern="\d+" required>
        <input type="submit" value="Calculate Factorial">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['number'])) {
            $number = $_POST['number'];
            if (filter_var($number, FILTER_VALIDATE_INT) && $number >= 0) {
                $startTime = microtime(true);
                $factorialResult = factorialRecursive($number);
                $endTime = microtime(true);
                $recursiveTime = $endTime - $startTime;

                $startTime = microtime(true);
                $factorialResultIterative = factorialIterative($number);
                $endTime = microtime(true);
                $iterativeTime = $endTime - $startTime;

                $iterativeDifference = $recursiveTime - $iterativeTime;
                $recursiveDifference = $iterativeTime - $recursiveTime;

                echo "<h3>Factorial Results</h3>";
                echo "<p>Recursive Result: $factorialResult (Time: " . number_format($recursiveTime, 7) . " seconds)</p>";
                echo "<p>Iterative Result: $factorialResultIterative (Time: " . number_format($iterativeTime, 7) . " seconds)</p>";
                    if ($recursiveTime > $iterativeTime) {
                        echo "<p>Iterative function was " . number_format($iterativeDifference, 7) . " seconds faster</p>";
                    } else {
                        echo "<p>Recursive function was " . number_format($recursiveDifference, 7) . " seconds faster</p>";
                    }
            } else {
                echo "<p>Please enter a valid non-negative integer.</p>";
            }
        }

        function factorialRecursive($n) {
            if ($n <= 1) return 1;
            else return $n * factorialRecursive($n - 1);
        }

        function factorialIterative($n) {
            $result = 1;
            for ($i = 2; $i <= $n; $i++) {
                $result *= $i;
            }
            return $result;
        }
    ?>
</body>
</html>
