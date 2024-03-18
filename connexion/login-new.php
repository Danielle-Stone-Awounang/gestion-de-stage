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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hash = sha1($password);

    // Requête pour récupérer le mot de passe haché correspondant à l'email donné
$query = "SELECT * FROM utilisateur WHERE nom_utilisateur = '$username' and passwd ='$hash'";

$result = $connexion->query($query);

// Vérification du nombre de lignes retournées
if ($result->num_rows >= 1) {
    $row = $result->fetch_assoc();
    $_SESSION['id_utilisateur']= $row["id"];
    $_SESSION['role']= $row["role_utilisateur"];
    
    echo $_SESSION['role'];
    // if($_SESSION['role']="employeur"){
    //     $id_utilisateur = $_SESSION['id_utilisateur'];
    //     $query2 = "SELECT * FROM entreprise WHERE id_utilisateur = '$id_utilisateur'";
    //     $result2 = $connexion->query($query2);
    //     if ($result2->num_rows >= 1){
    //         $row = $result2->fetch_assoc();
    //         $_SESSION['id_entreprise']= $row["id"];
    //     }
    // }
    header("Location: ../candidature/create.php?id={$_SESSION['idOffre']}");
        exit();
} else {
    echo "<div class='alert alert-danger'>Nom d'utilisateur ou mot de passe incorrect.</div>";
}

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
  <link rel="stylesheet" type="text/css" href="../styles.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>
    <div class="formulaire container mt-4">
        
        <form action="" method="POST">
        <h2>Connexion</h2>
            <!-- Champs du formulaire de connexion -->
            <div><input type="text" id="username" placeholder="Entrez votre nom d'utilisateur" name="username" required></div>
            <div><input type="password" id="password" placeholder="Entrez un mot de passe" name="password" required></div>
            <!-- ... -->
            <div class="apply-btn" ><button type="submit" name="connexion" class="btn btn-primary">Se connecter</button></div>
        <p>Vous n'avez pas de compte ? <a href="signup.php">inscription</a></p>
        </form>

    </div>
</body>
</html>