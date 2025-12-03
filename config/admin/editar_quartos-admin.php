<?php

require_once "../config.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $id = $_POST["id"];

    $sql = "UPDATE quartos SET 
            nome = '$nome',
            descricao = '$descricao',
            preco = '$preco'
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
