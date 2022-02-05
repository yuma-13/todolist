<?php
require('function.php');
$db = dbconnect();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>詳細</title>
</head>
<body>
    <?php
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
    <div>
        <a href="main.php">←戻る</a>
        <h3><?php echo $title; ?></h3>
        <pre><?php echo $memo; ?></pre>
        <p>
            <a href="update.php?id=<?php echo $id; ?>">編集</a>
            |
            <a href="del.php?id=<?php echo $id; ?>">削除</a>
        </p>
    </div>
</body>
</html>