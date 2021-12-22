<?php 
    include_once '../include/autoload.inc.php';

    extract($_POST);

    $objUsuarioDAO = new UsuarioDAO();
    $arrayUsuarios = $objUsuarioDAO->findUsuarioByUser($user);

    foreach($arrayUsuarios as $usuario);

    $senha_bd = md5( $usuario->getSalt() . $pass );
    if($user == $usuario->getUser() && $senha_bd == $usuario->getPass() ){
        echo 1;
    }    
    
    // echo $objUsuarioDAO->logar($user, $pass);

?>