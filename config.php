<?php
  // BUSCA AS CONFIGURA��ES PADR�O DO SISTEMA
  $webclasse->banco->consulta("SELECT * FROM tb_sgg3_configuracao");
  
  while($webclasse->banco->proxRegistro()){

    // NOME DO SISTEMA
    if($webclasse->banco->data['config'] == 'nome_sistema'){
      $default_nome_sistema = $webclasse->banco->data['valor_config'];
    }
    
    // ENDERE�O WEB ONDE O SISTEMA EST� ALOCADO
    if($webclasse->banco->data['config'] == 'endereco_sistema'){
      $default_endereco_sistema = $webclasse->banco->data['valor_config'];
    }
    
    // NOME DO CLIENTE
    if($webclasse->banco->data['config'] == 'nome_cliente'){
      $default_nome_cliente = $webclasse->banco->data['valor_config'];
    }
    
    // TELEFONE ATENDIMENTO
    if($webclasse->banco->data['config'] == 'telefone_atendimento'){
      $default_telefone_atendimento = $webclasse->banco->data['valor_config'];
    }
    
    // E-MAIL DISPARO
    if($webclasse->banco->data['config'] == 'email_disparo'){
      $default_email_disparo = $webclasse->banco->data['valor_config'];
    }
    
    // SERVIDOR SMTP
    if($webclasse->banco->data['config'] == 'servidor_smtp'){
      $default_servidor_smtp = $webclasse->banco->data['valor_config'];
    }
    
    // CADASTRO REALIZADO A PARTIR DE UNIDADE OU DE VALOR DE AVALIA��O: U - UNIDADE | A - VALOR DE AVALIA��O
    if($webclasse->banco->data['config'] == 'cadastro_unidade_avaliacao'){
      $default_cadastro_unidade_avaliacao = $webclasse->banco->data['valor_config'];
    }
    
    // DIAS DE VENCIMENTO UTILIZADOS NA NEGOCIA��O
    if($webclasse->banco->data['config'] == 'dias_vencimento'){
      $default_dias_vencimento = $webclasse->banco->data['valor_config'];
    }

    // QUANTIDADES DE REGISTROS A SEREM EXIBIDOS QUANDO UMA TELA DE CONSULTA FOR ABERTA
    if($webclasse->banco->data['config'] == 'exibir_registros'){
      $default_exibir_registros = $webclasse->banco->data['valor_config'];
    }
    
    // QUANTIDADE DE REGISTROS QUE SER�O CARREGADOS AP�S O DESLOCAMENTO PARA A P�GINA SEGUINTE DE EXIBI��O DE REGISTROS
    if($webclasse->banco->data['config'] == 'registros_por_pagina'){
      $default_registros_por_pagina = $webclasse->banco->data['valor_config'];
    }

    // SAL�RIO M�NIMO ATUAL
    if($webclasse->banco->data['config'] == 'salario_minimo'){
      $default_salario_minimo = $webclasse->banco->data['valor_config'];
    }
    
    // M�TODO DE EXIBI��O DOS STATUS | F = FIXO (PELA EVOLU��O) OU D = DIN�MICO (PELA ETAPA WORKFLOW)
    if($webclasse->banco->data['config'] == 'metodo_exibe_status'){
      $default_metodo_exibe_status = $webclasse->banco->data['valor_config'];
    }
    
    // ENDERE�O DO SERVIDOR DE ARQUIVOS DO SISTEMA
    if($webclasse->banco->data['config'] == 'servidor_arquivos'){
      $default_servidor_arquivos = $webclasse->banco->data['valor_config'];
    }
    
    // VERIFICA SE A ASSINATURA DIGITAL EST� ATIVADA OU N�O PARA ESTA INCORPORADORA
    if($webclasse->banco->data['config'] == 'assinatura_digital_ativada'){
      $default_assinatura_digital_ativada = $webclasse->banco->data['valor_config'];
    }
  }
  
  // NOME DO CLIENTE DOMMUS
  $arrCliente = explode('.',$_SERVER['HTTP_HOST']);
  $default_cliente_dommus = $arrCliente[0];
?>
