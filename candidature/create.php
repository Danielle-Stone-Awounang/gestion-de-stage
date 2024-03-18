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

if (isset($_GET['id'])) {
    $idOffre = $_GET['id'];
        

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de l'inscription
    $nom = $_POST['nom'];
    $cv = $_FILES['cv']['name'];
    $lettre = $_FILES['lettre']['name'];
    $diplome = $_FILES['diplome']['name'];
    $date = date("Y-m-d");
    $id_utilisateur = $_SESSION['id_utilisateur'];

$target_dir = "../assets/fichiers";
$cv_path = $target_dir. "/" . basename($cv); 
$lettre_motivation_path = $target_dir. "/" . basename($lettre); 
$diplome_path = $target_dir. "/" . basename($diplome);
    
if (move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path) &&    
move_uploaded_file($_FILES['lettre']['tmp_name'], $lettre_motivation_path   &&   
move_uploaded_file($_FILES['diplome']['tmp_name'], $diplome_path))){

    $sql = "INSERT INTO candidature 
    (nom_candidat,cv,diplome,date_candidature,id_offre,id_utilisateur,lettre_motivation) 
    VALUES 
    ('$nom','$cv_path', '$diplome_path', '$date','$idOffre','$id_utilisateur','$lettre_motivation_path')";
    if (mysqli_query($connexion, $sql)) {
        echo 'insertion réussit';
        header("Location: list-candidat.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erreur lors de l'inscription : " . mysqli_error($conn) . "</div>";
    }
}
}}

// mysqli_close($conn);
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
'../connexion/navbar.php';?>
    <div class="formulaire create_candidature">

        
        <form action="" method="POST" enctype="multipart/form-data">
        <h2>Ma candidature</h2>
            <!-- Champs du formulaire d'inscription -->

            <div><label for="">Votre CV</label></div>
            <div><input type="file" size="2048"  name="cv" id="cv" required/></div>

            <div><label for="">Votre lettre</label></div>
            <div><input type="file" size="2048"   name="lettre" id="lettre" required/></div>

            <div><label for="">Ajoutez un diplome</label></div>
            <div><input type="file" name="diplome" id="diplome" size="2048"  required/></div>
            
            <div class="apply-btn" ><button type="submit" name="creer-offre" class="btn btn-primary">Ajouter</button></div>
        </form>
    </div>
</body>
</html>