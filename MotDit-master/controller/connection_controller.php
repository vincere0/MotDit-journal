<?php
session_start();
include_once('../include/bd_functions.php');

if(isset($_POST['submit']))
{
    if(isset($_POST['uname']))
    {
        $uname = htmlspecialchars($_POST['uname']);
    }

    if(isset($_POST['psw']))
    {
        $psw = htmlspecialchars($_POST['psw']);
    }

    connectionUtilisateur($uname, $psw);
    header('Location: ../index.php?');
    insertOperation("Connexion");
}
else
{
   header('Location: ../motdit/404.php');
}


?>
