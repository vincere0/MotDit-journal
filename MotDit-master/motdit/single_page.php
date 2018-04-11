<?php
require_once('../include/initialize.php');
require('../include/bd_functions.php');
?>


<?php

if(isset($_POST['favoris']))
{
    if(isset($_SESSION['username']) && isset($_GET['articleID']))
    {
        $nomUtilisateur = $_SESSION['username'];
        $articleID = $_GET['articleID'];

        if(!articleFavoriExistant($nomUtilisateur, $articleID))
        {
            ajoutArticleFavori($nomUtilisateur, $articleID);
        }
        else
        {
            echo"<h3 style='color: white;'>Cet article fait déjà partie de votre liste de favoris</h3>";
        }
    }
    else
    {
        echo "Vous devez vous connecter pour ajouter des articles à votre liste de favoris";
    }
}


?>

<body>
<div class="container">
  <?php include(INCLUDE_PATH.'/headerVisiteur.php'); ?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
              <?php
              $infosArticle = getInfosArticle($_GET['articleID']);
              foreach($infosArticle as $informationArticle) :
              ?>
            <h1><?php echo($informationArticle['titre']) ?></h1>
            <div class="post_commentbox">
              <a id="<?php echo($informationArticle['auteurID']); ?>" href="<?php echo(url_for(MOTDIT_PATH.'/filtreAuteur.php?auteurID='.$informationArticle['auteurID'])); ?>"><i class="fa fa-user"></i><?php echo($informationArticle['Nom Complet'])?></a>
              <span><i id="<?php echo($informationArticle['parutionID']) ?>" href="#" class="fa fa-calendar"></i><?php echo($informationArticle['dateParution']) ?></span>
              <a id="<?php echo strip_tags($informationArticle['categorieID']); ?>" href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID='.$informationArticle['categorieID'])) ?>"><i class="fa fa-tags"></i><?php echo($informationArticle['nom']) ?></a>
            </div>

            <div class="single_page_content"> <img class="img-center" src="<?php echo(url_for(IMAGES_PATH.'/photosArticle/'.$informationArticle['cheminImage'])) ?>" alt="">
              <p> <?php echo nl2br($informationArticle['texteArticle']) ?> </p>
              <blockquote> <?php echo nl2br($informationArticle['citation']) ?> </blockquote>
                <?php endforeach; ?>
            </div>

              <div style="padding-top: 20px" class="sharethis-inline-share-buttons"></div>

              <br>

              <?php
                    if(!isset($_SESSION['username']))
                    { ?>
                        <button type="button" id="inscription" disabled>Vous devez vous connecter pour ajouter cet article à votre liste de favoris</button>
                   <?php }

                   else if (isset($_SESSION['username']) && isset($_GET['articleID']) && articleFavoriExistant($_SESSION['username'], $_GET['articleID']))
                   { ?>
                        <button type="button" id="inscription" disabled>Cet article fait déjà partie de votre liste de favoris</button>
                   <?php }
                    else if(isset($_SESSION['username']) && isset($_GET['articleID']) && !articleFavoriExistant($_SESSION['username'], $_GET['articleID']))
                    { ?>
                        <form method="post" action="single_page.php?articleID=<?php echo($_GET['articleID']) ?>" enctype="multipart/form-data">
                            <input type="submit" id="favoris" name="favoris" value="Ajouter cet article à ma liste de favoris">
                        </form>
              <?php } ?>


              <br>

              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = 'https://connect.facebook.net/fr_CA/sdk.js#xfbml=1&version=v2.12';
                      fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));</script>

              <div class="fb-comments" data-href="http://127.0.0.1:8080/TP2_GabLanoville/motdit/single_page.php?articleID=15" data-numposts="5"></div>

          </div>
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
</html>