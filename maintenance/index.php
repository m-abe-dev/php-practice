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


// トランザクション まとまって処理 beginTransaction, commit, rollback
// ex)銀行 残高を確認->Aさんから引き落とし->Bさんに振り込み

$pdo->beginTransaction();

try {
    // SQL処理
    $stmt = $pdo->prepare($sql);
    // 紐付けと型を指定
    $stmt->bindValue("id", 3, PDO::PARAM_INT);
    $stmt->execute();

    $pdo->commit();
} catch (PDOException $e) {
    // 更新のキャンセル
    $pdo->rollback();
}

