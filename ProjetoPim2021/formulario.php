 <?php
 
 // stanciando a classe da conexao atraves de require_once
        require_once 'model.php';
        $u = new usuario;
?>

        <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
</head>
<body>

    <header>
        <h1>SysHotel</h1>
    </header>
    <hr>
  
    <form method="POST" >
        <div class="formulario">
            <label for="text">NOME:</label><br><br>
            <input type="text" name="nome" class=""><br><br>
            <label for="email">E-MAIL:</label><br><br>
            <input type="email" name="email" id="a"><br><br>
            <label for="text">TELEFONE:</label><br><br>
            <input type="phone" name="telefone" id="a"><br><br>
            <label for="numer">CHECK-IN:</label><br><br>
            <input type="date" name="checkin" id="a"><br><br>
            <label for="numer">CHECK-OUT:</label><br><br>
            <input type="date" name="checkout" id="a"><br><br>
            <label for="text">DIARIAS:</label><br><br>
            <input type="number" name="diarias" id="a"><br><br>
            <label for="text">ADULTOS:</label><br><br>
            <input type="number" name="adultos" id="a"><br><br>
            <label for="text">CRIANCAS:</label><br><br>
            <input type="number" name="criancas" id="a"><br> <br>
            <input type="submit" value= "CADASTRAR" class="env" >      
        </div>
    </form>

    <a href="index.html" ><input type="button" value="voltar" id="val"></a>
    
    <?php

 
    
    
            //  CADASTRAMENTO DE USUARIO.
    
            // isset() verifica a existencia de uma variavel, 
    
    if(isset($_POST['nome'])){
            
        // usando addslashes(), para se prevenir contra ataques rakers 
        $nome   = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $telefone = addslashes($_POST['telefone']);
        $check_in = addslashes($_POST['checkin']);
        $check_out = addslashes($_POST['checkout']);
        $diarias = addslashes($_POST['diarias']);
        $adultos = addslashes($_POST['adultos']);
        $criancas = addslashes($_POST['criancas']);
    
      //  verificando se a variavel nao esta vazia, atraves da funcao empty()
             if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($check_in) && !empty($check_out) && !empty($diarias) && !empty($adultos) && !empty($criancas)){
               
                $pdo = $u->conect("SysHotel", "187.108.201.193:3306", "sistema", "sistema"); 
    
                if ($u->cadastro($nome, $email, $telefone, $check_in, $check_out, $diarias, $adultos, $criancas)){
                     echo "Reserva feita com Sucesso!";                  
                }else{
                    echo"Error";  
                }
             
            
            }else {
                // echo "Preencha os Campos";
            }
    }
    else{
        // echo "Problema aqui";
    }
    ?>
    
    <footer>
        <hr>
        <div class="rodape">    
            <div class="localizacao">
                <h2>Localização:</h2> <br> 
                Avenida Santa Ana<br> <br>
                Numero: 432, Centro<br> <br>
                <strong>Joanesburgo-SP</strong> <br> <br>
            </div><!--localizacao-->
            <div class="contato">
                <i class="fas fa-envelope-square"> Email: syshotel@gmail.com</i> <br> <br>
                <i class="fab fa-whatsapp-square"> WhatsApp:(18)98547-5526</i> 
                
            </div><!--contato-->
           
        </div><!--rodape-->

    </footer>
</body>
</html>