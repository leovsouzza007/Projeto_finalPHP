<?php

require_once "../config.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $id = $_POST["id"];

    $sql = "UPDATE quartos SET 
            nome = '$nome',
            email = '$email',
            WHERE id = '$id'";

    $executa = mysqli_query($conexao, $sql);
    if($executa) {
        echo "<h2>Alteração realizada com sucesso.</h2>";
        echo "<a href='?page=ver_quartos-admin'>Voltar</a>";
    }else{
        echo "<h2>Erro ao alterar cadastro.</h2>";
        echo "<a href='?page=ver_quartos-admin'>Voltar</a>";
    }
}else{
    echo "<h2>Acesso negado.</h2>";
    echo "<a href='?page=ver_quartos-admin'>Voltar</a>";
}
