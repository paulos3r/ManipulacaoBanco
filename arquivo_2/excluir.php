
<?php 
require 'config.php';
$id = filter_input(INPUT_GET, 'id');

if ($id){
    try{ 
            
        $sql = "DELETE FROM aluno WHERE id = :id";

        $result = $pdo->prepare($sql);

        $result->bindValue(':id', $id);

        $result->execute();
            
    }catch(Exception $e){
        print_r($e);
    }
}else{
    header('Location: index.php' );
    exit;
}

?>