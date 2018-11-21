<h2 class="espacoForm">
	<center>
		<i class="fa fa-book"></i>
		CADASTRO DE LIVROS
	<center>
</h2> 
<div class="container1">
	<form id="cadLivro" action="service/LivroService.php?passo=cadastrar" method="post">
		<div class="form-row align-items-center espacoForm">
		    <label for="inputIsbn" class="col-sm-2 col-form-label">ISBN:</label>
	    	<div class="col-sm-2">
	     		 <input type="text" class="form-control" id="inputIsbn" name="isbn">
	    	</div>
		    <div class="col-auto my-1">
		      	<button type="button" class="btn btn-primary">
		      		<i class="fa fa-cloud-download"></i>
		      		Buscar Informações
		      	</button>
		    </div>
		</div>
		<div class="form-row align-items-center espacoForm">
			<label for="inputTitulo" class="col-sm-2 col-form-label">Titulo:</label>
	    	<div class="col-sm-8">
	     		 <input type="text" class="form-control" id="inputTitulo" name="titulo" required>
	    	</div>
	  	</div>
	  	
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputAutor" class="col-sm-2 col-form-label">Autor:</label>
	    	<div class="col-sm-6">
	     		 <input type="text" class="form-control" id="inputAutor"  required name="autor">
	    	</div>
	  		<div class="col-auto my-1">
		      	<button type="button" class="btn btn-primary" onclick="getListaSelectAutor();">
		      		<i class="fa fa-search-plus"></i>
		      		Consultar
		      	</button>
		    </div>
		    <div class="col-auto my-1">
		      	<button type="button" class="btn btn-primary">
		      		<i class="fa fa-plus"></i>
		      		Cadastra
		      	</button>
		    </div>
	  	</div>

	  	<div id="resultadoSelectAutor" class="spaco-select"></div>

	  	<div class="form-row align-items-center espacoForm">
			<label for="inputEditora" class="col-sm-2 col-form-label">Editora:</label>
	    	<div class="col-sm-6">
	     		 <input type="text" class="form-control" id="inputEditora" name="editora" required>
	    	</div>
	  		<div class="col-auto my-1">
		      	<button type="button" class="btn btn-primary" onclick="getListaSelectEditora();">
		      		<i class="fa fa-search-plus"></i>
		      		Consultar
		      	</button>
		    </div>
		    <div class="col-auto my-1">
		      	<button type="button" class="btn btn-primary">
		      		<i class="fa fa-plus"></i>
		      		Cadastra
		      	</button>
		    </div>
	  	</div>

	  	<div id="resultadoSelectEditora" class="spaco-select"></div>

	  	<div class="form-row align-items-center espacoForm">
			<label for="inputAssunto" class="col-sm-2 col-form-label">Assunto:</label>
	    	<div class="col-sm-6">
	     		 <input type="text" class="form-control" id="inputAssunto" name="assunto" required>
	    	</div>
	  		<div class="col-auto my-1">
		      	<button type="button" class="btn btn-primary" onclick="getListaSelectAssunto();">
		      		<i class="fa fa-search-plus"></i>
		      		Consultar
		      	</button>
		    </div>
		    <div class="col-auto my-1">
		      	<button type="button" class="btn btn-primary">
		      		<i class="fa fa-plus"></i>
		      		Cadastra
		      	</button>
		    </div>
	  	</div>

	  	<div id="resultadoSelectAssunto" class="spaco-select"></div>

	  	<div class="form-row align-items-center espacoForm">
			<label for="inputIdioma" class="col-sm-2 col-form-label">Idioma:</label>
	    	<div class="col-sm-6">
	     		 <input type="text" class="form-control" id="inputIdioma" name="idioma"  required>
	    	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputAno" class="col-sm-2 col-form-label">Ano de Publicação:</label>
	    	<div class="col-sm-1">
	     		 <input type="text" class="form-control" id="inputAno" name="ano" required onkeyup="somenteNumeros(this);">
	    	</div>
	    	<label for="inputEdicao" class="col-sm-1 col-form-label">Edição:</label>
	    	<div class="col-sm-1">
	     		 <input type="text" class="form-control" id="inputEdicao" name="edicao" onkeyup="somenteNumeros(this);">
	    	</div>
	  	</div>	
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputPreco" class="col-sm-2 col-form-label">Preço:</label>
	    	<div class="col-sm-1">
	     		 <input type="text" class="form-control" id="inputPreco" name="preco" required>
	    	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputIdioma" class="col-sm-2 col-form-label">Condição:</label>
			<div class="col-sm-3">
				<select id="inputCondicao" class="form-control" name="condicao" required>
	        		<option value="1">Usado</option>
	        		<option value="2">Novo</option>
	      		</select>
	      	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputPaginas" class="col-sm-2 col-form-label">Qtd. Páginas:</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="inputPaginas" name="paginas" onkeyup="somenteNumeros(this);">
	      	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputPeso" class="col-sm-2 col-form-label">Peso (g):</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="inputPeso" name="peso" onkeyup="somenteNumeros(this);">
	      	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputColecao" class="col-sm-2 col-form-label">Coleção:</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputColecao" name="colecao">
	      	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputTraducao" class="col-sm-2 col-form-label">Tradução:</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputTraducao" name="traducao">
	      	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputIlustracao" class="col-sm-2 col-form-label">Ilustracao:</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputIlustracao" name="ilustraca">
	      	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputDimensao" class="col-sm-2 col-form-label">Dimensões:</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputdimensao" name="dimensao">
	      	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputAcabamento" class="col-sm-2 col-form-label">Acabamento:</label>
			<div class="col-sm-5">
				<select id="inputAcabamento" class="form-control" name="acabamento" required>
	        		<option value="1">Capa Comum</option>
	        		<option value="2">Capa Dura</option>
	        		<option value="3">Livro de Bolso</option>
	      		</select>
	      	</div>
	  	</div>
	  	<div class="form-row align-items-center espacoForm">
			<label for="inputSinopse" class="col-sm-2 col-form-label">Sinopse:</label>
			<div class="col-sm-7">
				<textarea class="form-control" id="inputSinopse" name="sinopse" rows="3"></textarea>
	      	</div>
	  	</div>
	  		<div style="margin:1%">
		<button type="submit" class="btn btn-success btn-lg espacoForm" >
			<i class="fa fa-floppy-o"></i>
			Salvar
		</button>
		<button type="button" class="btn btn-danger btn-lg espacoForm" onclick="zerarFormulario();">
			<i class="fa fa-ban"></i>
			Limpar
		</button>
		</div>
	</form>
</div>

<!-- Modal de Confirmação de Cadastro de Livro -->

<div class="modal fade" id="confirmacaoCadastroLivro" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content" id="resultadoCadastroLivro">
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
	
$(document).ready(function(){
    $('#inputPreco').maskMoney();

});

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

	function zerarFormulario(){
		$('#cadLivro').each (function(){
  						this.reset();
					});
	}

	$("#cadLivro").submit(function(e) {

		e.preventDefault();
		$('#confirmacaoCadastroLivro').modal('show');
		var result =  document.getElementById("resultadoCadastroLivro");
		result.innerHTML ='<center><div class="loader"></div></center>';

    	$.ajax({
  		type: "POST",
		url: $(this).attr("action"),
		data: $(this).serialize(),
		success: function(response) {
				$('#resultadoCadastroLivro').html(response);
			}			 
		});
	});

	$('#resultadoCadastroLivro').on('click', '#btdAddLivroDescrito', function(e){

		e.preventDefault();
		$('#confirmacaoCadastroLivro').modal('hide');
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

	/*
	$('#confirmacaoCadastroLivroDescrito').on('hide.bs.modal', function () { 

		//$("#addLivroDescritoModal").niceScroll();
		//$("#addLivroDescritoModal").modal("hide");
		//$("#addLivroDescritoModal").modal("toggle");

	});

	*/


</script>
