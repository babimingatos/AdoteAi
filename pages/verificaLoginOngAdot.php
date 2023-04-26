<?php
session_start();

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require 'conexao.php';
    require 'loginOngAdot.class.php';

    $oa = new LoginOngAdot();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $_SESSION['nivelLoginOngAdot'];
    if ($oa->login($email, $senha) == true) {
        if (isset( $_SESSION['nivelLoginOngAdot'])) {
            // header("Location: home.php");
            if( $_SESSION['nivelLoginOngAdot'] == '2'){
                header("Location: home.php");
            }
            if( $_SESSION['nivelLoginOngAdot'] == '1'){
                header("Location: homeong.php");
            }
        } else {
            header("Location: loginOngAdot.php");
        }

        // nivel=2


    } else {
        echo "<script>alert('Erro: Login ou senha incorreta! Tente novamente.')</script>";

        header("Refresh:1; url=loginOngAdot.php");
    }
} else {
    header("Location: loginOngAdot.php");
}



?>