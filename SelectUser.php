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
					<th>EMAIL</th>
					<th>SENHA</th>
					<th>AÇÃO</th>
				</tr>
			</thead>
		

	<tbody>
		<?php
			//Query Select
			$sql = "select * from users";
			//Executa o Select
			$sql = $pdo->query($sql);
			//Verifica se o select retornou
			if ($sql->rowCount() > 0){
				//Cria as linhas e inicializa o array
				foreach ($sql->fetchall() as $user) {
					echo '<tr>';
						echo '<td>'.$user['nome'].'</td>';
						echo '<td>'.$user['email'].'</td>';
						echo '<td>'.$user['senha'].'</td>';
						echo '<td> <a href="DeleteUser.php?id='.$user['id'].'"><font color="red">Excluir</font></a>';
						echo '<a href="EditarUser.php?id='.$user['id'].'"><font color="red"> - Alterar</font></a></td>';
					echo '</tr>';
				}
			}
		?>
	</tbody>
	</table>
		</div>
	</body>
</html>