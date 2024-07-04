<?php
// p209-210 10-10
// album.phpからコピーして、album-2.phpを作る

$images = array(); // 画像を入れる配列
$num = 4; // 1ページの画像の数

// 画像フォルダからファイル名を読み込む
// opendir, readdir, closedirは、
// fopen fgets, fclose に似た働き(p162)
if ($handle = opendir('./album')) {
    while ($entry = readdir($handle)) {
        if($entry != "." && $entry != "..") {
            $images[] = $entry;
        }
    }
    closedir($handle);
    // var_dump($images);で配列の中身を出力する
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

        <h1>アルバム</h1>
        <?php
// ここにhtml
if (count($images)>0) {
    echo '<div class="row">';

    // ⇩array_chunkは配列を区切る関数 P211
    $images = array_chunk($images, $num);
    $page = 1; // ページ分割のページ数
    
    // 2ページ目以降の処理
    //  is_numericは、数字かどうかを判定する関数
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        // intval は整数に変換する関数
        $page = intval($_GET['page']);
        if(!isset($images[$page-1])) {
            $page = 1;
        }
    }

    foreach ($images[$page-1] as $img) {
        echo '<div class="col-3">';
        echo '<div class="card">';
        echo '<a href="./album/'.$img.'" target="_blank"><img src="./album/'.$img.'" class="img-fluid"></a>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    // ページ番号

echo '<nav><ul class="pagination">';
for ($i =1; $i<=count($images);$i++){
    echo '<li class="page-item"><a class="page-link" href="album-2.php?page='.$i.'">'.$i.'</a></li>';
}
echo '</ul></nav>';
} else {
    echo '<div class="alert alert-dark" role="alert">画像はまだありません</div>';
}

// できた人は p213 check test
// Q1   URLのパラメータ
// Q2   フォーム
// Q3   アップロードされた画像はテンポラリフォルダに一時的に保存される
//      残しておきたいファイルは、保存するコードを書く

        ?>
        <!-- 本文ここまで -->
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

