<?php

require('../crawler/crawlerDadosLivro.php');

if (isset($_GET["isbn"])){

	$isbn = $_GET["isbn"];

	$crawler = new crawlerDadosLivro();

	$crawler->crawlerCultura($isbn);

	if($crawler->status){

	?>

			<form id="cadLivro" action="service/LivroService.php?passo=cadastrar" method="post">
				
				<div class="form-row align-items-center espacoForm">
					<label for="inputIsbn" class="col-sm-2 col-form-label">ISBN:</label>
					<div class="col-sm-2">
						<!-- ISBN --> 
						<input type="text" class="form-control" id="inputIsbn" name="isbn" value=<?php echo "'".$isbn."'"; ?>>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" id="getDados">
							<i class="fa fa-cloud-download"></i>
							Buscar Informações
						</button>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputTitulo" class="col-sm-2 col-form-label">Titulo:</label>
					<div class="col-sm-8">
						<!-- TITULO --> 
						<input type="text" class="form-control" id="inputTitulo" name="titulo"  required value=<?php echo "'".$crawler->titulo."'"; ?>>
					</div>
				</div>

				<div class="form-row align-items-center espacoForm">
					<label for="inputAutor" class="col-sm-2 col-form-label">Autor:</label>
					<div class="col-sm-6">
						<!-- AUTOR --> 
						<input type="text" class="form-control" id="inputAutor"  required name="autor" value=<?php echo "'".$crawler->autor."'"; ?>>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" onclick="getListaSelectAutor();">
							<i class="fa fa-search-plus"></i>
							Consultar
						</button>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroAutorModal">
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
						<input type="text" class="form-control" id="inputEditora" required name="editora" value=<?php echo trim("'".$crawler->editora."'"); ?>>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" onclick="getListaSelectEditora();">
							<i class="fa fa-search-plus"></i>
							Consultar
						</button>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroEditoraModal">
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
						<input type="text" class="form-control" id="inputAssunto" name="assunto" required value=<?php echo "'".$crawler->assunto."'"; ?>>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" onclick="getListaSelectAssunto();">
							<i class="fa fa-search-plus"></i>
							Consultar
						</button>
					</div>
					<div class="col-auto my-1">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroAssuntoModal">
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
						<input type="text" class="form-control" id="inputIdioma" name="idioma"  required value=<?php echo "'".$crawler->idioma."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputAno" class="col-sm-2 col-form-label">Ano de Publicação:</label>
					<div class="col-sm-1">
						<!-- ANO --> 
						<input type="text" class="form-control" id="inputAno" name="ano" required onkeyup="somenteNumeros(this);" value=<?php echo "'".trim($crawler->ano)."'"; ?>>
					</div>
					<label for="inputEdicao" class="col-sm-1 col-form-label">Edição:</label>
					<div class="col-sm-1">
						<!-- EDICAO --> 
						<input type="text" class="form-control" id="inputEdicao" name="edicao" onkeyup="somenteNumeros(this);" value=<?php "'".$crawler->edicao."'"; ?>>
					</div>
				</div>	
				<div class="form-row align-items-center espacoForm">
					<label for="inputPreco" class="col-sm-2 col-form-label">Preço:</label>
					<div class="col-sm-1">
						<!-- PRECO --> 
						<input type="text" class="form-control" required id="inputPreco" name="preco"  value=<?php echo ""; ?>>
					</div>

				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputIdioma" class="col-sm-2 col-form-label">Condição:</label>
					<div class="col-sm-3">
						<!-- CIDGO --> 
						<select id="inputCondicao" class="form-control" name="condicao" required value=<?php echo ""; ?>>
							<option value="Usado">Usado</option>
							<option value="Novo">Novo</option>
						</select>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputPaginas" class="col-sm-2 col-form-label">Qtd. Páginas:</label>
					<div class="col-sm-3">
						<!-- QTD PÁGINAS --> 
						<input type="text" class="form-control" id="inputPaginas" name="paginas" onkeyup="somenteNumeros(this);" value=<?php echo "'".trim($crawler->paginas)."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputPeso" class="col-sm-2 col-form-label">Peso (g):</label>
					<div class="col-sm-3">
						<!-- PESO--> 
						<input type="text" class="form-control" id="inputPeso" name="peso" onkeyup="somenteNumeros(this);" value=<?php echo "'".$crawler->peso."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputColecao" class="col-sm-2 col-form-label">Coleção:</label>
					<div class="col-sm-5">
						<!-- COLEÇÃO --> 
						<input type="text" class="form-control" id="inputColecao" name="colecao" value=<?php echo ""; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputTraducao" class="col-sm-2 col-form-label">Tradução:</label>
					<div class="col-sm-5">
						<!-- TRADUCAO --> 
						<input type="text" class="form-control" id="inputTraducao" name="traducao" value=<?php echo ""; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputIlustracao" class="col-sm-2 col-form-label">Ilustracao:</label>
					<div class="col-sm-5">
						<!-- ILUSTRAÇÃO --> 
						<input type="text" class="form-control" id="inputIlustracao" name="ilustraca" value=<?php echo ""; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputDimensao" class="col-sm-2 col-form-label">Dimensões:</label>
					<div class="col-sm-5">
						<!-- DIMENSÃO --> 
						<input type="text" class="form-control" id="inputdimensao" name="dimensao" value=<?php echo "'".$crawler->dimensoes."'"; ?>>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputAcabamento" class="col-sm-2 col-form-label">Acabamento:</label>
					<div class="col-sm-5">
						<!-- ACABAMENTO --> 
						<select id="inputAcabamento" class="form-control" name="acabamento" required value=<?php echo ""; ?>>
							<option value="Capa Comum">Capa Comum</option>
							<option value="Capa Dura">Capa Dura</option>
							<option value="Livro de Bolso">Livro de Bolso</option>
						</select>
					</div>
				</div>
				<div class="form-row align-items-center espacoForm">
					<label for="inputSinopse" class="col-sm-2 col-form-label">Sinopse:</label>
					<div class="col-sm-7">
						<!-- SINOPSE --> 
						<textarea class="form-control" id="inputSinopse" name="sinopse" rows="3"><?php echo "'".$crawler->sinopse."'"; ?></textarea>
					</div>
				</div>
				<div style="margin:1%">
					<button type="submit" class="btn btn-success btn-lg espacoForm" >
						<i class="fa fa-floppy-o"></i>
						Salvar
					</button>
					<button type="button" class="btn btn-danger btn-lg espacoForm" id="zerarForm"> 
						<i class="fa fa-ban"></i>
						Limpar
					</button> 
				</div>
			</form>




	<?php



	}else{

		echo "Isbn não encontrado!";

	}

}else {

	echo "Isbn não encontrado!";
}


?>