<?php

$link = mysqli_connect ("localhost", "root", "");

# seleciona o banco de dados teste

mysqli_select_db($link, "seguranca_auditoria");

$usr=$_GET['usuario'];

$sen=$_GET['p_hash'];

$usuario = htmlspecialchars($usr, ENT_QUOTES, 'UTF-8');

$senha = htmlspecialchars($sen, ENT_QUOTES, 'UTF-8');

$query = "SELECT * FROM usuario WHERE user = '$usuario'";

$result = mysqli_query($link, $query);

$result_num = mysqli_num_rows($result);

if (mysqli_num_rows($result) >= 1){

echo "usuário já cadastrado";

}

else {

$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

$senha_bd = hash('sha512', $senha.$salt);

$query = "INSERT INTO usuario (user,pass,salt) VALUES

('$usuario','$senha_bd','$salt')";

$result = mysqli_query($link, $query);

echo "cadastro realizado";

}

?>