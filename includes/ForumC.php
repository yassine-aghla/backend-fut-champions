<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <div id="club_form" class="form-container club ">
<h2>formulaire de les clubs</h2>
<?php
  require '../config/connection.php';
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from clubs where club_id='$id'";
    $q=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($q);
    $name=$rows['name'];
    $logo=$rows['logo'];
 }
  ?>
<form method="POST" action="../includes/createC.php?<?php if(isset($_GET['id'])){
  echo "id=update";} ?>">
  <?php
// Vérifiez si l'ID est dans l'URL.
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
?>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
      <label for="club-name">Nom de Club</label>
      <input type="text" id="club-name" name="club-name" placeholder="Entrez le nom de club" value="<?php if(isset($_GET['id'])){
        echo $name;
      } ?>" required>
    </div>
    <div class="form-group">
      <label for="club-url">URL du club</label>
      <input type="url" id="club-url" name="club-url" placeholder="Entrez l'URL du drapeau" value="<?php if(isset($_GET['id'])){
        echo $logo; } ?>" required>
    </div>
    <button  type="submit" class="btn-submit">
        <?php
        if(isset($_GET['id'])){
            echo "modifier";
        }else{
            echo "ajouter";
        }
        ?>
    </button>
  </form>
      </div>
</body>
</html>