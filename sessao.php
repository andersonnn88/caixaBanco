<?php
if(isset($_SESSION['banco']) && empty($_SESSION['banco']) == false){
		$id = $_SESSION['banco']; 
		
		$sql = $pdo->prepare("SELECT * FROM  contas WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$info = $sql->fetch();	
		}else {
			header("Location: login.php");
			exit;
		}
		
	}else {
		header("Location: login.php");
		exit;
	}
	
?>