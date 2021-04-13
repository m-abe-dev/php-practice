<?php

echo("123");

// $から変数定義
$test = 123;
echo $test;

// phpは動的型付け言語であるため、今何の型がついているのか分からない時がある
// var_dumpを使うことによって、型を知ることができる
// 配列　オブジェクト　コレクション型(laravel)で役に立つ
var_dump($test);

// 変数の組み合わせ

$test_1 = 123;
$test_2 = 456;

$test_3 = $test_1 . $test_2;

echo($test_3);

// 定数

const MAX =　10;
echo MAX;

?>
