<?php
require_once('bd_functions.php');
?>

<footer id="footer">
  <div class="footer_top">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="footer_widget wow fadeInLeftBig">
          <h2>Liste des membres</h2>
          <?php $membresCA = getListeMembresCA();  ?>
          <?php foreach ($membresCA as $membreCA) {?>
            <h5 style="display: inline-block"><?php echo($membreCA['prenom'].' '.$membreCA['nom'].' - '.$membreCA['poste']); ?></h5>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="footer_widget wow fadeInDown">
          <h2>Catégories</h2>
          <ul class="tag_nav">
            <li><a href="<?php echo(url_for(PROJECT_PATH.'/index.php')); ?>">Actualité</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=8')); ?>">Cégep</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=9')); ?>">International</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=1')); ?>">Divertissement</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=10')); ?>">Opinions</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=14')); ?>">Technologie</a></li>
            <li><a href="<?php echo(url_for(MOTDIT_PATH.'/filtre.php?categorieID=28')); ?>">Jeux</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="footer_widget wow fadeInRightBig">
          <h2>Nous Rejoindre</h2>
          <p>Le journal étudiant Le MotDit offre l'occasion à tous les étudiants et toutes les étudiantes du cégep Édouard-Montpetit de s'exprimer
          ouvertement et sans censure sur des sujets qui leur tiennent à coeur. Si tu t'intéresses à la couverture d'événements culturels, à l'écriture
          d'éditoriaux ou de textes d'opinion, à la photographie, au graphisme, au montage, à la caricature, à l'écriture de nouvelles, de poèmes, ou tout simplement
          au partage d'idées et aux débats constructifs, Le MotDit est pour toi! Nous sommes toujours à la recherche de nouveaux membres (surtout de journalistes, de correcteurs
            et de correctrices) et notre local est à ta disposition pour la rédaction ou tout simplement pour le plaisir d'échanger avec des gens intéressants. N'hésite pas
          à venir nous visiter dans la cafétéria.</p>
          <address>
          Local F-045, poste 2286, journal.etudiant.le.motdit@gmail.com
          </address>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <p class="copyright">Copyright &copy; 2045 <a href="../index.php">NewsFeed</a></p>
    <p class="developer">Developed By Wpfreeware</p>
  </div>
</footer>