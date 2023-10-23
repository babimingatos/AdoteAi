<?php
    include "../../conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="../../../assets/imgs/icons/favicon.ico" />
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

<body class="container-fluid p-0 m-0">
    <?php
    // include '../../header/headerHome.php';
    ?>
    <br> </br>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../../../assets/imgs/dogs.jpg');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="../../animal/insereAnimal.php" enctype="multipart/form-data">
                    <span class="login100-form-title p-b-53">
                        Cadastro do animal
                    </span>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-t-31 p-b-9">
                                <span class="txt1">
                                    Nome
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o nome do animal">
                                <input class="input100" type="text" name="Annome">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Idade
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a cor do animal">
                                <input class="input100" type="text" name="Anidade">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Cor
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a cor do animal">
                                <input class="input100" type="text" name="Ancor">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Raça
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a cor do animal">
                                <input class="input100" type="text" name="Anraca">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <!-- <div class="col-lg-12">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Vacinado?
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a cor do animal">
                                <input class="input100" type="text" name="Anvacinado">
                                <span class="focus-input100"></span>
                            </div>
                        </div> -->

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Porte
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o porte do animal">
                            <select class="txt1 input100" aria-label="Default select example" name="Anporte">
                            <option class="focus-input100" selected>Selecione o porte</option>
                            <option value='Pequeno'> Pequeno </option>
                            <option value='Medio'> Medio </option>
                            <option value='Grande'> Grande </option>
                            </select>
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Gênero
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o sexo do animal">
                            <select class="txt1 input100" aria-label="Default select example" name="Angenero">
                            <option class="focus-input100" selected>Selecione um gênero</option>
                            <?php
                            $sth = $pdo->prepare("SELECT * FROM tbl_genani;");
                            $sth->execute();
                            foreach ($sth as $res) {

                                extract($res);
                            
                                echo '<option value='.$gen_id.'> ' . $gen_nome . ' </option>';
                            }
                            ?>
                            </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Castrado?
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite se o pet é castrado ou não">
                            <select class="txt1 input100" aria-label="Default select example" name="Ancastrado">
                            <option class="focus-input100" selected>Selecione se é castrado</option>
                            <option value='Sim'> Sim </option>
                            <option value='Não'> Não </option>
                            </select>
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Espécie
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Selecione a especie">
                            <select class="txt1 input100" aria-label="Default select example" name="Anespecie">
                            <option class="focus-input100" selected>Selecione uma especie</option>
                            <?php
                            $sth = $pdo->prepare("SELECT * FROM tbl_especie;");
                            $sth->execute();
                            foreach ($sth as $res) {

                                extract($res);
                            
                                echo '<option value='.$especie_id.'> ' . $especie_nome . ' </option>';
                            }
                            ?>
                            </select>
                            <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Descrição
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a cor do animal">
                                <input class="input100" type="text" name="Andescricao">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <span class="txt1">
                                <br>
                                Carteira de Vacinação
                            </span>
                            <div class="container-login100-form-btn m-t-17">

                                <input type="file" name="uploadVacina" />
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <span class="txt1">
                                <br>
                                Imagem do animal
                            </span>
                            <div class="container-login100-form-btn m-t-17">

                                <input type="file" name="upload" />
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <button class="login100-form-btn" type="submit">
                                    Cadastrar
                                </button>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <a href="../../homeOng.php" class="login100-form-btn">Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <a href='https://br.freepik.com/vetores/quadro'>.</a>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="assets/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../assets/vendor/animsition/js/animsition.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/popper.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/select2/select2.min.js"></script>
    <script src="../assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="../assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/vendor/countdowntime/countdowntime.js"></script>
    <script src="../assets/js/main.js"></script>

    <script>
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>

</body>

</html>