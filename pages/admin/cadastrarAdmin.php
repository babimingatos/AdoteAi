<?php
if ($_POST) {
    include "../conexao.php";
    try {
        $sth = $pdo->prepare("INSERT INTO tbl_admin (adm_nome, adm_cpf, adm_rg,adm_logradouro, adm_numero, 
        adm_complemento, adm_bairro,adm_cep, adm_cidade, adm_estado, 
        adm_email, adm_senha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
        $sth->bindParam(1, $_POST['Adnome']);
        $sth->bindParam(2, $_POST['Adcpf']);
        $sth->bindParam(3, $_POST['Adrg']);
        $sth->bindParam(4, $_POST['Adendereco']);
        $sth->bindParam(5, $_POST['Adnumero']);
        $sth->bindParam(6, $_POST['Adcep']);
        $sth->bindParam(7, $_POST['Adcidade']);
        $sth->bindParam(8, $_POST['Aduf']);
        $sth->bindParam(9, $_POST['Adbairro']);
        $sth->bindParam(10, $_POST['Adcomplemento']);
        $sth->bindParam(11, $_POST['Ademail']);
        $sth->bindParam(12, $_POST['Adsenha']);

        if ($sth->execute()) {
            if ($sth->rowCount() > 0) {
                header('location: escolhaCadastro.php');
            } else {
                echo "Erro: Não foi possivel executar a declaração sql";
            }
        } else {
            echo "Erro na execução do cadastro";
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
} ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="icon" type="image/png" href="../../assets/imgs/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
      <link rel="stylesheet" href="../../assets/css/style.css"> 
    <!-- <link rel="stylesheet" href="../../assets/css/styleAdmin.css">  -->
    <title>AdoteAí</title>


    <script>
        function Verifica() {
            val1 = document.getElementById("Adsenha").value;
            val2 = document.getElementById("Addsenha").value;
            if (val1 != val2) {
                document.getElementById("Adsenha").style.borderColor = "#f00";
                document.getElementById("Addsenha").style.borderColor = "#f00";
            } else {
                document.getElementById("Adsenha").style.borderColor = "#000";
                document.getElementById("Addsenha").style.borderColor = "#000";

            }
        }
    </script>
</head>

<body>
    <?php
    include "../header/headerAdmin.php";
    ?>
    <div class="limiter">


        <div class="container-fluid height-100 bg-light" style="padding-left: 195px;">

            <div class="row" style="margin-left:102px">


                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                    <form class="login100-form validate-form flex-sb flex-w" name="f1" method="POST">
                        <span class="login100-form-title p-b-53">
                            Cadastro dos administradores
                        </span>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-t-31 p-b-9">
                                    <span class="txt1">
                                        Nome
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="name is required">
                                    <input class="input100" type="text" name="Adnome">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        CPF
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite o CPF">
                                    <input class="input100 cpf" type="text" name="Adcpf" placeholder="">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        RG
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite o Celular">
                                    <input class="input100 rg" type="text" name="Adrg">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        Logradouro
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite o Logradouro">
                                    <input class="input100" type="text" name="Adendereco">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        Número
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite o Numero">
                                    <input class="input100" type="number" name="Adnumero">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        Complemento
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite o Complemeto">
                                    <input class="input100" type="text" name="Adcomplemento">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        Bairro
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite o Bairro">
                                    <input class="input100" type="text" name="Adbairro">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        CEP
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite o CEP">
                                    <input class="input100 cep" type="text" name="Adcep">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        Cidade
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite a Cidade">
                                    <input class="input100" type="text" name="Adcidade">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        UF
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite a UF">
                                    <input class="input100" type="text" name="Aduf">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        E-mail
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite o Email">
                                    <input class="input100" type="email" name="Ademail">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        Senha
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite a senha">
                                    <input class="input100" type="password" name="Adsenha" onKeyPress="Verifica()">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        Confirme sua senha
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Digite a senha">
                                    <input class="input100" type="password" name="Addsenha" onKeyPress="Verifica()">
                                    <span class="focus-input100"></span>
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
                                    <a href="escolhaCadastro.php" class="login100-form-btn">Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <a href='https://br.freepik.com/vetores/quadro'>.</a>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../assets/vendor/animsition/js/animsition.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/popper.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/select2/select2.min.js"></script>
    <script src="../assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="../assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/vendor/countdowntime/countdowntime.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/mask/dist/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('.rg').mask('00.000.000-0', {
                reverse: true
            });
            $('.phone_with_ddd').mask('(00) 00000-0000');
            $('.tphone_with_ddd').mask('(00) 0000-0000');
            $('.cep').mask('00000-000');
        });
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>

</body>

</html>