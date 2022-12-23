<?php

class GatewayNews{

    private $con ;
    function __construct(){
        global $con;
        $this->con = $con;
    }




    public function supprimerNews($id){
        $query = "DELETE FROM news WHERE id = :id";
        $query2 = "DELETE FROM commentaire WHERE newsid = :id";
        $this->con->executeQuery($query,array(':id' => array($id, PDO::PARAM_INT)));
        $this->con->executeQuery($query2,array(':id' => array($id, PDO::PARAM_INT)));
    }


    public function ajouterNews($title,$content,$image){
        $query = "INSERT INTO news(title,content,date,image) VALUES (:title,:content, current_date,:image)";
        $this->con->executeQuery($query,array(
            ':title' => array($title, PDO::PARAM_STR),
            ':content' => array($content,PDO::PARAM_STR),
            'image' => array($image,PDO::PARAM_STR)
        ));
    }

    public function findNewsByTitle($title){
        $query = "SELECT * FROM news WHERE title LIKE '".$title."%'";
        $this->con->executeQuery($query);
        $news = [];
        foreach ($this->con->getResults() as $article) {
            $news[] = new News($article["id"],$article["title"],$article["content"],$article["image"],$article["date"]);
        }
        return $news;
    }

    public function getNewsByID($id){
        $query = "SELECT * FROM news WHERE id = :id";
        $this->con->executeQuery($query,array(':id' => array($id, PDO::PARAM_INT)));
        $article= $this->con->getResults()[0];

        return new News($article["id"],$article["title"],$article["content"],$article["image"],$article["date"]);
    }

    public function getAllNews(){

        $query = "SELECT * FROM news ORDER BY date DESC";
        $this->con->executeQuery($query);

        $news = [];
        foreach ($this->con->getResults() as $article) {
            $news[] = new News($article["id"],$article["title"],$article["content"],$article["image"],$article["date"]);
        }
        return $news;

    }


}
?>