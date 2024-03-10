<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report - PWD Interface</title>
    <!-- Add any additional CSS or external stylesheet links here if needed -->
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-family: 'Arial Black', sans-serif;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            border: 1px solid #ddd;
        }
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        input[type="text"] {
            width: calc(100% - 16px); /* Adjust width for the input fields */
            border: none;
            outline: none;
            background-color: transparent;
            font-size: inherit;
        }
        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-user-check"></i> Attendance Report</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table>
                <tbody>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['attendance'])) {
                        // Process form submission
                        $file = fopen("attendance.csv", "w");
                        if ($file !== FALSE) {
                            foreach ($_POST['attendance'] as $attendance) {
                                // Trim values and concatenate with commas
                                $attendance = implode(', ', array_map('trim', explode(',', $attendance)));
                                fwrite($file, $attendance . "\n");
                            }
                            fclose($file);
                        }
                        // Display the input fields with the submitted data
                        foreach ($_POST['attendance'] as $value) {
                            echo "<tr><td><input type='text' name='attendance[]' value='" . htmlspecialchars($value) . "'></td></tr>";
                        }
                    } else {
                        // Read data from the CSV file
                        $file = fopen("attendance.csv", "r");
                        if ($file !== FALSE) {
                            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                                echo "<tr>";
                                foreach ($data as $value) {
                                    echo "<td><input type='text' name='attendance[]' value='" . htmlspecialchars($value) . "'></td>";
                                }
                                echo "</tr>";
                            }
                            fclose($file);
                        }
                    }
                    ?>
                </tbody>
            </table>

            <button type="submit"><i class="fas fa-save"></i> Save Changes</button>
        </form>
    </div>
</body>
</html>
