
<?php 
require 'config.php';
require 'dao/UsuarioDAO.php';
    
$usuarioDao = new UsuarioDAO($pdo);

$informacoesUsuario = false;
$id = filter_input(INPUT_GET, 'id');

if ($id){
    try{ 

        $informacoesUsuario = $usuarioDao->findById($id);
            
    }catch(Exception $e){
        print_r($e);
    }
}if ($usuario === false ){
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