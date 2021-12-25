<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if($name && $email){
    $sql = "SELECT * FROM aluno WHERE email = :email";
    
    $result = $pdo->prepare($sql);
    $result->bindValue(':email', $email);
    $result->execute();

    if($result->rowCount() === 0){

        $sql = "INSERT INTO aluno (nome, email, telefone) VALUES (:name, :email, :telefone)";
        
        $result = $pdo->prepare($sql);
    
        $result->bindValue(':name', $name);
        $result->bindValue(':email', $email);
        $result->bindValue(':telefone', $telefone);
    
        $result->execute();
    
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