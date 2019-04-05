<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>upload book</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src="../sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert2/sweetalert2.css">
</head>
<body>


	<div class="container-contact100" >
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="upload_book.php" method="POST">
				<span class="contact100-form-title">
					Book Information
				</span>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Book Name</span>
					<input class="input100" type="text" name="book_name" placeholder="Enter book name" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Book Writer</span>
					<input class="input100" type="text" name="writer" placeholder="Book writer name">
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input100 input100-select">
					<span class="label-input100">What do you want ?</span>
					<div>
						<select class="selection-2" name="want">
							<option>Choose your demand</option>
							<option>Share</option>
							<option>Sell</option>
							<option>Negotiable</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
					<span class="focus-input100"></span>
				</div>


				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name = "submit">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>

<?php

//include('booksupload.php');

if(isset($_POST['submit'])) {
 
	include '../connect_server.php';
 
	$book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
	$writer = mysqli_real_escape_string($conn, $_POST['writer']);
	$want = mysqli_real_escape_string($conn, $_POST['want']);
	$message = mysqli_real_escape_string($conn, $_POST['message']);

    //session_start();
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
      //echo "book uploaded successfully please wait......";
    	echo "<script language='javascript'>
                            swal(
                                 'Great!!',
                                 'Books uploaded successfully',
                                 'success'
                                  )

                                 
                                      setTimeout(function(){
                                    window.location.href = '../index.php';
                                }, 1000);
    

                   
                          </script>";
                          exit();
    }

    
    

} else {
    echo "<script language='javascript'>swal(
  'You are not logged in',
  'Please log in first',
  'question'
)</script>";
    //header("refresh:0; url=booksupload.php");
    exit();
}


}

 ?>
