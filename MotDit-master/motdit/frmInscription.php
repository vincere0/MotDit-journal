<?php
require('../include/initialize.php');
?>

<body>
<div class="container">
    <?php include(INCLUDE_PATH.'/headerVisiteur.php'); ?>
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>Inscription</h2>
                        <form action="../controller/inscription_controller.php" method="POST" class="contact_form">
                            <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Votre prenom" required>
                            <input class="form-control" type="text" id="nom" name="nom" placeholder="Votre nom" required>
                            <input class="form-control" type="email" id="courriel" name="courriel" placeholder="Votre adresse courriel" required>
                            <input class="form-control" type="email" id="courielc" name="courrielc" placeholder="Confirmation de votre adresse courriel" required>
                            <input class="form-control" type="text" id="username" name="username" placeholder="Votre nom d'utilisateur" required>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                            <input class="form-control" type="password" id="passwordc" name="passwordc" placeholder="Confirmation de votre mot de passe" required>
                            <input type="submit" name="submit" value="Confirmation de votre demande d'inscription">
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