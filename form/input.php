<?php

// 何か変数に入っていれば
if (!empty($_POST["btn_confirm"])) {
    $pageFlag = 1;
}

if (!empty($_POST["btn_submit"])) {
    $pageFlag = 2;
}

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


<!-- 申込フォーム -->

<?php if ($pageFlag === 0) : ?>

    <form method="POST" action="input.php">
    氏名
    <input type="text" name="your_name">
    <br>
    メールアドレス
    <input type="email" name="email">
    <br>

    <input type="submit" name="btn_confirm" value="確認する">

    </form>
    
<?php endif; ?>

<!-- 確認画面 -->

<?php if ($pageFlag === 1) : ?>

    <form method="POST" action="input.php">
    氏名
    <?php echo $_POST["your_name"] ?>
    <br>
    メールアドレス
    <?php echo $_POST["email"] ?>
    <br>

    <input type="submit" name="btn_submit" value="送信する">
    <input type="hidden" name="your_name" value="<?php echo $_POST["your_name"] ?>">
    <input type="hidden" name="email" value="<?php echo $_POST["email"] ?>">

    </form>
    
<?php endif; ?>

<!-- 完了画面 -->

<?php if ($pageFlag === 2) : ?>
    送信が完了しました。
<?php endif; ?>


</body>
</html>