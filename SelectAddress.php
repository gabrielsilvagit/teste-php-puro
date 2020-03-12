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
$local = "InserirAddress.php?id=$id";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1.0">
		<?php include 'index.html' ?>
	</head>
	<body>
		<a class="new" href="InserirAddress.php?id=<?php echo $id ?>"><font color="red">Adicionar Endereço</font></a> </td>
		<div class="box-table">
			<table class="table table-striped table-light">
				<thead>
					<tr>
						<th>CIDADE</th>
						<th>ESTADO</th>
						<th>PAIS</th>
						<th>CEP</th>
						<th>NUMERO</th>
						<th>RUA</th>
						<th>AÇÕES</th>
					</tr>
				</thead>
			

				<tbody>
					<?php
						//Query Select
						$sql = "SELECT * FROM address WHERE customer_id = '$id'";
						//Executa o Select
						$sql = $pdo->query($sql);
						//Verifica se o select retornou
						if ($sql->rowCount() > 0){
							//Cria as linhas e inicializa o array
							foreach ($sql->fetchall() as $address) {
								echo '<tr>';
									echo '<td>'.$address['city'].'</td>';
									echo '<td>'.$address['state'].'</td>';
									echo '<td>'.$address['country'].'</td>';
									echo '<td>'.$address['cep'].'</td>';
									echo '<td>'.$address['number'].'</td>';
									echo '<td>'.$address['street'].'</td>';
									echo '<td> <a href="DeleteAddress.php?id='.$address['id'].'"><font color="red">Excluir</font></a>';
									echo '<a href="EditarAddress.php?id='.$address['id'].'"><font color="red"> - Alterar</font></a> </td>';
								echo '</tr>';
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>