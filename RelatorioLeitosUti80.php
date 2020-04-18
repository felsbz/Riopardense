<?php

$rank = 1;
include "conecta_banco.php";
$sql = "SELECT cidade FROM fichas GROUP BY cidade ORDER BY cidade ASC";

$resultado = mysqli_query($conexao, $sql);

echo "<h1>Relatório - Cidades com mais de 80% de ocupação de Leitos de UTI</h1>
    <table border='1'>
                <thead> 
                    <tr>
                        <th>Nº</th>
                        <th>Data</th>
                        <th>Cidade</th>
                        <th>Leitos - UTI</th> 
                        <th>Internado - UTI</th>
                        <th>Ocupação</th>
                    </tr>";

while (($rows_resultado = mysqli_fetch_array($resultado))) {

    //Pegar primeiro dado
    $sql = "SELECT data, cidade, leitos_uti, internados_uti FROM fichas WHERE cidade = '" . $rows_resultado['cidade'] . "' ORDER BY data DESC";
    $resultado1 = mysqli_query($conexao, $sql);
    $rows_resultado1 = mysqli_fetch_array($resultado1);

    if ($rows_resultado1['leitos_uti'] != 0) {
        if (($rows_resultado1['internados_uti'] / $rows_resultado1['leitos_uti']) > 0.8) {
            echo "<tr>
                            <td align='center'>" . $rank . "</td>
                            <td align='center'>" . $rows_resultado1['data'] . "</td>
                            <td align='center'>" . $rows_resultado1['cidade'] . "</td>
                            <td align='center'>" . $rows_resultado1['leitos_uti'] . "</td>
                            <td align='center'>" . $rows_resultado1['internados_uti'] . "</td>
                            <td align='center'>" . intval(($rows_resultado1['internados_uti'] / $rows_resultado1['leitos_uti']) * 100) . "%</td></tr>";
            $rank = $rank + 1;
        }
    }
}
echo "</thead></table><br></table><br><br><a href='RelatorioMonitoramento.php'>Voltar</a>"
. "<input type='button' value='Imprimir' onclick='window.print()'/>";
?>
