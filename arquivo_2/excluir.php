
<?php 
require 'config.php';
require 'dao/UsuarioDAO.php';
    
$usuarioDao = new UsuarioDAO($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id){
    try{ 
        
        $usuarioDao->delete($id);
            
    }catch(Exception $e){
        print_r($e);
    }
}else{
    header('Location: index.php' );
    exit;
}

?>