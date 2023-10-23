<?php
include("../../includes/conexao.php");
$ani_id = $_GET['ani_id'];
$sth = "DELETE FROM tbl_animal WHERE ani_id=:ani_id";
$query = $pdo->prepare($sth);
$query->execute(array(':ani_id' => $ani_id));


header("Location:../animaisCadastrados.php");
?>
