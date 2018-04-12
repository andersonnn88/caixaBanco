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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Caixa Eletrônico</title>
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Agencia" required="required" name="agencia">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Conta" required="required" name="conta">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Senha" required="required"  name="senha">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Entre</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="#">Create an Account</a></p>
</div>
</body>
</html>                                		                            