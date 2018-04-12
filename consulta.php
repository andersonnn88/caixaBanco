<html>
    <head>
        <title>Bootstrap Example</title>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
                // Conectando ao banco de dados: 
                include_once("conectar.php");
        ?>
    <div class="container">
                <h2>Striped Rows</h2>
                <p>The .table-striped class adds zebra-stripes to a table:</p>            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $sql = "SELECT * FROM users";
                         $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
                    
                         while ($registro = mysqli_fetch_array($resultado))
                         {
                                
                                $nome = $registro['nome'];
                                $sobrenome = $registro['senha'];
                                $sexo = $registro['email'];
                                    echo "<tr>";
                                    echo "<td>".$nome."</td>";
                                    echo "<td>".$sexo."</td>";
                                    echo "<td>".$sobrenome."</td>";
                                    echo "</tr>";
                             
                             
                         }
                         
                         mysqli_close($strcon);
                                 echo "</tbody>";
                                echo "</table>";
 
 

                            echo "<a href='formulario.html'>Clique aqui para realizar um novo cadastro</a><br>";
                             echo "<a href='consulta.php'>Clique aqui para realizar uma consulta</a><br>";
                    
                    ?>
                    
                    
                
                
                  
    </div>
  </body>
</html>  

  
 
<!-- 
 
 
 
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
    $nome = $registro['nome'];
    $sobrenome = $registro['senha'];
    $sexo = $registro['email'];
    echo "<tr>";
    echo "<td>".$nome."</td>";
    echo "<td>".$sobrenome."</td>";
    echo "<td>".$sexo."</td>";
    echo "</tr>";
 }
 
 ?>

    

 <!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>

<div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>


-->