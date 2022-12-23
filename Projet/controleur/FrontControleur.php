<?php

class FrontControleur {

    function __construct()
    {
        global $vues, $con;

        session_start();

        $dVueEreur = array();

        try {
            global $dsn,$login,$pass;
            $con = new Connection($dsn, $login, $pass);
        } catch
        (PDOException $Exception) {
            $dVueEreur[] = "Connection impossible à la BBD !!";
            require($vues['erreur']);
        }

        $listeAction_Admin = array("supprimerNews", "ajouterNews", "creerNews","deleteNews","deleteCommentaire");

        $modeleAdmin = new ModeleAdmin();

        try {
            $admin = $modeleAdmin->isAdmin();
            $action = $_REQUEST['action'] ?? null;

            if ( !isset($_COOKIE['nbCommentairesUser'])){
                setcookie('nbCommentairesUser',0,time()+365*24*3600);
            }

            try {
                Validation::val_action($action);
            }
            catch(Exception $e){
                $dVueEreur[] = $e->getMessage();
                require($vues['erreur']);
            }

            if (in_array($action, $listeAction_Admin)) {
                if ($admin == null) { //Si l'utilisateur n'est pas admin
                    require($vues['seconnecter']);
                } else {
                    new ControleurAdmin($action);
                }
            }
            else { //Si l'utilisateur n'est pas admin
                if (!isset($_SESSION['login'])&&($action != "login" && $action != "creeruncompte" && $action != "seEnregistrer")) {
                    require($vues['seconnecter']);
                } else {
                    new ControleurUser($action);
                }
            }
        } catch (Exception $e) {
            $dVueEreur[] = $e->getMessage();
            require($vues['erreur']);
        }
    } // fin constructeur
} //fin classe
?>