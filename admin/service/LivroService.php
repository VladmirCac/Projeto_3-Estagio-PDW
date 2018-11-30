<?php

	/* Aula de Referencia: https://www.devmedia.com.br/crud-com-php-mysql-e-ajax-usando-jquery/32197
	
	Aqui será o código referente aos serviços do Objeto autor*/


	//  Organizador dos passos acessados pelas telas através do GET.
	$passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

	switch ($passo) {
		case 'cadastrar': {cadastrarLivro(); break;}
		case 'alterar': {alterarLivro(); break;}
		case 'selectLivro' : {selectLivro(); break;}
		case 'selecAlterarLivro' : {selectAlterarLivro(); break;}
		default: case 'listarBusca': {listarLivro(); break;}

	}

	
	function cadastrarLivro(){


		if (isset($_POST['codigoRAutor']) && isset($_POST['codigoREditora']) && isset($_POST['codigoRAssunto']))
		{	

		include_once("../Lib/conecta.inc.php");
		$isbn = $_POST['isbn'];
		$titulo = $_POST['titulo'];
		$codigoAutor = $_POST['codigoRAutor'];
		$codigoEditora = $_POST['codigoREditora'];
		$codigoAssunto = $_POST['codigoRAssunto'];
		$idioma = $_POST['idioma'];
		$ano = $_POST['ano'];
		$edicao = $_POST['edicao'];
		$preco = $_POST['preco'];
		$condicao = $_POST['condicao'];
		$paginas = $_POST['paginas'];
		$peso = $_POST['peso'];
		$colecao = $_POST['colecao'];
		$traducao = $_POST['traducao'];
		$ilustracao = $_POST['ilustraca'];
		$dimensao = $_POST['dimensao'];
		$acabamento = $_POST['acabamento'];
		$sinopse = str_replace("'", "", $_POST['sinopse']);



		$sql = "INSERT INTO livro (isbn, tituloLivro, codigoAutor, codigoEditora, codigoAssunto, idiomaLivro, anoLivro, edicaoLivro, precoLivro, condicaoLivro, paginasLivro, pesoLivro, colecaoLivro, traducaoLivro, ilustracaoLivro, dimensaoLivro, acabamentoLivro, sinopseLivro) VALUES (COALESCE('$isbn', null), '$titulo', $codigoAutor, $codigoEditora, $codigoAssunto, '$idioma', '$ano', COALESCE('$edicao', null), $preco, '$condicao', COALESCE('$paginas', null), COALESCE('$peso', null), COALESCE('$colecao', null), COALESCE('$traducao', null), COALESCE('$ilustracao', null), COALESCE('$dimensao', null), COALESCE('$acabamento', null), COALESCE('$sinopse', null) )"; 
		$resultado = mysqli_query($con, $sql);



		if ($resultado == 1){
			// $codido é o codigo do auto incremet que acabou de ser implementado.
			$codigo = $con->insert_id;
?>		
			<div class="modal-header">
				<h4 class="text-success">Cadastro realizado com sucesso!</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body bg-success">
				<h5 class="modal-title text-light">
<?php

					echo 'Titulo= '.$titulo.'</br>'
					.'Codigo=  '.$codigo.'</br';
?>
				</h5>
			</div>
			
			<div class="modal-footer">
				<button type="button" id="btdAddOutroLivro" class="btn btn-primary">Adicionar outro Livro</button>
				<button type="button" id="btdAddLivroDescrito" codigoLivro=<?php echo "'".$codigo."'"; ?> precoLivro=<?php echo "'".$preco."'"; ?> class="btn btn-warning">Adicionar Livro Descrito</button>
			</div>

<?php  


		}else{

?>		
			<div class="modal-header">
				
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body bg-danger">
				<h4 class="modal-title text-light">Não foi possível cadastrar o livro!<?php echo mysqli_error($con); ?></h4>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
			</div>

<?php 

		}
	}else{
?>
			<div class="modal-header">
				
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body bg-danger">
				<h4 class="modal-title text-light">Não foi possível cadastrar o livro! É necessário selecionar autor, editora e assunto! </h4>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
			</div>

<?php

	}

	}

	//FUNÇÃO RESPONSÁVEL POR ALTERAR OS DADOS DO LIVRO
	function selectAlterarLivro(){

		include_once("../Lib/conecta.inc.php");
		$codigo = $_GET['codigo'];
		$sql = "select * from livro l 
				join autor a on (a.codigoAutor = l.codigoAutor)
				join editora e on (e.codigoEditora = l.codigoEditora)
				join assunto ass on (ass.codigoAssunto = l.codigoAssunto)
				where l.codigoLivro = $codigo";
		$resultado = mysqli_query($con, $sql);
		

		//DEVERÁ BUSCAR O LIVRO POR CÓDIGO E INCLUIR OS ELEMENTOS NO FORMUÁRIO ABAIXO.
?>
<?php 
		while ( $rows = mysqli_fetch_array($resultado)) { 
?>
			<form id="altLivro" action="service/LivroService.php?passo=alterar" method="post">
				
				<div class="form-row align-items-center espacoForm">
					<label for="inputCodigo" class="col-sm-2 col-form-label">Codigo:</label>
					<div class="col-sm-2">
						<!-- CODIGO --> 
						<input type="text" class="form-control" id="inputCodigo" name="codigo" readonly="true" value=<?php echo $codigo; ?>>
					</div>
				</div>

				<div class="form-row align-items-center espacoForm">
					<label for="inputIsbn" class="col-sm-2 col-form-label">ISBN:</label>
					<div class="col-sm-2">
						<!-- ISBN --> 
						<input type="text" class="form-control" id="inputIsbn" name="isbn" value=<?php echo "'".$rows['isbn']."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputTitulo" class="col-sm-2 col-form-label">Titulo:</label>
					<div class="col-sm-8">
						<!-- TITULO --> 
						<input type="text" class="form-control" id="inputTitulo" name="titulo"  required value=<?php echo "'".$rows['tituloLivro']."'"; ?>>
					</div>
				</div>

				<div class="form-row align-items-center espacoForm">
					<label for="inputAutor" class="col-sm-2 col-form-label">Autor:</label>
					<div class="col-sm-6">
						<!-- AUTOR --> 
						<input type="text" class="form-control" id="inputAutor"  required name="autor" value=<?php echo "'".$rows['nomeAutor']."'"; ?>>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" onclick="getListaSelectAutor();">
							<i class="fa fa-search-plus"></i>
							Consultar
						</button>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary">
							<i class="fa fa-plus"></i>
							Cadastra
						</button>
					</div>
				</div>

				<div id="resultadoSelectAutor" class="spaco-select"></div>

				<div class="form-row align-items-center espacoForm">
					<label for="inputEditora" class="col-sm-2 col-form-label">Editora:</label>
					<div class="col-sm-6">
						<!-- EDITORA --> 
						<input type="text" class="form-control" id="inputEditora" name="editora" required value=<?php echo "'".$rows['nomeEditora']."'"; ?>>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" onclick="getListaSelectEditora();">
							<i class="fa fa-search-plus"></i>
							Consultar
						</button>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary">
							<i class="fa fa-plus"></i>
							Cadastra
						</button>
					</div>
				</div>

				<div id="resultadoSelectEditora" class="spaco-select"></div>

				<div class="form-row align-items-center espacoForm">
					<label for="inputAssunto" class="col-sm-2 col-form-label">Assunto:</label>
					<div class="col-sm-6">
						<!-- ASSUNTO --> 
						<input type="text" class="form-control" id="inputAssunto" name="assunto" required value=<?php echo "'".$rows['nomeAssunto']."'"; ?>>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" onclick="getListaSelectAssunto();">
							<i class="fa fa-search-plus"></i>
							Consultar
						</button>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary">
							<i class="fa fa-plus"></i>
							Cadastra
						</button>
					</div>
				</div>

				<div id="resultadoSelectAssunto" class="spaco-select"></div>

				<div class="form-row align-items-center espacoForm">
					<label for="inputIdioma" class="col-sm-2 col-form-label">Idioma:</label>
					<div class="col-sm-6">
						<!-- IDIOMA --> 
						<input type="text" class="form-control" id="inputIdioma" name="idioma"  required value=<?php echo "'".$rows['idiomaLivro']."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputAno" class="col-sm-2 col-form-label">Ano de Publicação:</label>
					<div class="col-sm-1">
						<!-- ANO --> 
						<input type="text" class="form-control" id="inputAno" name="ano" required value=<?php echo $rows['anoLivro']; ?>>
					</div>
					<label for="inputEdicao" class="col-sm-1 col-form-label">Edição:</label>
					<div class="col-sm-1">
						<!-- EDICAO --> 
						<input type="text" class="form-control" id="inputEdicao" name="edicao" value=<?php echo $rows['edicaoLivro']; ?>>
					</div>
				</div>	
				<div class="form-row align-items-center espacoForm">
					<!-- PRECO --> 
					<label for="inputPreco" class="col-sm-2 col-form-label">Preço:</label>
					<div class="col-sm-1">
						<!-- PRECO --> 
						<input type="text" class="form-control" id="inputPreco" name="preco" readonly="true" value=<?php echo $rows['precoLivro']; ?>>
					</div>
					<button type="button" class="btn btn-primary">Alterar Preço</button>

				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputIdioma" class="col-sm-2 col-form-label">Condição:</label>
					<div class="col-sm-3">
						<!-- CIDGO --> 
						<select id="inputCondicao" class="form-control" name="condicao" required value=<?php echo $rows['condicaoLivro']; ?>>
							<option value="Usado">Usado</option>
							<option value="Novo">Novo</option>
						</select>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputPaginas" class="col-sm-2 col-form-label">Qtd. Páginas:</label>
					<div class="col-sm-3">
						<!-- QTD PÁGINAS --> 
						<input type="text" class="form-control" id="inputPaginas" name="paginas" value=<?php echo $rows['paginasLivro']; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputPeso" class="col-sm-2 col-form-label">Peso (g):</label>
					<div class="col-sm-3">
						<!-- PESO--> 
						<input type="text" class="form-control" id="inputPeso" name="peso" value=<?php echo $rows['pesoLivro']; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputColecao" class="col-sm-2 col-form-label">Coleção:</label>
					<div class="col-sm-5">
						<!-- COLEÇÃO --> 
						<input type="text" class="form-control" id="inputColecao" name="colecao" value=<?php echo "'".$rows['colecaoLivro']."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputTraducao" class="col-sm-2 col-form-label">Tradução:</label>
					<div class="col-sm-5">
						<!-- TRADUCAO --> 
						<input type="text" class="form-control" id="inputTraducao" name="traducao" value=<?php echo "'".$rows['traducaoLivro']."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputIlustracao" class="col-sm-2 col-form-label">Ilustracao:</label>
					<div class="col-sm-5">
						<!-- ILUSTRAÇÃO --> 
						<input type="text" class="form-control" id="inputIlustracao" name="ilustraca" value=<?php echo "'".$rows['ilustracaoLivro']."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputDimensao" class="col-sm-2 col-form-label">Dimensões:</label>
					<div class="col-sm-5">
						<!-- DIMENSÃO --> 
						<input type="text" class="form-control" id="inputdimensao" name="dimensao" value=<?php echo "'".$rows['dimensaoLivro']."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputAcabamento" class="col-sm-2 col-form-label">Acabamento:</label>
					<div class="col-sm-5">
						<!-- ACABAMENTO --> 
						<select id="inputAcabamento" class="form-control" name="acabamento" required value=<?php echo $rows['acabamentoLivro']; ?>>
							<option value="Capa Comu,">Capa Comum</option>
							<option value="Capa Dura">Capa Dura</option>
							<option value="Livro de Bolso">Livro de Bolso</option>
						</select>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputSinopse" class="col-sm-2 col-form-label">Sinopse:</label>
					<div class="col-sm-7">
						<!-- SINOPSE --> 
						<textarea class="form-control" id="inputSinopse" name="sinopse" rows="3"><?php echo $rows['sinopseLivro']; ?></textarea>
					</div>
				</div>
				<div style="margin:1%">
					<button type="submit" class="btn btn-success btn-lg espacoForm" >
						<i class="fa fa-floppy-o"></i>
						Salvar
					</button> 
				</div>
			</form>
<?php
		}	
?>
<?php
	
	}


	function listarLivro(){

		include_once("../Lib/conecta.inc.php");
		$textoDeBusca = $_POST['busca'];
		$tipoBusca = $_POST['tipoBusca'];		
		$sql = "select l.codigoLivro as codigo, l.tituloLivro as titulo, a.nomeAutor as autor, e.nomeEditora as editora, ass.nomeAssunto as assunto, l.anoLivro as ano, coalesce(qt.qtd, 0) as qtd, l.precoLivro as preco from livro as l join autor as a on l.codigoAutor = a.codigoAutor join editora as e on l.codigoEditora = e.codigoEditora join assunto as ass on l.codigoAssunto = ass.codigoAssunto left join (select sum(qtdLivro) as qtd, codigoLivro from livro_descrito group by livro_descrito.codigoLivro) as qt on l.codigoLivro = qt.codigoLivro where l.tituloLivro like '%$textoDeBusca%' order by l.tituloLivro;";
		$resultado = mysqli_query($con, $sql);

		// AQUI DEVERÁ BUSCAR TODOS OS OBJETOS DA TABELA LIVRO PASSANDO COMO PARAMENTO O TEXTO DA BUSCA E O TIPO DA BUSCA.

		if ($resultado != null) {

?>
			<table class="table table-bordered table-striped">
				<thead class="thead-dark">
					<tr>
						<th>Ações</th>
						<th>Código</th>
						<th>Titulo</th>
						<th>Autor</th>
						<th>Editora</th>
						<th>Assunto</th>
						<th>Ano</th>
						<th>Qtd</th>
						<th>Valor</th>
					</tr>
				</thead>

				<?php while ( $rows = mysqli_fetch_array($resultado)) {?>

<?php

   // AQUI DEVERÁ INICIAR O ARRAY EXIBINDO TODOS OS LIVROS LISTADOS INCLUINDO OS ELEMENTOS NA TABELA.

?>				
					<tr class="lBuscaLivros">
						<td>
							<!-- EDITAR -->
							<button codigoLivro=<?php echo $rows['codigo']; ?> data-toggle="modal" data-target="#alterarLivroModal">
								<i class="fa fa-pencil-square-o text-primary" style="font-size: 100%;"></i>
							</button>
							<!-- ADICIONAR -->
							<button codigoLivro=<?php echo $rows['codigo']; ?> precoLivro=<?php echo $rows['preco']; ?> class="btdAddLivroDescrito">
								<i class="fa fa-plus text-success" style="font-size: 100%;"></i>
							</button>
							<!-- VIZUALIZAR -->
							<button codigoLivro=<?php echo $rows['codigo']; ?> data-toggle="modal" data-target="">
								<i class="fa fa-eye text-warning" style="font-size: 100%;"></i>
							</button>		
						</td>
						<td>
							<!-- CODIGO -->
							<?php echo $rows['codigo']; ?>
						</td>
						<td>
							<!-- TITULO -->
							<?php echo $rows['titulo']; ?>
						</td>
						<td>
							<!-- AUTOR -->
							<?php echo $rows['autor']; ?>
						</td>
						<td>
							<!-- EDITORA -->
							<?php echo $rows['editora']; ?>
						</td>
						<td>
							<!-- ASSUNTO -->
							<?php echo $rows['assunto']; ?>
						</td>
						<td>
							<!-- ANO -->
							<?php echo $rows['ano']; ?>
						</td>
						<td>
							<?php echo $rows['qtd']; ?>
						</td>
						<td>
							<!-- VALOR -->
							<?php echo $rows['preco']; ?>
						</td>					
					</tr>
					<tr class="table-light table-sm" style="font-size: 12px;">
<?php
					if ($rows['qtd'] > 0){
?>						
						<td colspan="9" class="text">
							<input type='checkbox' class="exibirDescritos" codigoLivro=<?php echo $rows['codigo']; ?>> <b>Exibir Descritos</b>
							<div id=<?php echo $rows['codigo']; ?>></div> <!--Que ID é esse? -->
						</td>
<?php
					} else 	{
?>					
						<td colspan="9" class="text-danger">
							Indisponível
						</td>


<?php
					}
?>
					</tr>
				<?php } ?>

<?php


?>
			<table>
<?php	

		} else {

			echo "<div class='alert alert-danger espacoForm'><strong>Livro não encontrado!</strong> Verifique se a busca foi digitada corretamente.</div>";
		}
	}



	function selectLivro(){


					//aqui devera ser exibdo apenas o livro do $_GET['codigoLivro']; indicado conforme o modelo.
					include_once("../Lib/conecta.inc.php");
					$codigoLivro = $_GET['codigoLivro'];	
					$sql = "select * from livro l 
							join autor a on (a.codigoAutor = l.codigoAutor) 
							join editora e on (e.codigoEditora = l.codigoEditora) 
							where l.codigoLivro = $codigoLivro";
					$resultado = mysqli_query($con, $sql);

					if ($resultado != null){

?>
						<table class="table table-bordered table-sm table-striped">
							<thead class="bg-warning">
								<tr>
									<th>Título</th>
									<th>Autor</th>
									<th>Editora</th>
									<th>Ano</th>
									<th>Condicao</th> 		
								</tr>
							</thead>
							<?php while ( $rows = mysqli_fetch_array($resultado)) {?>
								<tr>
									<td><?php echo $rows['tituloLivro']; ?></td>
									<td><?php echo $rows['nomeAutor']; ?></td>
									<td><?php echo $rows['nomeEditora']; ?></td>
									<td><?php echo $rows['anoLivro']; ?></td>
									<td><?php echo $rows['condicaoLivro']; ?></td>
								</tr>
							<?php } ?>
						</table>
<?php			
					}else{
						echo "<div class='alert alert-danger espacoForm'><strong>Autor não encontrado!</strong></div>";
					}

		}
	
	
	//função responsável por alterar os dados do livro.	
	function alterarLivro(){

		if (isset($_POST['codigoRAutor']) && isset($_POST['codigoREditora']) && isset($_POST['codigoRAssunto']))
		{	

		include_once("../Lib/conecta.inc.php");
		$codigoLivro = (int) $_POST['codigo'];
		$isbn = (string) $_POST['isbn'];
		$titulo = (string) $_POST['titulo'];
		$codigoAutor = (int) $_POST['codigoRAutor'];
		$codigoEditora = (int) $_POST['codigoREditora'];
		$codigoAssunto = (int) $_POST['codigoRAssunto'];
		$idioma = (string) $_POST['idioma'];
		$ano = (string) $_POST['ano'];
		$edicao = (string) $_POST['edicao'];
		$preco = (float) $_POST['preco'];
		$condicao = (string) $_POST['condicao'];
		$paginas = (string) $_POST['paginas'];
		$peso = (string) $_POST['peso'];
		$colecao = (string) $_POST['colecao'];
		$traducao = (string) $_POST['traducao'];
		$ilustracao = (string) $_POST['ilustraca'];
		$dimensao = (string) $_POST['dimensao'];
		$acabamento = (string) $_POST['acabamento'];
		$sinopse = (string) $_POST['sinopse'];

		$sql = "update livro set isbn = COALESCE('$isbn', null), tituloLivro = '$titulo', codigoAutor = $codigoAutor, codigoEditora = $codigoEditora, codigoAssunto = $codigoAssunto, idiomaLivro = '$idioma', anoLivro = '$ano', edicaoLivro = COALESCE('$edicao', null), precoLivro = $preco, condicaoLivro = '$condicao', paginasLivro = COALESCE('$paginas', null), pesoLivro = COALESCE('$peso', null), colecaoLivro = COALESCE('$colecao', null), traducaoLivro = COALESCE('$traducao', null), ilustracaoLivro = COALESCE('$ilustracao', null), dimensaoLivro = COALESCE('$dimensao', null), acabamentoLivro = COALESCE('$acabamento', null), sinopseLivro = COALESCE('$sinopse', null) where codigoLivro = $codigoLivro";

		
		$resultado = mysqli_query($con, $sql);

		//o sistema deverá fazer a alteração do livro pelo codigo
		if ($resultado == 1){
?>		
			<div class="modal-header">
				<h4 class="text-success">Alteração realizada com sucesso!</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body bg-success">
				<h5 class="modal-title text-light">
<?php

					echo 'Titulo= '.$titulo.'</br>'
					.'Codigo=  '.$codigoLivro.'</br>';

?>
				</h5>

			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
				<button type="button" id="btdFecharAlteracao" class="btn btn-warning">Aterar Outro Livro</button>
			</div>

<?php  


		}else{

?>		
			<div class="modal-header">
				
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body bg-danger">
				<h4 class="modal-title text-light">Não foi possível Alterar o livro! <?php echo mysqli_error($con); ?></h4>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
			</div>
<?php 

		}
	}else{
?>
			<div class="modal-header">
				
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body bg-danger">
				<h4 class="modal-title text-light">Não foi possível Alterar o livro! Deve ser selecionado o <strong>AUTOR, EDITORA e ASSUNTO</strong>!</h4>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
			</div>

<?php

	}
	}


?>
