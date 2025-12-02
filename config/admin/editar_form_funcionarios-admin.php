<?php
    require_once "../config.inc.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM funcionarios WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($resultado) > 0){
        $funcionario = mysqli_fetch_array($resultado);


?>

<h2>Cadastro de Clientes</h2>
<form action="?page=editar_funcionarios-admin" method="post">
    <input type="hidden" name="id" value="<?=$funcionario['id']?>">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?=$funcionario['nome']?>"><br>
    <label>Cidade:</label>
    <input type="text" name="email" value="<?=$funcionario['email']?>"><br>
    <label>Estado:</label>
    <input type="text" name="cargo" value="<?=$funcionario['cargo']?>"><br>

    <input type="submit" value="Alterar funcionário">
</form>

<?php
    }else{
        echo "<h2>Nenhum cliente cadastrado!</h2>";
    }
?>