<?php

class ControleurAdmin
{
    function __construct($action) {
        global $vues;

        try{
            switch($action) {
                case NULL:
                    $this->Reinit();
                    break;

                case "creerNews":
                    ModeleAdmin::creerNews($_POST['titleNews'], $_POST['contentNews'], $_POST['imageNews']);
                    $news=ModeleNews::getNews();
                    require($vues['accueil']);
                    break;
                case "deleteCommentaire":
                    ModeleAdmin::deleteCommentaire($_POST['deleteCommentaire']);
                    $_REQUEST['newsID']=$_POST['newsID'];
                    new ControleurUser("article");

                case "deleteNews":
                    ModeleAdmin::deleteNews($_POST['deleteNews']);
                    $news=ModeleNews::getNews();
                    require($vues['accueil']);
                    break;

                case "ajouterNews":
                    require ($vues['ajouterNews']);
                    break;

                default: //mauvaise action
                    $dVueEreur[] =	"Erreur d'appel php controleur admin";
                    require ($vues['erreur']);
                    break;
            }

        } catch (PDOException $e)
        {
            $dVueEreur[] =	"Erreur inattendue Admin!!! ";
            require ($vues['erreur']);
        }

        //fin
        exit(0);
    }//fin constructeur
    function Reinit() {

        global $vues; // nécessaire pour utiliser variables globales
        require($vues['seconnecter']);
    }


}//fin class
