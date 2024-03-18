
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<?php 
    require 
    '../connexion/navbar.php';
    $id_utilisateur = $_SESSION['id_utilisateur'];
// Récupération des offres de la base de données 
$sql = "SELECT * FROM candidature as c join offre as o on o.id = id_offre where id_utilisateur = $id_utilisateur"; 

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
    $statut = $row['statut'];
    $type = $row["type_offre"];
    $image = $row['photo'];  

    echo '<div class="containt_card">';
        echo '<div class="card" >';        
        echo '<img class="img-offre" src="'.$image.'" alt="'.$titre.'">';        
        echo '<h3>'.$titre.'<span class="bage">'.$statut.'</span></h3>';        
        echo '<p>'.$description.'</p>';      
        echo '<p><span class="precision">Compétences réquises: </span>'.$competence.'</p>';   
        echo '<p><span class="precision">Date limite: </span>'.$datelimite;        
        echo '<span class="bage">'.$type.'</span></p>';
        echo '<div class="divid"></div>';             
        echo '</div>';  
        echo '</div>';  
         
    } 
} 
else {    
    echo '<p class="empty_page">Vous n\'avez ajouté aucune offre</p>'; 
}
 
?>

</body>
</html>
