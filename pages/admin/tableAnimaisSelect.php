<?php
include "../conexao.php";

$sth = $pdo->prepare("SELECT a.*,o.ong_nome,o.ong_id,e.especie_id,e.especie_nome,g.gen_id,g.gen_nome FROM tbl_animal AS a
                        INNER JOIN tbl_ong AS o
                        INNER JOIN tbl_genani AS g
                        INNER JOIN tbl_especie AS e 
                        WHERE o.ong_id = a.tbl_ong_ong_id 
                        AND g.gen_id = a.tbl_genani_gen_id 
                        AND e.especie_id = a.tbl_especie_especie_id;");

$sth->execute();

echo '<p>Existem: ' . $sth->rowCount() . ' registros</p>';
echo '<table id="example" class="table table-striped table-bordered" style="width:100%">';
echo '<thead>';
echo '<tr>';
echo '<th>Nome ONG</th>';
echo '<th>Nome</th>';
echo '<th>Especie</th>';
echo '<th>Cor</th>';
echo '<th>Porte</th>';
echo '<th>Gênero</th>';
echo '<th>Castrado</th>';
echo '<th>Descrição</th>';
echo '<th>Ações</th>';
echo '</tr>';
echo '</thead>';

foreach ($sth as $res) {

    extract($res);

    echo '<tr>';
    echo '<td> ' . $ong_nome . ' </td>';
    echo '<td> ' . $ani_nome . ' </td>';
    echo '<td> ' . $especie_nome . ' </td>';
    echo '<td> ' . $ani_cor . ' </td>';
    echo '<td> ' . $ani_porte . ' </td>';
    echo '<td> ' . $gen_nome . ' </td>';
    if ($ani_castrado == 1) {
        $ani_castrado = "Sim";
        echo '<td> ' . $ani_castrado . ' </td>';
    }else{
        $ani_castrado = "Não";
        echo '<td> ' . $ani_castrado . ' </td>';
    }
    
    echo '<td> ' . $ani_descricao . ' </td>';
    echo '<td><a href="#?id=' . $ani_id . '"><i class="fas fa-trash-alt text-danger mr-3" data-toggle="att" title="Deletar"></i></i></a>';
    echo '<a href="#?id=' . $ani_id . '"><i class="fas fa-wrench text-success ml-3" data-toggle="att" title="Atualizar"></i></i></a> </td>';
    echo '</td>';
    echo '</tr>';
}
