
<!-- TELA INICIAL -->

<h2 class="espacoForm"><center><i class="fa fa-pencil"></i>CADASTRO DE ASSUNTO<center></h2>
	<div class="container1">
		<form action="" method="post">	
			<div class="form-row align-items-center espacoForm">
				<div class="col-sm-6">
					<input type="text" class="form-control" id="inputBusca" name="buscaAssunto" placeholder="">
				</div>
				<div class="col-auto my-1">
					<button type="button" class="btn btn-primary" onclick="getListaAssunto();">
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
		<div id="resultadoListaAssunto"></div>
	</div>

	<!-- Modal de Cadastro  -->

	<div class="modal fade" id="cadastroModal" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Cadastrar Assunto</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<form action="service/AssuntoService.php?passo=cadastrar" id="cadAssunto" method="post">	
						<div class="form-row align-items-center espacoForm">
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputCadastro" name="cadastroAssunto" placeholder="">
							</div>
							<div class="col-auto my-1">
								<button type="submit" class="btn btn-success" data-toggle="modal">
									<i class="fa fa-floppy-o"></i>
									Salvar
								</button>
							</div>
							<div id="resultadoCadastroAssunto"></div>
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
					<h4 class="modal-title">Alterar Assunto</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">

					<form action="service/AssuntoService.php?passo=alterar" id="editAssunto" method="post">

						<label for="inputMim" class="col-sm-1 col-form-label">Código:</label>	
						<div class="col-sm-6">
							<input type="text" class="form-control" id="inputCodigo" name="textCodigo" readonly="true">
						</div> 

						<label for="inputMax" class="col-sm-1 col-form-label">Assunto:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputAssunto" name="textAssunto" readonly="true" style="margin-bottom: 3%;">
						</div>

						<label for="inputMax" class="col-sm-5 col-form-label">Novo Nome:</label>	
						<div class="form-row align-items-center espacoForm">
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputEdicao" name="edicaoAssunto">
							</div>

							<div class="col-auto my-1">
								<button type="submit" class="btn btn-success" data-toggle="modal">
									<i class="fa fa-floppy-o"></i>
									Editar
								</button>
							</div>

							<div id="resultadoEdicaoAssunto"></div>

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
					<h4 class="modal-title">Excluir Assunto</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<form action="service/AssuntoService.php?passo=excluir" id="removAssunto" method="post">

						<label for="inputMim" class="col-sm-1 col-form-label">Código:</label>	
						<div class="col-sm-6">
							<input type="text" class="form-control" id="inputRCodigo" name="textRCodigo" readonly="true">
						</div> 

						<label for="inputMax" class="col-sm-5 col-form-label">Assunto à ser excluido:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputRAssunto" name="textRAssunto" readonly="true" style="margin-bottom: 3%;">
						</div>

						<label for="inputMax" class="col-sm-6 col-form-label">Assunto à ser transferido:</label>	
						<div class="form-row align-items-center espacoForm">
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputRemocao" name="remocaoAssunto">
							</div>
							<div class="col-auto my-1">
								<button type="button" class="btn btn-primary" data-toggle="modal" onclick="getListaSelectAssunto();">
									<i class="fa fa-search"></i>
									Buscar
								</button>
							</div>
							<div class="col-sm-10 espacoForm" id="resultadoSelectAssunto"></div>
						</div>

						<div class="col-auto my-1">
							<button type="submit" class="btn btn-danger" data-toggle="modal">
								<i class="fa fa-times"></i>
								Excluir
							</button>
						</div>

						<div id="resultadoRemocaoAssunto"></div>

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


		function getListaAssunto() {

			var assunto = document.getElementById("inputBusca").value;
			var result =  document.getElementById("resultadoListaAssunto");
			var xmlreq = CriarRequest();

			result.innerHTML ='<div class="loader"></div>';

			xmlreq.open("GET", "service/AssuntoService.php?passo=listar&assunto="+assunto, true);

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


		function getListaSelectAssunto() {

			var assunto = document.getElementById("inputRemocao").value;
			var result =  document.getElementById("resultadoSelectAssunto");
			var xmlreq = CriarRequest();

			result.innerHTML ='<div class="loader"></div>';

			xmlreq.open("GET", "service/AssuntoService.php?passo=listarSelect&assunto="+assunto, true);

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

			$("#cadAssunto").submit(function(e) {

				e.preventDefault();
				$.ajax({
					type: "POST",
					url: $(this).attr("action"),
					data: $(this).serialize(),
					success: function(response) {
						$('#resultadoCadastroAssunto').html(response);
					}			 
				});
			});

			$("#editAssunto").submit(function(e) {

				e.preventDefault();
				$.ajax({
					type: "POST",
					url: $(this).attr("action"),
					data: $(this).serialize(),
					success: function(response) {
						$('#resultadoEdicaoAssunto').html(response);
					}			 
				});
			});

			$("#removAssunto").submit(function(e) {

				e.preventDefault();
				$.ajax({
					type: "POST",
					url: $(this).attr("action"),
					data: $(this).serialize(),
					success: function(response) {
						$('#resultadoRemocaoAssunto').html(response);

					}			 
				});
			});

			$('#resultadoListaAssunto').on('click', '.lassunto > td:nth-child(2) button', function(){

				var nome = $(this).attr('nomeAssunto');
				var codigo = $(this).attr('codigoAssunto');

				var inputNome = document.getElementById("inputAssunto");
				var inputCodigo = document.getElementById("inputCodigo");

				inputNome.value = nome;
				inputCodigo.value = codigo;

			});

			$('#resultadoListaAssunto').on('click', '.lassunto > td:nth-child(1) button', function(){

				var nome = $(this).attr('nomeAssunto');
				var codigo = $(this).attr('codigoAssunto');

				var inputNome = document.getElementById("inputRAssunto");
				var inputCodigo = document.getElementById("inputRCodigo");

				inputNome.value = nome;
				inputCodigo.value = codigo;

			});

			$('.modal').on('click', '.limpar-modal', function() {

				$('.alert').remove();
				$('#resultadoSelectAssunto > *').remove();
				document.getElementById('inputEdicao').value='';
				document.getElementById('inputRemocao').value='';
				document.getElementById('inputCadastro').value='';

			});		

		});


	</script>