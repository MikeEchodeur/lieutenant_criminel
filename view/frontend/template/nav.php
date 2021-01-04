<nav>
	<a href="index.php">Accueil</a></br>
    <a href="index.php?action=rules">Règles d'engagement</a><br />
    <a href="index.php?action=contact">Contact</a><br />
    <?php 
    if ($_SESSION == NULL)
    {?>
        <a href="index.php?action=connexion">Connexion</a>
    <?php }
    else
    {?>
        <a href="index.php?action=disconnect">Déconnexion</a>
    <?php } ?>
</nav>