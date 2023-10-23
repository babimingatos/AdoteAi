<?php
if ($_POST) {
    include "conexao.php";
    try {
        $st = $conexao->prepare("INSERT INTO tbl_ong (ong_nome, ong_cpf,ong_cnpj,ong_telefone,ong_logradouro,ong_numero,ong_cep,ong_cidade,ong_uf,ong_bairro,ong_email,ong_senha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?); ");
        $st->bindParam(1, $_POST['Onome']);
        $st->bindParam(2, $_POST['Ocpf']);
        $st->bindParam(3, $_POST['Ocnpj']);
        $st->bindParam(4, $_POST['Otelefone']);
        $st->bindParam(5, $_POST['Ologradouro']);
        $st->bindParam(6, $_POST['Onumero']);
        $st->bindParam(7, $_POST['Ocep']);
        $st->bindParam(8, $_POST['Ocidade']);
        $st->bindParam(9, $_POST['Ouf']);
        $st->bindParam(10, $_POST['Obairro']);
        // $st->bindParam(11, $_POST['Ocomplemeto']);
        $st->bindParam(11, $_POST['Oemail']);
        $st->bindParam(12, $_POST['Osenha']);
        if ($st->execute()) {
            if ($st->rowCount() > 0) {
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
    <link rel="stylesheet" href="assets/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="../assets/imgs/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <title>AdoteAí</title>
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../assets/imgs/dogs.jpg');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form class="login100-form validate-form flex-sb flex-w " method="POST">
                    <span class="login100-form-title p-b-53">
                        Faça o cadastro da ONG/Associação
                    </span>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-t-31 p-b-9">
                                <span class="txt1">
                                    Nome
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="name is required">
                                <input class="input100" type="text" name="Onome">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-1">
                            <div class="p-t-13 p-b-9">
                                <div class="" data-validate="CNPJ is required">
                                    <input class="input100 checkbox" type="checkbox" name="ong">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 p-t-30 p-b-9">
                            <span class="txt1">
                                ONG
                            </span>
                        </div>

                        <div class="col-lg-1">
                            <div class="p-t-13 p-b-9">
                                <div class="" data-validate="CNPJ is required">
                                    <input class="input100 checkbox" type="checkbox" name="associacao">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 p-t-30 p-b-9">
                            <span class="txt1">
                                Associação
                            </span>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    CNPJ
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o CNPJ">
                                <input class="input100" type="number" name="Ocnpj">
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
                                <input class="input100" type="number" name="Ocpf">
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
                                <input class="input100" type="number" name="ong_celular">
                                <span class="focus-input100"></span>
                            </div>
                        </div> -->

                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Telefone
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Telefone">
                                <input class="input100" type="number" name="Otelefone">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-10">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Logradouro
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Logradouro">
                                <input class="input100" type="text" name="Ologradouro">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Número
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Numero">
                                <input class="input100" type="number" name="Onumero">
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
                                <input class="input100" type="number" name="Ocep">
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
                                <input class="input100" type="text" name="Ocidade">
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
                                <input class="input100" type="text" name="Ouf">
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
                                <input class="input100" type="text" name="Obairro">
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
                                <input class="input100" type="text" name="Ocomplemento">
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
                                <input class="input100" type="email" name="Oemail">
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
                                <input class="input100" type="password" name="Osenha">
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
                                <input class="input100" type="password" name="Osenha">
                                <span class="focus-input100"></span>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <button class="login100-form-btn">
                                    Cadastrar
                                </button>
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