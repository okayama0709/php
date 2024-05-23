<?php
$info = file_get_contents("info.txt");
?>
<!-- 読み込み専用 -->
<?php
$fp = fopen("info.txt", "r"); ?>
<!-- １行だけ読み込む -->
<?php
$title = fgets($fp); ?>

<!doctype html>
<html lang="ja">

<head>
    <title>サークルサイト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <main role="main" class="container" style="padding:60px 15px 0">

        <?php include('navbar.php'); ?>
        <h1>おしらせ</h1>
        <?php echo nl2br($title); ?>

        <?php $line2 = fgets($fp);  //二回目で二行目
        echo $line2 ?>

        <hr>

        <?php
        while ($line = fgets($fp)) {
            echo $line . "<br>";
        }
        ?>

        <!-- nl2br:改行 -->
        <!-- nl2br(文字列 false)→ -->
        <!-- nl2br(文字列 true)→ -->

        <!-- p161
        fopenファイルを開く
        fgetsファイルから１行ずつ読み込む
        fcloseファイルを閉じる

         p162
        fopen(ファイル名、モード)モードの詳細はp163
        読み込み専用で開く場合
        fopen("info.txt","r")-->

    </main>


</body>

</html>