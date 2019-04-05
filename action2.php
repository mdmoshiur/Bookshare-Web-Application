 <?php
if( isset($_POST['submit'])){
	include_once 'connect_server.php';
    
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $bdate = mysqli_real_escape_string($conn,$_POST['bdate']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $division = mysqli_real_escape_string($conn,$_POST['division']);
    $city = mysqli_real_escape_string($conn,$_POST['city']);


     //error handlers
    // check empty fields
    if (empty($name) || empty($email) || empty($password) || empty($bdate) || empty($gender) || empty($division) || empty($city)) {
    	header("Location:../signup.php?signup=empty");
    	exit();
    } else {
    	// check if input characters are valid 
    	if ( !preg_match("/^[a-zA-Z*$/", $name)) {
    		header("Location:../signup.php?signup=invalidname");
    		exit();
    	} else {
    		// check valid email
    		if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    			header("Location:../signup.php?signup=invalidemail");
    			exit();
    		} else {
    			$sql = "SELECT * FROM sign_up WHERE user_name = '$user_name' ";
    			$result = mysqli_query($conn, $sql);
    			$resultCheck = mysqli_num_rows($result);

    			if ($resultCheck > 0) {
    				header("Location:../signup.php?signup=user name taken");
    				exit();
    			} else {
    				// hashing the password
    				$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    			}
    		}
    	}
    }

} else {
	header("Location:index.php");
	exit();
}


 ?>