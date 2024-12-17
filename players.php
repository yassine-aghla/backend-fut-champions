
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
                    
                    <button id= "add"class="btn btn-add">Ajouter Player</button>
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
        
     <div id="player_form" class="form-container">
        <h2>Player Form</h2>
        <form id="formulaire_joueur">
         
          <div class="form-group">
            <label for="name">Name</label>
            <input
              type="text"
              id="name"
              name="name"
              placeholder="Enter player name"
              required
            />
            <span id="name-error"></span>
          </div>
          <div class="form-group">
            <label for="photo">Photo</label>
            <input type="url" id="photo" name="photo" />
            <span id="photo-error"></span>
          </div>
          <div class="form-group">
            <label for="position">Position</label>
            <select id="position" name="position">
              <option value="CBR">GARDIEN</option>
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
          <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" id="nationality" name="nationality" placeholder="Enter nationality" />
            <span id="natoinality-error"></span>
          </div>
          <div class="form-group">
            <label for="photo">drapeau</label>
            <input type="url" id="joueur_drapeau" name="photo" />
            <span id="joueur_drapeau-error"></span>
          </div>

          <div class="form-group">
            <label for="photo">logo</label>
            <input type="url" id="joueur_logo" name="photo" />
            <span id="joueur_logo-error"></span>
          </div>
          <div class="form-group">
            <label for="club">Club</label>
            <input type="text" id="club"  name="club"  placeholder="Enter club name"/>
            <span id="club-error"></span>
          </div>

          <div class="form-group">
            <label for="rating">Rating</label>
            <input
              type="number"
              id="rating"
              name="rating"
              placeholder="Enter player rating"
              min="0"
              max="100"
            />
            <span id="rating-error"></span>
          </div>

          <div class="avis">
            <div class="form-group">
              <label for="pace">Pace</label>
              <input
                type="number"
                id="pace"
                name="pace"
                placeholder="Enter pace"
                min="0"
                max="100"
              />
              <span id="pace-error"></span>
            </div>
            <div class="form-group">
              <label for="shooting">Shooting</label>
              <input
                type="number"
                id="shooting"
                name="shooting"
                placeholder="Enter shooting"
                min="0"
                max="100"
              />
              <span id="shooting-error"></span>
            </div>
          </div>
          <div class="avis">
            <div class="form-group">
              <label for="passing">Passing</label>
              <input
                type="number"
                id="passing"
                name="passing"
                placeholder="Enter passing"
                min="0"
                max="100"
              />
              <span id="passing-error"></span>
            </div>
            <div class="form-group">
              <label for="dribbling">Dribbling</label>
              <input
                type="number"
                id="dribbling"
                name="dribbling"
                placeholder="Enter dribbling"
                min="0"
                max="100"
              />
              <span id="dribbling-error"></span>
            </div>
          </div>
          <div class="avis">
            <div class="form-group">
              <label for="defending">Defending</label>
              <input
                type="number"
                id="defending"
                name="defending"
                placeholder="Enter defending"
                min="0"
                max="100"
              />
              <span id="defending-error"></span>
            </div>
            <div class="form-group">
              <label for="physical">Physical</label>
              <input
                type="number"
                id="physical"
                name="physical"
                placeholder="Enter physical"
                min="0"
                max="100"
              /><br />
              <span id="physical-error"></span>
            </div>
          </div>
          <div>
            <button type="button" class="btn-submit"> ajouter  joueur </button>
          </div>
        </form>
      </div> 

            <script src="dashboard.js"></script>
            <script src="players.js"></script>

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>