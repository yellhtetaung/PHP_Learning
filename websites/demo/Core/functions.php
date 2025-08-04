<?php

use Core\Response;

function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}


function abort($code = Response::NOT_FOUND): never
{
    http_response_code($code);

    view("{$code}.php");

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

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    return require base_path("views/" . $path);
}

function redirect($path)
{
    header("Location: " . $path);
    exit();
}

function old($key, $default = ''): mixed
{
    return \Core\Session::getFlash('old')[$key] ?? $default;
}

function getCurrentUserId()
{
    return \Core\Session::get('user')['id'];
}

function getCurrentUserInfo($key, $default = '')
{
    return \Core\Session::get('user')[$key] ?? $default;
}
