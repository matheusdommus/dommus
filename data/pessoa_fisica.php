<?php
  require 'classe/pessoa_fisica.class.php';

  $g3_class = new g3_class;
  
  // RECEBENDO VARIÁVEIS DEFAULT
  $g3_class->default_nome_sistema                   = $default_nome_sistema;
  $g3_class->default_endereco_sistema               = $default_endereco_sistema;
  $g3_class->default_nome_cliente                   = $default_nome_cliente;
  $g3_class->default_telefone_atendimento           = $default_telefone_atendimento;
  $g3_class->default_email_disparo                  = $default_email_disparo;
  $g3_class->default_servidor_smtp                  = $default_servidor_smtp;
  $g3_class->default_cadastro_unidade_avaliacao     = $default_cadastro_unidade_avaliacao;
  $g3_class->default_dias_vencimento                = $default_dias_vencimento;
  $g3_class->default_exibir_registros               = $default_exibir_registros;
  $g3_class->default_registros_por_pagina           = $default_registros_por_pagina;
  $g3_class->default_metodo_exibe_status            = $default_metodo_exibe_status;
  $g3_class->servidor_arquivos                      = $default_servidor_arquivos;
  $g3_class->default_assinatura_digital_ativada     = $default_assinatura_digital_ativada;
  $g3_class->default_servidor_arquivos              = $default_servidor_arquivos;
  $g3_class->default_cliente_dommus                 = $default_cliente_dommus;
  
  // RECEBENDO AS VARIÁVEIS
  $g3_class->id                                      = ((@$_REQUEST['id'])             ? @$_REQUEST['id']             : '' );
  $g3_class->id2                                     = ((@$_REQUEST['id2'])            ? @$_REQUEST['id2']            : '' );
  $g3_class->id3                                     = ((@$_REQUEST['id3'])            ? @$_REQUEST['id3']            : '' );
  $g3_class->id_processo                             = ((@$_REQUEST['id_processo'])    ? @$_REQUEST['id_processo']    : '' );

  $g3_class->empreendimento                          = ((@$_POST['campo_001'])         ? @$_POST['campo_001']         : '' );
  $g3_class->instituicao_financiamento               = ((@$_POST['campo_001a'])        ? @$_POST['campo_001a']        : '' );
  $g3_class->unidade                                 = ((@$_POST['campo_002'])         ? @$_POST['campo_002']         : '' );
  $g3_class->n_proponentes                           = ((@$_POST['campo_003'])         ? @$_POST['campo_003']         : '' );
  $g3_class->grupo_usuario                           = ((@$_POST['campo_004'])         ? @$_POST['campo_004']         : '' );
  $g3_class->gerente                                 = ((@$_POST['campo_004a'])        ? @$_POST['campo_004a']        : '' );
  $g3_class->corretor                                = ((@$_POST['campo_004b'])        ? @$_POST['campo_004b']        : '' );
  
  // CÓDIGO DE RELACIONAMENTO COM  OUTRO SISTEMA
  $g3_class->codigo_relacionamento                   = ((@$_POST['campo_004c'])        ? @$_POST['campo_004c']        : '' );
  
  // PRÉ-ANÁLISE
  $g3_class->pre_analise                             = ((@$_POST['pre_analise'])       ? @$_POST['pre_analise']       : '' );
  $g3_class->grupo_pre_analise                       = ((@$_POST['grupo_pre_analise']) ? @$_POST['grupo_pre_analise'] : '' );


  // 1º PROPONENTE

  $g3_class->cpf                                     = ((@$_POST['campo_005'])         ? @$_POST['campo_005']         : '' );
  $g3_class->rg                                      = ((@$_POST['campo_006'])         ? @$_POST['campo_006']         : '' );
  $g3_class->cnh                                     = ((@$_POST['campo_007'])         ? @$_POST['campo_007']         : '' );
  $g3_class->data_nascimento                         = ((@$_POST['campo_008'])         ? @$_POST['campo_008']         : '' );
  $g3_class->genero                                  = ((@$_POST['campo_009'])         ? @$_POST['campo_009']         : '' );
  $g3_class->nome                                    = ((@$_POST['campo_010'])         ? @$_POST['campo_010']         : '' );
  $g3_class->estado_civil                            = ((@$_POST['campo_011'])         ? @$_POST['campo_011']         : '' );
  $g3_class->regime_comunhao                         = ((@$_POST['campo_012'])         ? @$_POST['campo_012']         : '' );
  $g3_class->tipo_logradouro                         = ((@$_POST['campo_013'])         ? @$_POST['campo_013']         : '' );
  $g3_class->logradouro                              = ((@$_POST['campo_014'])         ? @$_POST['campo_014']         : '' );
  $g3_class->numero                                  = ((@$_POST['campo_015'])         ? @$_POST['campo_015']         : '' );
  $g3_class->complemento                             = ((@$_POST['campo_016'])         ? @$_POST['campo_016']         : '' );
  $g3_class->bairro                                  = ((@$_POST['campo_017'])         ? @$_POST['campo_017']         : '' );
  $g3_class->cidade                                  = ((@$_POST['campo_018'])         ? @$_POST['campo_018']         : '' );
  $g3_class->uf                                      = ((@$_POST['campo_019'])         ? @$_POST['campo_019']         : '' );
  $g3_class->cep                                     = ((@$_POST['campo_020'])         ? @$_POST['campo_020']         : '' );
  $g3_class->referencia                              = ((@$_POST['campo_021'])         ? @$_POST['campo_021']         : '' );
  $g3_class->telefone1                               = ((@$_POST['campo_022'])         ? @$_POST['campo_022']         : '' );
  $g3_class->telefone2                               = ((@$_POST['campo_023'])         ? @$_POST['campo_023']         : '' );
  $g3_class->celular                                 = ((@$_POST['campo_024'])         ? @$_POST['campo_024']         : '' );
  $g3_class->email                                   = ((@$_POST['campo_025'])         ? @$_POST['campo_025']         : '' );
  $g3_class->grau_instrucao                          = ((@$_POST['campo_026'])         ? @$_POST['campo_026']         : '' );
  $g3_class->curso                                   = ((@$_POST['campo_027'])         ? @$_POST['campo_027']         : '' );
  $g3_class->conclusao                               = ((@$_POST['campo_028'])         ? @$_POST['campo_028']         : '' );
  
  $g3_class->nome_referencia                         = ((@$_POST['campo_029'])         ? @$_POST['campo_029']         : '' );
  $g3_class->telefone_referencia                     = ((@$_POST['campo_030'])         ? @$_POST['campo_030']         : '' );
  $g3_class->parentesco                              = ((@$_POST['campo_031'])         ? @$_POST['campo_031']         : '' );
  
  $g3_class->tipo_renda                              = ((@$_POST['campo_034'])         ? @$_POST['campo_034']         : '' );
  $g3_class->profissao                               = ((@$_POST['campo_032'])         ? @$_POST['campo_032']         : '' );
  $g3_class->outra_profissao                         = ((@$_POST['campo_033'])         ? @$_POST['campo_033']         : '' );
  $g3_class->inicio_renda                            = ((@$_POST['campo_033a'])        ? @$_POST['campo_033a']        : '' );
  $g3_class->valor_renda                             = ((@$_POST['campo_035'])         ? @$_POST['campo_035']         : '' );
  $g3_class->empresa                                 = ((@$_POST['campo_036'])         ? @$_POST['campo_036']         : '' );
  $g3_class->cargo                                   = ((@$_POST['campo_037'])         ? @$_POST['campo_037']         : '' );
  $g3_class->telefone_comercial                      = ((@$_POST['campo_038'])         ? @$_POST['campo_038']         : '' );
  $g3_class->ramal                                   = ((@$_POST['campo_039'])         ? @$_POST['campo_039']         : '' );
  
  $g3_class->declarou_irpf                           = ((@$_POST['campo_039a'])        ? @$_POST['campo_039a']        : '' );
  $g3_class->numero_pis                              = ((@$_POST['campo_039b'])        ? @$_POST['campo_039b']        : '' );
  $g3_class->possui_conta_banco                      = ((@$_POST['campo_039c'])        ? @$_POST['campo_039c']        : '' );

  $g3_class->carteira_assinada                       = ((@$_POST['campo_040'])         ? @$_POST['campo_040']         : '' );
  $g3_class->saldo_fgts                              = ((@$_POST['campo_041'])         ? @$_POST['campo_041']         : '' );
  $g3_class->uso_fgts                                = ((@$_POST['campo_042'])         ? @$_POST['campo_042']         : '' );
  $g3_class->valor_fgts                              = ((@$_POST['campo_043'])         ? @$_POST['campo_043']         : '' );

  $g3_class->carro                                   = ((@$_POST['campo_044'])         ? @$_POST['campo_044']         : '' );
  $g3_class->prestacao_carro                         = ((@$_POST['campo_045'])         ? @$_POST['campo_045']         : '' );
  $g3_class->prestacoes_carro                        = ((@$_POST['campo_046'])         ? @$_POST['campo_046']         : '' );

  $g3_class->emprestimo                              = ((@$_POST['campo_047'])         ? @$_POST['campo_047']         : '' );
  $g3_class->prestacao_emprestimo                    = ((@$_POST['campo_048'])         ? @$_POST['campo_048']         : '' );
  $g3_class->prestacoes_emprestimo                   = ((@$_POST['campo_049'])         ? @$_POST['campo_049']         : '' );

  $g3_class->consorcio                               = ((@$_POST['campo_050'])         ? @$_POST['campo_050']         : '' );
  $g3_class->prestacao_consorcio                     = ((@$_POST['campo_051'])         ? @$_POST['campo_051']         : '' );
  $g3_class->prestacoes_consorcio                    = ((@$_POST['campo_052'])         ? @$_POST['campo_052']         : '' );

  $g3_class->fies                                    = ((@$_POST['campo_053'])         ? @$_POST['campo_053']         : '' );
  $g3_class->prestacao_fies                          = ((@$_POST['campo_054'])         ? @$_POST['campo_054']         : '' );
  $g3_class->prestacoes_fies                         = ((@$_POST['campo_055'])         ? @$_POST['campo_055']         : '' );

  $g3_class->cartao_credito                          = ((@$_POST['campo_056'])         ? @$_POST['campo_056']         : '' );
  $g3_class->proxima_fatura                          = ((@$_POST['campo_057'])         ? @$_POST['campo_057']         : '' );
  $g3_class->media_pagamentos                        = ((@$_POST['campo_058'])         ? @$_POST['campo_058']         : '' );
  $g3_class->faturas_atraso                          = ((@$_POST['campo_059'])         ? @$_POST['campo_059']         : '' );


  // 2º PROPONENTE

  $g3_class->cpf2                                    = ((@$_POST['campo_060'])         ? @$_POST['campo_060']         : '' );
  $g3_class->rg2                                     = ((@$_POST['campo_061'])         ? @$_POST['campo_061']         : '' );
  $g3_class->cnh2                                    = ((@$_POST['campo_062'])         ? @$_POST['campo_062']         : '' );
  $g3_class->data_nascimento2                        = ((@$_POST['campo_063'])         ? @$_POST['campo_063']         : '' );
  $g3_class->genero2                                 = ((@$_POST['campo_064'])         ? @$_POST['campo_064']         : '' );
  $g3_class->nome2                                   = ((@$_POST['campo_065'])         ? @$_POST['campo_065']         : '' );
  $g3_class->estado_civil2                           = ((@$_POST['campo_066'])         ? @$_POST['campo_066']         : '' );
  $g3_class->regime_comunhao2                        = ((@$_POST['campo_067'])         ? @$_POST['campo_067']         : '' );
  $g3_class->tipo_logradouro2                        = ((@$_POST['campo_068'])         ? @$_POST['campo_068']         : '' );
  $g3_class->logradouro2                             = ((@$_POST['campo_069'])         ? @$_POST['campo_069']         : '' );
  $g3_class->numero2                                 = ((@$_POST['campo_070'])         ? @$_POST['campo_070']         : '' );
  $g3_class->complemento2                            = ((@$_POST['campo_071'])         ? @$_POST['campo_071']         : '' );
  $g3_class->bairro2                                 = ((@$_POST['campo_072'])         ? @$_POST['campo_072']         : '' );
  $g3_class->cidade2                                 = ((@$_POST['campo_073'])         ? @$_POST['campo_073']         : '' );
  $g3_class->uf2                                     = ((@$_POST['campo_074'])         ? @$_POST['campo_074']         : '' );
  $g3_class->cep2                                    = ((@$_POST['campo_075'])         ? @$_POST['campo_075']         : '' );
  $g3_class->referencia2                             = ((@$_POST['campo_076'])         ? @$_POST['campo_076']         : '' );
  $g3_class->telefone12                              = ((@$_POST['campo_077'])         ? @$_POST['campo_077']         : '' );
  $g3_class->telefone22                              = ((@$_POST['campo_078'])         ? @$_POST['campo_078']         : '' );
  $g3_class->celular2                                = ((@$_POST['campo_079'])         ? @$_POST['campo_079']         : '' );
  $g3_class->email2                                  = ((@$_POST['campo_080'])         ? @$_POST['campo_080']         : '' );
  $g3_class->grau_instrucao2                         = ((@$_POST['campo_081'])         ? @$_POST['campo_081']         : '' );
  $g3_class->curso2                                  = ((@$_POST['campo_082'])         ? @$_POST['campo_082']         : '' );
  $g3_class->conclusao2                              = ((@$_POST['campo_083'])         ? @$_POST['campo_083']         : '' );

  $g3_class->nome_referencia2                        = ((@$_POST['campo_084'])         ? @$_POST['campo_084']         : '' );
  $g3_class->telefone_referencia2                    = ((@$_POST['campo_085'])         ? @$_POST['campo_085']         : '' );
  $g3_class->parentesco2                             = ((@$_POST['campo_086'])         ? @$_POST['campo_086']         : '' );

  $g3_class->tipo_renda2                             = ((@$_POST['campo_089'])         ? @$_POST['campo_089']         : '' );
  $g3_class->profissao2                              = ((@$_POST['campo_087'])         ? @$_POST['campo_087']         : '' );
  $g3_class->outra_profissao2                        = ((@$_POST['campo_088'])         ? @$_POST['campo_088']         : '' );
  $g3_class->inicio_renda2                           = ((@$_POST['campo_088a'])        ? @$_POST['campo_088a']        : '' );
  $g3_class->valor_renda2                            = ((@$_POST['campo_090'])         ? @$_POST['campo_090']         : '' );
  $g3_class->empresa2                                = ((@$_POST['campo_091'])         ? @$_POST['campo_091']         : '' );
  $g3_class->cargo2                                  = ((@$_POST['campo_092'])         ? @$_POST['campo_092']         : '' );
  $g3_class->telefone_comercial2                     = ((@$_POST['campo_093'])         ? @$_POST['campo_093']         : '' );
  $g3_class->ramal2                                  = ((@$_POST['campo_094'])         ? @$_POST['campo_094']         : '' );
  
  $g3_class->declarou_irpf2                          = ((@$_POST['campo_094a'])        ? @$_POST['campo_094a']        : '' );
  $g3_class->numero_pis2                             = ((@$_POST['campo_094b'])        ? @$_POST['campo_094b']        : '' );
  $g3_class->possui_conta_banco2                     = ((@$_POST['campo_094c'])        ? @$_POST['campo_094c']        : '' );
  
  $g3_class->carteira_assinada2                      = ((@$_POST['campo_095'])         ? @$_POST['campo_095']         : '' );
  $g3_class->saldo_fgts2                             = ((@$_POST['campo_096'])         ? @$_POST['campo_096']         : '' );
  $g3_class->uso_fgts2                               = ((@$_POST['campo_097'])         ? @$_POST['campo_097']         : '' );
  $g3_class->valor_fgts2                             = ((@$_POST['campo_098'])         ? @$_POST['campo_098']         : '' );

  $g3_class->carro2                                  = ((@$_POST['campo_099'])         ? @$_POST['campo_099']         : '' );
  $g3_class->prestacao_carro2                        = ((@$_POST['campo_100'])         ? @$_POST['campo_100']         : '' );
  $g3_class->prestacoes_carro2                       = ((@$_POST['campo_101'])         ? @$_POST['campo_101']         : '' );

  $g3_class->emprestimo2                             = ((@$_POST['campo_102'])         ? @$_POST['campo_102']         : '' );
  $g3_class->prestacao_emprestimo2                   = ((@$_POST['campo_103'])         ? @$_POST['campo_103']         : '' );
  $g3_class->prestacoes_emprestimo2                  = ((@$_POST['campo_104'])         ? @$_POST['campo_104']         : '' );

  $g3_class->consorcio2                              = ((@$_POST['campo_105'])         ? @$_POST['campo_105']         : '' );
  $g3_class->prestacao_consorcio2                    = ((@$_POST['campo_106'])         ? @$_POST['campo_106']         : '' );
  $g3_class->prestacoes_consorcio2                   = ((@$_POST['campo_107'])         ? @$_POST['campo_107']         : '' );

  $g3_class->fies2                                   = ((@$_POST['campo_108'])         ? @$_POST['campo_108']         : '' );
  $g3_class->prestacao_fies2                         = ((@$_POST['campo_109'])         ? @$_POST['campo_109']         : '' );
  $g3_class->prestacoes_fies2                        = ((@$_POST['campo_110'])         ? @$_POST['campo_110']         : '' );

  $g3_class->cartao_credito2                         = ((@$_POST['campo_111'])         ? @$_POST['campo_111']         : '' );
  $g3_class->proxima_fatura2                         = ((@$_POST['campo_112'])         ? @$_POST['campo_112']         : '' );
  $g3_class->media_pagamentos2                       = ((@$_POST['campo_113'])         ? @$_POST['campo_113']         : '' );
  $g3_class->faturas_atraso2                         = ((@$_POST['campo_114'])         ? @$_POST['campo_114']         : '' );


  // 3º PROPONENTE

  $g3_class->cpf3                                    = ((@$_POST['campo_115'])         ? @$_POST['campo_115']         : '' );
  $g3_class->rg3                                     = ((@$_POST['campo_116'])         ? @$_POST['campo_116']         : '' );
  $g3_class->cnh3                                    = ((@$_POST['campo_117'])         ? @$_POST['campo_117']         : '' );
  $g3_class->data_nascimento3                        = ((@$_POST['campo_118'])         ? @$_POST['campo_118']         : '' );
  $g3_class->genero3                                 = ((@$_POST['campo_119'])         ? @$_POST['campo_119']         : '' );
  $g3_class->nome3                                   = ((@$_POST['campo_120'])         ? @$_POST['campo_120']         : '' );
  $g3_class->estado_civil3                           = ((@$_POST['campo_121'])         ? @$_POST['campo_121']         : '' );
  $g3_class->regime_comunhao3                        = ((@$_POST['campo_122'])         ? @$_POST['campo_122']         : '' );
  $g3_class->tipo_logradouro3                        = ((@$_POST['campo_123'])         ? @$_POST['campo_123']         : '' );
  $g3_class->logradouro3                             = ((@$_POST['campo_124'])         ? @$_POST['campo_124']         : '' );
  $g3_class->numero3                                 = ((@$_POST['campo_125'])         ? @$_POST['campo_125']         : '' );
  $g3_class->complemento3                            = ((@$_POST['campo_126'])         ? @$_POST['campo_126']         : '' );
  $g3_class->bairro3                                 = ((@$_POST['campo_127'])         ? @$_POST['campo_127']         : '' );
  $g3_class->cidade3                                 = ((@$_POST['campo_128'])         ? @$_POST['campo_128']         : '' );
  $g3_class->uf3                                     = ((@$_POST['campo_129'])         ? @$_POST['campo_129']         : '' );
  $g3_class->cep3                                    = ((@$_POST['campo_130'])         ? @$_POST['campo_130']         : '' );
  $g3_class->referencia3                             = ((@$_POST['campo_131'])         ? @$_POST['campo_131']         : '' );
  $g3_class->telefone13                              = ((@$_POST['campo_132'])         ? @$_POST['campo_132']         : '' );
  $g3_class->telefone23                              = ((@$_POST['campo_133'])         ? @$_POST['campo_133']         : '' );
  $g3_class->celular3                                = ((@$_POST['campo_134'])         ? @$_POST['campo_134']         : '' );
  $g3_class->email3                                  = ((@$_POST['campo_135'])         ? @$_POST['campo_135']         : '' );
  $g3_class->grau_instrucao3                         = ((@$_POST['campo_136'])         ? @$_POST['campo_136']         : '' );
  $g3_class->curso3                                  = ((@$_POST['campo_137'])         ? @$_POST['campo_137']         : '' );
  $g3_class->conclusao3                              = ((@$_POST['campo_138'])         ? @$_POST['campo_138']         : '' );

  $g3_class->nome_referencia3                        = ((@$_POST['campo_139'])         ? @$_POST['campo_139']         : '' );
  $g3_class->telefone_referencia3                    = ((@$_POST['campo_140'])         ? @$_POST['campo_140']         : '' );
  $g3_class->parentesco3                             = ((@$_POST['campo_141'])         ? @$_POST['campo_141']         : '' );

  $g3_class->tipo_renda3                            = ((@$_POST['campo_144'])          ? @$_POST['campo_144']         : '' );
  $g3_class->profissao3                             = ((@$_POST['campo_142'])          ? @$_POST['campo_142']         : '' );
  $g3_class->outra_profissao3                       = ((@$_POST['campo_143'])          ? @$_POST['campo_143']         : '' );
  $g3_class->inicio_renda3                          = ((@$_POST['campo_143a'])         ? @$_POST['campo_143a']        : '' );
  $g3_class->valor_renda3                           = ((@$_POST['campo_145'])          ? @$_POST['campo_145']         : '' );
  $g3_class->empresa3                               = ((@$_POST['campo_146'])          ? @$_POST['campo_146']         : '' );
  $g3_class->cargo3                                 = ((@$_POST['campo_147'])          ? @$_POST['campo_147']         : '' );
  $g3_class->telefone_comercial3                    = ((@$_POST['campo_148'])          ? @$_POST['campo_148']         : '' );
  $g3_class->ramal3                                 = ((@$_POST['campo_149'])          ? @$_POST['campo_149']         : '' );
  
  $g3_class->declarou_irpf3                         = ((@$_POST['campo_149a'])         ? @$_POST['campo_149a']        : '' );
  $g3_class->numero_pis3                            = ((@$_POST['campo_149b'])         ? @$_POST['campo_149b']        : '' );
  $g3_class->possui_conta_banco3                    = ((@$_POST['campo_149c'])         ? @$_POST['campo_149c']        : '' );

  $g3_class->carteira_assinada3                     = ((@$_POST['campo_150'])          ? @$_POST['campo_150']         : '' );
  $g3_class->saldo_fgts3                            = ((@$_POST['campo_151'])          ? @$_POST['campo_151']         : '' );
  $g3_class->uso_fgts3                              = ((@$_POST['campo_152'])          ? @$_POST['campo_152']         : '' );
  $g3_class->valor_fgts3                            = ((@$_POST['campo_153'])          ? @$_POST['campo_153']         : '' );

  $g3_class->carro3                                 = ((@$_POST['campo_154'])          ? @$_POST['campo_154']         : '' );
  $g3_class->prestacao_carro3                       = ((@$_POST['campo_155'])          ? @$_POST['campo_155']         : '' );
  $g3_class->prestacoes_carro3                      = ((@$_POST['campo_156'])          ? @$_POST['campo_156']         : '' );

  $g3_class->emprestimo3                            = ((@$_POST['campo_157'])          ? @$_POST['campo_157']         : '' );
  $g3_class->prestacao_emprestimo3                  = ((@$_POST['campo_158'])          ? @$_POST['campo_158']         : '' );
  $g3_class->prestacoes_emprestimo3                 = ((@$_POST['campo_159'])          ? @$_POST['campo_159']         : '' );

  $g3_class->consorcio3                             = ((@$_POST['campo_160'])          ? @$_POST['campo_160']         : '' );
  $g3_class->prestacao_consorcio3                   = ((@$_POST['campo_161'])          ? @$_POST['campo_161']         : '' );
  $g3_class->prestacoes_consorcio3                  = ((@$_POST['campo_162'])          ? @$_POST['campo_162']         : '' );

  $g3_class->fies3                                  = ((@$_POST['campo_163'])          ? @$_POST['campo_163']         : '' );
  $g3_class->prestacao_fies3                        = ((@$_POST['campo_164'])          ? @$_POST['campo_164']         : '' );
  $g3_class->prestacoes_fies3                       = ((@$_POST['campo_165'])          ? @$_POST['campo_165']         : '' );

  $g3_class->cartao_credito3                        = ((@$_POST['campo_166'])          ? @$_POST['campo_166']         : '' );
  $g3_class->proxima_fatura3                        = ((@$_POST['campo_167'])          ? @$_POST['campo_167']         : '' );
  $g3_class->media_pagamentos3                      = ((@$_POST['campo_168'])          ? @$_POST['campo_168']         : '' );
  $g3_class->faturas_atraso3                        = ((@$_POST['campo_169'])          ? @$_POST['campo_169']         : '' );


  $g3_class->observacao                             = ((@$_POST['campo_170'])          ? @$_POST['campo_170']         : '' );

  
  // ENTREVISTA
  $g3_class->nome_referencia_entrevista             = ((@$_POST['campo_171'])          ? @$_POST['campo_171']         : '' );
  $g3_class->telefone_referencia_entrevista         = ((@$_POST['campo_172'])          ? @$_POST['campo_172']         : '' );
  $g3_class->parentesco_entrevista                  = ((@$_POST['campo_173'])          ? @$_POST['campo_173']         : '' );

  $g3_class->tipo_renda_entrevista                  = ((@$_POST['campo_174'])          ? @$_POST['campo_174']         : '' );
  $g3_class->profissao_entrevista                   = ((@$_POST['campo_175'])          ? @$_POST['campo_175']         : '' );
  $g3_class->outra_profissao_entrevista             = ((@$_POST['campo_176'])          ? @$_POST['campo_176']         : '' );
  $g3_class->inicio_renda_entrevista                = ((@$_POST['campo_177'])          ? @$_POST['campo_177']         :  '' );
  $g3_class->valor_renda_entrevista                 = ((@$_POST['campo_178'])          ? @$_POST['campo_178']         : '' );
  $g3_class->empresa_entrevista                     = ((@$_POST['campo_179'])          ? @$_POST['campo_179']         : '' );
  $g3_class->cargo_entrevista                       = ((@$_POST['campo_180'])          ? @$_POST['campo_180']         : '' );
  $g3_class->telefone_comercial_entrevista          = ((@$_POST['campo_181'])          ? @$_POST['campo_181']         : '' );
  $g3_class->ramal_entrevista                       = ((@$_POST['campo_182'])          ? @$_POST['campo_182']         : '' );

  $g3_class->carro_entrevista                       = ((@$_POST['campo_183'])          ? @$_POST['campo_183']         : '' );
  $g3_class->prestacao_carro_entrevista             = ((@$_POST['campo_184'])          ? @$_POST['campo_184']         : '' );
  $g3_class->prestacoes_carro_entrevista            = ((@$_POST['campo_185'])          ? @$_POST['campo_185']         : '' );

  $g3_class->emprestimo_entrevista                  = ((@$_POST['campo_186'])          ? @$_POST['campo_186']         : '' );
  $g3_class->prestacao_emprestimo_entrevista        = ((@$_POST['campo_187'])          ? @$_POST['campo_187']         : '' );
  $g3_class->prestacoes_emprestimo_entrevista       = ((@$_POST['campo_188'])          ? @$_POST['campo_188']         : '' );

  $g3_class->consorcio_entrevista                   = ((@$_POST['campo_189'])          ? @$_POST['campo_189']         : '' );
  $g3_class->prestacao_consorcio_entrevista         = ((@$_POST['campo_190'])          ? @$_POST['campo_190']         : '' );
  $g3_class->prestacoes_consorcio_entrevista        = ((@$_POST['campo_191'])          ? @$_POST['campo_191']         : '' );

  $g3_class->fies_entrevista                        = ((@$_POST['campo_192'])          ? @$_POST['campo_192']         : '' );
  $g3_class->prestacao_fies_entrevista              = ((@$_POST['campo_193'])          ? @$_POST['campo_193']         : '' );
  $g3_class->prestacoes_fies_entrevista             = ((@$_POST['campo_194'])          ? @$_POST['campo_194']         : '' );

  $g3_class->cartao_credito_entrevista              = ((@$_POST['campo_195'])          ? @$_POST['campo_195']         : '' );
  $g3_class->proxima_fatura_entrevista              = ((@$_POST['campo_196'])          ? @$_POST['campo_196']         : '' );
  $g3_class->media_pagamentos_entrevista            = ((@$_POST['campo_197'])          ? @$_POST['campo_197']         : '' );
  $g3_class->faturas_atraso_entrevista              = ((@$_POST['campo_198'])          ? @$_POST['campo_198']         : '' );
  
  $g3_class->parecer_entrevista                     = ((@$_POST['campo_199'])          ? @$_POST['campo_199']         : '' );
  
  
  // FINANCIAMENTO RESERVA
  $g3_class->nivel_pre_venda                        = ((@$_POST['nivel_pre_venda'])       ? @$_POST['nivel_pre_venda']        : '' );
  $g3_class->fgts_reserva                           = ((@$_POST['fgts_reserva'])          ? @$_POST['fgts_reserva']           : '' );
  $g3_class->subsidio_reserva                       = ((@$_POST['subsidio_reserva'])      ? @$_POST['subsidio_reserva']       : '' );
  $g3_class->financiamento_reserva                  = ((@$_POST['financiamento_reserva']) ? @$_POST['financiamento_reserva']  : '' );

  // FINANCIAMENTO
  $g3_class->aprovacao_banco                        = ((@$_POST['campo_201'])        ? @$_POST['campo_201']        : '' );
  $g3_class->fgts_aprovado                          = ((@$_POST['campo_202'])        ? @$_POST['campo_202']        : '' );
  $g3_class->subsidio_aprovado                      = ((@$_POST['campo_203'])        ? @$_POST['campo_203']        : '' );
  $g3_class->valor_financiamento                    = ((@$_POST['campo_204'])        ? @$_POST['campo_204']        : '' );
  $g3_class->parcela_financiamento                  = ((@$_POST['campo_205'])        ? @$_POST['campo_205']        : '' );
  $g3_class->prazo_financiamento                    = ((@$_POST['campo_206'])        ? @$_POST['campo_206']        : '' );
  $g3_class->custas_registro                        = ((@$_POST['campo_207'])        ? @$_POST['campo_207']        : '' );
  $g3_class->valor_avaliacao                        = ((@$_POST['campo_208'])        ? @$_POST['campo_208']        : '' );
  $g3_class->valor_avaliacao_simulado               = ((@$_POST['campo_208a'])       ? @$_POST['campo_208a']       : '' );
  $g3_class->tabela_financiamento                   = ((@$_POST['campo_209'])        ? @$_POST['campo_209']        : '' );
  $g3_class->desconto_financiamento                 = ((@$_POST['campo_210'])        ? @$_POST['campo_210']        : '' );
  $g3_class->justificativa_reprovacao               = ((@$_POST['campo_211'])        ? @$_POST['campo_211']        : '' );
  $g3_class->renda_bruta                            = ((@$_POST['campo_212'])        ? @$_POST['campo_212']        : '' );
  $g3_class->renda_validada                         = ((@$_POST['campo_213'])        ? @$_POST['campo_213']        : '' );

  // FORMULÁRIO 1
  $g3_class->agencia                                = ((@$_POST['campo_220'])        ? @$_POST['campo_220']        : '' );
  $g3_class->conta_corrente                         = ((@$_POST['campo_221'])        ? @$_POST['campo_221']        : '' );
  $g3_class->numero_proposta                        = ((@$_POST['campo_222'])        ? @$_POST['campo_222']        : '' );
  $g3_class->p1_compoe_renda                        = ((@$_POST['campo_223'])        ? @$_POST['campo_223']        : '' );
  $g3_class->p1_nome_conjuge                        = ((@$_POST['campo_224'])        ? @$_POST['campo_224']        : '' );
  $g3_class->p1_cpf_conjuge                         = ((@$_POST['campo_225'])        ? @$_POST['campo_225']        : '' );
  $g3_class->p1_estado_civil_conjuge                = ((@$_POST['campo_225a'])       ? @$_POST['campo_225a']       : '' );
  $g3_class->p2_nome_conjuge                        = ((@$_POST['campo_226'])        ? @$_POST['campo_226']        : '' );
  $g3_class->p2_cpf_conjuge                         = ((@$_POST['campo_227'])        ? @$_POST['campo_227']        : '' );
  $g3_class->p2_estado_civil_conjuge                = ((@$_POST['campo_227a'])       ? @$_POST['campo_227a']       : '' );
  $g3_class->p3_nome_conjuge                        = ((@$_POST['campo_228'])        ? @$_POST['campo_228']        : '' );
  $g3_class->p3_cpf_conjuge                         = ((@$_POST['campo_229'])        ? @$_POST['campo_229']        : '' );
  $g3_class->p3_estado_civil_conjuge                = ((@$_POST['campo_229a'])       ? @$_POST['campo_229a']       : '' );
  $g3_class->possui_compromissos                    = ((@$_POST['campo_230'])        ? @$_POST['campo_230']        : '' );
  
  $g3_class->tipo_compromisso                       = ((@$_POST['campo_231'])        ? @$_POST['campo_231']        : '' );
  $g3_class->empresa_compromisso                    = ((@$_POST['campo_232'])        ? @$_POST['campo_232']        : '' );
  $g3_class->valor_compromisso                      = ((@$_POST['campo_233'])        ? @$_POST['campo_233']        : '' );
  $g3_class->prestacoes_vencer_compromisso          = ((@$_POST['campo_234'])        ? @$_POST['campo_234']        : '' );
  $g3_class->ultima_prestacao_paga_compromisso      = ((@$_POST['campo_235'])        ? @$_POST['campo_235']        : '' );
  
  $g3_class->tipo_despesas                          = ((@$_POST['campo_236'])        ? @$_POST['campo_236']        : '' );
  $g3_class->valor_despesas                         = ((@$_POST['campo_237'])        ? @$_POST['campo_237']        : '' );
  
  $g3_class->custos_certidoes                       = ((@$_POST['campo_238'])        ? @$_POST['campo_238']        : '' );
  $g3_class->itbi                                   = ((@$_POST['campo_239'])        ? @$_POST['campo_239']        : '' );
  $g3_class->registro_cartorario                    = ((@$_POST['campo_240'])        ? @$_POST['campo_240']        : '' );
  $g3_class->dia_pagamento_parcela                  = ((@$_POST['campo_241'])        ? @$_POST['campo_241']        : '' );
  
  $g3_class->possui_vaga                            = ((@$_POST['campo_242'])        ? @$_POST['campo_242']        : '' );
  $g3_class->quantidade_vagas                       = ((@$_POST['campo_243'])        ? @$_POST['campo_243']        : '' );
  $g3_class->matricula_garagem                      = ((@$_POST['campo_244'])        ? @$_POST['campo_244']        : '' );
  
  $g3_class->pergunta1                              = ((@$_POST['campo_245'])        ? @$_POST['campo_245']        : '' );
  $g3_class->pergunta2                              = ((@$_POST['campo_246'])        ? @$_POST['campo_246']        : '' );
  $g3_class->pergunta3                              = ((@$_POST['campo_247'])        ? @$_POST['campo_247']        : '' );
  $g3_class->pergunta4                              = ((@$_POST['campo_248'])        ? @$_POST['campo_248']        : '' );
  $g3_class->pergunta5                              = ((@$_POST['campo_249'])        ? @$_POST['campo_249']        : '' );
  
  // FORMULÁRIO 2
  $g3_class->pis                                    = ((@$_POST['campo_250'])        ? @$_POST['campo_250']        : '' );
  
  $g3_class->conta_fgts                             = ((@$_POST['campo_251'])        ? @$_POST['campo_251']        : '' );
  $g3_class->empregador_fgts                        = ((@$_POST['campo_252'])        ? @$_POST['campo_252']        : '' );
  $g3_class->utilizacao_fmp                         = ((@$_POST['campo_253'])        ? @$_POST['campo_253']        : '' );
  $g3_class->valor_saque_fgts                       = ((@$_POST['campo_254'])        ? @$_POST['campo_254']        : '' );
  
  // ATUALIZAÇÃOL FORMULÁRIO 2 - EFETUADA EM 24-03-2017
  $g3_class->empresa_laboral                        = ((@$_POST['campo_255n'])       ? @$_POST['campo_255n']       : '' );
  $g3_class->cnpj_laboral                           = ((@$_POST['campo_256n'])       ? @$_POST['campo_256n']       : '' );
  $g3_class->municipio_laboral                      = ((@$_POST['campo_257n'])       ? @$_POST['campo_257n']       : '' );
  $g3_class->uf_laboral                             = ((@$_POST['campo_258n'])       ? @$_POST['campo_258n']       : '' );
  $g3_class->data_uniao_estavel                     = ((@$_POST['campo_259n'])       ? @$_POST['campo_259n']       : '' );
  $g3_class->proprietario_imoveis                   = ((@$_POST['campo_260n'])       ? @$_POST['campo_260n']       : '' );
  $g3_class->declaracao_saida                       = ((@$_POST['campo_261n'])       ? @$_POST['campo_261n']       : '' );

  // VESÃO ANTERIOR DO FORMULÁRIO 2
  $g3_class->municipio_residencia                   = ((@$_POST['campo_255'])        ? @$_POST['campo_255']        : '' );
  $g3_class->tempo_residencia                       = ((@$_POST['campo_256'])        ? @$_POST['campo_256']        : '' );
  $g3_class->ocupacao_laboral                       = ((@$_POST['campo_257'])        ? @$_POST['campo_257']        : '' );
//  $g3_class->municipio_laboral                    = ((@$_POST['campo_258'])        ? @$_POST['campo_258']        : '' );
  $g3_class->desempregado                           = ((@$_POST['campo_259'])        ? @$_POST['campo_259']        : '' );
  $g3_class->isencao_dirpf                          = ((@$_POST['campo_260'])        ? @$_POST['campo_260']        : '' );
  $g3_class->ano_declaracao                         = ((@$_POST['campo_261'])        ? @$_POST['campo_261']        : '' );
  $g3_class->exercicio_declaracao                   = ((@$_POST['campo_262'])        ? @$_POST['campo_262']        : '' );
  $g3_class->fidelidade_copia                       = ((@$_POST['campo_263'])        ? @$_POST['campo_263']        : '' );
  $g3_class->exercicio_fidelidade                   = ((@$_POST['campo_264'])        ? @$_POST['campo_264']        : '' );
  $g3_class->estado_civil_formulario                = ((@$_POST['campo_265'])        ? @$_POST['campo_265']        : '' );
  $g3_class->regime_comunhao_formulario             = ((@$_POST['campo_266'])        ? @$_POST['campo_266']        : '' );
  $g3_class->residencia_uniao_estavel               = ((@$_POST['campo_267'])        ? @$_POST['campo_267']        : '' );
  
  // FORMULÁRIO 3
  $g3_class->beneficiario_desconto                  = ((@$_POST['campo_270'])        ? @$_POST['campo_270']        : '' );
  
  
  // NEGOCIAÇÃO
  $g3_class->unidade_interesse                      = ((@$_POST['campo_301'])        ? @$_POST['campo_301']        : '' );

  $g3_class->sinal                                  = ((@$_POST['campo_313a'])       ? @$_POST['campo_313a']       : '' );
  $g3_class->sinal_prosoluto                        = ((@$_POST['campo_313'])        ? @$_POST['campo_313']        : '' );
  $g3_class->sinal_vencimento                       = ((@$_POST['campo_314v'])       ? @$_POST['campo_314v']       : '' );   // N
  
  $g3_class->pre_chaves                             = ((@$_POST['campo_316a'])       ? @$_POST['campo_316a']       : '' );
  $g3_class->pre_chaves_prosoluto                   = ((@$_POST['campo_316'])        ? @$_POST['campo_316']        : '' );
  $g3_class->parcelas_pre_chaves                    = ((@$_POST['campo_317'])        ? @$_POST['campo_317']        : '' );
  $g3_class->pre_chaves_vencimento                  = ((@$_POST['campo_317v'])       ? @$_POST['campo_317v']       : '' );   // N
  $g3_class->pre_chaves_valor_d                     = ((@$_POST['campo_316d'])       ? @$_POST['campo_316d']       : '' );   // N
  $g3_class->pre_chaves_parcelas_d                  = ((@$_POST['campo_317d'])       ? @$_POST['campo_317d']       : '' );   // N
  $g3_class->pre_chaves_vencimento_d                = ((@$_POST['campo_317vd'])      ? @$_POST['campo_317vd']      : '' );   // N
  
  $g3_class->intermediarias                         = ((@$_POST['campo_319a'])       ? @$_POST['campo_319a']       : '' );
  $g3_class->intermediarias_prosoluto               = ((@$_POST['campo_319'])        ? @$_POST['campo_319']        : '' );
  $g3_class->parcelas_intermediarias                = ((@$_POST['campo_320'])        ? @$_POST['campo_320']        : '' );
  $g3_class->intermediarias_vencimento              = ((@$_POST['campo_320v'])       ? @$_POST['campo_320v']       : '' );   // N
  $g3_class->periodicidade_intermediarias           = ((@$_POST['campo_321'])        ? @$_POST['campo_321']        : '' );
  $g3_class->intermediarias_valor_d                 = ((@$_POST['campo_319d'])       ? @$_POST['campo_319d']       : '' );   // N
  $g3_class->intermediarias_vencimento_d            = ((@$_POST['campo_320vd'])      ? @$_POST['campo_320vd']      : '' );   // N
  
  $g3_class->subsidio_estadual                      = ((@$_POST['valor_subsidio_estadual']) ? @$_POST['valor_subsidio_estadual'] : '' );
  $g3_class->parcelas_subsidio                      = ((@$_POST['parcelas_subsidio'])       ? @$_POST['parcelas_subsidio']       : '' );
  $g3_class->vencimento_subsidio                    = ((@$_POST['vencimento_subsidio'])     ? @$_POST['vencimento_subsidio']     : '' );

  $g3_class->chaves                                 = ((@$_POST['campo_322a'])       ? @$_POST['campo_322a']       : '' );
  $g3_class->chaves_prosoluto                       = ((@$_POST['campo_322'])        ? @$_POST['campo_322']        : '' );
  $g3_class->chaves_vencimento                      = ((@$_POST['campo_323v'])       ? @$_POST['campo_323v']       : '' );   // N
  
  $g3_class->pos_chaves                             = ((@$_POST['campo_325a'])       ? @$_POST['campo_325a']       : '' );
  $g3_class->pos_chaves_prosoluto                   = ((@$_POST['campo_325'])        ? @$_POST['campo_325']        : '' );
  $g3_class->parcelas_pos_chaves                    = ((@$_POST['campo_326'])        ? @$_POST['campo_326']        : '' );
  $g3_class->pos_chaves_vencimento                  = ((@$_POST['campo_326v'])       ? @$_POST['campo_326v']       : '' );   // N

  $g3_class->cobranca_custas                        = ((@$_POST['campo_325a_custas'])  ? @$_POST['campo_325a_custas']  : '' );
  $g3_class->mensal_custas                          = ((@$_POST['campo_325_custas'])   ? @$_POST['campo_325_custas']   : '' );
  $g3_class->parcelamento_custas                    = ((@$_POST['campo_326_custas'])   ? @$_POST['campo_326_custas']   : '' );
  $g3_class->vencimento_custas                      = ((@$_POST['campo_326v_custas'])  ? @$_POST['campo_326v_custas']  : '' );
  $g3_class->periodicidade_custas                   = ((@$_POST['campo_327_custas'])   ? @$_POST['campo_327_custas']   : '' );
  $g3_class->custas_valor_d                         = ((@$_POST['campo_325d_custas'])  ? @$_POST['campo_325d_custas']  : '' );   // N
  $g3_class->custas_vencimento_d                    = ((@$_POST['campo_326vd_custas']) ? @$_POST['campo_326vd_custas'] : '' );   // N
  $g3_class->juros_custas                           = ((@$_POST['campo_328_custas'])   ? @$_POST['campo_328_custas']   : '' );

  $g3_class->condicao_especial                      = ((@$_POST['campo_328'])       ? @$_POST['campo_328']        : 'N' );
  $g3_class->texto_condicao_especial                = ((@$_POST['campo_329'])       ? @$_POST['campo_329']        : '' );
  $g3_class->justificativa_condicao_especial        = ((@$_POST['campo_329a'])      ? @$_POST['campo_329a']       : '' );
  $g3_class->quantidade_avalistas                   = ((@$_POST['campo_329b'])      ? @$_POST['campo_329b']       : '' );
  
  $g3_class->aprova_condicao_especial               = ((@$_POST['campo_330'])       ? @$_POST['campo_330']        : '' );
  $g3_class->exige_avalista                         = ((@$_POST['campo_331'])       ? @$_POST['campo_331']        : 'N' );
  $g3_class->aprovacao_avalista                     = ((@$_POST['campo_332'])       ? @$_POST['campo_332']        : '' );
  
  $g3_class->corretagem_sinal                       = ((@$_POST['campo_333'])       ? @$_POST['campo_333']        : '' );
  $g3_class->zerar_sinal                            = ((@$_POST['zerar_sinal'])     ? @$_POST['zerar_sinal']      : '' );
  
  // AVALISTA
  $g3_class->nome_avalista                          = ((@$_POST['campo_340'])       ? @$_POST['campo_340']        : '' );
  $g3_class->cpf_avalista                           = ((@$_POST['campo_341'])       ? @$_POST['campo_341']        : '' );
  $g3_class->rg_avalista                            = ((@$_POST['campo_342'])       ? @$_POST['campo_342']        : '' );
  $g3_class->estado_civil_avalista                  = ((@$_POST['campo_343'])       ? @$_POST['campo_343']        : '' );
  $g3_class->regime_comunhao_avalista               = ((@$_POST['campo_344'])       ? @$_POST['campo_344']        : '' );
  $g3_class->endereco_avalista                      = ((@$_POST['campo_345'])       ? @$_POST['campo_345']        : '' );
  $g3_class->numero_avalista                        = ((@$_POST['campo_346'])       ? @$_POST['campo_346']        : '' );
  $g3_class->complemento_avalista                   = ((@$_POST['campo_347'])       ? @$_POST['campo_347']        : '' );
  $g3_class->bairro_avalista                        = ((@$_POST['campo_348'])       ? @$_POST['campo_348']        : '' );
  $g3_class->cidade_avalista                        = ((@$_POST['campo_349'])       ? @$_POST['campo_349']        : '' );
  $g3_class->uf_avalista                            = ((@$_POST['campo_350'])       ? @$_POST['campo_350']        : '' );
  $g3_class->cep_avalista                           = ((@$_POST['campo_351'])       ? @$_POST['campo_351']        : '' );
  $g3_class->telefone1_avalista                     = ((@$_POST['campo_352'])       ? @$_POST['campo_352']        : '' );
  $g3_class->telefone2_avalista                     = ((@$_POST['campo_353'])       ? @$_POST['campo_353']        : '' );
  $g3_class->celular_avalista                       = ((@$_POST['campo_354'])       ? @$_POST['campo_354']        : '' );
  $g3_class->email_avalista                         = ((@$_POST['campo_355'])       ? @$_POST['campo_355']        : '' );
  $g3_class->conjuge_avalista                       = ((@$_POST['campo_356'])       ? @$_POST['campo_356']        : '' );
  $g3_class->cpf_conjuge_avalista                   = ((@$_POST['campo_357'])       ? @$_POST['campo_357']        : '' );
  $g3_class->rg_conjuge_avalista                    = ((@$_POST['campo_358'])       ? @$_POST['campo_358']        : '' );
  
  
  // SOLICITAÇÃO DE DAMP
  $g3_class->nome_proponente                        = ((@$_POST['nome_proponente'])                  ? @$_POST['nome_proponente']                   : '' );


  // ASSINATURA DIGITAL
  $g3_class->signatarios_contrato                   = ((@$_POST['signatarios_contrato'])             ? @$_POST['signatarios_contrato']              : '' );

  // FORMULÁRIO DE CANCELAMENTO
  $g3_class->motivo_cancelamento                    = ((@$_POST['motivo_cancelamento'])              ? @$_POST['motivo_cancelamento']               : '' );
  $g3_class->descricao_cancelamento                 = ((@$_POST['descricao_cancelamento'])           ? @$_POST['descricao_cancelamento']            : '' );
  $g3_class->unidade_interesse_cancelamento         = ((@$_POST['unidade_interesse_cancelamento'])   ? @$_POST['unidade_interesse_cancelamento']    : '' );
  
  // DISTRATO
  $g3_class->distrato                               = ((@$_POST['distrato'])                 ? @$_POST['distrato']                 : '' );
  $g3_class->motivo_distrato                        = ((@$_POST['motivo_distrato'])          ? @$_POST['motivo_distrato']          : '' );
  $g3_class->descricao_distrato                     = ((@$_POST['descricao_distrato'])       ? @$_POST['descricao_distrato']       : '' );
  $g3_class->data_hora_distrato                     = ((@$_POST['data_hora_distrato'])       ? @$_POST['data_hora_distrato']       : '' );
  $g3_class->reversao_distrato                      = ((@$_POST['reversao_distrato'])        ? @$_POST['reversao_distrato']        : '' );
  $g3_class->negociacao_distrato                    = ((@$_POST['negociacao_distrato'])      ? @$_POST['negociacao_distrato']      : '' );
  $g3_class->data_hora_reversao                     = ((@$_POST['data_hora_reversao'])       ? @$_POST['data_hora_reversao']       : '' );
  $g3_class->restituir_valores                      = ((@$_POST['restituir_valores'])        ? @$_POST['restituir_valores']        : '' );
  $g3_class->evolucao_distrato                      = ((@$_POST['evolucao_distrato'])        ? @$_POST['evolucao_distrato']        : '' );
  $g3_class->id_cancelamento_processo               = ((@$_POST['id_cancelamento_processo']) ? @$_POST['id_cancelamento_processo'] : '' );

  // PENDÊNCIAS DE DOCUMENTAÇÃO
  $g3_class->aprovacao_documento                    = ((@$_POST['aprovacao_documento'])      ? @$_POST['aprovacao_documento']      : '' );
  $g3_class->justificativa_documento                = ((@$_POST['justificativa_documento'])  ? @$_POST['justificativa_documento']  : '' );
  $g3_class->endereco_upload                        = ((@$_POST['endereco_upload'])          ? @$_POST['endereco_upload']          : '' );
  $g3_class->regularidade                           = ((@$_POST['regularidade'])             ? @$_POST['regularidade']             : '' );
  $g3_class->operador_coban                         = ((@$_POST['operador_coban'])           ? @$_POST['operador_coban']           : '' );
  
  
  // OBSERVAÇÃO ASSINATURA
  $g3_class->observacao_contrato                    = ((@$_POST['observacao_contrato'])      ? @$_POST['observacao_contrato']     : '' );
  $g3_class->observacao_formularios                 = ((@$_POST['observacao_formularios'])   ? @$_POST['observacao_formularios']  : '' );
  $g3_class->documentacao_validada                  = ((@$_POST['documentacao_validada'])    ? @$_POST['documentacao_validada']   : '' );
  

  // CHECKLIST FORMALIZAÇÃO
  $g3_class->backoffice                             = ((@$_POST['backoffice'])               ? @$_POST['backoffice']              : '' );

  $g3_class->check_01                               = ((@$_POST['check_01'])                 ? @$_POST['check_01']                : '' );
  $g3_class->justificativa_01                       = ((@$_POST['justificativa_01'])         ? @$_POST['justificativa_01']        : '' );
  $g3_class->check_02                               = ((@$_POST['check_02'])                 ? @$_POST['check_02']                : '' );
  $g3_class->justificativa_02                       = ((@$_POST['justificativa_02'])         ? @$_POST['justificativa_02']        : '' );
  $g3_class->check_03                               = ((@$_POST['check_03'])                 ? @$_POST['check_03']                : '' );
  $g3_class->justificativa_03                       = ((@$_POST['justificativa_03'])         ? @$_POST['justificativa_03']        : '' );

  $g3_class->check_04                               = ((@$_POST['check_04'])                 ? @$_POST['check_04']                : '' );
  $g3_class->justificativa_04                       = ((@$_POST['justificativa_04'])         ? @$_POST['justificativa_04']        : '' );
  $g3_class->check_04a                              = ((@$_POST['check_04a'])                ? @$_POST['check_04a']               : '' );
  $g3_class->justificativa_04a                      = ((@$_POST['justificativa_04a'])        ? @$_POST['justificativa_04a']       : '' );
  $g3_class->check_04b                              = ((@$_POST['check_04b'])                ? @$_POST['check_04b']               : '' );
  $g3_class->justificativa_04b                      = ((@$_POST['justificativa_04b'])        ? @$_POST['justificativa_04b']       : '' );
  $g3_class->check_04c                              = ((@$_POST['check_04c'])                ? @$_POST['check_04c']               : '' );
  $g3_class->justificativa_04c                      = ((@$_POST['justificativa_04c'])        ? @$_POST['justificativa_04c']       : '' );

  $g3_class->check_05                               = ((@$_POST['check_05'])                 ? @$_POST['check_05']                : '' );
  $g3_class->justificativa_05                       = ((@$_POST['justificativa_05'])         ? @$_POST['justificativa_05']        : '' );
  
  $g3_class->check_06                               = ((@$_POST['check_06'])                 ? @$_POST['check_06']                : '' );
  $g3_class->justificativa_06                       = ((@$_POST['justificativa_06'])         ? @$_POST['justificativa_06']        : '' );

  $g3_class->check_07a                              = ((@$_POST['check_07a'])                ? @$_POST['check_07a']               : '' );
  $g3_class->justificativa_07a                      = ((@$_POST['justificativa_07a'])        ? @$_POST['justificativa_07a']       : '' );
  $g3_class->check_07b                              = ((@$_POST['check_07b'])                ? @$_POST['check_07b']               : '' );
  $g3_class->justificativa_07b                      = ((@$_POST['justificativa_07b'])        ? @$_POST['justificativa_07b']       : '' );
  $g3_class->check_07c                              = ((@$_POST['check_07c'])                ? @$_POST['check_07c']               : '' );
  $g3_class->justificativa_07c                      = ((@$_POST['justificativa_07c'])        ? @$_POST['justificativa_07c']       : '' );
  $g3_class->previsao_07c                           = ((@$_POST['previsao_07c'])             ? @$_POST['previsao_07c']            : '' );

  $g3_class->check_08                               = ((@$_POST['check_08'])                 ? @$_POST['check_08']                : '' );
  $g3_class->justificativa_08                       = ((@$_POST['justificativa_08'])         ? @$_POST['justificativa_08']        : '' );
  $g3_class->check_09                               = ((@$_POST['check_09'])                 ? @$_POST['check_09']                : '' );
  $g3_class->justificativa_09                       = ((@$_POST['justificativa_09'])         ? @$_POST['justificativa_09']        : '' );

  $g3_class->opcao_estorno                          = ((@$_POST['opcao_estorno'])            ? @$_POST['opcao_estorno']           : '' );
  
  
  // AGENDAMENTO DE ENTREGA DE CHAVES
  $g3_class->vistoriador_agendamento_chaves         = ((@$_POST['vistoriador_agendamento_chaves'])   ? @$_POST['vistoriador_agendamento_chaves']   : '' );
  $g3_class->data_agendamento_chaves                = ((@$_POST['data_agendamento_chaves'])          ? @$_POST['data_agendamento_chaves']          : '' );
  $g3_class->horario_agendamento_chaves             = ((@$_POST['horario_agendamento_chaves'])       ? @$_POST['horario_agendamento_chaves']       : '' );
  $g3_class->recomendacoes_agendamento_chaves       = ((@$_POST['recomendacoes_agendamento_chaves']) ? @$_POST['recomendacoes_agendamento_chaves'] : '' );
  $g3_class->reagendamento                          = ((@$_POST['reagendamento'])                    ? @$_POST['reagendamento']                    : 'N' );
  
  // REGISTRA A ENTREGA DAS CHAVES
  $g3_class->chaves_entregue                        = ((@$_POST['chaves_entregue'])          ? @$_POST['chaves_entregue']         : '' );
  $g3_class->motivo_recusa                          = ((@$_POST['motivo_recusa'])            ? @$_POST['motivo_recusa']           : '' );
  $g3_class->observacoes_entrega                    = ((@$_POST['observacoes_entrega'])      ? @$_POST['observacoes_entrega']     : '' );

  // AVALIAÇÃO DO TERMO DE RECEBIMENTO DE CHAVES
  $g3_class->data_termo                             = ((@$_POST['data_termo'])               ? @$_POST['data_termo']              : '' );
  $g3_class->avaliacao_termo                        = ((@$_POST['avaliacao_termo'])          ? @$_POST['avaliacao_termo']         : '' );
  
  
  // MANUTENÇÃO
  $g3_class->id_manutencao                          = ((@$_POST['id_manutencao'])            ? @$_POST['id_manutencao']           : '' );
  $g3_class->categoria_manutencao                   = ((@$_POST['categoria_manutencao'])     ? @$_POST['categoria_manutencao']    : '' );
  $g3_class->tipo_manutencao                        = ((@$_POST['tipo_manutencao'])          ? @$_POST['tipo_manutencao']         : '' );
  $g3_class->descricao_manutencao                   = ((@$_POST['descricao_manutencao'])     ? @$_POST['descricao_manutencao']    : '' );
  $g3_class->informar_via_email                     = ((@$_POST['informar_via_email'])       ? @$_POST['informar_via_email']      : '' );
  $g3_class->redirecionamento                       = ((@$_POST['redirecionamento'])         ? @$_POST['redirecionamento']        : '' );
  
  // ALERTA
  $g3_class->id_alerta                              = ((@$_POST['id_alerta'])                ? @$_POST['id_alerta']               : '' );
  $g3_class->categoria_alerta                       = ((@$_POST['categoria_alerta'])         ? @$_POST['categoria_alerta']        : '' );
  $g3_class->tipo_alerta                            = ((@$_POST['tipo_alerta'])              ? @$_POST['tipo_alerta']             : '' );
  $g3_class->descricao_alerta                       = ((@$_POST['descricao_alerta'])         ? @$_POST['descricao_alerta']        : '' );
  
  // PENDÊNCIA
  $g3_class->id_pendencia                           = ((@$_POST['id_pendencia'])             ? @$_POST['id_pendencia']            : '' );
  $g3_class->categoria_pendencia                    = ((@$_POST['categoria_pendencia'])      ? @$_POST['categoria_pendencia']     : '' );
  $g3_class->tipo_pendencia                         = ((@$_POST['tipo_pendencia'])           ? @$_POST['tipo_pendencia']          : '' );
  $g3_class->descricao_pendencia                    = ((@$_POST['descricao_pendencia'])      ? @$_POST['descricao_pendencia']     : '' );
  $g3_class->responsavel_pendencia                  = ((@$_POST['responsavel_pendencia'])    ? @$_POST['responsavel_pendencia']   : '' );
  $g3_class->dias_pendencia                         = ((@$_POST['dias_pendencia'])           ? @$_POST['dias_pendencia']          : '' );
  $g3_class->horas_pendencia                        = ((@$_POST['horas_pendencia'])          ? @$_POST['horas_pendencia']         : '' );
  $g3_class->minutos_pendencia                      = ((@$_POST['minutos_pendencia'])        ? @$_POST['minutos_pendencia']       : '' );
  $g3_class->prazo_limite                           = ((@$_POST['prazo_limite'])             ? @$_POST['prazo_limite']            : '' );
  $g3_class->pausar_processo                        = ((@$_POST['pausar_processo'])          ? @$_POST['pausar_processo']         : '' );
  $g3_class->validar_solucao                        = ((@$_POST['validar_solucao'])          ? @$_POST['validar_solucao']         : '' );
  $g3_class->informar_envolvidos                    = ((@$_POST['informar_envolvidos'])      ? @$_POST['informar_envolvidos']     : '' );
  $g3_class->gera_manutencao                        = ((@$_POST['gera_manutencao'])          ? @$_POST['gera_manutencao']         : '' );
  $g3_class->emails_copia                           = ((@$_POST['emails_copia'])             ? @$_POST['emails_copia']            : '' );
  $g3_class->permitir_visualizacao                  = ((@$_POST['permitir_visualizacao'])    ? @$_POST['permitir_visualizacao']   : '' );
  
  // MANUTENÇÃO
  $g3_class->id_conversa                            = ((@$_POST['id_conversa'])              ? @$_POST['id_conversa']             : '' );
  $g3_class->atendente_conversa                     = ((@$_POST['atendente_conversa'])       ? @$_POST['atendente_conversa']      : '' );
  $g3_class->data_conversa                          = ((@$_POST['data_conversa'])            ? @$_POST['data_conversa']           : '' );
  $g3_class->hora_conversa                          = ((@$_POST['hora_conversa'])            ? @$_POST['hora_conversa']           : '' );
  $g3_class->meio_comunicacao                       = ((@$_POST['meio_comunicacao'])         ? @$_POST['meio_comunicacao']        : '' );
  $g3_class->descricao_conversa                     = ((@$_POST['descricao_conversa'])       ? @$_POST['descricao_conversa']      : '' );
  $g3_class->retorno_conversa                       = ((@$_POST['retorno_conversa'])         ? @$_POST['retorno_conversa']        : '' );
  
  // WORKFLOW
  $g3_class->workflow                               = ((@$_POST['workflow'])                 ? @$_POST['workflow']                : '' );
  $g3_class->etapa_workflow                         = ((@$_POST['etapa_workflow'])           ? @$_POST['etapa_workflow']          : '' );
  $g3_class->data_etapa_evolucao                    = ((@$_POST['data_etapa_evolucao'])      ? @$_POST['data_etapa_evolucao']     : '' );
  $g3_class->historico_etapa_evolucao               = ((@$_POST['historico_etapa_evolucao']) ? @$_POST['historico_etapa_evolucao'] : '' );
  $g3_class->evolucao                               = ((@$_POST['evolucao'])                 ? @$_POST['evolucao']                : '' );

  // CRÍTICA DE VALORES
  $g3_class->fgts_critica                           = ((@$_POST['fgts_critica'])             ? @$_POST['fgts_critica']            : '' );
  $g3_class->subsidio_critica                       = ((@$_POST['subsidio_critica'])         ? @$_POST['subsidio_critica']        : '' );
  $g3_class->financiamento_critica                  = ((@$_POST['financiamento_critica'])    ? @$_POST['financiamento_critica']   : '' );
  
  // AGENDAMENTO DE ENTREVISTA
  $g3_class->entrevista_exigida                     = ((@$_POST['entrevista_exigida'])       ? @$_POST['entrevista_exigida']      : '' );
  $g3_class->data_agendamento_entrevista            = ((@$_POST['data_agendamento_entrevista']) ? @$_POST['data_agendamento_entrevista'] : '' );
  $g3_class->hora_agendamento_entrevista            = ((@$_POST['hora_agendamento_entrevista']) ? @$_POST['hora_agendamento_entrevista'] : '' );
  
  // AGENDAMENTO DE ASSINATURA DE CONTRATO DE FINANCIAMENTO
  $g3_class->numero_contrato_if                     = ((@$_POST['numero_contrato_if'])        ? @$_POST['numero_contrato_if']     : '' );
  $g3_class->data_agendamento_assinatura            = ((@$_POST['data_agendamento_assinatura']) ? @$_POST['data_agendamento_assinatura'] : '' );
  $g3_class->hora_agendamento_assinatura            = ((@$_POST['hora_agendamento_assinatura']) ? @$_POST['hora_agendamento_assinatura'] : '' );
  $g3_class->assinaturas_contrato_if                = ((@$_POST['assinaturas_contrato_if'])  ? @$_POST['assinaturas_contrato_if'] : '' );
  
  // INFORMAÇÕES DE REGISTRO E LIBERAÇÃO DE RECURSO
  $g3_class->data_registro                          = ((@$_POST['data_registro'])            ? @$_POST['data_registro']           : '' );
  $g3_class->data_liberacao_recurso                 = ((@$_POST['data_liberacao_recurso'])   ? @$_POST['data_liberacao_recurso']  : '' );
  $g3_class->recurso_liberado                       = ((@$_POST['recurso_liberado'])         ? @$_POST['recurso_liberado']        : '' );

  $g3_class->ordem                                  = ((@$_REQUEST['ordem'])                 ? @$_REQUEST['ordem']                : '' );
  $g3_class->filtro                                 = ((@$_REQUEST['filtro'])                ? @$_REQUEST['filtro']               : '' );
  
  $g3_class->mgr                                    = $mgr;
  $g3_class->ui                                     = $ui;
  $g3_class->titulo_tela                            = $titulo_tela_sistema;

  unset($_SESSION["nivel_permissao_tela"]);
  $_SESSION["nivel_permissao_tela"]                 = $nivel_permissao_tela;
  
  // TELA QUE SERÁ EXIBIDA
  $opcao                                            = (($_REQUEST['opcao'])          ? $_REQUEST['opcao']          : $opcao );

  // PAGINAÇÃO
  $g3_class->tsrc                                   = ((@$_REQUEST['tsrc'])          ? @$_REQUEST['tsrc']           : 0 ); // TIPO SEARCH: DETERMINA SE A CONSULTA SERÁ FEITA VIA 1 - SESSÃO OU 0 - NORMAL
  $g3_class->pagina                                 = ((@$_REQUEST['p'])             ? @$_REQUEST['p']              : 1 ); // PÁGINA ATUAL
  $g3_class->max_por_pagina                         = 100;                                                                 // MÁXIMO DE REGISTROS POR PÁGINA
  

  // EXIBE A TELA ESCOLHIDA
  switch($opcao) {
    case 'incluir':
      $g3_class->incluir();
      break;
    case 'alterar':
      $g3_class->alterar();
      break;
    case 'desabilitar':
      $g3_class->desabilitar();
      break;
    case 'excluir':
      $g3_class->exclui();
      break;
    case 'enviaAnalise':
      $g3_class->enviaAnalise();
      break;
    case 'enviaInstituicaoFinanceira':
      $g3_class->enviaInstituicaoFinanceira();
      break;
    case 'aprovaDocumentacao':
      $g3_class->aprovaDocumentacao();
      break;
    case 'finalizaManutencao':
      $g3_class->finalizaManutencao();
      break;
    case 'registra_entrevista':
      $g3_class->registra_entrevista();
      break;
    case 'registra_financiamento':
      $g3_class->registra_financiamento();
      break;
    case 'registraFinanciamentoReserva':
      $g3_class->registraFinanciamentoReserva();
      break;
    case 'liberarReserva':
      $g3_class->liberarReserva();
      break;
    case 'cancelarReserva':
      $g3_class->cancelarReserva();
      break;
    case 'continuarReserva':
      $g3_class->continuarReserva();
      break;
    case 'visualiza_negociacao':
      $g3_class->visualiza_negociacao();
      break;
    case 'registra_negociacao':
      $g3_class->registra_negociacao();
      break;
    case 'aprova_negociacao':
      $g3_class->aprova_negociacao();
      break;
    case 'cancela_condicao_especial':
      $g3_class->cancela_condicao_especial();
      break;
    case 'cancela_negociacao':
      $g3_class->cancela_negociacao();
      break;
    case 'cadastra_avalista':
      $g3_class->cadastra_avalista();
      break;
    case 'solicita_damp':
      $g3_class->solicita_damp();
      break;
    case 'solicita_distrato':
      $g3_class->solicita_distrato();
      break;
    case 'autoriza_distrato':
      $g3_class->autoriza_distrato();
      break;
    case 'gera_distrato':
      $g3_class->gera_distrato();
      break;
    case 'enviaContratoAnalise':
      $g3_class->enviaContratoAnalise();
      break;    
    case 'aprovaContratoCoban':
      $g3_class->aprovaContratoCoban();
      break;
    case 'reprovaContratoCoban':
      $g3_class->reprovaContratoCoban();
      break;
    case 'enviaFormulariosAnalise':
      $g3_class->enviaFormulariosAnalise();
      break;
    case 'aprovaContratoComercial':
      $g3_class->aprovaContratoComercial();
      break;
    case 'reprovaContratoComercial':
      $g3_class->reprovaContratoComercial();
      break;
    case 'aprovaAssinaturaContrato':
      $g3_class->aprovaAssinaturaContrato();
      break;
    case 'aprovaAssinaturaContratoDigital':
      $g3_class->aprovaAssinaturaContratoDigital();
      break;
    case 'reprovaAssinaturaContrato':
      $g3_class->reprovaAssinaturaContrato();
      break;
    case 'aprovaAssinaturaFormularios':
      $g3_class->aprovaAssinaturaFormularios();
      break;
    case 'reprovaAssinaturaFormularios':
      $g3_class->reprovaAssinaturaFormularios();
      break;
    case 'registraValidacaoDocs':
      $g3_class->registraValidacaoDocs();
      break;
    case 'resposta_formalizacao':
      $g3_class->resposta_formalizacao();
      break;
    case 'estorna_formalizacao':
      $g3_class->estorna_formalizacao();
      break;
    case 'registraEtapaWorkflow':
      $g3_class->registraEtapaWorkflow();
      break;
    case 'registraCriticaValores':
      $g3_class->registraCriticaValores();
      break;
    case 'agendamentoEntrevista':
      $g3_class->agendamentoEntrevista();
      break;
    case 'agendamentoAssinatura':
      $g3_class->agendamentoAssinatura();
      break;
    case 'infoContratoRegistrado':
      $g3_class->infoContratoRegistrado();
      break;
    case 'infoRecursoLiberado':
      $g3_class->infoRecursoLiberado();
      break;
    case 'forcarLiberacaoChaves':
      $g3_class->forcarLiberacaoChaves();
      break;
    case 'bloquearChaves':
      $g3_class->bloquearChaves();
      break;
    case 'autorizarChaves':
      $g3_class->autorizarChaves();
      break;
    case 'agendarChaves':
      $g3_class->agendarChaves();
      break;
    case 'confirmarChaves':
      $g3_class->confirmarChaves();
      break;
    case 'registrarEntrega':
      $g3_class->registrarEntrega();
      break;
    case 'aprovarTermo':
      $g3_class->aprovarTermo();
      break;
    case 'reprovarTermo':
      $g3_class->reprovarTermo();
      break;
    case 'registraManutencao':
      $g3_class->registraManutencao();
      break;
    case 'registraAlerta':
      $g3_class->registraAlerta();
      break;
    case 'excluirAlerta':
      $g3_class->excluirAlerta();
      break;
    case 'registraPendencia':
      $g3_class->registraPendencia();
      break;
    case 'concluirPendencia':
      $g3_class->concluirPendencia();
      break;
    case 'excluirPendencia':
      $g3_class->excluirPendencia();
      break;
    case 'validarPendencia':
      $g3_class->validarPendencia();
      break;
    case 'registraConversa':
      $g3_class->registraConversa();
      break;
    case 'excluirConversa':
      $g3_class->excluirConversa();
      break;
    case 'cadastro':
      $g3_class->cadastro();
      break;
    case 'documentacao':
      $g3_class->documentacao();
      break;
    case 'entrevista':
      $g3_class->entrevista();
      break;
    case 'financiamento':
      $g3_class->financiamento();
      break;
    case 'financiamentoUi':
      $g3_class->financiamentoUi();
      break;
    case 'negociacao':
      $g3_class->negociacao();
      break;
    case 'negociacaoTeste':
      $g3_class->negociacaoTeste();
      break;
    case 'negociacaoUi':
      $g3_class->negociacaoUi();
      break;
    case 'contrato':
      $g3_class->contrato();
      break;
    case 'contratoTeste':
      $g3_class->contratoTeste();
      break;
    case 'repasse':
      $g3_class->repasse();
      break;
    case 'registro':
      $g3_class->registro();
      break;
    case 'formalizacao':
      $g3_class->formalizacao();
      break;
    case 'controleFormalizacao':
      $g3_class->controleFormalizacao();
      break;
    case 'entregaChaves':
      $g3_class->entregaChaves();
      break;
    case 'agendaEntregaChaves':
      $g3_class->agendaEntregaChaves();
      break;
    case 'exibeRegistros':
      $g3_class->exibeRegistros();
      break;
    case 'alertas':
      $g3_class->alertas();
      break;
    case 'placarEstatistico':
      $g3_class->placarEstatistico();
      break;
    case 'metricasEmpreendimento':
      $g3_class->metricasEmpreendimento();
      break;
    case 'historicoArquivos':
      $g3_class->historicoArquivos();
      break;
    case 'interacoes':
      $g3_class->interacoes();
      break;
    case 'dashboards':
      $g3_class->dashboards();
      break;
    default:
      $g3_class->cadastro();
      break;
  }
?>
