
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
                    <a href='ForumP.php' class="btn btn-add">Ajouter Player </a>
                </div>

                <div class="user">
                    <img src="img me.jpg" alt="">
                </div>
            </div>
<!-- ========================= table data base ==================== -->
<div  class="dashboard">
    <h1>Players Table</h1>
    <table>
      <thead>
        <tr>
          <th>Player ID</th>
          <th>Name</th>
          <th>Photo</th>
          <th>Position</th>
          <th>Club ID</th>
          <th>Nationality ID</th>
          <th>Rating</th>
          <th>Physical GK ID</th>
          <th>Physical Player ID</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Exemple de données -->
        <tr>
          <td>1</td>
          <td>John Doe</td>
          <td class="photo"><img src="player1.jpg" alt="Player Photo"></td>
          <td>ST</td>
          <td>5</td>
          <td>10</td>
          <td>85</td>
          <td>2</td>
          <td>3</td>
          <td>
            <button class="btn btn-edit">Edit</button>
            <button class="btn btn-delete">Delete</button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Jane Smith</td>
          <td class="photo"><img src="player2.jpg" alt="Player Photo"></td>
          <td>GK</td>
          <td>7</td>
          <td>15</td>
          <td>90</td>
          <td>1</td>
          <td>4</td>
          <td>
            <button class="btn btn-edit">Edit</button>
            <button class="btn btn-delete">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

            <!-- ========================= formulaire ==================== -->
        
            <div id="player_form" class="form-container" style="display:none">
  <h2>Player Form</h2>
  <form id="formulaire_joueur">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" placeholder="Enter player name" required />
      <span id="name-error"></span>
    </div>
    <div class="form-group">
      <label for="photo">Photo</label>
      <input type="url" id="photo" name="photo" placeholder="Enter photo URL" />
      <span id="photo-error"></span>
    </div>

    <div class="form-group">
      <label for="nationality">Nationality</label>
      <input type="text" id="nationality" name="nationality" placeholder="Enter nationality" />
      <span id="nationality-error"></span>
    </div>
    <div class="form-group">
      <label for="flag">Flag</label>
      <input type="url" id="joueur_drapeau" name="flag" placeholder="Enter flag URL" />
      <span id="joueur_drapeau-error"></span>
    </div>
    <div class="form-group">
      <label for="logo">Logo</label>
      <input type="url" id="joueur_logo" name="logo" placeholder="Enter logo URL" />
      <span id="joueur_logo-error"></span>
    </div>
    <div class="form-group">
      <label for="club">Club</label>
      <input type="text" id="club" name="club" placeholder="Enter club name" />
      <span id="club-error"></span>
    </div>

    <div class="form-group">
      <label for="rating">Rating</label>
      <input type="number" id="rating" name="rating" placeholder="Enter player rating" min="0" max="100" />
      <span id="rating-error"></span>
    </div>

    <div class="form-group">
      <label for="position">Position</label>
      <select id="position" name="position">
        <option value="GK">GARDIEN</option>
        <option value="CBR">CENTER BACK RIGHT</option>
        <option value="CBL">CENTER BACK LEFT</option>
        <option value="LB">LEFT BACK</option>
        <option value="RB">REIGHT BACK</option>
        <option value="MDF">Midfield</option>
        <option value="MR">MILIEU RELAYEUR</option>
        <option value="MO">MILIEU OFFENSIF</option>
        <option value="LW">LEFT WINGER</option>
        <option value="ST">Striker (ST)</option>
        <option value="RW">REIGHT WINGER</option>
      </select>
    </div>
<div id="avis_player">
    <div class="avis">
      <div class="form-group">
        <label for="stat1" id="stat1-label">Pace</label>
        <input type="number" id="stat1" name="pace" placeholder="Enter pace" min="0" max="100" />
      </div>
      <div class="form-group">
        <label for="stat2" id="stat2-label">Shooting</label>
        <input type="number" id="stat2" name="shooting" placeholder="Enter shooting" min="0" max="100" />
      </div>
    </div>
    <div class="avis">
      <div class="form-group">
        <label for="stat3" id="stat3-label">Passing</label>
        <input type="number" id="stat3" name="passing" placeholder="Enter passing" min="0" max="100" />
      </div>
      <div class="form-group">
        <label for="stat4" id="stat4-label">Dribbling</label>
        <input type="number" id="stat4" name="dribbling" placeholder="Enter dribbling" min="0" max="100" />
      </div>
    </div>
    <div class="avis">
      <div class="form-group">
        <label for="stat5" id="stat5-label">Defending</label>
        <input type="number" id="stat5" name="defending" placeholder="Enter defending" min="0" max="100" />
      </div>
      <div class="form-group">
        <label for="stat6" id="stat6-label">Physical</label>
        <input type="number" id="stat6" name="physical" placeholder="Enter physical" min="0" max="100" />
      </div>
    </div>
    <div>

    <div id="avis_gardien" style="display:none">
    <div class="avis">
      <div class="form-group">
        <label for="stat1" id="stat1-label">Pace</label>
        <input type="number" id="stat1" name="pace" placeholder="Enter pace" min="0" max="100" />
      </div>
      <div class="form-group">
        <div class="avis_player">
            <div class="avis">
    <div class="form-group">
      <label for="player_pace" id="player_pace-label">Player Pace</label>
      <input type="number" id="player_pace" name="player_pace" placeholder="Enter player pace" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="player_shooting" id="player_shooting-label">Player Shooting</label>
      <input type="number" id="player_shooting" name="player_shooting" placeholder="Enter player shooting" min="0" max="100" />
    </div>
  </div>
  <div class="avis">
    <div class="form-group">
      <label for="player_passing" id="player_passing-label">Player Passing</label>
      <input type="number" id="player_passing" name="player_passing" placeholder="Enter player passing" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="player_dribbling" id="player_dribbling-label">Player Dribbling</label>
      <input type="number" id="player_dribbling" name="player_dribbling" placeholder="Enter player dribbling" min="0" max="100" />
    </div>
  </div>
  <div class="avis">
    <div class="form-group">
      <label for="player_defending" id="player_defending-label">Player Defending</label>
      <input type="number" id="player_defending" name="player_defending" placeholder="Enter player defending" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="player_physical" id="player_physical-label">Player Physical</label>
      <input type="number" id="player_physical" name="player_physical" placeholder="Enter player physical" min="0" max="100" />
    </div>
  </div>
</div>

<div class="avis_gardien ">
  <div class="avis">
    <div class="form-group">
      <label for="gardien_diving" id="gardien_diving-label">Gardien Diving</label>
      <input type="number" id="gardien_diving" name="gardien_diving" placeholder="Enter gardien diving" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="gardien_handling" id="gardien_handling-label">Gardien Handling</label>
      <input type="number" id="gardien_handling" name="gardien_handling" placeholder="Enter gardien handling" min="0" max="100" />
    </div>
  </div>
  <div class="avis">
    <div class="form-group">
      <label for="gardien_kicking" id="gardien_kicking-label">Gardien Kicking</label>
      <input type="number" id="gardien_kicking" name="gardien_kicking" placeholder="Enter gardien kicking" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="gardien_reflexes" id="gardien_reflexes-label">Gardien Reflexes</label>
      <input type="number" id="gardien_reflexes" name="gardien_reflexes" placeholder="Enter gardien reflexes" min="0" max="100" />
    </div>
  </div>
  <div class="avis">
    <div class="form-group">
      <label for="gardien_speed" id="gardien_speed-label">Gardien Speed</label>
      <input type="number" id="gardien_speed" name="gardien_speed" placeholder="Enter gardien speed" min="0" max="100" />
    </div>
    <div class="form-group">
      <label for="gardien_positioning" id="gardien_positioning-label">Gardien Positioning</label>
      <input type="number" id="gardien_positioning" name="gardien_positioning" placeholder="Enter gardien positioning" min="0" max="100" />
    </div>
  </div>
</div>


      <button type="submit" class="btn-submit">Ajouter joueur</button>
    </div>
  </form>
</div>
            <script src="dashboard.js"></script>
            <script src="players.js"></script>

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>