<!DOCTYPE html>
<?php
include './DAPHP.php';
session_start();
$_SESSION['password'] = "Guest";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            </div>
        </div>
    </div>

    <?php
    // define variables and set to empty values
    $nameErr = $passErr = "";
    $name = $pass = "";
    $status = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Username is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["pass"])) {
            $passErr = "Password is required";
        } else {
            $pass = test_input($_POST["pass"]);
            $pass = md5($pass);
        }

        $result = selectDBforAdmin(" * ", " admins ", " username = '".$name."' AND password = '".$pass."'");

        if (!$result) {
            $status = "Invalid username / password combination";
        } else {
            $_SESSION['name'] = $result['username'];
            $_SESSION['id'] = $result['id'];
            $id = $_SESSION['id'];
            $_SESSION['pass'] = $pass;
            $date = date('m/d/Y h:i:s a', time());
            $try = updateDB("admins", " entry = '$date' ", " id = '$id' ");
            if(!$try){
                echo 'Hata';
            }else {
            $_SESSION['entry'] = $date;
            header("location:adminMain.php"); }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>


    <div id="extra" class="container">
        <div class="title">
            <h2>Welcome, Please enter your information</h2>
        </div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form_style">
            <label class="formlabel">Username:</label><br>
            <label class="fault"> <?php echo $nameErr; ?> </label><br>
            <input type="text" name="name" id="text"><br><br>
                <label class="formlabel">Password:</label><br>
                <label class="fault"> <?php echo $passErr; ?> </label><br>
                <input type="password" name="pass" id="text"><br><br>
                    <input type="submit" name="submit" value="ENTER" id="button"><br><br>
                        <label class="fault"> <?php echo $status; ?> </label><br>
                        </form> 

                        </div>   
                        </div>


                        <div id="copyright" class="container">
                            <p>&copy;Hakan O. Vural - All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a> and ME.</p>
                        </div>

                        <?php
                        // put your code here
                        ?>
                        </body>
                        </html>

