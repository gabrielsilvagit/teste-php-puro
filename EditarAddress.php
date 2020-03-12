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

	if (isset($_POST['city']) && empty($_POST['city']) == false){
	$city = addslashes($_POST['city']);
 	$state = addslashes($_POST['state']);
 	$country = addslashes($_POST['country']);
 	$cep = addslashes($_POST['cep']);
 	$number = addslashes($_POST['number']);
 	$street = addslashes($_POST['street']);
 	

 	//insere os registros no BD
 	$sql = "UPDATE address SET city = '$city', state = '$state', country = '$country', cep = '$cep', number = '$number', street = '$street' WHERE id = '$id' ";

    $sql = $pdo->query($sql); //Executa o insert
     
    $sql = "SELECT customer_id FROM address WHERE id = '$id'";
    $sql = $pdo->query($sql);
	$customerId = $sql->fetch();
	$customerId = $customerId['customer_id'];
     header("Location: SelectAddress.php?id=$customerId");//Apos a execução retorna a pagina
	}

	$sql = "SELECT * FROM address WHERE id = '$id'";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() > 0){
		$dado = $sql->fetch();
	}else{
		// header("Location: EditarAddress.php?id='.$id");
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
				<label class="col-sm-5" for="city">Cidade:</label>
				<input class="form-control col-sm-7" type="text" name="city" value="<?php echo $dado['city']?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="state">Estado:</label>
				<input class="form-control col-sm-7" type="text" name="state" value="<?php echo $dado['state']?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="country">Pais:</label>
				<input class="form-control col-sm-7" type="text" name="country" value="<?php echo $dado['country']?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="cep">CEP:</label>
				<input class="form-control col-sm-7" type="text" name="cep" value="<?php echo $dado['cep']?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="number">Número:</label>
				<input class="form-control col-sm-7" type="text" name="number" value="<?php echo $dado['number']?>">	
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="street">Rua:</label>
				<input class="form-control col-sm-7" type="text" name="street" value="<?php echo $dado['street']?>">	
			</div>
            <button class="btn btn-light"><a href="SelectCliente.php">Cancelar</a></button>
			<button class="btn btn-primary" type="submit">Salvar</button>
		</form>
	</div>
</body>
</html>
