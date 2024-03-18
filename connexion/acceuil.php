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
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<?php 
    require 
    'navbar.php';
?>

  <header>
    <!-- slides  -->
    <div class="slideshow">
    <div class="slide un">
      <div class="content">
        <div ><img class="logo_head" src="../assets/images/logo.png" alt="j_intern"></div>
        <p>Découvrez de nombreuses offres d'emplois et stage et développez vos compétences dans votre domaine</p>
        <?php if ($_SESSION['role'] === 'candidat'): ?>
        <button>Suivre mes candidature</button>
        <?php elseif ($_SESSION['role'] === 'employeur'): ?>
        <button>Nouvelle offre</button>
        <?php endif; ?>
      </div>
    </div>
    <div class="slide deux">
      <div class="content">
        <div ><img class="logo_head" src="../assets/images/logo.png" alt="j_intern"></div>
        <p>créer votre entreprise ici et devenez employeur</p>
        <?php if ($_SESSION['role'] === 'candidat'): ?>
        <button>Suivre mes candidature</button>
        <?php elseif ($_SESSION['role'] === 'employeur'): ?>
        <button ><a href="../offre/create.php">Nouvelle offre</a></button>
        <?php endif; ?>
      </div>
    </div>
    <div class="slide trois">
      <div class="content">
        <h1>Slide 3</h1>
        <p>J_intern</p>
        <?php if ($_SESSION['role'] === 'candidat'): ?>
        <button>Suivre mes candidature</button>
        <?php elseif ($_SESSION['role'] === 'employeur'): ?>
        <button>Nouvelle offre</button>
        <?php endif; ?>
      </div>
    </div>
  </div>
  </header>

  <div class="container">
      <h1>Les différentes offres</h1>
      <?php 
    require 
    '../offre/list-candidat.php';?>
     
  </div>
 
  <script src="../script.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>