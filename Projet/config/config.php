<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$base="dbbrdacostac";
$dsn = "mysql:host=localhost;dbname=dbbrdacostac";
$login = "brdacostac";
$pass = "achanger";


//Vues

$vues['erreur']='vues/erreur.php';
$vues['accueil']='vues/accueil.php';
$vues['seconnecter']='vues/seconnecter.php';
$vues['creeruncompte']='vues/creeruncompte.php';
$vues['ajouterNews']='vues/ajouterNews.php';
$vues['article']='vues/article.php';
$vues['ajouterCommentaire']='vues/ajouterCommentaire.php';


?>