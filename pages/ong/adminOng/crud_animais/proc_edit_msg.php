<?php
session_start();
include_once 'conexao.php';

//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$SendEditCont = filter_input(INPUT_POST, 'SendEditCont', FILTER_SANITIZE_STRING);
if($SendEditCont){
    //Receber os dados do formulário
    $id = filter_input(INPUT_POST, 'ani_id', FILTER_SANITIZE_NUMBER_INT);
    $aniNome = filter_input(INPUT_POST, 'ani_nome', FILTER_SANITIZE_STRING);
    $aniCor = filter_input(INPUT_POST, 'ani_cor', FILTER_SANITIZE_STRING);
    $aniPorte = filter_input(INPUT_POST, 'ani_porte', FILTER_SANITIZE_STRING);
    $aniGen = filter_input(INPUT_POST, 'tbl_genani_gen_nome', FILTER_SANITIZE_STRING);
    $aniCastrado = filter_input(INPUT_POST, 'ani_castrado', FILTER_SANITIZE_STRING);
    $aniVacinado = filter_input(INPUT_POST, 'ani_vacinado', FILTER_SANITIZE_STRING);

    $result_msg_cont = "UPDATE tbl_animal SET ani_nome=:ani_nome, ani_cor=:ani_cor, ani_porte=:ani_porte, tbl_genani_gen_nome=:tbl_genani_gen_nome, ani_castrado=:ani_castrado,ani_vacinado=:ani_vacinado WHERE ani_id=$id";
    
    $update_msg_cont = $conn->prepare($result_msg_cont);
    $update_msg_cont->bindParam(':ani_nome', $aniNome);
    $update_msg_cont->bindParam(':ani_cor', $aniCor);
    $update_msg_cont->bindParam(':ani_porte', $aniPorte);
    $update_msg_cont->bindParam(':tbl_genani_gen_nome', $aniGen);
    $update_msg_cont->bindParam(':ani_castrado', $aniCastrado);
    $update_msg_cont->bindParam(':ani_vacinado', $aniVacinado);
    
    if($update_msg_cont->execute()){
        $_SESSION['msg'] = "<p style='color:green;'>Mensagem editada com sucesso</p>";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Mensagem não foi editada com sucesso</p>";
        header("Location: index.php");
    }    
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Mensagem não foi editada com sucesso</p>";
    header("Location: index.php");
}