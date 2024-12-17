<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Yassine aghla</span>
                    </a>
                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="players.php">
                        <span class="icon">
                            <ion-icon name="football-outline"></ion-icon>
                        </span>
                        <span class="title">players</span>
                    </a>
                </li>

                <li>
                    <a href="club.php">
                        <span class="icon">
                            <ion-icon name="shield-outline"></ion-icon>
                        </span>
                        <span class="title">club</span>
                    </a>
                </li>

                <li>
                    <a href="nationalite.php">
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
                    
                    <button type="button" onclick="NatinaliteForm()" class="btn btn-add">Ajouter Nationalite</button>
                </div>

                <div class="user">
                    <img src="img me.jpg" alt="">
                </div>
            </div>
            <!-- ========================= table data base ==================== -->
            <div class="dashboard">
            <h1>Nationalities Table</h1>
<table>
  <thead>
    <tr>
      <th>Nationality ID</th>
      <th>Country Name</th>
      <th>Flag</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <!-- Exemple de données pour les nationalités -->
    <?php
require 'connection.php';
$requete = "SELECT * from nationalities";
$query = mysqli_query($conn, $requete);

while ($rows = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    // echo "<td>1</td>";
    echo "<td>" . $rows['nationality_id'] . "</td>";
    echo "<td>" . $rows['name'] . "</td>";
    echo "<td class='photo'>" . $rows['flag'] . "</td>"; 
    echo "<td>";
    echo "<button class='btn btn-edit'>Edit</button>";
    echo "<button class='btn btn-delete'>Delete</button>";
    echo "</td>";
    echo "</tr>";
}
?>
    <!-- <tr>
      <td>2</td>
      <td>France</td>
      <td class="photo"><img src="france_flag.jpg" alt="France Flag"></td>
      <td>
        <button class="btn btn-edit">Edit</button>
        <button class="btn btn-delete">Delete</button>
      </td>
    </tr> -->
  </tbody>
</table>
</div>
             <!-- ========================= formulaire ==================== -->
             <div id="National_form" class="form-container club " style="display:none">
  <h2>Ajouter une Nationalité</h2>
  <form method="POST" action="create.php">
    <div class="form-group">
      <label for="nationality-name">Nom de la Nationalité</label>
      <input type="text" id="nationality-name" name="nationality-name" placeholder="Entrez le nom de la nationalité" required>
    </div>
    <div class="form-group">
      <label for="nationality-flag-url">URL du Drapeau</label>
      <input type="url" id="nationality-flag-url" name="nationality-flag-url" placeholder="Entrez l'URL du drapeau" required>
    </div>
    <button type="submit" class="btn-submit">Ajouter</button>
  </form>
</div>
            
            <script src="dashboard.js"></script>
            <script src="nationalite.js"></script>
            

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>