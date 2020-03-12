<?php
 require 'config.php';
 session_start();
 //A função do isset é verificar se as variaveis foram definidas
 //A função empty é verificar se a variavel não esta chegando vazia
 if (isset($_POST['nome']) && empty($_POST['nome']) == false){
 	//Pega os valores e atribui as variaveis
 	$nome = addslashes($_POST['nome']);
 	$email = addslashes($_POST['email']);
 	$senha = md5(addslashes($_POST['senha']));//variavel senha com criptografia md5

 	//insere os registros no BD
 	$sql = "INSERT INTO users SET nome = '$nome', email = '$email', senha = '$senha' ";

 	$sql = $pdo->query($sql); //Executa o insert
 	header("Location: Index.php");//Apos a execução retorna a pagina
 }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Login</title>
	<style>
		.box{
			background: #ddd;
			border-radius: 5px;
			width: 80%;
			max-width:500px;
			padding: 20px;
			padding-right: 40px;
			margin: 20px auto 0;
		}
	</style>
</head>

<body>
<div class="box">
		<form method="POST">
			<div class="form-group row">
				<label class="col-sm-5" for="nome">Nome:</label>
				<input class="form-control col-sm-7" type="text" name="nome">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="email">Email:</label>
				<input class="form-control col-sm-7" type="email" name="email">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="cpf">Senha:</label>
				<input class="form-control col-sm-7" type="password" name="senha">
			</div>
				<button class="btn btn-primary" type="submit">Salvar</button>
			
		</form>
	</div>
</body>

</html>