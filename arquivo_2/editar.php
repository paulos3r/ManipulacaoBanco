
<?php 
    require 'config.php';

    $informacoesUsuario = [];
    $id = filter_input(INPUT_GET, 'id');

    if ($id){
        try{ 
            
            $sql = "SELECT * FROM aluno WHERE id = :id";
            $result = $pdo->prepare($sql);

            $result->bindValue(':id', $id);
            $result->execute();
            
        }catch(Exception $e){
            print_r($e);
        }

        if($result->rowCount() > 0){
            $informacoesUsuario = $result->fetch( PDO::FETCH_ASSOC );
        }else {
            header('Location: index.php' );
            exit;
        }
    }else{
        header('Location: index.php' );
        exit;
    }
?>
<h1>Editar usúario</h1>

<form method="POST" action="editar_action.php">
    <label>
        ID:<br/>
        <input type="text" name="id" value="<?= $informacoesUsuario['id']; ?>"/>
    </label><br/>
    <label>
        Nome:<br/>
        <input type="text" name="nome" value="<?= $informacoesUsuario['nome']; ?>" />
    </label><br/>
    <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?= $informacoesUsuario['email']; ?>" />
    </label><br/>
    <label>
        Telefone:<br/>
        <input type="text" name="telefone" value="<?= $informacoesUsuario['telefone']; ?>" />
    </label><br/>

    <input type="submit" name="Salvar" />

</form>