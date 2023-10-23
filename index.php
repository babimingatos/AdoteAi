<?php

include 'pages/conexao.php';

//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//Contar o total de animal
$result_animal = $pdo->prepare('SELECT COUNT(*) as total FROM tbl_animal');
if ($result_animal->execute()) {
    if ($rs = $result_animal->fetch(PDO::FETCH_OBJ)) {
        $total_animal = $rs->total;
    }
}

//Seta a quantidade de animal por pagina
$quantidade_pg = 4;

//calcular o número de pagina necessárias para apresentar os animais
$num_pagina = ceil($total_animal / $quantidade_pg);

//Calcular o inicio da visualizacao
$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;

//::::::::::::::::::::::::::::ONG
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina
$paginaONG = (isset($_GET['paginaONG'])) ? $_GET['paginaONG'] : 1;

//Contar o total de animal
$result_ong = $pdo->prepare('SELECT COUNT(*) as totalONG FROM tbl_ong');
if ($result_ong->execute()) {
    if ($rs = $result_ong->fetch(PDO::FETCH_OBJ)) {
        $total_ong = $rs->totalONG;
    }
}

//Seta a quantidade de animal por pagina
$quantidade_pgONG = 4;

//calcular o número de pagina necessárias para apresentar os animais
$num_paginaONG = ceil($total_ong / $quantidade_pgONG);

//Calcular o inicio da visualizacao
$inicioONG = ($quantidade_pgONG * $paginaONG) - $quantidade_pgONG;
?>

<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='assets/bootstrap-5/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel='stylesheet' href='assets/css/main.css'>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <!--MEU ESTILO-->

    <title>AdoteAí</title>
</head>

<body class='container-fluid m-0 p-0'>

    <?php
    include 'pages/header/header.php';
    ?>
    <br><br>
    <!-- CAROUSEL - COMEÇO  -->

    <div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel'>
        <div class='carousel-inner'>
            <div class='carousel-item active'>
                <img src='assets/imgs/dog1.png' class='d-block w-100' alt='...'>
            </div>
            <div class='carousel-item'>
                <img src='assets/imgs/dog2.png' class='d-block w-100' alt='...'>
            </div>
            <div class='carousel-item'>
                <img src='assets/imgs/dog3.png' class='d-block w-100' alt='...'>
            </div>
        </div>
        <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>
            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
            <span class='visually-hidden'>Previous</span>
        </button>
        <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>
            <span class='carousel-control-next-icon' aria-hidden='true'></span>
            <span class='visually-hidden'>Next</span>
        </button>
    </div>

    <!-- CAROUSEL - FIM  -->

    <br><br>

    <!-- TEXTO SOBRE - COMEÇO -->
    <article id='sobre' class='mb-5 container'>
        <div class='mt-4 p-5  rounded'>
            <h1>AdoteAí</h1>
            <br><br>
            <p>
                Fundado em fevereiro de 2021 durante um trabalho do curso técnico,
                AdoteAÍ atua principalmente como uma ponte entre as ONG e a pessoa
                que gostaria de adotar um animal.
                O site surgiu para ajudar as ONG a encontrar a pessoa certa para o
                animalzinho que já foi muito maltratado e agora está a procura de um
                lar com muito amor e carinho.
            </p>
            <br><br>
            <h1>3 MOTIVOS PARA ADOTAR</h1>
            <br><br>
        </div>

        <div class='row mb-3 d-flex justify-content-center'>
            <div class='card ml-1 ' style='width: 18rem;'>
                <img src='assets/imgs/adocao1.jpg' class='card-img-top' alt='...'>
                <div class='card-body '>
                    <h5 class='card-title'> Você terá um companheiro para todas as horas.</h5>
                    <p class='card-text'>
                        Ter um bichinho é ter um grande amigo para te acompanhar em todas as aventuras -
                        e nos momentos tristes também.
                    </p>

                </div>
            </div>

            &nbsp;

            <div class='card ml-1' style='width: 18rem;'>
                <img src='assets/imgs/adocao2.jpg' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <br>
                    <h5 class='card-title'>Animais estimulam a sociabilidade.</h5>
                    <p class='card-text'>

                        Se você é declaradamente antissocial, um pet pode te ajudar a resolver uma parte desse problema,
                        principalmente os cães, fazem com que você se torne mais ativo, saia mais de casa e conviva mais
                        com outras pessoas.
                    </p>

                </div>
            </div>

            &nbsp;

            <div class='card ml-1' style='width: 18rem;'>
                <img src='assets/imgs/adocao3.jpg' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>Adoção salva a vida de um animal.</h5>
                    <p class='card-text'>
                        A adoção é capaz de salvar a vida de um bichinho que poderia estar nas ruas, abandonado,
                        morrendo de fome e possivelmente sofrendo de maus tratos.
                    </p>

                </div>
            </div>
        </div>

        <br><br><br>

        <div class='mt-4 p-5 bg-secondary text-white rounded text-center'>
            <h4>"Quando o homem aprender a respeitar até o menor ser da criação, seja animal ou vegetal,
                ninguém precisará ensiná-lo a amar seu semelhante."
                <br>
                Albert Schweitzer ( Nobel da Paz de 1952 )
            </h4>
        </div>

    </article>

    <!-- TEXTO SOBRE - COMEÇO -->

    <br><br><br><br>

    <!--PARALAX -  COMEÇO-->
    <div class='parallax mb-5'>

    </div>
    <!--PARALAX -  FIM-->

    <br><br><br><br>

    <!--MENU DAS ONG - COMEÇO-->
    <section class='container mb-5' id='pagina_ong'>
        <h1 class='text-center mb-5'>
            ONG'S CADASTRADAS NO SITE
        </h1>

        <br><br>

        <br>

        <!--PULAR PAGINA - COMEÇO-->
        <?php
        //Verificar a pagina anterior e posterior
        $pagina_anteriorONG = $paginaONG - 1;
        $pagina_posteriorONG = $paginaONG + 1;
        ?>

        <!--SETA DIREITA-->
        <?php
        if ($pagina_anteriorONG != 0) { ?>
            <a class="btn btn-info mb-3 mr-1" href="index.php?paginaONG=<?php echo $pagina_anteriorONG; ?>#pagina_ong" role="button" data-slide="prev">
                <i class="fas fa-arrow-left"></i>
            </a>
        <?php }  ?>

        <?php
        //exibe o numero da paginas
        for ($i = 1; $i < $num_paginaONG + 1; $i++) { ?>
            <button class="btn btn-info mb-3 mr-1"><a class="link-dark" href="index.php?paginaONG=<?php echo $i; ?>#pagina_ong"><?php echo $i; ?></a></button>
        <?php } ?>

        <!--SETA DIREITA-->
        <?php
        if ($pagina_posteriorONG <= $num_paginaONG) { ?>
            <a class="btn btn-info mb-3 " href="index.php?paginaONG=<?php echo $pagina_posteriorONG; ?>#pagina_ong" role="button" data-slide="next">
                <i class="fas fa-arrow-right"></i>
            </a>
        <?php } else { ?>
        <?php }  ?>
        <!--PULAR PAGINA - FIM-->

        <div class="col-12">
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                <!-- carrosel inteiro -->
                <div class="carousel-inner">
                    <!-- carrosel 4 imagens -->
                    <div class="carousel-item active">

                        <div class="row mb-3 d-flex justify-content-center">

                            <?php
                            //Selecionar os cursos a serem apresentado na página
                            $result_ong = $pdo->prepare("SELECT * FROM tbl_ong limit $inicioONG, $quantidade_pgONG");
                            if ($result_ong->execute()) {
                                while ($rows_ong = $result_ong->fetch(PDO::FETCH_OBJ)) {
                            ?>
                                    <!-- <div class="row mb-3 d-flex justify-content-center"> -->
                                    <div class="col-lg-2 col-md-6 col-12 mb-3" style="display: flex; justify-content: center;">
                                        <div class="card bg-transparent border-0" style="width: 15rem;">
                                            <a href="pages/ong/pagOng1.php?id=<?php echo $rows_ong->ong_id; ?>" class="text-decoration-none link-dark">
                                                <img src="assets/imgs/imgOng/<?php echo $rows_ong->ong_img; ?>" class="rounded-circle card-img-top" alt="ONG's">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    <!-- <div class="col-lg-3 col-md-6 mb-3 col-sm-12">
                                <div class="card">

                                <div class="card-body">
                                <a href="pages/ong/pagOng1.php?id=<?php //echo $rows_ong->ong_id; 
                                                                    ?>"
                                    class="text-decoration-none link-dark">
                                    <img class="rounded-circle" width=100%; height=150px;
                                        src="assets/imgs/imgOng/<?php // echo $rows_ong->ong_img; 
                                                                ?>" alt="ONG's">
                                    <h4 class="card-title text-center"><?php // echo $rows_ong->ong_nome; 
                                                                        ?></h4>
                                </a>
                                </div>
                                </div>
                            </div> -->
                            <?php }
                            } ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- <div class="row mb-3 d-flex justify-content-center">
            <div class="col-lg-2 col-md-6 col-12 mb-3' style='display: flex;
justify-content: center;
">
                <div class="card bg-transparent border-0' style='width: 14rem;
">
                    <a href="pages/pagOng1.php'><img src='assets/imgs/ong1.png' class='rounded-circle card-img-top' alt='..."></a>
                </div>
            </div>
        </div> -->





        <!-- 
        <div class="row mb-3 d-flex justify-content-center">
            <div class="col-lg-2 col-md-6 col-12 mb-3' style='display: flex;
justify-content: center;
">
                <div class="card bg-transparent border-0' style='width: 14rem;
">
                    <a href="pages/pagOng1.php'><img src='assets/imgs/ong1.png' class='rounded-circle card-img-top' alt='..."></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12 mb-3' style='display: flex;
justify-content: center;
">
                <div class="card bg-transparent border-0' style='width: 14rem;
">
                    <a href="pages/pagOng2.php'><img src='assets/imgs/ong2.png' class='rounded-circle card-img-top' alt='..."></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12 mb-3' style='display: flex;
justify-content: center;
">
                <div class="card bg-transparent border-0' style='width: 14rem;
">
                    <a href="pages/pagOng3.php'><img src='assets/imgs/ong3.png' class='rounded-circle card-img-top' alt='..."></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12 mb-3' style='display: flex;
justify-content: center;
">
                <div class="card bg-transparent border-0' style='width: 14rem;
">
                    <a href="pages/pagOng4.php'><img src='assets/imgs/ong4.png' class='rounded-circle card-img-top' alt='..."></a>
                </div>
            </div>
        </div>

        <br><br>

        <div class="row mb-5 d-flex justify-content-center">
            <div class="col-lg-2 col-md-6 col-12 mb-3' style='display: flex;
justify-content: center;
">
                <div class="card bg-transparent border-0' style='width: 14rem;
">
                    <a href="pages/pagOng5.php'><img src='assets/imgs/ong5.png' class='rounded-circle card-img-top' alt='..."></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12 mb-3' style='display: flex;
justify-content: center;
">
                <div class="card bg-transparent border-0' style='width: 14rem;
">
                    <a href="pages/pagOng6.php'><img src='assets/imgs/ong6.png' class='rounded-circle card-img-top' alt='..."></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12 mb-3' style='display: flex;
justify-content: center;
">
                <div class="card bg-transparent border-0' style='width: 14rem;
">
                    <a href="pages/pagOng7.php'><img src='assets/imgs/ong7.png' class='rounded-circle card-img-top' alt='..."></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12 mb-3' style='display: flex;
justify-content: center;
">
                <div class="card bg-transparent border-0' style='width: 14rem;
">
                    <a href="pages/pagOng8.php'><img src='assets/imgs/ong8.png' class='rounded-circle card-img-top' alt='..."></a>
                </div>
            </div>
        </div> -->
    </section>
    <!--MENU DAS ONG - FIM-->


    <br>

    <!--PARALAX -  COMEÇO-->
    <div class="parallax mb-5">

    </div>
    <!--PARALAX -  FIM-->




    <!--CAROUSEL ANIMAIS - COMEÇO-->
    <section id="pagina_animal" class="container mb-5">
        <div class="text-center mt-4 p-5 rounded">
            <h1>Adote seu animalzinho!</h1>
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
                            <a class="btn btn-info mb-3 mr-1" href="index.php?pagina=<?php echo $pagina_anterior; ?>#pagina_animal" role='button' data-slide="prev">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        <?php }  ?>

                        <?php
                        //exibe o numero da paginas
                        for ($i = 1; $i < $num_pagina + 1; $i++) { ?>
                            <button class="btn btn-info mb-3 mr-1"><a class='link-dark' href="index.php?pagina=<?php echo $i; ?>#pagina_animal"><?php echo $i; ?></a></button>
                        <?php } ?>

                        <!--SETA DIREITA-->
                        <?php
                        if ($pagina_posterior <= $num_pagina) { ?>
                            <a class="btn btn-info mb-3" href="index.php?pagina=<?php echo $pagina_posterior; ?>#pagina_animal" role='button' data-slide="next">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        <?php } else { ?>
                        <?php }  ?>
                        <!--PULAR PAGINA - FIM-->
                    </div>





                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class='carousel slide' data-ride="carousel">

                            <!-- carrosel inteiro -->
                            <div class="carousel-inner">
                                <!-- carrosel 4 imagens -->
                                <div class="carousel-item active">

                                    <div class="row">

                                        <?php
                                        //Selecionar os cursos a serem apresentado na página
                                        $result_animal = $pdo->prepare("SELECT * FROM tbl_animal limit $inicio, $quantidade_pg");
                                        if ($result_animal->execute()) {
                                            while ($rows_animal = $result_animal->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <div class="card">
                                                        <img class="" width=100%; height=150px; src="assets/imgs/imgAnimal/<?php echo $rows_animal->ani_img; ?>" alt="Animal">
                                                        <div class="card-body">
                                                            <a href="pages/animal/pagAnimal.php?id=<?php echo $rows_animal->ani_id; ?>" class="text-decoration-none link-dark">
                                                                <h4 class="card-title text-center">
                                                                    <?php echo $rows_animal->ani_nome; ?></h4>
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
    <!--CAROUSEL ANIMAIS - FIM-->





    <!--CONTATO - COMEÇO -->
    <form action="phpmailer.php" method="POST">
        <section id="contato" class="mb-5 bg-dark text-light">
            <h1 class="text-center mb-5">
                <br><br>
                Contato
            </h1>

            <br><br>


            <div class="container ">
                <div class="row s6 d-flex justify-content-center">
                    <div class="col-lg-4">
                        <label for="exampleFormControlInput1" class="form-label">Nome:</label>
                        <input type="text" name="cnome" class="form-control" placeholder="João" aria-label="First name">
                    </div>

                    <div class="col-lg-4">
                        <label for="exampleFormControlInput1" class="form-label">Sobrenome:</label>
                        <input type="text" name="csobrenome" class="form-control" placeholder="Silva" aria-label="Last name">
                    </div>

                    <div class="col-lg-8">
                        <br>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email:</label>
                            <input type="email" name="cemail" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <label for="exampleFormControlInput1" class="form-label">Assunto: </label>
                        <input type="text" name="cassunto" class="form-control" placeholder="Doação" aria-label="Last name">
                    </div>
                    <div class="col-lg-8">
                        <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                        <textarea class="form-control" name="cdescricao" id="exampleFormControlTextarea1" rows="3" placeholder="Escreva sua mensagem ..."></textarea>
                    </div>

                    <div class="col-lg-12 text-center">
                        <br><br>
                        <button type="buton" type="submit" class="btn btn-info">Enviar</button>
                        <button type="button" type="submit" class="btn btn-info">Limpar</button>

                        <br><br><br>
                    </div>
                </div>
            </div>
        </section>
        <!--CONTATO - FIM-->
    </form>




    <?php
    include 'pages/footer/footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="assets/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <script>
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>

</body>

</html>