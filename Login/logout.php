<!DOCTYPE html>
<html>
<head>
	<title>log out</title>
<script src="../sweetalert2/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../sweetalert2/sweetalert2.css">
</head>
<body>
</body>
</html>
<?php 
//include '../index.php';
if( !isset($_POST['submit'])) {
	session_start();
	session_unset();
	session_destroy();
	//echo 'log out successfull';
	///header("refresh:2; url=../index.php");
	//exit();


	                     echo "<script language='javascript'>
                            swal(
                                 'Great!!',
                                 'Log out successfull',
                                 'success'
                                  )

                                 
                                      setTimeout(function(){
                                    window.location.href = '../index.php';
                                },1000);
    

                   
                          </script>";

                    //header("Location:../index.php");
                    exit();
}


 ?>