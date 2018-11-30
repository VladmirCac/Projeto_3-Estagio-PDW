<?php
	


	//  Organizador dos passos acessados pelas telas através do GET.
	$passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

	switch ($passo) {
		case 'cadastrar': {cadastrarAssunto(); break;}
		case 'alterar': {alterarAssunto(); break;}
		case 'excluir': {excluirAssunto(); break;}
		case  'listarSelect' : {listarSelectAssunto(); break;}
		default: case 'listar': {listarAssunto(); break;}
			
	}

	// função responsável pelo cadastro de ator 
	function cadastrarAssunto(){

		include_once("../Lib/conecta.inc.php");
		$assunto = $_POST['cadastroAssunto'];
		$sql = "INSERT INTO assunto (nomeAssunto) VALUES ('$assunto')"; 
		$resultado = mysqli_query($con, $sql);

		if ($resultado==1){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>Assunto "'.$assunto.'" cadastrado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Cadastro não realizado!</strong> Ocorreu um erro.</div>";

		}

	}

	// função responsável pela alteração do ator 
	function alterarAssunto(){

		include_once("../Lib/conecta.inc.php");
		$codigoParaAlterar = $_POST['textCodigo'];
		$nomeEdicaoAssunto = $_POST['edicaoAssunto'];
		$sql = "UPDATE assunto SET nomeAssunto = '$nomeEdicaoAssunto' WHERE codigoAssunto = $codigoParaAlterar"; 
		$resultado = mysqli_query($con, $sql);
		if ($resultado==1){
			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O novo Assunto "'.$nomeEdicaoAssunto.'" editado com sucesso!</strong> </div>';
		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}

	}

	// função responsável por transferir todas as relacões do Assunto->livro para outro Assunto->livro e depois exluir o Assunto.
	function excluirAssunto() {

		include_once("../Lib/conecta.inc.php");
		$nomeParaExcluir = $_POST['textRAssunto'];
		$codigoParaExcluir = $_POST['textRCodigo'];
		$codigoParaTransferir = $_POST['codigoRAssunto'];
		$sql = "UPDATE livro SET codigoAssunto = '$codigoParaTransferir' WHERE codigoAssunto = $codigoParaExcluir"; 
		$resultado = mysqli_query($con, $sql);

		$sql2 = "DELETE FROM assunto WHERE codigoAssunto = $codigoParaExcluir";
	
		$resultadoQuery2 = mysqli_query($con, $sql2);

		if ($resultadoQuery2 == 1){
			echo '<div class="alert alert-success alert-dismissible"> <strong>O Assunto' .$nomeParaExcluir.' excluido com sucesso! (transf: '.$codigoParaTransferir.')</strong> </div>';
		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Exclusão não realizada!</strong> Ocorreu um erro.</div>";

		}


	}

	// função responsavel por listar todos os Assuntos em formato de tabela junto com os links de editar e excluir.
	function listarAssunto(){

		include_once("../Lib/conecta.inc.php");

		$assunto = $_GET['assunto'];
		$sql = "select * from assunto where nomeAssunto like '%$assunto%' order by codigoAssunto";
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

			  	<tr class="lassunto">
					<td>
						<button nomeAssunto=<?php echo "'".$rows['nomeAssunto']."'"; ?> codigoAssunto=<?php echo $rows['codigoAssunto']; ?> data-toggle="modal" data-target="#remocaoModal">
							<i class="fa fa-trash-o text-danger" style="font-size: 150%;"></i>
						</button>
					</td>
					<td>
						<button nomeAssunto=<?php echo "'".$rows['nomeAssunto']."'"; ?> codigoAssunto=<?php echo $rows['codigoAssunto']; ?> data-toggle="modal" data-target="#edicaoModal">
							<i class="fa fa-pencil-square-o text-primary" style="font-size: 150%;"></i>
						</button>
					</td>
					<td>
						<?php echo $rows['codigoAssunto']; ?>		
					</td>
					<td>
						<?php echo $rows['nomeAssunto']; ?>
					</td>
				</tr>
			<?php } ?>
		<table>

		<?php	
		
	}


	// função responsável por listar todos os Assunto em formado de seleção por radio .
	function listarSelectAssunto(){

		include_once("../Lib/conecta.inc.php");
		$assunto = $_GET['assunto'];
		$sql = "select * from assunto where nomeAssunto like '%$assunto%'";
		$resultado = mysqli_query($con, $sql);
		if(mysqli_num_rows($resultado) > 0){
		//if($resultado != null) {
			while ( $rows = mysqli_fetch_assoc($resultado)) {
				echo "<input type='radio' name='codigoRAssunto' value= '" . $rows['codigoAssunto'] . "' style='margin-left: 2%;'/> <b>" . $rows['nomeAssunto'] . "</b><br>";
			}
		}else {
			echo "<div class='alert alert-danger espacoForm'><strong>Assunto não encontrado!</strong></div>";
		}	
	}


?>
