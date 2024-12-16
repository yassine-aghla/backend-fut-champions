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
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="img me.jpg" alt="">
                </div>
            </div>
             <!-- ========================= formulaire ==================== -->
             <div class="form-container club">
  <h2>Ajouter une Nationalité</h2>
  <form>
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
            
            <script src="script.js"></script>

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>