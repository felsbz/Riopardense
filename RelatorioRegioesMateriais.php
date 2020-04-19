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
        <h1><b>Relatório de Materiais das Regiões Administrativas</b></h1><br>
        <form method="post" action="RelatorioResultadoMateriais.php">
            <label><b>Cidade:</b> 
                <select name="regiao_adm">
                    <?php
                    include "RegioesAdm.php";
                    ?>
                </select></label>
            <input type="submit" name="consulta" value="Consultar"/>
            <br><br><b><a href="index.php">Voltar</a></b>
        </form>
    </body>
</html>