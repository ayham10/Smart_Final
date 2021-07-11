<?php
  include('db.php');
  session_start();

  $query1 ="SELECT * FROM tbl_226_Trashes where user_id= '".$_SESSION["user_pic"]."'";
  $result = mysqli_query($connection,$query1);

  if(!$result){
      die("DB quer failed :(");
  }

  echo '<ul>';

  while($row = mysqli_fetch_assoc($result)){
      echo '<li>';
      echo '<h2>' .$row["Trash_name"] .'</h2>' ;
      echo '<h3>' .$row["Address"] .'</h3>' ;
      echo '</li>';
  }

  echo '</ul>';

?>

<?php mysqli_close($connecyion); ?>