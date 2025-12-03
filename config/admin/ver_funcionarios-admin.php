<?php
require_once "../config.inc.php";

$sql = "SELECT id, nome, email, cargo FROM funcionarios ORDER BY id DESC";
$result = $conexao->query($sql);
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Funcionários Cadastrados</h3>
    </div>

    <div class="panel-body">

        <?php if (!empty($_GET['success'])): ?>
        <div class="alert alert-success text-center">
            Funcionário cadastrado com sucesso!
        </div>
        <?php endif; ?>

        <div class="text-right" style="margin-bottom:20px;">
            <a href="?page=cadastrar_funcionarios-admin" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span> Novo Funcionário
            </a>
        </div>

        <?php if ($result && $result->num_rows > 0): ?>

            <div class="row">

                <?php while ($dados = $result->fetch_assoc()): ?>

                    <div class="col-md-4 col-sm-6">
                        <div class="panel panel-default" style="border-radius:6px;">

                            <div class="panel-heading" style="background:#f5f5f5; border-radius:6px 6px 0 0;">
                                <strong><?= $dados['nome']; ?></strong>
                            </div>

                            <div class="panel-body" style="font-size:16px;">

                                <p><strong>ID:</strong> <?= $dados['id']; ?></p>
                                <p><strong>Email:</strong> <?= $dados['email']; ?></p>
                                <p><strong>Cargo:</strong> <?= $dados['cargo']; ?></p>

                                <div class="text-right">
                                    <a href='?page=editar_form_funcionarios-admin&id=<?= $dados["id"]; ?>'
                                       class="btn btn-primary btn-sm"
                                       style="margin-right:8px;">
                                        <span class="glyphicon glyphicon-edit"></span> Editar
                                    </a>

                                    <a href='?page=excluir_funcionarios-admin&id=<?= $dados["id"]; ?>'
                                       class="btn btn-danger btn-sm"
                                       style="margin-right:8px;">
                                        <span class="glyphicon glyphicon-trash"></span> Excluir
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>

                <?php endwhile; ?>

            </div>

        <?php else: ?>

            <div class="alert alert-warning text-center" style="font-size:18px;">
                Nenhum funcionário cadastrado ainda.
            </div>

        <?php endif; ?>

    </div>
</div>

<script>
function confirmarExclusao(){
    return confirm("Tem certeza que deseja excluir este funcionário?");
}
</script>
