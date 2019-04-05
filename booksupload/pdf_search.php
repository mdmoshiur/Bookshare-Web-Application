<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../include/jquery.mobile-1.4.5.min.css">
<script src="../include/jquery-1.11.3.min.js"></script>
<script src="../include/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="main" class="ui-content">
    <h1 align="center" style="background-color: #33CDD7;">Search results</h1>
    <ul data-role="listview" data-inset="true">

      <?php 
        include '../connect_server.php';
        $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
        $sql = "SELECT * FROM pdf WHERE pdf.book_name like '%$book_name%'     ORDER BY book_name;";

        $result = mysqli_query($conn, $sql);
        $num_of_rows = mysqli_num_rows($result);
        if(!$num_of_rows) {
          echo "😭 <br> No results found !!<br> please check spelling ....";
        } 

        while ($row=mysqli_fetch_assoc($result)) {
          ?>
                <li>
                    <a target="_blank" href="./pdf books/<?php echo $row['book_name']."-".$row['rand'].".pdf"; ?>">
                    <img src="../img/bookicon2.jpg">
                    <h2> <?php echo $row['book_name'] ?> </h2>
                     <p>
                       <?php
                       if(!empty($row['writer'])) {
                        echo '<b><i>Writer: </i></b>'.$row['writer'].'   ';
                      }
                      if(!empty($row['edition'])) {
                        echo '<b><i>Edition: </i></b>'.$row['edition'].'   ';
                    } 
                    echo '<b><i>Size: </i></b>'.ceil($row['size']/1024).' KB'.'   ';
                    
                      if ($row['user_id']!=0) {
                       $sql = "SELECT sign_up.name,sign_up.city,sign_up.division,sign_up.email FROM sign_up WHERE sign_up.user_id='$row[user_id]';";
                      $run = mysqli_query($conn, $sql);
                      $qr = mysqli_fetch_assoc($run);
                      echo '<b><i>Uploader: </i></b>'.$qr['name'].'<br>'; 
                      }
                        ?>
                     </p>
                   </a>
                </li>
       <?php             
        }
     ?>
    </ul>
  </div>
</div> 

</body>
</html>