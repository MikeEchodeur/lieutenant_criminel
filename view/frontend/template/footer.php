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
                <span class="fas fa-chevron-up"></span>
        </a><br><br>
        <div id="copyright">
    	© Copyright Agneugneu LifeStyle - 2021 | Conception by <a href="https://www.nuoma.fr">Nuoma</a>
        </div>
    </p>
</footer>