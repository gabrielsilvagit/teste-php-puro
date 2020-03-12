
<?php
require 'config.php';
session_start();
if(isset($_SESSION['id'])){
//Se ñ estiver sem id de sessão continua na pagina
}else{//Caso contrario, destroi a sessão e redireciona para index.php
header("Location: Index.php");
session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1.0">
		<?php include 'index.html' ?>
	</head>
	<body>
	<div class="box">
		<h1 class="welcome">Bem vindo!</h1>
	</div>
	</body>
</html>