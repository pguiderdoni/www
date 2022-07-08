<?php


function encryptFile($data,$hash){
     $key = base64_decode($hash);
     $encryption_key = base64_decode($key);
     // Generate an initialization vector
     $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
     // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
     $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
     // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
     return base64_encode($encrypted . '::' . $iv);
}

function decryptFile($data,$hash){
     $key = base64_decode($hash);
     $encryption_key = base64_decode($key);
     // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
     list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
     $result = openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
     return $result;

}

function encrypt($data){
     $key = base64_decode("4URf254tvU4DZc3j2X36cvu6vTUFBkb438L7pZPb");
     $encryption_key = base64_decode($key);
     // Generate an initialization vector
     $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
     // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
     $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
     // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
     return base64_encode($encrypted . '::' . $iv);
}

function decrypt($data){
     $key = base64_decode("4URf254tvU4DZc3j2X36cvu6vTUFBkb438L7pZPb");
     $encryption_key = base64_decode($key);
     // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
     list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
     $result = openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
     return $result;

}



?>