<?php
  // DEFINE O TEMPO EM MINUTOS QUE A SESS�O IR� LEVAR PARA EXPIRAR
  // AS CONFIGURA��ES ABAIXO FORAM SETADAS NO USER.INI EM 05/10/2018
//  ini_set('session.cache_expire', 540);      // 9 HORAS - Time-to-live (tempo de vida) para p�ginas de sess�o em cache, em minutos
//  ini_set('session.gc_maxlifetime', 7200);   // 2 HORAS - Especifica o n�mero de segundos, que, depois de decorridos, os dados ser�o considerados como lixo ('garbage') e eventualmente apagados
//  ini_set('session.cookie_lifetime', 7200);  // 2 HORAS - Especifica o tempo de vida do cookie em segundos que � enviado para o browser. O valor 0 significa "at� o browser ser fechado". O padr�o � 0.
  
  // INICIA A SESS�O
  session_start();
  setlocale(LC_CTYPE, "pt_BR");
//  echo 'SS: ' . $_SESSION["tipo_usuario"];
  // Verifica se existe os dados da sess�o de login
  if(!isset($_SESSION["id_usuario"])){
    // USU�RIO N�O AUTENTICADO. REDIRECIONA PARA A P�GIA INICIAL
//    header("Location: index.php");
//    exit;
  }
?>
