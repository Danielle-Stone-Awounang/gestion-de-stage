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
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_reset = $_POST["password_reset"];
    $role = $_POST["role"];


    // Vérification des mots de passe
if ($password !== $password_reset) {
    echo "<div class='Les mots de passe ne correspondent pas.</div>";
} elseif 
(strlen($password) < 8  
// || !preg_match('/[0-9]/', $password_reset) || !preg_match('/[a-z]/', $password)||  !preg_match('/[A-Z]/', $password) || !preg_match('/[^\da-zA-Z]/', $password)
) { 
    
    echo "<div class='alert alert-danger'>Le mot de passe doit contenir au moins 8 caractères.</div>";
    // echo "Le mot de passe doit avoir au moins 8 caractères et contenir des nombres, des caractères accentués, des majuscules et des minuscules.";
} else {

    $hash = sha1($password);

    $sql = "INSERT INTO utilisateur (email, nom, nom_utilisateur, passwd,role_utilisateur) VALUES ('$email', '$nom', '$username', '$hash','$role')";
    if (mysqli_query($connexion, $sql)) {

            // Requête pour récupérer le mot de passe haché correspondant à l'email donné
$query = "SELECT * FROM utilisateur WHERE nom_utilisateur = '$username' and passwd ='$hash'";

$result = $connexion->query($query);

// Vérification du nombre de lignes retournées
if ($result->num_rows >= 1) {
    $row = $result->fetch_assoc();
    $_SESSION['id_utilisateur']= $row["id"];
    $_SESSION['role']= $row["role_utilisateur"];
    
    echo $_SESSION['role'];

    if($role === "employeur"){
        header("Location: ../entreprise/create.php?id={$_SESSION['id_utilisateur']}");
    }else{
        header("Location: ../connexion/acceuil.php");
        exit();
    }
    // header("Location: ../connexion/acceuil.php");
    //     exit();
} else {
    echo "<div class='alert alert-danger'>Nom d'utilisateur ou mot de passe incorrect.</div>";
}




       
        
    } else {
        echo "<div class='alert alert-danger'>Erreur lors de l'inscription : " . mysqli_error($conn) . "</div>";
    }
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
    <div class="formulaire signup container mt-4">

        
        <form action="" method="POST">
        <h2>Inscription</h2>
            <!-- Champs du formulaire d'inscription -->
            <div><label>Nom complet:</label></div>
            <div><input type="text" id="nom" name="nom" required></div>
            <div><label>Adresse email:</label></div>
            <div><input type="email" id="email" name="email" required></div>
            <div >
            <label>Êtes-vous un employeur ?</label><br>
            <input type="radio" name="role" value="employeur" id="employeur">
            <label for="employeur">Oui</label>
            <input type="radio" name="role" value="candidat" id="candidat">
            <label for="non-employeur">Non</label>
            </div>
            <div><label>Nom d'utitisateur:</label></div>
            <div><input type="text" id="username"  name="username" required></div>
            <div><label>Mot de passe:</label></div>
            <div><input type="password" id="password" name="password" required></div>
            <div><label>Réecrivrez votre mot de passe:</label></div>
            <div><input type="password" id="password_reset" name="password_reset" required></div>
            <!-- ... -->
            <div class="apply-btn" ><button type="submit" name="inscription" class="btn btn-primary">S'inscrire</button></div>
            <p>Vous avez déjà un compte ? <a href="../connexion/login.php">connexion</a></p>
        </form>
    </div>
</body>
</html>