<?php

/**
 * Created by PhpStorm.
 * User: mater
 * Date: 20.02.2017
 * Time: 2:37
 */
require_once "function.php";
session_start();

class user
{
    private $name, $surname, $id, $ico;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIco()
    {
        return $this->ico;
    }

    /**
     * @param mixed $ico
     */
    public function setIco($ico)
    {
        $this->ico = $ico;
    }

    function __construct($login, $pswd)
    {
        $mysqli = connect();
        $sql = "SELECT * FROM users WHERE log = '$login' AND pass = '$pswd'";
        $result = mysqli_query($mysqli, $sql);
        $db = $result->fetch_array();
        if (isset($db)) {
            $this->name = $db['name'];
            $this->surname = $db['surname'];
            $this->id = $db['id'];
            $this->ico = $db['ico'];
            $_SESSION['name'] = $this->name;
            $_SESSION['surname'] = $this->surname;
            $_SESSION['id'] = $this->id;
            $_SESSION['ico'] = $this->ico;
            $mysqli->close();
        } else return null;
    }
}
class news
{
    public $title, $text, $author_name, $author_surname, $author_ico, $author_id;
    function load_all(){
        $mysqli = connect();
        $sql = "SELECT * FROM news";
        $result = mysqli_query($mysqli, $sql);
        while($db = $result->fetch_array()){
            $this->author_id = $db['author_id'];
            $sql1 = "SELECT * FROM users WHERE id = '$this->author_id'";
            $result1 = mysqli_query($mysqli, $sql1);
            $src = $result1->fetch_array();
            $this->title[]=$db['title'];
            $this->text[]=$db['text'];
            $this->author_name[]=$src['name'];
            $this->author_surname[]=$src['surname'];
            $this->author_ico[]=$src['ico'];
        }
        $mysqli->close();
    }
}