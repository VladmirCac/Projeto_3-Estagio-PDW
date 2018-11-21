<h2 class="espacoForm"><center><i class="fa fa-search"></i>BUSCAR LIVROS</center></h2>
<div class="container1">
	<form id="buscaLivros" action="service/LivroService.php?passo=listarBusca" method="post">
		<div class="form-row align-items-center espacoForm">
			<div class="col-sm-2">
				<select id="inputTipoBusca" class="form-control" name="tipoBusca">
					<option value="Titulo">Título</option>
					<option value="Autor">Autor</option>
					<option value="ISBN">ISBN</option>
					<option value="Codigo">Código</option>
				</select>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputBusca" name="busca">
			</div>
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-search-plus"></i>
				Consultar
			</button>
		</div>
	</form>

	<div class="form-row align-items-center espacoForm">
		<div class="col-sm-2">
			<select id="inputFiltro" class="form-control">
				<option value="1">Ano</option>
				<option value="2">Editora</option>
			</select>
		</div>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="inputBusca" placeholder="...">
		</div>
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-filter"></i>
			Filtrar
		</button>

	</div>
	<div id='resultadoBuscaLivros'></div>
</div>

<!-- MODAL ALTERAR LIVRO -->

<div class="modal fade" id="alterarLivroModal" data-backdrop="static">
	<div class="modal-dialog modal-xl" >
		<div class="modal-content" >

			<div class="modal-header">
				<h4 class="modal-title">Editar Livro</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body" style="background-color: #ede7e7;">

				<div id="resultadoSelectAlterarLivro"></div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger limpar-modal" data-dismiss="modal">Fechar</button>
			</div>

		</div>
	</div>
</div>

<!-- Modal de Confirmação de Alteracao de livro -->

<div class="modal fade" id="confirmacaoAlteracaoLivro" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content" id="resultadoAlteracaoLivro">
    </div>
  </div>
</div>

<!-- Modal de Cadastro Livro Descrito -->

	<div class="modal fade" id="addLivroDescritoModal" data-backdrop="static">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content" >

	      <div class="modal-header">
	        <h4 class="modal-title">Adicionar Livro Descrito</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	    <div class="modal-body">

	    	<div id="resultadoSelectLivro"></div>

	    	<ul class="nav nav-tabs">
  				<li class="nav-item">
    				<a class="nav-link active" data-toggle="tab" href="#cadastrar">Cadastrar</a>
  				</li>
  				<li class="nav-item">
    				<a class="nav-link" data-toggle="tab" href="#alterar">Alterar</a>
  				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane container active" id="cadastrar">
					
					<form id="cadLivroDescrito" action="service/LivroDescritoService.php?passo=cadastrar" method="post">
						
						<div class="form-row align-items-center espacoForm">
							
							<label for="codigoLivro" class="col-sm-1 col-form-label">Código:</label>
	    					<div class="col-sm-2">
	     		 				<input type="text" class="form-control" id="codigoLivro" name="codigoLivro" readonly="true">
	    					</div>

	    					<label for="subcodigoLivro" class="col-sm-2 col-form-label">Sub.Código:</label>
	    					<div class="col-sm-1">
	     		 				<input type="text" class="form-control" id="inputSubCodigoLivro" name="subCodigoLivro" required onkeyup="somenteLetras(this);" maxlength="1">
	    					</div>
	  	
	  					</div>

	  					<div class="form-row align-items-center espacoForm">

	  						<label for="inputLivro" class="col-sm-1 col-form-label">Valor:</label>
	    					<div class="col-sm-2">
	     		 				<input type="text" class="form-control" id="inputValor" name="valorLivro" readonly="true">
	    					</div>

	    					<label for="inputQtd" class="col-sm-2 col-form-label">Qtd:</label>
	    					<div class="col-sm-1">
	     		 				<input type="text" class="form-control" id="inputQtd" name="qtdLivro" required onkeyup="somenteNumeros(this);" maxlength="3">
	    					</div>

	    				</div>

	  					<div class="form-row align-items-center espacoForm">
	  						<label for="obsLivro" class="col-sm-1 col-form-label">Obs.:</label>
	    					<div class="col-sm-8">
	     		 				<input type="text" class="form-control" id="inputObsLivro" name='obsLivro'>
	    					</div>
	  					</div>

	  					<div id="resultadoListaSelectDescricao"></div> 
	  					
		        		<button type="submit" class="btn btn-success">
		        			<i class="fa fa-floppy-o"></i>
		        			Salvar Livro Descrito
		        		</button>	

					</form>
					
				
				</div>

				<div class="tab-pane container active" id="alterar">

					<div id="resultadoListaLivrosDescritos"></div>

				</div>	
			</div>	
	    </div>
	    </div>
	  </div>
	</div>

<!-- Modal de Confirmação de Cadastro de Livro Descrito -->

<div class="modal fade" id="confirmacaoCadastroLivroDescrito" data-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="resultadoCadastroLivroDescrito">
    </div>
  </div>
</div>

<!-- Modal de Alteração de Livro Descrito -->

	<div class="modal fade" id="alterarDescricaoModal" data-backdrop="static">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content" >

	      <div class="modal-header">
	        <h4 class="modal-title">Alterar Descrição</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	    <div class="modal-body">
					
					<form id="alterarDescricao" action="service/LivroDescritoService.php?passo=alterarDescricao" method="post">
						
						<div class="form-row align-items-center espacoForm">
							
							<label for="codigoLivro2" class="col-sm-2 col-form-label">Código Livro Descrito:</label>
	    					<div class="col-sm-2">
	     		 				<input type="text" class="form-control" id="codigoLivro2" name="codigoLivro" readonly="true">
	    					</div>
	  	
	  					</div>

	  					<div class="form-row align-items-center espacoForm">

	  						<label for="inputLivro2" class="col-sm-2 col-form-label">Valor Base:</label>
	    					<div class="col-sm-2">
	     		 				<input type="text" class="form-control" id="inputValor2" name="valorLivro" readonly="true">
	    					</div>

	    				</div>

	  					<div class="form-row align-items-center espacoForm">
	  						<label for="obsLivro" class="col-sm-1 col-form-label">Obs.:</label>
	    					<div class="col-sm-8">
	     		 				<input type="text" class="form-control" id="inputObsLivro" name='obsLivro'>
	    					</div>
	  					</div>

	  					<div id="resultadoListaSelectDescricao2"></div> 
	  					
		        		<button type="submit" class="btn btn-success">
		        			<i class="fa fa-floppy-o"></i>
		        			Alterar Descrição
		        		</button>	

					</form>
					
				
				</div>


			</div>
							
	  		
	    </div>

	</div>


<script src="//plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js"></script>

<script type="text/javascript" src="CriarRequest.js"></script>

<script type="text/javascript">


	function somenteNumeros(num) {
		var er = /[^0-9.]/;
		er.lastIndex = 0;
		var campo = num;
		if (er.test(campo.value)) {
			campo.value = "";
		}
	}

	function somenteLetras(num) {
		var er = /[^a-zA-Z.]/;
		er.lastIndex = 0;
		var campo = num;
		if (er.test(campo.value)) {
			campo.value = "";
		}
	}

	$("#buscaLivros").submit(function(e) {

		e.preventDefault();
		$.ajax({
			type: "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function(response) {
				$('#resultadoBuscaLivros').html(response);
			}			 
		});
	});

	$('#resultadoBuscaLivros').on('click', '.lBuscaLivros > td:nth-child(1) button', function(){

		var codigo = $(this).attr('codigoLivro');

		var result =  document.getElementById("resultadoSelectAlterarLivro");
		var xmlreq = CriarRequest();

		result.innerHTML ='<div class="loader"></div>';

		xmlreq.open("GET", "service/LivroService.php?passo=selecAlterarLivro&codigo="+codigo, true);

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

	function getListaSelectAutor() {

		var autor = document.getElementById("inputAutor").value;
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

	function getListaSelectEditora() {

		var editora = document.getElementById("inputEditora").value;
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

	function getListaSelectAssunto() {

		var assunto = document.getElementById("inputAssunto").value;
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

	$('#resultadoBuscaLivros').on('click', '.exibirDescritos', function(){
			
			var codigo = $(this).attr('codigoLivro');
			var id ="'"+codigo+"'";
			var result = document.getElementById(codigo);
			var xmlreq = CriarRequest();


			if($(this).is(':checked')) { 

				result.innerHTML ='<div class="loader"></div>';

				xmlreq.open("GET", "service/LivroDescritoService.php?passo=listarLivroDescritoExibicao&codigo="+codigo, true);
		
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
					
			
			}else{

				result.innerHTML ='';

			}	


	});

	
	$('#resultadoSelectAlterarLivro').on('submit', '#altLivro', function(e){
	//$("#altLivro").submit(function(e) {

		e.preventDefault();
		$('#confirmacaoAlteracaoLivro').modal('show');
		
		
		var result =  document.getElementById("resultadoAlteracaoLivro");
		result.innerHTML ='<center><div class="loader"></div></center>';

    	$.ajax({
  		type: "POST",
		url: $(this).attr("action"),
		data: $(this).serialize(),
		success: function(response) {
				$('#resultadoAlteracaoLivro').html(response);
			}			 
		});
		
	});

	$('#resultadoAlteracaoLivro').on('click', '#btdFecharAlteracao', function(e){
		e.preventDefault();
		$('#confirmacaoAlteracaoLivro').modal('hide');
		$('#alterarLivroModal').modal('hide');

	});

	$('#resultadoBuscaLivros').on('click', '.btdAddLivroDescrito', function(e){

		e.preventDefault();
		$('#addLivroDescritoModal').modal('show');


		var valor = $(this).attr('precoLivro');
	    var codigo = $(this).attr('codigoLivro');

	    var inputValor = document.getElementById("inputValor");
		var inputCodigo = document.getElementById("codigoLivro");

		inputValor.value = valor;
		inputCodigo.value = codigo;


		var result =  document.getElementById("resultadoSelectLivro");
		var result2 =  document.getElementById("resultadoListaSelectDescricao");
		var result3 = document.getElementById("resultadoListaLivrosDescritos");
		var result4 =  document.getElementById("resultadoListaSelectDescricao2");
		
		result.innerHTML ='<center><div class="loader"></div></center>';
		
		result2.innerHTML ='<center><div class="loader"></div></center>';

		result3.innerHTML ='<center><div class="loader"></div></center>';

		result4.innerHTML ='<center><div class="loader"></div></center>';



		var xmlreq = CriarRequest();

		xmlreq.open("GET", "service/LivroService.php?passo=selectLivro&codigoLivro="+codigo, true);
		
		xmlreq.onreadystatechange = function() {
			if (xmlreq.readyState == 4) {
				if (xmlreq.status == 200){
					result.innerHTML = xmlreq.responseText;
				}else {
					result.innerHTML = "Erro: " + xmlreq.statusText;
				}
			}
		};	

		var xmlreq3 = CriarRequest();

		xmlreq3.open("GET", "service/LivroDescritoService.php?passo=listarAlteracao&codigoLivro="+codigo, true);
		
		xmlreq3.onreadystatechange = function() {
			if (xmlreq3.readyState == 4) {
				if (xmlreq3.status == 200){
					result3.innerHTML = xmlreq3.responseText;
				}else {
					result3.innerHTML = "Erro: " + xmlreq3.statusText;
				}
			}
		};	
		xmlreq3.send(null);

		xmlreq.send(null);		

		var xmlreq2 = CriarRequest();

		xmlreq2.open("GET", "service/DescricaoService.php?passo=listarAtivas", true);
		
		xmlreq2.onreadystatechange = function() {
			if (xmlreq2.readyState == 4) {
				if (xmlreq2.status == 200){
					result2.innerHTML = xmlreq2.responseText;
					result4.innerHTML = xmlreq2.responseText;
				}else {
					result2.innerHTML = "Erro: " + xmlreq2.statusText;
				}
			}
		};	
		xmlreq2.send(null);


	});

$('#resultadoCadastroLivro').on('click', '#btdAddOutroLivro', function(e){
		window.location.reload();	
	});

	
	$('#resultadoCadastroLivroDescrito').on('click', '#btdFinalizarCadastro ', function(e){
		window.location.reload();	
	});

	$("#cadLivroDescrito").submit(function(e) {

		e.preventDefault();
		$('#confirmacaoCadastroLivroDescrito').modal('show');
		var result =  document.getElementById("resultadoCadastroLivroDescrito");
		var result3 = document.getElementById("resultadoListaLivrosDescritos");

		result.innerHTML ='<center><div class="loader"></div></center>';
		result3.innerHTML ='<center><div class="loader"></div></center>';

    			
    	e.preventDefault();
    	$.ajax({
  		type: "POST",
		url: $(this).attr("action"),
		data: $(this).serialize(),
		success: function(response) {
				$('#resultadoCadastroLivroDescrito').html(response);
			}			 
		});

    	var codigo = document.getElementById('codigoLivro').value;
    	var xmlreq3 = CriarRequest();

		xmlreq3.open("GET", "service/LivroDescritoService.php?passo=listarAlteracao&codigoLivro="+codigo, true);
		
		xmlreq3.onreadystatechange = function() {
			if (xmlreq3.readyState == 4) {
				if (xmlreq3.status == 200){
					result3.innerHTML = xmlreq3.responseText;
				}else {
					result3.innerHTML = "Erro: " + xmlreq3.statusText;
				}
			}
		};	
		xmlreq3.send(null);



	});


	$("#alterarDescricao").submit(function(e) {

		e.preventDefault();
		var result = document.getElementById("resultadoListaLivrosDescritos");
		result.innerHTML ='<center><div class="loader"></div></center>';

		var codigo = $(this).attr('codigoLivro2');


    	e.preventDefault();
    	$.ajax({
  		type: "POST",
		url: $(this).attr("action"),
		data: $(this).serialize(),
		success: function(response) {
				alert(response);
				$('#alterarDescricaoModal').modal('hide');

			}			 
		});

		var xmlreq3 = CriarRequest();

    	xmlreq3.open("GET", "service/LivroDescritoService.php?passo=listarAlteracao&codigoLivro="+codigo, true);
		
		xmlreq3.onreadystatechange = function() {
			if (xmlreq3.readyState == 4) {
				if (xmlreq3.status == 200){
					result.innerHTML = xmlreq3.responseText;
				}else {
					result.innerHTML = "Erro: " + xmlreq3.statusText;
				}
			}
		};	
		xmlreq3.send(null);

	});

	$('#resultadoListaLivrosDescritos').on('click', '.btnAlterarDescricao', function(e){
		
		var valor = document.getElementById("inputValor").value;
	    var codigo = $(this).attr('codLivroDescrito');

	    var inputValor = document.getElementById("inputValor2");
		var inputCodigo = document.getElementById("codigoLivro2");

		inputValor.value = valor;
		inputCodigo.value = codigo;	


	});


	$('#resultadoListaLivrosDescritos').on('click', '.btnRemoverLivroDescrito', function(e){
		
		var total = document.getElementById("inptTotal").value;
		var qtd = document.getElementById("inputQtd").value;
	    var codigo = $(this).attr('codLivroDescrito');

	    var result = document.getElementById("resultadoListaLivrosDescritos");
		result.innerHTML ='<center><div class="loader"></div></center>';

		var xmlreq = CriarRequest();

    	xmlreq.open("GET", "service/LivroDescritoService.php?passo=removerLivroDescrito&codigoLivroDescrito="+codigo+"&totalLivros="+total+"&qtd="+qtd, true);
		
		xmlreq.onreadystatechange = function() {
			if (xmlreq.readyState == 4) {
				if (xmlreq.status == 200){
					alert(xmlreq.responseText);
				}else {
					alert("Erro: " + xmlreq.statusText);
				}
			}
		};	
		xmlreq.send(null);

		var xmlreq3 = CriarRequest();

    	xmlreq3.open("GET", "service/LivroDescritoService.php?passo=listarAlteracao&codigoLivro="+codigo, true);
		
		xmlreq3.onreadystatechange = function() {
			if (xmlreq3.readyState == 4) {
				if (xmlreq3.status == 200){
					result.innerHTML = xmlreq3.responseText;
				}else {
					result.innerHTML = "Erro: " + xmlreq3.statusText;
				}
			}
		};	
		xmlreq3.send(null);



	});


	$('#resultadoListaLivrosDescritos').on('click', '.btnAdicionarLivroDescrito', function(e){
		
		var total = document.getElementById("inptTotal").value;
		var qtd = document.getElementById("inputQtd").value;
	    var codigo = $(this).attr('codLivroDescrito');

	    var result = document.getElementById("resultadoListaLivrosDescritos");
		result.innerHTML ='<center><div class="loader"></div></center>';

		var xmlreq = CriarRequest();

    	xmlreq.open("GET", "service/LivroDescritoService.php?passo=adicionarLivroDescrito&codigoLivroDescrito="+codigo+"&totalLivros="+total+"&qtd="+qtd, true);
		
		xmlreq.onreadystatechange = function() {
			if (xmlreq.readyState == 4) {
				if (xmlreq.status == 200){
					alert(xmlreq.responseText);
				}else {
					alert("Erro: " + xmlreq.statusText);
				}
			}
		};	
		xmlreq.send(null);

		var xmlreq3 = CriarRequest();

    	xmlreq3.open("GET", "service/LivroDescritoService.php?passo=listarAlteracao&codigoLivro="+codigo, true);
		
		xmlreq3.onreadystatechange = function() {
			if (xmlreq3.readyState == 4) {
				if (xmlreq3.status == 200){
					result.innerHTML = xmlreq3.responseText;
				}else {
					result.innerHTML = "Erro: " + xmlreq3.statusText;
				}
			}
		};	
		xmlreq3.send(null);



	});


</script>