<?php
include './DAPHP.php';
$q = 0;
$q = intval($_POST['q']);
$fid = $name = "";
$result = selectDBnof("*", "feedbacks", "status = ".$q);
echo "<ul>";
while($row = mysqli_fetch_array($result)) {
   
    if($q == 0){
        $fid = $row['f_id'];
        $name = $row['name'];
        echo "<li> <button class='msg_item_unread' onclick = 'msgSelect(".$fid.")'><bold> $name </bold></button></li>";
    
    } else if ($q == 1){
        $fid = $row['f_id'];
        $name = $row['name'];
        echo "<li> <button class='msg_item_read' onclick = 'msgSelect(".$fid.")'> $name </button></li>";
    }
}
echo "</ul>";
?>