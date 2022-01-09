
<?php
require 'config.php';
require 'dao/UsuarioDAO.php';

$usuarioDao = new UsuarioDAO($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if($nome && $email){

    $usuario = $usuarioDao->findById($id);
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setTelefone($telefone);

    $usuarioDao->update($usuario);

    header('Location: index.php');
    exit;

}else{
    
    header("Location: editar.php?id=".$id);
    exit;
}