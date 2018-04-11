<?php
require('../include/initialize.php');
require ('../include/bd_functions.php');
?>

<?php

if(isset($_POST['submit']))
{
    $nomCategorie = htmlspecialchars($_POST['nomCategorie']);
    insertCategorie($nomCategorie);
    insertOperation("Ajout d'une catégorie");
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
                        <h2>À propos de nous</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed pharetra ex. Donec sollicitudin mattis lorem eu hendrerit. Vivamus placerat leo eget justo vulputate condimentum. Mauris non volutpat risus, eu consequat purus. Donec vel maximus mi. Pellentesque rhoncus sollicitudin turpis, sed tempor risus venenatis sit amet. Proin a purus laoreet, imperdiet turpis non, eleifend metus. Praesent magna eros, vehicula facilisis placerat vestibulum, finibus id dui. Mauris efficitur fringilla dapibus.

                            <br> <br>

                            Suspendisse facilisis odio eget ligula facilisis, vestibulum gravida ante commodo. Sed non viverra nisl. Etiam ac turpis metus. Cras aliquet nunc nec magna accumsan, nec consectetur erat volutpat. Mauris imperdiet augue sem, tempor dictum diam gravida in. Nam sit amet libero vitae velit faucibus lobortis eleifend et lacus. Praesent elementum massa a turpis tempor bibendum. Aliquam eleifend fringilla velit sed imperdiet. Quisque neque neque, fringilla at pharetra quis, tempor sit amet massa. Curabitur facilisis sapien non pharetra luctus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut interdum, enim in fermentum pharetra, ex libero aliquam quam, ut placerat lorem lacus ac nisl. Proin in lacus quis ipsum pellentesque bibendum. In rutrum dictum sapien, vitae semper risus tempor ut. In ac lacinia lorem.
                        </p>

                        <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2799.8962507194374!2d-73.49669769244338!3d45.53516214032331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91b5a866b18dd%3A0xae76aee09b69996a!2sJournal+%C3%89tudiant+Le+MotDit+Inc.!5e1!3m2!1sen!2sca!4v1520651783461" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="latest_post">
                    <h2><span>Dernière Parution</span></h2>
                    <?php
                    $tabDerniereParution = getDerniereParution();
                    foreach ($tabDerniereParution as $derniereParution) : ?>
                        <article>
                            <a href="<?php echo(url_for(IMAGES_PATH.'/pdfParution/'.$derniereParution['lienPDF'])); ?>"><img id="parution" src="<?php echo(url_for(IMAGES_PATH.'/photosParution/'.$derniereParution['imagePDF'])); ?>">  </a>
                        </article>
                    <?php endforeach; ?>
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