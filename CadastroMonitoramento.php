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
        <h1><b>Cadastro</b></h1><br>
        <form name=cadastro action="CadastroFormulario.php" method="POST">
            <p>Cidade: 
                <select name="cidade">
                    <?php
                    include "Municipios.php";
                    ?>                
                </select></p>
            <p>Região Administrativa: 
                <select name="regiao_adm">
                    <?php
                    include "./RegioesAdm.php";
                    ?>                
                </select></p>
            <p>Data: <input name="data" type="date" required></p>

            <table border="1">
                <thead>
                    <tr>
                        <th>População em Geral</th>
                        <th>Números</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pessoas em Isolamento Domiciliar:</td>
                        <td><input name="isoladas" type="number" min="0" size="11" required></td>
                    </tr>
                    <tr>
                        <td>Notificações:</td>
                        <td><input name="notificacao" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Pacientes do Município:</td>
                        <td><input name="paciente_municipio" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Pacientes de Outros Municípios:</td>
                        <td><input name="paci_outro_municipio" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Total de Leitos - Quartos:</td>
                        <td><input name="leitos" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Pacientes Internados - Quartos:</td>
                        <td><input name="paciente_internado" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Total de Leitos - UTI:</td>
                        <td><input name="leitos_uti" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Pacientes Internados - UTI:</td>
                        <td><input name="internados_uti" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Fila de Espera para Internação:</td>
                        <td><input name="fila_internacao" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    
                    <tr>                        
                        <td>Paciente Alta do Isolamento Social:</td>
                        <td><input name="isolamento" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Aguardando Resultados:</td>
                        <td><input name="aguardando_resultado" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Confirmados:</td>
                        <td><input name="confirmados" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Negativos:</td>
                        <td><input name="negativos" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Óbito:</td>
                        <td> <input name="obito" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <th>Profissionais de Saúde</th>
                        <th>Números</th>
                    </tr>
                    <tr>
                        <td>Notificações de Profissionais de Saúde:</td>
                        <td><input name="notificacao_prof_saude" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Profissionais de Saúde Aguardando Resultados: </td>
                        <td><input name="prof_saude_aguardando" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Profissionais de Saúde Resultado Negativo: </td>
                        <td><input name="prof_saude_negativo" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Profissionais de Saúde Resultado Positivo:</td>
                        <td> <input name="prof_saude_positivo" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td>Óbito:</td>
                        <td> <input name="prof_saude_obito" type="number" min="0" size="11" maxlength="10" required></td>
                    </tr>

                </tbody>
            </table>

            <br>
            <input type="submit" value="Salvar"/>
            <input type="reset" value="Limpar"/>
        </form>

    </body>
</html>