<?php

class GatewayUtilisateur
{
    private $con ;
    function __construct(){
        global $con;
        $this->con = $con;
    }
    public function getPasswordHash($login){
        $query = "SELECT password FROM utilisateur WHERE login = :login";
        if ($this->con->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR)))) {
            return $this->con->getResults()[0]['password'];
        } else {
            throw new \mysql_xdevapi\Exception("GatewayUtilisateur getPasswordHash : la commande SQL ne peut pas être executé");
        }

    }

    public function ajouterUtilisateur($login,$password){

        $query = "INSERT INTO utilisateur(login,password,isAdmin) VALUES (:login,:password,FALSE)" ;
        $this->con->executeQuery($query,array(
            ':login' => array($login, PDO::PARAM_STR),
            ':password' => array($password,PDO::PARAM_STR)
        ));
    }

    public function isAdmin($login){

        $query = "SELECT isAdmin FROM utilisateur WHERE login = :login AND isAdmin";

        if ($this->con->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR)))) {
            error_reporting(E_ERROR | E_PARSE);
            return $this->con->getResults()[0];
        } else {
            throw new \mysql_xdevapi\Exception("GatewayUtilisateur isAdmin : la commande SQL ne peut pas être executé");
        }
    }
}