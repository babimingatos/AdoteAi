<?php 

session_start();
if (!$_SESSION['idUser']):
    header("Location: loginAdmin.php");
    die;
endif;

include '../conexao.php';?> 

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>AdoteAí</title>
</head>
    <body id="body-pd">
    <?php
    include "../header/headerAdmin.php";
    ?>
        <!-- <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Administrador</span> </a>
                    <div class="nav_list">
                        <a href="admin.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="tableOng.php" class="nav_link"> <i class='bx bx-group nav_icon'></i> <span class="nav_name">ONG's</span> </a>
                        <a href="tableAnimais.php" class="nav_link"> <i class='bx bxl-baidu nav_icon'></i> <span class="nav_name">Animais</span> </a>
                        <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Relatorios</span> </a>
                        <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>
                    </div>
                </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div> -->
        <div class="container-fluid height-100 bg-light" style="padding-left: 195px;">
            <br><br><br>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total de ONG's</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                        try {
                                            $sth = $pdo->prepare("SELECT count(*) as ong_nome FROM tbl_ong");
                                            if ($sth->execute()) {
                                                while ($rs = $sth->fetch(PDO::FETCH_OBJ)) {
                                                    echo '<td> ' . $rs->ong_nome . ' </td>';
                                                }
                                            }
                                        } catch (PDOException $erro) {
                                            echo "Error: " . $erro->getMessage();
                                        }
                                        ?>




                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-home fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total de Animais</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                        try {
                                            $sth = $pdo->prepare("SELECT count(*) as ani_id FROM tbl_animal");
                                            if ($sth->execute()) {
                                                while ($rs = $sth->fetch(PDO::FETCH_OBJ)) {
                                                    echo '<td> ' . $rs->ani_id . ' </td>';
                                                }
                                            }
                                        } catch (PDOException $erro) {
                                            echo "Error: " . $erro->getMessage();
                                        }
                                    ?>




                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-paw fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mes inicial
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-calendar-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mes Final
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-calendar-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../assets/tables/jquery-3.5.1.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="../../assets/js/script.js"></script>
        <script>
            var scrollTop = function() {
                window.scrollTo(0, 0);
            };
        </script>

    </body>

</html>