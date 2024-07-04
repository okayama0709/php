<?php
include('date.php');
?>
<!DOCTYPE html>
<html>

<body>
    <h1>果物を選択してください</h1>
    <form action="submit.php" method="post">
        <?php

        echo "<select name='fruit'>";
        foreach ($fruits as $key => $value) {
            echo "<option value='$key'>$value</option>";
        }
        echo "</select>";
        ?>
        <input type="submit" value="送信">
    </form>
</body>

</html>