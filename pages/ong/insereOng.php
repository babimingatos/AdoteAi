<?php
session_start();

include("../conexao.php");

//$cadastrarOng = filter_input(INPUT_POST, 'cadastrarOng', FILTER_SANITIZE_STRING);

$Onome = filter_input(INPUT_POST, 'Onome', FILTER_SANITIZE_STRING);
$Ocnpj = filter_input(INPUT_POST, 'Ocnpj', FILTER_SANITIZE_STRING);
$Otelefone = filter_input(INPUT_POST, 'Otelefone', FILTER_SANITIZE_STRING);
$Odd = filter_input(INPUT_POST, 'Odd', FILTER_SANITIZE_STRING);
$Ologradouro = filter_input(INPUT_POST, 'Ologradouro', FILTER_SANITIZE_STRING);
$Onumero = filter_input(INPUT_POST, 'Onumero', FILTER_SANITIZE_STRING);
$Ocomplemento = filter_input(INPUT_POST, 'Ocomplemento', FILTER_SANITIZE_STRING);
$Obairro = filter_input(INPUT_POST, 'Obairro', FILTER_SANITIZE_STRING);
$Ocep = filter_input(INPUT_POST, 'Ocep', FILTER_SANITIZE_STRING);
$Ocidade = filter_input(INPUT_POST, 'Ocidade', FILTER_SANITIZE_STRING);
$Ouf = filter_input(INPUT_POST, 'Ouf', FILTER_SANITIZE_STRING);
$Oemail = filter_input(INPUT_POST, 'Oemail', FILTER_SANITIZE_STRING);
$Osenha = filter_input(INPUT_POST, 'Osenha', FILTER_SANITIZE_STRING);
$Ocpf = filter_input(INPUT_POST, 'Ocpf', FILTER_SANITIZE_STRING);

$target_dir = "../../assets/imgs/imgOng/";
$target_file = $target_dir . basename($_FILES["uploadOng"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifique se o arquivo de imagem é uma imagem real ou falsa
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["uploadOng"]["tmp_name"]);
  if ($check !== false) {
    echo "O arquivo é uma imagem - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "O arquivo não é uma imagem.";
    $uploadOk = 0;
  }
}

date_default_timezone_set('Brazil/East');
$extensao = strtolower(substr($_FILES['uploadOng']['name'], -4)); //pega a extensao do arq
$nome_img = strtolower(substr($_FILES['uploadOng']['name'], 0, -4));
$novo_nome = $nome_img . '-' . date('YmdHis') . $extensao;

// Verifique o tamanho do arquivo
if ($_FILES["uploadOng"]["size"] > 500000) {
  echo "Desculpe, seu arquivo é muito grande.";
  $uploadOk = 0;
}

// Permitir certos formatos de arquivo
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
  $uploadOk = 0;
}

// Verifique se upload está definido como 0 por um erro
if ($uploadOk == 0) {
  echo "Desculpe, seu arquivo não foi enviado.";
} else {
  if (move_uploaded_file($_FILES["uploadOng"]["tmp_name"], $target_dir . $novo_nome)) {
    $uploadOng = $novo_nome;
    echo "The file " . htmlspecialchars(basename($_FILES["uploadOng"]["name"])) . " foi carregado.";
  } else {
    echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
  }
}




$resultado_ong = "INSERT INTO tbl_ong (ong_nome, ong_cnpj, ong_email, ong_senha, ong_cpf, ong_img) 
                  VALUES(:Onome, :Ocnpj, :Oemail, :Osenha, :Ocpf, :uploadOng)";

$insert_ong = $pdo->prepare($resultado_ong);

$insert_ong->bindParam(':Onome', $Onome);
$insert_ong->bindParam(':Ocnpj', $Ocnpj);
$insert_ong->bindParam(':Oemail', $Oemail);
$insert_ong->bindParam(':Osenha', $Osenha);
$insert_ong->bindParam(':Ocpf', $Ocpf);
$insert_ong->bindParam(':uploadOng', $uploadOng);

if ($insert_ong->execute()) {
} else {
}

//INSERE TELEFONE ONG
$ong_id = $pdo->lastInsertId();
$telefone_ong = "INSERT INTO tbl_telefoneong (tbl_ong_ong_id, telOng_numero, telOng_dd) 
                    VALUES (:ong, :Otelefone, :Odd)";
$insert_telefone = $pdo->prepare($telefone_ong);
$insert_telefone->bindParam(':Otelefone', $Otelefone);
$insert_telefone->bindParam(':Odd', $Odd);
$insert_telefone->bindParam(':ong', $ong_id);

if ($insert_telefone->execute()) {
} else {
}

//INSERE  ENDEREÇO ONG   

$endereco_ong = "INSERT INTO tbl_enderecoong (endOng_logradouro, endOng_numero, endOng_complemento, endOng_bairro, endOng_cep, endOng_cidade, endOng_estado, tbl_ong_ong_id)
                     VALUES (:Ologradouro, :Onumero, :Ocomplemento, :Obairro, :Ocep, :Ocidade, :Ouf, :ong)";
$insert_endereco = $pdo->prepare($endereco_ong);
$insert_endereco->bindParam(':Ologradouro', $Ologradouro);
$insert_endereco->bindParam(':Onumero', $Onumero);
$insert_endereco->bindParam(':Ocomplemento', $Ocomplemento);
$insert_endereco->bindParam(':Obairro', $Obairro);
$insert_endereco->bindParam(':Ocep', $Ocep);
$insert_endereco->bindParam(':Ocidade', $Ocidade);
$insert_endereco->bindParam(':Ouf', $Ouf);
$insert_endereco->bindParam(':ong', $ong_id);

if ($insert_endereco->execute()) {

  
} else {
  
}

$senha = password_hash($Osenha, PASSWORD_DEFAULT);

$login_ong = "INSERT INTO login (username, password) 
                    VALUES (:Oemail, :senha)";
$insert_login = $pdo->prepare($login_ong);
$insert_login->bindParam(':Oemail', $Oemail);
$insert_login->bindParam(':senha', $senha);

if ($insert_login->execute()) {
  $_SESSION['msg'] = "<p style='color:green; '>Mensagem foi enviada com sucesso </p>";
  header("Location: ../../index.php");
} else {
  $_SESSION['msg'] = "<p style='color:red; '>Mensagem nao foi enviada com sucesso </p>";
  header("Location: cadastroOng.php");
}
