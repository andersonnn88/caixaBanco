<?php 
session_start();
require 'config.php';
require 'sessao.php';

	
		
?>
<html> 
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
  
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
		<h3>Bem-vindo: <?php echo $info['titular']; ?> </h3> 
		<!--<a href="sair.php">Sair</a><br/>
		
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
		-->
			<b>Titular:</b>  <?php echo $info['titular']; ?> <br/>
			<b>Agência:</b> <?php echo $info['agencia']; ?> <br/>
			<b>Conta  :</b> <?php echo $info['conta']; ?><br/>
			<h4><b>Saldo</b> <?php echo ' R$: ' . number_format($info['saldo'], 2, ',', '.'); ?></h4><br/></h4>
			
			
		</div>
		</div>
			<hr/>
		<div class="container">
			<h3>Movimentação</h3>
			
			<a href="add-transacao.php">Add Transação</a><br/>
			
		<!--	<div class="col-sm-4"></div>
			    <div class="col-sm-4">
		  -->
			<table class="table table-striped">
			   <thead>
			    <tr>
			        <th>Data</th>
			        <th>Tipor</th>
			        <th>Valor</th>
			    </tr>
			   </thead>
			    <?php
			    $sql = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id_conta ORDER BY data_operacao DESC");
			    $sql->bindValue(":id_conta", $id);
			    
			    $sql->execute();
			    
			    if($sql->rowCount() > 0){
			        foreach($sql->fetchAll() as $item){
			            ?>
			             <tr>
			                     <td><?php echo date('d/m/y H:i', strtotime($item['data_operacao'])); ?></td>
			                     <td>
			                         <?php if($item['tipo'] == '0'): ?>
			                         Deposito
			                         <?php elseif($item['tipo'] == '1'): ?>
			                         Saque
			                         <?php else: ?>
			                         Deposito
			                         <?php endif; ?>
			                     
			                     
			                     </td>
			                <td>
			                    <?php if($item['tipo'] == '0'): ?>
			                    <font color="green">R$ <?php echo $item['valor'] ?></font>
			                    <?php else: ?>
			                    <font color="red">- R$ <?php echo $item['valor'] ?></font>
			                    <?php endif; ?>
			                </td>
			            </tr>
			            <?php
			        }
			    }
			    
			    ?>
			</table>
		
		<!-- </div> -->
		</div>
		
	
	</body>		
</html>