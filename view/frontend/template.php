<!DOCTYPE html>
<html>
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
                <link href="public/css/style.css" rel="stylesheet" /> 
            </head>

    <body>
            
            <header class="banniere">
                <a href="index.php"><img src="public/image/banner-me.jpg" alt="Banniere du site" /></a>
            </header>

            <div class="main_block">
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
                    
                <div class="bodyAndFb">
                    <section class="select_block">
                        <?= $content ?>
                    </section>

                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmoitiedemilouf&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>


                <footer>
                    <p>
                        <!-- FAIRE APPARAITRE L'ADMINISTRATION DU SITE ICI-->
                        <?php
                        if (isset($_SESSION['groupe']) == 'admin')
                        { ?>
                            <a href="view/backend/admin.php">Administration</a>
                        <?php
                        } ?>
                    	© Copyright Agneugneu LifeStyle
                    </p>
                </footer>
            </div>
            

    </body>
</html>