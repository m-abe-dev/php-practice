<?php

// データが入っているかどうか
// empty isset is_null

$test = "";
// もし中身が空ならば
if(empty($test)){
    echo("helllo");
}

// 三項演算子
// 条件 ? true : false

$math = 80;

$test = $math > 80 ? "good" : "bad";

echo ($test);

?>