<!DOCTYPE html>
<html>
  <head>
    <title>sign up</title>
    <link rel="stylesheet" type="text/css" href="signup_style.css"> 
    <script src="validate_signup.js"></script>
 
  </head>
<body>
  <?php 
 // include 'action.php';
  include('sign_up_validation.php');
   ?>
  <form name="signup" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    <div class="container">
      <h1 style="color:#2ABD31;">Sign Up</h1>
      <p style="color:#DF386B;">Please fill up this form to create an account.</p>
      <hr>

      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Your Name" name="name" value="<?= $name ?>" required>
      <span class="error"><?= $name_error ?></span>

      <label for="user_name"><b><br>User Name</b></label>
      <input type="text" placeholder="Enter Your User Name" name="user_name" value="<?= $user_name ?>" required>
      <span class="error"><?= $user_name_error ?></span>

      <label for="email"><b><br>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" value="<?= $email ?>" required>
      <span class="error"><?= $email_error ?></span>

      <label for="psw"><b><br>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" value="<?= $password ?>" required>
      <span class="error"><?= $password_error ?></span>

      <label for="psw-repeat"><b><br>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="repeat_password" value="<?= $repeat_password ?>" required>
      <span class="error"><?= $repeat_password_error ?></span>

      <label for="bdate"><b><br>Birth Date</b></label>
      <input type="date" placeholder="Enter Birth date" name="bdate" value="<?= $bdate ?>" required>
      <span class="error"><?= $bdate_error ?></span>

      <label for="gender"><b><br>Gender</b></label>
        <select  name="gender">
        <option value="male">Male</option>
          <option value="female">Female</option>
            <option value="others">Others</option>
      </select>

      <label for="division"><b>Division</b></label><br>
        <select  name="division">
          <option value="Barishal">Barishal</option>
          <option value="Chattogram">Chattogram</option>
          <option value="Dhaka">Dhaka</option>
          <option value="Khulna">Khulna</option>
          <option value="Mymensingh">Mymensingh</option>
          <option value="Rajshahi">Rajshahi</option>
          <option value="Rangpur">Rangpur</option>
          <option value="Sylhet">Sylhet</option>
        </select> 


      <label for="city"><b>City</b></label><br>
      <input type="text" placeholder="Enter city name " name="city"  value="<?= $city ?>" required>
      <span class="error"><?= $city_error ?></span><br> 

      <p>Already have an account ?       <a href="./login/login.php" style="color:dodgerblue"> Log in</a>.</p>

      <div class="clearfix">
      <a href="index.php"> <button type="button" class="cancelbtn" >Cancel</button> </a> 
      <button type="submit" class="signupbtn">Sign Up</button>
      </div>

    </div>
  </form>
</body>
</html>
