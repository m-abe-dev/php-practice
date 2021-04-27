<?php

const DB_HOST = "mysql:dbname=udemy_php;host=127.0.0.1;charset=utf8";
const DB_USER = "php_user";
const DB_PASSWORD = "password123";



// データベースと繋がっているかチェック 例外処理
// [] 返ってくるデータを配列で返す
// PDO:: 静的な定数
// PDO::ATTR_EMULATE_PREPARES => false, SQLインジェクション対策
try {
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    echo "connection success";
} catch (PDOException $e) {
   echo "connection error" . $e->getMessage() . "\n";
   exit();
}