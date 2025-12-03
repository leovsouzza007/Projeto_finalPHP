<?php
require_once "../config.inc.php";

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome  = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $cargo = trim($_POST['cargo']);

    if (empty($nome) || empty($email) || empty($senha) || empty($cargo)) {
        $mensagem = "<div class='alert alert-danger'>Preencha todos os campos.</div>";
    } else {

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO funcionarios (nome, email, senha, cargo) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute([$nome, $email, $senha_hash, $cargo])) {
            header("Location: ?page=ver_funcionarios-admin&success=1");
            exit;
        } else {
            $mensagem = "<div class='alert alert-danger'>Erro ao cadastrar funcionário.</div>";
        }
    }
}
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Cadastrar Funcionários</h3>
    </div>

    <div class="panel-body">

        <?= $mensagem ?>

        <form method="POST">

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome completo">
            </div>

            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control" placeholder="email@dominio.com">
            </div>

            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="senha" class="form-control" placeholder="mínimo 6 caracteres">
            </div>

            <div class="form-group">
                <label>Cargo:</label>
                <select name="cargo" class="form-control">
                    <option value="">Selecione</option>
                    <option value="Receocionista">Recepcionista</option>
                    <option value="Camareiro">Camareiro</option>
                    <option value="Cozinheiro">Cozinheiro</option>
                    <option value="Gerente geral">Gerente geral</option>
                    <option value="Técnico de manutenção">Técnico de manutenção</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>

        </form>
    </div>
</div>
