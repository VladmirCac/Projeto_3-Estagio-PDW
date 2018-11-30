
<div class="text-center telaLogin">
  <form class="form-signin container1" action="service/LoginService.php?passo=entrar" method="post" id="login">
    <img class="mb-4" src="img/logomarca.png" alt="" width="72" height="72">
    <input type="text" id="inputEmail" class="form-control espacoForm" name="login" placeholder="Login" required autofocus>
    <input type="password" id="inputPassword" class="form-control espacoForm" name="senha" placeholder="Senha" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me espacoForm"> Remember me
      </label>
    </div>
    <div id="resultadoRespostaLoguin"></div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
  </form>
</div>
<script type="text/javascript">
  
$("#login").submit(function(e) {

        e.preventDefault();
        $.ajax({
          type: "POST",
          url: $(this).attr("action"),
          data: $(this).serialize(),
          success: function(response) {
            if (response == "ok"){
                window.location.reload();
            }else{
                $('#resultadoCadastroAssunto').html(response);
            }
          }      
        });
      });



</script>

