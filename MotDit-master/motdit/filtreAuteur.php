<?php
require_once('../include/initialize.php');
require('../include/bd_functions.php');
?>

<body>
<div class="container">
    <?php include(INCLUDE_PATH.'/headerVisiteur.php'); ?>
    <section id="contentSection">
        <div class="row">
            <div class="col-md-8">
                <div class="single_post_content">
                    <?php
                    $compteur = 1;
                    $infosArticlesAuteur = getInfosArticleAuteur($_GET['auteurID']);
                    foreach ($infosArticlesAuteur as $informationAuteur) :
                        if($compteur == 1) { ?>
                        <h2><span><?php echo($informationAuteur['prenom'].' '.$informationAuteur['Nom auteur']) ?></span></h2>
                        <?php } $compteur++ ?>
                        <?php endforeach; ?>
                    <?php
                    if(!empty($informationAuteur['nom'])) {
                    $infosArticlesAuteur = getInfosArticleAuteur($_GET['auteurID']);
                    foreach ($infosArticlesAuteur as $informationAuteur) :
                    ?>
                    <div class="media">
                            <ol style="list-style: none; padding-left: 0;">
                                <li>
                                    <article style="padding-bottom: 20px; padding-top: 10px; border-bottom: dotted 5px #800049;">
                                        <div class="media-left">
                                            <a>
                                                <img href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php?articleID='.$informationAuteur['articleID'])); ?>" src="<?php echo(url_for(IMAGES_PATH.'/photosArticle/'.$informationAuteur['cheminImage'])) ?>" alt="Image de l'article" style="width: 200px; height: 200px">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                <h6 style="margin: 0;">
                                                    <a><?php echo($informationAuteur['nom']) ?></a>
                                                </h6>
                                                <h4 style="margin-bottom: 15px;">
                                                    <a><b><?php echo($informationAuteur['titre']) ?></b> par <b><?php echo($informationAuteur['prenom'].' '.$informationAuteur['Nom auteur']) ?></b></a>
                                                </h4>
                                                <span>
                                            <i class="fa fa-calendar" style="font-size: 18px; padding-bottom: 10px"> Publié le : <?php echo($informationAuteur['dateParution']) ?></i>
                                        </span>
                                                <p style="padding-bottom: 11px;"><?php echo(substr($informationAuteur['texteArticle'], 0, 150).'...'); ?></p>
                                                <a id="<?php echo($informationAuteur['articleID']) ?>" href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php?articleID='.$informationAuteur['articleID'])); ?>" class="btn_filtre">Lire ⇾</a>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            </ol>
                        </div>
                    <?php endforeach; ?>
                        <?php echo('<h4>'."L'auteur(e) ".$informationAuteur['prenom']." ".$informationAuteur['Nom auteur']." a écrit : ".count($infosArticlesAuteur))." article(s)".'</h4>' ?>
                    <?php } else { ?>
                    <div>
                        <h1>Désolé l'auteur sélectionné n'a écrit aucun article</h1>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="latest_post">
                    <h2><span>Dernière Parution</span></h2>
                    <article>
                        <a href="http://www.lavoixdelaguerison.com/DATA/DOCUMENT/17.pdf"><img id="parution" src="<?php echo(url_for(IMAGES_PATH.'/parution.jpg'))?>">  </a>
                    </article>
                </div>
                <aside class="right_content">
                    <div class="single_sidebar">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Vidéo</a></li>
                            <!--<li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Avis</a></li> -->
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="video">
                                <div class="vide_area">
                                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/OQEOLsyrje4" frameborder="0" gesture="media" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="comments">
                                <ul class="spost_nav">
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="" class="media-left"> <img alt="" src="../images/avatar1.png" style="border-radius: 50%"> </a>
                                            <div class="media-body"> <a href="" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="" class="media-left"> <img alt="" src="../images/avatar2.png" style="border-radius: 50%"> </a>
                                            <div class="media-body"> <a href="" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="" class="media-left"> <img alt="" src="../images/avatar1.png" style="border-radius: 50%"> </a>
                                            <div class="media-body"> <a href="" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="" class="media-left"> <img alt="" src="../images/avatar2.png" style="border-radius: 50%"> </a>
                                            <div class="media-body"> <a href="" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                        </div>
                                    </li>
                                </ul>
                                <button type="button" id="favoris" style="position: initial; left: 0%; max-width: 100%" onclick="document.getElementById('idCommentaireArticle').style.display='block'">Donnez votre opinion sur le site en général</button>
                            </div>
                        </div>
                    </div>
                    <div class="single_sidebar wow fadeInDown">
                        <h2><span>Commenditaire</span></h2>
                        <a class="sideAdd" href=""><img src="../images/add_img.jpg" alt=""></a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <?php include('../include/footer.php')?>

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