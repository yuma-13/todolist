<?php
require('function.php');
$db = dbconnect();

$stmt = $db->prepare('delete from todo where id=?');
if(!$stmt){
    die($db->error);
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$stmt->bind_param('i', $id);
$ret = $stmt->execute();
if(!$ret){
    die($db->error);
}

header('Location: main.php');
exit();
?>