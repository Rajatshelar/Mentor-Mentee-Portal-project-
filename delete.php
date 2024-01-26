<?php
session_start();
$file=$_SESSION['file'];
$fn=$file.".php";
//echo $fn; exit;
include 'config.php';
$id = (int)$_GET['id']; // $id is now defined
mysqli_query($conn,"DELETE FROM ".$file." WHERE id=".$id);
//echo $fn;
mysqli_close($conn);
header("Location:".$fn);
?>