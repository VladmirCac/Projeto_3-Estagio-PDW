<?php
	
	/* Aula de Referencia: https://www.devmedia.com.br/crud-com-php-mysql-e-ajax-usando-jquery/32197
	
	Aqui será o código referente aos serviços do Objeto autor*/


	//  Organizador dos passos acessados pelas telas através do GET.
	$passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

	switch ($passo) {
		case 'cadastrar': {cadastrarCategoria(); break;}
		case 'alterar': {alterarCategoria(); break;}
		case 'alterarStatus': {alterarStatus(); break;}
		default: case 'listar': {listarCategoria(); break;}
			
	}

	// função responsável por listar a categoria em formado de tabela.
	function listarCategoria(){


		/* aqui devemos fazer a consulta para buscar todos as categorias e lista-las de acordo com o formato abaixo */

		?>
			<table class="table table-bordered table-striped">
			<thead class="thead-dark">
		    	<tr>
		      		<th>Editar</th>
		      		<th>Add. Descricao</th>
		      		<th>Codigo</th>
		     		<th>Nome</th>
		     		<th>Status</th>	
		    	</tr>
		  	</thead>


		  	<tr class="lcategoria">
				<td>

					<!-- os atributos nomeAutor e codigoAutor dos buttons devem ser alimentado com seus respectivos dados para auxilizar nos modais de exclusão e alteração. -->

					<button  type="button" nomeCategoria=<?php echo '"...."'; ?> codigoCategoria=<?php echo '"...."'; ?> data-toggle="modal" data-target="#editarCategoriaModal">
						<i class="fa fa-pencil-square-o text-primary" style="font-size: 150%;"></i>
					</button>
				</td>
				<td>
					<button type="button" nomeCategoria=<?php echo '"...."'; ?> codigoCategoria=<?php echo '"...."'; ?>data-toggle="modal" data-target="#addDescricaoModal">
						<i class="fa fa-plus text-success" style="font-size: 150%;"></i>
					</button>
				</td>
				<td>
					<?php echo "...."; ?>		
				</td>
				<td>
					<?php echo "...."; ?>
				</td>
				<td>
					<!-- Aqui deverar ser exibido a cor do botão de acordo com o status, lembrando de inclir o codigo da descrição no attr  codigoDescricao  -->

					<?php
						
						if (true) {
							//se o status estuver ativo statusCategoriaDescricao == 1
							echo '<button type="button" codigoCategoria="...." statusDescricao="..."><i class="fa fa-power-off text-success" style="font-size: 150%;"></i></button>';

						}else{
							//se o status estuver ativo statusCategoriaDescricao == 0
							echo '<button type="button" codigoCategoria="...." statusDescricao="..."><i class="fa fa-power-off text-danger" style="font-size: 150%;"></i></button>';

						}


					?>
				</td>
			</tr>
		<table>

	<?php	


	}

	function cadastrarCategoria(){

		
		$nomeCadastroParaIncluir = $_POST['cadastroCategoria'];


		if (true){


			echo "<div class='alert alert-success espacoForm'><strong> Cadastro da categoria ".$nomeCadastroParaIncluir." realizada com sucesso!</strong></div>";

		} else {

			echo "<div class='alert alert-danger espacoForm'><strong> Erro ao tentar cadastrar ".$nomeCadastroParaIncluir."</strong> Ocorreu um erro.</div>";

		}


	}

	function alterarCategoria() {

		$codigoParaAlterar = $_POST['textCodigoCategoria'];
		$nomeEdicaoCategoria = $_POST['textCategoria'];

		if (true){

			echo '<div class="alert alert-success"><strong> A categoria "'.$nomeEdicaoCategoria.'" editado com sucesso!'.$codigoParaAlterar.'</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}


	}

	function alterarStatus() {

		/* Aqui deveremos alternar o status da Categoria, se tiver 1 ficar 0 e se tiver 0 ficar 1 */

		$codigoParaAlterar = $_GET['codigo'];
		$statusAutal = $_GET['status'];

		if (true){

			echo '<div class="alert alert-success"><strong> Status do codigo "'.$codigoParaAlterar.'" alterado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}


	}


?>