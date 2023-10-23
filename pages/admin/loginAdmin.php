<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/styleAdmin.css">
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>AdoteAí</title>
</head>

<body id="body-pd">
    <div class="container-fluid height-100 bg-light text-center">

        <div class="row">

            <div class="offset-xl-4 col-xl-4 offset-md-3 col-md-6 mb-4 mt-5">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="wrapper fadeInDown">
                                <div id="formContent">
                                    <!-- Tabs Titles -->

                                    <!-- Icon -->
                                    <div class="fadeIn first">
                                        <img class="m-0" src="../../assets/imgs/icone.png" id="icon" alt="User Icon" />
                                    </div>

                                    <!-- Login Form -->
                                    <form action="verificaAdmin.php" method="POST">
                                        <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
                                        <input type="password" id="password" class="fadeIn third" name="senha" placeholder="senha">
                                        <input type="submit" class="fadeIn fourth" value="Entrar">
                                    </form>

                                    <!-- Remind Passowrd -->
                                    <div id="formFooter">
                                        <a href="../../index.php"><input type="submit" class="fadeIn fourth" value="Voltar"></a>
                                        <!-- <a class="underlineHover" href="#">Esqueceu sua senha?</a> -->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../assets/tables/jquery-3.5.1.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="assets/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
        var scrollTop = function() {
            window.scrollTo(0, 0);
        };
    </script>

</body>

</html>