<?php 
  if (isset($_GET['id'])) {
  	$id = $_GET['id'];
  	include '../connect_server.php';
  	$sql = "SELECT * FROM notification WHERE id='$id'";
  	$result = mysqli_query($conn, $sql);
  	$row = mysqli_fetch_array($result);

    $time = new DateTime($row['date_time']);
    $date = $time->format('D j/n/Y');
    $time = $time->format('g:i:s A');
    //echo date('F j, Y, g:i a',strtotime($row['date_time']));
    $sql = "UPDATE notification SET status='read' WHERE id='$id';";
  	$result = mysqli_query($conn, $sql);
  }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>notification</title>
	<style>
        body {
            margin-left: 100px;
            margin-top: 100px;
        }
		
	</style>
</head>
<body>
	<div> Date : <?php echo $date.'<br>Time : '.$time; ?> <br><br>
	</div>
    <div>You received email from <?php echo '<b><i>'.$row['name'].'</i></b>'; ?> <br>
    	<b><i>Email: </i></b> <?php echo $row['email'] ?><br>
    	<b><i>Phone: </i></b> <?php echo $row['phone'] ?><br><br>
    </div>

    <div>
    	<?php echo '<b><i>'.$row['name'].'</i></b>'.' is interested about your '.'<b><i>'.$row['book_name'].'</i></b>'.' book.<br><br>'.'<b><i>'.$row['name'].' says: '.' </i></b>'.$row['message'];
    	?>
    </div>
    <div>
    	<br><br>
    	<a href="../index.php">Back to Home</a>
    </div>
</body>
</html>