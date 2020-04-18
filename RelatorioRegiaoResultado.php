<?php

$rank = 1;
$TotalConfirmados = 0;
$TotalObitos = 0;
$TotalLeitos = 0;
$TotalInternados = 0;
$TotalLeitosUti = 0;
$TotalInternadosUti = 0;
$TotalFila = 0;


include "conecta_banco.php";

//Selecionar cidades
$sql = "SELECT cidade FROM fichas WHERE regiao_adm = '". $_POST["regiao_adm"] ."' GROUP BY cidade ORDER BY cidade ASC";
$resultado = mysqli_query($conexao, $sql);

echo "<h1>Relatório da Região Administrativa de ".$_POST["regiao_adm"] ."</h1><br>
    <table border='1'>
                <thead> 
                    <tr>
                        <th>Nº</th>
                        <th>Data</th>
                        <th>Cidade</th>
                        <th>Confirmados</th>
                        <th>Obitos</th>
                        <th>Isolamento</th>
                        <th>Positivo Prof. Saúde</th>
                        <th>Leitos</th>
                        <th>Internados</th>
                        <th>Leitos - UTI</th>
                        <th>Internados - UTI</th>
                        <th>Fila de Internação</th>
                    </tr>
                </thead>
                <tbody>";

while (($rows_resultado = mysqli_fetch_array($resultado))) {

    $sql0 = "SELECT data, cidade, confirmados, obito, isolamento, positivo_saude, "
            . "leitos, internados, leitos_uti, internados_uti, fila_internacao FROM fichas "
            . "WHERE cidade = '" . $rows_resultado['cidade'] . "' ORDER BY data DESC";
    
    $resultado0 = mysqli_query($conexao, $sql0);
    $rows_resultado0 = mysqli_fetch_array($resultado0);
    
    if ($rows_resultado0['confirmados'] > 0) {
               
        echo "<tr>
                    <td align='center'>" . $rank . " </td>
                    <td align='center'>" . $rows_resultado0['data']. " </td>
                    <td align='center'>" . $rows_resultado0['cidade']. " </td>
                    <td align='center'>" . $rows_resultado0['confirmados']. " </td>
                    <td align='center'>" . $rows_resultado0['obito']. " </td>
                    <td align='center'>" . $rows_resultado0['isolamento']. " </td>
                    <td align='center'>" . $rows_resultado0['positivo_saude']. " </td>
                    <td align='center'>" . $rows_resultado0['leitos']. " </td>
                    <td align='center'>" . $rows_resultado0['internados']. " </td>
                    <td align='center'>" . $rows_resultado0['leitos_uti']. " </td>
                    <td align='center'>" . $rows_resultado0['internados_uti']. " </td>
                    <td align='center'>" . $rows_resultado0['fila_internacao']. " </td>
             </tr>";
        $TotalConfirmados = $TotalConfirmados + $rows_resultado0['confirmados'];
        $TotalObitos = $TotalObitos + $rows_resultado0['obito'];
        $TotalLeitos = $TotalLeitos + $rows_resultado0['leitos'];
        $TotalInternados = $TotalInternados + $rows_resultado0['internados'];
        $TotalLeitosUti = $TotalLeitosUti + $rows_resultado0['leitos_uti'];
        $TotalInternadosUti = $TotalInternadosUti + $rows_resultado0['internados_uti']; 
        $TotalFila = $TotalFila + $rows_resultado0['fila_internacao'];
        $rank = $rank + 1;
    }
    
}

echo "</tbody>
                </table><br><br>
                
            <table border='1'>
                <thead> 
                    <tr>
                        <th>Descrição</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align='center'>Confirmados</td>    
                        <td align='center'>" . $TotalConfirmados . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Obitos</td>    
                        <td align='center'>" . $TotalObitos . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Leitos nos Quartos</td>    
                        <td align='center'>" . $TotalLeitos . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Internados nos Quartos</td>    
                        <td align='center'>" . $TotalInternados . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Leitos na UTI</td>    
                        <td align='center'>" . $TotalLeitosUti . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Internados na UTI</td>    
                        <td align='center'>" . $TotalInternadosUti . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Fila para Internação</td>    
                        <td align='center'>" . $TotalFila . " </td>
                    </tr>
                </tbody>
            </table><br><br>
<a href='RelatorioMonitoramento.php'>Voltar</a>
                <input type='button' value='Imprimir' onclick='window.print()'/>";
?>
