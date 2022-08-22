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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" type="image/x-icon" href="public/image/favicon.ico" />

    <!-- ################## OPEN GRAPH pour reseau sociaux #################### -->

    <meta property="og:image" content="<?= $ogImage?>" />
    <meta property="og:image:secure_url" content="<?= $ogImage?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:title" content="<?= $title?>"/>
    <meta property="og:description" content="<?php $ogContent?>"/>
    
    <title><?= $title ?></title>

    <!-- AJOUT LIBRAIRIE POUR BOOTSTRAP POUR LE COLLAPSE -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" > 
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="public/js/script.js"></script>
    <link href="public/css/style.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">  <!-- Ajout police type Militaire -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- Ajout des favicons --> 

    <!-- JavaScript de MikeEcho -->
    <script type="text/javascript" src="lePetitFdp.js"></script>
</head>

    <!--    FACEBOOK    -->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v8.0" nonce="56uyCiBA"></script>

    <!-- LINK pour icone du site -->
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- ############################ -->

    <body id=" ">

        <?php include("navPrincipale.php"); ?>

        <header class="banniere">
            <a href="index.php">
            	<h1 media="(min-width: 800px)" style="text-transform:uppercase">Mike Echo</h1>
                <picture>
                    <source media="(max-width: 799px" srcset="public/image/mike-echo_fb.jpg">
                    <source media="(min-width: 800px)" srcset="public/image/banner-me.jpg">
                    <img src="public/image/Mike-echologo.png" alt="Banniere du site">
                </picture>
            </a>
        </header>

        <?php include("nav.php"); ?>

        <section class="select_block">
            <?= $content ?>
        </section>

        <?php include("footer.php"); ?>

    </body>
</html>