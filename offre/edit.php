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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de l'inscription
    $id = $_POST['idOffre'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $domaine = $_POST['domaine'];
    $competence = $_POST['competence'];
    $datelimite = $_POST['datelimite'];
    $salaire = $_POST['salaire'];
    $type = $_POST["type"];
    $image = $_FILES['image']['name'];

     // Échapper les valeurs pour éviter les injections SQL
  $titre = mysqli_real_escape_string($connexion, $titre);
  $description = mysqli_real_escape_string($connexion, $description);
  $domaine = mysqli_real_escape_string($connexion, $domaine);
  $competence = mysqli_real_escape_string($connexion, $competence);
  $datelimite = mysqli_real_escape_string($connexion, $datelimite);
  $salaire = mysqli_real_escape_string($connexion, $salaire);
  $type = mysqli_real_escape_string($connexion, $type);

  if($image == !null){
            
            $target_dir = "../assets/images";
            $image_path = $target_dir . "/" . basename($image);
            
            echo "exterieur de la boucle ";
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)){
                echo "interieur de la boucle ";

    $sql = "UPDATE offre set titre='$titre', description_offre = '$description', domaine = '$domaine', 
    competences = '$competence', date_limite = '$datelimite', salaire =  '$salaire', type_offre = '$type',photo = '$image_path'
    where id = $id";
    if (mysqli_query($connexion, $sql)) {
        echo 'modification réussit';
        header("Location: list.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erreur lors de l'inscription : " . mysqli_error($conn) . "</div>";
    }
}
}else{
    $sql = "UPDATE offre set titre='$titre', description_offre = '$description', domaine = '$domaine', 
    competences = '$competence', date_limite = '$datelimite', salaire =  '$salaire', type_offre = '$type'
    where id = $id";
    if (mysqli_query($connexion, $sql)) {
        echo 'modification réussit';
        header("Location: list.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erreur lors de l'inscription : " . mysqli_error($conn) . "</div>";
    }
}
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

    // Récupérez les anciennes valeurs de l'offre à partir de la base de données en utilisant l'identifiant
    $sql = "SELECT * FROM offre WHERE id = $idOffre";
    $result = $connexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Récupérez les anciennes valeurs de l'offre
        $ancienTitre = $row['titre'];
        $ancienneDescription = $row['description_offre'];
    $anciendomaine = $row['domaine'];
    $anciennecompetence = $row['competences'];
    $anciennedatelimite = $row['date_limite'];
    $anciensalaire = $row['salaire'];
    $ancientype = $row["type_offre"];
    $ancienneimage = $row['photo'];
        // Récupérez les autres valeurs nécessaires
        
        // Affichez le formulaire de modification avec les anciennes valeurs pré-remplies
        echo '<div class="formulaire edit_offre">';
        echo '<form  action="" method="POST" enctype="multipart/form-data">';
        echo '<h2>Nouvelle offre</h2>';
        echo '<input type="hidden" name="idOffre" value="'.$idOffre.'">'; // Incluez l'identifiant de l'offre dans un champ caché

        echo '<div><label for="">titre</label></div>';
        echo '<div><input type="text" id="titre" name="titre" value="'.$ancienTitre.'" required></div>';

        echo '<div><label for="">Description</label></div>';
        echo '<div><textarea name="description" id="description" required>'.$ancienneDescription.'</textarea></div>';

        echo '<div><label for="">Domaine </label></div>';
        echo '<div><input type="text" id="domaine" name="domaine" value="'.$anciendomaine.' " required></div>';

        echo '<div><label for="">Compétences</label></div>';
        echo '<div><input type="text" id="competence" name="competence" value="'.$anciennecompetence.'"  required></div>';

        echo '<div><label for="">Etrez le salaire (XAF) </label></div>';
        echo '<div><input type="text" id="salaire" name="salaire" value="'.$anciensalaire.'" ></div>';

        echo '<div><label for="">Choisissez une date limite</label></div>';
        echo '<div><input type="date" id="datelimite" name="datelimite" value="'.$anciennedatelimite.'"  required></div>';

        echo '<div><p>Type</p>';
        echo '<input type="radio" name="type" value="stage" id="stage"';
        if ($ancientype === 'stage') {
            echo ' checked';
        }
        echo '>';
        echo '<label for="stage">Stage</label>';

        echo '<input type="radio" name="type" value="emploi" id="emploi"';
        if ($ancientype === 'emploi') {
            echo ' checked';
        }
        echo '>';
        echo '<label for="emploi">Emploi</label></div>';
        echo '<div><label for="">Image </label></div>';

        echo '<div><input type="file" name="image" id="image" value="'.$ancienneimage.'" /></div>';

        // Affichez les autres champs du formulaire avec les anciennes valeurs

        echo '<div class="apply-btn" ><button >Modifier</button>';
        echo '<button ><a href="list.php">Annuler</a></div>'; 
        echo '</form>';
        echo '</div>';
    } else {
        echo "Offre non trouvée.";
        exit();
    }
} else {
    echo "ID de l'offre non spécifié.";
    exit();
}
?>

</body>
</html>
