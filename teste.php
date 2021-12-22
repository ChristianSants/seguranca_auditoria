<?php 

function criptografar( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'pB!SuX#Gj7tJ';
    $secret_iv = 'XpbD&Ki%3nwN';

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }

    return $output;
}

$cpf = '84665548072';
$cpf_criptografado = criptografar($cpf);
$cpf_descriptografado = criptografar($cpf_criptografado, 'd');

echo 'CPF: '.$cpf.'<br>'; 
echo 'CPF CRIPTOGRAFADO: '.$cpf_criptografado.'<br>'; 
echo 'CPF DESCRIPTOGRAFADO: '.$cpf_descriptografado.'<br>'; 

?>