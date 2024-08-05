<?php
// includes フォルダの login.phpを読み込む
include 'includes/login.php';

$id = intval($_POST['id']);
$pass = $_POST['pass'];
$token = $_POST['token'];
// トークンのチェック

if ($token != hash("sha256", session_id())) {
    header("Location: bbs.php"); // bbs.phpへ移動する
    exit(); // プログラム終了
}
    
if ($id == '' || $pass == '') {
    header('Location: bbs.php');
    exit();
}
// DBに接続。接続先、ユーザー名、パスワード
$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
$user = 'tennisuser';
$password = 'password';
try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("DELETE FROM bbs WHERE id=:id AND pass=:pass");
    
    // パラメータ割り当て。
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);

    $stmt->execute(); // 実際に実行する　
} catch (PDOException $e){
  exit("エラー: " . $e->getMessage());
}
header('Location: bbs.php');
exit();
// 教科書のコードだと、すぐにリダイレクトされる
// 削除されたかどうかはデータベースで確認する
?>