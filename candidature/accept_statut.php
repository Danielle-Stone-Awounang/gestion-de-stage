<?php
session_start();

$serveur = "localhost"; 
$utilisateur = "root"; 
$motDePasse = ""; 
$baseDeDonnees = "j_intern";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    if (!$connexion) {
        die("Échec de la connexion au serveur de redondance : " . mysqli_connect_error());
    }
// Inclure ici tout ce qui est nécessaire pour la gestion des statuts
if (isset($_GET['id'])) {
    $idCandidature = $_GET['id'];
    $statut = 'Acceptée';
    $idCandidature = $_SESSION['idCandidature'];

    // Effectuer les opérations nécessaires pour mettre à jour le statut
    // ...
    $sql = "UPDATE candidature set statut='$statut' where idcandidature = $idCandidature";
        if (mysqli_query($connexion, $sql)) {
            echo 'modification réussit';
            header("Location: list.php?id={$_SESSION['idOffre']}");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Impossible de modifier le statut</div>";
        }
    }
    else{
        echo 'impossible de recupérer cet candidature';
    }
?>