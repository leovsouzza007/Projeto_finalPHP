<?php

    require_once "../config.inc.php";
    $id = $_GET['id'];

    $sql = "DELETE FROM quartos WHERE id = $id";

    $resultado = mysqli_query($conexao, $sql);
    if($resultado){
       echo "<h2>Registro excluido com sucesso!</h2>";
       echo "<br><a href='?page=ver_quartos-admin'>Listar Clientes</a>";
    }else{
        echo "<h2>Erro ao excluir registro!</h2>";
        echo "<br><a href='?page=ver_quartos-admin'>Voltar</a>";
    }