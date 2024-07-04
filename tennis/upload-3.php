<?php
// p203 10-8
// upload-2をコピーして、upload-3にする
// p200 10-7
$msg = null; // アップロード状況を表すメッセージ
$alert = null; // メッセージのでざいん用

// アップロード処理
//   ⇩画像がアップロードされたかを確認する if
if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    $old_name = $_FILES['image']['tmp_name'];
    // $new_name を変える
    $new_name = date("YmdHis"); // 日付
    $new_name .= mt_rand(); // ランダムな数字を追加
    // 画像の種類から拡張子を決める
    // ⇩画像の情報を取得
    $size = getimagesize($_FILES['image']['tmp_name']);
    switch ($size[2]) {
        case IMAGETYPE_JPEG:
            $new_name .= '.jpg';
            break;
        case IMAGETYPE_GIF:
            $new_name .= '.gif';
            break;
        case IMAGETYPE_PNG:
            $new_name .= '.png';
            break;
        default:
            // ⇩upload.php へ移動する
            header('Location: upload.php');
            // ⇩処理終了。 exit()より後は実行しない
            exit();                
    }
    //  テンポラリフォルダから、ファイルを移動させる
    if(move_uploaded_file($old_name, 'album/'.$new_name)) {
        $msg = 'アップロードしました';
        $alert = 'success';
    } else {
        $msg = 'アップロードできませんでした';
        $alert = 'danger';
    }
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

        <h1>画像アップロード</h1>
        <?php
        if ($msg) {
            echo '<div class="alert alert-'.$alert.'" role="alert">'.$msg.'</div>';
        }
        ?>
 <!-- p198 10-5 -->
 <!--  画像アップロードするには、enctype="multipart/form-data" をつける  -->
 <form action="upload-3.php" method="post" enctype="multipart/form-data">
    <div class="form-group"><!-- クラス名は bootstrapのもの -->
        <label>アップロードファイル</label>
        <!-- ファイルは type="file" -->
        <input type="file" name="image" class="form-control-file">
    </div>
    <input type="submit" value="アップロードする" class="btn btn-primary">
 </form>
        <!-- 本文ここまで -->
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

