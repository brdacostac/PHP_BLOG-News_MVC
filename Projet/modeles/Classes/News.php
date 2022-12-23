<?php

/**
 *
 */
class News
{

    private $_id;
    private $_title;
    private $_content;
    private $_date;
    private $_image;
    private $_userId;


    public function __construct($id,$title,$content,$image,$date)
    {
        $this->_id = $id;
        $this->_image=$image;
        $this->_date = $date;
        $this->_title = $title;
        $this->_content = $content;
    }

    //setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setDate($date)
    {
        $this->_date = $date;

    }

    public function setImage($image): void
    {
        $this->_image = $image;
    }

    public function setUserId($userId): void
    {
        $this->_userId = $userId;
    }

    //getters
    public function getId()
    {
        return $this->_id;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function getDate()
    {
        return $this->_date;
    }

    public function getImage()
    {
        return $this->_image;
    }

    public function getUserId()
    {
        return $this->_userId;
    }


}