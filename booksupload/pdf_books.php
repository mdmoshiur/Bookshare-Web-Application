<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>pdf books</title>
  <meta name="viewport" content="width=device-width">
  
  
      <link rel="stylesheet" href="pdf_style.css">
      <link rel="stylesheet" type="text/css" href="books.css">

  
</head>

<body>

  <form class="search" action="pdf_books.php" method="POST">
  <input class="searchTerm" name="book_name" placeholder="Enter your search term ..." />
  <button class="searchButton" type="submit" name="submit"></button>
</form>

</body>

</html>

<?php 
if (isset($_POST['submit'])) {
  ?>
  <ul class="list img-list">
  <?php 
   include '../connect_server.php';
        $item = mysqli_real_escape_string($conn, $_POST['book_name']);
    $like="'";
    $srtarray=explode(' ',$item);
    foreach($srtarray as $key=>$val){// here you can use implode also 
        $like.="%$val%";
    }
    $like.="'";

     $sql = "SELECT * FROM pdf WHERE pdf.book_name LIKE  $like"; 


        $result = mysqli_query($conn, $sql);
        $num_of_rows = mysqli_num_rows($result);
        if(!$num_of_rows) {
          echo "😭 <br> No results found !!<br> please check spelling ....";
        } 

        while ($row=mysqli_fetch_assoc($result)) {
          ?>
        <li>
          <a target="_blank" href="./pdf books/<?php echo $row['book_name']."-".$row['rand'].".pdf"; ?>" class="inner">
            <div class="li-img">
              <img src="../img/bookicon2.jpg" />
            </div>
         <div class="li-text">
           <h3 class="li-head"><?php echo $row['book_name']; ?></h3>
             <div class="li-sub">
                <p> <?php 
                if(!empty($row['writer'])) {
                        echo '<b><i>Writer: </i></b>'.$row['writer'].'<br>';
                    }
                if(!empty($row['edition'])) {
                        echo '<b><i>Edition: </i></b>'.$row['edition'].'<br>';
                    } 
                     echo '<b><i>Size: </i></b>'.ceil($row['size']/1024).' KB'.'<br>';
                      if ($row['user_id']!=0) {
                       $sql = "SELECT sign_up.name,sign_up.city,sign_up.division,sign_up.email FROM sign_up WHERE sign_up.user_id='$row[user_id]';";
                      $run = mysqli_query($conn, $sql);
                      $qr = mysqli_fetch_assoc($run);
                      echo '<b><i>Uploader: </i></b>'.$qr['name'].'<br>'; 
                      }
                      
                    ?> </p>
             </div>
          </div>
         </a>
      </li>
   <?php }
  ?>
</ul> <?php
} else { ?>
  <ul class="list img-list">
  <?php 
   include '../connect_server.php';
    $sql = "SELECT * FROM pdf ORDER BY book_name;";
    $result = mysqli_query($conn, $sql);
    while ($row=mysqli_fetch_assoc($result)) {
          ?>
        <li>
          <a target="_blank" href="./pdf books/<?php echo $row['book_name']."-".$row['rand'].".pdf"; ?>" class="inner">
            <div class="li-img">
              <img src="../img/bookicon2.jpg" />
            </div>
         <div class="li-text">
           <h3 class="li-head"><?php echo $row['book_name']; ?></h3>
             <div class="li-sub">
                <p> <?php 
                if(!empty($row['writer'])) {
                        echo '<b><i>Writer: </i></b>'.$row['writer'].'<br>';
                    }
                if(!empty($row['edition'])) {
                        echo '<b><i>Edition: </i></b>'.$row['edition'].'<br>';
                    } 
                     echo '<b><i>Size: </i></b>'.ceil($row['size']/1024).' KB'.'<br>';
                      if ($row['user_id']!=0) {
                       $sql = "SELECT sign_up.name,sign_up.city,sign_up.division,sign_up.email FROM sign_up WHERE sign_up.user_id='$row[user_id]';";
                      $run = mysqli_query($conn, $sql);
                      $qr = mysqli_fetch_assoc($run);
                      echo '<b><i>Uploader: </i></b>'.$qr['name'].'<br>'; 
                      }
                      
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
