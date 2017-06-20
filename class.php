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
    private $name, $surname, $id, $ico, $city, $country, $interests, $about, $else;


    public function getCity()
    {
        return $this->city;
    }


    public function setCity($city)
    {
        $this->city = $city;
    }


    public function getCountry()
    {
        return $this->country;
    }


    public function setCountry($country)
    {
        $this->country = $country;
    }


    public function getInterests()
    {
        return $this->interests;
    }


    public function setInterests($interests)
    {
        $this->interests = $interests;
    }


    public function getAbout()
    {
        return $this->about;
    }


    public function setAbout($about)
    {
        $this->about = $about;
    }


    public function getElse()
    {
        return $this->else;
    }


    public function setElse($else)
    {
        $this->else = $else;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIco()
    {
        return $this->ico;
    }

    public function setIco($ico)
    {
        $this->ico = $ico;
    }

    function __construct($login, $pswd)
    {
        $mysqli = connect();
        $sql = "SELECT * FROM users INNER JOIN additional_data ON users.id = additional_data.user_id WHERE users.log = '{$login}' AND users.pswd = '{$pswd}'";
        $result = mysqli_query($mysqli, $sql);
        $db = $result->fetch_array();
        if (isset($db)) {
            $this->id = $db['id'];
            $this->name = $db['name'];
            $this->surname = $db['surname'];
            $this->ico = $db['ico'];
            $this->city = $db['city'];
            $this->country = $db['country'];
            $this->interests = $db['interests'];
            $this->about = $db['about'];
            $this->else = $db['else'];
        } else return null;
        $mysqli->close();
    }

    static function store_user($login, $pswd, $name, $surname)
    {
        $mysqli = connect();
        $sql = "SELECT log FROM users WHERE log = '$login'";
        $result = mysqli_query($mysqli, $sql);
        $result = $result->fetch_array();
        if (!isset($result)){
        $sql = "INSERT INTO users (log,pass,name,surname) VALUES ('$login','$pswd','$name','$surname')";
        mysqli_query($mysqli, $sql);
        }else{return "error";}
        $mysqli->close();
    }

    function access_granted(){
        $_SESSION['name'] = $this->name;
        $_SESSION['surname'] = $this->surname;
        $_SESSION['id'] = $this->id;
        $_SESSION['ico'] = $this->ico;
        $_SESSION['city'] = $this->city;
        $_SESSION['country'] = $this->country;
        $_SESSION['interests'] = $this->interests;
        $_SESSION['about'] = $this->about;
        $_SESSION['else'] = $this->else;
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
    function load_my_news(){
        $mysqli = connect();
        $sql = "SELECT * FROM news WHERE author_id = '{$_SESSION['id']}'";
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