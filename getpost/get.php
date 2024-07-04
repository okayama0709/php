<?php

$page = $_GET["page"];
echo $page;

?>
<hr>
<?php foreach ($_GET as $key => $value) {
    echo "<br>";
    echo  "キー" . ":" . $key . "<br>";
    echo "値", $value;
    # code...
}
