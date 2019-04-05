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

				<form class="login100-form validate-form" action="confirm_page.php" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="confirmation code is required">
						<span class="label-input100">Confirmation code</span>
						<input class="input100" type="text" name="input" placeholder="Enter confirmation code">
						<span class="focus-input100"></span>
					</div>
                   <div class="flex-sb-m w-full p-b-30">
						<div>
							<a href="#" class="txt1">
								Resend confirmation code?
							</a>
						</div>
					</div>
					<br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="confirm">
							Confirm
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
if(isset($_POST['confirm'])){
	$input = $_POST['input'];
	//echo "input is ".$input;
	if($_SESSION['confirm_code']==$input){
		echo("<script>location.href = 'resetpass.php';</script>");
		exit();
	} else {
		 echo "<script language='javascript'>
              swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Confirmation code is not correct !'
                   })</script>";
	}
}

 ?>

