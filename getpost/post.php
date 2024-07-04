<?php
$name = $_POST["name"];

// 性別
$gender = $_POST["gender"];
if ($gender == "man") {
    $gender = "男性";
} elseif ($gender == "women") {
    $gender = "女性";
} else {
    $gender = "不正な値です";
}

// 評価
$tmp_star = $_POST["star"];
$star = "";
for ($i = 0; $i < 5; $i++) {
    if ($i < $tmp_star) {
        $star .= "★";
    } else {
        $star .= "☆";
    }
}

//ご意見
$other = $_POST["other"];
?>
<html>

<head>
    <meta charset="utf-8">
    <title>アンケート結果</title>
</head>

<body>
    <h1>アンケート結果</h1>
    <p>お名前：<?php echo $name ?></p>
    <p>性別:<?php echo $gender ?></p>
    <p>評価<?php echo $star ?></p>
</body>

</html>