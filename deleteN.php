<?php 
require 'connection.php';
$id=$_GET['id'];
$sql="delete from nationalities where nationality_id='$id' ";
$query=mysqli_query($conn,$sql);
if(isset($query)){
header("location:nationalite.php");
}
?>
