<?php 
session_start();
 ?>
<html lang="en">
<head>
  <style>
    *, *:before, *:after {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  font-family: 'Lato', sans-serif;
  background: linear-gradient(to top, #f71543, #eb833e) fixed;
}

/***** For Smartphones *******/
.container-center {
  position: absolute;
  left: 50%;
  width: 85%;
  height: auto;
  background-color: transparent;
  -webkit-transition: all 0.1s;
  transition: all 0.1s;
  bottom: 50%;
  -webkit-transform: translateX(-50%) translateY(50%);
          transform: translateX(-50%) translateY(50%);
}

h2, img {
  text-align: center;
  color: white;
  font-weight: 10;
  text-shadow: 0px 1px rgba(0, 0, 0, 0.3);
}
h4{
  text-align: center;
  color:black;
  font-size: 1.1em;
  font-family: times;
  font-style:normal;
  line-height: 130%;
 opacity: .6;
}

form {
  width: 100%;
  overflow: hidden;
  background-color: #FEFEFE;
  padding: 21px 13px;
  border-radius: 21px;
  -webkit-box-shadow: 0px 5px 34px rgba(0, 0, 0, 0.1);
          box-shadow: 0px 5px 34px rgba(0, 0, 0, 0.1);
}

formgroup {
  position: relative;
  width: 100%;
  display: block;
  margin: 1em 0;
  font-size: 1em;
}
formgroup input {
  width: 100%;
  border: none;
  border-bottom: 1px solid #888888;
  padding: 8px 0;
  font-size: inherit !important;
  margin-bottom: 13px;
  outline: none;
  opacity: 0.7;
  font-weight: 600;
}
formgroup input:focus {
  opacity: 1;
  border-bottom: 2px solid #F71442;
  color: #F71442;
}
formgroup label {
  position: absolute;
  font-size: 0.8em;
  top: -1em;
  left: 0;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  opacity: 0.7;
  color: #888888;
  text-transform: uppercase;
}
formgroup span {
  position: absolute;
  top: -1em;
  left: -500px;
  opacity: 0;
  color: #333333;
  font-weight: bold;
  text-transform: uppercase;
  font-size: 0.8em;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}
formgroup input:focus + label {
  left: 500px;
  opacity: 0;
}
formgroup input:focus ~ span {
  left: 0;
  opacity: 1;
}

.forgot {
  display: block;
  width: 100%;
  text-align: center;
  font-size: 1em;
  font-weight: bold;
  margin-top: 21px;
  opacity: 0.8;
}

#login-btn {
  border: none;
  color: #FEFEFE;
  padding: 0.8em 0;
  font-size: 1em;
  font-weight: 300;
  width: 100%;
  border-radius: 55px;
  cursor: pointer;
  -webkit-box-shadow: 0px 3px 21px rgba(255, 100, 0, 0.7);
          box-shadow: 0px 3px 21px rgba(255, 100, 0, 0.7);
  background: -webkit-gradient(linear, left top, right top, from(#F98340), to(#F71442));
  background: linear-gradient(to right, #F98340, #F71442);
  background-size: 100%;
  text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
}

#login-btn:hover{
  background-color: black;
}

p {
  color: white;
  text-align: center;
}
p a {
  color: inherit;
  text-decoration: none;
  font-weight: bold;
}


/***** For Tablets *******/
@media screen and (min-width: 480px) {
  .container-center {
    width: 70%;
  }

  #login-btn {
    padding: 0.8em 0;
    font-size: 1.2em;
  }
}
/***** For Desktop Monitors *******/
@media screen and (min-width: 768px) {
  .container-center {
    width: 500px;
  }
}

  </style>

  <script src="../sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert2/sweetalert2.css">

  <title>forgot password</title>
</head>
<body>
  <div class="container-center">
    <center>
    <img src = "avatar7.png" width="50%">
      </center>
  <h2>Don't Worry!</h2>
  <form action="forgot_pass.php" method="POST">
    <h4>
      Just provide your email<br> 
      and we can do the rest
    </h4>
    <formgroup>
      <input type="text" name="input"/>
      <label for="email"><br>Email or Username</label>
      <span>enter your email or username</span>
    </formgroup>
    
  
    <button id="login-btn" name="next">Next</button>
    
  </form>
   
  <p>Did you remember? <a href="../login/login.php">Log In</a></p>
</div>
</body>
</html>

<?php 

if(isset($_POST['next'])){

  include '../connect_server.php';

  $input = mysqli_real_escape_string($conn, $_POST['input']);

    $sql = "SELECT * FROM sign_up WHERE user_name = '$input' OR email = '$input' ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck  < 1){
          echo "<script language='javascript'>  swal('Username/email ?','Username or email not Found!','question')</script>";

          // header("Location:./login1.php");
           exit();
        } else {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id'];
            $to = $row['email'];
            $confirm_code = mt_rand(100000, 999999);
            $_SESSION['confirm_code'] = $confirm_code;
            $_SESSION['confirm_user_id'] = $user_id;
            $subject = 'Reset password';
            $txt = "Your confirmation code is ".$confirm_code;
            if(mail($to, $subject, $txt)){
              echo "<script language='javascript'>
                            swal(
                                 'Great!!',
                                 'Confirmation code send to your email',
                                 'success'
                                  )

                                 
                                      setTimeout(function(){
                                    window.location.href = 'confirm_page.php';
                                }, 1000);
    

                   
                          </script>";

                    //header("Location:../index.php");
                    exit();
            }

            //echo("<script>location.href = 'confirm_page.php';</script>");
            //echo("<script>location.href = 'confirm_page.php?$confirm_code=$user_id';</script>");
            exit();
        }

}

 ?>

