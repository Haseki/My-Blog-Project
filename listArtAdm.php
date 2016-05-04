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
        $cont = $row['content'];

        if($cnt == 0){
            echo
            "<div class='artadm_white'>
                <table>
                     <td>
                     <img class='abm_image' src='$img_src'></img>
                     </td>
                     <td>
                     <div class='abm_textarea_dark'> <label id='title_low'>$title ==> $id<label></div>
                     <div class='abm_textarea_dark'> <p id='text_low'>Summary : $summary</p></div>
                     <div class='abm_textarea_dark'> <p id='text_low'>Content : $cont</p></div>
                     <div class='abm_textarea_dark'> <a class='editBtnDark' href='./adminArticlesEdit.php?id=$id'>Edit</a></div>
                     <div class='abm_textarea_dark'> <a class='editBtnDark' onclick = 'deleteArt($id)'>Delete</a></div>
                     </td>
                </table>
             </div>";

            $cnt = ($cnt + 1)%2;
        }else {
            echo
            "<div class='artadm_blue'>
                <table>
                     <td>
                     <img class='abm_image' src='$img_src'></img>
                     </td>
                     <td>
                     <div class='abm_textarea_white'> <label id='title_low'>$title ==> $id<label></div>
                     <div class='abm_textarea_white'> <p id='text_low'>Summary : $summary</p></div>
                     <div class='abm_textarea_white'> <p id='text_low'>Content : $cont</p></div>
                     <div class='abm_textarea_white'> <a class='editBtnWhite' href='./adminArticlesEdit.php?id=$id'>Edit</a></div>
                     <div class='abm_textarea_white'> <a class='editBtnWhite' onclick = 'deleteArt($id)'>Delete</a></div>
                     </td>
                </table>
             </div>";
            $cnt = ($cnt + 1)%2;
        }
}
