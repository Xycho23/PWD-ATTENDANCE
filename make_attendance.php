<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Attendance</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- SheetJS for Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>
    <!-- Moment.js for date and time -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }

        #rfidInput {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        #historyTab {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            display: none;
            width: 100%;
            overflow-x: auto;
            animation: fadeInUp 1s ease;
        }

        #historyTab h3 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }

        #historyTable {
            border-collapse: collapse;
            width: 100%;
        }

        #historyTable th,
        #historyTable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #historyTable th {
            background-color: #f2f2f2;
        }

        .rfid-icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .save-buttons {
            margin-top: 20px;
            animation: fadeInUp 1s ease;
        }

        .save-buttons input,
        .save-buttons button {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .save-buttons input[type="text"] {
            width: 250px;
        }

        .save-buttons button:hover {
            background-color: #45a049;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="font-family: 'Arial Black', sans-serif; margin-bottom: 20px;"><i class="fas fa-user-check"></i> Make Attendance</h2>
        <p style="font-size: 16px; margin-bottom: 20px;">Welcome! Use the RFID reader to scan attendance.</p>
        <div class="input-container">
            <div id="rfidIcon" class="rfid-icon"><i class="fas fa-rss"></i></div>
            <input type="text" id="rfidInput" placeholder="Tap RFID Card">
        </div>

        <div id="historyTab">
            <h3><i class="fas fa-history"></i> Attendance History</h3>
            <table id="historyTable">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>PWD ID</th>
                        <th>Contact Number</th>
                        <th>Purok</th>
                    </tr>
                </thead>
                <tbody id="historyList"></tbody>
            </table>
        </div>

        <div class="save-buttons">
            <input type="text" id="excelFileName" placeholder="Excel Filename">
            <button onclick="saveAttendanceAsExcel()"><i class="fas fa-file-excel"></i> Save as Excel</button>
        </div>
    </div>

    <script>
        // Function to handle RFID scanning
        function scanRFID() {
            var rfidData = document.getElementById('rfidInput').value.trim();

            // Check if RFID data is not empty
            if (rfidData !== '') {
                // Check if the RFID data is not already in the history table
                if (!document.querySelector('#historyList tr[data-rfid="' + rfidData + '"]')) {
                    // Read the CSV file and find the corresponding data for the scanned RFID card
                    fetch('attendance.csv')
                        .then(response => response.text())
                        .then(data => {
                            // Split the CSV data into rows
                            var rows = data.split('\n');
                            var found = false;
                            // Loop through each row to find the matching RFID data
                            for (var i = 0; i < rows.length; i++) {
                                var rowData = rows[i].split(',');
                                if (rowData[0].trim() === rfidData) {
                                    // Matching record found
                                    // Display the data in the history table
                                    var historyTable = document.getElementById('historyList');
                                    var newRow = historyTable.insertRow();
                                    newRow.dataset.rfid = rfidData; // Set the RFID data as a dataset attribute
                                    // Insert data fields into table cells
                                    for (var j = 1; j < rowData.length; j++) { // Excluding the RFID number
                                        var cell = newRow.insertCell();
                                        cell.textContent = rowData[j].trim();
                                    }
                                    found = true;
                                    break;
                                }
                            }
                            // Show the history tab if a match was found
                            if (found) {
                                document.getElementById('historyTab').style.display = 'block';
                            } else {
                                console.log('No matching record found for RFID data:', rfidData);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
                // Clear the RFID input field after processing
                document.getElementById('rfidInput').value = '';
            }
        }

        // Function to handle saving attendance as Excel
        function saveAttendanceAsExcel() {
            var htmlTable = document.getElementById('historyTable');
            var wb = XLSX.utils.table_to_book(htmlTable, { sheet: "Attendance" });
            var fileName = document.getElementById('excelFileName').value.trim() || 'attendance_' + moment().format('YYYYMMDD_HHmmss') + '.xlsx'; // Custom file name with timestamp
            XLSX.writeFile(wb, fileName);
        }

        // Automatically trigger RFID scanning when input field changes
        document.getElementById('rfidInput').addEventListener('change', scanRFID);
    </script>
</body>
</html>
