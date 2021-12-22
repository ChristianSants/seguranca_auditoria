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
    $arrayUsuarios = $objUsuarioDAO->list();

    if(!empty($arrayUsuarios)){
        $tabela = '
            <table class="table table-sm table-striped border">
                <thead>
                    <tr class="text-gray-900 bg-primary text-white">
                        <th class="align-middle text-center" style="width: 5%;">ID</th>
                        <th class="align-middle text-center" style="width: ;">Usuario</th>
                        <th class="align-middle text-center" style="width: ;">Senha</th>
                        <th class="align-middle text-center" style="width: ;">CPF</th>
                    </tr>
                </thead>
                <tbody>
        ';
    
        foreach($arrayUsuarios as $usuario){
            $tabela .= '
                <tr class="text-gray-800">
                    <td class="align-middle text-center boldish">'. $usuario->getId() .'</td>
                    <td class="align-middle text-center" >'.$usuario->getUser().'</td>
                    <td class="align-middle text-center" >'.$usuario->getPass().'</td>
                    <td class="align-middle text-center" >'.criptografar($usuario->getCpf(), 'd').'</td>
                </tr>
            ';
        }

        $tabela .= '</tbody></table>';


        echo $tabela;

    }



?>