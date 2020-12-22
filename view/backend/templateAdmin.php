<!DOCTYPE html>
<html>
    <body>
        <head>
            <meta charset="utf-8" />

            <!-- ############# FAVICON ############ -->
            <link rel="apple-touch-icon" sizes="57x57" href="public/image/favicon/apple-icon-57x57.png">
            <link rel="apple-touch-icon" sizes="60x60" href="public/image/favicon/apple-icon-60x60.png">
            <link rel="apple-touch-icon" sizes="72x72" href="public/image/favicon/apple-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="76x76" href="public/image/favicon/apple-icon-76x76.png">
            <link rel="apple-touch-icon" sizes="114x114" href="public/image/favicon/apple-icon-114x114.png">
            <link rel="apple-touch-icon" sizes="120x120" href="public/image/favicon/apple-icon-120x120.png">
            <link rel="apple-touch-icon" sizes="144x144" href="public/image/favicon/apple-icon-144x144.png">
            <link rel="apple-touch-icon" sizes="152x152" href="public/image/favicon/apple-icon-152x152.png">
            <link rel="apple-touch-icon" sizes="180x180" href="public/image/favicon/apple-icon-180x180.png">
            <link rel="icon" type="image/png" sizes="192x192"  href="public/image/favicon/android-icon-192x192.png">
            <link rel="icon" type="image/png" sizes="32x32" href="public/image/favicon/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="96x96" href="public/image/favicon/favicon-96x96.png">
            <link rel="icon" type="image/png" sizes="16x16" href="public/image/favicon/favicon-16x16.png">
            <link rel="manifest" href="public/image/favicon/manifest.json">
            <meta name="msapplication-TileColor" content="#ffffff">
            <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
            <meta name="theme-color" content="#ffffff">
            <link rel="shortcut icon" type="image/x-icon" href="public/image/favicon.ico" />
            <!-- ###################################### -->
            
            <title><?= $title ?></title>
            <link href="../../public/cs/adminStyle.css" rel="stylesheet" />
        </head>

        <div class="dispoHead">
            <header>
        		<a href="admin.php"><img src="../../public/image/Mike-echologo.png" alt="Banniere du site" width="150" height="150" /></a>
            </header>

           	<nav>
                <a href="admin.php">Accueil Admin</a></br>
        		<a href="admin.php?action=articles">Gestion des articles</a></br>
            </nav>

            <header>
                <a href="admin.php"><img src="../../public/image/Mike-echologo.png" alt="Banniere du site" width="150" height="150" /></a>
            </header>
            
            <a href="../../home.php">
                <div class="backToWebSite">Retour au site</div>
            </a></br>
           

        </div>
            
        <section class="contenu">
            <?= $content ?>
        </section>

        <footer>
        	©copyright Agneugneu LifeStyle
        </footer>
    </body>
</html>