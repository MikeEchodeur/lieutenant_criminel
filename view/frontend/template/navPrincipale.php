<nav class="navbarHome">
	
    <div class="navbarHome__user">
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

    <div class="navbarHome__menu">
        <button type="button" class="navbarHome__menu__collapse">
            <i class="material-icons" style="font-size:36px">menu</i>
        </button>
        <div class="navbarHome__menu__list">
            <li><a href="https://www.agneugneu-lifestyle.com" target="_blank">Boutique</a></li><br>
            <li><a href="index.php?action=rules">Règles d'engagement</a></li><br>
            <li><a href="index.php?action=partenaires">Partenaires</a></li><br>
        </div>
        
    </div>
    <script type="text/javascript" src="public/js/navPrincipale.js"></script>
</nav>