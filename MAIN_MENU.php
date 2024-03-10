<?php ob_start(); ?>
<?php 
// Start PHP session
session_start();

// Maximum login attempts
$max_attempts = 100; 
// Error message
$error_message = ""; 

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Define username and password
    $username = "user"; 
    $password = "user"; 
    
    // Check and increment attempt count
    if (!isset($_SESSION['attempt_count'])) { 
        $_SESSION['attempt_count'] = 1; 
    } else { 
        $_SESSION['attempt_count']++; 
    } 
    
    // Check login attempts
    if ($_SESSION['attempt_count'] <= $max_attempts) { 
        // Validate username and password
        if ($_POST["username"] == $username && $_POST["password"] == $password) { 
            // Redirect to dashboard on successful login
            header("Location: dashboard.php");
            exit(); // Terminate script after redirect
        } else { 
            // Display error message
            $error_message = "Invalid username or password. Please try again."; 
        } 
    } else { 
        // Display maximum attempts reached message
        $error_message = "Maximum login attempts reached. Please try again later."; 
    } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Attendance System - Login</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            /* Background Image */
            background-image: url('https://tatk.elte.hu/media/00/d4/8a4e74de9b8eacf0efbaeda91a06a97c10ca719b0ddda8361e81a1a49240/fogyatekossagbarat-munkahely.png');
            background-size: cover;
            background-position: left;
            margin: 0;
            padding: 0;
            /* Center content vertically and align to the left */
            display: flex;
            justify-content: left;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 200px;
            padding: 200px;
            background-color: orange(255, 255, 255, 0.8); 
            border-radius: 10px;
            box-shadow: 0 0 10px orange(0, 0, 0, 0.3);
            position: relative;
            /* Align content to the left */
            text-align: left;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 30px);
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 18px;
            padding-left: 40px;
        }

        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #999;
        }

        /* Position icons */
        .fa-user,
        .fa-lock {
            position: left;
            left: 20px;
            top: 40%;
            transform: translateY(-50%);
            color: #555;
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

        /* Notification styles */
        .notification {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <!-- Login form container -->
    <div class="container">
         <h1> PWD LOGIN SYSTEM</h1> 
        
        <!-- Display error message if any -->
        <?php if ($error_message !== ""): ?>
            <div class="notification"><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <!-- Login form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Username input -->
            <label for="username"><i class="fas fa-user"></i> Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required>
            <!-- Password input -->
            <label for="password"><i class="fas fa-lock"></i> Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
            <!-- Submit button -->
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

<?php 
// Flush output buffer and send content to the browser
ob_end_flush();
?>
