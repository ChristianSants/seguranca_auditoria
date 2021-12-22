<?php 

class UsuarioDAO extends Conexao{


    /**
     * @var Usuario
     */
    private $objUsuario;

    public function setObjUsuario($obj){
        $this->objUsuario = $obj;
    }

    public function insert(){
        $sql = "
            INSERT INTO usuario(user, pass, cpf, salt) 
            VALUES(?, ?, AES_ENCRYPT(?,'meuToken'), ?)
        ";
         
        $prepare = $this->conectaMySQL()->prepare($sql);   

        $prepare->bindValue(1, $this->objUsuario->getUser());
        $prepare->bindValue(2, $this->objUsuario->getPass());
        $prepare->bindValue(3, $this->objUsuario->getCpf());
        $prepare->bindValue(4, $this->objUsuario->getSalt());
        
        try{
            return $prepare->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    //Listar
    public function list(){
        $sql = "
            SELECT id,
                   user,
                   pass,
                   AES_DECRYPT(cpf, 'meuToken') as cpf,
                   salt 
            FROM usuario
            ORDER BY id DESC
         ";

        $array = [];

        foreach($this->conectaMySQL()->query($sql) as $valor){

            $objTipoRetorno = new Usuario($valor['user'], $valor['pass'], $valor['cpf'], $valor['salt']);
            $objTipoRetorno->setId($valor['id']);

            array_push($array, $objTipoRetorno);

        }

        return $array;
    }

    public function findUsuarioByUser($user){
        $sql = "
            SELECT *
            FROM usuario
            WHERE user = ?
            ORDER BY id DESC
        ";

        $prepare = $this->conectaMySQL()->prepare($sql); 
        $prepare->bindParam(1, $user);
        $prepare->execute();

        $array = [];

        foreach($prepare->fetchAll() as $valor){

            $objTipoRetorno = new Usuario($valor['user'], $valor['pass'], $valor['cpf'], $valor['salt']);
            $objTipoRetorno->setId($valor['id']);

            array_push($array, $objTipoRetorno);
        }

        return $array;
    }

    public function logar($user, $pass){
        //FORMA QUE ACEITA SQL INJECTION
        $sql = "
            SELECT * 
            FROM usuario
            WHERE user = '$user'
            AND pass = '$pass'
            ORDER BY id DESC
         ";

        $prepare = $this->conectaMySQL()->prepare($sql); 


        //FORMA QUE PREVINE SQL INJECTION
        //$prepare->bindParam(1, $user);
        //$prepare->bindParam(2, $pass);
        $prepare->execute();

        return $prepare->rowCount();
    }

}

?>