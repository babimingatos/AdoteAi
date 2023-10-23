<?php  

// session_start();

try {     $pdo = new PDO('mysql:host=localhost;dbname=tcc_banco2;charset=utf8', 'root', '1234');
 } catch (PDOException $e) {     echo $e->getMessage() . "</p>";
         die("Não foi possível estabelecer a conexão com o banco de dados.");
 }
