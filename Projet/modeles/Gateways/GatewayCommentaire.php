<?php

class GatewayCommentaire{

    private $con ;

    function __construct(){
        global $con ;

        $this->con = $con;
    }

    public function creerCommentaire($content,$userlogin,$newsid){

        $query = "INSERT INTO commentaire (content,date,userlogin,newsid) VALUES (:content,current_timestamp,:userlogin,:newsid)";
        $this->con->executeQuery($query,array(
            ':content' => array($content,PDO::PARAM_STR),
            ':userlogin' => array($userlogin,PDO::PARAM_STR),
            ':newsid' => array($newsid,PDO::PARAM_INT)
        ));
    }

    public function supprimerCommentaire($idCommentaire){

        $query = "DELETE FROM commentaire WHERE id = :idCommentaire";
        $this->con->executeQuery($query,array(':idCommentaire' => array($idCommentaire, PDO::PARAM_INT)));
    }

    public function getCommentaires($newsid){

        $query = "SELECT * FROM commentaire WHERE newsid = :newsid ORDER BY date ,userlogin";
        $this->con->executeQuery($query,array(':newsid' => array($newsid, PDO::PARAM_INT)));

        $finalRes = [];
        $res= $this->con->getResults();
        $loginAncien="";
        $key="";
        foreach ($res as $resultat) {
            if ($resultat["userlogin"] == $loginAncien)

                array_push($finalRes[$key],new Commentaire($resultat["id"], $resultat["content"], $resultat["date"], $resultat["newsid"], $resultat["userlogin"]));
            else{
                $key=$resultat["userlogin"].$resultat["date"];
                $loginAncien=$resultat["userlogin"];
                $finalRes[$key]=[];
                array_push($finalRes[$key],new Commentaire($resultat["id"], $resultat["content"], $resultat["date"], $resultat["newsid"], $resultat["userlogin"]));
            }
        }

        return $finalRes;

    }

    public function getNombreCommentaires($newsid){

        $query = "SELECT count(id) FROM commentaire WHERE newsid = :newsid";
        $this->con->executeQuery($query,array(':newsid' => array($newsid, PDO::PARAM_INT)));
        $resultat= $this->con->getResults()[0][0];

        return $resultat;

    }

    public function getNombreAllCommentaires(){

        $query = "SELECT count(*) FROM commentaire";
        $this->con->executeQuery($query);
        $resultat= $this->con->getResults()[0][0];

        return $resultat;

    }


}
?>