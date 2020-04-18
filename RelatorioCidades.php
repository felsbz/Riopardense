<?php

echo "<h1>Relatório - Cidades com Casos Confirmados</h1>";
$rank = 1;

include "conecta_banco.php";
//Selecionar cidades
$sql = "SELECT cidade FROM fichas GROUP BY cidade ORDER BY cidade ASC";
$resultado = mysqli_query($conexao, $sql);

echo "<table border='1'>
                <thead> 
                    <tr>
                        <th>Nº</th>
                        <th>Data</th>
                        <th>Cidade</th>
                        <th>Confirmados</th> 
                        <th>Óbitos</th> 
                        <th>Internados</th> 
                        <th>Isolados Socialmente</th>
                        <th>Prof. Saúde Infectados</th> 
                    </tr>
                </thead>
            <tbody>";

while (($rows_resultado = mysqli_fetch_array($resultado))) {

    $sql0 = "SELECT data, cidade, confirmados, obito, internados, isolamento, positivo_saude FROM fichas WHERE cidade = '" . $rows_resultado['cidade'] . "' ORDER BY data DESC";
    $resultado0 = mysqli_query($conexao, $sql0);
    $rows_resultado0 = mysqli_fetch_array($resultado0);

    if ($rows_resultado0['confirmados'] > 0) {
        echo "
                    <tr>
                    <td align='center'>" . $rank . "</td>
                    <td align='center'>" . $rows_resultado0['data'] . "</td>
                    <td align='center'>" . $rows_resultado0['cidade'] . "</td>
                    <td align='center'>" . $rows_resultado0['confirmados'] . "</td>
                    <td align='center'>" . $rows_resultado0['obito'] . "</td>
                    <td align='center'>" . $rows_resultado0['internados'] . "</td>
                    <td align='center'>" . $rows_resultado0['isolamento'] . "</td>
                    <td align='center'>" . $rows_resultado0['positivo_saude'] . "</td>
                    </tr>";
        $rank = $rank + 1;
    }
}
echo "</tbody>
            </table><br><br><a href='RelatorioMonitoramento.php'>Voltar</a>
            <input type='button' value='Imprimir' onclick='window.print()'/>";

?>