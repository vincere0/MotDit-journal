<?php
require_once('./include/initialize.php');
require ('./include/bd_functions.php');
?>

<body>
<div class="container">
  <?php include(INCLUDE_PATH.'/headerVisiteur.php'); ?>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          <?php
          $carousel = get4Carousel();
          foreach($carousel as $unElementCarousel) : ?>
          <div class="single_iteam"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php?articleID='.$unElementCarousel['articleID'])); ?>"> <img src="<?php echo(url_for(IMAGES_PATH.'/photosArticle/'.$unElementCarousel['cheminImage'])) ?>" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php?articleID='.$unElementCarousel['articleID'])); ?>"><?php echo($unElementCarousel['titre']); ?></a></h2>
              <p><?php echo(substr($unElementCarousel['texteArticle'], 0, 300).'...'); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
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
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
            <div class="fashion_technology_area">
                <div class="fashion">
                    <div class="single_post_content">
                        <h2><span>Actualité</span></h2>
                        <ul class="business_catgnav wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="featured_img"> <img alt="" src="images/featured_img2.jpg"> <span class="overlay"></span> </a>
                                    <figcaption> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                                </figure>
                            </li>
                        </ul>
                        <ul class="spost_nav">
                            <li>
                                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                    <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                    <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="technology">
                    <div class="single_post_content">
                        <h2><span>Cégep</span></h2>
                        <ul class="business_catgnav">
                            <li>
                                <figure class="bsbig_fig wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="featured_img"> <img alt="" src="images/featured_img3.jpg"> <span class="overlay"></span> </a>
                                    <figcaption> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                                </figure>
                            </li>
                        </ul>
                        <ul class="spost_nav">
                            <li>
                                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                    <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                    <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
          <div class="single_post_content">

            <h2><span>Divertissement</span></h2>
            <?php

            $divertissements = get5Divertissement();
            $compteur = 1;
            foreach($divertissements as $unDivertissement) :
              if ($compteur ==1) { ?>
                <div class="single_post_content_left">
                  <ul class="business_catgnav  wow fadeInDown">

                    <li>
                      <figure class="bsbig_fig">
                        <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php?articleID='.$unDivertissement['articleID'])) ?>" class="featured_img">
                          <img alt="" src="<?php echo(url_for(IMAGES_PATH.'/photosArticle/'.$unDivertissement['cheminImage'])) ?>"> <span class="overlay"></span>
                        </a>
                        <figcaption> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php?articleID='.$unDivertissement['articleID'])) ?>"><?php echo($unDivertissement['titre']) ?></a> </figcaption>
                        <p><?php echo(substr($unDivertissement['texteArticle'], 0, 70).'...') ?></p>
                      </figure>
                    </li>

                  </ul>
                </div>
              <?php } else { ?>
                <div class="single_post_content_right">
                  <ul class="spost_nav">
                    <li>
                      <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="<?php echo(url_for(IMAGES_PATH.'/'.$unDivertissement['cheminImage'])) ?>"> </a>
                        <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"><?php echo($unDivertissement['titre']) ?></a> </div>
                      </div>
                    </li>
                  </ul>
                </div>
              <?php } $compteur++; ?>
            <?php endforeach; ?>
          </div>
            <div class="fashion_technology_area">
            <div class="fashion">
                <div class="single_post_content">
                    <h2><span>Opinions</span></h2>
                    <ul class="business_catgnav wow fadeInDown">
                        <li>
                            <figure class="bsbig_fig"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="featured_img"> <img alt="" src="images/featured_img2.jpg"> <span class="overlay"></span> </a>
                                <figcaption> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                                <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                            </figure>
                        </li>
                    </ul>
                    <ul class="spost_nav">
                        <li>
                            <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="technology">
                <div class="single_post_content">
                    <h2><span>Technologie</span></h2>
                    <ul class="business_catgnav">
                        <li>
                            <figure class="bsbig_fig wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="featured_img"> <img alt="" src="images/featured_img3.jpg"> <span class="overlay"></span> </a>
                                <figcaption> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                                <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                            </figure>
                        </li>
                    </ul>
                    <ul class="spost_nav">
                        <li>
                            <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                            </div>
                        </li>
                        <li>
                            <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
          <div class="single_post_content">
            <h2><span>Bandes dessinées</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 1"> <img src="images/photograph_img2.jpg" alt=""/></a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 2"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 3"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 4"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 6"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
                <li>
                    <div class="photo_grid">
                        <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                    </div>
                </li>
                <li>
                    <div class="photo_grid">
                        <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                    </div>
                </li>
                <li>
                    <div class="photo_grid">
                        <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                    </div>
                </li>
                <li>
                    <div class="photo_grid">
                        <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                    </div>
                </li>
                <li>
                    <div class="photo_grid">
                        <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                    </div>
                </li>
                <li>
                    <div class="photo_grid">
                        <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                    </div>
                </li>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>International</span></h2>
            <ul class="spost_nav">
              <li>
                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="<?php echo(url_for(MOTDIT_PATH.'/single_page.php')) ?>" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Vidéo</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Avis</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="video">
                <div class="vide_area">
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/OQEOLsyrje4" frameborder="0" gesture="media" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                  <div id="fb-root"></div>
                  <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = 'https://connect.facebook.net/fr_CA/sdk.js#xfbml=1&version=v2.12&appId=363174380752912&autoLogAppEvents=1';
                          fjs.parentNode.insertBefore(js, fjs);
                      }(document, 'script', 'facebook-jssdk'));</script>

                  <div class="fb-comments" data-href="http://127.0.0.1:8080/TP2_GabLanoville/motdit/index.php" data-width="339" data-order-by="reverse_time" data-numposts="4"></div>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Recrutement</span></h2>
            <a class="sideAdd"><img src="<?php echo(url_for(IMAGES_PATH.'/pub-motdit.png')) ?>" alt=""></a> </div>
        </aside>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/fr_CA/sdk.js#xfbml=1&version=v2.12';
                  fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>

          <div class="fb-page" data-href="https://www.facebook.com/journalmotdit/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/journalmotdit/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/journalmotdit/">Journal étudiant Le MotDit</a></blockquote></div>
      </div>
    </div>
  </section>

<?php include('include/footer.php') ?>

</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.li-scroller.1.0.js"></script>
<script src="assets/js/jquery.newsTicker.min.js"></script>
<script src="assets/js/jquery.fancybox.pack.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
