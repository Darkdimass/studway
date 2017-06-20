<?php
/**
 * Created by PhpStorm.
 * User: mater
 * Date: 15.06.2017
 * Time: 0:03
 */

session_start();
require_once "function.php";
require_once "class.php";
$news = new news();
$news->load_all();


//if (!isset($_SESSION['user']))
//{header('Location: http://studway');}
$mysqli = connect();
$sql = "SELECT * FROM users INNER JOIN additional_data ON users.id = additional_data.user_id WHERE users.id = '{$_GET['id']}'";
$result = mysqli_query($mysqli, $sql);
$src = $result->fetch_array();
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Studway</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/ajax.js"></script>
</head>
<body id="top" class="login_page">

<nav id="nav" class="nav">
    <div class="positioner">
        <ul class="nav-menu-list">
            <li class="nav-menu-item"><a href="http://studway/profile.php?id=<?echo $_SESSION['id'];?>" class="nav-menu-link">Профиль</a></li>
            <li class="nav-menu-item"><a href="http://studway/apps.php" class="nav-menu-link">Приложения</a></li>
            <li class="nav-menu-item"><a href="http://studway/news.php" class="nav-menu-link">Новости</a></li>
            <li class="nav-menu-item"><a href="http://studway/redirect.php?action=log_out" class="nav-menu-link">log Out</a></li>
        </ul>
    </div>
</nav>


<section class="profile_logo"></section>
<section contenteditable="true" class="profilePage">
    <div class="profile_info">
        <img class="profileImage" src="<? echo $src['ico'];?>">
        <div class="name"><? echo $src['surname']," ", $src['name'];?> </div>
        <div  class="data"><hr class="xs">
            <div>City: <br> <? echo $src['city']?></div><hr class="xs">
            <div>Counnews: <br> <? echo $src['counnews']?></div><hr class="xs">
            <div>Interests:<br> <? echo $src['interests']?></div><hr class="xs">
            <div>About me: <br><? echo $src['about']?></div><hr class="xs">
            <div>Else: <br><? echo $src['else']?></div><hr class="xs">
        </div>
    </div>

</section>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript">
    var navMenu = document.getElementById('nav');
    var navMenuOffset = navMenu.offsetTop;

    window.addEventListener('scroll', stickyMenu, false);
    window.addEventListener('touchmove', stickyMenu, false);


    function stickyMenu() {
        if (window.pageYOffset > navMenuOffset) {
            navMenu.classList.add('fixed-nav');
        } else {
            navMenu.classList.remove('fixed-nav');
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#nav").on("click","a", function (event) {
            //отменяем стандартную обработку нажатия по ссылке
//            event.preventDefault();
            //забираем идентификатор бока с атрибута href
            var id  = $(this).attr('href'),
                //узнаем высоту от начала страницы до блока на который ссылается якорь
                top = $(id).offset().top;
            //анимируем переход на расстояние - top за 1500 мс
            $('body,html').animate({scrollTop: top-$("#nav").height()}, 1500);
        });
    });
</script>
<!--<script>-->
<!--    $.ajax({-->
<!--        url: "http://studway/ajax.php",-->
<!--        success: function(data){-->
<!--            alert( data );-->
<!--            data = $.parseJSON(data);-->
<!--            alert( data['key'] );-->
<!--        }-->
<!--    });-->
<!--</script>-->


</body>
