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

		$assunto = $_POST['cadastroAssunto'];

		/* 
		Aqui será implementado a inclusão do novo Assunto 
		*/	


		if (true){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>Assunto "'.$assunto.'" cadastrado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Cadastro não realizado!</strong> Ocorreu um erro.</div>";

		}

	}

	// função responsável pela alteração do ator 
	function alterarAssunto(){

		/* 
		Aqui será implementado a alteração Assunto na tabela Assunto, pegando apenas como paramétro o nome e código a ser alterado.
		*/

		$codigoParaAlterar = $_POST['textCodigo'];
		$nomeEdicaoAssunto = $_POST['edicaoAssunto'];

		if (true){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O novo Assunto "'.$nomeEdicaoAssunto.'" editado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}

	}

	// função responsável por transferir todas as relacões do Assunto->livro para outro Assunto->livro e depois exluir o Assunto.
	function excluirAssunto() {

		
		$nomeParaExcluir = $_POST['textRAssunto'];
		$codigoParaExcluir = $_POST['textRCodigo'];
		$codigoParaTransferir = $_POST['codigoRAssunto'];

		/* 
		Aqui deverá ser alterada todos os objetos da tabela LIVRO que tenham o codigo($codigoParaExcluir) modificando para o codigo($codigoParaTransferir). Depois o sistema devera deletar todos os objetos da tabela Assunto que tenha o codigo($codigoParaExcluir).
		*/

		if (true){

			echo '<div class="alert alert-success alert-dismissible"> <strong>O Assunto' .$nomeParaExcluir.' excluido com sucesso! (transf: '.$codigoParaTransferir.')</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Exclusão não realizada!</strong> Ocorreu um erro.</div>";

		}


	}

	// função responsavel por listar todos os Assuntos em formato de tabela junto com os links de editar e excluir.
	function listarAssunto(){


		$assunto = $_GET['assunto'];

		/* Aqui deverá ser listado todos os objetos da tabela Assunto que tenham o nome $assunto, alimentando os dados da tabela.*/

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


		  	<tr class="lassunto">
				<td>

					<!-- os atributos nomeAssunto e codigoAssunto dos buttons devem ser alimentado com seus respectivos dados para auxilizar nos modais de exclusão e alteração. -->

					<button nomeAssunto=<?php echo '"...."'; ?> codigoAssunto=<?php echo '"...."'; ?> data-toggle="modal" data-target="#remocaoModal">
						<i class="fa fa-trash-o text-danger" style="font-size: 150%;"></i>
					</button>
				</td>
				<td>
					<button nomeAssunto=<?php echo "'...'"; ?> codigoAssunto=<?php echo "'...'"; ?>data-toggle="modal" data-target="#edicaoModal">
						<i class="fa fa-pencil-square-o text-primary" style="font-size: 150%;"></i>
					</button>
				</td>
				<td>
					<?php echo "...."; ?>		
				</td>
				<td>
					<?php echo "...."; ?>
				</td>
			</tr>
		<table>

		<?php	
		
	}


	// função responsável por listar todos os Assunto em formado de seleção por radio .
	function listarSelectAssunto(){

		/* Aqui deverá ser listado todos os obetos da tabela Assunto que tenham o nome $assunto, alimentando os dados dos imputs. No att value deve ser incluido o código do Assunto*/

		$assunto = $_GET['assunto'];


		if (true){

			echo "<input type='radio' name='codigoRAssunto' value='....' style='margin-left: 2%;'/> <b>".$assunto."</b><br>";
			
		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Assunto não encontrado!</strong></div>";

		}

	}


?>
