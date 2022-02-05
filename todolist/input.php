<?php
require('function.php');
$db = dbconnect();
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$memo = filter_input(INPUT_POST, 'memo', FILTER_SANITIZE_SPECIAL_CHARS);

if(isset($title)){
    $stmt = $db->prepare('insert into todo(title, memo) values(?, ?)');
    if(!$stmt){
        die($db->error);
    }

    $stmt->bind_param('ss', $title, $memo);
    $ret = $stmt->execute();
    if(!$ret){
        die($db->error);
    }else{
        header('Location: main.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>登録</title>
</head>
<body>
    <h1>ToDoリスト</h1>
    <form action="" method="post">
        <textarea name="title"  cols="30" row="1" placeholder="タイトルを入力"></textarea><br>
        <textarea name="memo"cols="30" rows="5" placeholder="内容を入力"></textarea><br>
        <button type="submit">登録</button>
    </form>
</body>
</html>