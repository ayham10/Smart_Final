
<?php
session_start(); 
include 'db.php';
$user_Id = $_GET["UserId"];

$query = "SELECT * FROM tbl_226_user where tbl_226_user.user_id =" . $user_Id  ;
 $result = mysqli_query($connection, $query);

if($result) {
$row = mysqli_fetch_assoc($result); // 
$state = "delete";

}
else {
    echo $result;
    die("DB query failed.");
 } // we don't want it to fail. i want it to cont.

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">


    

    <link rel="stylesheet" href="css/style.css">
    
    <!-- <script src="js/scripts.js"></script> -->
    <title>smart recycle</title>
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

<div id="edit_profile_respons">
            <div id="proflie_Edit">
            <a href="Profile.php" id="profilepage"> <img src="<?php echo $_SESSION["user_pic"] ?>  " >
       </a>


       
       
  <ul class="list-group list-group-flush" id="list-group" >
  <li class="list-group-item" ><h3>User ID:</h3><?php echo '<h4>' .$row["user_id"]. '</h4>'?></li>
  <li class="list-group-item"><h3>User name:</h3><?php echo '<h4>' .$row["user_name"]. '</h4>'?></li>
  <li class="list-group-item"><h3>User email:</h3><?php echo  '<h4>'.$row["user_email"]. '</h4>'?></li>
  <li class="list-group-item"><h3>User password:</h3><?php echo  '<h4>'.$row["user_pass"]. '</h4>'?></li>
  </ul>



<a href="MyLogin.php?state=logout"><button   class="btn btn-light profile_butoon" data-toggle="modal" data-target=".bs-example-modal-sm">Logout</button></a>

<a href="Edit_profile.php?UserId=<?php echo $row["user_id"] ?>"> 
<button data-toggle="modal"  class="btn btn-light profile_butoon" data-target=".bs-example-modal-sm">Edit Profile</button>
       </a> 
      
       <a href="MyLogin.php?UserId=<?php echo $row["user_id"] ?>&state=delete"> 
<button  data-toggle="modal" class="btn btn-light profile_butoon" data-target=".bs-example-modal-sm">Delete User</button>
    </a> 
    
</div>                               
</main>

<footer class="bg-light text-center text-lg-start" >
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: f8f9fa;">
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