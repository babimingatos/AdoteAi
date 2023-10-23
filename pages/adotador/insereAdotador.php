<?php
session_start();

include("../conexao.php");

//$cadastrarOng = filter_input(INPUT_POST, 'cadastrarOng', FILTER_SANITIZE_STRING);

$Anome = filter_input(INPUT_POST, 'Anome', FILTER_SANITIZE_STRING);
$Acpf = filter_input(INPUT_POST, 'Acpf', FILTER_SANITIZE_STRING);
$Arg = filter_input(INPUT_POST, 'Arg', FILTER_SANITIZE_STRING);
$Atelefone = filter_input(INPUT_POST, 'Atelefone', FILTER_SANITIZE_STRING);
$AddAdot = filter_input(INPUT_POST, 'AddAdot', FILTER_SANITIZE_STRING);
$Alogradouro = filter_input(INPUT_POST, 'Alogradouro', FILTER_SANITIZE_STRING);
$Anumero = filter_input(INPUT_POST, 'Anumero', FILTER_SANITIZE_STRING);
$Acomplemento = filter_input(INPUT_POST, 'Acomplemento', FILTER_SANITIZE_STRING);
$Abairro = filter_input(INPUT_POST, 'Abairro', FILTER_SANITIZE_STRING);
$Acep = filter_input(INPUT_POST, 'Acep', FILTER_SANITIZE_STRING);
$Acidade = filter_input(INPUT_POST, 'Acidade', FILTER_SANITIZE_STRING);
$Auf = filter_input(INPUT_POST, 'Auf', FILTER_SANITIZE_STRING);
$Aemail = filter_input(INPUT_POST, 'Aemail', FILTER_SANITIZE_STRING);
$Asenha = filter_input(INPUT_POST, 'Asenha', FILTER_SANITIZE_STRING);


$resultado_adot = "INSERT INTO tbl_adotador (adot_nome, adot_cpf, adot_rg, adot_logradouro, adot_numero, adot_complemento, adot_bairro, adot_cep, adot_cidade, adot_estado, adot_email, adot_senha) 
                  VALUES(:Anome, :Acpf, :Arg, :Alogradouro, :Anumero, :Acomplemento, :Abairro, :Acep, :Acidade, :Auf, :Aemail, :Asenha)";

$insert_adotador = $pdo->prepare($resultado_adot);

$insert_adotador->bindParam(':Anome', $Anome);
$insert_adotador->bindParam(':Acpf', $Acpf);
$insert_adotador->bindParam(':Arg', $Arg);
$insert_adotador->bindParam(':Alogradouro', $Alogradouro);
$insert_adotador->bindParam(':Anumero', $Anumero);
$insert_adotador->bindParam(':Acomplemento', $Acomplemento);
$insert_adotador->bindParam(':Abairro', $Abairro);
$insert_adotador->bindParam(':Acep', $Acep);
$insert_adotador->bindParam(':Acidade', $Acidade);
$insert_adotador->bindParam(':Auf', $Auf);
$insert_adotador->bindParam(':Aemail', $Aemail);
$insert_adotador->bindParam(':Asenha', $Asenha);


//$insert_adotador->bindParam(':ong', $ong_id);

if ($insert_adotador->execute()) {
   
} else {
  
}

//INSERE TELEFONE ONG
$adot_id = $pdo->lastInsertId();
$telefone_adotador = "INSERT INTO tbl_telefoneadot (telAdot_dd, telAdot_numero, tbl_adotador_adot_id) 
                          VALUES (:AddAdot, :Atelefone, :adot)";
$insert_telefoneAdot = $pdo->prepare($telefone_adotador);
$insert_telefoneAdot->bindParam(':Atelefone', $Atelefone);
$insert_telefoneAdot->bindParam(':AddAdot', $AddAdot);
$insert_telefoneAdot->bindParam(':adot', $adot_id);

if ($insert_telefoneAdot->execute()) {
    
} else {
    
}

$senhaAdot = password_hash($Asenha, PASSWORD_DEFAULT);

$login_adot = "INSERT INTO login (username, password) 
                    VALUES (:Aemail, :senha)";
$insert_login = $pdo->prepare($login_adot);
$insert_login->bindParam(':Aemail', $Aemail);
$insert_login->bindParam(':senha', $senhaAdot);

if ($insert_login->execute()) {
    $_SESSION['msg'] = "<p style='color:green; '>Mensagem foi enviada com sucesso </p>";
    header("Location: ../../index.php");
} else {
    $_SESSION['msg'] = "<p style='color:red; '>Mensagem nao foi enviada com sucesso </p>";
    header("Location: cadastroAdotador.php");
}





?>
