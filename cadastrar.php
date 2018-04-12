<?php

 include_once("conectar.php");
 
 
 
 $nome = $_POST['NomeCliente'];
 $senha = md5($_POST['SobrenomeCliente']);
 $sexo = $_POST['Email'];
 
    echo $senha;
    
    $sql = "INSERT INTO users (nome, senha, email)
     VALUES ('$nome', '$senha', '$sexo')";

    if (!$strcon) {
        die('Não foi possível conectar ao Banco de Dados');
    }
    
        mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
        
        mysqli_close($strcon);
        
        echo "Cliente cadastrado com sucesso!";
        echo "<a href='formulario.html'>Clique aqui para realizar um novo cadastro</a><br>";
                echo "<a href='consulta.php'>Clique aqui para realizar uma consulta</a><br>";
?>
