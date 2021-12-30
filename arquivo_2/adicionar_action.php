<?php

require 'config.php';
require 'dao/UsuarioDAO.php';

$usuarioDao = new UsuarioDAO($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if($name && $email){

    if($usuarioDao->findByEmail($email) === false){
        
        $novoUsuario = new Usuario();

        $novoUsuario->setNome($nome);
        $novoUsuario->setEmail($email);
        $novoUsuario->setTelefone($telefone);

        $usuarioDao->add($novoUsuario);

        header("Location: index.php");
    
        exit;
    }else{
        header("Location: adicionar.php");
        exit;
    }

}else{
    
    header("Location: adicionar.php");
    exit;
}