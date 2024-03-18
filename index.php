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
// $userType =  $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>j_intern - Accueil</title>
  <link rel="stylesheet" type="text/css" href="C:/xampp/htdocs/j_intern/styles.css">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="path/to/logo.png" alt="Logo j_intern">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Accueil</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php">Connexion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Inscription</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <header>
    <!-- slides  -->
    <div class="slideshow">
    <div class="slide un">
      <div class="content">
        <h1>J_intern</h1>
        <p>Découvrez de nombreuses offres d'emplois et stage et développez vos compétences dans votre domaine</p>
        <button>Se connecter</button> <button>S'inscrire</button>
      </div>
    </div>
    <div class="slide deux">
      <div class="content">
        <h1>J_intern</h1>
        <p>créer votre entreprise ici et devenez employeur</p>
        <button ><a href="../offre/create.php">Nouvelle offre</a></button>
      </div>
    </div>
  </div>
  </header>

  <div class="container">
      <h1>Les différentes offres</h1>
      <?php 
    require 
    'C:/xampp/htdocs/j_intern/offre/list-candidat.php';?>
     
  </div>

<!-- JS de Bootstrap (nécessite Popper.js pour les fonctionnalités avancées) -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>