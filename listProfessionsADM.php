<?php

include './DAPHP.php';

$id = $title = $summary = $img_src ="";
$result = selectDBnof("*", "professions", 1);
$teori = $pratik = "";

$cou= 0;
while ($row = mysqli_fetch_array($result)) {

        $id = $row['id'];
        $title = $row['title'];
        $summary = $row['summary'];
        $img_src = $row['img_src'];
        $teori = $row['teori'];
        $pratik = $row['pratik'];
        $teoriStar = starWrite($teori);
        $pratikStar = starWrite($pratik);
        
        if($cou == 0){
        echo "<div class='abm_white'>
            <table>
                 <td>
                <img class='abm_image' src='$img_src'></img>
                 </td>
                 <td>
                <div class='abm_textarea_dark'> <label id='title_low'>$title<label></div>
                    <div class='abm_textarea_dark'> <p id='text_low'>$summary</p></div>
                <div class = 'star_field'><label>Theory: </label id='text_low'>$teoriStar</div>
                <div class = 'star_field'><label>Pratical: </label id='text_low'>$pratikStar</div>
                <div class = 'star_field'><button class='edit_button_dark' onclick='editProfession($id)'>EDIT</button>
                    <button class='edit_button_dark' onclick='deleteProfession($id)'>DELETE</button></div>
                </td>
            </table>
            </div>";
        
        $cou = ($cou + 1) % 2;
        }else {
        echo "<div class='abm_blue'>
            <table>
                 <td>
                <img class='abm_image' src='$img_src'></img>
                 </td>
                 <td>
                <div class='abm_textarea_white'> <label id='title_low'>$title<label></div>
                    <div class='abm_textarea_white'> <p id='text_low'>$summary</p></div>
                <div class = 'star_field'><label>Theory: </label id='text_low'>$teoriStar</div>
                <div class = 'star_field'><label>Pratical: </label id='text_low'>$pratikStar</div>
                <div class = 'star_field'><button class='edit_button_white' onclick='editProfession($id)'>EDIT</button>
                    <button class='edit_button_white' onclick='deleteProfession($id)'>DELETE</button></div>
                </td>
            </table>
            </div>";
        $cou = ($cou + 1) % 2;
        }
        
}

function starWrite($number) {
    $str ="";
    
    while($number > 0 ){
           $str .= ""."<img src=./images/star.png class='star'></img>";
           $number--;
    }
    
    return $str;
}