<?php
//encriptação de senhas

$senha = '1234';

$hash = password_hash($senha, PASSWORD_DEFAULT);

echo $senha . "<br/>";
echo $hash;


// verificar se a senha esta correta

$hashVerificar = $hash;

$senhaValidar = "1234";

if(password_verify($senhaValidar, $hashVerificar)){
    echo "senha correta";
}else{
    echo "senha errada";
}