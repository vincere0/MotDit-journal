<?php

include_once('../include/bd_functions.php');

insertOperation("Déconnexion");
deconnection();

header('Location: ../index.php');

?>
