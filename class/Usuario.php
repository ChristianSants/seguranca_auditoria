<?php

declare(strict_types=1);

class Usuario{

    private $id;
    private $user;
    private $pass;
    private $cpf;
    private $salt;

    public function __construct($user, $pass, $cpf, $salt){
        $this->user = $user;
        $this->pass = $pass;
        $this->cpf = $cpf;
        $this->salt = $salt;
    }

    //setters  
    public function setId($id){
        $this->id = $id;
    }

    //Getters
    public function getId(){
        return $this->id;
    }

    public function getUser(){
        return $this->user;
    }

    public function getPass(){
        return $this->pass;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function getSalt(){
        return $this->salt;
    }

}
?>