<!DOCTYPE html>
<html>
<head>
    <title>pdf books</title>
</head>
<body>
<form action="pdf_upload.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="book_name" placeholder="book name"> <br><br>
    <input type="text" name="writer" placeholder="writer name"> <br><br>
    <input type="text" name="edition" placeholder="edition"> <br><br>
    <input type="file" name="file" placeholder="choose file"> <br><br>
    <button type="submit" name="submit">Upload</button>
</form>
</body>
</html>

<?php 
session_start();
include '../connect_server.php';
  if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
  }

if(isset($_POST['submit'])){
	$file = $_FILES['file'];
	//print_r($file);
    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
    $writer = mysqli_real_escape_string($conn, $_POST['writer']);
    $edition = mysqli_real_escape_string($conn, $_POST['edition']);

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
     
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf','txt','docx','doc');

    if(in_array($fileActualExt,$allowed)) {
    	if ($fileError === 0) {
    		if ($fileSize < 500*1048576) {
                $rand = mt_rand(100000, 999999);
    			$fileNameNew = $book_name."-".$rand.".".$fileActualExt;
    			$fileDestination = 'pdf books/'.$fileNameNew;
    			move_uploaded_file($fileTmpName, $fileDestination);
    			$sql = "INSERT INTO pdf(user_id, book_name, writer, edition, rand, size) VALUES ('$user_id', '$book_name', '$writer', '$edition', '$rand', '$fileSize');";
    			$result = mysqli_query($conn, $sql);
    			header("Location: ../index.php");

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
