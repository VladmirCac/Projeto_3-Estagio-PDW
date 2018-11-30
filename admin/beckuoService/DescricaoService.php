<?php


	$passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

	switch ($passo) {
		case 'cadastrar': {cadastrarDescricao(); break;}
		case 'alterar': {alterarDescricao(); break;}
		case 'alterarStatus': {alterarStatus(); break;}
		case 'listarAtivas': {listarDescricaoAtivas(); break;}
		default: case 'listar': {listarDescricao(); break;}
			
	}


	function listarDescricao(){

		// aqui devemos listar todos o

		?>
			<table class="table table-sm table-bordered table-striped">
			<thead class="table-primary">
		    	<tr>
		      		<th>Editar</th>
		      		<th>Codigo</th>
		     		<th>Nome</th>
		     		<th> (-) R$</th>
		     		<th>Status</th>	
		    	</tr>
		  	</thead>


		  	<tr class="ldescricao">
				<td>

					<!-- os atributos nomeAutor e codigoAutor dos buttons devem ser alimentado com seus respectivos dados para auxilizar nos modais de exclusão e alteração. -->

					<button  type="button" nomeDescricao=<?php echo '"...."'; ?> codigoDescricao=<?php echo '"...."'; ?> data-toggle="modal" data-target="#editarDescricaoModal">
						<i class="fa fa-pencil-square-o text-primary" style="font-size: 150%;"></i>
					</button>
				</td>
				<td>
					<?php echo "...."; ?>		
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
							//se o status estiver ativo statusDescricao == 1
							echo '<button type="button" codigoDescricao="...." statusDescricao="..."><i class="fa fa-power-off text-success" style="font-size: 150%;"></i></button>';

						}else{
							//se o status estuver ativo statusDescricao == 0
							echo '<button type="button" codigoDescricao="...." statusDescricao="..."><i class="fa fa-power-off text-danger" style="font-size: 150%;"></i></button>';

						}


					?>
				</td>
			</tr>
		<table>

	<?php	

	}

	function cadastrarDescricao(){

		
		// funcão responsável por cadastrar as descrições.

		$codigoDaCategoriaRelacionada = $_POST['textCodigoCategoria'];
		$nomeDescricaoParaIncluir = $_POST['textNovaDescricao'];
		$valorReducaoParaIncluir = $_POST['textValorReducao'];



		if (true){


			echo "<div class='alert alert-success espacoForm'><strong> Cadastro da descricao ".$nomeDescricaoParaIncluir." ".$valorReducaoParaIncluir."  ".$codigoDaCategoriaRelacionada." realizada com sucesso!</strong></div>";

		} else {

			echo "<div class='alert alert-danger espacoForm'><strong> Erro ao tentar cadastrar ".$nomeDescricaoParaIncluir."</strong> Ocorreu um erro.</div>";

		}

	}

	function alterarDescricao(){

		// funcção responsável por alterar as descrições
		$codigoDescricaoParaAlterar = $_POST['textCodigoDescricao'];
		$nomeDescricaoParaEditar = $_POST['textNovaDescricao2'];
		$valorReducaoParaEditar = $_POST['textValorReducao2'];


		if (true){


			echo "<div class='alert alert-success espacoForm'><strong> Edição da descricao ".$nomeDescricaoParaEditar."  ".$valorReducaoParaEditar."realizada com sucesso!".$codigoDescricaoParaAlterar."</strong></div>";

		} else {

			echo "<div class='alert alert-danger espacoForm'><strong> Erro ao tentar cadastrar </strong> Ocorreu um erro.</div>";

		}


	}


	function alterarStatus() {

		// funcção responsável por trocar o satus da ddescrição. O status que tiver 1 devera ficar zero e que tiver 0 deverá ficar 1

		$codigoParaAlterar = $_GET['codigo'];
		$statusAutal = $_GET['status'];

		if (true){

			echo '<div class="alert alert-success"><strong> Status do codigo "'.$codigoParaAlterar.'" alterado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}


	}

	function listarDescricaoAtivas(){


		/*LISTAR TODAS A DESCRIÇÕES ATIVAS COM CHEKBOX SEPARANDO POR CATEGORIA.
			DEVEMOS CRIAR UMA LINHA PARA CADA CATEGORIA SEGUIDASD DE SUAS DESCRIÇÕES RELACIONADAS CONFORME MODELO.	
		 */


		if (true){

		?>

			<table class="table table-bordered table-sm" style="font-size: 12px;">
				<thead class="bg-light">
			    	<tr>
			      		<!-- NOME DA CATEGORI -->
			      		<th><?php echo "...."; ?></th>
			      		<th>-(R$)</th>	
			    	</tr>
			  	</thead>
			  		<tr>
			  			<td>
			  				                  <!-- NO VALUE='' DEVE SER INCLIODO O CODIGO DA DESCRIAÇÃO -->
			  				<input type='checkbox' name='descricao[]' value='....' style='margin-left: 2%;'/>
			  				LIVRO EM BOM ESTADO DE CONSERVAÇÃO EM RELAÇÃO AO ANO DE PUBLICAÇÃO
			  			</td>
			  			<td>0</td>
			  		</tr>
				<thead class="bg-light">
			    	<tr>
			      		<th>CAPA</th>
			      		<th>-(R$)</th>	
			    	</tr>
			  	</thead>
			  		<tr>
			  			<td>
			  				<input type='checkbox' name='descricao[]' value='....' style='margin-left: 2%;'/>
			  				CAPA COM LEVES DESGASTRES NA EXTREMIDADE
			  			</td>
			  			<td>0</td>
			  		</tr>
				<thead class="bg-light">
			    	<tr>
			      		<th>CONTRA CAPA</th>
			      		<th>-(R$)</th>	
			    	</tr>
			  	</thead>
			  		<tr>
			  			<td>
			  				<input type='checkbox' name='descricao[]' value='....' style='margin-left: 2%;'/>
			  				CONTRA CAPA COM MARCA DA QNTIQUE ETIQUETA REMOVIDA
			  			</td>
			  			<td>0</td>
			  		</tr>
				
			</table>  		
			
		<?php	

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}

	}



?>	