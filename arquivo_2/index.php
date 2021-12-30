<?php

require 'config.php';
require 'dao/UsuarioDAO.php';

$usuarioDao = new UsuarioDAO($pdo);
$lista = $usuarioDao->findAll();

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
        <td><?=$usuario->getId();?></td>
        <td><?=$usuario->getNome();?></td>
        <td><?=$usuario->getEmail();?></td>
        <td><?=$usuario->getTelefone();?></td>
        <td>
            <a href="editar.php?id=<?= $usuario->getId(); ?>">[ EDITAR ]</a>
            <a href="excluir.php?id=<?= $usuario->getId(); ?> " onclick="return confirm('tem certeza que deseja excluir?')">[ EXCLUIR ]</a>
        </td>
    </tr>
    <?php  endforeach; ?>
</table>


