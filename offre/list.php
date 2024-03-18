
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

$id_utilisateur = $_SESSION['id_utilisateur'];
        $query2 = "SELECT * FROM entreprise WHERE id_utilisateur = '$id_utilisateur'";
        $result2 = $connexion->query($query2);
        if ($result2->num_rows >= 1){
            $row = $result2->fetch_assoc();
            $_SESSION['id_entreprise']= $row["id"];
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
    $id_entreprise = $_SESSION['id_entreprise'];
// Récupération des offres de la base de données 
$sql = "SELECT * FROM offre where id_entreprise = $id_entreprise"; 

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

    echo '<div class="containt_card">';
        echo '<div class="card" >';        
        echo '<img class="img-offre" src="'.$image.'" alt="'.$titre.'">';        
        echo '<h3>'.$titre.'</h3>';        
        echo '<p>'.$description.'</p>';      
        echo '<p><span class="precision">Compétences réquises: </span>'.$competence.'</p>';   
        echo '<p><span class="precision">Date limite: </span>'.$datelimite;        
        echo '<span class="bage">'.$type.'</span></p><a class="lien-candidature" href="../candidature/list.php?id='.$_SESSION['idOffre'].'">Candidatures<a>';       
        echo '<div class="apply-btn" ><button ><a href="edit.php?id='.$_SESSION['idOffre'].'">Modifier</a></button>';
        echo '<button ><a href="delete.php?id='.$_SESSION['idOffre'].'">Supprimer</a></div>';        
        echo '<div class="divid"></div>';
        echo '</div>'; 
        echo '</div>'; 
    } 
} 
else {    
    echo "Vous n'avez ajouté aucune offre"; 
}
 
?>


</body>
</html>
