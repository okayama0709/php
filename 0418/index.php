<pre>
<!-- 演算子 -->
<?php
$a = $true && $false;
$b = $false && $false;
$c = $true && $true && $true;
$d = $true && $false && $false;
$e = $true && ($true && $false);
$f = $false && $false;

var_dump($a, $b, $c, $d, $e, $f)
?>


<?php
$true = true;
$false = false;
?>
</pre>
<pre>
<?php
$g = $true || $false;
$h = $false || $false;
$i = $true || $true || $true;
$j = $true || $false || $false;
$k = $true || ($true || $false);
$l = $false || $false;

var_dump($g, $h, $i, $j, $k, $l)
?>

<pre>
        <?php
        $m = !$true;
        $n = !$false;
        $o = !$true && !$true;
        $p = !($true || $true);
        $q = !($true && $false);

        var_dump($m, $n, $o, $p, $q)
        ?>
</pre>

<!-- 制御構分 -->

<?php
echo time();
// mktime(時、分、秒、月、日、年)
$blog = mktime(15, 30, 0, 2, 12, 2024);
echo $blog . "</br>";

// mktime日付の数値を作る関数
// time()現在時刻の
// 86400 : 1日=86400秒

//投稿が１日以上
// 投稿日時と現在の時刻から１日引く
// if($blog>$time-86400)
if ($blog > $time - 86400) {
    echo "NEW";
} else {
    echo "no";
};

?>
<br><br>
<?php
$age = 23;
if ($age > 20) {
    echo "ご購入ありがとうございます";
} else {
    echo "購入できません";
};
echo "<br>";

if ($age < 20) {
    echo "購入できません";
} else if ($age <= 25) {
    echo "年齢確認が必要です";
} else {
    echo "購入できます";
}

echo "<br>";
// 修正
// 条件が狭いものから判定していく
if ($age >= 30) {
    echo "30歳以上";
} else if ($age >= 20) {
    echo "20歳以上";
}
