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
    <h1 align="center" style="background-color: #33CDD7;">My uploaded books</h1>
    <ul data-role="listview" data-inset="true">

      <?php 
        include '../connect_server.php';
        $sql = "SELECT * FROM booksupload ORDER BY book_name;";
        $result = mysqli_query($conn, $sql);
         
         while ($row=mysqli_fetch_assoc($result)) {
            echo '<li>
                    <a href="#">
                    <img src="../img/bookicon.png">';
                    echo '<h2>';
                    echo $row['book_name'] ; echo  '</h2> <p>';
                    if($row['writer']!='not_given') {
                        echo '<b><i>Writer: </i></b>'.$row['writer'];
                    }
                    echo '</p>';
                    echo '</a> </li>';
        }
     ?>
    </ul>
  </div>
</div> 

</body>
</html>


