<?php

session_start();
$serveur = "localhost"; 
$utilisateur = "root"; 
$motDePasse = ""; 
$baseDeDonnees = "j_intern";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
if (!$connexion) {
    die("Échec de la connexion au serveur local : " . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $idOffre = $_GET['id'];

    // Effectuez la requête DELETE pour supprimer l'offre de la base de données
    $sql = "DELETE FROM offre WHERE id = $idOffre";

    if ($connexion->query($sql) === TRUE) {
        echo "Suppression réussie.";
        header("Location: list.php");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . $connexion->error;
    }
} else {
    echo "ID de l'offre non spécifié.";
    exit();
}
?>