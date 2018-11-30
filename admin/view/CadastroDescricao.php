<h2 class="espacoForm">
	<center>
		<i class="fa fa-clipboard"></i>
		GERENCIAMENTO DE CATEGORIA
	<center>
</h2>
	<div class="container1">
		<form action="" id="cadCategoria" method="post">	
			<div class="form-row align-items-center espacoForm">
				<div class="col-sm-6">
		     		 <input type="text" class="form-control" id="inputCategoria" name="cadastroCategoria" placeholder="">
		    	</div>
		  		<div class="col-auto my-1">
			      	<button type="submit" class="btn btn-primary">
			      		<i class="fa fa-plus"></i>
			      		Adicionar Categoria
			      	</button>
			    </div>
			</div>
		</form>
		<div id="resultadoCadasstroCategoria"></div>
		<div id="resultadoListaCategoria"></div>

		
		

	</div>


	<!-- MODAL editar categoria --> 

	<div class="modal fade" id="editarCategoriaModal" data-backdrop="static">
	  <div class="modal-dialog" >
	    <div class="modal-content" >

	      <div class="modal-header">
	        <h4 class="modal-title">Editar Categoria</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	    <div class="modal-body">

	    	<form action="service/CategoriaService.php?passo=alterar" id="editCategoria" method="post">
		    
		    <label for="inputMim" class="col-sm-1 col-form-label">Código:</label>	
			    <div class="col-sm-6">
			     	<input type="text" class="form-control" id="inputCodigoCategoria" name="textCodigoCategoria" readonly="true">
			    </div> 
			
			<label for="inputMax" class="col-sm-1 col-form-label">Categoria:</label>
			    <div class="col-sm-10">
			     	<input type="text" class="form-control" id="inputEdicaoCategoria" name="textCategoria" readonly="true" style="margin-bottom: 3%;">
			    </div>
			
			<label for="inputMax" class="col-sm-5 col-form-label">Novo Nome:</label>	
			<div class="form-row align-items-center espacoForm">
		      	<div class="col-sm-9">
		     		 <input type="text" class="form-control" id="inputNovaCategoria" name="edicaoCategoria">
		    	</div>
		  		
		  		<div class="col-auto my-1">
			      	<button type="submit" class="btn btn-success" data-toggle="modal">
						<i class="fa fa-floppy-o"></i>
						Editar
					</button>
			    </div>
			    
			    <div id="resultadoEdicaoCategoria"></div>
			
			</div>
		
			</form>
	  		
	    </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
	      </div>

	    </div>
	  </div>
	</div>

	<!-- MODAL adicionar descricao --> 

	<div class="modal fade" id="addDescricaoModal" data-backdrop="static">
	  <div class="modal-dialog modal-lg" >
	    <div class="modal-content" >

	      <div class="modal-header">
	        <h4 class="modal-title">Gerenciar Descrição</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	    <div class="modal-body">

	    	<form action="" id="cadDescricao" method="post">
		    	
		    	<div class="form-row align-items-center espacoForm">
				    <label for="inputMim" class="col-sm-2 col-form-label"><b>Código:</b></label>	
					<div class="col-sm-3">
					     <input type="text" class="form-control" id="inputCodigoCategoria2" name="textCodigoCategoria" readonly="true">
					</div> 
				</div>

				<div class="form-row align-items-center espacoForm">
					<label for="inputMax" class="col-sm-2 col-form-label"><b>Categoria:</b></label>
					<div class="col-sm-6">
					     <input type="text" class="form-control" id="inputEdicaoCategoria2" name="textCategoria" readonly="true">
					</div>
				</div>

				<div class="form-row align-items-center espacoForm">
				    <label for="inputMim" class="col-sm-2 col-form-label">Nova Descrição:</label>	
					<div class="col-sm-6">
					     <input type="text" class="form-control" id="inputNovaDescricao" name="textNovaDescricao">
					</div> 
				</div>

				<div class="form-row align-items-center espacoForm">
					<label for="inputMax" class="col-sm-2 col-form-label">(-) R$:</label>
					<div class="col-sm-3">
					     <input type="text" class="form-control" id="inputValorReducao" name="textValorReducao">
					</div>
					<div class="col-auto my-1">
				      	<button type="submit" class="btn btn-primary">
				      	<i class="fa fa-plus"></i>
				      	Adicionar Descrição
				      	</button>
				    </div>
				</div>

			</form>


			<div id="resultadoCadasstroDescricao"></div>
			<div id="resultadoListaDescricao"></div> 		
		
			
	  		
	    </div>




	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
	      </div>

	    </div>
	  </div>
	</div>



	<!-- MODAL editar Descricao --> 

	<div class="modal fade" id="editarDescricaoModal" data-backdrop="static">
	  <div class="modal-dialog" >
	    <div class="modal-content" >

	      <div class="modal-header">
	        <h4 class="modal-title">Editar Descricao</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	    <div class="modal-body">

	    	<form action="service/DescricaoService.php?passo=alterar" id="editDescricao" method="post">


	    		<label for="inputMim" class="col-sm-1 col-form-label">Código:</label>	
			    <div class="col-sm-6">
			     	<input type="text" class="form-control" id="inputCodigoDescricao" name="textCodigoDescricao" readonly="true">
			    </div> 
			
				<label for="inputMax" class="col-sm-1 col-form-label">Descricao:</label>
			    <div class="col-sm-10">
			     	<input type="text" class="form-control" id="inputEdicaoDescricao" name="textDescricao" readonly="true" style="margin-bottom: 3%;">
			    </div>

		    
		   		
					<label for="inputMim" class="col-sm-4 col-form-label">Nova Descrição:</label>	
					<div class="col-sm-10">
					     <input type="text" class="form-control" id="inputNovaDescricao2" name="textNovaDescricao2">
					</div> 
				

				
					<label for="inputMax" class="col-sm-2 col-form-label">(-) R$:</label>
					<div class="col-sm-3">
					     <input type="text" class="form-control" id="inputValorReducao2" name="textValorReducao2">
				</div>

				<div class="col-auto my-1">
			      	<button type="submit" class="btn btn-success" data-toggle="modal">
						<i class="fa fa-floppy-o"></i>
						Editar
					</button>
			    </div>
		
			</form>

			<div id="resultadoEdicaoDescricao"></div>
	  		
	  	</div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
	      </div>

	    </div>
	  </div>
	</div>


<script type="text/javascript" src="CriarRequest.js"></script>
<script type="text/javascript">



//http://www.tiexpert.net/programacao/web/javascript/alert-confirm-prompt.php
	
	$(document).ready(function(){

		var result =  document.getElementById("resultadoListaCategoria");
		var xmlreq = CriarRequest();

		result.innerHTML ='<div class="loader"></div>';

		xmlreq.open("GET", "service/CategoriaService.php?passo=listar", true);
		
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

	});	



     	$("#cadCategoria").submit(function(e) {
   		
    		var categoria = document.getElementById("inputCategoria").value;
    		var c = confirm("Deseja adicionar a categoria "+categoria+" ?");

    		if (c) {
    			
    			e.preventDefault();
    			
    			$.ajax({
  				type: "POST",
				url: "service/CategoriaService.php?passo=cadastrar",
				data: $(this).serialize(),
				success: function(response) {

						
						$('#cadCategoria').each (function(){
  							this.reset();
						});

						$('#resultadoCadasstroCategoria').html(response);
						
						
					}
				});
    		}

    		var result =  document.getElementById("resultadoListaCategoria");
    		var xmlreq = CriarRequest();

    		result.innerHTML ='<div class="loader"></div>';

    		xmlreq.open("GET", "service/CategoriaService.php?passo=listar", true);

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

    	});	



    	$("#cadDescricao").submit(function(e) {
   		
    		var descricao = document.getElementById("inputNovaDescricao").value;
    		var c = confirm("Deseja adicionar a descrição "+descricao+" ?");
    		

    		if (c) {
    			
    			e.preventDefault();
    			
    			$.ajax({
  				type: "POST",
				url: "service/DescricaoService.php?passo=cadastrar",
				data: $(this).serialize(),
				success: function(response) {
						$('#resultadoCadasstroDescricao').html(response);
					}
				});
    		}
    		var codigo = document.getElementById('inputCodigoCategoria2').value;


    		var result =  document.getElementById("resultadoListaDescricao");
    		var xmlreq = CriarRequest();

    		result.innerHTML ='<div class="loader"></div>';

    		xmlreq.open("GET", "service/DescricaoService.php?passo=listar&codigo="+codigo, true);
    		
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
    	});	
		
    	$("#editCategoria").submit(function(e) {
    			
    		e.preventDefault();
    		$.ajax({
  			type: "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function(response) {
				  	$('#resultadoEdicaoCategoria').html(response);
				}			 
			});
    		var result =  document.getElementById("resultadoListaCategoria");
    		var xmlreq = CriarRequest();

    		result.innerHTML ='<div class="loader"></div>';

    		xmlreq.open("GET", "service/CategoriaService.php?passo=listar", true);

    		xmlreq.onreadystatechange = function() {
    			if (xmlreq.readyState == 4) {
    				if (xmlreq.status == 200){
    					result.innerHTML = xmlreq.responseText;
    				}else {
    					result.innerHTML = "Erro: " + xmlreq.statusText;
    				}
    			}
    		};	
    		$('#inputValorReducao').maskMoney();
    		xmlreq.send(null);
    	});	

    	$("#editDescricao").submit(function(e) {
    			
    		e.preventDefault();
    		$.ajax({
  			type: "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function(response) {
				  	$('#resultadoEdicaoDescricao').html(response);
				}			 
			});

    		var codigo = document.getElementById('inputCodigoCategoria2').value;

    		var result =  document.getElementById("resultadoListaDescricao");
    		var xmlreq = CriarRequest();

    		result.innerHTML ='<div class="loader"></div>';

    		xmlreq.open("GET", "service/DescricaoService.php?passo=listar&codigo="+codigo, true);

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
    	});


    	$('#resultadoListaCategoria').on('click', '.lcategoria > td:nth-child(5) button', function(){
	        	
	        	var codigo = $(this).attr('codigoCategoria');
	        	var status = $(this).attr('statusCategoria');


				var result =  document.getElementById("resultadoCadasstroCategoria");
				var xmlreq = CriarRequest();

				result.innerHTML ='<div class="loader"></div>';

				xmlreq.open("GET", "service/CategoriaService.php?passo=alterarStatus&codigo="+codigo+"&status="+status, true);
		
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

				
				var result2 =  document.getElementById("resultadoListaCategoria");
				var xmlreq2 = CriarRequest();
			
				result2.innerHTML ='<div class="loader"></div>';

				xmlreq2.open("GET", "service/CategoriaService.php?passo=listar", true);
		
				xmlreq2.onreadystatechange = function() {
					if (xmlreq2.readyState == 4) {
						if (xmlreq2.status == 200){
							result2.innerHTML = xmlreq2.responseText;
						}else {
							result2.innerHTML = "Erro: " + xmlreq2.statusText;
						}
					}
				};	

				xmlreq2.send(null);

				
	    		
    	});

    	$('#resultadoListaDescricao').on('click', '.ldescricao > td:nth-child(5) button', function(){
	        	
	        	var codigo = $(this).attr('codigoDescricao');
	        	var status = $(this).attr('statusDescricao');


				var result =  document.getElementById("resultadoCadasstroDescricao");
				var xmlreq = CriarRequest();

				result.innerHTML ='<div class="loader"></div>';

				xmlreq.open("GET", "service/DescricaoService.php?passo=alterarStatus&codigo="+codigo+"&status="+status, true);
		
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


				var result2 =  document.getElementById("resultadoListaDescricao");
				var xmlreq2 = CriarRequest();

				var codigo = document.getElementById('inputCodigoCategoria2').value;
			
				result2.innerHTML ='<div class="loader"></div>';

				//window.setInterval('funcao()', 5000);

				sleep(2000);

				xmlreq2.open("GET", "service/DescricaoService.php?passo=listar&codigo="+codigo, true);
		
				xmlreq2.onreadystatechange = function() {
					if (xmlreq2.readyState == 4) {
						if (xmlreq2.status == 200){
							result2.innerHTML = xmlreq2.responseText;
						}else {
							result2.innerHTML = "Erro: " + xmlreq2.statusText;
						}
					}
				};	

				xmlreq2.send(null);

    	});



    	$('#resultadoListaCategoria').on('click', '.lcategoria > td:nth-child(1)  button', function(){
	        	
				var nome = $(this).attr('nomeCategoria');
	        	var codigo = $(this).attr('codigoCategoria');

	        	var inputNome = document.getElementById('inputEdicaoCategoria');
				var inputCodigo = document.getElementById('inputCodigoCategoria');

				inputNome.value = nome;
				inputCodigo.value = codigo;
	    		
    	});

    	$('#resultadoListaCategoria').on('click', '.lcategoria > td:nth-child(2)  button', function(){
	        	
				var nome = $(this).attr('nomeCategoria');
	        	var codigo = $(this).attr('codigoCategoria');

	        	var inputNome = document.getElementById('inputEdicaoCategoria2');
				var inputCodigo = document.getElementById('inputCodigoCategoria2');

				inputNome.value = nome;
				inputCodigo.value = codigo;

				var result =  document.getElementById("resultadoListaDescricao");
				var xmlreq = CriarRequest();

				result.innerHTML ='<div class="loader"></div>';

				xmlreq.open("GET", "service/DescricaoService.php?passo=listar&codigo="+codigo, true);
		
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



	    		
    	});

    	$('#resultadoListaDescricao').on('click', '.ldescricao > td:nth-child(1)  button', function(){
	        	
				var nome = $(this).attr('nomeDescricao');
	        	var codigo = $(this).attr('codigoDescricao');

	        	var inputNome = document.getElementById('inputEdicaoDescricao');
				var inputCodigo = document.getElementById('inputCodigoDescricao');

				inputNome.value = nome;
				inputCodigo.value = codigo;
	    		
    	});


    	$('.modal').on('click', '.limpar-modal', function() {

    		$('.alert').remove();
    		document.getElementById('inputNovaDescricao').value='';
    		document.getElementById('inputValorReducao').value='';
    		document.getElementById('inputNovaCategoria').value='';
    		document.getElementById('inputValorReducao2').value='';
    		document.getElementById('inputNovaDescricao2').value='';


    	});	

	
    	function sleep(milliseconds) {
  			var start = new Date().getTime();
 				 for (var i = 0; i < 1e7; i++) {
    				if ((new Date().getTime() - start) > milliseconds){
     			break;
    			}
 			 }
 		}	 


</script>