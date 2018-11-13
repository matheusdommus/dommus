<?php
  // DEFINE O TEMPO EM MINUTOS QUE A SESSÃO IRÁ LEVAR PARA EXPIRAR
  // AS CONFIGURAÇÕES ABAIXO FORAM SETADAS NO USER.INI EM 05/10/2018
//  ini_set('session.cache_expire', 540);      // 9 HORAS - Time-to-live (tempo de vida) para páginas de sessão em cache, em minutos
//  ini_set('session.gc_maxlifetime', 7200);   // 2 HORAS - Especifica o número de segundos, que, depois de decorridos, os dados serão considerados como lixo ('garbage') e eventualmente apagados
//  ini_set('session.cookie_lifetime', 7200);  // 2 HORAS - Especifica o tempo de vida do cookie em segundos que é enviado para o browser. O valor 0 significa "até o browser ser fechado". O padrão é 0.
  
  // INICIA A SESSÃO
  session_start();
  setlocale(LC_CTYPE, "pt_BR");
//  echo 'SS: ' . $_SESSION["tipo_usuario"];
  // Verifica se existe os dados da sessão de login
  if(!isset($_SESSION["id_usuario"])){
    // USUÁRIO NÃO AUTENTICADO. REDIRECIONA PARA A PÁGIA INICIAL
//    header("Location: index.php");
//    exit;
  }
?>
