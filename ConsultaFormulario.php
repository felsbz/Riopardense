<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel de Controle Municipal COVID-19</title>
    </head>
    <body>
        <?php
        if (isset($_POST["consulta"])) {
            $cidade = $_POST["cidade"];
                                    
            include "conecta_banco.php";
            $resultado = mysqli_query($conexao, "SELECT * FROM fichas WHERE cidade='$cidade' ORDER BY data DESC");
            $rows_resultado = mysqli_fetch_array($resultado);

            echo "<h1>$cidade</h1>";
            echo "<b>Região Administrativa: </b>" . $rows_resultado['regiao_adm']."<br>";
            echo "<b>Data: </b>" . $rows_resultado['data'] . "     
            
            <table border='1'>
                <thead> 
                    <tr>
                        <th>População e Geral</th>
                        <th>Números</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pessoas em Isolamento Domiciliar:</td>
                        <td  align='center'>" . $rows_resultado['isolamento'] . "</td>
                    </tr>
                    <tr>
                        <td>Notificações:</td>
                        <td  align='center'>" . $rows_resultado['notificacao'] . "</td>
                    </tr>
                    <tr>
                        <td>Pacientes do Município:</td>
                        <td align='center'>" . $rows_resultado['pacientes'] . "</td>
                    </tr>
                    <tr>
                        <td>Pacientes de Outros Municípios:</td>
                        <td align='center'>" . $rows_resultado['pacientes_outros'] . "</td>
                    </tr>
                    <tr>
                        <td>Total de leitos - Quartos:</td>
                        <td align='center'>" . $rows_resultado['leitos'] . "</td>
                    </tr>
                    <tr>
                        <td>Pacientes Internados - Quartos:</td>
                        <td align='center'>" . $rows_resultado['internados'] . "</td>
                    </tr>
                    <tr>
                        <td>Total de leitos - UTI:</td>
                        <td align='center'>" . $rows_resultado['leitos_uti'] . "</td>
                    </tr>
                    <tr>
                        <td>Pacientes Internados - UTI:</td>
                        <td align='center'>" . $rows_resultado['internados_uti'] . "</td>
                    </tr>
                    <tr>
                        <td>Fila de Espera para Internação:</td>
                        <td align='center'>" . $rows_resultado['fila_internacao'] . "</td>
                    </tr>
                    <tr>
                        <td>Paciente Alta do Isolamento Social:</td>
                        <td align='center'>" . $rows_resultado['alta_isolamento'] . "</td>
                    </tr>
                    <tr>
                        <td>Aguardando Resultados:</td>
                        <td align='center'>" . $rows_resultado['aguardando'] . "</td>
                    </tr>
                    <tr>
                        <td>Confirmados:</td>
                        <td align='center'>" . $rows_resultado['confirmados'] . "</td>
                    </tr>
                    <tr>
                        <td>Negativos:</td>
                        <td align='center'>" . $rows_resultado['negativos'] . "</td>
                    </tr>
                    <tr>
                        <td>Óbito:</td>
                        <td align='center'>" . $rows_resultado['obito'] . "</td>
                    </tr>                     
                    <thead>
                    <tr>
                        <th>Profissionais de Saúde</th>
                        <th>Números</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>Notificações de Profissionais de Saúde:</td>
                        <td  align='center'>" . $rows_resultado['notificacao_saude'] . "</td>
                    </tr>
                    <tr>
                        <td>Profissionais de Saúde Aguardando Resultados: </td>
                        <td  align='center'>" . $rows_resultado['aguardando_saude'] . "</td>
                    </tr>
                    <tr>
                        <td>Profissionais de Saúde Resultado Negativo: </td>
                        <td  align='center'>" . $rows_resultado['negativos_saude'] . "</td>
                    </tr>
                    <tr>
                        <td>Profissionais de Saúde Resultado Positivo:</td>
                        <td  align='center'>" . $rows_resultado['positivo_saude'] . "</td>
                    </tr>
                    <tr>
                        <td>Óbito:</td>
                        <td  align='center'>" . $rows_resultado['obito_saude'] . "</td>
                    </tr>
                </tbody>
            </table><br><br>";

            $resultado2 = mysqli_query($conexao, "SELECT * FROM fichas WHERE cidade='$cidade' ORDER BY data DESC LIMIT 30");
            echo "<h2>Poulação Geral</h2>";
            echo "<table border='1'>
                <thead>                    
                    <tr>
                        <th>Data</th>
                        <th>Confiirmados</th>
                        <th>Óbitos</th>
                        <th>Isolados</th>
                        <th>Aguardando Resultado</th>
                    </tr>
                </thead>
            <tbody>";

            while ($rows_resultado2 = mysqli_fetch_array($resultado2)) {
                echo "
                    <tr>
                        <td align='center'>" . $rows_resultado2['data'] . "</td>
                        <td align='center'>" . $rows_resultado2['confirmados'] . "</td>
                        <td align='center'>" . $rows_resultado2['obito'] . "</td>
                        <td align='center'>" . $rows_resultado2['isolamento'] . "</td>
                        <td align='center'>" . $rows_resultado2['aguardando'] . "</td>
                    </tr><br>";
            }
            echo "</tbody>
            </table><br><br>";


            $resultado3 = mysqli_query($conexao, "SELECT * FROM fichas WHERE cidade='$cidade'ORDER BY data DESC LIMIT 30");
            echo "<h2>Profissionais de Saúde</h2>
            <table border='1'>
                <thead> 
                    <tr>
                        <th>Data</th>
                        <th>Confiirmados</th>
                        <th>Óbitos</th>
                        <th>Aguardando Resultado</th>
                    </tr>
                </thead>
            <tbody>";

            while ($rows_resultado3 = mysqli_fetch_array($resultado3)) {
                echo "
                    <tr>
                        <td align='center'>" . $rows_resultado3['data'] . "</td>
                        <td align='center'>" . $rows_resultado3['positivo_saude'] . "</td>
                        <td align='center'>" . $rows_resultado3['obito_saude'] . "</td>
                        <td align='center'>" . $rows_resultado3['aguardando_saude'] . "</td>
                    </tr><br>";
            }
            echo "</tbody>
            </table>";
        } else {
            echo "<script>alert('Houve um erro inesperado!')</script>";
        }
        ?>

        <br><b><a href="ConsultaMonitoramento.php">Voltar</a></b>
        <input type="button" value="Imprimir" onclick="window.print()"/>
    </body>
        
</html>