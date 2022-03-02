<?php

class usuario{
    private $pdo;
    public $msgErro = "";
 // conexao com banco de dados 
 public function conect($nome, $host, $usuario, $senha){
     global $pdo;
     global $msgErro;
    //  tratamento de erro, a var $e recebe a mensagen de erro da funçao getMassege, $PDO  cria a coneção  
     try
     {
        $pdo = new PDO("mysql:dbname=". $nome .";host=" . $host, $usuario, $senha);  
     } catch (PDOException $e) {
            $msgErro = $e->getMessage(); 
        }
        return $pdo;
    


 }
 // criando cadastro no banco de dados
 public function cadastro( $nome, $email, $telefone, $check_in, $check_out, $diarias, $adultos, $criancas ){
        global $pdo;

        // //  verificar se ja existe email cadastrado, podemos usar o metodo prepare() do PDO
        $sql  = $pdo->prepare("SELECT id FROM reservas WHERE email = :e");
        // usando bindValue(:e) para atribuir o valor da variavel a email a :e
        $sql->bindValue(":e", $email);
        $sql->execute();
        
        //verificando se a $sql retornou algum id_usuario, se retornar, usuario ja possui cadastro
        // usando o metodo rowCount(), para contar as linhas que vierem do banco de dados 
        if($sql->rowCount() > 0 ){
            return false; // usuario já cadastrado
        }   else {
           
            $sql = $pdo ->prepare("INSERT INTO reservas (nome, email, telefone, check_in, check_out, diarias, adultos, criancas) VALUES (:n, :e, :t, :c, :co, :d, :a, :cr)"); 
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":c", $check_in);
            $sql->bindValue(":co", $check_out);
            $sql->bindValue(":d", $diarias);
            $sql->bindValue(":a", $adultos);
            $sql->bindValue(":cr", $criancas);            
            $sql->execute();
            return true; // cadastrado com sucesso
                            

        }
            

    }


}



?>