<?php  
include 'db.php';
// include "config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
    <a href="index.php"  class="logotext">Smart Recycle</a> 
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

    <div class="make-it-slow" class="titels">
     Reports 
    </div>
                <div class="table2">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th class="th_dir" scope="col"> Report ID</th>
                            <th class="th_dir" scope="col">Trash type</th>
                            <th class="th_dir" scope="col"> Report reason </th>
                            <th class="th_dir" scope="col"> Date</th>
                            <th class="th_dir" scope="col"> More deatils</th>
                           
                            
                    </tr>
                    </thead>
 <?php 

$query = "SELECT * from tbl_226_Reports inner join  tbl_226_Trashes on tbl_226_Reports.Trash_id = tbl_226_Trashes.Trash_id 
 WHERE tbl_226_Reports.user_id = " . $_SESSION["user_id"];
         $result = mysqli_query($connection, $query);
         while($row = mysqli_fetch_assoc($result)){
          echo '<tr>';
          echo '<td>' .$row["Report_id"] .'</td>' ;
          echo '<td>' .$row["Trash_name"] .' <br> <a href="Trash_page.php?TrashId=' . $row["Trash_id"] . '" 
          class="btnbtn-primary" > See Trash page </a> </td>' ;
          echo '<td>' .$row["Reason"] .'</td>' ;
          echo '<td>' .$row["date"] .'</td>' ;
         
          echo '<td> 
          <a href="form1.php?state=edit&TrashId=' . $row["Trash_id"] . '&Report_id=' . $row["Report_id"] . '"
              >Edit report</a> 
               <br>
     
               <button type="button" class="delete_" value='.$row["Report_id"].' >Delete report</button>
           </td>' ;
     
  
   
      }
?>
            </table>
        </div>
 


        <a href="form1.php?state=insert" class="btn btn-light Add_A_New_Report"><b>Add a new report</b> </a>
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