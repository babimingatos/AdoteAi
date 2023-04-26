<?php
// if ($_POST) {
//     session_start();
//     include "conexao.php";
//     try {
//         $sth = $pdo->prepare("SELECT * FROM tbl_adotador WHERE adot_email=? and adot_senha=? and adot_nivel=2;");
//         $sth->bindParam(1, $_POST['AAemail']);
//         $sth->bindParam(2, $_POST['AAsenha']);
//         $sth->execute();
//         if ($rs = $sth->fetch(PDO::FETCH_OBJ)) {
//             $_SESSION['login'] = $rs->user_email;
//             $_SESSION['UsuarioNivel'] = $rs['nivel'];
            

//         //    adcionar tipo de usuario, adotante não entrar no adminONg
//             header('location:index.php');
//         } else {
//             echo "<script>alert('Erro: Opa! Acho que não te conhecemos por aqui!')</script>";
//         }
//     } catch (PDOException $ex) {
//         echo "Erro: " . $ex;
//     }
// }
//   // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
//   if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['password']))) {
//       header("Location: index.php"); exit;
//   }

  ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33 ">
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="verificaLoginOngAdot.php">
                    <span class="login100-form-title p-b-53">
                        Faça seu login!
                    </span>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    E-mail
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite o Email">
                                <input class="input100" type="email" name="email">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Senha
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a senha">
                                <input class="input100" type="password" name="senha">
                                <span class="focus-input100"></span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <input class="login100-form-btn" type="submit" value="Logar"/>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="container-login100-form-btn m-t-17">
                                <a href="../pages/escolhaLogin.php" class="login100-form-btn">Voltar</a>
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