<?php
require 'config.php';
session_start();
if(isset($_SESSION['id'])){
//Se ñ estiver sem id de sessão continua na pagina
}else{//Caso contrario, destroi a sessão e redireciona para index.php
header("Location: Index.php");
session_destroy();
}
//Verifica se existe a variavel e se não esta vazia
if (isset($_GET['id']) && empty($_GET['id']) == false) {
	//Recebe o valor da variavel
	$id = addslashes($_GET['id']);
	//Querypara deletar um registro
	$sql = "DELETE FROM customers WHERE id = '$id'";
	//Executa a query
	$sql = $pdo->query($sql);
	//Volta para
	header("Location:SelectCliente.php");
}else{
	header("Location:SelectCliente.php");
}
?>