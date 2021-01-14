<?php
include('../koneksi.php');
$ID	= $_GET['id'];

$sql 	= "DELETE FROM `".$_GET['sta']."` WHERE `ID` ='".$ID."'";
$query	= mysqli_query($conn,$sql);
header('location: search.php');
?>
