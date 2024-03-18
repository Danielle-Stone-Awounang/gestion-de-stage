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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de l'inscription
    $description = $_POST['description'];
    $nom = $_POST['nom'];
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $industrie = $_POST['industrie'];


    $sql = "INSERT INTO entreprise (description_entreprise, nom, industrie, id_utilisateur) VALUES ('$description', '$nom', '$industrie','$id_utilisateur')";
    if (mysqli_query($connexion, $sql)) {
        header("Location: ../connexion/acceuil.php");
        exit();
        
    } else {
        echo "<div class='alert alert-danger'>Erreur lors de l'inscription : " . mysqli_error($conn) . "</div>";
    }

}

// mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
  <link rel="stylesheet" type="text/css" href="../styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="formulaire container mt-4">

        
        <form action="" method="POST">
        <h2>Renseignez votre entreprise</h2>
            <!-- Champs du formulaire d'inscription -->
            <div><label>Nom de l'entreprise:</label></div>
            <div><input type="text" id="nom" name="nom" required></div>
            <div><label>Industrie:</label></div>
            <div><input type="text" id="industrie" name="industrie" required></div>
            <div >
            <label>Description:</label><br>
            <textarea name="description" id="description"  required></textarea>
            </div>
            <!-- ... -->
            <div class="apply-btn" ><button type="submit" name="ajout" class="btn btn-primary">Créer</button></div>
        </form>
    </div>
</body>
</html>