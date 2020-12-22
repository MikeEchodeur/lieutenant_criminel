<!DOCTYPE html>
<html>

    <!--    FACEBOOK    -->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v8.0" nonce="56uyCiBA"></script>

    <body>
        <div class="alignement">
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
                <link href="public/cs/style.css" rel="stylesheet" /> 
            </head>

            <header class="banniere">
                <a href="home.php"><img src="public/image/banner-me.jpg" alt="Banniere du site" /></a>
            </header>

            <div class="position-under_banniere">
               	<nav>
            		<a href="home.php">Accueil</a></br>
                    <a href="home.php?action=rules">Règles d'engagement</a><br />
                    <a href="home.php?action=contact">Contact</a><br />
                    <?php 
                    if ($_SESSION == NULL)
                    {?>
                        <a href="home.php?action=connexion">Connexion</a>
                    <?php }
                    else
                    {?>
                        <a href="home.php?action=disconnect">Déconnexion</a>
                    <?php } ?>
                </nav>
                    
                <div class="body&FB">
                    <section class="page">
                        <?= $content ?>
                    </section>

                    <section class="fb-page">
                        <a href="https://www.facebook.com/moitiedemilouf/">PAGE OFFICIELLE</a><br />
                        <br />
                        <div class="fb-page" data-href="https://www.facebook.com/moitiedemilouf" data-tabs="timeline" data-width="250" data-height="750" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/moitiedemilouf" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/moitiedemilouf">MIKE ECHO</a>
                            </blockquote>
                        </div>
                    </section>
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
                    	©copyright Agneugneu LifeStyle
                    </p>
                </footer>
            </div>
            
        </div>

    </body>
</html>