<?php
$name = $_POST['name'];
$title = $_POST['title'];
$body = $_POST['body'];
$pass = $_POST['pass'];

if ($name == "" || $title == "") {
    header("Location: bbs.php");
    exit();
}

if (!preg_match("/^[0-9]{4}+$/", $pass)) {
    header("Location: bbs.php");
    exit();
}

// DBに接続
$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
$user = 'tennisuser';
$password = 'password';



try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("INSERT INTO bbs (name, title, body, date, pass) VALUES (:name, :title, :body, now(), :pass)");


    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':body', $body, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);

    $stmt->execute();

    header("Location: bbs.php");
    exit();
} catch (PDOException $e) {
    exit("エラー" . $e->getMessage());
}
