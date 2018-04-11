<?php
require('../include/initialize.php');
require ('../include/bd_functions.php');
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
            <h2>Nous rejoindre</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <form action="https://formspree.io/journal.etudiant.le.motdit@gmail.com" class="contact_form" method="post">
              <input class="form-control" name="name" type="text" placeholder="Votre Nom*" require>
              <input class="form-control" name="email" type="email" placeholder="Votre adresse courielle*" required>
              <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Votre Message*"></textarea>
              <input type="submit" value="Envoyer votre Message">
            </form>
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