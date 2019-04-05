<!DOCTYPE html>
<html>
<head>
	<title>manage book</title>
	<link rel="stylesheet" type="text/css" href="managebook.css">
</head>
<body>

<form class="delete" action="managebook.php" method="POST">
<input class="MyButton" type="submit" value="Delete book" name="delete" /> 
<br><br>
<input class="MyButton" type="submit" value="Update book info"/>
</form>


</body>
</html>

<?php 
include '../connect_server.php';
session_start();
if (isset($_GET['id'])) {
	$_SESSION['duid']  = $_GET['id'];
}
   
if (isset($_POST['delete'])) {
	$sql = " DELETE FROM booksupload WHERE id = '$_SESSION[duid] '";
	$result = mysqli_query($conn, $sql);
    if ($result) {
    	echo "this book delated successfully.........";
    	header("refresh:2; url= mybooks.php");
    	exit();
    }
}

 ?>
