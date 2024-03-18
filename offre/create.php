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

        $id_utilisateur = $_SESSION['id_utilisateur'];
        $query2 = "SELECT * FROM entreprise WHERE id_utilisateur = '$id_utilisateur'";
        $result2 = $connexion->query($query2);
        if ($result2->num_rows >= 1){
            $row = $result2->fetch_assoc();
            $_SESSION['id_entreprise']= $row["id"];
            $id_entreprise = $_SESSION['id_entreprise'];
        }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de l'inscription
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $domaine = $_POST['domaine'];
    $competence = $_POST['competence'];
    $datelimite = $_POST['datelimite'];
    $salaire = $_POST['salaire'];
    $type = $_POST["type"];
    $image = $_FILES['image']['name'];
    
    $id_entreprise = $_SESSION['id_entreprise'];
    
        
    

     // Échapper les valeurs pour éviter les injections SQL
  $titre = mysqli_real_escape_string($connexion, $titre);
  $description = mysqli_real_escape_string($connexion, $description);
  $domaine = mysqli_real_escape_string($connexion, $domaine);
  $competence = mysqli_real_escape_string($connexion, $competence);
  $datelimite = mysqli_real_escape_string($connexion, $datelimite);
  $salaire = mysqli_real_escape_string($connexion, $salaire);
  $type = mysqli_real_escape_string($connexion, $type);
  $id_entreprise = mysqli_real_escape_string($connexion, $_SESSION['id_entreprise']);
            
            $target_dir = "../assets/images";
            $image_path = $target_dir . "/" . basename($image);
            
            echo "exterieur de la boucle ";
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)){
                echo "interieur de la boucle ";

    $sql = "INSERT INTO offre 
    (titre,description_offre,domaine,competences,date_limite,salaire,type_offre,photo,id_entreprise) 
    VALUES 
    ('$titre','$description', '$domaine', '$competence','$datelimite','$salaire','$type','$image_path','$id_entreprise')";
    if (mysqli_query($connexion, $sql)) {
        echo 'insertion réussit';
        header("Location: list.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erreur lors de l'inscription : " . mysqli_error($conn) . "</div>";
    }
}
}

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
    <div class="formulaire create_offre">

        
        <form action="" method="POST" enctype="multipart/form-data">
        <h2>Nouvelle offre</h2>
            <!-- Champs du formulaire d'inscription -->
            <div><label for="">titre de l'offre</label></div>
            <div><input type="text" id="titre" name="titre" required></div>

            <div><label for="">Description</label></div>
            <div><textarea name="description" id="description"  required></textarea></div>

            <div><label for="">Dans quel domaine s'étent-il?</label></div>
            <div><input type="text" id="domaine" name="domaine" required></div>

            <div><label for="">Quelles compétences recherchez-vous?</label></div>
            <div><input type="text" id="competence" name="competence" required></div>

            <div><label for="">Choisissez une date limite</label></div>
            <div><input type="date" id="datelimite" name="datelimite" required></div>

            <div>
                <p>De quel type d'offre sagit-il? ?</p>
                <input type="radio" name="type" value="stage" id="stage">
                <label for="employeur">Stage</label>
                <input type="radio" name="type" value="emploi" id="emploi">
                <label for="non-employeur">Emploi</label>
            </div>

            <div><label for="">Etrez le salaire (XAF) </label></div>
            <div><input type="text" id="salaire" name="salaire" ></div>

            <div><label for="">Choisissez une image représentative : </label></div>
            <div><input type="file" name="image" id="image" /></div>
            
            <div class="apply-btn" ><button type="submit" name="creer-offre" class="btn btn-primary">Ajouter</button></div>
        </form>
    </div>
</body>
</html>