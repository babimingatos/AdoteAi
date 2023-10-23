<?php

include 'conexao.php';
session_start();

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
    <link rel="stylesheet" href="../assets/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--MEU ESTILO-->



    <title>AdoteAí</title>
</head>

<body class="container-fluid m-0 p-0">

    <?php
    include 'header/headerHome.php';
    ?>
    <br><br>

    <!--CAROUSEL ANIMAIS - COMEÇO-->
    <section id="pagina_animal" class="container mb-5">
        <div class="text-center mt-4 p-5 rounded">
            <h1>Seus animais cadastrados!</h1>
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
                            if($pagina_anterior != 0){ ?>
                                <a class="btn btn-info mb-3 mr-1" href="../index.php?pagina=<?php echo $pagina_anterior; ?>#pagina_animal" role="button" data-slide="prev">
                                <i class="fas fa-arrow-left"></i>
                                </a>
                        <?php }  ?>

                        <?php 
					        //exibe o numero da paginas
					    for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						    <button class="btn btn-info mb-3 mr-1"><a class="link-dark"href="../index.php?pagina=<?php echo $i; ?>#pagina_animal"><?php echo $i; ?></a></button>
					    <?php } ?>

                        <!--SETA DIREITA-->
                        <?php                        
						if($pagina_posterior <= $num_pagina){ ?>
                            <a class="btn btn-info mb-3 " href="../index.php?pagina=<?php echo $pagina_posterior; ?>#pagina_animal" role="button" data-slide="next">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <?php }else{ ?>							
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
                                        $id_ong = $_SESSION['idLoginOngAdot'];
                                        $result_animal = $pdo->prepare("SELECT * FROM tbl_animal WHERE tbl_ong_ong_id = $id_ong limit $inicio, $quantidade_pg");
                                        if ($result_animal->execute()) {
                                            while ($rows_animal = $result_animal->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <div class="card">
                                                    <img class="" width= 100%; height= 150px; src="../assets/imgs/imgAnimal/<?php echo $rows_animal->ani_img; ?>" alt="Animal">
                                                        <div class="card-body">
                                                            <a href="animal/pagAnimal.php?id=<?php echo $rows_animal->ani_id; ?>" class="text-decoration-none link-dark">
                                                                <h4 class="card-title text-center"><?php echo $rows_animal->ani_nome; ?></h4>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                        <?php } } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--CAROUSEL ANIMAIS - FIM-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="../assets/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <script>
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>

</body>

</html>