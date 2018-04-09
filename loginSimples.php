<?php 
session_start();
require 'config.php';

 if(isset($_POST['agencia']) && empty($_POST['agencia']) == false) {
	 $agencia = addslashes($_POST['agencia']);
	 $conta   = addslashes($_POST['conta']);
	 $senha   = addslashes($_POST['senha']);
	 
	 $sql = $pdo->prepare("SELECT * FROM contas WHERE agencia = :agencia AND
	 conta = :conta AND senha = :senha");
	 
	 $sql->bindValue(":agencia", $agencia);
	 $sql->bindValue(":conta",   $conta);
	 $sql->bindValue(":senha", md5($senha));
	 
	 $sql->execute();
	 
	 if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			
			$_SESSION['banco'] = $sql['id'];
			
			header("Location: index.php");
			exit;
	 }
 }
?>

<html> 
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<title>Caixa Eletrônico</title>
	</head>
	<body>
	 <div class="container">
	 <div class="col-sm-4"></div>
	 <div class="col-sm-4">
		<form method="POST">
			Agência:<br/>
			<input type="text" name="agencia" /><br/><br/>
			
			Conta:<br/>
			<input type="text" name="conta" /><br/><br/>
			
			Senha:<br/>
			<input type="password" name="senha" /><br/><br/>
			
			<input type="submit" value="Entrar" />
			
			
		
		</form>
	</div>
	</div>
	</body>		
</html>
