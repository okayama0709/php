<?php
$friends = array(
    "はるき", "かおる", "ひでと", array("ひろし", "飯田")
);
for ($i = 0; $i < 3; $i++) {
    echo $friends[$i] . "<br>";
};
?>

<!--  -->
<?php
$results = array(
    "math" => 90,
    "english" => 80,
    "japanese" => 85,
);

foreach ($results as $score) {
    echo $score . "<br>";
};

//

//
?>
<?php
$results = array(
    "math" => 90,
    "english" => 80,
    "japanese" => 85
);
echo "<br>";
foreach ($results as $title => $score) {
    echo $title . ";" . $score . "<br>";
}
?>
//
<?php
$numbers = array(2, 4, 6);
foreach ($numbers as $key => $value) {
    $numbers[$key] = $value * 10;
}
var_dump($numbers);
?>

<?php
// チェックテスト
$foods = array(
    "くだもの" => array("いちご", "りんご", "バナナ"),
    "やさい" => array("きゅうり", "かぼちゃ", "じゃがいも")
);
var_dump($foods);
echo "<br>";
?>
<?php foreach ($foods as $key => $mono) : ?>
    <?php {
        for ($i = 0; $i < count($mono); $i++) {
            echo $key . "は" . $mono[$i] . "です" . "<br>";
        }
    } ?>
<?php endforeach; ?>

<!-- 関数 -->
<?php
$count = mb_strlen("こんにちは");
echo $count . "<br>";
// 引数は変数でもよい
$greeting = "こんにちは";
$count = mb_strlen($greeting);
echo $count;

$now_time = time();
echo $now_time . "<br>";

$fruits = array("apple", "lemon", "banana");
sort($fruits);
var_dump($fruits);
?>
<?php
// ファンクション
function get_price($price)
{
    $price = $price * 1.1;
    // ３行目なしでreturn round($price*1.1)としてもよい
    return round($price);
}
echo "<br>" . get_price(300);
echo "<br>" . get_price(30);
echo "<br>" . get_price(3);
echo "<br>" . get_price(5);
// echo "<br>" . get_price();　引数が必要な関数で空はエラーがでる。
?>
<br>

<?php
function default_demo($name = "太郎")
{
    echo "私の名前は" . $name . "です<br>";
}
echo default_demo("花子");
echo default_demo();
?>

<!-- 関数問題 -->
<?php
// インクルードで別ファイルから表示する
include "functions.php";

echo vending_machine(100, "オレンジジュース") . "<br>";
echo vending_machine(120, "オレンジジュース");
?>
<!-- スコープ -->
<br>
<?php
$namery = "七つの大罪"; //関数内では使えない
function print_name()
{
    $name = "太郎";
    echo "僕の名前は" . $name . "です";
};
print_name();
// echo $name;　スコープ外でエラー
?>
<br>
<!-- 引数ありの関数 -->
<?php
function get_price2($price)
{
    $price = $price * 1.1;
    return round($price);
}
echo get_price2(300);
?>
<br>
<?php
function defalt_demo($name = "太郎")
{
    echo "私の名前は" . $name . "です<br>";
}
defalt_demo();
defalt_demo("花子");
?>

<?php
function vending_machines($price, $juice)
{
    if ($price <= 120) {
        return $juice . "のお買い上げありがとうございます";
    } else {
        $juice . "の購入金額が不足しています。<br>";
    }
}

echo vending_machines(120, "オレンジ");


?>
<?php
echo date("Y-m-d H:i:s");
echo "<hr>";
echo date("Y-m-d");
echo "<br>";
echo mktime(10, 0, 0, 5, 15, 2024);
?>