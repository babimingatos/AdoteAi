<?php 

// session_start();

class Usuario{

    public function login($email,$senha){
        global $pdo;

        $sth = "SELECT * FROM tbl_admin WHERE adm_email = :email AND adm_senha = :senha";
        $sth = $pdo->prepare($sth);
        $sth->bindValue("email", $email);
        $sth->bindValue("senha", $senha);
        $sth->execute();

        if($sth->rowCount() > 0){
            $dado = $sth->fetch();

            $_SESSION['idUser'] = $dado['adm_id'];

            return true;
        }else{
            return false;
        }

    }


}




?>