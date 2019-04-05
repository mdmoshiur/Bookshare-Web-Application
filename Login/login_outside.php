
<?php 
session_start();
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
            echo "<script language='javascript'>alert('Please fill up empty field ')</script>";
           header("refresh:0; url=./login_form.php");
           exit();
	} else {
		include '../connect_server.php';
		$sql = "SELECT * FROM sign_up WHERE user_name = '$user_name_or_email' OR email = '$user_name_or_email' ";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
        
        if($resultCheck  < 1){
           echo "<script language='javascript'>alert('User name not found ')</script>";
           header("refresh:2; url=./login_form.php");
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

        			echo "login successfull<br>";
        			echo $_SESSION['name'];

                    header("refresh:2; url=../index.php");
                    exit();


        		} else {
              echo "<script language='javascript'>alert('Password not correct !!')</script>";
              header("refresh:0; url=./login_form.php");
              exit();
        		}

        		//De-hashing the password 
        		/*
        		$hashed_password_check = password_verify($password, $row['password']);
        		if ($hashed_password_check == false) {
        			header("Location:../index.php?login_error_password_not_match");
        	        exit();
        		} elseif ($hashed_password_check == true) {
        			# code...
        			$_SESSION['user_name'] = $row['user_name'];
        			$_SESSION['user_id'] = $row['user_id'];
        			$_SESSION['name'] = $row['name'];
        			$_SESSION['email'] = $row['email'];
        			$_SESSION['gender'] = $row['gender'];
        			$_SESSION['bdate'] = $row['bdate'];
        			$_SESSION['division'] = $row['division'];
        			$_SESSION['city'] = $row['city'];

                  
        			echo $_SESSION['name'];

        		} */
        }
        	}

	}

	
} else {
	header("Location:../index.php?login_error_not_submit");
}


 ?>