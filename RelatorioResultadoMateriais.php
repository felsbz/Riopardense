<?php

$rank = 1;
$TotalAvental = 0;
$TotalBotas = 0;
$TotalLuvas = 0;
$TotalMascaras = 0;
$TotalProtecaoOcular = 0;


include "conecta_banco.php";

//Selecionar cidades
$sql = "SELECT cidade FROM fichas WHERE regiao_adm = '". $_POST["regiao_adm"] ."' GROUP BY cidade ORDER BY cidade ASC";
$resultado = mysqli_query($conexao, $sql);

echo "<h1>Relatório de Materias na Região Administrativa de ".$_POST["regiao_adm"] ."</h1><br>
    <table border='1'>
                <thead> 
                    <tr>
                        <th>Nº</th>
                        <th>Data</th>
                        <th>Cidade</th>
                        <th>Avental</th>
                        <th>Botas</th>
                        <th>Luvas</th>
                        <th>Mascaras</th>
                        <th>Proteção Ocular</th>                        
                    </tr>
                </thead>
                <tbody>";

while (($rows_resultado = mysqli_fetch_array($resultado))) {

    $sql0 = "SELECT data, cidade, avental, botas, luvas, mascaras, "
            . "protecao_ocular FROM fichas "
            . "WHERE cidade = '" . $rows_resultado['cidade'] . "' ORDER BY data DESC";
    
    $resultado0 = mysqli_query($conexao, $sql0);
    $rows_resultado0 = mysqli_fetch_array($resultado0);
    
                   
        echo "<tr>
                    <td align='center'>" . $rank . " </td>
                    <td align='center'>" . $rows_resultado0['data']. " </td>
                    <td align='center'>" . $rows_resultado0['cidade']. " </td>
                    <td align='center'>" . $rows_resultado0['avental']. " </td>
                    <td align='center'>" . $rows_resultado0['botas']. " </td>
                    <td align='center'>" . $rows_resultado0['luvas']. " </td>
                    <td align='center'>" . $rows_resultado0['mascaras']. " </td>
                    <td align='center'>" . $rows_resultado0['protecao_ocular']. " </td>                    
             </tr>";
        $TotalAvental = $TotalAvental + $rows_resultado0['avental'];
        $TotalBotas = $TotalBotas + $rows_resultado0['botas'];
        $TotalLuvas = $TotalLuvas + $rows_resultado0['luvas'];
        $TotalMascaras = $TotalMascaras + $rows_resultado0['mascaras'];
        $TotalProtecaoOcular = $TotalProtecaoOcular + $rows_resultado0['protecao_ocular'];
        
        $rank = $rank + 1;
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
                        <td align='center'>Avental</td>    
                        <td align='center'>" . $TotalAvental . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Botas</td>    
                        <td align='center'>" . $TotalBotas . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Luvas</td>    
                        <td align='center'>" . $TotalLuvas . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Mascaras</td>    
                        <td align='center'>" . $TotalMascaras . " </td>
                    </tr>
                    <tr>
                        <td align='center'>Proteção Ocular</td>    
                        <td align='center'>" . $TotalProtecaoOcular . " </td>
                    </tr>                    
                </tbody>
            </table><br><br>
<a href='RelatorioMonitoramento.php'>Voltar</a>
                <input type='button' value='Imprimir' onclick='window.print()'/>";
?>
