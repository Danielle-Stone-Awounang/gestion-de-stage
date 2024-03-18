<nav class="navbar navbar_style navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../assets/images/logo.png" class="logo_nav" alt="j_intern">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../connexion/acceuil.php">Accueil</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../candidature/list-candidat.php">Mes candidatures</a>
            </li>
          <?php if ($_SESSION['role'] === 'employeur'): ?>
            <li class="nav-item">
              <a class="nav-link" href="../offre/create.php">créer une offre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../offre/list.php">les offres</a>
            </li>
          <?php endif; ?>
        </ul>
        <ul class="navbar-nav ms-auto">
        <div class="img_candidat">
        
        <li class="nav-item">
          <a class="nav-link" href="../connexion/logout.php">Se déconnecter</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="">
            <?php if ($_SESSION['profil'] === null): ?>
              <img src="../assets/images/user.png"></img>
            <?php else: $profil = $_SESSION['profil'];?>
              <img src="$profil"></img>
            <?php endif; ?>
          </a>
        </li> -->
        
          <!-- <li class="nav-item dropdown">
            
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Mon compte</a></li>
              <?php if ($_SESSION['role'] === 'candidat'): ?>
                <li><a class="dropdown-item" href="#">Devenir employeur</a></li>
              <?php endif; ?>
              <li><a class="dropdown-item" href="#">Modifier le compte</a></li>
              <li><a class="dropdown-item" href="#">Supprimer le compte</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Se déconnecter</a></li>
            </ul>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
<!-- 
  <nav>
       <div class="logo">
           <img src="">logo
       </div>
       <ul class="nav">
           <li >
                <a href="../connexion/acceuil.php">
                    Acceuil
                </a>
           </li>
           <li >
           <a class="" href="../candidature/list-candidat.php">Mes candidatures</a>
           </li>
           <li >
                <a  href="../candidat/candidatures.php">
                    Mes Candidatures
                </a>
           </li>
           <?php if ($_SESSION['role'] === 'employeur'): ?>
            <li class="">
              <a class="" href="../offre/create.php">créer une offre</a>
            </li>
            <li class="">
              <a class="" href="../offre/list.php">les offres</a>
            </li>
          <?php endif; ?>
           <ul>
            <li>
            <a class="" href="../connexion/logout.php">Se déconnecter</a>
            </li>
            <?php if ($_SESSION['role'] === 'candidat'): ?>
              <?php endif; ?>
           </ul>
       </ul>
   </nav> -->