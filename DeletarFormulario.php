
<?php

echo "<form method='post' action='Deletar.php'>";
$cidade = $_POST["cidade"];
include "conecta_banco.php";

$resultado = mysqli_query($conexao, "SELECT * FROM fichas WHERE cidade='$cidade' ORDER BY data DESC");

echo "<h1>$cidade</h1><br>
    <label><b>Data:</b> 
                <select name='data'>";
while ($rows_resultado = mysqli_fetch_array($resultado)) {
    echo "<option value='" . $rows_resultado['id'] . "'>" . $rows_resultado['data'] . "</option>";
}
echo "</select></label>
    <input type='submit' name='deletar' value='Deletar'/>
    </form>
    <br><br><b><a href='index.php'>Voltar</a></b>";
?>