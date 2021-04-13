<?php

// 文字列の長さ

// マルチバイト
// 日本語 SJIS, UTF-8 3~6バイト
$test = "アイウエオ";

echo strlen($test);

// マルチバイトのlength
echo mb_strlen($test);

// 文字列の置換
$str = "文字列を変更します";

echo str_replace("変更", "へんこう", $str);