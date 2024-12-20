
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
<?php
include 'connection.php';

// Requête pour les joueurs (hors gardiens)
$players_query = "
SELECT 
    p.player_id, p.name AS player_name, p.photo, p.position, p.rating,
    c.name AS club_name, 
    n.name AS nationality_name,
    ps.pace, ps.shooting, ps.dribbling, ps.passing, ps.defending, ps.physical
FROM 
    players p
LEFT JOIN clubs c ON p.club_id = c.club_id
LEFT JOIN nationalities n ON p.nationality_id = n.nationality_id
LEFT JOIN physique_player ps ON p.physicalPlayer_id = ps.physicalPlayer_id
WHERE 
    p.position != 'GK'";

// Requête pour les gardiens
$gk_query = "
SELECT 
    p.player_id, p.name AS player_name, p.photo, p.position, p.rating,
    c.name AS club_name, 
    n.name AS nationality_name,
    gk.diving, gk.handling, gk.kicking, gk.reflexes, gk.speed, gk.positioning
FROM 
    players p
LEFT JOIN clubs c ON p.club_id = c.club_id
LEFT JOIN nationalities n ON p.nationality_id = n.nationality_id
LEFT JOIN physique_gardien gk ON p.physicalGk_id = gk.physicalGk_id
WHERE 
    p.position = 'GK'";

// Exécute les requêtes
$players_result = $conn->query($players_query);
$gk_result = $conn->query($gk_query);



if (isset($_GET['delete_id'])) {
    $player_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM players WHERE player_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $player_id);
    $stmt->execute();
    $stmt->close();
    header("Location: players.php"); // Rediriger pour éviter un refresh avec la suppression
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Dashboard</title>
   
</head>
<body>
    <div class="dashboard">
        <h1>Players Table</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Position</th>
                    <th>Club</th>
                    <th>Nationality</th>
                    <th>Rating</th>
                    <th>Pace</th>
                    <th>Shooting</th>
                    <th>Dribbling</th>
                    <th>Passing</th>
                    <th>Defending</th>
                    <th>Physical</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($players_result)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['player_name']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Player Photo"></td>
                        <td><?php echo htmlspecialchars($row['position']); ?></td>
                        <td><?php echo htmlspecialchars($row['club_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['nationality_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['rating']); ?></td>
                        <td><?php echo htmlspecialchars($row['pace']); ?></td>
                        <td><?php echo htmlspecialchars($row['shooting']); ?></td>
                        <td><?php echo htmlspecialchars($row['dribbling']); ?></td>
                        <td><?php echo htmlspecialchars($row['passing']); ?></td>
                        <td><?php echo htmlspecialchars($row['defending']); ?></td>
                        <td><?php echo htmlspecialchars($row['physical']); ?></td>
                        <td>
                            <button class="btn btn-edit" onclick="editPlayer(<?php echo $row['player_id']; ?>)">Edit</button>
                            <a href="?delete_id=<?php echo $row['player_id']; ?>" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h1>Goalkeepers Table</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Position</th>
                    <th>Club</th>
                    <th>Nationality</th>
                    <th>Rating</th>
                    <th>Diving</th>
                    <th>Handling</th>
                    <th>Kicking</th>
                    <th>Reflexes</th>
                    <th>Speed</th>
                    <th>Positioning</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($gk_result)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['player_name']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Player Photo"></td>
                        <td><?php echo htmlspecialchars($row['position']); ?></td>
                        <td><?php echo htmlspecialchars($row['club_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['nationality_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['rating']); ?></td>
                        <td><?php echo htmlspecialchars($row['diving']); ?></td>
                        <td><?php echo htmlspecialchars($row['handling']); ?></td>
                        <td><?php echo htmlspecialchars($row['kicking']); ?></td>
                        <td><?php echo htmlspecialchars($row['reflexes']); ?></td>
                        <td><?php echo htmlspecialchars($row['speed']); ?></td>
                        <td><?php echo htmlspecialchars($row['positioning']); ?></td>
                        <td>
                            <button class="btn btn-edit" onclick="editPlayer(<?php echo $row['player_id']; ?>)">Edit</button>
                            <a href="?delete_id=<?php echo $row['player_id']; ?>" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>


            <!-- ========================= formulaire ==================== -->
        
            <!-- <div id="player_form" class="form-container" style="display:none">
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
      <input type="number" id="nationality" name="nationality" placeholder="Enter nationality" />
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
      <input type="number" id="club" name="club" placeholder="Enter club name" />
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
</div> -->
            <script src="dashboard.js"></script>
            <script src="players.js"></script>

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>