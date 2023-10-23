<?php
session_start();
?>


<?php
/*
if ($_POST) {
    include "conexao.php";
    try {
        $sth = $pdo->prepare("INSERT INTO tbl_adotador (adot_nome, adot_cpf, adot_rg, adot_telefone, adot_logradouro, adot_numero, adot_cep, adot_cidade, adot_estado, adot_bairro,
        adot_complemento, adot_email, adot_senha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?); ");
        $sth->bindParam(1, $_POST['Anome']);
        $sth->bindParam(2, $_POST['Acpf']);
        $sth->bindParam(3, $_POST['Atelefone']);
        $sth->bindParam(4, $_POST['Aendereco']);
        $sth->bindParam(5, $_POST['Anumero']);
        $sth->bindParam(6, $_POST['Acep']);
        $sth->bindParam(7, $_POST['Acidade']);
        $sth->bindParam(8, $_POST['Auf']);
        $sth->bindParam(9, $_POST['Abairro']);
        $sth->bindParam(10, $_POST['Acomplemento']);
        $sth->bindParam(11, $_POST['Aemail']);
        $sth->bindParam(12, $_POST['Asenha']);
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
} 
*/
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5/css/bootstrap.min.css">
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
    <title>AdoteAí</title>
</head>

<body>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    ?>

    <div class="limiter">

        <div class="container-login100" style="background-image: url('../../assets/imgs/dogs.jpg');">

            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="insereAdotador.php">
                    <span class="login100-form-title p-b-53">
                        Faça seu cadastro para adotar!
                    </span>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-t-31 p-b-9">
                                <span class="txt1">
                                    Nome
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o nome">
                                <input class="input100" type="text" name="Anome">
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
                                <input class="input100 cpf" type="text" name="Acpf">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    RG
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o CPF">
                                <input class="input100 rg" type="text" name="Arg">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <!-- <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Celular
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Celular">
                                <input class="input100" type="number" name="Acelular">
                                <span class="focus-input100"></span>
                            </div>
                        </div> -->

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    DDD
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Telefone">
                                <input class="input100 ddd" type="number" name="AddAdot">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Telefone
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Telefone">
                                <input class="input100 tphone_with_ddd" type="text" name="Atelefone">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Endereço
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Logradouro">
                                <input class="input100" type="text" name="Alogradouro">
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
                                <input class="input100 numero" type="text" name="Anumero">
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
                                <input class="input100 cep" type="text" name="Acep">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Cidade
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a Cidade">
                                <input class="input100" type="text" name="Acidade">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    UF
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a UF">
                                <input class="input100" type="text" name="Auf">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Bairro
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Bairro">
                                <input class="input100" type="text" name="Abairro">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Complemento
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Complemeto">
                                <input class="input100" type="text" name="Acomplemento">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    E-mail
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Email">
                                <input class="input100" type="email" name="Aemail">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Senha
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a senha">
                                <input class="input100" type="password" name="Asenha">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <!-- <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Confirme sua senha
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a senha">
                                <input class="input100" type="password" name="Asenha">
                                <span class="focus-input100"></span>
                            </div>
                        </div> -->


                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <!-- <button class="login100-form-btn" type="submit">
                                    Cadastrar
                                </button> -->
                                <input name="cadastrarAdotador" class="login100-form-btn" type="submit" value="Cadastrar">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <a href="../pages/escolhaCadastro.php" class="login100-form-btn">Voltar</a>
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
    <script src="../../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../../assets/vendor/animsition/js/animsition.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/popper.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/select2/select2.min.js"></script>
    <script src="../../assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="../../assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="../../assets/vendor/countdowntime/countdowntime.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/mask/dist/jquery.mask.min.js"></script>

    <script>
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>
    <script>
        $(document).ready(function() {
            $('.cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('.rg').mask('00.000.000-0', {
                reverse: true
            });
            $('.phone_with_ddd').mask('00000-0000');
            $('.tphone_with_ddd').mask('00000-0000');
            $('.cep').mask('00000-000');
            $('.ddd').mask('00');
            $('.numero').mask('0000');
            

        });
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>
    <script>
        function validarSenha() {
            Asenha = document.f1.Asenha.value
            AConfirmsenha = document.f1.AConfirmsenha.value

            if (Asenha == AConfirmsenha)
                alert("SENHAS IGUAIS")
            else
                alert("SENHAS DIFERENTES")
        }
    </script>
</body>

</html>