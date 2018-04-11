<?php
require_once('initialize.php');
require_once('bd_functions.php')
?>

<!DOCTYPE html>
<html>
<head>
  <title>Journal le MotDit</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="fb:app_id" content="{363174380752912}" />

  <link rel="stylesheet" type="text/css" href="<?php echo(url_for(ASSETS_PATH.'/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(url_for(ASSETS_PATH.'/css/font-awesome.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(url_for(ASSETS_PATH.'/css/animate.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(url_for(ASSETS_PATH.'/css/font.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(url_for(ASSETS_PATH.'/css/li-scroller.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(url_for(ASSETS_PATH.'/css/slick.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(url_for(ASSETS_PATH.'/css/jquery.fancybox.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(url_for(ASSETS_PATH.'/css/theme.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(url_for(ASSETS_PATH.'/css/style.css')); ?>">

  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5ab73c9bce89f000136418ad&product=inline-share-buttons"></script>

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<header id="header">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="header_top">
        <div class="header_top_left">
          <ul class="top_nav">
            <li><a href="index.html">Mot de Bienvenue</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/propos.php')); ?>">À propos de Nous</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/contact.php')); ?>">Nous Rejoindre</a></li>
          </ul>
        </div>
        <div class="header_top_right">
          <p>
            <?php

            $nom_jour_fr = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
            $mois_fr = Array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août",
                "Septembre", "Octobre", "Novembre", "Décembre");
            // on extrait la date du jour
            list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));
            echo $nom_jour_fr[$nom_jour].', '.$jour.' '.$mois_fr[$mois].' '.$annee;

            ?>

          </p>
        </div>
      </div>
    </div>
  </div>
</header>
<section id="presentation">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <img id="logo"  src="<?php echo(url_for(IMAGES_PATH.'/motdit_logo.jpg')); ?>">
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <?php
        if(isset($_SESSION["username"]))
        {
          echo '<h1>' . "Bienvenue " . $_SESSION["username"] . '</h1>';
        }
        else
        {
          echo '<h1>' . "Bienvenue à tous!" . '</h1>';
        }

        if(isset($_SESSION['type']) && ($_SESSION['type'] == 1 || $_SESSION['type'] == 0))
        {
          echo '<h3>' . $_SESSION["poste"] . '</h3>';
        }
        else if(isset($_SESSION['type']) && $_SESSION['type'] == 2)
        {
          echo '<h3>' . "Membre" . '</h3>';
        }
        else
        {
          echo '<h3>' . "Visiteur" . '</h3>';
        }

        ?>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus porttitor lorem id lorem dapibus, dapibus congue metus aliquet. Donec sapien odio, ultrices quis dui sed, pharetra interdum orci. Phasellus in.</p>

    </div>
  </div>
</section>
<section id="navArea">
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
      <button style="float: none;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav main_nav">
        <li class="active"><a href="<?php echo(url_for(PROJECT_PATH.'/index.php')); ?>">Actualité</a></li>
        <li class="dropdown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=8')); ?>" class="dropdown-toggle" aria-expanded="false">Cégep</a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=4')); ?>">Lynx</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=30')); ?>">Vie Étudiante</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=31')); ?>">Associations</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=32')); ?>">Agecem</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=33')); ?>">Publicités</a></li>
          </ul>
        </li>
        <li class="dropdown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=9')); ?>" class="dropdown-toggle" role="button" aria-expanded="false">International</a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=24')); ?>">Politique</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=7')); ?>">Économie</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=25')); ?>">Éducation</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=26')); ?>">Santé</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=27')); ?>">Sciences</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=13')); ?>">Affaires</a></li>
          </ul>
        </li>
          <li class="dropdown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=1')); ?>" class="dropdown-toggle" role="button" aria-expanded="false">Divertissement</a>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=3')); ?>">Sports</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=2')); ?>">Cinéma</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=6')); ?>">Spectacles</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=15')); ?>">Arts</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=16')); ?>">Voyages</a></li>
              </ul>
          </li>
        <li class="dropdown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=10')); ?>" class="dropdown-toggle" role="button" aria-expanded="false">Opinions</a></li>
          <li class="dropdown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=14')); ?>" class="dropdown-toggle" role="button" aria-expanded="false">Technologie</a></li>
          <li class="dropdown"> <a style="cursor: hand" class="dropdown-toggle" role="button" aria-expanded="false">Jeux</a>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=17')); ?>">Horoscope</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=18')); ?>">Mots croisés</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=19')); ?>">Sudoku</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=20')); ?>">Différences</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=34')); ?>">Poésie</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=21')); ?>">Caricatures</a></li>
                  <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=22')); ?>">Concours</a></li>
              </ul>
          </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Informations</a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Nos membres</a></li>
            <li><a href="#">Nos Archives</a></li>
          </ul>
        </li>


        <?php

        if(isset($_SESSION['type']) && $_SESSION['type'] == 2)
        { ?>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mon Compte</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Mes Articles Favoris</a></li>
              <li><a href="<?php echo(url_for(CONTROLLER_PATH.'/deconnection.php')) ?>">Me Déconnecter</a></li>
            </ul>
          </li>
        <?php }
        else if(isset($_SESSION['type']) && $_SESSION['type'] == 1)
        { ?>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mon Compte</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Mes Articles Favoris</a></li>
              <li><a href="#">Ajouter un Article</a></li>
              <li><a href="<?php echo(url_for(CONTROLLER_PATH.'/deconnection.php')) ?>">Me Déconnecter</a></li
              >
            </ul>
          </li>
        <?php }
        else if(isset($_SESSION['type']) && $_SESSION['type'] == 0)
        { ?>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mon Compte</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Mes Articles Favoris</a></li>
                <li><a href="<?php echo(url_for(MOTDIT_PATH.'/frmAjoutArticle.php')); ?>">Ajouter un Article</a></li>
                <li><a href="<?php echo(url_for(MOTDIT_PATH.'/frmAjoutCategorie.php')); ?>">Ajouter une Catégorie</a></li>
                <li><a href="<?php echo(url_for(MOTDIT_PATH.'/frmAjoutParution.php')); ?>">Ajouter une Parution</a></li>
                <li><a href="<?php echo(url_for(MOTDIT_PATH.'/frmInscription.php')); ?>">Ajouter un Utilisateur</a></li>
                <li><a href="<?php echo(url_for(MOTDIT_PATH.'/frmInscriptionCA.php')); ?>">Ajouter un Membre de CA</a></li>
                <li><a href="#">Modifier un Article</a></li>
                <li><a href="#">Modifier une Catégorie</a></li>
                <li><a href="#">Modifier une Parution</a></li>
                <li><a href="#">Modifier un Utilisateur</a></li>
                <li><a href="#">Modifier un Membre de CA</a></li>
                <li><a href="#">Supprimer un Article</a></li>
                <li><a href="#">Supprimer une Catégorie</a></li>
                <li><a href="#">Supprimer une Parution</a></li>
                <li><a href="#">Supprimer un Utilisateur</a></li>
                <li><a href="#">Supprimer un Membre de CA</a></li>
              <li><a href="<?php echo(url_for(CONTROLLER_PATH.'/deconnection.php')) ?>">Me Déconnecter</a></li> // bug déconnection
            </ul>
          </li>
        <?php }
        else{ ?>
          <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Se connecter</button>
        <?php   }
        ?>




        <div id="id01" class="modal">

          <form id="login" class="modal-content animate" method="POST" action="<?php echo(url_for(CONTROLLER_PATH.'/connection_controller.php')) ?>">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <img src="<?php echo(url_for(IMAGES_PATH.'/motdit_logo.jpg')); ?>" alt="Avatar" class="avatar">
            </div>

            <div class="container" id="infosUtilisateurs">
              <label><b>Nom d'utilisateur</b></label>
              <input class="connectionField" type="text" placeholder="Enter Username" name="uname" required>

              <label><b>Mot de Passe</b></label>
              <input class="connectionField" type="password" placeholder="Enter Password" name="psw" required>

              <button type="submit" name="submit">Se connecter</button>
            </div>

            <div class="container" style="background-color:#f1f1f1" id="infosBoutons">
              <button type="button" onclick="window.location.href='<?php echo(url_for(MOTDIT_PATH.'/frmMotPasseOublie.php')) ?>'" class="forgetPassword">Mot de passe oublié?</button>
              <button type="button" onclick="window.location.href='<?php echo(url_for(MOTDIT_PATH.'/frmInscription.php')) ?>'" id="inscription" >Pas encore inscrit?</button>
            </div>
          </form>
        </div>

        <script>
          // Get the modal
          var modal = document.getElementById('id01');

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }
        </script>

      </ul>
    </div>
  </nav>
</section>
<section id="newsSection">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="latest_newsarea"> <span>Dernières Nouvelles</span>
                <ul id="ticker01" class="news_sticker">
                    <?php
                    $tickers = get9Ticker();
                    foreach($tickers as $ticker) : ?>
                        <li><a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php?articleID='.$ticker['articleID'])); ?>"><img src="<?php echo(url_for(IMAGES_PATH.'/photosArticle/'.$ticker['cheminImage'])) ?>" alt="" id="<?php echo($ticker['articleID']) ?>"><?php echo($ticker['titre']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="social_area">
                    <ul class="social_nav">
                        <li class="facebook"><a href="https://www.facebook.com/journalmotdit/"></a></li>
                        <li class="googleplus"><a href="https://plus.google.com/112481655216612635500"></a></li>
                        <li class="youtube"><a href="https://www.youtube.com/channel/UCPPN8QUJytrTrZjaeGFQTzA"></a></li>
                        <li class="mail"><a href="<?php echo(url_for(MOTDIT_PATH.'/contact.php')); ?>"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
