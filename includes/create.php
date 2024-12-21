 <?php
 if(isset($_GET['id'])){
    $nomNatinaolity=$_POST['nationality-name'];
    $flagNation=$_POST['nationality-flag-url'];
    $id=$_POST['id'];
    require '../config/connection.php';
    $sql="update nationalities set  name='$nomNatinaolity', flag='$flagNation' where nationality_id='$id' ";
    $q=mysqli_query($conn,$sql);
    if(isset($sql)){
        header("location:nationalite.php");
    }
 }else{
include '../config/connection.php';
$nomNatinaolity=$_POST['nationality-name'];
$flagNation=$_POST['nationality-flag-url'];
require '../config/connection.php';
$requete="INSERT INTO `nationalities` ( name, flag)values('$nomNatinaolity','$flagNation');";
$query=mysqli_query($conn,$requete);
if(isset($query)){
    header("location:../includes/nationalite.php");

}
}

?> 


