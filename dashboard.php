<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PWD Interface</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://tatk.elte.hu/media/00/d4/8a4e74de9b8eacf0efbaeda91a06a97c10ca719b0ddda8361e81a1a49240/fogyatekossagbarat-munkahely.png');
            /* Background color */
            background-color: transparent;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .menu-item {
            padding: 20px;
            text-align: center;
            background-color: #f0f0f0;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            transform: translateY(-5px);
        }

        .menu-item a {
            color: #333;
            text-decoration: none;
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        .menu-item i {
            font-size: 48px;
            margin-bottom: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PWD Interface Dashboard</h1>
        <div class="menu">
            <div class="menu-item">
                <i class="fas fa-info-circle"></i>
                <div>About</div>
                <a href="about.php">About</a>
            </div>
            <div class="menu-item">
                <i class="fas fa-user-plus"></i>
                <div>Add PWD Member</div>
                <a href="add_member.php">Add PWD Member</a>
            </div>
            <div class="menu-item">
                <i class="far fa-calendar-check"></i>
                <div>Make an Attendance</div>
                <a href="make_attendance.php">Make an Attendance</a>
            </div>
            <div class="menu-item">
                <i class="fas fa-file-alt"></i>
                <div>Attendance Report</div>
                <a href="attendance_report.php">Attendance Report</a>
            </div>
            <div class="menu-item">
                <i class="fas fa-sign-out-alt"></i>
                <div>Log Out</div>
                <a href="MAIN_MENU.php">Log Out</a>
            </div>
        </div>
    </div>
</body>
</html>
