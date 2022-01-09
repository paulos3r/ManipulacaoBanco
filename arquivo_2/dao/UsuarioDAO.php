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

    public function findById($id){

        $sql = "SELECT * FROM aluno WHERE id = :id";

        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id', $id);
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

    public function update(Usuario $usuario){
        $sql = "UPDATE aluno SET nome = :nome, email = :email, id = :id";
        $atualizar = $this->pdo->prepare($sql);

        $atualizar->bindValue(':nome', $usuario->getNome());
        $atualizar->bindValue(':email', $usuario->getEmail());
        $atualizar->bindValue(':telefone', $usuario->getTelefone());
        $atualizar->execute();

        return true;
    }

    public function delete($id){
        $sql = "DELETE FROM aluno WHERE id = :id";

        $usuario = $this->pdo->prepare($sql);

        $usuario->bindValue(':id', $id);
        $usuario->execute();
    }

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