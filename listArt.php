<?php

include './DAPHP.php';

$id = $title = $summary = $img_src ="";
$result = selectDBnof("*", "articles", 1);

$cnt = 0;

while ($row = mysqli_fetch_array($result)) {

        $id = $row['id'];
        $title = $row['title'];
        $summary = $row['summary'];
        $img_src = $row['img_dir'];

        if($cnt == 0){
            echo
            "<div class='article_blue'>"
            . "<table>"
                    . "<td>"
                    . "<div class='article_left_img'><a href='./articlesView.php?id=$id'><img src='$img_src'></img></a></div>"
                    . "</td>"
                    . "<td><div class='article_text_field'>"
                    . "<label id='title'>$title</label><br>"
                    . "<label id='text'>$summary ...<br>More info "
                    . "<a class='link_white' href ='./articlesView.php?id=$id'>here...</a></label>"
                    . "</div></td>"
                    . "<td><a href='./articlesView.php?id=$id'><div class='article_left_read'>More...</div></a></td>"
            . "</table></div>";

            $cnt = ($cnt + 1)%2;
        }else {
            echo
            "<div class='article_white'>"
            . "<table>"
                    . "<td><a href='./articlesView.php?id=$id'><div class='article_right_read'>More...</div></a></td>"
                    . "<td><div class='article_text_field'><label id='title'>$title</label><br>"
                    . "<label id='text'>$summary<br>"
                    . "More info <a class='link_grey' href='./articlesView.php?id=$id'>here...</a></label></div></td>"
                    . "<td><div class='article_right_img'><a href='./articlesView.php?id=$id'><img src='$img_src'></img></a></div>"
                    . "</td></table></div>";
            $cnt = ($cnt + 1)%2;
        }
}
