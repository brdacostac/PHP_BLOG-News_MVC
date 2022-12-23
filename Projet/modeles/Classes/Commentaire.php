<?php

class Commentaire {

    private $id;

    private $content;
    private $date;

    private $newsid;
    private $userlogin;

    function __construct($id,$content,$date,$newsid,$userlogin){
        $this->date = $date;
        $this->content = $content;
        $this->id = $id;
        $this->newsid=$newsid;
        $this->userlogin = $userlogin;
    }

    public function getNewsid()
    {
        return $this->newsid;
    }
    public function getId(){
        return $this->id;
    }
    public function getUserlogin()
    {
        return $this->userlogin;
    }

    public function getContent(){
        return  $this->content;
    }

    public function getDate(){
        return $this->date;
    }

}
?>