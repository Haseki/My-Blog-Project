<?php

function isCurrent($link){
    $current = filter_var($_SERVER['SCRIPT_NAME'] , FILTER_DEFAULT);
    if($link == $current){
        return "class = \"current_page_item\"";
    }else {
        return "";
    } 
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title></title>
    <link href="http://fonts.googleapis.com/css?family=Varela" rel="stylesheet" />
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="myBlog.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
    <title></title>
</head>
<body>

<div id="wrapper">
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1><a href="index.php">Hakan O. Vural</a></h1>
            </div>
            <div id="menu">
                <ul>
                    <li <?php echo isCurrent("/MyBlog/index.php"); ?> > <a href="index.php" accesskey="1" title="">Homepage</a> </li>
                    <li <?php echo isCurrent("/MyBlog/articles.php"); ?> > <a href="articles.php" accesskey="2" title="">Articles</a> </li>
                    <li <?php echo isCurrent("/MyBlog/aboutMe.php"); ?> > <a href="aboutMe.php" accesskey="3" title="">About Me</a> </li>
                    <li <?php echo isCurrent("/MyBlog/contactMe.php"); ?> > <a href="contactMe.php" accesskey="5" title="">Contact Me</a> </li>
                    <li> <a href="admin.php" accesskey="5" title=""><span class="fa fa-cogs"></span></a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>




