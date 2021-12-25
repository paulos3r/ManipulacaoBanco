<?php

require 'config.php';
$lista = [];
$sql = "SELECT * FROM aluno";

$result = $pdo->query($sql);
if($result->rowCount() > 0){
    $lista = $result->fetchAll( PDO::FETCH_ASSOC);

}

?>

<a href="adicionar.php">Adicionar Usuario<a>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>E-MAIL</th>
        <th>TELEFONE</th>
        <th>ACÕES</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
    <tr>
        <td><?=$usuario['id']?></td>
        <td><?=$usuario['nome']?></td>
        <td><?=$usuario['email']?></td>
        <td><?=$usuario['telefone']?></td>
        <td>
            <a href="editar.php?id=<?= $usuario['id']; ?>">[ EDITAR ]</a>
            <a href="excluir.php?id=<?= $usuario['id']; ?> " onclick="return confirm('tem certeza que deseja excluir?')">[ EXCLUIR ]</a>
        </td>
    </tr>
    <?php  endforeach; ?>
</table>


