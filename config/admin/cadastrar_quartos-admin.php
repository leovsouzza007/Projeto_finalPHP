<?php
require_once "../config.inc.php";

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome       = trim($_POST['nome']);
    $descricao  = trim($_POST['descricao']);
    $preco      = trim($_POST['preco']);
    $capacidade = trim($_POST['capacidade']);

    if (empty($nome) || empty($descricao) || empty($preco) || empty($capacidade)) {
        $mensagem = "<div class='alert alert-danger'>Preencha todos os campos.</div>";
    } else {

        $sql = "INSERT INTO quartos (nome, descricao, preco, capacidade) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute([$nome, $descricao, $preco, $capacidade])) {
            header("Location: ?page=ver_quartos-admin&success=1");
            exit;
        } else {
            $mensagem = "<div class='alert alert-danger'>Erro ao cadastrar quarto.</div>";
        }
    }
}
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Cadastrar Quartos</h3>
    </div>

    <div class="panel-body">

        <?= $mensagem ?>

        <form method="POST">

            <div class="form-group">
                <label>Nome do quarto:</label>
                <input type="text" name="nome" class="form-control" placeholder="Ex: Suíte Master">
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="descricao" class="form-control" placeholder="Descrição detalhada do quarto" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label>Preço (R$):</label>
                <input type="number" step="0.01" name="preco" class="form-control" placeholder="Ex: 199.90">
            </div>

            <div class="form-group">
                <label>Capacidade (pessoas):</label>
                <select name="capacidade" class="form-control">
                    <option value="">Selecione</option>
                    <option value="1">1 pessoa</option>
                    <option value="2">2 pessoas</option>
                    <option value="3">3 pessoas</option>
                    <option value="4">4 pessoas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>

        </form>
    </div>
</div>
