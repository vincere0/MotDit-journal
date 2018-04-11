<?php

ob_start(); // Mettre output buffering a ON

define("INCLUDE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(INCLUDE_PATH));
define("ASSETS_PATH", PROJECT_PATH. '/assets');
define("CONTROLLER_PATH", PROJECT_PATH. '/controller');
define("IMAGES_PATH", PROJECT_PATH. '/images');
define("MOTDIT_PATH", PROJECT_PATH. '/motdit');


//Obtenir un url à partir de 127.0.0.1 ....
function url_for($script_path)
{
    $script_path = str_replace('\\','/',$script_path);
    $root = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']);
    $base_url = "//".$_SERVER["SERVER_NAME"].':';
    return $base_url . $_SERVER['SERVER_PORT'].str_replace($root,"",$script_path);
}
//
//
//// Assigner le URL root à une constante php
//// * Trouver dynamiquement un URL vers "/include"
////$public_end = strpos($_SERVER['SCRIPT_NAME'], '/include');
////$_doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
//
//// Assigner les chemins d'accès à des constantes
//// __FILE__ retourne le chemin d'accès du fichier courant
//// dirname() retourne le chemin d'accès du répertoire parent
//define("INCLUDE_PATH", dirname(__FILE__));
//define("PROJECT_PATH", dirname(INCLUDE_PATH));
//
//define("CSS_PATH", PROJECT_PATH. '/assets/css');
//define("FONTS_PATH", PROJECT_PATH. '/assets/fonts');
//define("JS_PATH", PROJECT_PATH. '/assets/js');
//define("ASSETS_PATH", PROJECT_PATH. '/assets');
//
//define("CONTROLLER_PATH", PROJECT_PATH. '/controller');
//define("IMAGES_PATH", PROJECT_PATH. '/images');
//define("MOTDIT_PATH", PROJECT_PATH. '/motdit');
//
//// Assigner les chemins d'accès à des constantes relatives REF
//// Path du serveur
//define("WWW_ROOT", $_doc_root);
//define("INCLUDE_PATH_REF", WWW_ROOT. '/include');
//define("PROJECT_PATH_REF", WWW_ROOT);
//
//define("CSS_PATH_REF", WWW_ROOT. '/assets/css');
//define("FONTS_PATH_REF", WWW_ROOT. '/assets/fonts');
//define("JS_PATH_REF", WWW_ROOT. '/assets/js');
//define("ASSETS_PATH_REF", WWW_ROOT. '/assets');
//
//define("CONTROLLER_PATH_REF", WWW_ROOT. '/controller');
//define("IMAGES_PATH_REF", WWW_ROOT. '/images');
//define("MOTDIT_PATH_REF", WWW_ROOT. '/motdit');
//
//function url_for($script_path){
//    if($script_path[0] != '/')
//    {
//        $script_path = "/". $script_path;
//    }
//
//    return WWW_ROOT. $script_path;
//}
//
//function is_post_request()
//{
//    return $_SERVER['REQUEST_METHOD'] == 'POST';
//}
//
//function is_get_request()
//{
//    return $_SERVER['REQUEST_METHOD'] == 'GET';
//}
//
//require_once('bd_functions.php');
//
////echo $public_end;
////echo $_doc_root;
////echo INCLUDE_PATH;
////echo PROJECT_PATH;
////echo CSS_PATH;
////echo FONTS_PATH;
////echo JS_PATH;
////echo ASSETS_PATH;
////echo CONTROLLER_PATH;
////echo IMAGES_PATH;
////echo MOTDIT_PATH;
////echo WWW_ROOT;
////echo INCLUDE_PATH_REF;
////echo PROJECT_PATH_REF;
////echo CSS_PATH_REF;
////echo FONTS_PATH_REF;
////echo JS_PATH_REF;
////echo ASSETS_PATH_REF;
////echo CONTROLLER_PATH_REF;
////echo IMAGES_PATH_REF;
////echo MOTDIT_PATH_REF;
//
//?>