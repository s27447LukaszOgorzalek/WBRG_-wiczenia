<!--
    Prosty kalkulator
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <form method="post">
        <label for="number1">First number:</label>
        <input type="number" id="number1" name="number1" required><br><br>
        
        <label for="number2">Second number:</label>
        <input type="number" id="number2" name="number2" required><br><br>

        <label for="operation">Select operation:</label>
        <select id="operation" name="operation">
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select><br><br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $operation = $_POST['operation'];
        $result = 0;
        $error = "";

        switch ($operation) {
            case "add":
                $result = $number1 + $number2;
                break;
            case "subtract":
                $result = $number1 - $number2;
                break;
            case "multiply":
                $result = $number1 * $number2;
                break;
            case "divide":
                if ($number2 == 0) {
                    $error = "Division by zero error!";
                } else {
                    $result = $number1 / $number2;
                }
                break;
            default:
                $error = "Invalid operation!";
        }

        if ($error) {
            echo "<p>Error: $error</p>";
        } else {
            echo "<p>The result is: $result</p>";
        }
    }
    ?>
</body>
</html>
