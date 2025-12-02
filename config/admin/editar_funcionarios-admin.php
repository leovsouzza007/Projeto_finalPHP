<?php

require_once "../config.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cargo = $_POST["cargo"];
    $id = $_POST["id"];

    $sql = "UPDATE funcionarios SET 
            nome = '$nome',
            email = '$email',
            cargo = '$cargo'
            WHERE id = '$id'";

    $executa = mysqli_query($conexao, $sql);
    if($executa) {
        echo "<h2>Alteração realizada com sucesso.</h2>";
        echo "<a href='?page=ver_funcionarios-admin'>Voltar</a>";
    }else{
        echo "<h2>Erro ao alterar cadastro.</h2>";
        echo "<a href='?page=ver_funcionarios-admin'>Voltar</a>";
    }
}else{
    echo "<h2>Acesso negado.</h2>";
    echo "<a href='?page=ver_funcionarios-admin'>Voltar</a>";
}



