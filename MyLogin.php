<?php
include 'db.php';
session_start();
if (isset($_GET['state']) && $_GET['state'] == "delete") {
   $user_Id = $_GET["UserId"];
   $query = "DELETE FROM tbl_226_user WHERE tbl_226_user.user_id=" . $user_Id;
   $result = mysqli_query($connection, $query);
  
}
if (isset($_GET["state"]) and $_GET["state"] == "logout" and isset($_SESSION["user_id"]) and $_SESSION["user_id"] != 0) {
   $_SESSION["user_id"] = 0;

   session_destroy();
}
if (!empty($_POST["Email_"])) {
   $query = "insert into tbl_226_user(user_name,user_email,user_pass , user_picture) values
    ('" . $_POST["Name_"] . "','" . $_POST["Email_"] . "' ,'" . $_POST["Password_"] . "' , '" . $_POST["Pictur_"] . "')";
   $result = mysqli_query($connection, $query);
} else if (!empty($_POST["Email"])) {
   $query = "SELECT * FROM tbl_226_user WHERE user_email ='" . $_POST["Email"] . "' and user_pass = '" . $_POST["Password"] . "'";
   $result = mysqli_query($connection, $query);
   $row = mysqli_fetch_array($result);
   if (is_array($row)) {
      $_SESSION["user_id"] = $row["user_id"];
      $_SESSION["user_pic"] = $row["user_picture"];
      $_SESSION["user_name1"] = $row["user_name"];
      mysqli_free_result($result);
      header('Location: index.php');
   } else {
      $message = "Wrong username or password";
   }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>Login</title>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
   <script src="js/scripts2.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
</head>
<body id="BodyLogin">
   <div class="wrapper_">
   
      <div class="title-text">
         <div class="title login">
         <h5>Welcome back!</h5> <div class="smart"> Smart Recycle</div> 
         </div>
         <div class="title signup">
         <h5>Signup now!</h5>  <div class="smart"> Smart Recycle</div> 
         </div>
      </div>
      <div class="form-container">
         <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Signup</label>
            <div class="slider-tab"></div>
         </div>
         <div class="form-inner">
            <form action="#" class="login" method="post" autocomplete="on">
               <div class="field">
                  <input type="text" placeholder="Email Address" required name="Email"
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
               </div>
               <div class="field">
                  <input type="password" placeholder="Password" required name="Password">
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password? <h4><?php if (isset($message)) {
                                                      echo $message;
                                                   } ?></h4></a>
               </div>
               <div class="field btn_">
                  <div class="btn-layer"></div>
                  <input type="submit" value="Login" id="input_login">
               </div>
               <div class="signup-link">
                  Not a member? <a href="">Signup now</a>
               </div>
            </form>
            <form action="#" class="login" method="post" autocomplete="on">
               <div class="field">
                  <input type="text" placeholder="Email Address" required name="Email_" 
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
               </div>
               <div class="field">
                  <input type="password" placeholder="Password" required name="Password_">
               </div>
               <div class="field">
                  <input type="Name" placeholder="User Name" required name="Name_">
               </div>
               <div class="field">
                  <input type="pic" placeholder="Picture" required name="Pictur_">
               </div>
               <div class="field btn_">
                  <div class="btn-layer"></div>
                  <input type="submit" value="Signup" id="input_signup">
               </div>
            </form>
         </div>
      </div>
   </div>



</body>
</html>
<?php
//close DB connection

mysqli_close($connection);
?>