
<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
  <img class="logo" src="img/logomarca.png" alt="Logo"> 
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active ">
      <a class="nav-link" href="index.php">Home</a>
    </li>
       <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Cadastro
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="?pg=view/CadastroAutor">Autor</a>
        <a class="dropdown-item" href="">Editora</a>
        <a class="dropdown-item" href="">Assunto</a>
        <a class="dropdown-item" href="?pg=view/CadastroDescricao">Descrição</a>
        <a class="dropdown-item" href="">Livro</a>
        <a class="dropdown-item" href="">Buscar Livros</a>
      </div>
    </li>
    </li>
       <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Relatorios
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="">Relatorio de Estoque</a>
        <a class="dropdown-item" href="">Relatorio de Movimentações</a>
      </div>
    </li>
  </ul>
  <span type="text" class="navbar-text text-info marginRight">Bem vindo, <?=$_SESSION['login']?></span>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a href="?pg=view/Menu&sair=1"><button type="button" class="btn btn-outline-danger btn-sm ml-auto">Sair</button></a>
  	</li>
  </ul>
  <?php

    // ENCERRANDO A SESSION!
    if (isset($_GET['sair'])) {

      $_SESSION['logou'] = 0;
      session_destroy();
      header('location:index.php');


    }

  ?>
</nav>
