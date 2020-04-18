<?php

$servidor = "localhost";
$banco = "painelmunicipio";
$usuario = "root";
$senha = "";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
if (!($conexao)) {
    echo "Não foi possivel estabelecer uma conexão com o MySQL.";
    exit;
}
?>