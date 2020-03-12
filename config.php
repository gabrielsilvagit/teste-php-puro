<?php
	
	// Pega o nome do BD
	$dsn = "mysql:dbname=test";
	// Usuario do BD
	$dbuser = "root";
	//Senha do BD
	$dbpass = "";

	try{
		//Cria um objeto pdo e passa para o construtor as 3 variaveis
		$pdo = new PDO ($dsn, $dbuser,$dbpass);
	}catch (PDOException $e){
		echo "Falha ao conectar";
	}

?>