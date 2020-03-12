<?php
	require 'config.php';
	session_start();
	if(!isset($_SESSION['id'])){
		//Se ñ estiver sem id de sessão continua na pagina
		 }else{//Caso contrario, destroi a sessão e redireciona para index.php
			 header("Location: home.php");
			 session_destroy();
		 }

	$mgs = "Erro";

	if (isset($_POST['email']) && empty($_POST['email']) == false){
		if(isset($_POST['senha']) && empty($_POST['senha']) == false){
			$email = addslashes($_POST['email']);
			$senha =md5(addslashes($_POST['senha']));

			$sql = $pdo->query("SELECT * FROM users WHERE email = '$email' AND senha = '$senha'");
			if ($sql->rowCount() > 0){
				$dado = $sql->fetch();
				$_SESSION['id'] = $dado['id'];
				$_SESSION['nome'] = $dado['nome'];
				$_SESSION['email'] = $dado['email'];
				$_SESSION['senha'] = $dado['senha'];
				session_start($_SESSION['id']);
				header("Location: home.php");
			}else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
				<script type=\"text/javascript\">
				alert(\"Erro: Usuário ou senha inválidos!\");
				</script>
				";
			}
		}
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
			<div>
				<h1>Login:</h1>	
			</div>
			
			<div class="form-group row">
				<label class="col-sm-4" for="email">Email:</label>
				<input class="form-control col-sm-8" type="email" name="email">
			</div>
			<div class="form-group row">
				<label class="col-sm-4" for="senha">Senha:</label>
				<input class="form-control col-sm-8" type="password" name="senha">
			</div>

			<p><a href="CriarConta.php">Criar Conta</a></p>

			<button class="btn btn-primary" type="submit">Entrar</button>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>