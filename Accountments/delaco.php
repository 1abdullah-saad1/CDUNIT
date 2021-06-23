<?php
require_once "../config.php";
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if ($_SESSION["userrole"] != 3) {
  header("location: ../");
  exit;
} 
$sql="DELETE FROM `accountments` WHERE `id`='".$_GET["id"]."';";
if ($stmt = mysqli_prepare($link, $sql)) {
  if (mysqli_stmt_execute($stmt))
  {
      header("location: ./");
  }
}

?>