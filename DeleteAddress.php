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
    
    $sql = "SELECT customer_id FROM address WHERE id = '$id'";
    $sql = $pdo->query($sql);
	$customerId = $sql->fetch();
    $customerId = $customerId['customer_id'];

	$sql = "DELETE FROM address WHERE id = '$id'";
	//Executa a query
	$sql = $pdo->query($sql);

     header("Location: SelectAddress.php?id=$customerId");//Apos a execução retorna a pagina
}else{
	header("Location:SelectCliente.php");
}
?>