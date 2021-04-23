<?php

$contactFile = ".contact.dat";

// ファイル全部読み込み
$fileContents = file_get_contents($contactFile);
// echo $fileContents;

// ファイルに書き込み (上書き)
file_put_contents($contactFile, "ファイルです");

// ファイルに書き込み (追記)
$addText = "Test desu" . "\n";
file_put_contents($contactFile, $addText, FILE_APPEND);

// 配列file, 区切る explode, foreach

$allData = file($contactFile);

foreach ($allData as $lineData) {
    $line = explode("," , $lineData);
    echo $line[0]."<br>";
    // echo $line[1]."<br>";
    // echo $line[2]."<br>";
}