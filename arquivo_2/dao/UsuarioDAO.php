<?php
require_once 'models/Usuario.php';

class UsuarioDAO implements UsuarioInterface
{
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function add(Usuario $usuario){
        
        $sql = "INSERT INTO aluno (nome, email, telefone) VALUES (:nome, :email, :telefone)";

        $result = $this->pdo->prepare($sql);
        $result->bindValue(':nome', $usuario->getNome());
        $result->bindValue(':email', $usuario->getEmail());
        $result->bindValue(':telefone', $usuario->getTelefone());

        $result->execute();
        //pega o ultimo id que foi inserido no banco para poder acessar na classe que foi chamado;
        $usuario->setId( $this->pdo->lastInsertId() );

        return $usuario;
    }

    public function findAll(){
        $array = [];

        $sql = "SELECT * FROM aluno";

        $result = $this->pdo->query($sql);

        if($result->rowCount() > 0){
            $data = $result->fetchAll();

            foreach($data as $item){
                $usuario = new Usuario();

                $usuario->setId($item['id']);
                $usuario->setNome($item['nome']);
                $usuario->setEmail($item['email']);
                $usuario->setTelefone($item['telefone']);

                $array[] = $usuario;
            }
        }else{
            header('Location: index.php');
            exit;
        }

        return $array;
    }

    public function findById($id){}

    public function update(Usuario $usuario){}

    public function delete($id){}

    public function findByEmail($email){
        $sql = "SELECT * FROM aluno WHERE email = :email";

        $result = $this->pdo->prepare($sql);
        $result->bindValue(':email', $email);
        $result->execute();

        if($result->rowCount() > 0){
            $data = $result->fetch();

            $usuario = new Usuario();

            $usuario->setId($data['id']);
            $usuario->setNome($data['nome']);
            $usuario->setEmail($data['email']);
            $usuario->setTelefone($data['telefone']);

            return $usuario;
        }else{
            return false;
        }
    }
}