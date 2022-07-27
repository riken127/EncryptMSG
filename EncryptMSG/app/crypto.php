<?php
$key = "McQfTjWnZr4t7w!z%C*F-JaNdRgUkXp2s5v6348x/A?DG+KbPeShVmYq3t6w9zB&EH@McQfTjWnZr4u7x!A%D*F-JaNdRgUkXp2s5v8y/B?EH+KbPeShVmYq3t6w9z$";

function encryptthis($data, $key) {
$encryption_key = base64_decode($key);
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
$encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
return base64_encode($encrypted . '::' . $iv);
}

function decryptthis($data, $key) {
$encryption_key = base64_decode($key);
list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}
/*
array_pad() retorna uma cópia do array preenchido com o tamanho especificado por length com value value. 
Se o comprimento for positivo, a matriz será preenchida à direita, se for negativa, à esquerda. 
Se o valor absoluto de comprimento for menor ou igual ao comprimento da matriz, nenhum preenchimento ocorrerá. É possível adicionar no máximo 1048576 elementos por vez.

Retorna uma matriz de strings, cada uma das quais é uma substring de string formada pela divisão em limites formados pelo separador de strings.
*/

?>