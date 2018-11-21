<?php
	
	/* Aula de Referencia: https://www.devmedia.com.br/crud-com-php-mysql-e-ajax-usando-jquery/32197
	
	Aqui será o código referente aos serviços do Objeto Livro descrito*/


	//  Organizador dos passos acessados pelas telas através do GET.
	$passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

	switch ($passo) {
		case 'cadastrar': {cadastrarLivroDescrito(); break;}
		case 'alterarDescricao': {alterarDescricao(); break;}
		case  'listarAlteracao' : {listarLivroDescritoAlteracao(); break;}
		case  'removerLivroDescrito' : {removerLivroDescrito(); break;}
		case  'adicionarLivroDescrito' : {adicionarLivroDescrito(); break;}
		case  'listarLivroDescritoExibicao' : {listarLivroDescritoExibicao(); break;}
			
	}

	
	function cadastrarLivroDescrito(){


		//Função para cadastrar LivroDescrito.

		$listaDescricoes = $_POST['descricao'];

		//Consulta a lista de descrição para montar o textoLivroDescrito e calcular o precoLivroDescrito (valorLivro - suma das reduções -(R$).
		$valorLivro = $_POST['valorLivro'];
		$reducaoPreco = "soma das reduções da lista de descrição";
		$precoLivroDescrito = $valorLivro - $reducaoPreco;

		$textoDescricao = "texto"+"montado"+'do resultado'+"da consulta";

		//Esses são os demais dados para o cadastro do livro descrito

		$codigoLivro = $_POST['codigoLivro'];
		$subCodigoLivro = $_POST['subCodigoLivro'];
		$obsLivro = $_POST['obsLivro'];


		if (true){

			?>		
			<div class="modal-header">
				
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
		      
		    <div class="modal-body bg-success">
		    	<p class="modal-title text-light"><?php echo "Lista de Descrição=".print_r($listaDescricoes); ?></p>

		    </div>
			
		    <div class="modal-footer">
		        <button type="button" id="btdFinalizarCadastro" class="btn btn-success">Finalizar Cadastro</button>
		    </div>

		    <?php  


		}else{

			?>		
			<div class="modal-header">
				
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
		      
		    <div class="modal-body bg-danger">
		    	<h4 class="modal-title text-light">Não foi possível cadastrar o livro!</h4>
		    </div>
			
		    <div class="modal-footer">
		        <button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
		    </div>

		    <?php 

		}

	}

	
	function alterarDescricao(){


		$listaDescricoes = $_POST['descricao'];
		$valorBaseLivro = $_POST['valorLivro'];
		
		//deverar repedir as operações de cadastro de livro usado.

		$codigoLivroDescrito = $_POST['codigoLivro'];
		$novaObs = $_POST['obsLivro'];
		

		
		if (true){

			echo "Descrição alterada com sucesso!</br>Preço: ".;


		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}

	}

	

	
	function listarLivroDescritoAlteracao(){

		//Aqui deverá ser listados todos os livros descritos relacionados ao codigo do Livro passado.
		$codigoLivro = $_GET['codigoLivro'];

	
		//aqui deve iniciar o array incluindo os valores de cada Livro descri relacionado.	

		?>

			<div style="padding:1%; border-radius: 2%; border: 1px solid;">
				<div class="form-row align-items-center espacoForm">

						<label for="codigoLivro" class="col-sm-2 col-form-label">Código:</label>
	    				<div class="col-sm-2">
	     		 			                                         <!-- codigo do livro -->       
	     		 			<input type="text" class="form-control" value=<?php echo '"...."'; ?> id="codigoLivro" name="codigoLivro" readonly="true">
	    				</div>

	    				<div class="col-sm-1">						<!-- sub codigo do livro -->
	     		 			<input type="text" class="form-control" value=<?php echo '"...."'; ?> id="inputSubCodigoLivro" name="subCodigoLivro" maxlength="1" readonly="true">
	    				</div>	    				

				</div>

				<div class="form-row align-items-center espacoForm">

						<label for="inputTotal" class="col-sm-2 col-form-label">Total:</label>
	    				<div class="col-sm-1">										<!-- quantidade do LivroDescrito -->
	     		 			<input type="text" class="form-control" id="inptTotal" value=<?php echo '"...."'; ?> name="totalLivro" readonly="true">
	    				</div>

	    				<label for="inputQtd" class="col-sm-1 col-form-label">Qtd:</label>
	    				<div class="col-sm-1">
	     		 			<input type="text" class="form-control" id="inputQtd" name="qtd" required onkeyup="somenteNumeros(this);" maxlength="3">
	    				</div>
	    									<!--Codigo dos livros descritos devem ser adicionados aos botões -->
	    				<button type="button" codLivroDescrito=<?php echo '"...."'; ?> class="btn btn-success btnAdicionarLivroDescrito" style="margin-right: 1%">Adicionar</button>
	    				<button type="button" codLivroDescrito=<?php echo '"...."'; ?> class="btn btn-danger btnRemoverLivroDescrito"style="margin-right: 1%">Remover</button>
	    				<button type="button" codLivroDescrito=<?php echo '"...."'; ?> data-toggle="modal" data-target="#alterarDescricaoModal" class="btn btn-primary btnAlterarDescricao">Alterar Descrição</button>

				</div>

				<div class="form-row align-items-center espacoForm">			
							<label for="inputDescricao" class="col-sm-2 col-form-label">Descrição:</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="inputDescricao" name="descricao" rows="2" readonly="true"></textarea>
			      			</div>
			    </div>		
			    	

			</div>	



		<?php	
		
	}


	
	function removerLivroDescrito(){


		//Adicionar a quantidade livros descritos na quantidade passada em $_GET['qtd'];
		
		$codigoLivroDescrito = $_GET['codigoLivroDescrito'];
		$totalLivrosDescrito = $_GET['totalLivros'];
		$qtdParaAdiconar = $_GET['qtd'];

		if (true){
		
			echo "Codigo ".$codigoLivroDescrito." Total Livros ".$totalLivrosDescrito;
			
		}else{

			echo "erroooooo";
	

		}

	}

	function adicionarLivroDescrito(){

		//Diminuir a quantidade livros descritos na quantidade passada em $_GET['qtd'];
		
		$codigoLivroDescrito = $_GET['codigoLivroDescrito'];
		$totalLivrosDescrito = $_GET['totalLivros'];
		$qtdParaRemover = $_GET['qtd'];

		if (true){
		
			echo "Codigo ".$codigoLivroDescrito." Total Livros ".$totalLivrosDescrito;
			
		}else{

			echo "erroooooo";
	

		}

	}

	//FUNÇÃO RESPONSÁVEL POR LISTAR OS LIVROS DESCRITOS DENTRO DA TABELA DE BUSCA
	function listarLivroDescritoExibicao(){


		$codigoLivro = $_GET['codigo'];


		//LISTAR TODOS OS LIVROS DESCRIOS POR codigoLivro.

		if (true){


?>		
		<table class="table table-bordered table-striped">
			<thead class="table-warning">
		    	<tr>
		      		<th>Sub.Codigo</th>
		      		<th>Descrição</th>
		      		<th>Preço</th>	
		    	</tr>
		  	</thead>
		  	
<?php

		//AQUI COMEÇA O ARRAY PARA INCLUIR OS ELEMENTOS NA TABELA

?>
			<tr>
				<td><?php echo "'....'"; ?></td>
				<td><?php echo "'....'"; ?></td>
				<td><?php echo "'....'"; ?></td>
			</tr>		

		</table>
<?php
		}else{

			echo "Erro asdadad";
	

		}

	}


?>
