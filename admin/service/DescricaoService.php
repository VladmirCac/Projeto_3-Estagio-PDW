<?php


	$passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

	switch ($passo) {
		case 'cadastrar': {cadastrarDescricao(); break;}
		case 'alterar': {alterarDescricao(); break;}
		case 'alterarStatus': {alterarStatus(); break;}
		default: case 'listar': {listarDescricao(); break;}
			
	}


	function listarDescricao(){

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

		



		$nomeDescricaoParaIncluir = $_POST['textNovaDescricao'];
		$valorReducaoParaIncluir = $_POST['textValorReducao'];



		if (true){


			echo "<div class='alert alert-success espacoForm'><strong> Cadastro da descricao ".$nomeDescricaoParaIncluir." ".$valorReducaoParaIncluir." realizada com sucesso!</strong></div>";

		} else {

			echo "<div class='alert alert-danger espacoForm'><strong> Erro ao tentar cadastrar ".$nomeDescricaoParaIncluir."</strong> Ocorreu um erro.</div>";

		}

	}

	function alterarDescricao(){


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

		$codigoParaAlterar = $_GET['codigo'];
		$statusAutal = $_GET['status'];

		if (true){

			echo '<div class="alert alert-success"><strong> Status do codigo "'.$codigoParaAlterar.'" alterado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}


	}



?>	