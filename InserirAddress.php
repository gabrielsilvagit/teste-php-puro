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

 //A função do isset é verificar se as variaveis foram definidas
 //A função empty é verificar se a variavel não esta chegando vazia
 if (isset($_POST['city']) && empty($_POST['city']) == false){
 	//Pega os valores e atribui as variaveis
 	$customer_id = addslashes($id);
 	$city = addslashes($_POST['city']);
 	$state = addslashes($_POST['state']);
 	$country = addslashes($_POST['country']);
 	$cep = addslashes($_POST['cep']);
 	$number = addslashes($_POST['number']);
 	$street = addslashes($_POST['street']);
 	

 	//insere os registros no BD
 	$sql = "INSERT INTO address SET customer_id = '$id', city = '$city', state = '$state', country = '$country', cep = '$cep', number = '$number', street = '$street'";

 	$sql = $pdo->query($sql); //Executa o insert
     header("Location: SelectAddress.php?id=$id");//Apos a execução retorna a pagina
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
				<input class="form-control col-sm-7" type="text" name="city">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="state">Estado:</label>
				<input class="form-control col-sm-7" type="text" name="state">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="country">Pais:</label>
				<input class="form-control col-sm-7" type="text" name="country">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="cep">CEP:</label>
				<input class="form-control col-sm-7" type="text" name="cep">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="number">Número:</label>
				<input class="form-control col-sm-7" type="text" name="number">	
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="street">Rua:</label>
				<input class="form-control col-sm-7" type="text" name="street">	
			</div>
				<button class="btn btn-primary" type="submit">Salvar</button>
			
		</form>
	</div>
</body>

</html>