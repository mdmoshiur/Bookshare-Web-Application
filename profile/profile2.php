<!DOCTYPE html>
<html lang="en">
<head>
  <title>profile</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="profile.css">

</head>
  
<body>

<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
    include '../connect_server.php';
 ?>

<div class="container">
	<div class="row">
		 <h2 style="color:#2028CB">Your Profile</h2>
        
        
    

       <div class="col-md-7 ">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                    <?php 
                           $sqlImg = "SELECT * FROM profileimg WHERE user_id='$user_id';";
                           $resultImg=mysqli_query($conn, $sqlImg);
                           $rowImg = mysqli_fetch_array($resultImg);
                            if($rowImg['status']==0) {
                              //display default profile image
                            //  echo "hello";
                              echo '<div  align="center"> <img alt="User Pic" src="uploads/profiledefault.jpg" id="profile-image1" class="img-circle img-responsive">';
                            } else {
                              $type = $rowImg['type'];
                              echo '<div  align="center"> <img alt="User Pic" src="uploads/profile'.$user_id.'.'.$type.'" id="profile-image1" class="img-circle img-responsive">';
                            }
                     ?>           
           <a href="upload.php"><div style="color:#2332C6;">click here to change profile image</div></a>
                <!--Upload Image Js And Css-->
                     </div>
              <br>
                <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?= $_SESSION['name'] ?></h4></span>
              <span><p>Full Name</p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 title " >User Name:</div><div class="col-sm-7 col-xs-6 "><?= $_SESSION['user_name'] ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Email:</div><div class="col-sm-7"> <?= $_SESSION['email'] ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Birthday:</div><div class="col-sm-7"> <?= $_SESSION['bdate'] ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Gender:</div><div class="col-sm-7"><?= $_SESSION['gender'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Division:</div><div class="col-sm-7"><?= $_SESSION['division'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >City:</div><div class="col-sm-7"><?= $_SESSION['city'] ?></div>
      

 <div class="clearfix"></div>
<div class="bot-border"></div>
      <div class="col-sm-5 col-xs-6 title " >Nationality:</div><div class="col-sm-7">Bangladeshi</div>
      



            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
       
       
   </div>
</div>

</body>
</html>


         