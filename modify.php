<?php
$dbh = new PDO('mysql:host=localhost;dbname=opentutorials', 'root', 'root');
$stmt = $dbh->prepare('SELECT * FROM topic WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$id = $_GET['id'];
$stmt->execute();
$topic = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
<form action="./process.php?mode=modify" method="POST">
    <input type="hidden" name="id" value="<?=$topic['id']?>" />
    <p>タイトル : <input type="text" name="title" value="<?=htmlspecialchars($topic['title'])?>"></p>
    <p>本文 : <textarea name="description" id="" cols="30" rows="10"><?=htmlspecialchars($topic['description'])?></textarea></p>
    <p><input type="submit" /></p>
</form>
</body>
</html>