<?php

// switchではなくできるだけifを使った方がいい

$data = 1;

switch ($data) {
    case 1:
        echo ("yes");
        break;
    case 2:
        echo ("no2");
        break;
    case 3:
        echo ("no3");
        break;   
    default:
        echo ("not here");
}