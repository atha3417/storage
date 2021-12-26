<?php

function dd($data)
{
    var_dump($data);
    die();
}

function d($data)
{
    var_dump($data);
}

function hashFileNameAsToken($filename)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz-_';
    $token = '';

    for ($i = 0; $i < strlen($filename); $i++) {
        $rand = rand(0, strlen($characters) - 1);
        $token .= $characters[$rand];
    }
    return $token;
}
