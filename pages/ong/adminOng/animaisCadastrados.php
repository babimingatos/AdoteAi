<?php
session_start();
include '../../conexao.php';

$id_ong = $_SESSION['idLoginOngAdot'];

$sql = "SELECT * FROM tbl_animal WHERE tbl_ong_ong_id = $id_ong ";
$query = $pdo->prepare($sql);

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $aniId = $row['ani_id'];
    $ani_nome = $row['ani_nome'];
    $especie_nome = $row['especie_nome'];
    $ani_cor = $row['ani_cor'];
    $ani_porte->bindParam['ani_porte'];
    $ani_raca = $row['ani_raca'];
    $ani_castrado = $row['ani_castrado'];
    $ani_vacinado = $row['ani_vacinado'];
    $ani_idade = $row['ani_idade'];
    $ani_descricao = $row['ani_descricao'];
    $tbl_genani_gen_nome = $row['tbl_genani_gen_nome'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="../assets/imgs/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/main.css">
    <title>AdoteAí</title>
</head>

<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    } ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">AdoteAí</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <div class="collapse navbar-collapse" id="navbarScroll">
                <div>
                    <a href="cadastrarAnimal.php">
                        <button class="btn btn-info" style="margin-left: 24cm;" type="submit"><i class="bi bi-plus-circle"></i> Novo pet
                        </button></i>
                    </a>
                </div>
            </div> -->
        </div>
    </nav>
    <br><br>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('../assets/imgs/dogs.jpg');">
            <section class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <br>
                        <div class="card border-2 shadow">
                            <div class="card-body ">
                                <table class="table">
                                    <thead>
                                        <tr><?php

                                            echo '<thead>';
                                            echo '<tr>';
                                            echo '<th>ID</th>';
                                            echo '<th>Nome</th>';
                                            echo '<th>Cor</th>';
                                            echo '<th>Porte</th>';
                                            echo '<th>Raça</th>';
                                            echo '<th>Imagem</th>';
                                            echo '<th>Ações</th>';
                                            echo '</tr>';
                                            echo '</thead>'; ?>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $sth = $pdo->prepare("SELECT * FROM tbl_animal WHERE tbl_ong_ong_id = $id_ong");
                                        $sth->execute();


                                        foreach ($sth as $res) {
                                            extract($res);

                                            echo '<tr>';
                                            echo '<td> ' . $ani_id . ' </td>';
                                            echo '<td> ' . $ani_nome . ' </td>';
                                            echo '<td> ' . $ani_cor . ' </td>';
                                            echo '<td> ' . $ani_porte . ' </td>';
                                            echo '<td> ' . $ani_raca . ' </td>';
                                            echo '<td><img class="" width="40" height="40" src="../../../assets/imgs/imgAnimal/' . $ani_img . '" alt="Animal"></td>';
                                            echo '<td><a href="crud_animais/edit.php?id='.$ani_id.'"></i> EDITAR </a> ';
                                            echo '<a href="crud_animais/delete.php?id=' . $ani_id . '"></i>DELETAR </a> </td>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="col-lg-6" style="width: 10rem; ">
                                    <div class="container-login100-form-btn m-t-17">
                                        <a href="../../homeOng.php" class="login100-form-btn">Voltar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>