<?php

function dd($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    exit();
}
// number_format($produit->prix, 2, ',', ' ')
function _number_format(float $num = 0): string
{
    return number_format($num, 2, ',', ' ');
}
// Constant
// define("PI", 3.14);

define("IP_SERVER", $_SERVER['SERVER_ADDR']);
