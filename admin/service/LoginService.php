<?php

	$passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

	switch ($passo) {
		case 'entrar': {entrar(); break;}
		default: case 'sair': {sair(); break;}

	}

	function entrar(){

		session_start();

		if (true){

		$login = $_POST['login'];
		$senha = $_POST['senha'];

		$_SESSION['login'] = $login;
		$_SESSION['logou'] = 1;

		echo "ok";

		}

		else{
			echo "nao foi possível realizar o loguin!";
		}

	}

	function sair() {

		session_start();
      	$_SESSION['logou'] = 0;
      	session_destroy();
    	

	}




?>