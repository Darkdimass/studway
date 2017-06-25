<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/photobox.css">
    <script src='js/jquery.photobox.js'></script>
    <script src="/js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div id='gallery'>
    <a href="img/03.png">
        <img src="img/03s.png"
             title="photo1 title">
    </a>
    <a href="img/slide-1.jpg">
        <img src="img/slide-1s.jpg"
             alt="photo2 title">
    </a>

</div>
...
...
...
<script>
    // applying photobox on a `gallery` element which has lots of thumbnails links.
    // Passing options object as well:
    //-----------------------------------------------
    $('#gallery').photobox('a',{ time:0 });

    // using a callback and a fancier selector
    //----------------------------------------------
    $('#gallery').photobox('li > a.family',{ time:0 }, callback);
    function callback(){
        console.log('image has been loaded');
    }

    // destroy the plugin on a certain gallery:
    //-----------------------------------------------
    $('#gallery').photobox('destroy');

    // re-initialize the photbox DOM (does what Document ready does)
    //-----------------------------------------------
    $('#gallery').photobox('prepareDOM');
</script>
</body>