<?php

$array_soccers = [
    "Honda" => [
        "number" => "22",
        "hobby" => "soccer",
    ],
    "Man" => [
        "food" => "cake",
        "hobby" => "soccer",
    ]
    ];

foreach($array_soccers as $array_soccer){
    foreach ($array_soccer as $value) {
        echo $value;
    }
}

