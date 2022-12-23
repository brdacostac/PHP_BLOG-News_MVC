<?php

class Validation {

    static function val_action($action) {

        if ($action != filter_var($action,FILTER_SANITIZE_STRING)){
            throw new Exception("L'action n'est pas valide");
        }

    }

    public static function validateString(string $string){
        if(filter_var($string, FILTER_SANITIZE_STRING) != $string) throw new Exception("Le string '".$string."' n'est pas valide.");
        return $string;
    }

    static function val_form_news(string &$title,string &$content, string &$image) {

        if (!isset($title)||$title==""||!filter_var($title,FILTER_SANITIZE_STRING)) {
            throw new Exception("Le titre ne peut pas être vide");
        }
        if (!isset($content)||$content==""||!filter_var($content,FILTER_SANITIZE_STRING)) {
            throw new Exception("Le contenu ne peut pas être vide");
        }
        if (!isset($image)||$image==""||!filter_var($content,FILTER_SANITIZE_STRING)) {
            throw new Exception("L'image ne peut pas être vide");
        }
    }

    public static function validateInt(string $int){
        if(filter_var($int, FILTER_SANITIZE_NUMBER_INT) != $int) throw new Exception("Le nombre '".$int."' n'est pas valide.");
        return $int;
    }

    public static function validateLogin(string $login){ //sert pour les taches et les listes
        if ($login == NULL) {
            throw new Exception("Le login ne peut être vide");
        } else {
            if (!preg_match('/[a-zA-Z].{4,50}/', $login)) {
                throw new Exception("Le login : '".$login."' n'est pas valide. Il doit contenir au moins 5 caractères, et doit commencer par une lettre.");
            }
            return Validation::validateString($login);
        }
    }

    public static function validatePassword(string $password){
        if ($password == NULL) {
            throw new Exception("Le mot de passe ne peut être vide");
        } else {
            if (!preg_match('/^.{8,}$/', $password)) {
                throw new Exception("Le mot de passe n'est pas valide. Il doit contenir au moins 8 caractères");
            }
            return Validation::validateString($password);
        }
    }

    static function val_form_commentaire(string &$content,string &$userLogin, int &$newsId) {

        if (!isset($content)||$content==""||!filter_var($content,FILTER_SANITIZE_STRING)) {
            throw new Exception("Le contenu ne peut pas être vide");
        }

        if (!isset($userLogin)||$userLogin==""||!filter_var($userLogin, FILTER_SANITIZE_STRING)) {
            throw new Exception("Il faut être connecté");
        }

        if (!isset($newsId)||$newsId==""||!filter_var($newsId, FILTER_VALIDATE_INT)) {
            throw new Exception("Il faut commenter dans une News qui existe");
        }
    }
}
?>

        