<?php

function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}


function abort($code = 404): void
{
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

function urlIs($url): bool
{
    return $_SERVER["REQUEST_URI"] == $url;
}