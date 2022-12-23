<?php

class ModeleUtilisateur
{
    public static function login($login,$password){
        $gtw=new GatewayUtilisateur();
        $passwordHash=$gtw->getPasswordHash($login);
        if ( $passwordHash == NULL ){

            throw new Exception("ModeleUtilisateur : login not found or wrong password");
        }

        if(password_verify($password,$passwordHash)){

            if($gtw->isAdmin($login)){
                $_SESSION['role']="Admin";
                $_SESSION['login']=$login;
                return new Admin($login,"Admin");
            }
            else{
                $_SESSION['role']="Utilisateur";
                $_SESSION['login']=$login;
                return new Utilisateur($login,"Utilisateur");
            }
        }
        else{

            throw new Exception("ModeleUtilisateur : login not found or wrong password");
        }
    }
    public static function deconnection(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public static function creerCommentaire($content,$userlogin,$newsid){
        Validation::val_form_commentaire($content,$userlogin, $newsid);

        $gateWay = new GatewayCommentaire();
        $gateWay->creerCommentaire($content,$userlogin,$newsid);
    }

    public static function register($login,$password){
        $gtw=new GatewayUtilisateur();
        $login=Validation::validateLogin($login);
        $password=Validation::validatePassword($password);
        $passwordHash=password_hash($password,PASSWORD_DEFAULT);
        $gtw->ajouterUtilisateur($login,$passwordHash);
        ModeleUtilisateur::login($login,$password);
    }

}