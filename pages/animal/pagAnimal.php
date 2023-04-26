<?php
session_start();
ob_start();
include_once '../conexao.php';

$ani_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// SELECT * FROM tbl_animal INNER JOIN tbl_ong INNER JOIN tbl_genani INNER JOIN tbl_especie WHERE ani_id= $ani_id 
$query_usuario = "SELECT a.*,o.ong_id,o.ong_nome,o.ong_id,e.especie_id,e.especie_nome,g.gen_id,g.gen_nome FROM tbl_animal AS a
INNER JOIN tbl_ong AS o
INNER JOIN tbl_genani AS g
INNER JOIN tbl_especie AS e 
WHERE o.ong_id = a.tbl_ong_ong_id 
AND g.gen_id = a.tbl_genani_gen_id 
AND e.especie_id = a.tbl_especie_especie_id AND ani_id= $ani_id;";
// $quer = "SELECT * FROM tbl_ong";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <title>AdoteAí</title>
</head>

<body>

    <?php
    include '../header/header.php';
    ?>
    <br>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $query_up_usuario = "SELECT tbl_animal SET animal_nome=:ani_nome WHERE ani_id=:ani_id";
    $o_usuario = $pdo->prepare($query_up_usuario);
    $o_usuario->bindParam(':ani_nome', $dados['ani_nome'], PDO::PARAM_STR);







    ?>
    <br><br><br>
    <div class="card">
        <div class="card-body ">
            <div class="row">

                <section class="container ">
                    <div class="row ">

                        <div style="margin-top:3cm" class="col-lg-5 col-md-6">
                            <img style="width: 100%;float:right;margin-top:-100px;" src="../../assets/imgs/imgAnimal/<?php echo $row_usuario['ani_img']; ?>">
                        </div>

                        <div class="col2-lg-4 col-md-6" style="margin-left: 2cm;">
                            <br>

                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="fs-1 fw-bolder">
                                        <?php
                                        if (isset($dados['ani_nome'])) {
                                            echo $dados['ani_nome'];
                                        } elseif (isset($row_usuario['ani_nome'])) {
                                            echo $row_usuario['ani_nome'];
                                        }
                                        ?>
                                    </p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center ">
                                    Porte: <?php
                                            if (isset($dados['ani_porte'])) {
                                                echo $dados['ani_porte'];
                                            } elseif (isset($row_usuario['ani_porte'])) {
                                                echo $row_usuario['ani_porte'];
                                            }
                                            ?>

                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Cor: <?php
                                            if (isset($dados['ani_cor'])) {
                                                echo $dados['ani_cor'];
                                            } elseif (isset($row_usuario['ani_cor'])) {
                                                echo $row_usuario['ani_cor'];
                                            }
                                            ?>

                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Vacinas: <?php
                                                if (isset($dados['ani_vacinado'])) {
                                                    echo $dados['ani_vacinado'];
                                                } elseif (isset($row_usuario['ani_vacinado'])) {
                                                    echo $row_usuario['ani_vacinado'];
                                                }
                                                ?>

                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">



                                    ONG: <?php
                                            if (isset($dados['ong_nome'])) {
                                                echo $dados['ong_nome'];
                                            } elseif (isset($row_usuario['ong_nome'])) {
                                                echo $row_usuario['ong_nome'];
                                            }
                                            ?>



                                </li>
          
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Carteira de vacinação
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Carteira de vacinação</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <img class="" width=100%; src="../../assets/imgs/imgVacina/<?php echo $row_usuario['ani_vacina'];?>" alt="Animal">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </li>
                            </ul>
                            <br>
                            <a href="../../chat/index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Adotar</a>
                        </div>

                        <!-- </p> -->
                    </div>
                </section>
            </div>
        </div>
    </div>

    <br>

    <section id="pagina_animal" class="container mb-5">
        <div class="text-center mt-4 p-5 rounded">
            <h1>Seus animais da mesma ONG!</h1>
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
                                        $ani_id = $row_usuario['ani_id'];
                                        $ong_id = $row_usuario['ong_id'];
                                        //Selecionar os cursos a serem apresentado na página
                                        $result_animal = $pdo->prepare("SELECT * FROM tbl_animal WHERE tbl_ong_ong_id = $ong_id AND ani_id <> $ani_id limit $inicio, $quantidade_pg");
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>

</body>

</html>