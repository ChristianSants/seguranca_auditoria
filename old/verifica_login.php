<?php

$link = mysqli_connect ("localhost", "root", "");

# seleciona o banco de dados teste

mysqli_select_db($link, "seguranca_auditoria");

$usr=$_GET['usuario'];

$sen=$_GET['p_hash'];

$usuario = htmlspecialchars($usr, ENT_QUOTES, 'UTF-8');

$senha = htmlspecialchars($sen, ENT_QUOTES, 'UTF-8');

$query = "SELECT pass,salt FROM usuario WHERE user = '$usuario'";

$result = mysqli_query($link, $query);

$result_num = mysqli_num_rows($result);

if (mysqli_num_rows($result) == 1){

while ($banco = mysqli_fetch_array($result)){

$password = hash('sha512', $senha.$banco['salt']);

if ($banco['pass']==$password){

echo "<p> senha válida !";

}

else {

echo "<p>senha inválida !!!!";

}

}

}

else {

echo "usuário não cadastrado!";

}

?>