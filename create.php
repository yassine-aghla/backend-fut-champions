 <?php
include 'connection.php';
$nomNatinaolity=$_POST['nationality-name'];
$flagNation=$_POST['nationality-flag-url'];
require 'connection.php';
$requete="INSERT INTO `nationalities` ( name, flag)values('$nomNatinaolity','$flagNation');";
$query=mysqli_query($conn,$requete);
if(isset($query)){
    echo"<h1>INSERTION AVEC SUCCES</h1>";
}else{
     echo"<h1>INSERTION not  SUCCES</h1>";
}

?> 


