<?php
require('../include/initialize.php');
require ('../include/bd_functions.php');
?>


<?php 

    if(isset($_POST['submit']))
    {
        if(isset($_POST['prenom']))
        {
            $prenom = htmlspecialchars($_POST['prenom']);
        }

        if(isset($_POST['nom']))
        {
            $nom = htmlspecialchars($_POST['nom']);
        }

        if(isset($_POST['courriel']))
        {
            $courriel = htmlspecialchars($_POST['courriel']);
        }

        if(isset($_POST['username']))
        {
            $username = htmlspecialchars($_POST['username']);
        }

        if(isset($_POST['password']))
        {
            $password = htmlspecialchars($_POST['password']);
        }

        if(isset($_POST['poste']))
        {
            $poste = $_POST['poste'];
        }

        $typeUtilisateur = 1;

        insertMembreCA($prenom, $nom, $courriel, $username, $password, $poste, $typeUtilisateur);
        insertOperation("Ajout Membre CA");

        echo "L'ajout du membre du CA a fonctionné";
    }
    else
    {
       echo "Une erreur est survenue";
    }

?>

<body>
<div class="container">
    <?php include(INCLUDE_PATH.'/headerVisiteur.php'); ?>
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>Inscription Membre CA</h2>
                        <form action="frmInscriptionCA.php" method="POST" enctype="multipart/form-data">
                            <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Votre prenom" required>
                            <input class="form-control" type="text" id="nom" name="nom" placeholder="Votre nom" required>
                            <input class="form-control" type="email" id="courriel" name="courriel" placeholder="Votre adresse courriel" required>
                            <input class="form-control" type="email" id="courrielc" name="courrielc" placeholder="Confirmation de votre adresse courriel" required>
                            <input class="form-control" type="text" id="username" name="username" placeholder="Votre nom d'utilisateur" required>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                            <input class="form-control" type="password" id="passwordc" name="passwordc" placeholder="Confirmation de votre mot de passe" required>

                            <br> <br>

                            <label for="poste">Poste de CA</label>

                            <br><br>

                            <select class="form-control" id="poste" name="poste" required>
                                <option value="Président Directeur Général">Président Directeur Général</option>
                                <option value="Rédacteur en Chef">Rédacteur en Chef</option>
                                <option value="Chef de Pupitre">Chef de Pupitre</option>
                                <option value="Secrétaire Général">Secrétaire Général</option>
                                <option value="Trésorier">Trésorier</option>
                                <option value="Publiciste">Publiciste</option>
                                <option value="Concepteur Web">Concepteur Web</option>
                                <option value="Correctrice en chef">Correctrice en chef</option>
                            </select>

                            <br><br>

                            <input type="submit" name="submit" value="Confirmation de l'inscription du membre du CA">
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