<?php
// reclamacoes-admin.php
// Salve este arquivo na mesma pasta onde o index-admin.php inclui as páginas.

declare(strict_types=1);

// Ajuste do caminho para o seu config.inc.php (melhor usar caminho absoluto relativo ao arquivo)
require_once '../config.inc.php'; 

// Garantir que $conexao (mysqli) exista
if (!isset($conexao) || !$conexao) {
    echo "<div class='alert alert-danger'>Conexão com o banco não encontrada. Verifique config.inc.php</div>";
    return;
}

// Ações: marcar como lido / excluir
$mensagemOperacao = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

    if ($id > 0) {
        if ($acao === 'marcar_lido') {
            $sql = "UPDATE reclamacoes SET status = 'lido' WHERE id = ?";
            $stmt = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            if (mysqli_stmt_execute($stmt)) {
                $mensagemOperacao = 'Reclamação marcada como lida.';
            } else {
                $mensagemOperacao = 'Erro ao atualizar status.';
            }
            mysqli_stmt_close($stmt);
        } elseif ($acao === 'excluir') {
            $sql = "DELETE FROM reclamacoes WHERE id = ?";
            $stmt = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            if (mysqli_stmt_execute($stmt)) {
                $mensagemOperacao = 'Reclamação excluída.';
            } else {
                $mensagemOperacao = 'Erro ao excluir.';
            }
            mysqli_stmt_close($stmt);
        }
    }
}

// Buscar mensagens (mais recentes primeiro)
$sql = "SELECT id, nome, email, mensagem, status, criado_em FROM reclamacoes ORDER BY criado_em DESC";
$result = mysqli_query($conexao, $sql);

// Para segurança na exibição
function e($v) {
    return htmlspecialchars((string)$v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Reclamações / Mensagens</h3>
  </div>

  <div class="panel-body">
    <?php if ($mensagemOperacao): ?>
      <div class="alert alert-success"><?= e($mensagemOperacao) ?></div>
    <?php endif; ?>

    <p class="text-muted">Aqui você vê todas as mensagens enviadas pelo formulário de contato.</p>

    <?php if (!$result || mysqli_num_rows($result) === 0): ?>
      <div class="alert alert-info">Nenhuma reclamação encontrada.</div>
    <?php else: ?>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Mensagem (preview)</th>
              <th>Status</th>
              <th>Enviado em</th>
              <th class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= (int)$row['id'] ?></td>
                <td><?= e($row['nome']) ?></td>
                <td><a href="mailto:<?= e($row['email']) ?>"><?= e($row['email']) ?></a></td>
                <td style="max-width:380px;">
                  <?= e(mb_strimwidth($row['mensagem'], 0, 140, '...')) ?>
                  <br>
                  <a href="#ver<?= (int)$row['id'] ?>" data-toggle="collapse" aria-expanded="false" aria-controls="ver<?= (int)$row['id'] ?>">Ver completa</a>
                  <div id="ver<?= (int)$row['id'] ?>" class="collapse" style="margin-top:8px;">
                    <div class="well" style="white-space:pre-wrap;"><?= e($row['mensagem']) ?></div>
                  </div>
                </td>
                <td>
                  <?php if ($row['status'] === 'pendente'): ?>
                    <span class="label label-warning">pendente</span>
                  <?php else: ?>
                    <span class="label label-success">lido</span>
                  <?php endif; ?>
                </td>
                <td><?= e($row['criado_em']) ?></td>
                <td class="text-center" style="min-width:220px;">
                  <?php if ($row['status'] === 'pendente'): ?>
                    <form method="post" style="display:inline-block;margin-right:6px;">
                      <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                      <input type="hidden" name="acao" value="marcar_lido">
                      <button type="submit" class="btn btn-success btn-sm" title="Marcar como lido">Marcar lido</button>
                    </form>
                  <?php endif; ?>

                  <form method="post" style="display:inline-block;" onsubmit="return confirm('Deseja realmente excluir esta mensagem?');">
                    <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                    <input type="hidden" name="acao" value="excluir">
                    <button type="submit" class="btn btn-danger btn-sm" title="Excluir">Excluir</button>
                  </form>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

  </div>
</div>
