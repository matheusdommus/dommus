<?php
  require 'data/classe/webclasse.class.php';

  $webclasse = new webclasse;

  $webclasse->banco = new banco;
  $webclasse->banco->configura('connectsql.php');
  $webclasse->banco->conecta();

  $webclasse->con = new banco;
  $webclasse->con->configura('connectsql.php');
  $webclasse->con->conecta();
  
  $webclasse->con2 = new banco;
  $webclasse->con2->configura('connectsql.php');
  $webclasse->con2->conecta();
  
  $webclasse->con3 = new banco;
  $webclasse->con3->configura('connectsql.php');
  $webclasse->con3->conecta();
  
  $webclasse->boleto = new banco;
  $webclasse->boleto->configura('connectsql.php');
  $webclasse->boleto->conecta();
?>
