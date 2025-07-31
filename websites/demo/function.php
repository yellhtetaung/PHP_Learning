<?php

function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}


function abort($code = Response::NOT_FOUND): void
{
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

function urlIs($url): bool
{
    return $_SERVER["REQUEST_URI"] == $url;
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}