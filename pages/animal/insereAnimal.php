<?php
session_start();
include "../conexao.php";
$Annome = filter_input(INPUT_POST, 'Annome', FILTER_SANITIZE_STRING);
$Anraca = filter_input(INPUT_POST, 'Anraca', FILTER_SANITIZE_STRING);
$Anporte = filter_input(INPUT_POST, 'Anporte', FILTER_SANITIZE_STRING);
$Ancor = filter_input(INPUT_POST, 'Ancor', FILTER_SANITIZE_STRING);
$Ancastrado = filter_input(INPUT_POST, 'Ancastrado', FILTER_SANITIZE_STRING);
//$Anvacinado = filter_input(INPUT_POST, 'Anvacinado', FILTER_SANITIZE_STRING);
$Anidade = filter_input(INPUT_POST, 'Anidade', FILTER_SANITIZE_STRING);
$Andescricao = filter_input(INPUT_POST, 'Andescricao', FILTER_SANITIZE_STRING);
$Anespecie = filter_input(INPUT_POST, 'Anespecie', FILTER_SANITIZE_STRING);
$Angenero = filter_input(INPUT_POST, 'Angenero', FILTER_SANITIZE_STRING);
$upload = filter_input(INPUT_POST, 'upload', FILTER_SANITIZE_STRING);
$uploadVacina = filter_input(INPUT_POST, 'uploadVacina', FILTER_SANITIZE_STRING);

date_default_timezone_set('Brazil/East');
$extensao = strtolower(substr($_FILES['upload']['name'],  -4));
$nome_img = strtolower(substr($_FILES['upload']['name'], 0, -4));
$upload = $nome_img . '-' . date('YmdHis') . $extensao;
move_uploaded_file($_FILES['upload']['tmp_name'], '../../assets/imgs/imgAnimal/' . $upload);


date_default_timezone_set('Brazil/East');
$extensaoVacina = strtolower(substr($_FILES['uploadVacina']['name'],  -4));
$nome_imgVacina = strtolower(substr($_FILES['uploadVacina']['name'], 0, -4));
$uploadVacina = $nome_imgVacina .'-' .date('YmdHis') .$extensaoVacina;
move_uploaded_file($_FILES['uploadVacina']['tmp_name'], '../../assets/imgs/imgVacina/' . $uploadVacina);

var_dump($_POST);


$sth = $pdo->prepare("INSERT INTO tbl_animal (ani_nome, ani_raca, ani_porte, ani_cor, ani_castrado, ani_idade, ani_descricao, ani_img, ani_vacina, tbl_ong_ong_id, tbl_especie_especie_id, tbl_genani_gen_id) 
                      VALUES (?,?,?,?,?,?,?,?,?,?,?,?); "); 
$sth->bindParam(1, $_POST['Annome']);
$sth->bindParam(2, $_POST['Anraca']);
$sth->bindParam(3, $_POST['Anporte']);
$sth->bindParam(4, $_POST['Ancor']);
$sth->bindParam(5, $_POST['Ancastrado']);
$sth->bindParam(6, $_POST['Anidade']);
$sth->bindParam(7, $_POST['Andescricao']);
$sth->bindParam(8, $upload); 
$sth->bindParam(9, $uploadVacina); 
$sth->bindParam(10, $_SESSION['idLoginOngAdot']); 
$sth->bindParam(11, $_POST['Anespecie']);
$sth->bindParam(12, $_POST['Angenero']);  


try {

    if ($sth->execute()) {
        if ($sth->rowCount() > 0) {
            header('location: ../homeOng.php');
        } else {
            echo "Erro: Não foi possivel executar a declaração sql";
        }
    } else {
        echo "Erro na execução do cadastro";
    }
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}
