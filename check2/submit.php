<?php
include('check.php');

$message = '回答は、';
$select_fruit = $_POST['fruit'];

// データを検証する処理
if (isset($_POST['fruit'])) { // フォームの送信データが入っているか
    $fruit_key = $_POST['fruit'];
    if (array_key_exists($fruit_key, $fruits)) { // 送信データが想定されているものか
        $message .= $fruits[$fruit_key] . 'です';
    } else {
        $message .= '不正な選択です';
    }
} else {
    $message .= '選択されていません。';
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>フォーム</title>
</head>

<body>
    <h1>フォーム</h1>
    <?php
    echo $message;
    ?>
    <h2>果物追加</h2>
    <form action="add_fruit.php" method="post">
        <input type="text" name="new_fruit_key" placeholder="英語のキー (例: grape)">
        <input type="text" name="new_fruit_value" placeholder="日本語の名前 (例: ぶどう)">
        <input type="submit" value="追加">
    </form>


</body>

</html>