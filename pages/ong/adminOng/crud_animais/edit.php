<?php
session_start();
ob_start();
include_once '../../../conexao.php';

$ani_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (empty($ani_id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location: ../animaisCadastrados.php");
    exit();
}

$query_usuario = "SELECT ani_id, ani_nome, ani_porte,ani_cor,ani_castrado,ani_idade,ani_descricao FROM tbl_animal WHERE ani_id = $ani_id LIMIT 1";
$result_usuario = $pdo->prepare($query_usuario);
$result_usuario->execute();

if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location:../animaisCadastrados.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="../assets/imgs/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../../../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/main.css">
    <title>AdoteAí</title>
</head>

<body class="container-fluid p-0 m-0">


    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($dados['EditUsuario'])) {
        $empty_input = false;
        $dados = array_map('trim', $dados);
        if (in_array("", $dados)) {
            $empty_input = true;
            echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
        }

        if (!$empty_input) {
            $query_up_usuario = "UPDATE tbl_animal SET ani_nome=:ani_nome, ani_porte=:ani_porte,
            ani_cor=:ani_cor,ani_castrado=:ani_castrado,ani_idade=:ani_idade,ani_descricao=:ani_descricao  WHERE ani_id=:ani_id";
            $edit_usuario = $pdo->prepare($query_up_usuario);
            $edit_usuario->bindParam(':ani_nome', $dados['ani_nome'], PDO::PARAM_STR);
            $edit_usuario->bindParam(':ani_porte', $dados['ani_porte'], PDO::PARAM_STR);
            $edit_usuario->bindParam(':ani_cor', $dados['ani_cor'], PDO::PARAM_STR);
            $edit_usuario->bindParam(':ani_castrado', $dados['ani_castrado'], PDO::PARAM_STR);
          
            $edit_usuario->bindParam(':ani_idade', $dados['ani_idade'], PDO::PARAM_STR);
            $edit_usuario->bindParam(':ani_descricao', $dados['ani_descricao'], PDO::PARAM_STR);


            $edit_usuario->bindParam(':ani_id', $ani_id, PDO::PARAM_INT);

            if ($edit_usuario->execute()) {
                $_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso!</p>";
                header("Location: ../animaisCadastrados.php");
            } else {
                echo "<p style='color: #f00;'>Erro: Usuário não editado com sucesso!</p>";
            }
        }
    }
    ?>
    <div class="limiter">

        <div class="container-login100" style="background-image: url('../../assets/imgs/dogs.jpg');">

            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <span class="login100-form-title p-b-53">
                    Editar animal
                </span>
                <div class="row">
                    <form id="edit-usuario" class="login100-form validate-form flex-sb flex-w" method="POST" action="">


                        <div class="col-lg-12">
                            <div class="p-t-31 p-b-9">
                                <span class="txt1">
                                    Nome:
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input type="text" class="input100" name="ani_nome" id="ani_nome" placeholder="Nome completo" value="<?php
                                                                                                                                        if (isset($dados['ani_nome'])) {
                                                                                                                                            echo $dados['ani_nome'];
                                                                                                                                        } elseif (isset($row_usuario['ani_nome'])) {
                                                                                                                                            echo $row_usuario['ani_nome'];
                                                                                                                                        }
                                                                                                                                        ?>"><br><br>


                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="p-t-2 p-b-9">
                                <span class="txt1">
                                    Porte:
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input type="text" class="input100" name="ani_porte" id="ani_porte" placeholder="Digite o porte" value="<?php
                                                                                                                                        if (isset($dados['ani_porte'])) {
                                                                                                                                            echo $dados['ani_porte'];
                                                                                                                                        } elseif (isset($row_usuario['ani_porte'])) {
                                                                                                                                            echo $row_usuario['ani_porte'];
                                                                                                                                        }
                                                                                                                                        ?>"><br><br>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="p-t-10 p-b-9">
                                <span class="txt1">
                                    Cor:
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input type="text" class="input100" name=ani_cor id="ani_cor" placeholder="Cor" value="<?php
                                                                                                                                    if (isset($dados['ani_cor'])) {
                                                                                                                                        echo $dados['ani_cor'];
                                                                                                                                    } elseif (isset($row_usuario['ani_cor'])) {
                                                                                                                                        echo $row_usuario['ani_cor'];
                                                                                                                                    }
                                                                                                                                    ?>"><br><br>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="p-t-10 p-b-9">
                                <span class="txt1">
                                    Castrado:
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input type="text" class="input100" name=ani_castrado id="ani_castrado" placeholder="Castrado" value="<?php
                                                                                                                                            if (isset($dados['ani_castrado'])) {
                                                                                                                                                echo $dados['ani_castrado'];
                                                                                                                                            } elseif (isset($row_usuario['ani_castrado'])) {
                                                                                                                                                echo $row_usuario['ani_castrado'];
                                                                                                                                            }
                                                                                                                                            ?>"><br><br>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="p-t-10 p-b-9">
                                <span class="txt1">
                                    Idade:
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input type="text" class="input100" name=ani_idade id="ani_idade" placeholder="Idade" value="<?php
                                                                                                                                        if (isset($dados['ani_idade'])) {
                                                                                                                                            echo $dados['ani_idade'];
                                                                                                                                        } elseif (isset($row_usuario['ani_idade'])) {
                                                                                                                                            echo $row_usuario['ani_idade'];
                                                                                                                                        }
                                                                                                                                        ?>"><br><br>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="p-t-10 p-b-9">
                                <span class="txt1">
                                    Descrição:
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input type="text" class="input100" name=ani_descricao id="ani_descricao" placeholder="Descrição" value="<?php
                                                                                                                                                if (isset($dados['ani_descricao'])) {
                                                                                                                                                    echo $dados['ani_descricao'];
                                                                                                                                                } elseif (isset($row_usuario['ani_descricao'])) {
                                                                                                                                                    echo $row_usuario['ani_descricao'];
                                                                                                                                                }
                                                                                                                                                ?>"><br><br>



                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <button class="login100-form-btn" value="Salvar" name="EditUsuario" type="submit">
                                    Cadastrar
                                </button>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <a href="../animaisCadastrados.php" class="login100-form-btn">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="../../../../assets/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../../../../assets/vendor/animsition/js/animsition.min.js"></script>
    <script src="../../../../assets/vendor/bootstrap/js/popper.js"></script>
    <script src="../../../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../../assets/vendor/select2/select2.min.js"></script>
    <script src="../../../../assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="../../../../assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="../../../../assets/vendor/countdowntime/countdowntime.js"></script>
    <script src="../../../../assets/js/main.js"></script>
    <script src="../../../../assets/mask/dist/jquery.mask.min.js"></script>

</body>

</html>