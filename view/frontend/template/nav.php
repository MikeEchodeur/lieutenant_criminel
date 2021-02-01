<nav class="navbar-expand-md">
    
    <div class="div_collapse">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
        <i class="fas fa-bars fa-lg"></i>
        </button>
        
    </div>
	
    <div class="collapse navbar-collapse justify-content-center" id="myNavbar">
        <a href="index.php">Articles</a><br>
        <a href="index.php?action=rules">Règles d'engagement</a><br>
        <a href="index.php?action=contact">Contact</a><br>

        <!-- FAIRE APPARAITRE L'ADMINISTRATION DU SITE ICI-->
        <?php
        if (isset($_SESSION['groupe']) == 'admin') 
            { ?>
            <a href="view/backend/admin.php">Administration</a> <br>
        <?php } ?>
        
        <?php 
        if ($_SESSION == NULL)
        {?>
            <a href="index.php?action=connexion">Connexion</a>
        <?php }
        else
        {?>
            <a href="index.php?action=disconnect">Déconnexion</a>
        <?php } ?>
    </div>
    <div class="picto_sociaux"> <!-- CI DESSOUS CSS DU RULEVIEW POUR LA COULEUR ET LA TAILLE DES PICTOGRAMMES -->
        <a href="https://www.facebook.com/moitiedemilouf/" target="_blank" class="share-fb"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com/lieutenant.criminel/" target="_blank" class="share-insta"><i class="fab fa-instagram"></i></a>
        <a href="youtube ???" class="share-youtube"><i class="fab fa-youtube"></i></a>
    </div>
</nav>