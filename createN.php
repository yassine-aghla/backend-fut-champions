<?php
include 'connection.php';

// Récupérer les données du formulaire
$name = $_POST['name'];
$photo = $_POST['photo'];
$position = $_POST['position'];
$rating = $_POST['rating'];
$club_id = $_POST['clubP']; // Assurez-vous que cette valeur est bien envoyée
$nationality_id = $_POST['nationalityP']; // Assurez-vous que cette valeur est bien envoyée

// Vérifier si le club existe
$checkClub = "SELECT club_id FROM clubs WHERE club_id = '$club_id'";
$resultClub = mysqli_query($conn, $checkClub);

if (mysqli_num_rows($resultClub) === 0) {
    die("Erreur : Le club avec l'ID $club_id n'existe pas dans la table 'clubs'.");
}

// Vérifier si la nationalité existe
$checkNationality = "SELECT nationality_id FROM nationalities WHERE nationality_id = '$nationality_id'";
$resultNationality = mysqli_query($conn, $checkNationality);

if (mysqli_num_rows($resultNationality) === 0) {
    die("Erreur : La nationalité avec l'ID $nationality_id n'existe pas dans la table 'nationalities'.");
}

// Insertion dans la table `players`
$requete = "
    INSERT INTO `players` (name, photo, position, club_id, nationality_id, rating, physicalGk_id, physicalPlayer_id)
    VALUES ('$name', '$photo', '$position', '$club_id', '$nationality_id', '$rating', NULL, NULL)
";

if (mysqli_query($conn, $requete)) {
    echo "Joueur ajouté avec succès.";
} else {
    die("Erreur lors de l'insertion du joueur : " . mysqli_error($conn));
}

mysqli_close($conn);
?>

