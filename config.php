<?php 
try{
		$pdo = new PDO("mysql:dbname=id5262929_testbd;host=localhost", "id5262929_anderson", "251913");
}catch(PDOException $e){
	
	echo "ERRO: ".$e->getMessage();
	exit;
	
}