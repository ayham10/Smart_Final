<?php  
// include "config.php";
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == 0){
    header("Location: MyLogin.php");  
}
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/scripts2.js"></script>
  <!-- <script src="js/get_Trash.js"></script> -->
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
    <div class="mapouter">
      <div class="gmap_canvas">
        <iframe class="gmap_iframe"
          src="https://maps.google.com/maps?;hl=en&amp;q=University of Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
          href="https://www.fridaynightfunkin.net/">
        </a></div>
       </div>


    <div class="row">
      <div class="column">
        <a href="TrashJson.php?type=1"><img src="images/trash1.png" alt="" class="trashes" > </a>
        <p >Cartons Trash</p></a>
      </div>
      <div class="column">
        <a href="TrashJson.php?type=2"><img src="images/blue_trash.png" alt="" class="trashes" ></a>
        <p>Blue Trash</p>
      </div>
      <div class="column">
        <a href="TrashJson.php?type=3"><img src="images/yellow_trash.png" alt="" class="trashes" ></a>
        <p>Orange Trash</p>
      </div>
      <div class="column">
        <a href="TrashJson.php?type=4"><img src="images/bink_trash.png" alt="" class="trashes"></a>
        <p>Purple Trash</p>
      </div>
      <div class="column">
        <a href="TrashJson.php?type=5"><img src="images/grey_trash.png" alt="" class="trashes" ></a>
        <p>Grey Trash</p>
      </div>
      <div class="column">
        <a href="TrashJson.php?type=6"><img src="images/green_trash.png" alt="" class="trashes" ></a>
        <p>Green Trash</p>
      </div>
    </div>

  </main>
  <footer class="bg-light text-center text-lg-start">
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