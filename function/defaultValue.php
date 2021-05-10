<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

// エラーが出ないように初期値を設定することができる
function defaultValue($string = null)
{
  echo $string . 'です';
}

//引数なし
defaultValue();
echo '<br>';

//引数あり
defaultValue('テスト');
