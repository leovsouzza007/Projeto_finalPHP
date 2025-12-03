<?php 

require_once("../config/config.inc.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE quartos SET status = 'Indisponível' WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?page=principal&reservado=1");
        exit;
    } else {
        echo "Erro ao reservar o quarto.";
    }
} else {
    echo "ID inválido.";
}

?>
