

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
            echo '<a href="../candidature/create.php?id='.$_SESSION['idOffre'].'">Postuler</a>';
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
