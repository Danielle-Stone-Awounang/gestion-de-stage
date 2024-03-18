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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../assets/images/logo.png" class="logo_nav" alt="j_intern">
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
        <div class="logo_head"><img src="../assets/images/logo.png" class="logo_head" alt="j_intern"></div>
        <p>Découvrez de nombreuses offres d'emplois et stage et développez vos compétences dans votre domaine</p>
        <button><a class="head_btn" href="login.php">Connexion</a></button> 
        <button><a class="head_btn" href="signup.php">Inscription</a></button>
      </div>
    </div>
    <div class="slide deux">
      <div class="content">
        <div class="logo_head"><img src="../assets/images/logo.png" alt="j_intern"></div>
        <p>créer votre entreprise ici et devenez employeur</p>
        <button><a class="head_btn" href="login.php">Connexion</a></button> 
        <button><a class="head_btn" href="signup.php">Inscription</a></button>
      </div>
    </div>
  </div>
  </header>

  <div class="container">
      <h1>Les différentes offres</h1>
      

<div class="containt_card">
<?php 
// Récupération des offres de la base de données 
$sql = "SELECT * FROM offre "; 

$result = $connexion->query($sql);
if ($result->num_rows > 0) 
{    // Affichage des offres    
    while($row = $result->fetch_assoc()) {  
        $_SESSION['idOffre']= $row['id'];
        $titre = $row['titre'];
    $description = $row['description_offre'];
    $domaine = $row['domaine'];
    $competence = $row['competences'];
    $datelimite = $row['date_limite'];
    $salaire = $row['salaire'];
    $type = $row["type_offre"];
    $image = $row['photo'];  

        echo '<div class="card" >';        
        echo '<img class="img-offre" src="'.$image.'" alt="'.$titre.'">';        
        echo '<h3>'.$titre.'</h3>';        
        echo '<p>'.$description.'</p>';      
        echo '<p><span class="precision">Compétences réquises: </span>'.$competence.'</p>';   
        echo '<p><span class="precision">Date limite: </span>'.$datelimite;        
        echo '<span class="bage">'.$type.'</span></p>';       
        echo '<div class="apply-btn" ><button >';
            echo '<a href="../connexion/login-new.php">Postuler</a>';
        echo '</button></div>';        
        echo '<div class="divid"></div>';
        echo '</div>';  
    } 
} 
else {    
    echo "Vous n'avez ajouté aucune offre"; 
}
 
?>
</div>

     
  </div>

<!-- JS de Bootstrap (nécessite Popper.js pour les fonctionnalités avancées) -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../script.js"></script>
</body>
</html>