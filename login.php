<?php

  // INICIA A SESS�O
  session_start();
  setlocale(LC_CTYPE, "pt_BR");
  header('Content-type: text/html; charset=iso-8859-1');

  // Verifica se existe os dados da sess�o de login
  if(isset($_SESSION["id_usuario"]) && isset($_SESSION["nome_usuario"]) && isset($_SESSION["id_clube_futebol"])){
    // USU�RIO N�O AUTENTICADO. REDIRECIONA PARA A P�GIA INICIAL
    header("Location: index_sistema.php");
    exit;
  }

  $ui   =   ((@$_REQUEST['ui'])   ? @$_REQUEST['ui']   : '' );

  require 'connect.php';
  require 'config.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Entrar | <?php echo $default_nome_sistema; ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/common.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script type="text/javascript" src="script/jquery.mask.min.js"/></script>
  </head>

<body onload="document.getElementById('campo_login').focus();">
  <div id="pg_atualizacao"><iframe src id="atualiza" name="atualiza" marginwidth="0" marginheight="0"></iframe></div>
  <div class="login-wrapper">
    <div class="container">
      <div id="central" class="login-box">
        <div id="caixa_logo" class="logo-login">
          <img src="assets/img/logomarca.png" alt="Logomarca Dommus" />
        </div>
        <div id="caixa_login" class="login-form">
          <form method="post" id="form_autenticacao" name="form_autenticacao" action="autentica.php" target="_parent">
            <div class="form-group">
              <label for="exampleInputEmail1">Login</label>
              <input type="email" id="campo_login" name="campo_login" value="" />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" id="campo_senha" name="campo_senha" value="" />
            </div>
            <button type="submit" class="btn btn-primary" id="autenticar" name="autenticar">Entrar</button>
          </form>
          <script>
            $( "#form_autenticacao" ).submit(function( event ) {
              $("#autenticar").attr("value", "Autenticando...");
            });
          </script>
        </div>
      </div>
    </div>

  </div>

  <?php

  require_once 'footer.php';

  ?>
