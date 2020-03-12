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
		<div class="box-table">
			<table class="table table-striped table-light">
				<thead>
					<tr>
						<th>NOME</th>
						<th>DATA DE NASCIMENTO</th>
						<th>CPF</th>
						<th>RG</th>
						<th>TELEFONE</th>
						<th>AÇÃO</th>
					</tr>
				</thead>
			

				<tbody>
					<?php
						//Query Select
						$sql = "select * from customers";
						//Executa o Select
						$sql = $pdo->query($sql);
						//Verifica se o select retornou
						if ($sql->rowCount() > 0){
							//Cria as linhas e inicializa o array
							foreach ($sql->fetchall() as $customer) {
								echo '<tr>';
									echo '<td>'.$customer['nome'].'</td>';
									echo '<td>'.$customer['dob'].'</td>';
									echo '<td>'.$customer['cpf'].'</td>';
									echo '<td>'.$customer['rg'].'</td>';
									echo '<td>'.$customer['phone'].'</td>';
									echo '<td> <a href="DeleteCliente.php?id='.$customer['id'].'"><font color="red">Excluir</font></a>';
									echo '<a href="EditarCliente.php?id='.$customer['id'].'"><font color="red"> - Alterar</font></a>';
									echo '<a href="InserirAddress.php?id='.$customer['id'].'"><font color="red"> - Adicionar Endereço</font></a>';
									echo '<a href="SelectAddress.php?id='.$customer['id'].'"><font color="red"> - Listar Endereço</font></a></td>';
								echo '</tr>';
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>