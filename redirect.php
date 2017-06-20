<?php
/**
 * Created by PhpStorm.
 * User: mater
 * Date: 20.06.2017
 * Time: 16:20
 */
session_start();
require_once "function.php";
require_once "class.php";
if (isset($_POST['log_submit'])){
    $user = new user();
    var_dump($user);
    $user->load_user($_POST['login'],$_POST['pswd']);
    echo "<br>";
    var_dump($user);
}