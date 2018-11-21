<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Catalogação de livros O Sebo Cultural</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="MyCss.css">

</head>
<body>
    <?php

      session_start();

      if (empty($_SESSION)){
        $_SESSION['logou'] = 0;
      
      }

      if ($_SESSION['logou'] == 0){
        
        include_once("view/TelaLogin.php");
      
      }else{

        include_once("view/Menu.php");
    
        if(empty($_SERVER["QUERY_STRING"])){
            $var = "view/Principal.php";
            include_once("$var");
        }else{
            $pg = $_GET['pg'];
            include_once("$pg.php");
        }
    
        //include_once("view/Rodape.php");

      }
    ?> 
    
</body>
</html>