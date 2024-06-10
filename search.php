<?php

// Database connection details (replace with your actual credentials)
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "greenefx_enquiry_details";

// Establish connection
$con = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// Check connection status
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define initial query (assuming you want all data initially)
$sql = "SELECT * FROM enquiry_data";

// Process search if submitted (use prepared statements for better security)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_term = mysqli_real_escape_string($con, $_POST["search_term"]);

    $stmt = mysqli_prepare($con, "SELECT * FROM enquiry_data WHERE C_NAME LIKE ?");
    mysqli_stmt_bind_param($stmt, "s", $search_term);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

} else {
    // No search submitted, execute initial query
    $result = mysqli_query($con, $sql);
}

// Check if any results found
if ($result && mysqli_num_rows($result) > 0) {
    echo '<div class="table" style=";
     width: 90%;
    position: relative;
    left: 5%;
    
    
    ">';
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>NAME</th>';
    echo '<th>EMAIL</th>';
    echo '<th>DOB</th>';
    echo '<th>PHONE-NO</th>';
    echo '<th>ADDRESS</th>';
    echo '<th>GENDER</th>';
    echo '<th>CURRENT STATUS</th>';
    echo '<th>FIELD OF WORK/STUDY</th>';
    echo '<th>COURSE</th>';
    echo '<th>INTERESTED IN OTHER COURSE</th>';
    echo '<th>OTHER COURSE</th>';
    echo '<th>REASON</th>';
    echo '<th>HEAR-US</th>';
    echo '<th>PROMATION</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        foreach ($row as $key => $value) {
            echo "<td>" . $value . "</td>";
        }
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';

} else {
    echo "<tr><td colspan='2'>No records found</td></tr>";
}

// Close connection (optional, PHP automatically closes on script termination)
mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 0.5rem;
                letter-spacing: 1px;
            }
            .logo{
                position: relative;
                left: 40%;

            }
            .se{
                height: 6rem;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #search{
                width: 50rem;
                border-radius: 10px;
                background-color: transparent;
                height: 2rem;
            }
            .se label{
                font-size: 1.3rem;
            }

    </style>
</head>
<body>
    
</body>
</html>