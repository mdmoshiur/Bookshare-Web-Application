<!DOCTYPE html>
<html>
<head>
<title>books</title>
  <meta name="viewport" content="width=device-width">
  
  
      <link rel="stylesheet" href="pdf_style.css">
      <link rel="stylesheet" type="text/css" href="books.css">

</head>
<body>

<form class="search" action="books.php" method="POST">
  <input class="searchTerm" name="book_name" placeholder="Enter your search term ..." />
  <button class="searchButton" type="submit" name="submit"></button>
</form>

</body>
</html>

<?php 
if(isset($_POST['submit'])) {
  include '../connect_server.php';
        session_start();
        $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
        if (!isset($_SESSION['user_id'])) {
          $sql = "SELECT * FROM booksupload WHERE booksupload.book_name like '%$book_name%'     ORDER BY book_name;";
        } else {
          $sql = "SELECT * FROM sign_up WHERE sign_up.user_id='$_SESSION[user_id]';";
          $result = mysqli_query($conn, $sql);
          $row=mysqli_fetch_assoc($result);
          $division = $row['division'];
          $sql = "SELECT * FROM booksupload WHERE booksupload.book_name like '%$book_name%'     ORDER BY 
                CASE WHEN '$division'=(SELECT sign_up.division FROM sign_up WHERE sign_up.user_id=booksupload.user_id) then -1
                else booksupload.book_name end

          ;";
        }
        $result = mysqli_query($conn, $sql);
        $num_of_rows = mysqli_num_rows($result);
        if(!$num_of_rows) {
          echo "😭 <br> No results found !!<br> please check spelling ....";
        } 
        echo '<ul class="list img-list">';
        while ($row=mysqli_fetch_assoc($result)) {
          ?>
        <li>
          <a target="_blank" href="../contact/contact.php?user_id=<?php echo $row['user_id'].'&book_name='.$row['book_name'] ?>" class="inner">
            <div class="li-img">
              <img src="../img/bookicon2.jpg" />
            </div>
         <div class="li-text">
           <h3 class="li-head"><?php echo $row['book_name']; ?></h3>
             <div class="li-sub">
                <p> <?php 
                if($row['writer']!='not_given') {
                        echo '<b><i>Writer: </i></b>'.$row['writer'].'<br>';
                    } 
                      $sql = "SELECT sign_up.name,sign_up.city,sign_up.division,sign_up.email FROM sign_up WHERE sign_up.user_id='$row[user_id]';";
                      $run = mysqli_query($conn, $sql);
                      $qr = mysqli_fetch_assoc($run);
                      echo '<b><i>Owner: </i></b>'.$qr['name'].'<br>'.'<b><i>Location: </i></b>'.$qr['city'].','.$qr['division'].'<br>'.'<b><i>Share/Sell: </i></b>'.$row['want'];
                    ?> </p>
             </div>
          </div>
         </a>
      </li>
   <?php }
  ?>
</ul> <?php
} else {
   ?>
  <ul class="list img-list">
  <?php 
   include '../connect_server.php';
    $sql = "SELECT * FROM booksupload ORDER BY book_name;";
    $result = mysqli_query($conn, $sql);
    while ($row=mysqli_fetch_assoc($result)) {
          ?>
        <li>
          <a target="_blank" href="../contact/contact.php?user_id=<?php echo $row['user_id'].'&book_name='.$row['book_name'] ?>" class="inner">
            <div class="li-img">
              <img src="../img/bookicon2.jpg" />
            </div>
         <div class="li-text">
           <h3 class="li-head"><?php echo $row['book_name']; ?></h3>
             <div class="li-sub">
                <p> <?php 
                if($row['writer']!='not_given') {
                        echo '<b><i>Writer: </i></b>'.$row['writer'].'<br>';
                    } 
                      $sql = "SELECT sign_up.name,sign_up.city,sign_up.division,sign_up.email FROM sign_up WHERE sign_up.user_id='$row[user_id]';";
                      $run = mysqli_query($conn, $sql);
                      $qr = mysqli_fetch_assoc($run);
                      echo '<b><i>Owner: </i></b>'.$qr['name'].'<br>'.'<b><i>Location: </i></b>'.$qr['city'].','.$qr['division'].'<br>'.'<b><i>Share/Sell: </i></b>'.$row['want'];
                    ?> </p>
             </div>
          </div>
         </a>
      </li>
   <?php }
  ?>
</ul> <?php
}

 ?>