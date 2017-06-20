<?php
/**
 * Created by PhpStorm.
 * User: mater
 * Date: 15.06.2017
 * Time: 21:06
 */
require_once "function.php";
session_start();

class user1
{
    public $name, $surname, $id, $ico;
    private $pass, $log;

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
            $this->log = $db['log'];
            $this->pass = $db['pass'];
            $_SESSION['name'] = $this->name;
            $_SESSION['surname'] = $this->surname;
            $_SESSION['id'] = $this->id;
            $_SESSION['ico'] = $this->ico;
            $mysqli->close();
        } else return null;
    }
}
class news1
{
    public $title, $text, $author_id;
    function load_all(){
        $mysqli = connect();
        $sql = "SELECT * FROM news";
        $result = mysqli_query($mysqli, $sql);
        while($db = $result->fetch_array()){
            $this->title[]=$db['title'];
            $this->text[]=$db['text'];
            $this->author_id[]=$db['author_id'];
        }
    }
}
echo "<pre>";
$try = new user1('dark','1111');
$try1 = new news();
$try1->load_all();
//var_dump($try1);
for ($i = 0; $i < count($try1->title); $i++){
    echo $try1->title["{$i}"],"<br>";
    echo $try1->text["{$i}"],"<br>";
    echo $try1->author_id["{$i}"],"<br>";
}
echo $try->name;
echo $try1->text;