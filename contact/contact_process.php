<?php
      session_start();

      if(isset( $_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $_SESSION['book_name'] = $_GET['book_name'];
        $_SESSION['uid'] = $user_id;
        
      include '../connect_server.php';
      $sql = "SELECT sign_up.email FROM sign_up WHERE sign_up.user_id='$user_id';";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);      
      $_SESSION['emailto'] = $row['email'];

      }

         


// define variables and set to empty values
$name_error = $email_error = $phone_error  = "";
$name = $email = $phone = $message =  $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z. ]*$/",$name)) {
      $name_error = "Only letters and white space allowed";  
    }
  }

  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }
  }
  
  if (empty($_POST["phone"])) {
    $phone_error = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(?:\+88|01)?(?:\d{11}|\d{13})$/",$phone)) {
      $phone_error = "Invalid phone number"; 
    }
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
  
  if ($name_error == '' and $email_error == '' and $phone_error == '' ){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }
      

      $to = $_SESSION['emailto'];
      $subject = 'From bookshare website';
      $headers = "From: ".$email;
      $txt = "You received an e-mail form ".$name."\n".$headers."\n"."Phone No: ".$phone."\n\n"."About your ".$_SESSION['book_name'].' book'."\n\n".$message;
      if (mail($to, $subject, $txt,$headers)){
          $success = "Message sent, thank you for contacting me!";
          include '../connect_server.php';
          $sql = "INSERT INTO notification(user_id,name, email, book_name, phone, message, status,  date_time) VALUES ('$_SESSION[uid]', '$name', '$email','$_SESSION[book_name]', '$phone', '$message', 'unread', now())";
            mysqli_query($conn, $sql);

          $name = $email = $phone = $message = '';
          
          header("Location: ../index.php");
          exit();
      }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}