<?php 
// facil de entender, alto acoplamento, organização, 
// uso do usuario
// Uma classe deve ter um, e somente um, motivo para mudar.
class Usuario{

    public function setId(){}
    public function setNome(){}
    public function setEmail(){}
    public function setTelefone(){}

}
// Manipulação do usuario
class UsuarioDb{
    public function add(){}
    public function remover(){}
    public function buscar(){}
    public function buscarPorNome(){}
}