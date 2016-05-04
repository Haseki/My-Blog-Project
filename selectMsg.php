<?php
include './DAPHP.php';
$id=0;
$id = intval($_POST['id']);

$result = selectDBforAdmin("*", "feedbacks", "f_id = ".$id);

$title = $email = $name = $content = "";

if($result){
    $name = $result['name'];
    $content = $result['message'];
    $email = "From: ".$result['email'];
    $title = $name." --- ".$email;
}

$result2 = updateDB("feedbacks", "status = 1", "f_id = $id");

echo "<div class='message_title'>$title</div><div id='content'>$content</div><button class='msg_button' onclick = 'deleteMsg($id)'>Delete</button>";
        