<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if ($_SESSION["userrole"] != 2) {
    header("location: ../");
    exit;
  }
  $sql="DELETE FROM `studentforma` WHERE `id`='".$_GET["id"]."';";
  if ($stmt = mysqli_prepare($link, $qury)) {
    if (mysqli_stmt_execute($stmt))
    {
        header("location: ./");
    }
}
?>