<!--
    Struktura plików.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Directory Operations</title>
</head>
<body>
    <h1>Directory Operations</h1>
    <form action="" method="post">
        <label for="path">Directory Path (e.g., ./pliki/):</label>
        <input type="text" id="path" name="path" required><br><br>

        <label for="directoryName">Directory Name (e.g., kod):</label>
        <input type="text" id="directoryName" name="directoryName" required><br><br>

        <label for="operation">Select Operation:</label>
        <select name="operation" id="operation">
            <option value="read">Read</option>
            <option value="delete">Delete</option>
            <option value="create">Create</option>
        </select><br><br>

        <input type="submit" value="Perform Operation">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $path = rtrim($_POST['path'], '/') . '/'; 
            $directoryName = $_POST['directoryName'];
            $operation = $_POST['operation'] ?? 'read'; // Default to 'read' if not specified

            function manageDirectory($path, $directoryName, $operation) {
                $fullPath = $path . $directoryName;
                switch ($operation) {
                    case "read":
                        if (is_dir($fullPath)) {
                            $files = scandir($fullPath);
                            echo "<p>Contents of $directoryName:</p><ul>";
                            foreach ($files as $file) {
                                if ($file != "." && $file != "..") {
                                    $filePath = $fullPath . '/' . $file;
                                    if (is_dir($filePath)) {
                                        echo "<li><strong>$file</strong></li>"; // Bold for directories
                                    } else {
                                        echo "<li>$file</li>";
                                    }
                                }
                            }
                            echo "</ul>";
                        } else {
                            echo "<p>Directory does not exist.</p>";
                        }
                        break;
                    case "delete":
                        if (is_dir($fullPath) && count(scandir($fullPath)) == 2) { // Check if directory is empty
                            rmdir($fullPath);
                            echo "<p>Directory deleted successfully.</p>";
                        } else {
                            echo "<p>Directory is not empty or does not exist.</p>";
                        }
                        break;
                    case "create":
                        if (!file_exists($fullPath)) {
                            mkdir($fullPath);
                            echo "<p>Directory created successfully.</p>";
                        } else {
                            echo "<p>Directory already exists.</p>";
                        }
                        break;
                    default:
                        echo "<p>Invalid operation.</p>";
                        break;
                }
            }

            manageDirectory($path, $directoryName, $operation);
        }
    ?>
</body>
</html>
