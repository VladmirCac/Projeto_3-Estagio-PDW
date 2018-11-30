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

		if (isset($_POST['descricao']))
		{	

		include_once("../Lib/conecta.inc.php");

		//Função para cadastrar LivroDescrito no array.
		$listaDesc = "";
		$listaDescricoes = $_POST['descricao'];
		$cont = 0;
		foreach ($listaDescricoes as $value) {
			if($cont == 0){
				$listaDesc .= $value;;
			}else{
				$listaDesc .= ",".$value;
			}
			$cont+=1;
		}
		//Consulta a lista de descrição para montar o textoLivroDescrito e calcular o precoLivroDescrito (valorLivro - suma das reduções -(R$).
		$sqlList = "select * from descricao d
					join categoria_descricao cd on (cd.codigoCategoriaDescricao = d.codigoCategoriaDescricao)
					where d.codigoDescricao in ($listaDesc)
					order by cd.codigoCategoriaDescricao";
		$resultado = mysqli_query($con, $sqlList);
		$categoria = array();
		$textoDesc = "";
		$valorReducaoTotal = 0;
		while ( $rows = mysqli_fetch_array($resultado)) {
			if(in_array($rows['nomeCategoriaDescricao'], $categoria)){	
				$textoDesc .= $rows['nomeDescricao'].". ";
			}else{
				$textoDesc .= $rows['nomeCategoriaDescricao'].": " . $rows['nomeDescricao'] . ". ";
				$categoria[] = $rows['nomeCategoriaDescricao'];
			}
			$valorReducaoTotal += (float) $rows['reducaoPreco'];
		}
		$textoDesc .= ". Obs: ". $obsLivro = $_POST['obsLivro'];
		$valorLivro = $_POST['valorLivro'];
		$precoLivroDescrito = $valorLivro - $valorReducaoTotal;

		//Esses são os demais dados para o cadastro do livro descrito

		$codigoLivro = $_POST['codigoLivro'];
		$subCodigoLivro = $_POST['subCodigoLivro'];
		$qtdLivro = $_POST['qtdLivro'];

		$sql = "INSERT INTO livro_descrito (codigoLivro, subcodigoLivro, qtdLivro, textoLivroDescrito, precoLivroDescrito, obsLivroDescrito) VALUES ($codigoLivro, '$subCodigoLivro', $qtdLivro, '$textoDesc', $precoLivroDescrito, '$obsLivro')";
		$resultado = mysqli_query($con, $sql);

		
		if ($resultado == 1){

			?>		
			<div class="modal-header">
				
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
		      
		    <div class="modal-body bg-success">
		    	<p class="modal-title text-light">Livro descrito cadastrado com sucesso!</p>

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

	}else{
?>
			<div class="modal-header">
				
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
		      
		    <div class="modal-body bg-danger">
		    	<h4 class="modal-title text-light">Você deve escolher ao menos uma descrição!</h4>
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

			echo "Descrição alterada com sucesso!</br>Preço: ";


		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}

	}

	

	
	function listarLivroDescritoAlteracao(){

		//Aqui deverá ser listados todos os livros descritos relacionados ao codigo do Livro passado.
		include_once("../Lib/conecta.inc.php");
		$codigoLivro = $_GET['codigoLivro'];

		$sql = "select * from livro_descrito where codigoLivro = $codigoLivro";

		$resultado = mysqli_query($con, $sql);

		if (mysqli_num_rows($resultado) > 0) {	
		//aqui deve iniciar o array incluindo os valores de cada Livro descri relacionado.		
			while ( $rows = mysqli_fetch_assoc($resultado)) {
		?>

			<div style="padding:1%; border-radius: 2%; border: 1px solid;">
				<div class="form-row align-items-center espacoForm">

						<label for="codigoLivro" class="col-sm-2 col-form-label">Código:</label>
	    				<div class="col-sm-2">
	     		 			                                         <!-- codigo do livro -->       
	     		 			<input type="text" class="form-control" value=<?php echo $rows['codigoLivro']; ?> id="codigoLivro" name="codigoLivro" readonly="true">
	    				</div>

	    				<div class="col-sm-1">						<!-- sub codigo do livro -->
	     		 			<input type="text" class="form-control" value=<?php echo $rows['subcodigoLivro']; ?> id="inputSubCodigoLivro" name="subCodigoLivro" maxlength="1" readonly="true">
	    				</div>	    				

				</div>

				<div class="form-row align-items-center espacoForm">

						<label for="inputTotal" class="col-sm-2 col-form-label">Total:</label>
	    				<div class="col-sm-1">										<!-- quantidade do LivroDescrito -->
	     		 			<input type="text" class="form-control" id="inptTotal" value=<?php echo $rows['qtdLivro']; ?> name="totalLivro" readonly="true">
	    				</div>

	    				<label for="inputQtd" class="col-sm-1 col-form-label">Qtd:</label>
	    				<div class="col-sm-1">
	     		 			<input type="text" class="form-control" id="inputQtd" name="qtd" required onkeyup="somenteNumeros(this);" maxlength="3">
	    				</div>
	    									<!--Codigo dos livros descritos devem ser adicionados aos botões -->
	    				<button type="button" codLivroDescrito=<?php echo $rows['codigoLivroDescrito']; ?> class="btn btn-success btnAdicionarLivroDescrito" style="margin-right: 1%">Adicionar</button>
	    				<button type="button" codLivroDescrito=<?php echo $rows['codigoLivroDescrito']; ?> class="btn btn-danger btnRemoverLivroDescrito"style="margin-right: 1%">Remover</button>
	    				<button type="button" codLivroDescrito=<?php echo $rows['codigoLivroDescrito']; ?> data-toggle="modal" data-target="#alterarDescricaoModal" class="btn btn-primary btnAlterarDescricao">Alterar Descrição</button>

				</div>

				<div class="form-row align-items-center espacoForm">			
							<label for="inputDescricao" class="col-sm-2 col-form-label">Descrição:</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="inputDescricao" name="descricao" rows="2" readonly="true"><?php echo $rows['textoLivroDescrito']; ?></textarea>
			      			</div>
			    </div>		
			    	

			</div>	


		<?php	
			}
		}else{
			echo "Livro ainda não possui Livros Descritos associados!";
		}

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

		include_once("../Lib/conecta.inc.php");
		$codigoLivro = $_GET['codigo'];

		$sql = "select * from livro_descrito where codigoLivro = $codigoLivro";

		$resultado = mysqli_query($con, $sql);


		//LISTAR TODOS OS LIVROS DESCRIOS POR codigoLivro.

		if (mysqli_num_rows($resultado) > 0) {			

?>		
		<table class="table table-bordered table-striped">
			<thead class="table-warning">
		    	<tr>
		      		<th>Sub.Codigo</th>
		      		<th>Descrição</th>
		      		<th>Preço</th>
		      		<th>Qtd</th>	
		    	</tr>
		  	</thead>
		  	
<?php
		//AQUI COMEÇA O ARRAY PARA INCLUIR OS ELEMENTOS NA TABELA
		while ( $rows = mysqli_fetch_assoc($resultado)) {

?>
			<tr>
				<td><?php echo $rows['subcodigoLivro']; ?></td>
				<td><?php echo $rows['textoLivroDescrito']; ?></td>
				<td><?php echo $rows['precoLivroDescrito']; ?></td>
				<td><?php echo $rows['qtdLivro']; ?></td>
			</tr>		
<?php
			}
?>
		</table>
<?php
		}else{

			echo "Livros descritos não encontrados! ".mysqli_error($con);
	
		}

	}


?>
