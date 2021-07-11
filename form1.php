<?php
include 'db.php';
// include "config.php";

session_start();
//get data from DB

if (isset($_GET["state"]) and $_GET["state"] == "edit" and isset($_GET["TrashId"]) and isset( $_GET["Report_id"])) {  // EDIT
   $state_ = $_GET["state"];
  $Trash_Id = $_GET["TrashId"];
  $Report_id =  $_GET["Report_id"];
  $query = "SELECT * FROM tbl_226_Reports where tbl_226_Reports.Report_id=" . $Report_id ;
  $query1 = "SELECT * FROM tbl_226_Trashes where tbl_226_Trashes.Trash_id=" . $Trash_Id ;
  $result = mysqli_query($connection, $query);
  $result1 = mysqli_query($connection, $query1);
  $row1 = mysqli_fetch_assoc($result1);
  $row = mysqli_fetch_assoc($result);
}
// echo $query;
 else if (isset($_GET["state"]) and $_GET["state"] == "insert") {
  $state_ = $_GET["state"];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
   
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
    <!-- <script src="js/scripts.js"></script> -->
    <title>Add a new report</title>

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
    

        <div class="make-it-slow">
        Add a report
       </div>
       
  <form id="Form_" action="get_form.php" method="POST">

   
  <div class="mb-3">
 <label for="prodImg1" class="forms_label">Reason for reporting:</label>
 <input type="text" class="form-control" id="prodImg1" name="Reason" 
 placeholder="Reason" required title="you forgot to fill it correctly " <?php
                                                if (isset($row["Reason"])) {
                                                  echo 'value= "'.$row["Reason"] .'"';
                                                } else {
                                                  echo 'value=""';
                                                } ?> >
 </div>
 <div class="mb-3">
 <label for="prodImg1" class="forms_label">Address: </label>
 <input type="text" class="form-control"    id="prodImg1" name="Address" placeholder="Address"  
 required title="you forgot to fill it correctly"  <?php
                                                if (isset($row1["Address"])) {
                                                  echo 'value= "'.$row1["Address"].'"';
                                                 
                                                } else {
                                                  echo 'value=""';
                                                } ?> >



<label for="cars" class="forms_label" placeholder="Reason">Trash Name:</label>
  <select name="Trash_Name" placeholder="Reason">
      <option value="Trash_Name" placeholder="Reason" ><?php
                                                if (isset( $row1["Trash_name"])) {
                                                  echo  $row1["Trash_name"];
                                                } else {
                                                    echo '';
                                                } ?> </option>
      <option name="Trash_Name">Blue_Trash</option>
      <optgroup label="Id=1">
      <option name="Trash_Name">Green_Trash</option>
      <optgroup label="Id=2">
      <option name="Trash_Name">Orange_Trash</option>
      <optgroup label="Id=3">
      <option name="Trash_Name">Grey_Trash</option>
      <optgroup label="Id=4">
      <option name="Trash_Name">Purple_Trash</option>
      <optgroup label="Id=5">
      <option name="Trash_Name">Cartoon_Trash</option>
      <optgroup label="Id=6">
  </select>

                                      <br>
  <label for="cars" class="forms_label">Trash Id:</label>
  <select name="Trash_Id">
      <option value="<?php
                                             if (isset($row1["Trash_id"])) {
                                               echo $row1["Trash_id"];
                                             } else {
                                                 echo '';
                                             } ?>" name="Trash_Id" placeholder="TrashId">
                                            <?php
                                             if (isset($row1["Trash_id"])) {
                                               echo $row1["Trash_id"];
                                             } else {
                                                 echo '';
                                             } ?></option>              
      <option name="Trash_Id">1</option>
      <option name="Trash_Id">2</option>
      <option name="Trash_Id">3</option>
      <option name="Trash_Id">4</option>
      <option name="Trash_Id">5</option>
      <option name="Trash_Id">6</option>
  </select>

  
   
      <input type="hidden" name="statee" value="<?php echo $state_ ?>">
      <?php
    if (isset( $_GET["Report_id"])) {
     echo '
     <input type="hidden" name="Reportid" value="'. $_GET["Report_id"].'">
     
     ';
    }
         ?>
 <button type="submit"  class="formsButton" >Submit</button>
</form>
        

    </main>
    <footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: f8f9fa;">
    ©️ 2021 smart recycle
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