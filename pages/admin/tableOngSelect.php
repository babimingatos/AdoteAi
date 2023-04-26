<?php
include "../conexao.php";

$sth = $pdo->prepare("SELECT o.*,t.telOng_dd,t.telOng_numero FROM tbl_ong AS o 
                    INNER JOIN tbl_telefoneong AS t WHERE o.ong_id = t.tbl_ong_ong_id");
                                                                       
                      
$sth->execute();

echo '<p>Existem: ' . $sth->rowCount() . ' registros</p>';
echo '<table id="example" class="table table-striped table-bordered" style="width:100%">';
echo '<thead>';
echo '<tr>';
echo '<th>Nome</th>';
echo '<th>Email</th>';
echo '<th>Telefone</th>';
echo '<th>CPF</th>';
echo '<th>CNPJ</th>';
echo '<th>Ações</th>';
echo '</tr>';
echo '</thead>';

foreach ($sth as $res) {

    extract($res);

    echo '<tr>';
    echo '<td> ' . $ong_nome . ' </td>';
    echo '<td> ' . $ong_email . ' </td>';
    echo '<td> ' . '(' . $telOng_dd . ') ' . $telOng_numero . ' </td>';
    echo '<td> ' . $ong_cpf . ' </td>';
    echo '<td> ' . $ong_cnpj . ' </td>';
    echo '<td><a href="#?id=' . $ong_id . '"><i class="fas fa-trash-alt text-danger mr-3" data-toggle="att" title="Deletar"></i></i></a>';
    echo '<a href="#?id=' . $ong_id . '"><i class="fas fa-wrench text-success ml-3" data-toggle="att" title="Atualizar"></i></i></a> </td>';
    echo '</td>';
    echo '</tr>';
}
