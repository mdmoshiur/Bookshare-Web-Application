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

        while ($row=mysqli_fetch_assoc($result)) {
          ?>
                <li>
                    <a target="_blank" href="../contact/contact.php?user_id=<?php echo $row['user_id'].'&book_name='.$row['book_name'] ?>">
                    <img src="../img/bookicon2.jpg">
                    <h2> <?php echo $row['book_name'] ?> </h2>
                     <p>
                       <?php
                       if($row['writer']!='not_given') {
                        echo '<b><i>Writer: </i></b>'.$row['writer'].'  ';
                      }
                      $sql = "SELECT sign_up.name,sign_up.city,sign_up.division,sign_up.email FROM sign_up WHERE sign_up.user_id='$row[user_id]';";
                      $run = mysqli_query($conn, $sql);
                      $qr = mysqli_fetch_assoc($run);
                      echo '<b><i>Owner: </i></b>'.$qr['name'].'  '.'<b><i>Location: </i></b>'.$qr['city'].','.$qr['division'].'  '.'<b><i>Share/Sell: </i></b>'.$row['want'];
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