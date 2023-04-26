<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="../assets/css/main.css">

   <title>AdoteAí</title>
</head>

<body>

   <!-- MENU - COMEÇO-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid container">
         <a class="navbar-brand" href="../index.php">AdoteAí</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px; width:100%;">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="">⠀⠀⠀</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="">⠀⠀⠀</a>
               </li>
               <li class="nav-item position-fixed flot end-0 pe-5 me-5">
               <?php
               session_start();
               include "conexao.php";
               echo '<a class="nav-link active" aria-current="page" href="#">' . $_SESSION['nomeLoginOngAdot'] . ' </a>';  
               ?>
               </li>
               <li class="nav-item position-fixed end-0 me-5">             
                  <a class="nav-link active" aria-current="page" href="sairLoginOngAdot.php">Sair</a>
               </li>
            </ul>

            <div>
                
               <!-- <a href="pages/loginOngAdot.php"> <button class="btn btn-info" type="submit">Login</button>
                  &nbsp
                  <a href="pages/escolhaCadastro.php"> <button class="btn btn-info" type="submit"> Cadastrar</button></a> -->
            </div>
         </div>
      </div>
   </nav>
   <!-- MENU - FIM-->


</html>
</body>