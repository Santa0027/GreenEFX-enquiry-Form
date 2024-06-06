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


        
            
     
        // $excel_output .= $row['SI_NO'] . "\t" . $row['C_NAME'] . "\t" . $row['EMAIL'] . "\t" . $row['DOB'] . "\t" . $row['PHONE_NO'] . "\t" . $row['C_ADDRESS'] . "\t" . $row['GENDER'] . "\t" . $row['CURRENT_STATUS'] . "\t" . $row['FEILD_OF_WORK'] . "\t" . $row['COURSE'] . "\t" . $row['INTERESTED'] . "\t" . $row['OTHER_COURSE'] . "\t" . $row['REASON'] . "\t" . $row['HEAR_US'] . "\t" . $row['PROMATION'] . "\n";
    }
    // echo $excel_output;



 if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_term = mysqli_real_escape_string($conn, $_POST["search_term"]);
        $sql = "SELECT C_NAME FROM enquiry_data WHERE name LIKE '%$search_term%'";
        $result = mysqli_query($conn, $sql);
      } else {
        // No search submitted, display all records (optional)
        $sql = "SELECT C_NAME FROM users";
        $result = mysqli_query($conn, $sql);
      }

      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "</tr>";
        }
} else {
    echo "<tr><td colspan='2'>No records found</td></tr>";
}

?>












