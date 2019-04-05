<?php 

// define variables and set to empty values
$name_error = $email_error = $user_name_error = $password_error = $repeat_password_error = $bdate_error = $city_error = "";
$name = $email = $user_name = $password = $repeat_password = $bdate = $city = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //name  field
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z. ]*$/",$name)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }
// email check
  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }

    //check email is taken or not
    include_once 'connect_server.php';

            $sql = "SELECT * FROM sign_up WHERE email = '$email' ";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
              $email_error = "This email is already exists.";
            }

  }

  //user name validation
  if (empty($_POST['user_name'])) {
    $user_name_error = "User name is required";
  } else {
            $user_name = test_input($_POST['user_name']);
            include_once 'connect_server.php';

            $sql = "SELECT * FROM sign_up WHERE user_name = '$user_name' ";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0){
              $user_name_error = "User name is taken";
            }
            
  }

  //password
  if(empty($_POST['password'])) {
    $password_error = "Password is required";
  } else {
     $password = test_input($_POST['password']);
  }
  
  // repeat password
  if($_POST['password'] != $_POST['repeat_password']){
    $repeat_password_error = "two passwords don't match";
  } else {
    $repeat_password = test_input($_POST["repeat_password"]);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  }
//city
if (empty($_POST['city'])) {
    $city_error = "City is required";
  } else {
    $city = test_input($_POST['city']);
  }

  //bdate
if (empty($_POST['bdate'])) {
    $city_error = "Birthday is required";
  } else {
    $bdate = test_input($_POST['bdate']);
  }
  
//insert on database
  if ($name_error == '' and $user_name_error == '' and  $email_error == '' and $password_error == '' and $repeat_password_error == '' and $bdate_error == '' and $city_error == '') {

    include_once 'connect_server.php';

    $gender = $_POST['gender'];
    $division = $_POST['division'];

    $sql = "INSERT INTO sign_up(name, user_name, email, password, bdate, gender, division,  city) VALUES ('$name'
    ,'$user_name','$email','$hashed_password','$bdate','$gender','$division','$city')";
    $result = mysqli_query($conn, $sql);
    if( $result )
    {
      echo "sign up successfull please wait....";
      $last_id = mysqli_insert_id($conn);
      //echo $last_id;
      $sql = "INSERT INTO profileimg(user_id, status) VALUES ('$last_id', 0);";
      mysqli_query($conn, $sql);
    }

    header("refresh:2; url=index.php");
    exit();
        # code...
      }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}