<!DOCTYPE html>
<html>
<head>
    <title>PWD Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://wallpaperaccess.com/full/8307327.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            text-align: center;
        }
        h1 {
            color: #007bff;
        }
        p {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 30px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin: 10px;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 18px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .button-secondary {
            background-color: #6c757d;
        }
        .button-secondary:hover {
            background-color: #545b62;
        }
        .icon {
            display: inline-block;
            width: 50px;
            height: 50px;
            background-image: url('pwd_icon.png');
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PWD Dashboard</h1>
        <p>Welcome to the PWD dashboard. Click below to view the attendance report.</p>
        <a href="attendance_report.php" class="button">ADD PWD MEMBER?</a>
    </div>
</body>
</html>
