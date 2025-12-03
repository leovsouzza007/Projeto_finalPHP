<?php
    require_once "../config.inc.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM quartos WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($resultado) > 0){
        $quarto = mysqli_fetch_array($resultado);


?>

<h2>Edição de dados do Quarto</h2>
<form action="?page=editar_quartos-admin" method="post">
    <input type="hidden" name="id" class="form-control" value="<?=$quarto['id']?>">
    <label>Nome:</label>
    <input type="text" name="nome" class="form-control" value="<?=$quarto['nome']?>"><br>
    <label>Descrição:</label>
    <input type="texta" name="descricao" class="form-control" value="<?=$quarto['descricao']?>"><br>
    <label>Preço:</label>
    <input type="text" name="preco" class="form-control" value="<?=$quarto['preco']?>"><br>
    <br>
    <input type="submit" value="Alterar quarto">
</form>

<?php
    }else{
        echo "<h2>Nenhum cliente cadastrado!</h2>";
    }
?>

