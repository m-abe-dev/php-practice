<?php

function validation($request) {

    $errors = [];

    if(empty($request["your_name"])) {
        
        $errors[] = "error: no name";
    }

    return $errors;
}


?>