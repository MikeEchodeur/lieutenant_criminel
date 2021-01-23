<nav class="navbar-expand-md">
    
    <div class="div_collapse">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
        <i class="fas fa-bars fa-lg"></i>
        </button>
        
    </div>
	
    <div class="collapse navbar-collapse justify-content-center" id="myNavbar">
        <a href="index.php">Accueil</a><br>
        <a href="index.php?action=rules">Règles d'engagement</a><br>
        <a href="index.php?action=contact">Contact</a><br>

        <!-- FAIRE APPARAITRE L'ADMINISTRATION DU SITE ICI-->
        <?php
        if (isset($_SESSION['groupe']) == 'admin') 
            { ?>
            <a href="view/backend/admin.php">Administration</a>
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
</nav>