<?php
session_start();
ob_start();
include_once '../conexao.php';

$ong_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


// $query_usuario = "SELECT * FROM tbl_ong WHERE ong_id = $ong_id LIMIT 1";
// $query_usuario = "SELECT tbl_ong.ong_nome, tbl_ong.ong_email,tbl_enderecoong.endOng_cidade FROM tbl_ong, tbl_enderecoong WHERE tbl_ong.ong_id = tbl_ong.ong_id limit 1";

// $query_usuario = "SELECT o.ong_nome, o.ong_email,e.endOng_cidade FROM tbl_ong o, tbl_enderecoong e WHERE o.ong_id = $ong_id LIMIT 1";
$query_usuario = "SELECT * FROM tbl_ong INNER JOIN tbl_enderecoong WHERE ong_id = $ong_id AND tbl_ong_ong_id = $ong_id";
// 
// SELECT o.*,t.telOng_dd,t.telOng_numero FROM tbl_ong AS o 
// INNER JOIN tbl_telefoneong AS t WHERE tbl_ong_ong_id = $ong_id


$result_usuario = $pdo->prepare($query_usuario);
$result_usuario->execute();

if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
}


//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//Contar o total de animal
$result_animal = $pdo->prepare("SELECT COUNT(*) as total FROM tbl_animal");
if ($result_animal->execute()) {
    if ($rs = $result_animal->fetch(PDO::FETCH_OBJ)) {
        $total_animal = $rs->total;
    }
}

//Seta a quantidade de animal por pagina
$quantidade_pg = 20;

//calcular o número de pagina necessárias para apresentar os animais
$num_pagina = ceil($total_animal / $quantidade_pg);

//Calcular o inicio da visualizacao
$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../assets/bootstrap-5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <title>AdoteAí</title>
</head>

<body>

    <?php
    include '../header/header.php';
    ?>
    <br>

    <br><br><br>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $query_up_usuario = "SELECT tbl_ong SET ong_nome=:ong_nome WHERE ong_id=:ong_id";
    $o_usuario = $pdo->prepare($query_up_usuario);
    $o_usuario->bindParam(':ong_nome', $dados['ong_nome'], PDO::PARAM_STR);







    ?>
    <!-- <div class="card">
        <div class="card-body ">
            <div class="row">

                <section class="container">
                    <div class="row"> -->


    <div class="card">
        <div class="card-body ">
            <div class="row">

                <section class="container ">
                    <div class="row ">

                        <!-- <div class="col-lg-12"> -->


                        <div style="margin-top:3cm" class="col-lg-4 col-md-6">
                            <p><img style="width: 100%;float:right;margin-top:-100px;" src="../../assets/imgs/imgOng/<?php echo $row_usuario['ong_img']; ?>"></p>
                        </div>

                        <div class="col2-lg-8 col-md-6" style="margin-left: 2cm;margin-top:3cm">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="fs-1 fw-bolder">
                                        <?php
                                        if (isset($dados['ong_nome'])) {
                                            echo $dados['ong_nome'];
                                        } elseif (isset($row_usuario['ong_nome'])) {
                                            echo $row_usuario['ong_nome'];
                                        }
                                        ?>
                                    </p>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Email: <?php
                                            if (isset($dados['ong_email'])) {
                                                echo $dados['ong_email'];
                                            } elseif (isset($row_usuario['ong_email'])) {
                                                echo $row_usuario['ong_email'];
                                            }
                                            ?>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Cidade: <?php
                                            if (isset($dados['endOng_cidade'])) {
                                                echo $dados['endOng_cidade'];
                                            } elseif (isset($row_usuario['endOng_cidade'])) {
                                                echo $row_usuario['endOng_cidade'];
                                            }
                                            ?>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Endereço: <?php
                                                if (isset($dados['endOng_logradouro'])) {
                                                    echo $dados['endOng_logradouro'];
                                                } elseif (isset($row_usuario['endOng_logradouro'])) {
                                                    echo $row_usuario['endOng_logradouro'];
                                                }
                                                ?>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Número: <?php
                                            if (isset($dados['endOng_numero'])) {
                                                echo $dados['endOng_numero'];
                                            } elseif (isset($row_usuario['endOng_numero'])) {
                                                echo $row_usuario['endOng_numero'];
                                            }
                                            ?>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Bairro: <?php
                                            if (isset($dados['endOng_bairro'])) {
                                                echo $dados['endOng_bairro'];
                                            } elseif (isset($row_usuario['endOng_bairro'])) {
                                                echo $row_usuario['endOng_bairro'];
                                            }
                                            ?>
                                </li>

                            </ul>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <br>

    <section id="pagina_animal" class="container mb-5">
        <div class="text-center mt-4 p-5 rounded">
            <h1>Seus animais da ONG!</h1>
        </div>

        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-3"></h3>
                    </div>
                    <div class="col-6 text-end ">

                        <!--PULAR PAGINA - COMEÇO-->
                        <?php
                        //Verificar a pagina anterior e posterior
                        $pagina_anterior = $pagina - 1;
                        $pagina_posterior = $pagina + 1;
                        ?>

                        <!--SETA DIREITA-->
                        <?php
                        if ($pagina_anterior != 0) { ?>
                            <a class="btn btn-info mb-3 mr-1" href="../index.php?pagina=<?php echo $pagina_anterior; ?>#pagina_animal" role="button" data-slide="prev">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        <?php }  ?>

                        <?php
                        //exibe o numero da paginas
                        for ($i = 1; $i < $num_pagina + 1; $i++) { ?>
                            <button class="btn btn-info mb-3 mr-1"><a class="link-dark" href="../index.php?pagina=<?php echo $i; ?>#pagina_animal"><?php echo $i; ?></a></button>
                        <?php } ?>

                        <!--SETA DIREITA-->
                        <?php
                        if ($pagina_posterior <= $num_pagina) { ?>
                            <a class="btn btn-info mb-3 " href="../index.php?pagina=<?php echo $pagina_posterior; ?>#pagina_animal" role="button" data-slide="next">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        <?php } else { ?>
                        <?php }  ?>
                        <!--PULAR PAGINA - FIM-->
                    </div>





                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                            <!-- carrosel inteiro -->
                            <div class="carousel-inner">
                                <!-- carrosel 4 imagens -->
                                <div class="carousel-item active">

                                    <div class="row">

                                        <?php
                                        //Selecionar os cursos a serem apresentado na página
                                        $result_animal = $pdo->prepare("SELECT * FROM tbl_animal WHERE tbl_ong_ong_id = $ong_id limit $inicio, $quantidade_pg");
                                        if ($result_animal->execute()) {
                                            while ($rows_animal = $result_animal->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <div class="card">
                                                        <img class="" width=100%; height=150px; src="../../assets/imgs/imgAnimal/<?php echo $rows_animal->ani_img; ?>" alt="Animal">
                                                        <div class="card-body">
                                                            <a href="animal/pagAnimal.php?id=<?php echo $rows_animal->ani_id; ?>" class="text-decoration-none link-dark">
                                                                <h4 class="card-title text-center"><?php echo $rows_animal->ani_nome; ?></h4>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                        <?php }
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <br>
    <?php
    include '../footer/footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="../../assets/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script>
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>

</body>

</html>