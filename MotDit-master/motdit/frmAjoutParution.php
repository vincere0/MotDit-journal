<?php
require('../include/initialize.php');
require ('../include/bd_functions.php');
?>

<?php

    if(isset($_POST['submit']) AND $_FILES['photoParution']['error'] == 0)
    {
        echo "Aucune erreur détectée";
        if (isset($_FILES) AND $_FILES['photoParution']['size'] <= 6000000) //6Mo Max
        {
            $fichierInfos = pathinfo($_FILES['photoParution']['name']);

            $extension_upload = strtolower($fichierInfos['extension']);

            $extension_valides = array('jpg', 'jpeg', 'gif', 'png');

            if (in_array($extension_upload, $extension_valides))
            {
                echo "Extension de la photo validée";
                $nomFichier = md5(uniqid(rand(), true)) . '.' . $extension_upload;
                $name = PROJECT_PATH . "/images/photosParution/" . $nomFichier;
                move_uploaded_file($_FILES['photoParution']['tmp_name'], $name);

                echo "Photo enregistrée dans le bon dossier";

                if($_FILES['pdfParution']['error'] == 0)
                {
                    echo "Aucune erreur détectée";

                    if(isset($_FILES) AND $_FILES['pdfParution']['size'] <= 50000000) //50Mo Max
                    {
                        $parutionInfos = pathinfo($_FILES['pdfParution']['name']);

                        $extension_parution_upload = strtolower($parutionInfos['extension']);

                        $extension_parution_valide = array('pdf');

                        ini_set('post_max_size', '64M');
                        ini_set('upload_max_filesize', '64M');

                        if (in_array($extension_parution_upload, $extension_parution_valide))
                        {
                            echo "Extension pdf validée";
                            $nomFichierParution = md5(uniqid(rand(), true)) . '.' . $extension_parution_upload;
                            $nameParution = PROJECT_PATH . "/images/pdfParution/" . $nomFichierParution;
                            move_uploaded_file($_FILES['pdfParution']['tmp_name'], $nameParution);

                            echo "le pdf a été enregistrée dans le bon dossier";

                            $tempsParution = $_POST['tempsParution'];
                            $dateParution = $_POST['dateParution'];

                            insertParution($tempsParution, $dateParution, $nomFichier, $nomFichierParution);
                            insertOperation("Ajout d'une Parution");
                        }
                        else
                        {
                            echo "Extension de la parution non valide";
                        }
                    }
                    else
                    {
                        echo "Veuillez choisir un fichier de taille inférieure à 50Mo";
                    }
                }
                else
                {
                    "Une erreur s'est produite concernant le fichier pdf";
                    echo $_FILES['pdfParution']['error'];
                    echo $_FILES['pdfParution']['size'];
                }
            }
            else
            {
                echo "Extension de la photo non valide";
            }
        }
        else
        {
            echo "Veuillez choisir une photo dont la taille est inférieure à 6 Mo";
        }
    }
    else
    {
        echo "Une erreur est survenue! Veuillez réessayer";
    }
?>

<link rel="stylesheet" type="text/css" href="<?php echo(ASSETS_PATH_REF.'/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo(ASSETS_PATH.'/css/font-awesome.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo(ASSETS_PATH.'/css/animate.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo(ASSETS_PATH.'/css/font.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo(ASSETS_PATH.'/css/li-scroller.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo(ASSETS_PATH.'/css/slick.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo(ASSETS_PATH.'/css/jquery.fancybox.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo(ASSETS_PATH.'/css/theme.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo(ASSETS_PATH.'/css/style.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<body>
<div class="container">
    <?php include(INCLUDE_PATH.'/headerVisiteur.php'); ?>
    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea"> <span>Dernières Nouvelles</span>
                    <ul id="ticker01" class="news_sticker">
                        <li><a href="#"><img src="../images/news_thumbnail3.jpg" alt="">Nouvelle 1</a></li>
                        <li><a href="#"><img src="../images/news_thumbnail3.jpg" alt="">Nouvelle 2</a></li>
                        <li><a href="#"><img src="../images/news_thumbnail3.jpg" alt="">Nouvelle 3</a></li>
                        <li><a href="#"><img src="../images/news_thumbnail3.jpg" alt="">Nouvelle 4</a></li>
                        <li><a href="#"><img src="../images/news_thumbnail3.jpg" alt="">Nouvelle 5</a></li>
                        <li><a href="#"><img src="../images/news_thumbnail3.jpg" alt="">Nouvelle 6</a></li>
                        <li><a href="#"><img src="../images/news_thumbnail3.jpg" alt="">Nouvelle 7</a></li>
                        <li><a href="#"><img src="../images/news_thumbnail3.jpg" alt="">Nouvelle 8</a></li>
                        <li><a href="#"><img src="../images/news_thumbnail2.jpg" alt="">Nouvelle 9</a></li>
                    </ul>
                    <div class="social_area">
                        <ul class="social_nav">
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="flickr"><a href="#"></a></li>
                            <li class="pinterest"><a href="#"></a></li>
                            <li class="googleplus"><a href="#"></a></li>
                            <li class="vimeo"><a href="#"></a></li>
                            <li class="youtube"><a href="#"></a></li>
                            <li class="mail"><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>Ajouter une Parution</h2>
                        <form action="frmAjoutParution.php" method="POST" enctype="multipart/form-data">
                            <label for="tempsParution">Temps de la session</label>
                            <select name="tempsParution" required>
                                <option value="Hiver">Hiver</option>
                                <option value="Automne">Automne</option>
                                <option value="Été">Été</option>
                            </select>


                            <label for="dateParution">Date de la Parution</label>
                            <input type="date" name="dateParution" id="dateParution" required>
                            <br> <br>

                            <p>Choisissez une photo de la page couverture de la parution</p>
                            <input type="file" name="photoParution" required>
                            <br /><br />

                            <p>Choisissez le pdf de la parution</p>
                            <input type="file" name="pdfParution" required>
                            <br /><br />

                            <input type="submit" name="submit" value="Confirmation de la parution">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="latest_post">
                    <h2><span>Dernière Parution</span></h2>
                    <article>
                        <a href="http://www.lavoixdelaguerison.com/DATA/DOCUMENT/17.pdf"><img id="parution" src="../images/parution.jpg">  </a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <?php include(INCLUDE_PATH.'/footer.php'); ?>

</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/slick.min.js"></script>

<script src="../assets/js/jquery.li-scroller.1.0.js"></script>
<script src="../assets/js/jquery.newsTicker.min.js"></script>
<script src="../assets/js/jquery.fancybox.pack.js"></script>
<script src="../assets/js/custom.js"></script>

</body>
</html>