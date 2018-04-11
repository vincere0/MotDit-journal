<?php

session_start();
include_once('../include/bd_functions.php');

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


    insertUtilisateur($prenom, $nom, $courriel, $username, $password);
    $_SESSION["username"] = $username;
    insertOperation("Inscription");

    header('Location: ../index.php');
}
else
{
    header('Location: ../motdit/404.php');
}

?>
