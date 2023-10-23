 <?php
    if ($_POST) {
        session_start();
        $rs['nivel'] = '1';
        include "../includes/conexao.php";
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

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

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
         <div class="container-fluid container">
             <a class="navbar-brand" href="#">AdoteAí</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
         </div>
     </nav>
    

     <div class="limiter">
         <div class="container-login100" style="background-image: url('../assets/imgs/dogs.jpg');">
             <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33 ">
                 <span class="login100-form-title p-b-53">



<!-- 
                     <div class="card-header">
                         <span class="float-right">Welcome! <strong>
                                <span class="badge badge-lg badge-secondary text-white"> -->

                     <p> <?php
                            // echo "Olá, {$_SESSION['login']}"; 
                            ?>
                         <!-- !</p>  -->
                                 <!-- </span> 

                             </strong></span>
                     </div>  -->




                 </span>
                 <section class="container">
                     <div class="row">
                         <div class="col-lg-12 col-md-6 text-center">
                             <br>
                             <div class="card border-2 shadow">
                                 <div class="card-body ">
                                     <div class="col-lg-12">
                                         <div class="col-lg-12">
                                             <div class="container-login100-form-btn m-t-17">
                                                 <a href="cadastraranimal.php" class="login100-form-btn">Novo Pet</a>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-lg-12">
                                         <div class="container-login100-form-btn m-t-17">
                                             <a href="animaiscadastrados.php" class="login100-form-btn">Pets Cadastrados</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </section>
             </div>
         </div>
     </div>
 </body>

 </html>