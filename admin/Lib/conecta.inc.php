<?php
  // definições de host, database, usuário e senha
  $host = "localhost";
  $db   = "estagio3_pdw";
  $user = "root";
  $pass = "74185296Vladmir";
  // conecta ao banco de dados
  $con = mysqli_connect($host, $user, $pass);
  mysqli_set_charset($con, 'utf8');
  if (!$con) {
    die("Database connection failed: " . mysqli_error());
}
  $select_db = mysqli_select_db($con, $db);
      
?>