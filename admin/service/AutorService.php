<?php

	/* Aula de Referencia: https://www.devmedia.com.br/crud-com-php-mysql-e-ajax-usando-jquery/32197
	
	Aqui será o código referente aos serviços do Objeto autor*/


	//  Organizador dos passos acessados pelas telas através do GET.
	$passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

	switch ($passo) {
		case 'cadastrar': {cadastrarAutor(); break;}
		case 'alterar': {alterarAutor(); break;}
		case 'excluir': {excluirAutor(); break;}
		case  'listarSelect' : {listarSelectAutor(); break;}
		default: case 'listar': {listarAutor(); break;}
			
	}

	// função responsável pelo cadastro de ator e retorno do aletar de sucesso ou erro.
	function cadastrarAutor(){

		include_once("../Lib/conecta.inc.php");
		$autor = $_POST['cadastroAutor'];
		$sql = "INSERT INTO autor (nomeAutor) VALUES ('$autor')"; 
		$resultado = mysqli_query($con, $sql);
		if($resultado == 1){
			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>Autor "'.$autor.'" cadastrado com sucesso!</strong> </div>';
		}else{
			echo "<div class='alert alert-danger espacoForm'><strong>Cadastro não realizado!</strong> Ocorreu um erro.</div>";
		}

		mysqli_close($con);
	}

	// função responsável pela alteração do ator e retorno do aletar de sucesso ou erro.
	function alterarAutor(){

		include_once("../Lib/conecta.inc.php");
		$codigoParaAlterar = $_POST['textCodigo'];
		$nomeEdicaoAutor = $_POST['edicaoAutor'];
		$sql = "UPDATE autor SET nomeAutor = '$nomeEdicaoAutor' WHERE codigoAutor = $codigoParaAlterar"; 
		$resultado = mysqli_query($con, $sql);
		if ($resultado == 1){
			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O novo autor "'.$nomeEdicaoAutor.'" editado com sucesso!</strong> </div>';
		}else{
			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";
		}
		mysqli_close($con);
	}

	// função responsável por transferir todas as relacões do autor->livro para outro autor->livro e depois exluir o autor.
	function excluirAutor() {

		include_once("../Lib/conecta.inc.php");
		$nomeParaExcluir = $_POST['textRAutor'];
		$codigoParaExcluir = $_POST['textRCodigo'];
		$codigoParaTransferir = $_POST['codigoRAutor'];
		
		$sql = "UPDATE livro SET codigoAutor = '$codigoParaTransferir' WHERE codigoAutor = $codigoParaExcluir"; 
		$resultado = mysqli_query($con, $sql);

		$sql2 = "DELETE FROM autor WHERE codigoAutor = $codigoParaExcluir";
	
		$resultadoQuery2 = mysqli_query($con, $sql2);

		if ($resultadoQuery2 == 1){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O autor' .$nomeParaExcluir.' excluido com sucesso! (transf: '.$codigoParaTransferir.')</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Exclusão não realizada!</strong> Ocorreu um erro.</div>";

		}

		mysqli_close($con);
	}

	// função responsavel por listar todos os autores em formato de tabela junto com os links de editar e excluir.
	function listarAutor(){

		include_once("../Lib/conecta.inc.php");

		$autor = $_GET['autor'];
		$sql = "select * from autor where nomeAutor like '%$autor%' order by codigoAutor";
		$resultado = mysqli_query($con, $sql);

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

			  	<tr class="lautor">
					<td>

						<!-- os atributos nomeAutor e codigoAutor dos buttons devem ser alimentado com seus respectivos dados para auxilizar nos modais de exclusão e alteração. -->

						<button nomeAutor=<?php echo "'".$rows['nomeAutor']."'"; ?> codigoAutor=<?php echo $rows['codigoAutor']; ?> data-toggle="modal" data-target="#remocaoModal">
							<i class="fa fa-trash-o text-danger" style="font-size: 150%;"></i>
						</button>
					</td>
					<td>
						<button nomeAutor=<?php echo "'".$rows['nomeAutor']."'"; ?> codigoAutor=<?php echo $rows['codigoAutor']; ?> data-toggle="modal" data-target="#edicaoModal">
							<i class="fa fa-pencil-square-o text-primary" style="font-size: 150%;"></i>
						</button>
					</td>
					<td>
						<?php echo $rows['codigoAutor']; ?>		
					</td>
					<td>
						<?php echo $rows['nomeAutor']; ?>
					</td>
				</tr>
			<?php } ?>
		<table>

		<?php	
		mysqli_close($con);
	}


	// função responsável por listar todos os autores em formado de seleção por radio .
	function listarSelectAutor(){

		include_once("../Lib/conecta.inc.php");
		$autor = $_GET['autor'];
		$sql = "select * from autor where nomeAutor like '%$autor%'";
		$resultado = mysqli_query($con, $sql);
		if(mysqli_num_rows($resultado) > 0){
		//if($resultado != null){
			while ( $rows = mysqli_fetch_assoc($resultado)) {
				echo "<input type='radio' name='codigoRAutor' value= '" . $rows['codigoAutor'] . "' style='margin-left: 2%;'/> <b>" . $rows['nomeAutor'] . "</b><br>";
			}
		}else {
			echo "<div class='alert alert-danger espacoForm'><strong>Autor não encontrado!</strong></div>";
		}
		mysqli_close($con);
	}


?>
