<?
session_start();
require_once "function.php";
require_once "class.php";

user::store_user('new_user','SomePassword','user 1','surname of user 1');
