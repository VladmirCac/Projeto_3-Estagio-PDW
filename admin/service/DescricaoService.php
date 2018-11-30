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

		include_once("../Lib/conecta.inc.php");

		$codigoCategoriaDescricao = $_GET['codigo'];
		// Receber o código da descrição
		$sql = "select * from descricao where codigoCategoriaDescricao = $codigoCategoriaDescricao";
		$resultado = mysqli_query($con, $sql);
		mysqli_close($con);
		//if($resultado != null) {
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
			  	<?php while ( $rows = mysqli_fetch_array($resultado)) {
			  		$cd = $rows['codigoDescricao']; 		
			  		$sd = $rows['statusDescricao']; 
			  	?>		

				  	<tr class="ldescricao">
						<td>

							<!-- os atributos nomeAutor e codigoAutor dos buttons devem ser alimentado com seus respectivos dados para auxilizar nos modais de exclusão e alteração. -->

							<button  type="button" nomeDescricao=<?php echo $rows['nomeDescricao']; ?> codigoDescricao=<?php echo $rows['codigoDescricao']; ?> data-toggle="modal" data-target="#editarDescricaoModal">
								<i class="fa fa-pencil-square-o text-primary" style="font-size: 150%;"></i>
							</button>
						</td>
						<td>
							<?php echo $rows['codigoDescricao']; ?>		
						</td>
						<td>
							<?php echo $rows['nomeDescricao']; ?>
						</td>
						<td>
							<?php echo $rows['reducaoPreco']; ?>
						</td>
						<td>
							<!-- Aqui deverar ser exibido a cor do botão de acordo com o status, lembrando de inclir o codigo da descrição no attr  codigoDescricao  -->
							<?php
								if ($rows['statusDescricao'] == 1) {
									//se o status estiver ativo statusDescricao == 1
							?>
									<button type="button" codigoDescricao=<?php echo $rows['codigoDescricao']; ?> statusDescricao=<?php echo $rows['statusDescricao']; ?>><i class="fa fa-power-off text-success" style="font-size: 150%;"></i></button>
							<?php
								}else{
							?>		
									<button type="button" codigoDescricao=<?php echo $rows['codigoDescricao']; ?> statusDescricao=<?php echo $rows['statusDescricao']; ?>><i class="fa fa-power-off text-danger" style="font-size: 150%;"></i></button>
							<?php
								}
							?>
						</td>
					</tr>
				<?php } ?>
			<table>
		<?php //} ?>
	<?php	

	}

	function cadastrarDescricao(){
		
		include_once("../Lib/conecta.inc.php");
		$codigoDaCategoriaRelacionada = $_POST['textCodigoCategoria'];
		$nomeDescricaoParaIncluir = $_POST['textNovaDescricao'];
		$valorReducaoParaIncluir = $_POST['textValorReducao'];

		//echo $codigoDaCategoriaRelacionada."/".$nomeDescricaoParaIncluir."/".$valorReducaoParaIncluir;

		if($nomeDescricaoParaIncluir == null && $valorReducaoParaIncluir == null){
			echo "<div class='alert alert-danger espacoForm'><strong> Erro ao tentar cadastrar.</strong> Insira a descrição e o valor de redução.</div>";
		}else{
			$sql = "INSERT INTO descricao (codigoCategoriaDescricao, nomeDescricao, reducaoPreco) VALUES ($codigoDaCategoriaRelacionada, '$nomeDescricaoParaIncluir', $valorReducaoParaIncluir)"; 
			$resultado = mysqli_query($con, $sql);
			if ($resultado == 1){
				echo "<div class='alert alert-success espacoForm'><strong> Cadastro da descricao ".$nomeDescricaoParaIncluir." ".$valorReducaoParaIncluir.", Código da categoria: ".$codigoDaCategoriaRelacionada." realizada com sucesso!</strong></div>";
			} else {
				echo "<div class='alert alert-danger espacoForm'><strong> Erro ao tentar cadastrar ".$nomeDescricaoParaIncluir."</strong> Ocorreu um erro.</div>";
			}
		}
		mysqli_close($con);
		//echo mysqli_error($con);
	}

	function alterarDescricao(){

		// funcção responsável por alterar as descrições
		include_once("../Lib/conecta.inc.php");
		$codigoDescricaoParaAlterar = $_POST['textCodigoDescricao'];
		$nomeDescricaoParaEditar = $_POST['textNovaDescricao2'];
		$valorReducaoParaEditar = $_POST['textValorReducao2'];
		
		$sql = "UPDATE descricao SET nomeDescricao = '$nomeDescricaoParaEditar', reducaoPreco = $valorReducaoParaEditar WHERE codigoDescricao = $codigoDescricaoParaAlterar"; 
		$resultado = mysqli_query($con, $sql);

		if ($resultado == 1){
			echo "<div class='alert alert-success espacoForm'><strong> Edição da descricao ".$nomeDescricaoParaEditar."  ".$valorReducaoParaEditar." realizada com sucesso! ".$codigoDescricaoParaAlterar."</strong></div>";
		} else {
			echo "<div class='alert alert-danger espacoForm'><strong> Erro ao tentar cadastrar </strong> Ocorreu um erro.</div>";
		}

		mysqli_close($con);		
	}


	function alterarStatus() {

		// funcção responsável por trocar o satus da ddescrição. O status que tiver 1 devera ficar zero e que tiver 0 deverá ficar 1
		include_once("../Lib/conecta.inc.php");
		$codigoParaAlterar = $_GET['codigo'];
		$statusAtual = $_GET['status'];

		if($statusAtual == 1){
			$sql = "UPDATE descricao SET statusDescricao = 0 WHERE codigoDescricao = $codigoParaAlterar";
		}else{
			$sql = "UPDATE descricao SET statusDescricao = 1 WHERE codigoDescricao = $codigoParaAlterar";
		}
		
		$resultado = mysqli_query($con, $sql);
		if ($resultado == 1){

			echo '<div class="alert alert-success"><strong> Status do codigo "'.$codigoParaAlterar.'" alterado com sucesso!</strong> </div>';

		}else{

			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";

		}

		mysqli_close($con);
	}

	function listarDescricaoAtivas(){

		include_once("../Lib/conecta.inc.php");
		
		$sql = "select * from descricao d
				join categoria_descricao cd on (cd.codigoCategoriaDescricao = d.codigoCategoriaDescricao)
				where d.statusDescricao = 1
				order by cd.codigoCategoriaDescricao";
		$resultado = mysqli_query($con, $sql);
		$categoria = array();

		if ($resultado != null){
		?>
			<table class="table table-bordered table-sm" style="font-size: 12px;">
		<?php
				while ( $rows = mysqli_fetch_array($resultado)) {
					if(in_array($rows['nomeCategoriaDescricao'], $categoria)){
						?>

							<tr>
					  			<td>
					  				                  <!-- NO VALUE='' DEVE SER INCLIODO O CODIGO DA DESCRIAÇÃO -->
					  				<input type='checkbox' name='descricao[]' value=<?php echo $rows['codigoDescricao']; ?> style='margin-left: 2%;'/>
					  				<?php echo $rows['nomeDescricao']; ?>
					  			</td>
					  			<td><?php echo $rows['reducaoPreco']; ?></td>
					  		</tr>
				  		<?php 
					}else{
						$categoria[] = $rows['nomeCategoriaDescricao'];					
						?>
							<thead class="bg-light">
				    	<tr>
				      		<!-- NOME DA CATEGORI -->
				      		<th><?php echo $rows['nomeCategoriaDescricao']; ?></th>
				      		<th>-(R$)</th>	
				    	</tr>
				  	</thead>
				  		<tr>
				  			<td>
				  				                  <!-- NO VALUE='' DEVE SER INCLIODO O CODIGO DA DESCRIAÇÃO -->
				  				<input type='checkbox' name='descricao[]' value=<?php echo $rows['codigoDescricao']; ?> style='margin-left: 2%;'/>
				  				<?php echo $rows['nomeDescricao']; ?>
				  			</td>
				  			<td><?php echo $rows['reducaoPreco']; ?></td>
				  		</tr>
				  		<?php 
					}
				}
			?>	
			</table>  		
			
		<?php	
	
		}else{
			echo "<div class='alert alert-danger espacoForm'><strong>Edição não realizada!</strong> Ocorreu um erro.</div>";
		}
		mysqli_close($con);
	}



?>	