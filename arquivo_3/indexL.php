<?php
// se S é um subtipo de T, então os objetos do tipo T, em um programa, podem ser substituídos pelos 
// objetos de tipo S sem que seja necessário alterar as propriedades deste programa
class A {
    public function getNome(){
        return "meu nome é A";
    }
}
class B extends A{
    public function getNome(){
        return "meu nome é B";
    }
}

function imprimirNome(A $objeto){
    return $objeto->getNome();
}

$objeto1 = new A();
$objeto2 = new B();
echo imprimirNome($objeto1);
echo imprimirNome($objeto2);
