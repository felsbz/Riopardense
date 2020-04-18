<?php

if (isset($_POST["data"])) {
    $id = $_POST["data"];
    include "conecta_banco.php";

    mysqli_query($conexao, "DELETE FROM fichas WHERE id = $id");
    echo "Registro deletado com sucesso!<br><br><b>"
    . "<a href='DeletarMonitoramento.php'>Voltar</a></b>";
} else {
    echo "Não é possível executar essa operação<br><br>"
    . " <b><a href='DeletarMonitoramento.php'>Voltar</a></b>";
}
?>