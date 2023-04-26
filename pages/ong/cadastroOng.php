<?php
session_start();
?>
<!--
if ($_POST) {
    include "conexao.php";
    try {
        $sth = $pdo->prepare("INSERT INTO tbl_ong (ong_nome, ong_cpf,ong_cnpj,ong_telefone,ong_logradouro,ong_numero,ong_cep,ong_cidade,ong_estado,ong_bairro,ong_email,ong_senha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?); ");
        $sth->bindParam(1, $_POST['Onome']);
        $sth->bindParam(2, $_POST['Ocpf']);
        $sth->bindParam(3, $_POST['Ocnpj']);
        $sth->bindParam(4, $_POST['Otelefone']);
        $sth->bindParam(5, $_POST['Ologradouro']);
        $sth->bindParam(6, $_POST['Onumero']);
        $sth->bindParam(7, $_POST['Ocep']);
        $sth->bindParam(8, $_POST['Ocidade']);
        $sth->bindParam(9, $_POST['Ouf']);
        $sth->bindParam(10, $_POST['Obairro']);
        $sth->bindParam(11, $_POST['Ocomplemeto']);
        $sth->bindParam(12, $_POST['Oemail']);
        $sth->bindParam(13, $_POST['Osenha']);
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
-->
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
                <form class="login100-form validate-form flex-sb flex-w " method="post" action="insereOng.php" enctype="multipart/form-data">
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
                                    <input class="input100 checkbox" type="checkbox" id="ok" name="ong" onclick="createInput(this)">
                                </div>
                            </div>
                        </div>
                        <!-- onclick="marcaDesmarca(this)"  -->
                        <div class="col-lg-5 p-t-30 p-b-9">
                            <span class="txt1">
                                ONG
                            </span>

                        </div>

                        <div class="col-lg-1">
                            <div class="p-t-13 p-b-9">
                                <div class="">
                                    <input class="input100 checkbox" type="checkbox" id="nok" name="associacao" onclick="createInput(this)">
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
                            <div class="wrap-input100" >
                                <input class="input100 cnpj" type="text" name="Ocnpj" id="Ocnpj" disabled>
                                <span class="focus-input100"></span>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    CPF
                                </span>
                            </div>
                            <div class="wrap-input100">
                                <input class="input100 cpf" type="text" name="Ocpf" id="Ocpf" disabled>
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
                        </div>  -->
                        <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    DDD
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Telefone">
                                <input class="input100 ddd" type="text" name="Odd">
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
                                <input class="input100 tphone_with_ddd" type="text" name="Otelefone">
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
                                <input class="input100" type="text" name="Ologradouro">
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
                                <input class="input100 numero" type="text" name="Onumero">
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
                                <input class="input100 cep" type="text" name="Ocep">
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




<!-- 

                            <?php
                            // include '../includes/conexao.php';
                            ?>
                            <meta charset="utf-8">
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                            <div style="float:left; width:auto; padding:0 1px">
                                <select name="Ouf" id="Ouf">
                                    <option value="">Estados...</option>
                                    <?php
                                    // $sql = $pdo->prepare("SELECT * FROM estados ORDER BY nome_estado ASC");
                                    // $sql->execute();
                                    // $fetchAll = $sql->fetchAll();
                                    // foreach ($fetchAll as $estados) {
                                    //     echo '<option value="' . $estados['cod_estado'] . '">' . $estados['nome_estado'] . '</option>';
                                    // }
                                    ?>
                                </select>
                            </div>
 -->




                        </div>

                        <div class="col-lg-6">
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

                        <div class="col-lg-6">
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
                            <span class="txt1">
                                <br>
                                Imagem da ONG
                            </span>
                            <div class="container-login100-form-btn m-t-17">

                                <input type="file" name="uploadOng" id="uploadOng" />
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

                        <!-- <div class="col-lg-6">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Confirme sua senha
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a senha">
                                <input class="input100" type="password" name="Osenha">
                                <span class="focus-input100"></span>
                            </div>
                        </div> -->


                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <!--<button class="login100-form-btn">
                                    Cadastrar
                                </button>-->
                                <input name="cadastrarOng" class="login100-form-btn" type="submit" value="Cadastrar">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
            // $('.phone_with_ddd').mask('00000-0000');
            $('.tphone_with_ddd').mask('00000-0000');
            $('.cep').mask('00000-000');
            $('.cnpj').mask('00.000.000/0000-00', {
                reverse: true
            });
            $('.date').mask('0000');
            $('.ddd').mask('00');
            $('.numero').mask('0000');
        });
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>
   <script>
        document.getElementById('nok').onchange = function() {
            document.getElementById('Ocpf').disabled = !this.checked;


            document.getElementById('ok').onchange = function() {
                document.getElementById('Ocnpj').disabled = !this.checked;

            }
        };


        function createInput(chck) {
            if (jQuery(chck).is(':checked')) {
                jQuery('<input>', {
                    type: "text",
                    "name": "meta_enter[]",
                    "class": "meta_enter"
                }).appendTo('p.checkable_options');
            } else {
                jQuery("input.meta_enter").attr('disabled', 'disabled');
            }
        }
        createInput(chck);
        </script>

</body>

</html>