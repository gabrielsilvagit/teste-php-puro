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
 	$dob = addslashes($_POST['dob']);
 	$cpf = addslashes($_POST['cpf']);
 	$rg = addslashes($_POST['rg']);
 	$phone = addslashes($_POST['phone']);
 	

 	//insere os registros no BD
 	$sql = "UPDATE customers SET nome = '$nome', dob = '$dob', cpf = '$cpf', rg = '$rg', phone = '$phone' where id = '$id'";

 	$sql = $pdo->query($sql); //Executa o insert
 	header("Location: SelectCliente.php");//Apos a execução retorna a pagina
	}

	$sql = "SELECT * FROM customers WHERE id = '$id'";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() > 0){
		$dado = $sql->fetch();
		//$teste = var_dump($dado);//Variavel para pegar o valor do var_dump
		//return $teste;//Retorna o var_dump
	}else{
		header("Location: EditarCliente.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
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
				<input class="form-control col-sm-8" type="text" name="dob" value="<?php echo $dado['dob']?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-4" for="cpf">CPF:</label>
				<input class="form-control col-sm-8" type="text" name="cpf" value="<?php echo $dado['cpf']?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-4" for="rg">RG:</label>
				<input class="form-control col-sm-8" type="text" name="rg" value="<?php echo $dado['rg']?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-4" for="phone">Telefone::</label>
				<input class="form-control col-sm-8" type="text" name="phone" value="<?php echo $dado['phone']?>">
			</div>
            <button class="btn btn-light"><a href="SelectCliente.php">Cancelar</a></button>
			<button class="btn btn-primary" type="submit">Salvar</button>
		</form>
	</div>
</body>

</html>