<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Attendance System - Login</title>
    <style>
        /* Styles for login form */
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://tatk.elte.hu/media/00/d4/8a4e74de9b8eacf0efbaeda91a06a97c10ca719b0ddda8361e81a1a49240/fogyatekossagbarat-munkahely.png');
            background-size: cover;
            background-position: left;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: left;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 300px;
            padding: 20px;
            background-color: rgba(255, 200, 100, 0.8); /* Light orange background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            margin-top: 0; /* Remove default top margin */
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 18px;
            font-weight: bold; /* Make input text bold */
        }

        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: orange; /* Light orange button */
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold; /* Make button text bold */
        }

        input[type="submit"]:hover {
            background-color: #FF8C00; /* Darker shade of orange on hover */
        }

        .error {
            color: red;
            margin-bottom: 10px; /* Add margin to separate from other elements */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>PWD LOG IN SYSTEM</h1><br>
    <?php echo $error ? '<p class="error">' . $error . '</p>' : ''; ?> <!-- Show error if present -->
    <form action="<?= base_url('login/aksi_login')?>" method="post" enctype="multipart/form-data"></form>
    <form action="login_process.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
