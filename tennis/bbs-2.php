<?php
// p245-247 11-4
// 1ページの件数
$num = 2;
// DBに接続。接続先、ユーザー名、パスワード
$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
$user = 'tennisuser';
$password = 'password';

$page = 1;
if(isset($_GET['page']) && $_GET['page'] > 1) {
  $page = intval($_GET['page']);
}
try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("SELECT * FROM bbs ORDER BY date DESC LIMIT :page, :num");
    // SELECT カラム FROM テーブル // 大きさ: テーブル＞カラム
    // SELECT id FROM bbs
    // ORDER BY はどのカラムの値で並べるか？
    // ASC 小さい⇨大きい　　DESC 大きい⇨小さい、の順で並べる
    // LIMIT 何件データをとってくるか
    // LIMIT 0, 10   //　0件目から10
    // LIMIT 開始, 件数

    // パラメータ割り当て。
    $page = ($page -1) * $num;
    $stmt->bindParam(':page', $page, PDO::PARAM_INT); // LIMITの開始を指定
    $stmt->bindParam(':num', $num, PDO::PARAM_INT); // LIMITの件数を指定

    //$name = "田中";
    //echo "こんにちは" . $name . "さん。";

    $stmt->execute(); // 実際に実行する　
} catch (PDOException $e){
  exit("エラー: " . $e->getMessage());
}
?>
<!doctype html>
<html lang="ja" >
  <head>
    <title>サークルサイト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>

    <?php include('navbar.php'); ?>

    <main role="main" class="container" style="padding:60px 15px 0">
      <div>
        <!-- ここから「本文」-->
         <h1>掲示板</h1>
         <form action="write.php" method="post">
            <div class="form-group">
                <label>タイトル</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>名前</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" row="5"></textarea>
            </div>
            <div class="form-group">
                <label>削除パスワード 数字4桁</label>
                <input type="text" name="pass" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="書き込む">
</form>
<hr>
<?php
// fetch データを１行ずつ取ってくる
while ($row = $stmt->fetch()) :?>
<?php // var_dump($row);?>
  <div class="card">
    <div class="card-header"><?php echo $row['title']? $row['title']: '(無題)' ;?></div>
    <?php
    // echo $row['title']? $row['title']: '(無題)';
    //  if文を短く書いたもので、三項演算子と呼ばれる p250
    // if ($row['title']) {
    //   echo $row['title']; 
    // } else {
    //   echo '(無題)';
    // }
    // echo 条件 ? 条件が真の時 : 条件が偽のとき

    // if ( 条件 ) {
    //     条件が真の時
    // } else {
    //     条件が偽の時
    // }
    ?>
    <div class="card-body">
      <?php // 教科書 p157 で出てきた nl2brを使うことで、html上で改行表示 ?>
      <p class="card-text"><?php echo nl2br($row['body']);?></p>
    </div>
    <div class="card-footer">
        <form action="delete.php" method="post" class="form-inline">
    <?php echo $row['name'];?>
    (<?php echo $row['date'];?>)
    <input type="hidden" name="id" value="<?php echo $row["id"];?>">
    <input type="text" name="pass" placeholder="削除パスワード" class="form-control">
    <input type="submit" value="削除" class="btn btn-secondary">
</form>
    </div>
  </div>
  <hr>
<?php endwhile; ?>

<?php
try{
  $stmt = $db->prepare("SELECT COUNT(*) FROM bbs");
  //                            ↑行数を数える
  $stmt->execute();
} catch (PDOException $e){
  exit("エラー: " . $e->getMessage());
}
$comments = $stmt->fetchColumn(); // 行数（書き込みの数）を取ってきて$comments に入れる
// $num : １ページの件数
// 全部で３５件、１ページ１０件だったら、4ページ
// ceil : 端数を切り上げる
// round : 端数を四捨五入する
// floor : 端数を切り捨てる
$max_page = ceil($comments/ $num);
if ($max_page >= 1) {
  echo '<nav><ul class="pagination">';
  for ($i = 1; $i <= $max_page; $i++) {
    echo '<li class="page-item"><a class="page-link" href="bbs.php?page='.$i.'">'.$i.'</a></li>';
  }
  echo '</ul></nav>';
}
?>
</div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>