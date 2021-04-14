<?php

// 何か変数に入っていれば
if (!empty($_GET)) {
    echo "<pre>";
    var_dump($_GET["your_name"]);
    echo "</pre>";
}
echo $_GET["your_name"];

// スーパーグローバル変数 php 9種類
// 連想配列

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="input.php">
    氏名
    <input type="text" name="your_name">
    <br>
    <input type="checkbox" name="sports[]" value="野球">野球
    <input type="checkbox" name="sports[]" value="サッカー">サッカー
    <input type="checkbox" name="sports[]" value="バスケ">バスケ

    <input type="submit" value="送信">


    </form>
</body>
</html>