<?php
require('function.php');
$db = dbconnect();

$todos = $db->query('select * from todo order by id desc');
if(!$todos){
    die($db->error);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>一覧</title>
</head>
<body>
    <h1>ToDoリスト</h1>
    <a href="input.php">+追加</a>
    <ul>
        <?php while ($todo = $todos->fetch_assoc()):?>
        <li>
           <a href="sub.php?id=<?php echo $todo['id'];?>"><p><?php echo $todo['title'];?></p></a>
           <time><?php echo $todo['created'];?></time>
        </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>