<?php 
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Log in</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src="../sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert2/sweetalert2.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action= "login.php" method="POST">
					<span class="login100-form-title">
						User Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid username & email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user_name_or_email" placeholder="Username or Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot your
						</span>
						<a class="txt2" href="../forgot password/forgot_pass.php">
							 Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="../signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>


<?php 

//session_start();
//echo "hello i am in login.php";

if(isset($_POST['submit'])) {
	//echo "hello i am in login.php";
	include '../connect_server.php';


	$user_name_or_email = mysqli_real_escape_string($conn, $_POST['user_name_or_email']);
	$pasd = mysqli_real_escape_string($conn, $_POST['password']);
	//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	//$password = md5($password);
     
    //echo "hello i am in login.php";
    //echo $user_name_or_email;
    //echo $pasd;

	// error handlers
	// check if input are  empty
	if( empty($user_name_or_email) || empty( $pasd)){
            echo "<script language='javascript'>swal('Please fill up empty field ')</script>";
           //header("refresh:0; url=./login.php");
           exit();
	} else {
		include '../connect_server.php';
		$sql = "SELECT * FROM sign_up WHERE user_name = '$user_name_or_email' OR email = '$user_name_or_email' ";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
        
        if($resultCheck  < 1){
        	echo "<script language='javascript'>  swal('Username/email ?','Username or email not Found!','question')</script>";

          // header("Location:./login1.php");
           exit();
        } else {
        	if($row = mysqli_fetch_assoc($result)){

        		if(password_verify($pasd,$row['password'])) {
        			$_SESSION['user_name'] = $row['user_name'];
        			$_SESSION['user_id'] = $row['user_id'];
        			$_SESSION['name'] = $row['name'];
        			$_SESSION['email'] = $row['email'];
        			$_SESSION['gender'] = $row['gender'];
                    $originalDate = $row['bdate'];
                    $_SESSION['bdate']  = date("d-m-Y", strtotime($originalDate));
        			$_SESSION['division'] = $row['division'];
        			$_SESSION['city'] = $row['city'];

        			//echo "login successfull<br>";
        			//echo $_SESSION['name'];
                     echo "<script language='javascript'>
                            swal(
                                 'Great!!',
                                 'You are logged in',
                                 'success'
                                  )

                                 
                                      setTimeout(function(){
                                    window.location.href = '../index.php';
                                }, 1000);
    

                   
                          </script>";

                    //header("Location:../index.php");
                    exit();


        		} else {
              echo "<script language='javascript'>
              swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Password not correct !',
                      footer: '<a href>Forget Password?</a>'
                   })</script>";
              
              //header("refresh:0; url=./login.php");
              exit();
        		}

        		
        }
        	}

	}

	
}

 ?>