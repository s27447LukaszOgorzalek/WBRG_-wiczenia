<!--
    Baza danych i mysqli
-->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection with database established.<br>";

$sql = "SELECT id, imie, nazwisko FROM test_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Example of using mysqli_fetch_row:<br>";
    while($row = mysqli_fetch_row($result)) {
        echo "id: " . $row[0] . " - Imię: " . $row[1] . " - Nazwisko: " . $row[2] . "<br>";
    }
    
    $result->data_seek(0);
    
    echo "Example of using mysqli_fetch_array:<br>";
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "id: " . $row["id"] . " - Imię: " . $row["imie"] . " - Nazwisko: " . $row["nazwisko"] . "<br>";
    }
    
    echo "Number of rows in the result: " . mysqli_num_rows($result) . "<br>";
} else {
    echo "No results.";
}

$sql_insert = "INSERT INTO test_table (id, imie, nazwisko) VALUES (2, 'Jan', 'Kowalski')";
if ($conn->query($sql_insert) === true) {
    echo "New record created successfully!<br>";
} else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

$conn->close();
