<?php 
    class Usuario {
        private $id;
        private $nome;
        private $email;
        private $telefone;

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = trim($id);
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = ucwords(trim($nome));
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = strtolower(trim($email));
        }
        public function getTelefone(){
            return $this->telefone;
        }
        public function setTelefone($telefone){
            $this->telefone = trim($telefone);
        }


    }

    interface UsuarioInterface{
        public function add(Usuario $usuario);
        public function findAll();
        public function findById($id);
        public function update(Usuario $usuario);
        public function delete($id);
        public function findByEmail($email);
    }
?>