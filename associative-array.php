<?php

$array_soccer = [
    "Honda" => [
        "number" => "22",
        "hobby" => "soccer",
    ],
    "Kagawa" => [
        "food" => "udon",
        "hobby" => "soccer",
    ]
    ];

$array_team = [
    "1class" => [
        "Honda" => [
            "number" => "22",
            "hobby" => "soccer",
        ],
        "Kagawa" => [
            "food" => "udon",
            "hobby" => "soccer",
        ]
        ],
        "2class" => [
            "Nagatomo" => [
                "height" => "174",
                "hobby" => "soccer",
            ],
            "Inui" => [
                "food" => "cake",
                "hobby" => "soccer",
            ]
            ],
        ];

echo $array_team["2class"]["Nagatomo"]["height"];
?>