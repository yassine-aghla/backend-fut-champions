<?php
 if(isset($_GET['id'])){
    $nomClub=$_POST['club-name'];
    $logoClub=$_POST['club-url'];
    $id=$_POST['id'];
    require 'connection.php';
    $sql="update clubs set name='$nomClub', logo='$logoClub' where club_id='$id' ";
    $q=mysqli_query($conn,$sql);
    if(isset($sql)){
        header("location:club.php");
    
    }
 }else{
include 'connection.php';
$nomClub=$_POST['club-name'];
$logoClub=$_POST['club-url'];
require 'connection.php';
$requete="INSERT INTO `clubs` ( name, logo)values('$nomClub','$logoClub');";
$query=mysqli_query($conn,$requete);
if(isset($query)){
    header("location:club.php");

}
}

?> 