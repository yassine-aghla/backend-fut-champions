<?php
include '../config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="../includes/dashboard.php">
                        <span class="icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Yassine aghla</span>
                    </a>
                </li>

                <li>
                    <a href="../includes/dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="../includes/players.php">
                        <span class="icon">
                            <ion-icon name="football-outline"></ion-icon>
                        </span>
                        <span class="title">players</span>
                    </a>
                </li>

                <li>
                    <a href="../includes/club.php">
                        <span class="icon">
                            <ion-icon name="shield-outline"></ion-icon>
                        </span>
                        <span class="title">club</span>
                    </a>
                </li>

                <li>
                    <a href="../includes/nationalite.php">
                        <span class="icon">
                            <ion-icon name="flag-outline"></ion-icon>
                        </span>
                        <span class="title">Nationalite</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                
                    
                <div class="search">
                    
                    <a href='ForumC.php' class="btn btn-add">Ajouter club</a>
                </div>
            

                <div class="user">
                    <img src="../assets/img me.jpg" alt="">
                </div>
            </div>
<!-- ========================= table data base ==================== -->
<div class="dashboard">
            <h1>Clubs Table</h1>
    <table>
      <thead>
        <tr>
          <th>Club ID</th>
          <th>Club Name</th>
          <th>Logo</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Exemple de données pour les clubs -->
        <?php
require '../config/connection.php';
$requete = "SELECT * from clubs";
$query = mysqli_query($conn, $requete);

while ($rows = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    $idC=$rows['club_id'];
    // echo "<td>1</td>";
    echo "<td>" . $rows['club_id'] . "</td>";
    echo "<td>" . $rows['name'] . "</td>";
    echo "<td class='photo'><img src=" . $rows['logo'] . "></td>"; 
    echo "<td>";
    echo "<a href='ForumC.php?id=".$idC."' class='btn btn-edit' >Edit</a>";
    echo "<a href='deleteC.php?id=".$idC."' class='btn btn-delete' >Delete</a>";
    echo "</td>";
    echo "</tr>";
}
?>

      </tbody>
    </table>
  </div>
             <!-- ========================= formulaire ==================== -->
    <!-- <div id="club_form" class="form-container club" style="display:none">
     <h2>Ajouter un Club</h2>
  <form>
    <div  class="form-group">
      <label for="club-name">Nom du Club</label>
      <input type="text" id="club-name" name="club-name" placeholder="Entrez le nom du club" required>
    </div>
    <div class="form-group">
      <label for="club-url">URL du Club</label>
      <input type="url" id="club-url" name="club-url" placeholder="Entrez l'URL du club" required>
    </div>
    <button type="submit" class="btn-submit">Ajouter</button>
  </form>
</div> -->

            
           <script src="dashboard.js"></script>
             <script src="club.js"></script>
            
            

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>