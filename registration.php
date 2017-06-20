<?php
/**
 * Created by PhpStorm.
 * User: mater
 * Date: 14.06.2017
 * Time: 17:15
 */
session_start();
require_once "function.php";
require_once "class.php";
if (isset($_SESSION['id']))
{
    session_destroy();
    header("Location: http://studway/profile.php?id={$_SESSION['id']}");
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Studway</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body class="login_page">
    <nav id="nav" class="nav">
        <div class="positioner">
            <ul class="nav-menu-list">
                <li class="nav-menu-item"><a href="http://studway/profile.php" class="nav-menu-link">Профиль</a></li>
                <li class="nav-menu-item"><a href="http://studway/galery.php" class="nav-menu-link">Фото</a></li>
                <li class="nav-menu-item"><a href="http://studway/apps.php" class="nav-menu-link">Приложения</a></li>
                <li class="nav-menu-item"><a href="http://studway/news.php" class="nav-menu-link">Новости</a></li>
            </ul>
        </div>
    </nav>
    <section class="main_logo"></section>
    <section class="greeting">
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolore eum impedit labore modi quisquam similique ullam vitae voluptas. Commodi cumque minima modi nisi, officia quidem ratione reiciendis reprehenderit. Eius.
        </div>
    </section>
    <?
    if(!isset($_GET['id'])){
        echo " <section class=\"log_form\"><form action=\"/redirect.php\" method=\"post\">";
        if($_GET['action']=='wrongpswd'){echo "<div id='msg' class=\"res\">Пароли не совпадают!!!</div>";}
        elseif($_GET['action']=='wronglog'){echo "<div id='msg' class=\"res\">Данный логин уже занят</div>";}
        echo " <input id=\"log\" type=\"text\" class=\"form_element\" name=\"login\"  placeholder=\"Login\">
                <input id=\"pswd1\" type=\"password\" class=\"form_element\" name=\"pswd1\" placeholder=\"Password\">
                <input id=\"pswd2\" type=\"password\" class=\"form_element\" name=\"pswd\" placeholder=\"Password\">
                <input type=\"text\" class=\"form_element\" name=\"name\"  placeholder=\"Name\">
                <input type=\"text\" class=\"form_element\" name=\"surname\"  placeholder=\"Surname\">
                <div id=\"res\">Повторное введение пароля</div>
                <input type=\"submit\" class=\" btn btn-primary form_element log_btn\" name=\"reg_submit\" value=\"LogIn\">
            </form>
        </section>";
    }else{
        echo "<section class=\"log_form\">
                <form action=\"/redirect.php\" method=\"post\">
                <input type=\"text\" class=\"form_element\" name=\"city\"  placeholder=\"City\">
                <input type=\"text\" class=\"form_element\" name=\"country\" placeholder=\"Country\">
                <input type=\"text\" class=\"form_element\" name=\"interests\" placeholder=\"Interests\">
                <input type=\"text\" class=\"form_element\" name=\"about\"  placeholder=\"About\">
                <input type=\"text\" class=\"form_element\" name=\"else\"  placeholder=\"Else about\">
                <input type=\"submit\" class=\" btn btn-primary form_element log_btn\" name=\"add_info_submit\" value=\"LogIn\">
            </form>
        </section>";
    }

    ?>

    <script>
        window.addEventListener("load",function(){
            document.getElementById("log").addEventListener("focus",function(){
                document.getElementById("msg").innerHTML = "";
            });
        })
    </script>
    <script>
        window.addEventListener("load",function(){
            document.getElementById("pswd2").addEventListener("blur",function(){
                var pswd1 = document.getElementById("pswd1"), pswd2 = document.getElementById("pswd2");
                if(pswd1.value!=pswd2.value){
                    pswd2.value = "";
                    document.getElementById("res").innerHTML = "Пароли не совпадают";
                }
                else document.getElementById("res").innerHTML = "ОК!";
            });
        })
    </script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
</body>