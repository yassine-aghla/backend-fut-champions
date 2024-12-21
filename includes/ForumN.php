<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <div id="National_form" class="form-container club ">
<h2>formulaire de les nationalities</h2>
<?php
  require '../config/connection.php';
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from nationalities where nationality_id='$id'";
    $q=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($q);
    $name=$rows['name'];
    $flag=$rows['flag'];
 }
  ?>
<form method="POST" action="../includes/create.php?<?php if(isset($_GET['id'])){
  echo "id=update";} ?>">
    <?php
// Vérifiez si l'ID est dans l'URL.
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
?>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
      <label for="nationality-name">Nom de la Nationalité</label>
      <input type="text" id="nationality-name" name="nationality-name" placeholder="Entrez le nom de la nationalité" value="<?php if(isset($_GET['id'])){
        echo $name;
      } ?>" required>
    </div>
    <div class="form-group">
      <label for="nationality-flag-url">URL du Drapeau</label>
      <input type="url" id="nationality-flag-url" name="nationality-flag-url" placeholder="Entrez l'URL du drapeau" value="<?php if(isset($_GET['id'])){
        echo $flag; } ?>" required>
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