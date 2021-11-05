<?php 
include_once("conexao.php");

echo'

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  
  ';
if(isset($_GET['tela']))
{
	if($_GET['tela'] == 'funcionario'){
		try
		{
			$sql = $conn->query("select * from funcionario");

			if($sql->rowCount() != 0)
			{
				foreach($sql as $row)
				{
					echo '<tr>';
						echo '<th scope="row">'.$row[0].'</th>';
						echo '<td>'.$row[1].'</td>';
						echo '<td>'.$row[5].'</td>';
						echo '<td>
							<a href="sistema.php?tela=funcionario&txtID='.$row[0].'"><button>...</button></a>
							<a href="funcionario_excluir.php?txtID='.$row[0].'"><button>X</button></a>
						</td>';
					echo '</tr>';
				}
			}else{
				echo 'Funcionário não existe<br>';
			}

		}catch( PDOException $erro ){
			echo $erro->getMessage();
		}
	};
	if($_GET['tela'] == 'categoria'){
		try
		{
			$sql = $conn->query("select * from categoria");

			if($sql->rowCount() != 0)
			{
				foreach($sql as $row)
				{
					echo '<tr>';
						echo '<th scope="row">'.$row[0].'</th>';
						echo '<td>'.$row[1].'</td>';
						echo '<td>'.$row[3].'</td>';
						echo '<td>
							<a href="sistema.php?tela=categoria&txtID='.$row[0].'"><button>...</button></a>
							<a href="categoria_excluir.php?txtID='.$row[0].'"><button>X</button></a>
						</td>';
					echo '</tr>';
				}
			}else{
				echo 'Categoria não existe<br>';
			}

		}catch( PDOException $erro ){
			echo $erro->getMessage();
		}
	};
	if($_GET['tela'] == 'cliente'){
		try
		{
			$sql = $conn->query("select * from cliente");

			if($sql->rowCount() != 0)
			{
				foreach($sql as $row)
				{
					echo '<tr>';
						echo '<th scope="row">'.$row[0].'</th>';
						echo '<td>'.$row[1].'</td>';
						echo '<td>'.$row[3].'</td>';
						echo '<td>
							<a href="sistema.php?tela=cliente&txtID='.$row[0].'"><button>X</button></a>
						</td>';
					echo '</tr>';
				}
			}else{
				echo 'Categoria não existe<br>';
			}

		}catch( PDOException $erro ){
			echo $erro->getMessage();
		}
	}
	if($_GET['tela'] == 'venda'){
		$sql = $conn->query("select * from venda");

			if($sql->rowCount() != 0)
			{
				foreach($sql as $row)
				{
					echo '<tr>';
						echo '<th scope="row">'.$row[0].'</th>';
						echo '<td>'.$row[1].'</td>';
						echo '<td>'.$row[3].'</td>';
						echo '<td>
							<a href="sistema.php?tela=cliente&txtID='.$row[0].'"><button>&#9760;</button></a>
						</td>';
					echo '</tr>';
				}
			}else{
				echo 'Categoria não existe<br>';
			}
	}
	if($_GET['tela'] == 'notaFilme'){
		
	}
	if($_GET['tela'] == 'filmes'){
		try
		{
			$sql = $conn->query("select * from filme");

			if($sql->rowCount() != 0)
			{
				foreach($sql as $row)
				{
					echo '<tr>';
						echo '<th scope="row">'.$row[0].'</th>';
						echo '<td>'.$row[2].'</td>';
						echo '<td>'.$row[9].'</td>';
						echo '<td><td>
							<a href="sistema.php?tela=filmes&txtID='.$row[0].'"><button>...</button></a>
							<a href="filme_excluir.php?txtID='.$row[0].'"><button>X</button></a>
						</td></td>';
					echo '</tr>';
				}
			}else{
				echo 'Filme não existe<br>';
			}

		}catch( PDOException $erro ){
			echo $erro->getMessage();
		}
	};
}

echo
	'
  </tbody>
</table>
	
	';

?>