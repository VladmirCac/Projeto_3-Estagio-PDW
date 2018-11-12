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

		$autor = $_POST['cadastroAutor'];

		/* 
		Aqui será implementado a inclusão do novo autor na tabela AUTOR, pegando apenas como paramétro o nome, pois o código é auto increment. 
		*/	


		if (true){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>Autor "'.$autor.'" cadastrado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Cadastro não realizado!</strong> Ocorreu um erro.</div>";

		}

	}

	// função responsável pela alteração do ator e retorno do aletar de sucesso ou erro.
	function alterarAutor(){

		/* 
		Aqui será implementado a alteraçãoautor na tabela AUTOR, pegando apenas como paramétro o nome e código a ser alterado.
		*/

		$codigoParaAlterar = $_POST['textCodigo'];
		$nomeEdicaoAutor = $_POST['edicaoAutor'];

		if (true){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O novo autor "'.$nomeEdicaoAutor.'" editado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}

	}

	// função responsável por transferir todas as relacões do autor->livro para outro autor->livro e depois exluir o autor.
	function excluirAutor() {

		
		$nomeParaExcluir = $_POST['textRAutor'];
		$codigoParaExcluir = $_POST['textRCodigo'];
		$codigoParaTransferir = $_POST['codigoRAutor'];

		/* 
		Aqui deverá ser alterada todos os objetos da tabela LIVRO que tenham o codigo($codigoParaExcluir) modificando para o codigo($codigoParaTransferir). Depois o sistema devera deletar todos os objetos da tabela AUTOR que tenha o codigo($codigoParaExcluir).
		*/

		if (true){

			echo '<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<strong>O autor' .$nomeParaExcluir.' excluido com sucesso! (transf: '.$codigoParaTransferir.')</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Exclusão não realizada!</strong> Ocorreu um erro.</div>";

		}


	}

	// função responsavel por listar todos os autores em formato de tabela junto com os links de editar e excluir.
	function listarAutor(){


		$autor = $_GET['autor'];

		/* Aqui deverá ser listado todos os obetos da tabela Autor que tenham o nome $autor, alimentando os dados da tabela.*/

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


		  	<tr class="lautor">
				<td>

					<!-- os atributos nomeAutor e codigoAutor dos buttons devem ser alimentado com seus respectivos dados para auxilizar nos modais de exclusão e alteração. -->

					<button nomeAutor=<?php echo '"...."'; ?> codigoAutor=<?php echo '"...."'; ?> data-toggle="modal" data-target="#remocaoModal">
						<i class="fa fa-trash-o text-danger" style="font-size: 150%;"></i>
					</button>
				</td>
				<td>
					<button nomeAutor=<?php echo "'var nome'"; ?> codigoAutor=<?php echo "'var codigo'"; ?>data-toggle="modal" data-target="#edicaoModal">
						<i class="fa fa-pencil-square-o text-primary" style="font-size: 150%;"></i>
					</button>
				</td>
				<td>
					<?php echo "...."; ?>		
				</td>
				<td>
					<?php echo $autor; ?>
				</td>
			</tr>
		<table>

		<?php	
		
	}


	// função responsável por listar todos os autores em formado de seleção por radio .
	function listarSelectAutor(){

		/* Aqui deverá ser listado todos os obetos da tabela Autor que tenham o nome $autor, alimentando os dados dos imputs.*/

		$autor = $_GET['autor'];


		if (true){

			echo "<input type='radio' name='codigoRAutor' value='....' style='margin-left: 2%;'/> <b>".$autor."</b><br>";	

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Autor não encontrado!</strong></div>";

		}

	}


?>
