<?php

function validation($request) {

    $errors = [];

    // 名前
    if(empty($request["your_name"]) || 20 < mb_strlen($request["your_name"])) {
        
        $errors[] = "error: 氏名は２０文字以内です。";
    }

    // メールアドレス
    if (empty($request["email"]) || !filter_var($request["email"], FILTER_VALIDATE_EMAIL)) {

        $errors[] = "error: メールアドレスは必須です。";
    }

    // URL
    if (!empty($request["url"])) {
        if (!filter_var($request["url"], FILTER_VALIDATE_URL)) {

            $errors[] = "error: URLは正しい形式で入力してください。";
        }
    }

    // お問い合わせ
    if(empty($request["contact"]) || 200 < mb_strlen($request["contact"])) {
        
        $errors[] = "error: お問い合わせ内容は２００文字以内で必須です。";
    }

    // 注意事項
    if(empty($request["caution"])) {
        
        $errors[] = "error: 注意事項にチェックしてください";
    }

    // 性別
    // issetは値がセットされているかどうか
    if(!isset($request["gender"])) {
        
        $errors[] = "error: 性別にチェックしてください";
    }

    // 年齢
    if(empty($request["age"]) || 6 < $request["age"]) {
        
        $errors[] = "error: 年齢を記入してください";
    }


    return $errors;
}


?>