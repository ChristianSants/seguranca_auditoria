function cadastrar(){
    let user = document.getElementById('usuarioEdt')
    let pass = document.getElementById('senhaEdt')

    let cpf = document.getElementById('cpfEdt')
    let hash = CryptoJS.SHA512(cpf.value);

    // Exemplo de requisição POST
    var ajax = new XMLHttpRequest();

    // Seta tipo de requisição: Post e a URL da API
    ajax.open("POST", "tratamento/salvar.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Seta paramêtros da requisição e envia a requisição
    ajax.send("user="+user.value+"&pass="+pass.value+"&cpf="+cpf.value);

    // Cria um evento para receber o retorno.
    ajax.onreadystatechange = function() {
    // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
        if (ajax.readyState == 4 && ajax.status == 200) {
            var data = ajax.responseText;
        // Retorno do Ajax
            // console.log(data);
            if(data == 1){
                alert('salvo com sucesso')
            }else{
                alert('algum erro ocorreu')
            }
        }
    }   

}


function logar(){
    let user = document.getElementById('usuarioEdt')
    let pass = document.getElementById('senhaEdt')

    // Exemplo de requisição POST
    var ajax = new XMLHttpRequest();

    // Seta tipo de requisição: Post e a URL da API
    ajax.open("POST", "tratamento/logar.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Seta paramêtros da requisição e envia a requisição
    ajax.send("user="+user.value+"&pass="+pass.value);

    // Cria um evento para receber o retorno.
    ajax.onreadystatechange = function() {
    // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
        if (ajax.readyState == 4 && ajax.status == 200) {
            var data = ajax.responseText;
        // Retorno do Ajax
            // console.log(data)
            if(data == 1){
                alert('Logou!')
            }else{
                alert('Usuário ou senha incorretos!')
            }
        }
    }   

}

function listar(){

    // Exemplo de requisição POST
    var ajax = new XMLHttpRequest();

    // Seta tipo de requisição: Post e a URL da API
    ajax.open("POST", "tratamento/listar.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Seta paramêtros da requisição e envia a requisição
    ajax.send();

    // Cria um evento para receber o retorno.
    ajax.onreadystatechange = function() {
    // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
        if (ajax.readyState == 4 && ajax.status == 200) {
            var data = ajax.responseText;
        // Retorno do Ajax
        // console.log(data)
            var container = document.getElementById('container')
            container.innerHTML = data
        }
    }   

}