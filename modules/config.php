<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/functions.php';

function env($key, $default = null)
{
    $value = getenv($key);
    if ($value === false) {
        return $default;
    }
    return $value;
}

$configs = [
    'db' => [
        'driver' => env('DB_DRIVER', 'mysql'),
        'host' => env('DB_HOST', 'localhost'),
        'name' => env('DB_NAME', 'storage'),
        'user' => env('DB_USER', 'root'),
        'pass' => env('DB_PASS', ''),
    ],
    'app' => [
        'name' => env('APP_NAME', 'Storage'),
        'url' => env('APP_URL', 'https://storage.me'),
        'timezone' => env('APP_TIMEZONE', 'UTC'),
    ]
];
