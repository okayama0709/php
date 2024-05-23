<?php
echo PHP_INT_MAX;  //定数。呼び出す時はクォートなし
?>

<br>

<?php
echo __DIR__; ?>

<br>

<?php
var_dump("abc"); ?>
<?php
echo "<br>";
var_dump(PHP_INT_MAX * 14);
echo "<br>";
?>

<?php
$client = "山田 洋子";
echo "ようこそ" . $client . "さん";
echo "<br>" ?>
<?php
echo "<hr>";
$a = "a";
$b = "b";
// echo ($a + $b);エラー出る。
echo ($a . $b);
echo "<br><br>";
?>


<form action="test.php" method="post">
    <label for="cm">身長</label>
    <input type="number" name="cm"><br>
    <label for="kg">体重</label>
    <input type="number" name="kg"><br>
    <input type="submit" value="計算する">
</form>
<?php

$kg = ($_POST["kg"]);
$cm = ($_POST["cm"]);
$result = ($cm * $cm / 10000) * 22;
$bmi = $kg / ($cm * $cm / 10000)
?>

<?php
echo "<p>あなたの身長は" . $cm . "です</p>";
echo "<p>あなたの体重は" . $kg . "です</p>";
echo "<p>平均体重は" . number_format($result, 1) . "です</p>";
echo "<p>あなたのBMI値は" . number_format($bmi, 1) . "です</p>";
?>