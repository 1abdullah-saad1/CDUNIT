<?php
session_start();
require_once "../config.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if ($_SESSION["userrole"] != 2) {
    header("location: ../");
    exit;
  }
  $sql="UPDATE `studentforma` SET `status`='2' WHERE `id`='".$_GET["id"]."';";
  if ($stmt = mysqli_prepare($link, $sql)) {
    if (mysqli_stmt_execute($stmt))
    {
        header("location: ./");
    }
}
?>