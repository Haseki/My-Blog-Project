<?php
include './DAPHP.php';
$id=0;
$id = intval($_POST['id']);

$result = selectDBforAdmin("img_dir as imd", "articles", "id = $id");

if($result){
    echo $result['imd'];
} else
{
    echo './image/orange.jpg';
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

