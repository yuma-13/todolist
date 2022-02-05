<?php
require('function.php');
$db = dbconnect();

$stmt = $db->prepare('select * from todo where id=?');
if(!$stmt){
    die($db->error);
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$stmt->bind_param('i', $id);
$ret = $stmt->execute();
if(!$ret){
    die($db->error);
}
$stmt->bind_result($id, $title, $memo, $created);
$stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>編集</title>
</head>
<body>
    <h1>内容を変更</h1>
    <form action="update_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <textarea name="title"  cols="30" row="1" placeholder="タイトルを入力"><?php echo $title; ?></textarea><br>
        <textarea name="memo"cols="30" rows="5" placeholder="内容を入力"><?php echo $memo; ?></textarea><br>
        <button type="submit">登録</button>
    </form>
</body>
</html>