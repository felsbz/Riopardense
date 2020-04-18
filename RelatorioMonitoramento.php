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
        <h1><b>Relatórios</b></h1><br>

        <table border='1'>
            <thead> 
                <tr>
                    <th><a href="RelatorioResumido.php">>> Relatório Resumido <<</a></th>
                </tr>
                <tr>
                    <th><a href="RelatorioCidades.php">>> Cidades Afetadas <<</a></th>
                </tr>
                <tr>
                    <th><a href="RelatorioLeitos.php">>> Relatório de Leitos - 50% <<</a></th>
                </tr>
                <tr>
                    <th><a href="RelatorioLeitosUti.php">>> Relatório de Leitos de UTI - 50% <<</a></th>
                </tr>
                <tr>
                    <th><a href="RelatorioLeitos80.php">>> Relatório de Leitos - 80% <<</a></th>
                </tr>
                 <tr>
                     <th><a href="RelatorioLeitosUti80.php">>> Relatório de Leitos de UTI - 80% <<</a></th>
                </tr>
                <tr>
                    <th><a href="RelatorioSemLeitos.php">>> Relatório de Cidades Sem Leitos <<</a></th>
                </tr> 
                <tr>
                    <th><a href="RelatorioMortalidade.php">>> Relatório de Letalidade <<</a></th>
                </tr> 
                <tr>
                    <th><a href="RelatorioRegiaoAdm.php">>> Relatório das Regiões Administrativas <<</a></th>
                </tr> 
            </thead>
        </table>
        <br><a href='index.php'>Voltar</a>
        <input type='button' value='Imprimir' onclick='window.print()'/>
    </body>    
</html>