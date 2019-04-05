<?php
    session_start();
    include_once 'dbh.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{
            margin:20px;
            padding:10px;
            background:#ccc;
           
        }
        .container img{
            width:50px;
            height:50px
        }
        .container p{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size:20px;
            position:inherit;
            float:right;
            
        }
    </style>
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

                            echo "<img src='uploads/profileddefault.jpg'>";
                        }
                        echo "<p>".$row['username']."</p>";
                    echo "</div>";
                }
            }
        }else{
            echo "There are no users yet!";
        }

        if(isset($_SESSION['id'])){
            if ($_SESSION['id'] == 1){
                echo "You are logged in as user #1";
            }
            echo "<form action='upload.php' method='POST'enctype='mutlipart/form-data'>
            <input type='file' name='file'>
            <button type='submit' name='upload_submit'>Upload</button></form>";
        }else {
            echo "You are not logged in!";
        }
    ?>
    <p>Login as user!</p>
    <form action="login.php" method="POST">
      <button type="submit" name="submitLogin">Login</button>
    </form>
    <p>Logout as user!</p>
    <form action="logout.php" method="POST">
      <button type="submit" name="submitLogout">Logout</button>
    </form>
</body>
</html>