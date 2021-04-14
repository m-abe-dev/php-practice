<?php

$test = 123;
$test_2 = 456;

echo $test;

// 一度処理を止めて現在の関数を確認する
var_dump($test);
exit;

echo $test_2;