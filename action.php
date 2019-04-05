<?php
//require_once("connect_server.php");
include_once 'connect_server.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$bdate = $_POST['bdate'];
$gender = $_POST['gender'];
$division = $_POST['division'];
$city = $_POST['city'];

//echo "name = $name,email= $email, pass=  $password, bdate= $bdate, gender= $gender, division = $division, city = $city ";
//print_r( $_POST ); this show all posted value

$sql = "INSERT INTO sign_up(name, email, password, birth_date, gender, division,  city, user_name) VALUES ('$name','$email','$password','$bdate','$gender','$division','$city','$user_name')";
$result = mysqli_query($conn, $sql);
if( $result )
{
  echo "data insertd";
}

header("refresh:2; url=index.php");
exit();

 ?>