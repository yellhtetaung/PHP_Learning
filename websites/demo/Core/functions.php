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

function view($path, $attributes = []): void
{
    extract($attributes);

    require base_path("views/" . $path);
}

function login($user): void
{
    $_SESSION['user'] = [
        'name' => $user['name'],
        'email' => $user['email'],
    ];

    session_regenerate_id(true);
}

function logout(): void
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
