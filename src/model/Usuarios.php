<?php

class Usuarios {
    private $email,$nome,$senha,$telefone;
    
    function getEmail() {
        return $this->email;
    }

    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }


   
    
   
}

?>