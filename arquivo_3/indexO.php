<?php
// com a implementação da interface conseguimos estender varias classes sem modificar as classes internas que depende das classes.
// Objetos ou entidades devem estar abertos para extensão, mas fechados para modificação
interface Remuneravel{
    public function remuneracao();
}

class ContratoCLT implements Remuneravel{
    public function remuneracao() {}
}
class Estagio implements Remuneravel{
    public function remuneracao(){}
}
class ContratoPJ implements Remuneravel{
    public function remuneracao(){}
}

class FolhaPagamento{
    public function calcular( Remuneravel $funcionario){
        return $funcionario->remuneracao();
    }
}