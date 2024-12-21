<?php 
require '../config/connection.php';
$id=$_GET['id'];
$sql="delete from clubs where club_id='$id' ";
$query=mysqli_query($conn,$sql);
if(isset($query)){
header("location:../includes/club.php");
}
?>
