<!DOCTYPE html>
<html>
<head>
                <meta charset="utf-8" />

                <!-- ############# FAVICON ############ -->
                <link rel="icon" href="public/image/favicon/favicon-32x32.png" />
                <!-- ###################################### -->
                
                <title><?= $title ?></title>
                <link href="public/cs/style.css" rel="stylesheet" /> 
            </head>

    <!--    FACEBOOK    -->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v8.0" nonce="56uyCiBA"></script>

    <body>
        <div class="alignement">
            
            <header class="banniere">
                <a href="home.php"><img src="public/image/banner-me.jpg" alt="Banniere du site" /></a>
            </header>

            <div class="position-under_banniere">
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