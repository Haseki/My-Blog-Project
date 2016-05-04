<!DOCTYPE html>

<?php
include 'DAPHP.php';
include './normalMenu.php';
// define variables and set to empty values
$nameErr = $passErr = $msgErr = "";
$name = $mail = $msg = $status = "";
$formcontent = $recipient = $subject = $mailheader = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Username is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-ZiİşŞğĞüÜöÖçÇ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["mail"])) {
        $passErr = "E-mail is required";
    } else {
        $mail = test_input($_POST["mail"]);

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $passErr = "Invalid email format";
        }
    }

    if (empty($_POST["message"])) {
        $msgErr = "Gender is required";
    } else {
        $msg = test_input($_POST["message"]);
    }

    
    $result = insertDB(" feedbacks( name, email, message)", "('$name','$mail',\"".$msg."\")");
    
    if ($result == false)
        echo 'Hata VAR!';
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form_style">
    <span class="byline">Name : </span><br>
    <label class="fault"><?php echo "$nameErr"; ?></label><br>
    <input type="text" name="name" id = "text"><br><br>
        <span class="byline">Mail : </span><br>
        <label class="fault"><?php echo "$passErr"; ?></label><br>
        <input type="text" name="mail" id = "text"><br><br>
            <span class="byline">Message : </span><br>
            <label class="fault"><?php echo "$msgErr"; ?></label><br>
            <textarea cols="40" rows="5" name="message" id="textfield"></textarea><br><br>
            <input type="submit" name="submit"  value="Send" id="button"><br><br>
                <label class="fault"><?php echo "$status"; ?></label><br>
                </form>


                <div id="copyright" class="container">
                    <p>&copy;Hakan O. Vural - All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
                </div>
                </body>
                </html>
