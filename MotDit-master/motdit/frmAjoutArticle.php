<?php
require('../include/initialize.php');
require ('../include/bd_functions.php');
?>

<?php

    if(isset($_POST['submit']) AND $_FILES['photo']['error'] == 0)
    {
        if(isset($_FILES) AND $_FILES['photo']['size'] <= 6000000) //6Mo Max
        {
            $fichierInfos = pathinfo($_FILES['photo']['name']);

            $extension_upload = strtolower($fichierInfos['extension']);

            $extension_valides = array('jpg', 'jpeg', 'gif', 'png');

            ini_set('post_max_size', '64M');
            ini_set('upload_max_filesize', '64M');

            if(in_array($extension_upload, $extension_valides))
            {
                $nomFichier = md5(uniqid(rand(), true)). '.' .$extension_upload;


                $name = PROJECT_PATH."/images/photosArticle/".$nomFichier;
                move_uploaded_file($_FILES['photo']['tmp_name'], $name);

                $titreArticle = htmlspecialchars($_POST['titreArticle']);
                $texteArticle = htmlspecialchars($_POST['texteArticle']);
                $auteurArticle = $_POST['auteur'];
                $categorieArticle = $_POST['categorie'];
                $parution = $_POST['tempsParution'];
                $citationArticle = htmlspecialchars($_POST['citation']);
                insertArticle($titreArticle, $texteArticle, $auteurArticle, $categorieArticle, $parution, $citationArticle, $nomFichier);
                insertOperation("Ajout d'un article");
            }
            else
            {
                echo "L'ajout de l'article n'a pas fonctionné";
            }
        }
        else {
            echo "Une erreur est survenue";
        }
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
<html>
<body>
<div class="container">
    <?php include(INCLUDE_PATH.'/headerVisiteur.php'); ?>
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>Ajouter un Article</h2>
                        <form action="frmAjoutArticle.php" method="POST" enctype="multipart/form-data">
                            <input class="form-control" type="text" id="titreArticle" name="titreArticle" placeholder="Titre de l'article" required>
                            <textarea class="form-control" rows="10" name="texteArticle" placeholder="Placer le contenu de l'article ici" required></textarea> <br>
                            <?php $auteurs = getAllAuteur(); ?>
                            <label for="nomAuteur">Nom de l'auteur</label>
                            <select class="form-control" name="auteur">
                            <?php foreach ($auteurs as $auteur) {?>
                                    <option value="<?php echo $auteur['auteurID']?>"><?php echo $auteur['prenom'].' '.$auteur['nom'] ?></option>
                            <?php } ?>
                            </select>

                            <br> <br>

                            <?php $categories = getAllCategorie(); ?>
                            <label for="nomCategorie">Catégorie de l'article</label>
                            <select class="form-control" name="categorie">
                                <?php foreach ($categories as $category) {?>
                                    <option value="<?php echo $category['categorieID']?>"><?php echo $category['nom'] ?></option>
                                <?php } ?>
                            </select>

                            <br> <br>

                            <?php $parutions = getAllParution(); ?>
                            <label for="tempsParution">Parution de l'article</label>
                            <select class="form-control" name="tempsParution">
                                <?php foreach ($parutions as $parution) {?>
                                    <option value="<?php echo $parution['parutionID']?>"><?php echo $parution['dateParution']." - ".$parution['tempsParution'] ?></option>
                                <?php } ?>
                            </select>

                            <br> <br>



                            <textarea class="form-control" rows="5" cols="50" name="citation" placeholder="Insérez ici une citation s'il y a lieu"></textarea>
                            <br>

                            <p>Choisissez une photo avec une taille inférieure à 6 M0.</p>
                            <input class="btn_filtre" type="file" name="photo">
                            <br /><br />

                            <input class="btn_filtre" type="submit" name="submit" value="Confirmation de l'ajout de l'article">
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