<?php
function dbconnect(){
    $db = new mysqli('localhost:8889','root','root','todo.db');
    if(!$db){
     die($db->error);
    }
    return $db;
}

function h($v){
    return htmlspecialchars($v, ENT_QUOTES);
}

?>