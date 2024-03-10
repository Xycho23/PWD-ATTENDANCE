<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pwd Member</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2><i class="fas fa-user-plus"></i> Add PWD Member</h2>
    <form action="process_attendance.php" method="post">
        <label for="last_name"><i class="fas fa-signature"></i> Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>
        <label for="first_name"><i class="fas fa-signature"></i> First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        <label for="age"><i class="fas fa-birthday-cake"></i> Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="gender"><i class="fas fa-venus-mars"></i> Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        <label for="pwd_id"><i class="fas fa-id-badge"></i> PWD ID:</label>
        <input type="text" id="pwd_id" name="pwd_id" required><br><br>
        <label for="rfid_number"><i class="fas fa-id-card"></i> RFID Number:</label>
        <input type="text" id="rfid_number" name="rfid_number" required><br><br>
        <label for="disability"><i class="fas fa-wheelchair"></i> Disability:</label>
        <input type="text" id="disability" name="disability" required><br><br>
        <label for="contact_number"><i class="fas fa-phone"></i> Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required><br><br>
        <label for="barangay"><i class="fas fa-map-marker-alt"></i> Barangay:</label>
        <input type="text" id="barangay" name="barangay" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
