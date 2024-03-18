
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
    if (isset($_GET['id'])) {
        $idOffre = $_GET['id'];
       
    $id_entreprise = $_SESSION['id_entreprise'];
    $id_utilisateur = $_SESSION['id_utilisateur'];
// Récupération des offres de la base de données 
$sql = "SELECT * FROM  utilisateur u join candidature c  on u.id = c.id_utilisateur join offre as o on o.id = id_offre where o.id= $idOffre"; 

$result = $connexion->query($sql);
if ($result->num_rows > 0) 
{    // Affichage des offres    
    while($row = $result->fetch_assoc()) {  
        $_SESSION['idOffre']= $row['id'];
        $_SESSION['idCandidature']=$row['idCandidature'];
        $username = $row["nom_utilisateur"];
        $CV = $row["cv"];
        $LettreMotivation = $row["lettre_motivation"];
        $diplome = $row["diplome"]; 
        $nom = $row["nom"]; 
        $email = $row["email"];
        $photo = $row["photo_user"]; 
        $statut = $row["statut"]; 

        echo ('<div class="containt_card">
        <div class="card candidatures"> 
          <div class="img_candidat">');
          if ($photo === null){
            echo '<img src="../assets/images/user.png"></img>';
          }else{ echo '<img src="'.$photo.'"></img>';}
        echo('
          <p>'.$username.'</p>
          </div class="containt_info">
          <div>
          <hr>
          <p>'.$nom.'</p>
          <p>'.$email.'</p>
          <hr>
          <p><a href="'.$CV.'" target="_blank">CV</a> ou <a href="'.$CV.'" download>Télécharger</a> </p>
          <p><a href="'.$LettreMotivation.'" target="_blank">Lettre de motivation </a> ou <a href="'.$LettreMotivation.'" download>Télécharger</a> </p>       
          <p><a href="'.$diplome.'" target="_blank">Diplome</a> ou <a href="'.$diplome.'" download>Télécharger</a> </p>
          </div>
          <hr>
          <div class="apply-btn" >');
          if ($statut === "En attente"){
            echo ('
            <hr>
            <button class="statutBtn"><a class="head_btn" href="accept_statut.php?id='.$_SESSION['idCandidature'].'">Accepter</a></button>
          <button class="statutBtn"><a class="head_btn" href="reject_statut.php?id='.$_SESSION['idCandidature'].'">Rejeter</a></button>
          ');
          }else{echo '<p>Vous avez déjà répondu à cette candidature</p>';}
          echo ('
          </div>
          
        </div>
        </div>
        ');

    } 
} 
else {    
    echo "<h1>Cette offre n'a encore reçu de candidature</h1>"; 
}
    }else{
        echo "<h1>Nous n'avons pas pu récupérer l'offre</h1>";
    }
 
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
  $('.statutBtn').click(function() {
    var statut = $(this).data('statut'); // Récupérer le statut du bouton cliqué
    var phpFile = $(this).data('phpfile'); // Récupérer le fichier PHP correspondant

    // Effectuer une requête AJAX vers le fichier PHP spécifié
    $.ajax({
      url: phpFile,
      type: 'POST',
      data: { statut: statut },
      success: function(response) {
        console.log(response); // Afficher la réponse du serveur dans la console
      },
      error: function(xhr, status, error) {
        console.log(error); // Afficher l'erreur dans la console en cas d'échec de la requête
      }
    });
  });
});
</script>
</body>
</html>
