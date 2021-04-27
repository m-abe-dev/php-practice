<?php

require "db_connection.php";

// ユーザー入力なし　query
// sqlを変数書いて実行
// queryでstatementを作成
// fetchallでsqlの結果を表示
// $sql = "select * from contacts where id = 2";
// $stmt = $pdo->query($sql);

// $result = $stmt->fetchall();

// echo "<pre>";
// var_dump($result);
// echo "</pre>";


// ユーザー入力あり prepare, bind, execute
// 悪意のあるユーザー sqlインジェクション
// 名前付きプレ-スホルダー
// prepareでstatementを作成

$sql = "select * from contacts where id = :id";
$stmt = $pdo->prepare($sql);
// 紐付けと型を指定
$stmt->bindValue("id", 3, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchall();

echo "<pre>";
var_dump($result);
echo "</pre>";
