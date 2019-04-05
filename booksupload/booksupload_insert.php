<?php

//include('booksupload.php');

if(isset($_POST['submit'])) {
 
	include '../connect_server.php';
 
	$book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
	$writer = mysqli_real_escape_string($conn, $_POST['writer']);
	$want = mysqli_real_escape_string($conn, $_POST['want']);
	$message = mysqli_real_escape_string($conn, $_POST['message']);

    session_start();
    if(isset($_SESSION['user_id'])){

	$user_id = $_SESSION['user_id'];
   // $user_id = 1;
    //print_r($_POST);
    //echo $writer;
    //echo $want;
    //echo $message;
    include '../connect_server.php';

    if(empty($writer)){
    	$writer = "not_given";
    }

    if( empty($message)){
    	$message = "not_given";
    }

    $sql = "INSERT INTO booksupload(user_id, book_name, writer, want, message) VALUES($user_id, '$book_name', '$writer','$want', '$message') "; 
    $result = mysqli_query($conn, $sql);
    if( $result )
    {
      echo "book uploaded successfully please wait......";
    }

    header("refresh:2; url=../index.php");
    exit();

} else {
    echo "<script language='javascript'>alert('Please login first')</script>";
    header("refresh:0; url=booksupload.php");
    exit();
}


}

 ?>