<footer>
    <p>
        <!-- FAIRE APPARAITRE L'ADMINISTRATION DU SITE ICI-->
        <?php
        if (isset($_SESSION['groupe']) == 'admin')
        { ?>
            <a href="view/backend/admin.php">Administration</a>
        <?php
        } ?>
    	©copyright Agneugneu LifeStyle
    </p>
</footer>