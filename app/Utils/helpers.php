<?php

function encodeId($id)
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = config('app.key');
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_key), 0, 16);
    $output = openssl_encrypt($id, $encrypt_method, $key, 0, $iv);
    return base64_encode($output);
}

function decodeId($id)
{
    abort_if((strlen($id)) > 32, 404);

    $encrypt_method = "AES-256-CBC";
    $secret_key = config('app.key');
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_key), 0, 16);
    return openssl_decrypt(base64_decode($id), $encrypt_method, $key, 0, $iv);
}



