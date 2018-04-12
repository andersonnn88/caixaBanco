<?php 
session_start();
require 'config.php';
require 'sessao.php';
    
	
		
?>
<html> 
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
	    
	    
	    
	
		<title>Caixa Eletrônico</title>
	</head>
	<body>
	    
	    <nav class="navbar navbar-inverse">
	   
	    <!--
	     <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	      -->
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
		<h3>Transferencia</h3> 
		
		<h3>Saldo atual R$: <?php echo number_format($info['saldo'], 2, ',', '.'); ?> </h3>
		<!--<a href="sair.php">Sair</a><br/>-->
	    </div>
	<div class="container">
         <div class="col-sm-4"></div>
	     <div class="col-sm-4">   
          <form method="POST">
             
            
            Agencia:<br/>
            <input type="text" name="agencia" pattern="[0-9.,]{1,}" /><br/><br/>
            
            Conta:<br/>
            <input type="text" name="conta" pattern="[0-9.,]{1,}" /><br/><br/>
          
            
            Valor:<br/>
            <input type="text" name="valor" pattern="[0-9.,]{1,}" /><br/><br/>
            
            <!--<input type="submit" value="Adicionar" /> -->
            <button type="submit" class="btn btn-primary">Enviar</button>
            
        </form>
        <?php
            if(isset($_POST['agencia']) && empty($_POST['agencia']) == false){
	    $agencia = addslashes($_POST['agencia']);
	    $conta = addslashes($_POST['conta']);
	    $valor = addslashes($_POST['valor']);
	    
	    
	    $sql = $pdo->prepare("SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta");
	    
	    $sql->bindValue(":agencia", $agencia);
	    $sql->bindValue(":conta", $conta);
	    
	    $sql->execute();
	    
	    if($sql->rowCount() > 0 ){
	        $result = $sql->fetch();
	    }  
	       
	    if($result['id'] !==  $info['id']){
	         if($valor > $info['saldo']){
	                 ?>
	                <div class="alert alert-danger">
                    <strong>Saldo insuficiente!</strong> 
                    </div>
                     <?php
	         }
	        
	        
	    }else{
	       ?>
	       <div class="alert alert-danger">
            <strong>Agencia/Conta inválido!</strong>
            </div>
            <?php
	    }
    }
	    
	    
	
?>
        <hr/>
        </div>
        </div>
	 </body>
</html>