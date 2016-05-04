<?php 
include './normalMenu.php';
include './DAPHP.php';
$id = intval($_GET['id']);

$title = $summary = $cont = $img_src ="";
$result = selectDBnof("*", "articles", "id = $id");


while ($row = mysqli_fetch_array($result)) {

        $id = $row['id'];
        $title = $row['title'];
        $summary = $row['summary'];
        $img_src = $row['img_dir'];
        $cont = $row['content'];

            echo
            "<div class='article_blue'>"
            . "<table>"
                    . "<td>"
                    . "<div class='article_left_img'><img src='$img_src'></img></div>"
                    . "</td>"
                    . "<td><div class='article_text_field'>"
                    . "<label id='title'>$title</label><br>"
                    . "<p id='text'>$cont<br>"
                    . "</p>"
                    . "</div></td>"
            . "</table></div>";

}

