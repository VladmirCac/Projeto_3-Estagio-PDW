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

		$editora = $_POST['cadastroEditora'];

		/* 
		Aqui será implementado a inclusão do novo Editora na tabela Editora, pegando apenas como paramétro o nome, pois o código é auto increment. 
		*/	


		if (true){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>Editora "'.$editora.'" cadastrado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Cadastro não realizado!</strong> Ocorreu um erro.</div>";

		}

	}

	// função responsável pela alteração do ator e retorno do aletar de sucesso ou erro.
	function alterarEditora(){

		/* 
		Aqui será implementado a alteração Editora na tabela Editora, pegando apenas como paramétro o nome e código a ser alterado.
		*/

		$codigoParaAlterar = $_POST['textCodigo'];
		$nomeEdicaoEditora = $_POST['edicaoEditora'];

		if (true){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O novo editora "'.$nomeEdicaoEditora.'" editado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}

	}

	// função responsável por transferir todas as relacões do editora->livro para outro Editora->livro e depois exluir o Editora.
	function excluirEditora() {

		
		$nomeParaExcluir = $_POST['textREditora'];
		$codigoParaExcluir = $_POST['textRCodigo'];
		$codigoParaTransferir = $_POST['codigoREditora'];

		/* 
		Aqui deverá ser alterada todos os objetos da tabela LIVRO que tenham o codigo($codigoParaExcluir) modificando para o codigo($codigoParaTransferir). Depois o sistema devera deletar todos os objetos da tabela Editora que tenha o codigo($codigoParaExcluir).
		*/

		if (true){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O Editora' .$nomeParaExcluir.' excluido com sucesso! (transf: '.$codigoParaTransferir.')</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Exclusão não realizada!</strong> Ocorreu um erro.</div>";

		}


	}

	// função responsavel por listar todos os Editora em formato de tabela junto com os links de editar e excluir.
	function listarEditora(){


		$editora = $_GET['editora'];

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


		  	<tr class="leditora">
				<td>

					<!-- os atributos nomeEditora e codigoEditora dos buttons devem ser alimentado com seus respectivos dados para auxilizar nos modais de exclusão e alteração. -->

					<button nomeEditora=<?php echo '"...."'; ?> codigoEditora=<?php echo '"...."'; ?> data-toggle="modal" data-target="#remocaoModal">
						<i class="fa fa-trash-o text-danger" style="font-size: 150%;"></i>
					</button>
				</td>
				<td>
					<button nomeEditora=<?php echo "'var nome'"; ?> codigoEditora=<?php echo "'var codigo'"; ?>data-toggle="modal" data-target="#edicaoModal">
						<i class="fa fa-pencil-square-o text-primary" style="font-size: 150%;"></i>
					</button>
				</td>
				<td>
					<?php echo "...."; ?>		
				</td>
				<td>
					<?php echo $editora; ?>
				</td>
			</tr>
		<table>

		<?php	
		
	}


	// função responsável por listar todos as Editoras em formado de seleção por radio .
	function listarSelectEditora(){

		/* Aqui deverá ser listado todos os obetos da tabela Editora que tenham o nome $editora, alimentando os dados dos imputs. No att value deve ser incluido o código do editora*/

		$editora = $_GET['editora'];


		if (true){

			echo "<input type='radio' name='codigoREditora' value='....' style='margin-left: 2%;'/> <b>".$editora."</b><br>";
			
		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Editora não encontrado!</strong></div>";

		}

	}


?>
