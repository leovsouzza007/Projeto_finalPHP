<?php

    require_once "../config.inc.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM funcionarios WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($resultado) > 0){
        $funcionario = mysqli_fetch_array($resultado);

?>

<h2>Edição de dados do Funcionário</h2>
<form action="?page=editar_funcionarios-admin" method="post">
    <input type="hidden" name="id" value="<?=$funcionario['id']?>">
    <label>Nome:</label>
    <input type="text" name="nome" class="form-control" value="<?=$funcionario['nome']?>"><br>
    <label>Email:</label>
    <input type="text" name="email" class="form-control" value="<?=$funcionario['email']?>"><br>
    <label>Cargo:</label>
    <select name="cargo" class="form-control">
        <option value="">Selecione</option>
        <option value="Receocionista">Recepcionista</option>
        <option value="Camareiro">Camareiro</option>
        <option value="Cozinheiro">Cozinheiro</option>
        <option value="Gerente geral">Gerente geral</option>
        <option value="Técnico de manutenção">Técnico de manutenção</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Alterar funcionário">
</form>

<?php
    }else{
        echo "<h2>Nenhum cliente cadastrado!</h2>";
    }
?>