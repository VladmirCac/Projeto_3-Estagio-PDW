<?php

	
	require('phpQuery/phpQuery.php');

	class crawlerDadosLivro {


		var $titulo;
		var $autor;
		var $editora;
		var $edicao;
		var $assunto;
		var $idioma;
		var $ano;
		var $peso;
		var $paginas;
		var $dimensoes;
		var $status;
		var $sinopse;
		

		function crawlerCultura($isbn){
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://www.livrariacultura.com.br/busca?N=0&Ntt='.$isbn);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$html = curl_exec($ch);
			curl_close($ch);

			$doc = phpQuery::newDocument($html);

			$resultado = pq($doc['header.grey div.container h1'])->text();
			$naoEncontrado = 'não correspondeu';

			if (strpos($resultado, $naoEncontrado) !== false){
				$this->status = FALSE;
			}else{
				$this->status = TRUE;
			}
			
			if($this->status){

				$link;

				if (pq($doc['.product-ev-content > div:nth-child(1) > div:nth-child(3) > a:nth-child(1)'])->attr('href') == null){
					$link = pq($doc['div.product-ev-unavailable:nth-child(3) > a:nth-child(1)'])->attr('href');
				}else{
					$link = pq($doc['.product-ev-content > div:nth-child(1) > div:nth-child(3) > a:nth-child(1)'])->attr('href');
				}

				$ch2 = curl_init();
				curl_setopt($ch2, CURLOPT_URL, $link);
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
				$html2 = curl_exec($ch2);
				curl_close($ch2);

				$doc2 = phpQuery::newDocument($html2);				

				$this->titulo = pq($doc2['h1.title'])->text();	

				$this->autor = pq($doc2['.info > li:nth-child(1) > a:nth-child(2)'])->text();


				$altura;
				$largura;
				$listaDados = pq($doc2['.details-column li']);
				foreach ($listaDados as $dado) {
					$d = pq($dado)->text();
					if (strpos($d, 'Assunto') !== false){
						$d1 = substr($d, 10);
						$this->assunto = $d1;
					}
					if (strpos($d, 'Editora') !== false){
						//$d1 = utf8_encode($d);
						$d1 = substr($d, 10);
						$this->editora = $d1;
						//$this->editora = preg_replace('/[^\p{L}\p{N}\s]/', '', str_replace("Editora:", "", $d)); 
					}
					if (strpos($d, 'Idioma') !== false){
						$d1 = substr($d, 9);
						$this->idioma = $d1;
					}
					if (strpos($d, 'Ano') !== false){
						$d1 = substr($d, 7);
						$this->ano = $d1;
					}
					if (strpos($d, 'Páginas') !== false){
						$d1 = substr($d, 20);
						$this->paginas = $d1;
					}
					if (strpos($d, 'Edição') !== false){
						$d1 = substr($d, 9);
						$this->edicao = $d1;
					}
					if (strpos($d, 'Peso') !== false){
						$p = trim(str_replace("Peso:", "", $d));
						$peso = (float) $p;
						$pesoFinal = $peso*1000;
						$this->peso = $pesoFinal;					}
					if (strpos($d, 'Altura') !== false){
						$d1 = substr($d, 9);
						$altura = $d1;
					}
					if (strpos($d, 'Largura') !== false){
						$d1 = substr($d, 10);
						$largura = $d1;
					}
				}

				if (isset($largura) || isset($altura))
					$this->dimensoes = $largura.' x '.$altura;
				else
					$this->dimensoes = "";

				$this->sinopse = pq($doc2['.content'])->text();

			}
			
		}

	}	


?>