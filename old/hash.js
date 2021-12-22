function calc_hash(form, password) {

    // precisamos criar um novo campo input no form que será o hash da senha
 
    var p_hash = document.createElement("input");
 
    form.appendChild(p_hash);
 
    p_hash.name = "p_hash";
 
    // utilizamos a opção hidden para incrementar um pouco mais a segurança
 
    // não confie nisso como sendo realmente oculto ao atacante experiente
 
    p_hash.type = "hidden";
 
    // aqui utilizamos a biblioteca externa do google codes
 
    p_hash.value = CryptoJS.SHA512(password.value);
    // para não enviar a senha
 
    password.value = "";
 
    // envia os dados
 
    form.submit();
 
 }