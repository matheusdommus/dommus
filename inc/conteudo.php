<?php
      if($tela_sistema){
        require_once($destino_tela_sistema);
      }else{
        echo 'TELA NÃO ENCONTRADA.';
      }
?>
