<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
         <div class="container">
            
            <div class="logo">
                <img src="green_logo.png" class="img" alt="">
            </div>
            <div class="se">
                 <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="search" >Search:</label>
                    <input type="text" id="search" name="search_term">
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>DOB</th>
                        <th>PHONE-NO</th>
                        <th>ADDRESS</th>
                        <th>GENDER</th>
                        <th>CURRENT STATUS</th>
                        <th>FEILD OF WORK/STUDY</th>
                        <th>COURSE</th>
                        <th>INTERESTED IN OTHER COURSE</th>
                        <th>OTHER COURSE</th>
                        <th>REASON</th>
                        <th>HEAR-US</th>
                        <th>PROMATION</th>
                    </tr>
                      <?php
                        $db_server = "localhost";
                        $db_user = "root";
                        $db_pass = "";
                        $db_name = "greenefx_enquiry_details";
                        $con = "";
                        $con = mysqli_connect(
                            $db_server,
                            $db_user,
                            $db_pass,
                            $db_name
                        );
                        $sql = "SELECT * FROM enquiry_data";
                        $result = $con->query($sql);

                        



                        if ($result->num_rows > 0) {
                            // $$excel_output = '';
                            
                            // $excel_output = "ID\tC_NAME\tEMAIL\tDOB\tPHONE_NO\tC_ADDRESS\tGENDER\tCURRENT_STATUS\tFEILD_OF_WORK\tCOURSE\tINTERESTED\tOTHER_COURSE\tREASON\tHEAR_US\tPROMATION\n"; // Excel column headers


                            // Fetch and format data rows
                            while ($row = $result->fetch_assoc()) {
                                $excel_output = '';
                                echo '
                                    
                                    <tr>
                                        <td>' . $row["SI_NO"] . '</td>
                                        <td>' . $row["C_NAME"] . '</td>
                                        <td>' . $row["EMAIL"] . '</td>
                                        <td>' . $row["DOB"] . '</td>
                                        <td>' . $row["PHONE_NO"] . '</td>
                                        <td>' . $row["C_ADDRESS"] . '</td>
                                        <td>' . $row["GENDER"] . '</td>
                                        <td>' . $row["CURRENT_STATUS"] . '</td>
                                        <td>' . $row["FEILD_OF_WORK"] . '</td>
                                        <td>' . $row["COURSE"] . '</td>
                                        <td>' . $row["INTERESTED"] . '</td>
                                        <td>' . $row["OTHER_COURSE"] . '</td>
                                        <td>' . $row["REASON"] . '</td>
                                        <td>' . $row["HEAR_US"] . '</td>
                                        <td>' . $row["PROMATION"] . '</td>
                                    </tr>
                                
                                    
                                ';
                                // $excel_output .= $row['SI_NO'] . "\t" . $row['C_NAME'] . "\t" . $row['EMAIL'] . "\t" . $row['DOB'] . "\t" . $row['PHONE_NO'] . "\t" . $row['C_ADDRESS'] . "\t" . $row['GENDER'] . "\t" . $row['CURRENT_STATUS'] . "\t" . $row['FEILD_OF_WORK'] . "\t" . $row['COURSE'] . "\t" . $row['INTERESTED'] . "\t" . $row['OTHER_COURSE'] . "\t" . $row['REASON'] . "\t" . $row['HEAR_US'] . "\t" . $row['PROMATION'] . "\n";
                            }




                            
                            // echo $excel_output;
                        }
                                                    
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
                </table> 
            </div>
        </div>





</body>
</html>