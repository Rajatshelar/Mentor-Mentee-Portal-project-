
<?php
session_start();
$file=$_SESSION['file'];
$fn=$file.".php";
$teacher_name=$_POST["t"];
//echo $fn; exit;
include 'config.php';
$id = (int)$_GET['id']; // $id is now defined
mysqli_query($conn,"UPDATE ".$file." SET mentor = '".$teacher_name."' WHERE id=".$id);
//echo $fn;
mysqli_close($conn);
header("Location:".$fn);
?>