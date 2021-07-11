<?php
include 'db.php';
// include "config.php";
session_start();     
?>
<?php
$state_ = mysqli_real_escape_string($connection, $_POST['statee']);

$Trash_Name = mysqli_real_escape_string($connection, $_POST['Trash_Name']);

 $Address = mysqli_real_escape_string($connection, $_POST['Address']);
 $Trash_id = mysqli_real_escape_string($connection, $_POST['Trash_Id']);
 
 $User_id = $_SESSION["user_id"];


 if ($state_ == "editprof") {
  $Password_ = mysqli_real_escape_string($connection, $_POST['Password_']);
 
  $query = "update tbl_226_user set user_name='$Address', user_email='$Trash_Name', user_pass='$Password_' 
   , user_picture='$Trash_id'  where user_id=".$User_id;
   $result = mysqli_query($connection, $query);
   $_SESSION["user_name1"] = $Address;

}

else	if ($state_ == "insert") {
  $Trash_Reason= $_POST['Reason'];
  $Reason = mysqli_real_escape_string($connection, $_POST['Reason']);
    $query = "insert into tbl_226_Reports(Trash_id,user_id,Reason) VALUES ('$Trash_id', '$User_id','$Reason')";
    $result = mysqli_query($connection, $query);
	}
	else if ($state_ == "edit") {
    $Trash_id = mysqli_real_escape_string($connection, $_POST['Trash_Id']);
    $Trash_Reason= $_POST['Reason'];
    $Reason = mysqli_real_escape_string($connection, $_POST['Reason']);
        $Report_id = $_POST['Reportid'];
        $query = "UPDATE tbl_226_Reports set Trash_id='$Trash_id', user_id='$User_id', Reason='$Reason' where Report_id=".$Report_id;
        $result = mysqli_query($connection, $query);
		 	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>smart recycle</title>
    <meta charset="UTF-8">

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

  

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <script src="js/scripts2.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

</head>
<body>

    <main class="wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

   
         
    <a href="index.php" id="logo"></a>
    <a href="index.php"  class="logotext"> Smart Recycle</a> 
    
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav  navbar___class" style="--bs-scroll-height: 100px;">
        
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Tournaments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Character design</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="list.php">My reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">My accomplishments</a>
        </li>
      
      </ul>
     
    </div>
   <span >Hello <?php echo $_SESSION["user_name1"] ;?>
      <a href="Profile.php?UserId=<?php echo $_SESSION["user_id"] ?>" id="profile"> 
        <img src="<?php echo $_SESSION["user_pic"] ?>  ">

      </a>
      </span>
   
    
     
  </div>
  
</nav>
        <div id="make-it-slow2">
            <h1>Thank You</h1>
            <h1>For Reporting</h1>
        </div>

        <a id="goto"> <button id="backtopage">Onmouse over you will back to the
               home page</button></a>


    </main>
  <footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color:f8f9fa;">
    © 2021 smart recycle
    <a class="text-dark" href="https://mdbootstrap.com/"></a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>

<?php
 //close DB connection
 mysqli_close($connection);
?>