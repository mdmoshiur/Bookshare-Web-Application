 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BookShare</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="include/jquery.min.js"></script>
  <script src="include/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="include/fontawesome.all.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css"> 
  <script src="index.js" type="text/javascript"></script>
 
</head>
  
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark"> 
  <div class="container-fluid"> 
    <a class="navbar-brand" href="#"><img src="img/books-logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span> 
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./booksupload/books.php">Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./booksupload/upload_book.php">Upload Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./booksupload/pdf.php">PDF</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="./booksupload/pdf_upload.php">PDF upload</a>
      </li> 
            

       <?php 
        session_start();
       if( !isset($_SESSION['user_id'])) {
        echo '<li class="nav-item">
                    <a class="nav-link" href="./login/login.php">Log in</a>

                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign up</a>
                    </li>';
       } else {
         include 'connect_server.php';
         $user_id = $_SESSION['user_id'];
         $sqlImg = "SELECT * FROM profileimg WHERE user_id='$user_id';";
         $resultImg=mysqli_query($conn, $sqlImg);
         $rowImg = mysqli_fetch_array($resultImg);
         $status = $rowImg['status'];
         $type = $rowImg['type'];
         
        echo '<li class="nav-item">
        <div class="dropdown">
             ';
             if($status == 0) {
              echo '<img src="profile/uploads/profiledefault.jpg" onclick="myFunction()" alt="Avatar" class="avatar" >';
             } else {
                 echo '<img src="profile/uploads/profile'.$user_id.'.'.$type.'" onclick="myFunction()" alt="Avatar" class="avatar" >';
             }
             echo '<div id="myDropdown" class="dropdown-content">
              <a href="./profile/profile.php">Profile</a>
              <a href="#">Setting</a>
              <a href="./booksupload/mybooks.php">My books</a>
              <a href="./login/logout.php">Log out</a>
             </div>
        </div>
      </li>';

        echo '<li class="nav-item">
        <div class="dropdown">';
             echo '<img src="img/noti.png" onclick="Notification()" alt="Avatar" class="avatar" >';
             echo '<div id="myDropdownNot" class="dropdown-content">';
         $sql = "SELECT * FROM notification WHERE user_id='$user_id' ORDER BY date_time DESC;";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
              if ($row['status'] == 'unread') {
                 echo '<a href="notification/notification.php?id='.$row['id'].'" title="">'.'<b><i>'.$row['name'].' emailed you'.'</i></b>'.'</a>';
                # code...
              } else {
                echo '<a href="notification/notification.php?id='.$row['id'].'" title="">'.$row['name'].' emailed you'.'</a>';
              }
              
         }              
        echo '</div>
        </div>
      </li>';

           $sql = "SELECT COUNT(id) as id FROM notification WHERE status='unread' AND user_id=$_SESSION[user_id];";
           $result=mysqli_query($conn, $sql);
           $row = mysqli_fetch_array($result);
           if($row['id']) {
              echo '<li class="nav-item"><span class="badge badge-light">'.$row['id'].'</span></li>';
           }


     
       }

        ?>
      
    </ul>
    </div>
  </div>
  
</nav>



<!--- Image Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/img1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/img2.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/img3.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   
<form action="./booksupload/search.php" method="POST">
  <div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" name="book_name" placeholder="What are you looking for?">
      <button type="submit" class="searchButton" name="submit">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
</form>
      


<br>
<br>
<!--- Connect us -->
<div class="container-fluid padding">
  <div class="row text-center padding">
    <div class="col-12 social padding">
      <h2>Connect with us</h2>
      <a href="https://www.facebook.com/profile.php?id=100008709275301"><i class="fab fa-facebook"></i></a>
      <a href="https://twitter.com/moshiur66"><i class="fab fa-twitter"></i></a>
      <a href="https://plus.google.com/u/0/118138944512661381711"><i class="fab fa-google-plus-g"></i></a>
      <a href="https://www.instagram.com/moshiur66/?hl=en"><i class="fab fa-instagram"></i></a> 
      <a href="https://www.youtube.com/channel/UCi_rM5p_qKVLYGHfiUl5c2g?view_as=subscriber"><i class="fab fa-youtube"></i></a>
      <a href="https://www.linkedin.com/in/md-moshiur-rahman-77b893162/"><i class="fab fa-linkedin"></i></a>
    </div>
    
  </div>
  
</div>

<?php 
include 'contactfooter.html';
 ?>
</body>
</html>













