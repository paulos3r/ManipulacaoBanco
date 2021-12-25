
<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if($nome && $email){
    $sql = "UPDATE aluno SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";

    $result = $pdo->prepare($sql);

    $result->bindValue(':nome', $nome);
    $result->bindValue(':email', $email);
    $result->bindValue(':telefone', $telefone);
    $result->bindValue(':id', $id);

    $result->execute();

    header('Location: index.php');
    exit;

}else{
    
    header("Location: adicionar.php");
    exit;
}