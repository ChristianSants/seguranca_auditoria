<!-- utilizamos uma biblioteca externa para calculo do hash sha512 > -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript" src="hash.js"></script>

<script>

if (window.location.protocol != "https:")
    window.location.href = "https:" + window.location.href.substring(window.location.protocol.length);

</script>

<?php

if(isset($_GET['error'])) { 
   echo 'Error Logging In!';
}

?>

<form action="verifica_login.php" method="get" name="login_form">
   Usuário: <input type="text" name="usuario" /><br />
   Senha: <input type="password" name="senha" id="password"/><br />
   <input type="button" value="Login" onclick="calc_hash(this.form, this.form.senha);" />

</form>