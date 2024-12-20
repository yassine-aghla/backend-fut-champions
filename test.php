<?php
// Inclure la connexion à la base de données
include('connection.php');

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $photo = $_POST['photo'];
    $nationality_id = $_POST['nationalityP'];
    $club_id = $_POST['clubP'];
    $rating = $_POST['rating'];
    $position = $_POST['position'];

    // Variables pour les IDs
    $physicalGk_id = null;
    $physicalPlayer_id = null;

    // Vérifier si le joueur est un gardien ou non
    if ($position === 'GK') {
        // Récupérer les statistiques pour le gardien
        $diving = $_POST['gardien_diving'];
        $handling = $_POST['gardien_handling'];
        $kicking = $_POST['gardien_kicking'];
        $reflexes = $_POST['gardien_reflexes'];
        $speed = $_POST['gardien_speed'];
        $positioning = $_POST['gardien_positioning'];

        // Insérer les statistiques dans physique_gardien
        $query_gk = "INSERT INTO physique_gardien (diving, handling, kicking, reflexes, speed, positioning) 
                     VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_gk = $conn->prepare($query_gk);
        $stmt_gk->bind_param("iiiiii", $diving, $handling, $kicking, $reflexes, $speed, $positioning);
        $stmt_gk->execute();

        // Récupérer l'ID généré
        $physicalGk_id = $stmt_gk->insert_id;
    } else {
        // Récupérer les statistiques pour les joueurs
        $pace = $_POST['player_pace'];
        $shooting = $_POST['player_shooting'];
        $passing = $_POST['player_passing'];
        $dribbling = $_POST['player_dribbling'];
        $defending = $_POST['player_defending'];
        $physical = $_POST['player_physical'];

        // Insérer les statistiques dans physique_player
        $query_player = "INSERT INTO physique_player (pace, shooting, passing, dribbling, defending, physical) 
                         VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_player = $conn->prepare($query_player);
        $stmt_player->bind_param("iiiiii", $pace, $shooting, $passing, $dribbling, $defending, $physical);
        $stmt_player->execute();

        // Récupérer l'ID généré
        $physicalPlayer_id = $stmt_player->insert_id;
    }

    // Insérer les informations principales dans la table players
    $query_player_main = "INSERT INTO players (name, photo, position, club_id, nationality_id, rating, physicalGk_id, physicalPlayer_id) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_main = $conn->prepare($query_player_main);
    $stmt_main->bind_param(
        "sssiiiii",
        $name,
        $photo,
        $position,
        $club_id,
        $nationality_id,
        $rating,
        $physicalGk_id,
        $physicalPlayer_id
    );
    $stmt_main->execute();

    // Vérification de succès
    if ($stmt_main->affected_rows > 0) {
        echo "Le joueur a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du joueur : " . $conn->error;
    }
}
?>
