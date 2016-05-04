<?php
include './DAPHP.php';
$id=0;
$id = intval($_POST['id']);

$result = deleteDB("professions", "id = $id");

