<?php
include './DAPHP.php';

$admin_row = selectDBforAdmin("password as p , entry as e", "admins", "1");

session_start();
if ($_SESSION['pass'] != $admin_row['p'] || $_SESSION['entry'] != $admin_row['e']) {
    session_destroy();
    session_abort();
    header("location:admin.php");
}


$status = countDB("status", "num", "feedbacks", "status = 0");

if ($status ) {
    $unread = $status;
} else {
    $unread = 0;
}

function isCurrent($link) {
    $current = filter_var($_SERVER['SCRIPT_NAME'], FILTER_DEFAULT);
    if ($link == $current) {
        return "class = \"current_page_item\"";
    } else {
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
                    <li <?php echo isCurrent("/MyBlog/adminMain.php"); ?> ><a href="adminMain.php" accesskey="1" title="">Admin</a></li>
                    <li <?php echo isCurrent("/MyBlog/adminArticlesPage.php"); ?>><a href="adminArticlesPage.php" accesskey="2" title="">Articles</a></li>
                    <li <?php echo isCurrent("/MyBlog/adminMessagePage.php"); ?>><a href="adminMessagePage.php" accesskey="3" title="">Messages ( <?php echo $unread; ?> )</a></li>
                    <li <?php echo isCurrent("/MyBlog/adminCareerPage.php"); ?>><a href="adminCareerPage.php" accesskey="4" title="">Career</a></li>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>




