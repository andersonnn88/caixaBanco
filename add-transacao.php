<?php
session_start();
require 'config.php';
require 'sessao.php';

    if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        $valor = str_replace(",",".", $_POST['valor']);
        $valor = floatval($valor);
        
        $sql = $pdo->prepare("INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW() )");
        $sql->bindValue(":id_conta", $_SESSION['banco']);
        $sql->bindValue(":tipo", $tipo);
        $sql->bindValue(":valor", $valor);
        $sql->execute();
        
    if($tipo == '0') {
		// Depósito
		$sql = $pdo->prepare("UPDATE contas SET saldo = saldo + :valor WHERE id = :id");
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":id", $_SESSION['banco']);
		$sql->execute();

	} else {
		// Saque
		$sql = $pdo->prepare("UPDATE contas SET saldo = saldo - :valor WHERE id = :id");
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":id", $_SESSION['banco']);
		$sql->execute();
	}

	header("Location: index.php");
	exit;
    }
?>
<!DOCTYPE html>

<html> 
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
		<title>Caixa Eletrônico</title>
	</head>
	<body>
	    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Banco</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
    
      <li><a href="add-transacao.php">Saque / Deposito</a></li>
      
      <li><a href="transferencia.php">Transferência</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="sair.php"><span class="glyphicon glyphicon-user"></span>Sair</a></li>
      
    </ul>
  </div>
</nav>
	    <div class="container">
		<h1>Banco</h1>
		<h3>Retirada / Deposito</h3> 
		
		<h3>Saldo atual R$: <?php echo number_format($info['saldo'], 2, ',', '.'); ?> </h3>
		<!--<a href="sair.php">Sair</a><br/>-->
		<hr/>
	    </div>
        <div class="container">
         <div class="col-sm-4"></div>
	 <div class="col-sm-4">   
        <form method="POST">
            Tipo de transação:</br>
            <select name="tipo">
                <option value="0">Depósito</option>
                <option value="1">Retirada</option>
            </select><br/><br/>
            
            Valor:<br/>
            <input type="text" name="valor" pattern="[0-9.,]{1,}" /><br/><br/>
            
            <!--<input type="submit" value="Adicionar" /> -->
            <button type="submit" class="btn btn-primary">Adicionar</button>
            
        </form>
        <hr/>
        </div>
        </div>
    </body>
</html>