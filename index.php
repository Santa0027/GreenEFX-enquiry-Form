<?php
if (($_SERVER["REQUEST_METHOD"] == "POST")) {


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
  $gender = $_POST['gender'];
  $current_status = $_POST['current_status'];
  $current_status_input = $_POST['current'];
  $feild_status = $_POST['feild_status'];
  $course = $_POST['course'];
  $other_course = $_POST['other_course'];
  $other_course_input = $_POST['other_course_input'];
  $interest = $_POST['interest'];
  $hear_us = $_POST['hear_us'];
  $input = $_POST['cc'];
  $promation = $_POST['promotion'];







  // $full_cname =$other_course_input=$current_status_input=$hear_us_input= filter_input(INPUT_POST, "cname", FILTER_SANITIZE_SPECIAL_CHARS);
  // $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  // $address = filter_input(INPUT_POST, "caddress", FILTER_SANITIZE_SPECIAL_CHARS);
  // $phone = filter_input(INPUT_POST, "zip", FILTER_SANITIZE_NUMBER_INT);

  $new_variable1 = empty($_POST['current']) ? $current_status : $current_status_input;

  $new_variable2 = empty($_POST['other_course_input']) ? $other_course : $other_course_input;

  $new_variable3 = !empty($_POST['cc']) ? $input : $hear_us;

  // echo "/variable 1: \n $new_variable1";
  // echo "/variable 2: \n $new_variable2";
  // echo "/variable 3: \n $new_variable3";



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

        if (getimagesize($_FILES['image']['tmp_name'])==false)
          {
          echo "Please Select Image";
        }
        else{
          $image=$_FILES['image']['tmp_name'];
          $name= $_FILES['image']['name'];
          $image= file_get_contents($image);
          $image=base64_encode ($image);
          // $sql="INSERT INTO img (NAME, IMAGE) VALUES ('$name', '$image')";
          $sql = "INSERT INTO enquiry_data(C_NAME,PHOTO,C_DATA,EMAIL,DOB,PHONE_NO,C_ADDRESS,GENDER,CURRENT_STATUS,FEILD_OF_WORK,COURSE,INTERESTED,OTHER_COURSE,REASON,HEAR_US,PROMATION)
          VALUE('$full_name','$image','$name','$email','$DOB','$phone','$address','$gender','$new_variable1','$feild_status','$course','$other_course','$new_variable2','$interest','$new_variable3','$promation')";
        }




  // $sql = "INSERT INTO enquiry_data(C_NAME,EMAIL,DOB,PHONE_NO,C_ADDRESS,GENDER,CURRENT_STATUS,FEILD_OF_WORK,COURSE,INTERESTED,OTHER_COURSE,REASON,HEAR_US,PROMATION)
  //    VALUE('$full_name','$email','$DOB','$phone','$address','$gender','$new_variable1','$feild_status','$course','$other_course','$new_variable2','$interest','$new_variable3','$promation')";

  // $r = mysqli_query($con, $sql);


  if ($con->query($sql) === TRUE) {
    $response = array("success" => true, "message" => "New record created successfully");
  } else {
    $response = array("success" => false, "message" => "Error: " . $sql . "<br>" . $con->error);
  }


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






<!-- 
  <script>
    const form= document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault();
        

        var formData = new FormData(this);

        // Create an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php', true);

        xhr.onload = function() {
            console.log("santha ");
            if (xhr.status === 200) {
                document.getElementById('response').textContent = "Successfully submitted!";
                document.getElementById('myForm').reset(); 
            } else {
                document.getElementById('response').textContent = 'An error occurred while submitting the form.';
            }
        };

        xhr.send(formData); // Send the form data
   
    });
</script> -->



<!-- <a href="download.php" class="btn btn-primary">Download Data</a> -->