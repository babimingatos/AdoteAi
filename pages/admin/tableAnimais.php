<?php
include "../conexao.php";

?>
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
    <link rel="stylesheet" href="../../assets/tables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/tables/bootstrap.css">
    <link rel="stylesheet" href="../../assets/tables/tables.css">
    <title>AdoteAí</title>
</head>

<body>

<header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="admin.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Administrador</span> </a>
                    <div class="nav_list">
                        <a href="admin.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="tableOng.php" class="nav_link"> <i class='bx bx-group nav_icon'></i> <span class="nav_name">ONG's</span> </a>
                        <a href="tableAnimais.php" class="nav_link"> <i class='bx bxl-baidu nav_icon'></i> <span class="nav_name">Animais</span> </a>
                    </div>
                </div> <a href="loginAdmin.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a>
            </nav>
        </div>


    <div class="height-100 bg-light" style="padding-left: 195px;">
        <br><br><br>
        <div class="container">
            <?php
            include 'tableAnimaisSelect.php'
            ?>
        </div>
    </div>
    <script src="../../assets/tables/jquery-3.5.1.js"></script>
    <script src="../../assets/tables/jquery.dataTables.min.js"></script>
    <script src="../../assets/tables/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="assets/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            var scrollTop = function() {
                window.scrollTo(0, 0);
            };
        });
    </script>

</body>

</html>