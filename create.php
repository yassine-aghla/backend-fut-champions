 <?php
 if(isset($_GET['id'])){
    $nomNatinaolity=$_POST['nationality-name'];
    $flagNation=$_POST['nationality-flag-url'];
    $id=$_POST['id'];
    require 'connection.php';
    $sql="update nationalities set  name='$nomNatinaolity', flag='$flagNation' where nationality_id='$id' ";
    $q=mysqli_query($conn,$sql);
    if(isset($sql)){
        header("location:nationalite.php");
    }
 }else{
include 'connection.php';
$nomNatinaolity=$_POST['nationality-name'];
$flagNation=$_POST['nationality-flag-url'];
require 'connection.php';
$requete="INSERT INTO `nationalities` ( name, flag)values('$nomNatinaolity','$flagNation');";
$query=mysqli_query($conn,$requete);
if(isset($query)){
    header("location:nationalite.php");

}
}

?> 


