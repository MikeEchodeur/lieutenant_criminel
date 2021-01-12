<footer>
    <p>
        <!-- FAIRE APPARAITRE L'ADMINISTRATION DU SITE ICI-->
        <?php
        if (isset($_SESSION['groupe']) == 'admin')
        { ?>
            <a href="view/backend/admin.php">Administration</a>
        <?php
        } ?>
        <a href="# ">
                <span style="color: white; margin-left: 50%;" class="fas fa-chevron-up"></span>
        </a><br><br>
    	© Copyright Agneugneu LifeStyle - 2021 | Conception by <a style="text-decoration: underline; color: white;" href="https://www.nuoma.fr">Nuoma</a>
    </p>
</footer>