<?php
	
	/* Aula de Referencia: https://www.devmedia.com.br/crud-com-php-mysql-e-ajax-usando-jquery/32197
	
	Aqui será o código referente aos serviços do Objeto Editora*/


	//  Organizador dos passos acessados pelas telas através do GET.
	$passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

	switch ($passo) {
		case 'cadastrar': {cadastrarEditora(); break;}
		case 'alterar': {alterarEditora(); break;}
		case 'excluir': {excluirEditora(); break;}
		case  'listarSelect' : {listarSelectEditora(); break;}
		default: case 'listar': {listarEditora(); break;}
			
	}

	// função responsável pelo cadastro de ator e retorno do aletar de sucesso ou erro.
	function cadastrarEditora(){

		include_once("../Lib/conecta.inc.php");
		$editora = $_POST['cadastroEditora'];
		$sql = "INSERT INTO editora (nomeEditora) VALUES ('$editora')"; 
		$resultado = mysqli_query($con, $sql);
		if($resultado == 1){
			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>Editora "'.$editora.'" cadastrado com sucesso!</strong> </div>';
		}else{
			echo "<div class='alert alert-danger espacoForm'><strong>Cadastro não realizado!</strong> Ocorreu um erro.</div>";
		}

	}

	// função responsável pela alteração do ator e retorno do aletar de sucesso ou erro.
	function alterarEditora(){

		include_once("../Lib/conecta.inc.php");
		$codigoParaAlterar = $_POST['textCodigo'];
		$nomeEdicaoEditora = $_POST['edicaoEditora'];
		$sql = "UPDATE editora SET nomeEditora = '$nomeEdicaoEditora' WHERE codigoEditora = $codigoParaAlterar"; 
		$resultado = mysqli_query($con, $sql);
		if ($resultado == 1){
			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O novo editora "'.$nomeEdicaoEditora.'" editado com sucesso!</strong> </div>';
		}else{
			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";
		}

	}

	// função responsável por transferir todas as relacões do editora->livro para outro Editora->livro e depois exluir o Editora.
	function excluirEditora() {

		include_once("../Lib/conecta.inc.php");
		$nomeParaExcluir = $_POST['textREditora'];
		$codigoParaExcluir = $_POST['textRCodigo'];
		$codigoParaTransferir = $_POST['codigoREditora'];

		$sql = "UPDATE livro SET codigoEditora = '$codigoParaTransferir' WHERE codigoEditora = $codigoParaExcluir"; 
		$resultado = mysqli_query($con, $sql);

		$sql2 = "DELETE FROM editora WHERE codigoEditora = $codigoParaExcluir";

		$resultadoQuery2 = mysqli_query($con, $sql2);
		/* 

		/* 
		Aqui deverá ser alterada todos os objetos da tabela LIVRO que tenham o codigo($codigoParaExcluir) modificando para o codigo($codigoParaTransferir). Depois o sistema devera deletar todos os objetos da tabela Editora que tenha o codigo($codigoParaExcluir).
		*/

		if ($resultadoQuery2 == 1){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O Editora' .$nomeParaExcluir.' excluido com sucesso! (transf: '.$codigoParaTransferir.')</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Exclusão não realizada!</strong> Ocorreu um erro.</div>";

		}


	}

	// função responsavel por listar todos os Editora em formato de tabela junto com os links de editar e excluir.
	function listarEditora(){

		include_once("../Lib/conecta.inc.php");

		$editora = $_GET['editora'];
		$sql = "select * from editora where nomeEditora like '%$editora%' order by codigoEditora";
		$resultado = mysqli_query($con, $sql);
		/* Aqui deverá ser listado todos os objetos da tabela Editora que tenham o nome $Editora, alimentando os dados da tabela.*/

		?>
			<table class="table table-bordered table-striped">
			<thead class="thead-dark">
		    	<tr>
		      		<th>Excluir</th>
		      		<th>Editar</th>
		      		<th>Código</th>
		     		<th>Nome</th>	
		    	</tr>
		  	</thead>

		  	<?php while ( $rows = mysqli_fetch_array($resultado)) {?>

			  	<tr class="leditora">
					<td>

						<!-- os atributos nomeEditora e codigoEditora dos buttons devem ser alimentado com seus respectivos dados para auxilizar nos modais de exclusão e alteração. -->

						<button nomeEditora=<?php echo "'".$rows['nomeEditora']."'"; ?> codigoEditora=<?php echo $rows['codigoEditora']; ?> data-toggle="modal" data-target="#remocaoModal">
							<i class="fa fa-trash-o text-danger" style="font-size: 150%;"></i>
						</button>
					</td>
					<td>
						<button nomeEditora=<?php echo "'".$rows['nomeEditora']."'"; ?> codigoEditora=<?php echo $rows['codigoEditora']; ?> data-toggle="modal" data-target="#edicaoModal">
							<i class="fa fa-pencil-square-o text-primary" style="font-size: 150%;"></i>
						</button>
					</td>
					<td>
						<?php echo $rows['codigoEditora']; ?>		
					</td>
					<td>
						<?php echo $rows['nomeEditora']; ?>
					</td>
				</tr>
			<?php } ?>
		<table>

		<?php	
		
	}


	// função responsável por listar todos as Editoras em formado de seleção por radio .
	function listarSelectEditora(){

		/* Aqui deverá ser listado todos os obetos da tabela Editora que tenham o nome $editora, alimentando os dados dos imputs. No att value deve ser incluido o código do editora*/
		include_once("../Lib/conecta.inc.php");
		$editora = $_GET['editora'];
		$sql = "select * from editora where nomeEditora like '%$editora%'";
		$resultado = mysqli_query($con, $sql);
		if(mysqli_num_rows($resultado) > 0){
		//if($resultado != null){
			while ( $rows = mysqli_fetch_assoc($resultado)) {
				echo "<input type='radio' name='codigoREditora' value= '" . $rows['codigoEditora'] . "' style='margin-left: 2%;'/> <b>" . $rows['nomeEditora'] . "</b><br>";
			}
		}else {
			echo "<div class='alert alert-danger espacoForm'><strong>Editora não encontrado!</strong></div>";
		}

	}


?>
