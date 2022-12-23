<?php

class ModeleAdmin {

    function isAdmin(){
        if ( isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login=$_SESSION['login'];
            $role=$_SESSION['role'];
            return new Admin($login,$role);
        }
        else
            return null;
    }

    public static function creerNews($title, $content, $image){

        Validation::val_form_news($title,$content, $image);

        $gateWay = new GatewayNews();
        $gateWay->ajouterNews($title,$content,$image);
    }
    public static function deleteNews($id){
        $gateWay = new GatewayNews();
        $gateWay->supprimerNews($id);
    }

    public static function deleteCommentaire($id){
        $gateWay= new GatewayCommentaire();
        $gateWay->supprimerCommentaire($id);
    }
}
?>