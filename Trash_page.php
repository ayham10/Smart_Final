<?php  

include 'db.php';
// include "config.php";

session_start();

?>

<?php
 // get data from DB
 $TrashId = $_GET["TrashId"];
 $query = "SELECT * FROM tbl_226_Reports where tbl_226_Reports.Trash_id=" . $TrashId;
//  echo  $query;
 $query1 = "SELECT * FROM tbl_226_Trashes where tbl_226_Trashes.Trash_id=" . $TrashId;
 $result1 = mysqli_query($connection, $query1);
 if($result1) {
    $row1 = mysqli_fetch_assoc($result1); 
    }
    else die("DB query failed.");
 $result = mysqli_query($connection, $query);
 if($result) {
 $row = mysqli_fetch_assoc($result); 
 }
 else die("DB query failed.");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>smart recycle</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/scripts2.js"></script>
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
    <div class="Trash_page">
        <?php
 
 $img = $row1["img_url"];
 
 echo '<h3>' . $row1["Trash_name"] .'</h3>';
 echo '<img src="' . $img . '">';



 ?>
    </div>


    <div class="table1" >

    <div id="sortTable_byid">
     <p ><button id="sortTable_">Sort by user ID</button></p>
     </div>

            <table class="table table-dark tableee_" id="myTable">
                <thead>
                    <tr>
                            <th class="th_dir" scope="col">Report ID</th>
                            <th class="th_dir" scope="col"> User id </th>
                            <th class="th_dir" scope="col"> Reason</th>
                            <th class="th_dir" scope="col"> Date</th>
                    </tr>
                    </thead>
                    <?php 
                    $TrashId = $_GET["TrashId"];
                    $query = "SELECT * FROM tbl_226_Reports where tbl_226_Reports.Trash_id=" . $TrashId;
                    $result = mysqli_query($connection, $query);
                    if($result) {
                    }
                    else die("DB query failed.");
          
  while($row = mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '<td>' .$row["Report_id"] .'</td>' ;
      echo '<td>' .$row["user_id"] .'</td>' ;
      echo '<td>' .$row["Reason"] .'</td>' ;
      echo '<td>' .$row["date"] .'</td>' ;
      echo '</tr>';
  }

?>  
               
            </table>
        </div>    


     

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
mysqli_free_result($result);
 //close DB connection
 mysqli_close($connection);
?>