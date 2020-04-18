<?php

$rank = 1;
$totalConfirmados = 0;
$totalObitos = 0;
$totalInternados = 0;
$totalIsolados = 0;
$totalProfSaude = 0;


include "conecta_banco.php";
//Selecionar cidades
$sql = "SELECT cidade FROM fichas GROUP BY cidade ORDER BY cidade ASC";
$resultado = mysqli_query($conexao, $sql);

while (($rows_resultado = mysqli_fetch_array($resultado))) {

    $sql0 = "SELECT data, cidade, confirmados, obito, internados, isolamento, positivo_saude FROM fichas WHERE cidade = '" . $rows_resultado['cidade'] . "' ORDER BY data DESC";
    $resultado0 = mysqli_query($conexao, $sql0);
    $rows_resultado0 = mysqli_fetch_array($resultado0);

    if ($rows_resultado0['confirmados'] > 0) {
        $totalConfirmados = $totalConfirmados + $rows_resultado0['confirmados'];
        $totalObitos = $totalObitos + $rows_resultado0['obito'];
        $totalInternados = $totalInternados + $rows_resultado0['internados'];
        $totalIsolados = $totalIsolados + $rows_resultado0['isolamento'];
        $totalProfSaude = $totalProfSaude + $rows_resultado0['positivo_saude'];
        $rank = $rank + 1;
    }
}

echo "<h1>Relatório Resumido</h1><br>
    <table border='1'>
                <thead> 
                    <tr>
                        <th>Descrição</th>
                        <th>Total</th>                        
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Munícipios Afetados:</td>
                    <td align='center'>" . ($rank - 1) . "</td>
                </tr>
                <tr>
                <td>Confirmados:</td>
                    <td align='center'>" . $totalConfirmados . "</td>
                                </tr>
                <tr>
                    <td>Obitos:</td>
                    <td align='center'>" . $totalObitos . "</td>
                </tr>
                <tr>
                    <td>Iternados:</td>
                    <td align='center'>" . $totalInternados . "</td>
                </tr>
                <tr>
                    <td>Isolados:</td>
                    <td align='center'>" . $totalIsolados . "</td>
                </tr>                
                <tr>
                    <td>Prof. Saúde Infectados:</td>
                    <td align='center'>" . $totalProfSaude . "</td>
                </tr>    
                   

            </tbody>
                </table><br><br><a href='RelatorioMonitoramento.php'>Voltar</a>
                <input type='button' value='Imprimir' onclick='window.print()'/>";
?>