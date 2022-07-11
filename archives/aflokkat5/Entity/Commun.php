<?php


function encryptFile($data,$hash){
     $key = base64_decode($hash);
     $encryption_key = base64_decode($key);
     $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
     $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
     return base64_encode($encrypted . '::' . $iv);
}

function decryptFile($data,$hash){
     $key = base64_decode($hash);
     $encryption_key = base64_decode($key);
     list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
     $result = openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
     return $result;

}

function encrypt($data){
     $key = base64_decode("4URf254tvU4DZc3j2X36cvu6vTUFBkb438L7pZPb");
     $encryption_key = base64_decode($key);
     $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
     $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
     return base64_encode($encrypted . '::' . $iv);
}

function decrypt($data){
     $key = base64_decode("4URf254tvU4DZc3j2X36cvu6vTUFBkb438L7pZPb");
     $encryption_key = base64_decode($key);
     list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
     $result = openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
     return $result;

}



?>