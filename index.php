<?php


if (isset($_POST['submit'])) {


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $full_name = $first_name + $last_name;
    $email = $_POST['email'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $DOB = $date . "/" . $month . "/" . $year;
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $current_status = $_POST['current_status'];
    $current_status_input = $_POST['current_status_input'];
    $feild_status = $_POST['feild_status'];
    $course = $_POST['course'];
    $other_course = $POST['other_course'];
    $other_course_input = $POST['other_course_input'];
    $interest = $_POST['interest'];
    $hear_us = $_POST['hear_us'];
    $hear_us_input = $_POST['hear_us-input'];
    $promation = $_POST['promotion'];
    $submit = $_POST['submit'];

    $full_cname =$other_course_input=$current_status_input=$hear_us_input= filter_input(INPUT_POST, "cname", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $caddress = filter_input(INPUT_POST, "caddress", FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, "zip", FILTER_SANITIZE_NUMBER_INT);

    




    // database crediniate
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "costumer_details";
    $con = "";
    $con = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );

    $sql = "INSERT INTO personaldetails(C_NAME,C_EMAIL,C_ADDRESS,C_CITY,C_STATE,C_ZIP_CODE) VALUE('$cname','$email','$caddress','$city','$cstate','$zip')";
    $r = mysqli_query($con, $sql);


}
?>