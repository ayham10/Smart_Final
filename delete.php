<?php
include 'db.php';
if(isset($_POST['status'])&& $_POST['status']=="delete"){
  $Report_id=$_POST['ReportID'];
//   echo $Report_id;
  $query = "DELETE FROM tbl_226_Reports WHERE Report_id=".$Report_id ;
  $result=mysqli_query($connection, $query);
  echo $query;
mysqli_close($connection);
}
?>
