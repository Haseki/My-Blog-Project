<?php
include './DAPHP.php';
$id=0;
$id = intval($_POST['id']);

$result = deleteDB("projects", "id = $id");

