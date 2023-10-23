<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../assets/bootstrap-5/css/bootstrap.min.css">

   <title>AdoteAí</title>
</head>

<body>

   <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1CBAA4;">
        <div class="container-fluid">
            <a class="navbar-brand ps-5" href="../index.php">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Sobre</a>
                    <a class="nav-link active" href="#">ONG's</a>
                    <a class="nav-link active" href="#">Adote</a>
                    <a class="nav-link active pe-5" href="#">Contato</a>
                    <a class="nav-link active" href="pages/escolhaCadastro.php">Cadastrar</a>
                    <a class="nav-link active" href="pages/escolhaLogin.php">Login</a>     
                </div>
            </div>
        </div>
    </nav>


    <script src="assets/bootstrap-5/js/bootstrap.bundle.min.js"></script> -->
   <!DOCTYPE html>
   <!-- Created By CodingNepal -->
   <html lang="en" dir="ltr">

   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="assets/styleNav.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   </head>

   <body>
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            AdotaAí
         </div>
         <div class="nav-items">
            <li><a href="pages/escolhaLogin.php">Login</a></li>
            <li><a href="pages/escolhaCadastro.php">Cadastrar</a></li>
            <li><a href="pages/cadastrarAnimal.php">Cadastrar Animal</a></li>
           <!--  <li><a href="#">Contact</a></li>
            <li><a href="#">Feedback</a></li> -->
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <!-- <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
         </form> -->
      </nav>
      <div class="content">
         <header class="space"></header>
         <div class="space text">
         </div>
      </div>
      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = () => {
            items.classList.add("active");
            menuBtn.classList.add("hide");
            searchBtn.classList.add("hide");
            cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = () => {
            items.classList.remove("active");
            menuBtn.classList.remove("hide");
            searchBtn.classList.remove("hide");
            cancelBtn.classList.remove("show");
            form.classList.remove("active");
            cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = () => {
            form.classList.add("active");
            searchBtn.classList.add("hide");
            cancelBtn.classList.add("show");
         }
      </script>
   </body>

   </html>
</body>

</html>