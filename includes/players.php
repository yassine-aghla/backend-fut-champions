
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
                    <a href='../includes/ForumP.php' class="btn btn-add">Ajouter Player </a>
                </div>

                <div class="user">
                    <img src="../assets/img me.jpg" alt="">
                </div>
            </div>
<!-- ========================= table data base ==================== -->
<?php
include '../config/connection.php';

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

if (isset($_POST['update'])) {
  // Récupération sécurisée des données
  $player_id = intval($_POST['player_id']);
  $player_name = htmlspecialchars($_POST['player_name'], ENT_QUOTES);
  $position = htmlspecialchars($_POST['position'], ENT_QUOTES);
  $rating = intval($_POST['rating']);
  $is_goalkeeper = isset($_POST['is_goalkeeper']) && $_POST['is_goalkeeper'] === "1";

  if ($is_goalkeeper) {
      // Mise à jour pour les gardiens
      $diving = intval($_POST['diving']);
      $handling = intval($_POST['handling']);
      $kicking = intval($_POST['kicking']);
      $reflexes = intval($_POST['reflexes']);
      $speed = intval($_POST['speed']);
      $positioning = intval($_POST['positioning']);

      $update_query = "
          UPDATE players p
          LEFT JOIN physique_gardien gk ON p.physicalGk_id = gk.physicalGk_id
          SET 
              p.name = ?, 
              p.position = ?, 
              p.rating = ?, 
              gk.diving = ?, 
              gk.handling = ?, 
              gk.kicking = ?, 
              gk.reflexes = ?, 
              gk.speed = ?, 
              gk.positioning = ?
          WHERE 
              p.player_id = ?";
      $stmt = $conn->prepare($update_query);
      $stmt->bind_param(
          "ssiiiiiiii", 
          $player_name, $position, $rating, $diving, $handling, $kicking, $reflexes, $speed, $positioning, $player_id
      );
  } else {
      // Mise à jour pour les joueurs de champ
      $pace = intval($_POST['pace']);
      $shooting = intval($_POST['shooting']);
      $dribbling = intval($_POST['dribbling']);
      $passing = intval($_POST['passing']);
      $defending = intval($_POST['defending']);
      $physical = intval($_POST['physical']);

      $update_query = "
          UPDATE players p
          LEFT JOIN physique_player ps ON p.physicalPlayer_id = ps.physicalPlayer_id
          SET 
              p.name = ?, 
              p.position = ?, 
              p.rating = ?, 
              ps.pace = ?, 
              ps.shooting = ?, 
              ps.dribbling = ?, 
              ps.passing = ?, 
              ps.defending = ?, 
              ps.physical = ?
          WHERE 
              p.player_id = ?";
      $stmt = $conn->prepare($update_query);
      $stmt->bind_param(
          "ssiiiiiiii", 
          $player_name, $position, $rating, $pace, $shooting, $dribbling, $passing, $defending, $physical, $player_id
      );
  }

  // Exécution de la requête
  if ($stmt->execute()) {
      header("Location: players.php"); // Redirection après la mise à jour
      exit;
  } else {
      echo "Erreur lors de la mise à jour : " . $stmt->error;
  }

  $stmt->close();
}
?>
<!-- Formulaire de mise à jour -->
<div id="update-form" style="display:none;">
    <h2>Edit Player</h2>
    <form method="POST" action="">
        <input type="hidden" name="player_id" id="player_id">
        <input type="hidden" name="is_goalkeeper" id="is_goalkeeper">

        <!-- Champs communs -->
        <label for="player_name">Name:</label>
        <input type="text" name="player_name" id="player_name" required><br><br>

        <label for="position">Position:</label>
        <input type="text" name="position" id="position" required><br><br>

        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" required><br><br>

        <!-- Champs spécifiques pour les joueurs de champ -->
        <div id="field-player-stats" style="display:none;">
            <label for="pace">Pace:</label>
            <input type="number" name="pace" id="pace"><br><br>

            <label for="shooting">Shooting:</label>
            <input type="number" name="shooting" id="shooting"><br><br>

            <label for="dribbling">Dribbling:</label>
            <input type="number" name="dribbling" id="dribbling"><br><br>

            <label for="passing">Passing:</label>
            <input type="number" name="passing" id="passing"><br><br>

            <label for="defending">Defending:</label>
            <input type="number" name="defending" id="defending"><br><br>

            <label for="physical">Physical:</label>
            <input type="number" name="physical" id="physical"><br><br>
        </div>

        <!-- Champs spécifiques pour les gardiens -->
        <div id="goalkeeper-stats" style="display:none;">
            <label for="diving">Diving:</label>
            <input type="number" name="diving" id="diving"><br><br>

            <label for="handling">Handling:</label>
            <input type="number" name="handling" id="handling"><br><br>

            <label for="kicking">Kicking:</label>
            <input type="number" name="kicking" id="kicking"><br><br>

            <label for="reflexes">Reflexes:</label>
            <input type="number" name="reflexes" id="reflexes"><br><br>

            <label for="speed">Speed:</label>
            <input type="number" name="speed" id="speed"><br><br>

            <label for="positioning">Positioning:</label>
            <input type="number" name="positioning" id="positioning"><br><br>
        </div>

        <input type="submit" name="update" value="Update Player">
    </form>
</div>
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
                       <button class="btn btn-edit" 
                       onclick="showUpdateForm({
    player_id: <?php echo $player['player_id']; ?>,
    is_goalkeeper: <?php echo $player['is_goalkeeper']; ?>,
    name: '<?php echo $player['name']; ?>',
    position: '<?php echo $player['position']; ?>',
    rating: <?php echo $player['rating']; ?>,
    <?php if ($player['is_goalkeeper']): ?>
    diving: <?php echo $player['diving']; ?>,
    handling: <?php echo $player['handling']; ?>,
    kicking: <?php echo $player['kicking']; ?>,
    reflexes: <?php echo $player['reflexes']; ?>,
    speed: <?php echo $player['speed']; ?>,
    positioning: <?php echo $player['positioning']; ?>
    <?php else: ?>
    pace: <?php echo $player['pace']; ?>,
    shooting: <?php echo $player['shooting']; ?>,
    dribbling: <?php echo $player['dribbling']; ?>,
    passing: <?php echo $player['passing']; ?>,
    defending: <?php echo $player['defending']; ?>,
    physical: <?php echo $player['physical']; ?>
    <?php endif; ?>
})">
    Edit
</button>
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
                          <button class="btn btn-edit" onclick="showUpdateForm(<?php echo $row['player_id']; ?>, <?php echo $row['is_goalkeeper']; ?>)">Edit</button>
                            <a href="?delete_id=<?php echo $row['player_id']; ?>" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>

    



           
            <script src="dashboard.js"></script>
            <script src="players.js"></script>

            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>