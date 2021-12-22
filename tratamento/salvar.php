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

    include_once '../include/autoload.inc.php';

    extract($_POST);

    $objUsuarioDAO = new UsuarioDAO();

    // $cpf = $hash;     
    $salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    // $cpf_bd = hash('sha512', $cpf.$salt);
    $cpf_bd = criptografar($cpf);

    $senha_bd = md5( $salt . $pass );

    $objUsuario = new Usuario($user, $senha_bd, $cpf_bd, $salt);
    $objUsuarioDAO->setObjUsuario($objUsuario);
    echo $objUsuarioDAO->insert();
    
?>