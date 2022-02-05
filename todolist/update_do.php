<?php
require('function.php');
$db = dbconnect();

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$memo = filter_input(INPUT_POST, 'memo', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$stmt = $db->prepare('update todo set title=?, memo=? where id=?');
if(!$stmt){
    die($db->error);
}
$stmt->bind_param('ssi', $title, $memo, $id);
$ret = $stmt->execute();
if(!$ret){
    die($db->error);
}
header('Location: sub.php?id=' . $id);
exit();
?>