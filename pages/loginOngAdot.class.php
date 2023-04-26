<?php 
include("conexao.php");
class LoginOngAdot{

    public function login ($email,$senha){
        global $pdo;

        $sth = "SELECT * FROM tbl_ong WHERE ong_email = :email AND ong_senha = :senha";
        $sth = $pdo->prepare($sth);
        $sth->bindValue("email", $email);
        $sth->bindValue("senha", $senha);
        $sth->execute();

        if($sth->rowCount() > 0){
            $dado = $sth->fetch();

            $_SESSION['idLoginOngAdot'] = $dado['ong_id'];
            $_SESSION['nomeLoginOngAdot'] = $dado['ong_nome'];
            $_SESSION['nivelLoginOngAdot'] = $dado['ong_nivel'];
            return true;
        }else{

                $sth = "SELECT * FROM tbl_adotador WHERE adot_email = :email AND adot_senha = :senha";
                $sth = $pdo->prepare($sth);
                $sth->bindValue("email", $email);
                $sth->bindValue("senha", $senha);
                $sth->execute();

                if($sth->rowCount() > 0){
                    $dado = $sth->fetch();
                    $_SESSION['nomeLoginOngAdot'] = $dado['adot_nome'];
                    $_SESSION['idLoginOngAdot'] = $dado['adot_id'];
                    $_SESSION['nivelLoginOngAdot'] = $dado['adot_nivel'];
    
                    return true;

                }else{
                    return false;
                }

        }

    }


}
