<?php

//　ー フォームセキュリティ　サニタイズ　ー

// CSRF 偽物のinput.php->悪意のあるページ
session_start();

// クリックジャッキング
header("X-FRAME-OPTIONS:DENY");

// XSSへの対策としてhtmlspecialcharsを使用する
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}



// バリディエーション
require "validation.php";


$pageFlag = 0;
$errors = validation($_POST);

// 何か変数に入っていれば
if (!empty($_POST["btn_confirm"]) && empty($errors)) {
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
<!-- 暗号を生成して適当なフォームであるか確認する -->
<!-- random_bytesで安全な数値を生成する -->
<?php 
if (!isset($_SESSION["csrfToken"])) {
$csrfToken = bin2hex(random_bytes(32)); 
$_SESSION["csrfToken"] = $csrfToken;
}
$token = $_SESSION["csrfToken"];
?>

<?php if(!empty($errors) && !empty($_POST["btn_confirm"])) : ?>
<?php echo "<ul>" ; ?>
<?php 
  foreach ($errors as $error) {
      echo "<li>" . $error . "</li>";
  }
?>
<?php echo "</ul>" ; ?>

<?php endif ; ?>

    <form method="POST" action="input.php">
    氏名
    <!-- 戻った時に入力された氏名やメールアドレスを表示するためにvalueに値を書く -->
    <input type="text" name="your_name" value="<?php if(!empty($_POST["your_name"])){echo h($_POST["your_name"]);} ?>">
    <br>
    メールアドレス
    <input type="email" name="email" value="<?php if(!empty($_POST["email"])){echo h($_POST["email"]);}?>">
    <br>
    ホームページ
    <input type="url" name="url" value="<?php if(!empty($_POST["url"])){echo h($_POST["url"]);}?>">
    <br>
    性別
    <input type="radio" name="gender" value="0"
    <?php if(isset($_POST["gender"]) && $_POST["gender"] === "0"){ echo "checked"; } ?>>男性
    <input type="radio" name="gender" value="1"
    <?php if(!empty($_POST["gender"]) && $_POST["gender"] === "1"){ echo "checked"; } ?>>女性
    <br>
    年齢
    <select name="age">
        <option>選択してください</option>
        <option value="1">~19歳</option>
        <option value="2">20歳~29歳</option>
        <option value="3">30歳~39歳</option>
        <option value="4">40歳~49歳</option>
        <option value="5">50歳~59歳</option>
        <option value="6">60歳~</option>
    </select>
    <br>
    お問い合わせ
    <textarea name="contact">
        <?php if(!empty($_POST["contact"])){echo h($_POST["contact"]);}?>
    </textarea>
    <br>
    <input type="checkbox" name="caution" value="1">注意事項にチェックする
    <br>
    <input type="submit" name="btn_confirm" value="確認する">
    <!-- $tokenをinputに記述してpageflag1に渡す -->
    <input type="hidden" name="csrf" value="<?php echo $token; ?>">

    </form>

<?php endif; ?>




<!-- 確認画面 -->

<?php if ($pageFlag === 1) : ?>
<?php if ($_POST["csrf"] === $_SESSION["csrfToken"]) :?>

    <form method="POST" action="input.php">
    氏名
    <?php echo h($_POST["your_name"]) ;?>
    <br>
    メールアドレス
    <?php echo h($_POST["email"]) ;?>
    <br>
    ホームページ
    <?php echo h($_POST["url"]) ;?>
    <br>
    性別
    <?php if ($_POST["gender"] === "0") {
        echo "男性";   } ?>
    <?php if ($_POST["gender"] === "1") {
        echo "女性";   } ?>
    <br>
    年齢
    <?php 
    if ($_POST["age"] === "1") {
        echo "~19歳";
    } 
    if ($_POST["age"] === "2") {
        echo "20~29歳";
    } 
    if ($_POST["age"] === "3") {
        echo "30~39歳";
    } 
    if ($_POST["age"] === "4") {
        echo "40~49歳";
    } 
    if ($_POST["age"] === "5") {
        echo "50~59歳";
    } 
    if ($_POST["age"] === "6") {
        echo "60歳~";
    } 
    ?>
    <br>
    お問い合わせ
    <?php echo h($_POST["contact"]) ;?>
    
    <input type="submit" name="back" value="戻る">
    <input type="submit" name="btn_submit" value="送信する">
    <input type="hidden" name="your_name" value="<?php echo h($_POST["your_name"]) ;?>">
    <input type="hidden" name="email" value="<?php echo h($_POST["email"]) ;?>">
    <input type="hidden" name="url" value="<?php echo h($_POST["url"]) ;?>">
    <input type="hidden" name="gender" value="<?php echo h($_POST["gender"]) ;?>">
    <input type="hidden" name="age" value="<?php echo h($_POST["age"]) ;?>">
    <input type="hidden" name="contact" value="<?php echo h($_POST["contact"]) ;?>">
    <!-- GETもPOSTも1回通信すると持っているデータが消えてしまう。hiddeninputに隠しておき、その情報をDBに登録する -->
    <input type="hidden" name="csrf" value="<?php echo h($_POST["csrf"]) ;?>">

    </form>
    
<?php endif; ?>
<?php endif; ?>




<!-- 完了画面 -->

<?php if ($pageFlag === 2) : ?>
<?php if ($_POST["csrf"] === $_SESSION["csrfToken"]) :?>
    送信が完了しました。
<!-- sessionに一時保存したtokenを削除する -->
<?php unset($_SESSION["csrfToken"]); ?>
<?php endif; ?>
<?php endif; ?>


</body>
</html>