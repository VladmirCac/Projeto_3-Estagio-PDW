
<!-- TELA INICIAL -->

<h2 class="espacoForm"><center><i class="fa fa-pencil"></i>CADASTRO DE AUTOR<center></h2>
	<div class="container1">
		<form action="" method="post">	
			<div class="form-row align-items-center espacoForm">
				<div class="col-sm-6">
					<input type="text" class="form-control" id="inputBusca" name="buscaAutor" placeholder="">
				</div>
				<div class="col-auto my-1">
					<button type="button" class="btn btn-primary" onclick="getListaAutor();">
						<i class="fa fa-search-plus"></i>
						Consultar
					</button>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroModal">
						<i class="fa fa-floppy-o"></i>
						Cadastrar
					</button>
				</div>
			</div>
		</form>
		<div id="resultadoListaAutor"></div>
	</div>

	<!-- Modal de Cadastro  -->

	<div class="modal fade" id="cadastroModal" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Cadastrar Autor</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<form action="service/AutorService.php?passo=cadastrar" id="cadAutor" method="post">	
						<div class="form-row align-items-center espacoForm">
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputCadastro" name="cadastroAutor" placeholder="">
							</div>
							<div class="col-auto my-1">
								<button type="submit" class="btn btn-success" data-toggle="modal">
									<i class="fa fa-floppy-o"></i>
									Salvar
								</button>
							</div>
							<div id="resultadoCadastroAutor"></div>
						</div>
					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
				</div>

			</div>
		</div>
	</div>

	<!-- Modal de Alteração  -->

	<div class="modal fade" id="edicaoModal" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Alterar Autor</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">

					<form action="service/AutorService.php?passo=alterar" id="editAutor" method="post">

						<label for="inputMim" class="col-sm-1 col-form-label">Código:</label>	
						<div class="col-sm-6">
							<input type="text" class="form-control" id="inputCodigo" name="textCodigo" readonly="true">
						</div> 

						<label for="inputMax" class="col-sm-1 col-form-label">Autor:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputAutor" name="textAutor" readonly="true" style="margin-bottom: 3%;">
						</div>

						<label for="inputMax" class="col-sm-5 col-form-label">Novo Nome:</label>	
						<div class="form-row align-items-center espacoForm">
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputEdicao" name="edicaoAutor">
							</div>

							<div class="col-auto my-1">
								<button type="submit" class="btn btn-success" data-toggle="modal">
									<i class="fa fa-floppy-o"></i>
									Editar
								</button>
							</div>

							<div id="resultadoEdicaoAutor"></div>

						</div>

					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
				</div>

			</div>
		</div>
	</div>

	<!-- Modal de Exclusão  -->

	<div class="modal fade" id="remocaoModal" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Excluir Autor</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<form action="service/AutorService.php?passo=excluir" id="removAutor" method="post">

						<label class="col-sm-1 col-form-label">Código:</label>	
						<div class="col-sm-6">
							<input type="text" class="form-control" id="inputRCodigo" name="textRCodigo" readonly="true">
						</div> 

						<label class="col-sm-5 col-form-label">Autor à ser excluido:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputRAutor" name="textRAutor" readonly="true" style="margin-bottom: 3%;">
						</div>

						<label class="col-sm-5 col-form-label">Autor à ser transferido:</label>	
						<div class="form-row align-items-center espacoForm">
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputRemocao" name="remocaoAutor">
							</div>
							<div class="col-auto my-1">
								<button type="button" class="btn btn-primary" data-toggle="modal" onclick="getListaSelectAutor();">
									<i class="fa fa-search"></i>
									Buscar
								</button>
							</div>
							<div class="col-sm-10 espacoForm" id="resultadoSelectAutor"></div>
						</div>

						<div class="col-auto my-1">
							<button type="submit" class="btn btn-danger" data-toggle="modal">
								<i class="fa fa-times"></i>
								Excluir
							</button>
						</div>

						<div id="resultadoRemocaoAutor"></div>

					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
				</div>

			</div>
		</div>
	</div>

	<!-- aqui estamos importando o script para utilizar o metodo CriarRequest o que possibilita realizar a comunicação XML por navegadores diferentes --> 

	<script type="text/javascript" src="CriarRequest.js"></script>


	<script type="text/javascript">

		/* Aqui estamos nos comunicando com o PHP sem precisar recarregar a pagina através do Ajax.*/


		function getListaAutor() {

			var autor = document.getElementById("inputBusca").value;
			var result =  document.getElementById("resultadoListaAutor");
			var xmlreq = CriarRequest();

			result.innerHTML ='<div class="loader"></div>';

			xmlreq.open("GET", "service/AutorService.php?passo=listar&autor="+autor, true);

			xmlreq.onreadystatechange = function() {
				if (xmlreq.readyState == 4) {
					if (xmlreq.status == 200){
						result.innerHTML = xmlreq.responseText;
					}else {
						result.innerHTML = "Erro: " + xmlreq.statusText;
					}
				}
			};	
			xmlreq.send(null);	
		};


		function getListaSelectAutor() {

			var autor = document.getElementById("inputRemocao").value;
			var result =  document.getElementById("resultadoSelectAutor");
			var xmlreq = CriarRequest();

			result.innerHTML ='<div class="loader"></div>';

			xmlreq.open("GET", "service/AutorService.php?passo=listarSelect&autor="+autor, true);

			xmlreq.onreadystatechange = function() {
				if (xmlreq.readyState == 4) {
					if (xmlreq.status == 200){
						result.innerHTML = xmlreq.responseText;
					}else {
						result.innerHTML = "Erro: " + xmlreq.statusText;
					}
				}
			};	
			xmlreq.send(null);	
		};


		$(function() {

			$("#cadAutor").submit(function(e) {

				e.preventDefault();
				$.ajax({
					type: "POST",
					url: $(this).attr("action"),
					data: $(this).serialize(),
					success: function(response) {
					$('#resultadoCadastroAutor').html(response);
				}			 
				});
			});

			$("#editAutor").submit(function(e) {

				e.preventDefault();
				$.ajax({
					type: "POST",
					url: $(this).attr("action"),
					data: $(this).serialize(),
					success: function(response) {
						$('#resultadoEdicaoAutor').html(response);
				  	/*
				  	$('#editAutor').each (function(){
  						this.reset();
					});
					*/
				}			 
			});
			});

			$("#removAutor").submit(function(e) {

				e.preventDefault();
				$.ajax({
					type: "POST",
					url: $(this).attr("action"),
					data: $(this).serialize(),
					success: function(response) {
						$('#resultadoRemocaoAutor').html(response);
				  	/*
				  	$('#removAutor').each (function(){
  						this.reset();
					});
					*/
				}			 
			});
			});

    	// aqui estamos transferindo os dados para os modais de exclusão e alteração.





    	$('#resultadoListaAutor').on('click', '.lautor > td:nth-child(2) button', function(){

    		var nome = $(this).attr('nomeAutor');
    		var codigo = $(this).attr('codigoAutor');

    		var inputNome = document.getElementById("inputAutor");
    		var inputCodigo = document.getElementById("inputCodigo");

    		inputNome.value = nome;
    		inputCodigo.value = codigo;

    	});

    	$('#resultadoListaAutor').on('click', '.lautor > td:nth-child(1) button', function(){

    		var nome = $(this).attr('nomeAutor');
    		var codigo = $(this).attr('codigoAutor');

    		var inputNome = document.getElementById("inputRAutor");
    		var inputCodigo = document.getElementById("inputRCodigo");

    		inputNome.value = nome;
    		inputCodigo.value = codigo;

    	});

    	$('.modal').on('click', '.limpar-modal', function() {

    		$('.alert').remove();
    		$('#resultadoSelectAutor > *').remove();
    		document.getElementById('inputEdicao').value='';
    		document.getElementById('inputRemocao').value='';
    		document.getElementById('inputCadastro').value='';

    	});		

    });






</script>