<?php

include './DAPHP.php';

$id = $title = $summary = $img_src ="";
$result = selectDBnof("*", "projects", 1);
$lik = "";

$cou = 0;
while ($row = mysqli_fetch_array($result)) {

        $id = $row['id'];
        $title = $row['title'];
        $summary = $row['summary'];
        $img_src = $row['img_src'];
        $link = $row['link'];
        
        
        if($cou == 0){
        echo "<div class='abm_blue'>
            <table>
                <td>
                <img class='abm_image' src='$img_src'></img>
                </td>
                <td>
                <div class='abm_textarea_white'> <label id='title_low'>$title<label></div>
                <div class='abm_textarea_white'> <p id='text_low'>$summary</p></div>";
                
        
        if(!filter_var($link, FILTER_VALIDATE_URL) === false){
                echo "<div class='abm_textarea_white'> <p id='text_low'>For more -> <a class ='cv' href = '$link'> Here </a></p></div>";
        }
        echo "  <div class='star_field'><button class ='edit_button_white' onclick='editProject($id)'>EDIT</button>
                <button class ='edit_button_white' onclick='deleteProject($id)'>DELETE</button>
                </div></td>
                </table>
                </div>";
        
        $cou = ($cou + 1) %2;
        } else {
        echo "<div class='abm_white'>
            <table>
                <td>
                <img class='abm_image' src='$img_src'></img>
                </td>
                <td>
                <div class='abm_textarea_dark'> <label id='title_low'>$title<label></div>
                <div class='abm_textarea_dark'> <p id='text_low'>$summary</p></div>";
        if(!filter_var($link, FILTER_VALIDATE_URL) === false){
                echo "<div class='abm_textarea_dark'> <p id='text_low'>For more -> <a class ='cv' href = '$link'> Here </a></p></div>";
        }
        echo "  <div class='star_field'><button class ='edit_button_dark' onclick='editProject($id)'>EDIT</button>
                <button class ='edit_button_dark' onclick='deleteProject($id)'>DELETE</button>
                </div></td>
                </table>
                </div>";
        
        $cou = ($cou + 1) %2;
        }
        
        
               
        
}
