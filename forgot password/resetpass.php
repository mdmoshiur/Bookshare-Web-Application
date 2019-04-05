<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>conformation page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="mat/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="mat/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="mat/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="mat/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="mat/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="mat/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="mat/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="mat/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="mat/css/util.css">
	<link rel="stylesheet" type="text/css" href="mat/css/main.css">
<!--===============================================================================================-->
<script src="../sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert2/sweetalert2.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(mat/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Reset Password
					</span>
				</div>

				<form class="login100-form validate-form" action="resetpass.php" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="New Password is required">
						<span class="label-input100">New Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter New Password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" name="repass" placeholder="Enter Repeat Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="finish">
							Finish
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="mat/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="mat/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="mat/vendor/bootstrap/js/popper.js"></script>
	<script src="mat/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="mat/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="mat/vendor/daterangepicker/moment.min.js"></script>
	<script src="mat/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="mat/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="mat/js/main.js"></script>

</body>
</html>

<?php 
if(isset($_POST['finish'])){
	include '../connect_server.php';
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	$repass = mysqli_real_escape_string($conn, $_POST['repass']);

	//echo "pass ".$pass." repass ".$repass;

	if($pass!=$repass){
		//echo " hello ";
		 echo "<script language='javascript'>
              swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Two passdords don\'t match !!!'
                   })</script>";

                   exit();
	} else {
		$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "UPDATE sign_up SET password='$hashed_password' WHERE user_id='$_SESSION[confirm_user_id]';";
		$result = mysqli_query($conn, $sql);
      if( $result ){
      	echo "<script language='javascript'>
                            swal(
                                 'Great!!',
                                 'You update password',
                                 'success'
                                  )

                                 
                                      setTimeout(function(){
                                    window.location.href = '../login/login.php';
                                }, 1000);
    

                   
                          </script>";

                    //header("Location:../index.php");
                    exit();
      } else {
      	echo "update error";
      }
	}
}

 ?>