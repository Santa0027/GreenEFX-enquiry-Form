<?php
if (isset($_POST['submit'])) {


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $full_name = $first_name;
    $email = $_POST['email'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $DOB = $date . "/" . $month . "/" . $year;
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    // $gender = $_POST['gender'];
    $current_status = $_POST['current_status'];
    $current_status_input = $_POST['current_status_input'];
    $feild_status = $_POST['feild_status'];
    $course = $_POST['course'];
    $other_course = $_POST['other_course'];
    $other_course_input = $_POST['other_course_input'];
    $interest = $_POST['interest'];
    $hear_us = $_POST['hear_us'];
    $hear_us_input = $_POST['hear_us-input'];
    $promation = $_POST['promotion'];
    $status = '';
    

    



    $full_cname =$other_course_input=$current_status_input=$hear_us_input= filter_input(INPUT_POST, "cname", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $address = filter_input(INPUT_POST, "caddress", FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, "zip", FILTER_SANITIZE_NUMBER_INT);


    // function dummy($current_status, $current_status_input)
    // {
    //     $arrstatus = array('Employed', 'Unemployed', 'Student');
    //     if (in_array($current_status, $arrstatus)) {
    //         $status = $current_status;
    //         echo $status;
    //     } else {
    //         $status = $current_status_input;
    //         echo $status;
    //     }
    //     return $status;
    // }

    // dummy($current_status,$current_status_input);

    // echo $status;


  

$arrstatus = array("Employed", "Unemployed", "Student");

function dummy($current_status, $arrstatus, $current_status_input = "") {

  if (in_array($current_status, $arrstatus)) {
    $status = $current_status;
    // Consider returning or logging a message instead of echoing for clarity (optional)
    // echo "Status already exists: $status";
  }

  // Assign the input status only if it's not empty to avoid unnecessary assignments
  if (!empty($current_status_input)) {
    $status = $current_status_input;
  }
    return $status;
}

// Example usage (assuming $current_status is not in $arrstatus and $current_status_input has a value)

$new_status = dummy($current_status, $arrstatus, $current_status_input); // Pass the input value

echo "The status is: $new_status";







    // database crediniate
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

    $sql = "INSERT INTO enquiry_data (C_NAME,EMAIL,DOB,PHONE_NO,C_ADDRESS,GENDER,CURRENT_STATUS,FEILD_OF_WORK,COURSE,INTERESTED,OTHER_COURSE,REASON,HEAR_US,PROMATION)
     VALUE('$full_name','$email','$DOB','$phone','$address','$feild_status','$course','$other_course','$other_course_input','$interest','$hear_us','$promation')";
    $r = mysqli_query($con, $sql);

}


?>










<!-- 
    // database crediniate
    $db_server = "greenefxmedia.com";
    $db_user = "greenefx_enquiry_form";
    $db_pass = "GreenEFX#$23";
    $db_name = "greenefx_Enquiry_Details";
    $con = "";
    $con = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );

    $sql = "INSERT INTO Enquiry_data(C_NAME,EMAIL,PHONE_NO,) VALUE('$full_name','$email','$phone')";
    $r = mysqli_query($con, $sql);
 -->