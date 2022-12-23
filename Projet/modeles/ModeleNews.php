<?php

class ModeleNews {

    public static function getNews(){
        $gateway=new GatewayNews();
        return $gateway->getAllNews();
    }

    public static function getNewsByID($id){
        $gateway=new GatewayNews();
        return $gateway->getNewsByID($id);
    }

    public static function getNombreCommentaire($newsid){
        $gateway=new GatewayCommentaire();
        return $gateway->getNombreCommentaires($newsid);
    }

    public static function findNewsByTitle($newstitle){
        $gateway=new GatewayNews();
        return $gateway->findNewsByTitle($newstitle);
    }

    public static function getNombreAllCommentaires(){
        $gateway=new GatewayCommentaire();
        return $gateway->getNombreAllCommentaires();
    }

    public static function getCommentaires($newsid){
        $gateway=new GatewayCommentaire();
        return $gateway->getCommentaires($newsid);
    }
}
?>