<?php
	require 'config.php';
	session_start();
	if(isset($_SESSION['id'])){
//Se ñ estiver sem id de sessão continua na pagina
}else{//Caso contrario, destroi a sessão e redireciona para index.php
	header("Location: Index.php");
	session_destroy();
}

	if (isset($_GET['id']) && empty($_GET['id']) == false){
		$id = addslashes($_GET['id']);
	}

	if (isset($_POST['nome']) && empty($_POST['nome']) == false){
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = md5(addslashes($_POST['senha']));

		$sql = "UPDATE users SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id' ";

		$sql = $pdo->query($sql);
		header("Location: SelectUser.php");
	}

	$sql = "SELECT * FROM users WHERE id = '$id'";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() > 0){
		$dado = $sql->fetch();
	}else{
		header("Location: EditarUser.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Usúario</title>
	<?php include 'index.html' ?>
</head>
<body>
<div class="box">
		<form method="POST">
			<div class="form-group row">
				<label class="col-sm-4" for="nome">Nome:</label>
				<input class="form-control col-sm-8" type="text" name="nome" value="<?php echo $dado['nome']?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-4" for="email">Email:</label>
				<input class="form-control col-sm-8" type="email" name="email" value="<?php echo $dado['email']?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-4" for="senha">Senha:</label>
				<input class="form-control col-sm-8" type="password" name="senha" value="<?php echo $dado['senha']?>">
			</div>
            <button class="btn btn-light"><a href="SelectCliente.php">Cancelar</a></button>
			<button class="btn btn-primary" type="submit">Salvar</button>
		</form>
	</div>
</body>

</html>
	