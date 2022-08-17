<nav class="navbar-expand-md">
    
    <div class="div_collapse">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
        <i class="fas fa-bars fa-lg"></i>
        </button>
    </div>
	
    <div class="collapse navbar-collapse justify-content-center" id="myNavbar">
        <li><a href="https://www.agneugneu-lifestyle.com" target="_blank">Boutique</a></li><br>
        <li><a href="index.php?action=rules">Règles d'engagement</a></li><br>
        <li><a href="index.php?action=partenaires">Partenaires</a></li><br>
    </div>

    <div class="userNavbar">
        <li><a href="index.php?action=contact">Contacts</a></li><br>

        <!-- FAIRE APPARAITRE L'ADMINISTRATION DU SITE ICI-->
        <?php
        if (isset($_SESSION['groupe']) == 'admin') 
            { ?>
            <li><a href="view/backend/admin.php">Administration</a></li><br>
        <?php } ?>
        
        <?php 
        if ($_SESSION == NULL)
        {?>
            <li><a href="index.php?action=connexion">Connexion</a></li>
        <?php }
        else
        {?>
            <li><a href="index.php?action=disconnect">Déconnexion</a></li>
        <?php } ?>
    </div>
</nav>