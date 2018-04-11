<?php

session_start();

function connect_DB()
{
    /** Fonction de connection à la base de données utilisée par les autres fonctions BD
     *  En cas d'erreur, on affiche un message et on arrête tout */
    try
    {
        // On se connecte à MySQL
        //$bdd = new PDO('mysql:host=localhost;dbname=vturgeon_libtest;charset=utf8', 'vturgeon_aplibt', 'MaTomate1');
        $bdd = new PDO('mysql:host=localhost;dbname=motdit;charset=utf8', 'root', '');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
}

function insertUtilisateur($prenom, $nom, $courriel, $username, $password)
{

    $bdd = connect_DB();
    try {

        $req = $bdd->prepare('INSERT INTO utilisateur (prenom, nom, courriel, nomutilisateur, password) VALUES (:prenom, :nom, :courriel, :username, :password) ');
        $req->execute(array(
            'prenom' => $prenom, 'nom' => $nom, 'courriel' => $courriel, 'username' => $username, 'password' => md5($password)
        ));

        $_SESSION['username'] = $username;
        $_SESSION['type'] = 2;
        echo"<h3 style='color: white'>Votre compte utilisateur a été créé $username .</h3>";

        //  Fermer la connexion
        $bdd = null;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function insertMembreCA($prenom, $nom, $courriel, $username, $password, $poste, $typeUtilisateur)
{

    $bdd = connect_DB();
    try {
        $req = $bdd->prepare('INSERT INTO utilisateur (prenom, nom, courriel, nomutilisateur, password, poste, typeUtilisateur) VALUES (:prenom, :nom, :courriel, :username, :password, :poste, :typeUtilisateur)  ');
        $req->execute(array(
            'prenom' => $prenom, 
            'nom' => $nom, 
            'courriel' => $courriel, 
            'username' => $username, 
            'password' => md5($password), 
            'poste' => $poste, 
            'typeUtilisateur' => $typeUtilisateur
        ));

        echo"<h3 style='color: white'>Le membre du CA $prenom.' '.$nom a été ajoutée par au poste de $poste .</h3>";

        //  Fermer la connexion
        $bdd = null;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function utilisateurExiste($username)
{
    $bdd = connect_DB();
    try {

        $req = $bdd->query('SELECT nomutilisateur FROM utilisateur');

        if($req){
            $tabUsernames = $req -> fetchAll();
            foreach ($tabUsernames as $user){
                if($user['nomutilisateur'] == $username){
                    return true;
                }
            }
            return false;
        }

        $bdd = null;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function modificationPassword($username, $email, $nouveauPassword)
{
    $bdd = connect_DB();
    try {

        $req = $bdd->query("UPDATE utilisateur SET password = '".md5($nouveauPassword)."' WHERE nomUtilisateur = '".$username."' AND courriel = '".$email."'");

        $req->execute(array(
            'password' => md5($nouveauPassword)
        ));

        echo"<h3 style='color: white'>Votre mot de passe a bien été modifié $username .</h3>";

        $bdd = null;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function articleFavoriExistant($nomUtilisateur, $articleID)
{
    $bdd = connect_DB();
    try {

        $req = $bdd->query("SELECT nomUtilisateur, articleID FROM favoris WHERE nomUtilisateur = '".$nomUtilisateur."' AND articleID = '".$articleID."'");

        if($req)
        {
            $tabFavoris = $req -> fetchAll();

            foreach($tabFavoris as $favori)
            {
                if($favori['nomUtilisateur'] == $nomUtilisateur && $favori['articleID'] == $articleID)
                {
                    return true;
                }
            }
            return false;
        }

        $bdd = null;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function ajoutArticleFavori($nomUtilisateur, $articleID)
{
    $bdd = connect_DB();
    try
    {
        $nomUtilisateur = $_SESSION['username'];
        $req = $bdd->prepare('INSERT INTO favoris (nomUtilisateur, articleID) VALUES (:nomUtilisateur, :articleID)');
        $req->execute(array(
            'nomUtilisateur' => $nomUtilisateur,
            'articleID' => $articleID
        ));

        echo"<h3 style='color: white;'>L'article $articleID a bien été ajouté à votre liste de favoris $nomUtilisateur</h3>";


        $bdd = null;
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}


function connectionUtilisateur($username, $password)
{
    $bdd = connect_DB();
    try {

        if(utilisateurExiste($username))
        {
            $req = $bdd->prepare('SELECT password, typeUtilisateur, poste FROM utilisateur WHERE nomutilisateur = :username');
            $req -> execute(array(
                "username" => $username
            ));

                $data = $req-> fetch();

                $fetchedpassword = $data['password'];

               if($fetchedpassword == md5($password))
               {
                   $_SESSION['poste'] = $data['poste'];
                   $_SESSION['username'] = $username;
                   $_SESSION['type'] = $data['typeUtilisateur'];
               }

            //  Fermer la connexion
            $bdd = null;
        }
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function deconnection()
{
    session_start();
    session_unset();
    session_destroy();
}

function insertOperation($typeOperation)
{
    $bdd = connect_DB();
    try
    {
        $username = $_SESSION['username'];
        $req = $bdd->prepare('INSERT INTO infosoperations (username, typeOperation) VALUES (:username, :typeOperation)');
        $req->execute(array(
           'username' => $username,
            'typeOperation' => $typeOperation
        ));
        $bdd = null;
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

/** Fonction qui permet d'insérer une nouvelle photo dans la table Photo */
function insertArticle($titreArticle, $texteArticle, $auteur, $categorie, $parution, $citation, $cheminImage)
{
    $bdd = connect_DB();
    try {
        $username = $_SESSION['username'];
        $req = $bdd->prepare('INSERT INTO article (titre, texteArticle, auteurID, categorieID,  parutionID, citation, cheminImage) VALUES (:titre, :texteArticle, :auteurID, :categorieID, :parutionID,:citation, :cheminImage) ');
        $req->execute(array(
            'titre' => $titreArticle,
            'texteArticle' => $texteArticle,
            'auteurID' => $auteur,
            'categorieID' => $categorie,
            'parutionID' => $parution,
            'citation' => $citation,
            'cheminImage' => $cheminImage
        ));

        //  Afficher un message de confirmation indiquant seulement le titre de la photo et le pseudo du membre
        // Exemple: La photo Roses Jaunes a été ajoutée par RosesEnFolies
        echo "<h3 style='color: white'>L'article $titreArticle a été ajoutée par $username .</h3>";
        //  Fermer la connexion
        $bdd = null;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

/** Fonction qui permet d'insérer une nouvelle Parution */
function insertParution($tempsParution, $dateParution, $imageParution, $pdfParution)
{
    $bdd = connect_DB();
    try {
        $username = $_SESSION['username'];
        $req = $bdd->prepare('INSERT INTO parution (tempsParution, dateParution, imagePDF, lienPDF) VALUES (:tempsParution, :dateParution, :photoParution, :pdfParution) ');
        $req->execute(array(
            'tempsParution' => $tempsParution,
            'dateParution' => $dateParution,
            'photoParution' => $imageParution,
            'pdfParution' => $pdfParution,
        ));

        echo"<h3 style='color: white'>La parution du $dateParution de la session $tempsParution a été ajoutée par $username .</h3>";
        //  Fermer la connexion
        $bdd = null;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function insertCategorie($nomCategorie)
{
    $bdd = connect_DB();
    try {
        $username = $_SESSION['username'];
        $req = $bdd->prepare('INSERT INTO categorie (nom) VALUES (:nom) ');
        $req->execute(array(
            'nom' => $nomCategorie
        ));

        echo"<h3 style='color: white'>La catégorie $nomCategorie a été ajoutée par $username .</h3>";
        //  Fermer la connexion
        $bdd = null;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getDerniereParution()
{
    $bdd = connect_DB();
    try
    {
        $reponse = $bdd->query('SELECT * FROM parution ORDER BY dateParution DESC LIMIT 1');

        if($reponse)
        {
            $tabDerniereParution = $reponse->fetchAll();
            return $tabDerniereParution;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getListeMembresCA()
{
    $bdd = connect_DB();

    try
    {
        $reponse = $bdd->query('SELECT prenom, nom, poste FROM utilisateur WHERE typeUtilisateur = 1');

        if($reponse)
        {
            $tabListeMembresCA = $reponse->fetchAll();
            return $tabListeMembresCA;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function get9Ticker()
{
    $bdd = connect_DB();

    try
    {
        $reponse = $bdd->query('SELECT articleID, titre, cheminImage FROM article ORDER BY date DESC LIMIT 9');

        if($reponse)
        {
            $tab9Ticker = $reponse->fetchAll();
            return $tab9Ticker;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $bdd = null;
}

function get4Carousel()
{
    $bdd = connect_DB();

    try
    {
        $reponse = $bdd->query('SELECT articleID, titre, texteArticle, cheminImage FROM article ORDER BY date DESC LIMIT 4');

        if($reponse)
        {
            $tab4Carousel = $reponse->fetchAll();
            return $tab4Carousel;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $bdd = null;
}

function get5Divertissement()
{
    $bdd = connect_DB();

    try
    {
        $reponse = $bdd->query('SELECT articleID, titre, texteArticle, cheminImage FROM article WHERE categorieID = 1 ORDER BY date DESC LIMIT 5');

        if($reponse)
        {
            $tab5Divertissement = $reponse->fetchAll();
            return $tab5Divertissement;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $bdd = null;
}

function getInfosArticle($articleID)
{
    $bdd = connect_DB();

   try
    {
        $articleID = $_GET['articleID'];
        $reponse = $bdd->query("SELECT articleID, titre, CONCAT(prenom, ' ', auteur.nom) AS 'Nom Complet', parution.dateParution, categorie.nom, cheminImage, texteArticle, citation, article.categorieID, article.parutionID, article.auteurID FROM article INNER JOIN categorie ON article.categorieID = categorie.categorieID INNER JOIN auteur ON article.auteurID = auteur.auteurID INNER JOIN parution ON article.parutionID = parution.parutionID WHERE article.articleID = '".$articleID."'");

        if($reponse)
        {
            $tabInfosArticle = $reponse->fetchAll();
            return $tabInfosArticle;
        }
        $reponse->closeCursor();
    }
   catch (Exception $e)
   {
       die('Erreur : '.$e->getMessage());
   }
    $bdd = null;
}

function getInfosArticleCategorie($categorieID)
{
    $bdd = connect_DB();

    try {
        $categorieID = $_GET['categorieID'];
        $reponse = $bdd->query("SELECT article.articleID, article.titre, auteur.prenom, auteur.nom AS 'Nom auteur', parution.dateParution, categorie.nom, article.cheminImage, article.texteArticle, article.citation, article.categorieID FROM article INNER JOIN categorie ON article.categorieID = categorie.categorieID INNER JOIN auteur ON article.auteurID = auteur.auteurID INNER JOIN parution ON article.parutionID = parution.parutionID WHERE categorie.categorieID = '" . $categorieID . "'");

        if ($reponse) {
            $tabInfosArticle = $reponse->fetchAll();
            return $tabInfosArticle;
        }
        $reponse->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $bdd = null;
}

function getInfosArticleAuteur($auteurID)
{
    $bdd = connect_DB();

    try {
        $auteurID = $_GET['auteurID'];
        $reponse = $bdd->query("SELECT article.articleID, article.titre, auteur.prenom, auteur.nom AS 'Nom auteur', parution.dateParution, categorie.nom, article.cheminImage, article.texteArticle, article.citation, article.categorieID FROM article INNER JOIN categorie ON article.categorieID = categorie.categorieID INNER JOIN auteur ON article.auteurID = auteur.auteurID INNER JOIN parution ON article.parutionID = parution.parutionID WHERE article.auteurID = '" . $auteurID . "'");

        if ($reponse) {
            $tabInfosArticle = $reponse->fetchAll();
            return $tabInfosArticle;
        }
        $reponse->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $bdd = null;
}

function getArticleCategorie($categorieID)
{
    $bdd = connect_DB();

    try
    {
        $categorieID = $_GET['categorieID'];
        $reponse = $bdd->query("SELECT categorie.categorieID, categorie.nom, article.articleID FROM categorie INNER JOIN article ON article.categorieID = categorie.categorieID WHERE categorie.categorieID = '".$categorieID."'".  "ORDER BY date DESC");

        if($reponse)
        {
            $tab5Divertissement = $reponse->fetchAll();
            return $tab5Divertissement;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $bdd = null;
}

function getALLCategorieFiltre($categorieID)
{
    $bdd = connect_DB();

    try
    {
        $categorieID = $_GET['categorieID'];
        $reponse = $bdd->query("SELECT articleID, titre, texteArticle, cheminImage FROM article WHERE categorie.categorieID = '".$categorieID."'".  "ORDER BY article.date DESC");

        if($reponse)
        {
            $tabCategorieFiltre = $reponse->fetchAll();
            return $tabCategorieFiltre;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $bdd = null;
}

function getAllAuteur()
{
    $bdd = connect_DB();

    try
    {
        $reponse = $bdd->query('SELECT * FROM auteur ORDER BY nom');

        if($reponse)
        {
            $tabAllAuteurs = $reponse->fetchAll();
            return $tabAllAuteurs;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $bdd = null;
}

function getAllParution()
{
    $bdd = connect_DB();

    try
    {
        $reponse = $bdd->query('SELECT * FROM parution ORDER BY dateParution');

        if($reponse)
        {
            $tabAllParution = $reponse->fetchAll();
            return $tabAllParution;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $bdd = null;
}

function getAllCategorie()
{
    $bdd = connect_DB();

    try
    {
        $reponse = $bdd->query('SELECT * FROM categorie ORDER BY categorieID');

        if($reponse)
        {
            $tabAllCategories = $reponse->fetchAll();
            return $tabAllCategories;
        }

        $reponse->closeCursor();
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $bdd = null;
}

?>