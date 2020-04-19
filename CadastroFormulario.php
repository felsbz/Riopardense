<?php

include "conecta_banco.php";

$resultado = mysqli_query($conexao, "select * from fichas where cidade='$_POST[cidade]' and data='$_POST[data]'");
$total = mysqli_num_rows($resultado);

if ($total == 0) {

    mysqli_query($conexao, "INSERT INTO fichas(cidade, data, isolamento, notificacao, pacientes, "
                    . "pacientes_outros, internados, alta_isolamento, aguardando, confirmados, "
                    . "negativos, obito, notificacao_saude, aguardando_saude, negativos_saude, "
                    . "positivo_saude, obito_saude, leitos, leitos_uti, internados_uti, fila_internacao, "
                    . "regiao_adm, avental, botas, luvas, mascaras, protecao_ocular) VALUES ('$_POST[cidade]', '$_POST[data]',"
                    . "'$_POST[isoladas]','$_POST[notificacao]','$_POST[paciente_municipio]',"
                    . "'$_POST[paci_outro_municipio]','$_POST[paciente_internado]','$_POST[isolamento]',"
                    . "'$_POST[aguardando_resultado]','$_POST[confirmados]','$_POST[negativos]','$_POST[obito]',"
                    . "'$_POST[notificacao_prof_saude]','$_POST[prof_saude_aguardando]','$_POST[prof_saude_negativo]',"
                    . "'$_POST[prof_saude_positivo]','$_POST[prof_saude_obito]', '$_POST[leitos]','$_POST[leitos_uti]',"
                    . "'$_POST[internados_uti]','$_POST[fila_internacao]','$_POST[regiao_adm]','$_POST[avental]','$_POST[botas]',"
                    . "'$_POST[luvas]','$_POST[mascaras]','$_POST[ocular]')") or die("Houve um erro inespesrado durante o processo");
    echo "Dados inseridos com sucesso<br>";
} else {
    mysqli_query($conexao, "UPDATE fichas SET cidade = '$_POST[cidade]', data = '$_POST[data]', isolamento = '$_POST[isoladas]' "
            . ",notificacao = '$_POST[notificacao]', pacientes = '$_POST[paciente_municipio]', "
            . "pacientes_outros='$_POST[paci_outro_municipio]', internados='$_POST[paciente_internado]', "
            . "alta_isolamento = '$_POST[isolamento]', aguardando = '$_POST[aguardando_resultado]', confirmados='$_POST[confirmados]', "
            . "negativos='$_POST[negativos]', obito = '$_POST[obito]', notificacao_saude='$_POST[notificacao_prof_saude]', "
            . "aguardando_saude='$_POST[prof_saude_aguardando]', negativos_saude = '$_POST[prof_saude_negativo]', "
            . "positivo_saude = '$_POST[prof_saude_positivo]', obito_saude = '$_POST[prof_saude_obito]', leitos = '$_POST[leitos]',"
            . "leitos_uti = '$_POST[leitos_uti]', internados_uti = '$_POST[internados_uti]', fila_intternacao = '$_POST[fila_internacao]', "
            . "regiao_adm = '$_POST[regiao_adm]', avental = '$_POST[avental]', botas = '$_POST[botas]', luvas = '$_POST[luvas], "
            . "mascaras = '$_POST[mascaras]', protecao_ocular = '$_POST[ocular]'"
            . "WHERE cidade='$_POST[cidade]' and data='$_POST[data]'");
    echo "Dados atualizado com sucesso<br>";
}
echo "<a href='index.php'>Voltar</a>";
?>
