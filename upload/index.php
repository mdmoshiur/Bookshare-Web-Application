<?php 
session_start();
include 'dbh.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>upload</title>
</head>
<body>
	<?php

        $sql = "SELECT * from user";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)> 0){
            while ($row = mysqli_fetch_assoc($result)){
                $id= $row['id'];
                $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
                $resultImg=mysqli_query($conn,$sqlImg);
                while($rowImg = mysqli_fetch_assoc($resultImg)){
                    echo "<div class=container>";
                        if($rowImg['status'] == 0){
                            echo "<img src= 'uploads/profile".$id.".jpg'>";
                        }else{

                            echo "<img src='uploads/profiledefault.jpg' width='100px' heigth='100px'>";
                        }
                        echo "<p>".$row['username']."</p>";
                    echo "</div>";
                }
            }
        }else{
            echo "There are no users yet!";
        }

	if (isset($_SESSION['id'])) {
		if($_SESSION['id'] == 1) {
			echo "you are looged in as user #1";
		}
		echo "<form action='upload.php'  method='POST' enctype='multipart/form-data'>
	              <input type='file' name='file'>
	              <button type='submit' name='submit'>Upload</button>
              </form>";
		
	} else {
		echo "you are not logged in";
		echo "<form action='signup.php' method='POST'>
	            <input type='text' name='first' placeholder='fist name'>
	            <input type='text' name='last' placeholder='last name'>
	            <input type='text' name='uid' placeholder='username'>
	            <input type='password' name='pwd' placeholder='password'>

	            <button type='submit' name='submitSignup'>Signup</button>
            </form>";
		echo "<p>Login as user!</p>
           <form action='login.php' method='POST'>
       	     <button type='submit'        name='submitLogin'>Login</button>
           </form>";
	}
    

	 ?>


<p>Logout as user!</p>
<form action="logout.php" method="POST">
	<button type="submit" name="submitLogout">Logout</button>
</form>

</body>
</html>