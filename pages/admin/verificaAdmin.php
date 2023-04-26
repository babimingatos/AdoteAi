<?php
session_start();

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require '../conexao.php';
    require 'usuario.class.php';

    $u = new Usuario();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if($u->login($email, $senha) == true){
        if(isset($_SESSION['idUser'])){
            header("Location: admin.php");
        }else{
            header("Location: loginAdmin.php");
        }

    }else{
        echo "<script>alert('Erro: Login ou senha incorreta! Tente novamente.')</script>";

        header("Refresh:1; url=loginAdmin.php");
    }

}else{
     header("Location: loginAdmin.php");
}



?>