<?php
// p271-273 リスト12-3
// セッション開
session_start();

if (isset($_SESSION['id'])) {
    // ログイン済みなら、indexへ
    header('Location: index.php');
} else if (isset($_POST['name']) && isset($_POST['password'])){
  // ユーザー名とパスワードが入力されたら、ユーザをチェックする(パスワードが正しいか)
  // DBに接続。接続先、ユーザー名、パスワード
  $dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
  $user = 'tennisuser';
  $password = 'password';

  try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("SELECT * FROM users WHERE name=:name AND password=:pass");
    // SELECT カラム FROM テーブル // 大きさ: テーブル＞カラム
    // WHERE 以降は、データ抽出する条件

    // パラメータ割り当て。
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $pass = hash("sha256", $_POST['password']); // パスワードをハッシュ化する
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR); // 

    $stmt->execute(); // 実際に実行する　

    // ユーザー名とパスワードが一致するユーザーがいれば、ログインする
    if ($row = $stmt->fetch()) {
        $_SESSION['id'] = $row['id']; // セッションにユーザーIDを入れる
        header('Location: index.php');
        exit();
    } else {
    // ユーザー名とパスワードが一致するユーザーがない時 ⇨ ログイnフォームを表示
    header('Location: login.php?loginattempt=fail');
    exit();
    }

  } catch (PDOException $e){
    exit("エラー: " . $e->getMessage());
  }
} ?>
<!doctype html>
<html lang="ja">
    <head>
        <title>サークルサイト</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style type="text/css">
            form {
                width: 100%;
                max-width: 330px;
                padding: 15px;
                margin: auto;
                text-align: center;
            }
            #name {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-right-radius: 0;
            }
            #password {
                margin-bottom: 10px;
                border-top-right-radius: 0;
                border-top-left-radius: 0;
            }
        </style>
    </head>
    <body>
    <main role="main" class="container" style="padding:60px 15px 0">
      <div>
        <?php if (isset($_GET['loginattempt']) && $_GET['loginattempt'] == "fail") {
            echo '<p class="alert alert-warning">ユーザ名またはパスワードが間違っています。</p>';
        } ?>
        <!-- ここから「本文」-->
         <form action="login.php" method="post">
         <h1>サークルサイト</h1>
                <label class="sr-only">ユーザ名</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="ユーザ名">

                <label class="sr-only">ユーザ名</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="パスワード">
            <input type="submit" class="btn btn-primary btn-block" value="ログイン">
</form>
      </div>
    </main>
    </body>
</html>