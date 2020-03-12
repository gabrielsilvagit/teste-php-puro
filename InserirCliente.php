<?php
 require 'config.php';
 session_start();
 		if(isset($_SESSION['id'])){
	//Se ñ estiver sem id de sessão continua na pagina
	 }else{//Caso contrario, destroi a sessão e redireciona para index.php
	 	header("Location: Index.php");
	 	session_destroy();
	 }

 //A função do isset é verificar se as variaveis foram definidas
 //A função empty é verificar se a variavel não esta chegando vazia
 if (isset($_POST['nome']) && empty($_POST['nome']) == false){
 	//Pega os valores e atribui as variaveis
 	$nome = addslashes($_POST['nome']);
 	$dob = addslashes($_POST['dob']);
 	$cpf = addslashes($_POST['cpf']);
 	$rg = addslashes($_POST['rg']);
 	$phone = addslashes($_POST['phone']);
 	

 	//insere os registros no BD
 	$sql = "INSERT INTO customers SET nome = '$nome', dob = '$dob', cpf = '$cpf', rg = '$rg', phone = '$phone'";

 	$sql = $pdo->query($sql); //Executa o insert
 	header("Location: SelectCliente.php");//Apos a execução retorna a pagina
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
				<label class="col-sm-5" for="nome">Nome:</label>
				<input class="form-control col-sm-7" type="text" name="nome">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="dob">Data de nascimento:</label>
				<input class="form-control col-sm-7" type="date" name="dob">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="cpf">CPF:</label>
				<input class="form-control col-sm-7" type="text" name="cpf">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="rg">RG:</label>
				<input class="form-control col-sm-7" type="text" name="rg">
			</div>
			<div class="form-group row">
				<label class="col-sm-5" for="phone">Telefone:</label>
				<input class="form-control col-sm-7" type="text" name="phone">	
			</div>
				<button class="btn btn-primary" type="submit">Salvar</button>
			
		</form>
	</div>
</body>

</html>