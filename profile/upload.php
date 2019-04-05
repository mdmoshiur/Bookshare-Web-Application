<!DOCTYPE html>
<html>
<head>
    <title>upload profile image</title>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" placeholder="choose file"> <br><br>
    <button type="submit" name="submit">Upload</button>
</form>
</body>
</html>

<?php 
session_start();
include '../connect_server.php';
$user_id = $_SESSION['user_id'];

if(isset($_POST['submit'])){
	$file = $_FILES['file'];
	//print_r($file);

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
     
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','tiff','gif');

    if(in_array($fileActualExt,$allowed)) {
    	if ($fileError === 0) {
    		if ($fileSize < 10*1048576) {
    			$fileNameNew = "profile".$user_id.".".$fileActualExt;
    			$fileDestination = 'uploads/'.$fileNameNew;
    			move_uploaded_file($fileTmpName, $fileDestination);
    			$sql = "UPDATE profileimg SET status=1, type='$fileActualExt' WHERE user_id='$user_id';";
    			$result = mysqli_query($conn, $sql);
    			header("Location: profile.php");

    		} else {
    			echo "your file is too big!";
                echo $fileSize;
    		}

    	} else {
    		echo "there was an error uploading your file ! ";
            echo $fileError;
    	}

    } else {
    	echo "You cannot upload files of this type !";
    }

}

 ?>
