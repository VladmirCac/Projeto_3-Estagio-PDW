
<!-- TELA INICIAL -->

<h2 class="espacoForm">
	<center>
		<i class="fa fa-pencil"></i>
		CADASTRO DE EDITORA
	<center>
</h2>
	<div class="container1">
		<form action="" method="post">	
			<div class="form-row align-items-center espacoForm">
		      	<div class="col-sm-6">
		     		 <input type="text" class="form-control" id="inputBusca" name="buscaEditora" placeholder="">
		    	</div>
		  		<div class="col-auto my-1">
			      	<button type="button" class="btn btn-primary" onclick="getListaEditora();">
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
		<div id="resultadoListaEditora"></div>
	</div>

<!-- Modal de Cadastro  -->

<div class="modal fade" id="cadastroModal" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Cadastrar Editora</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="service/EditoraService.php?passo=cadastrar" id="cadEditora" method="post">	
			<div class="form-row align-items-center espacoForm">
		      	<div class="col-sm-9">
		     		 <input type="text" class="form-control" id="inputCadastro" name="cadastroEditora" placeholder="">
		    	</div>
		  		<div class="col-auto my-1">
			      	<button type="submit" class="btn btn-success" data-toggle="modal">
						<i class="fa fa-floppy-o"></i>
						Salvar
					</button>
			    </div>
			    <div id="resultadoCadastroEditora"></div>
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
        <h4 class="modal-title">Alterar Editora</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        
        <form action="service/EditoraService.php?passo=alterar" id="editEditora" method="post">
		    
		    <label for="inputMim" class="col-sm-1 col-form-label">Código:</label>	
			    <div class="col-sm-6">
			     	<input type="text" class="form-control" id="inputCodigo" name="textCodigo" readonly="true">
			    </div> 
			
			<label for="inputMax" class="col-sm-1 col-form-label">Editora:</label>
			    <div class="col-sm-10">
			     	<input type="text" class="form-control" id="inputEditora" name="textEditora" readonly="true" style="margin-bottom: 3%;">
			    </div>
			
			<label for="inputMax" class="col-sm-5 col-form-label">Novo Nome:</label>	
			<div class="form-row align-items-center espacoForm">
		      	<div class="col-sm-9">
		     		 <input type="text" class="form-control" id="inputEdicao" name="edicaoEditora">
		    	</div>
		  		
		  		<div class="col-auto my-1">
			      	<button type="submit" class="btn btn-success" data-toggle="modal">
						<i class="fa fa-floppy-o"></i>
						Editar
					</button>
			    </div>
			    
			    <div id="resultadoEdicaoEditora"></div>
			
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
        <h4 class="modal-title">Excluir Editora</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="service/EditoraService.php?passo=excluir" id="removEditora" method="post">
		    
		    <label for="inputMim" class="col-sm-1 col-form-label">Código:</label>	
			    <div class="col-sm-6">
			     	<input type="text" class="form-control" id="inputRCodigo" name="textRCodigo" readonly="true">
			    </div> 
			
			<label for="inputMax" class="col-sm-5 col-form-label">Editora à ser excluido:</label>
			    <div class="col-sm-10">
			     	<input type="text" class="form-control" id="inputREditora" name="textREditora" readonly="true" style="margin-bottom: 3%;">
			    </div>
			
			<label for="inputMax" class="col-sm-6 col-form-label">Editora à ser transferido:</label>	
			<div class="form-row align-items-center espacoForm">
		      	<div class="col-sm-9">
		     		 <input type="text" class="form-control" id="inputRemocao" name="remocaoEditora">
		    	</div>
		  		<div class="col-auto my-1">
			      	<button type="button" class="btn btn-primary" data-toggle="modal" onclick="getListaSelectEditora();">
						<i class="fa fa-search"></i>
						Buscar
					</button>
			    </div>
			    <div class="col-sm-10 espacoForm" id="resultadoSelectEditora"></div>
			</div>
			
			<div class="col-auto my-1">
			      	<button type="submit" class="btn btn-danger" data-toggle="modal">
						<i class="fa fa-times"></i>
						Excluir
					</button>
			 </div>

			<div id="resultadoRemocaoEditora"></div>

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


	function getListaEditora() {

		var editora = document.getElementById("inputBusca").value;
		var result =  document.getElementById("resultadoListaEditora");
		var xmlreq = CriarRequest();

		result.innerHTML ='<div class="loader"></div>';

		xmlreq.open("GET", "service/EditoraService.php?passo=listar&editora="+editora, true);
		
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


	function getListaSelectEditora() {

		var editora = document.getElementById("inputRemocao").value;
		var result =  document.getElementById("resultadoSelectEditora");
		var xmlreq = CriarRequest();

		result.innerHTML ='<div class="loader"></div>';

		xmlreq.open("GET", "service/EditoraService.php?passo=listarSelect&editora="+editora, true);
		
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

    	$("#cadEditora").submit(function(e) {
    			
    		e.preventDefault();
    		$.ajax({
  			type: "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function(response) {
				  	$('#resultadoCadastroEditora').html(response);
				
				}			 
			});
    	});

    	$("#editEditora").submit(function(e) {
    			
    		e.preventDefault();
    		$.ajax({
  			type: "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function(response) {
				  	$('#resultadoEdicaoEditora').html(response);
				  
				}			 
			});
    	});

    	$("#removEditora").submit(function(e) {
    			
    		e.preventDefault();
    		$.ajax({
  			type: "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function(response) {
				  	$('#resultadoRemocaoEditora').html(response);
				
				}			 
			});
    	});

    	// aqui estamos transferindo os dados para os modais de exclusão e alteração.




   	
    	$('#resultadoListaEditora').on('click', '.leditora > td:nth-child(2) button', function(){
	        	
				var nome = $(this).attr('nomeEditora');
	        	var codigo = $(this).attr('codigoEditora');

	        	var inputNome = document.getElementById("inputEditora");
				var inputCodigo = document.getElementById("inputCodigo");

				inputNome.value = nome;
				inputCodigo.value = codigo;
	    		
    		});

    	$('#resultadoListaEditora').on('click', '.leditora > td:nth-child(1) button', function(){
	        	
				var nome = $(this).attr('nomeEditora');
	        	var codigo = $(this).attr('codigoEditora');

	        	var inputNome = document.getElementById("inputREditora");
				var inputCodigo = document.getElementById("inputRCodigo");

				inputNome.value = nome;
				inputCodigo.value = codigo;
	    		
    		});

    	$('.modal').on('click', '.limpar-modal', function() {

    		$('.alert').remove();
    		$('#resultadoSelectEditora > *').remove();
    		document.getElementById('inputEdicao').value='';
    		document.getElementById('inputRemocao').value='';
    		document.getElementById('inputCadastro').value='';

    	});		

    });






</script>