	
	function CriarRequest() {

			try {
				request = new XMLHttpRequest();
			}catch (IEAtual) {
				try {
					request = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (IEAntigo) {
						try {
							request = new ActiveXObject("Microsoft.XMLHTTP");
						}catch(falha){
	                		 request = false;
	             		}
				}
			}
			if (!request){
				alert("Seu navegador não suporta o Recurso!")
			}else{
				return request;
			}			
	};