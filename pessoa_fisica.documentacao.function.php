<?php
      if($this->id_processo){

        require "verifica_acesso_processo.php";

        $this->con1->consulta("SELECT tb_processo.*,
                               tb_empreendimento.nome as nome_empreendimento, tb_empreendimento.banco, tb_empreendimento.coban, tb_empreendimento.seleciona_coban, tb_empreendimento.modo_repasse_registro,
                               tb_modulo_empreendimento.adimplencia_premiada as adimplencia_premiada_empreendimento,
                               tb_unidade.descricao as descricao_unidade, tb_unidade.modulo as modulo_unidade, tb_tipo_unidade.descricao as descricao_tipo_unidade, tb_unidade.valor as valor_unidade, tb_unidade.valor_avaliacao as valor_avaliacao_unidade, tb_unidade.disponibilidade as disponibilidade_unidade,
                               tb_grupo_usuario.nome as nome_grupo_usuario, tb_grupo_usuario.coban_autorizado,
                               a.nome as nome_operador_coban, b.nome as nome_corretor, c.nome as nome_gerente,
                               tb_etapas_workflow.nome AS nome_etapa_workflow
                               FROM tb_processo
                               INNER JOIN tb_pessoa_fisica P1 ON tb_processo.proponente1 = P1.id
                               LEFT JOIN tb_pessoa_fisica P2 ON tb_processo.proponente1 = P2.id
                               LEFT JOIN tb_pessoa_fisica P3 ON tb_processo.proponente1 = P3.id
                               LEFT JOIN tb_empreendimento ON tb_processo.empreendimento = tb_empreendimento.id
                               LEFT JOIN tb_unidade ON tb_processo.unidade = tb_unidade.id
                               LEFT JOIN tb_modulo_empreendimento ON tb_unidade.modulo = tb_modulo_empreendimento.modulo AND tb_empreendimento.id = tb_modulo_empreendimento.empreendimento
                               LEFT JOIN tb_tipo_unidade ON tb_unidade.tipo = tb_tipo_unidade.id
                               LEFT JOIN tb_grupo_usuario ON tb_processo.grupo_usuario = tb_grupo_usuario.id
                               LEFT JOIN tb_sgg3_autenticacao c ON tb_processo.gerente = c.id
                               LEFT JOIN tb_sgg3_autenticacao b ON tb_processo.corretor = b.id
                               LEFT JOIN tb_sgg3_autenticacao a ON tb_processo.operador_coban = a.id
                               LEFT JOIN tb_etapas_workflow ON tb_processo.etapa_workflow = tb_etapas_workflow.id
                               WHERE tb_processo.id='" . $this->id_processo . "'
                               GROUP BY tb_processo.id");
        $this->con1->proxRegistro();

        // PEGA OD VALORES DO BANCO DE DADOS -- INSIRA AQUI O REGISTRO DE TODOS OS CAMPOS DA TABELA
        $this->proponentes                              = $this->con1->data['proponentes'];
        $this->empreendimento                           = $this->con1->data['empreendimento'];
        $this->nome_empreendimento                      = $this->con1->data['nome_empreendimento'];
        $this->instituicao_financiamento                = $this->con1->data['instituicao_financiamento'];
        $this->coban                                    = $this->con1->data['coban'];
        $this->seleciona_coban                          = $this->con1->data['seleciona_coban'];
        $this->coban_autorizado                         = $this->con1->data['coban_autorizado'];
        $this->valor_avaliacao                          = $this->con1->data['valor_avaliacao'];
        $this->modo_repasse_registro                    = $this->con1->data['modo_repasse_registro'];
        $this->unidade                                  = $this->con1->data['unidade'];
        $this->modulo_unidade                           = $this->con1->data['modulo_unidade'];
        $this->descricao_tipo_unidade                   = $this->con1->data['descricao_tipo_unidade'];
        $this->valor_unidade                            = $this->con1->data['valor_unidade'];
        $this->valor_avaliacao_unidade                  = $this->con1->data['valor_avaliacao_unidade'];
        $this->disponibilidade_unidade                  = $this->con1->data['disponibilidade_unidade'];
        $this->descricao_unidade                        = $this->con1->data['descricao_unidade'];
        $this->adimplencia_premiada_empreendimento      = $this->con1->data['adimplencia_premiada_empreendimento'];
        $this->n_proponentes                            = $this->con1->data['n_proponentes'];
        $this->nome_grupo_usuario                       = $this->con1->data['nome_grupo_usuario'];
        $this->nome_gerente                             = $this->con1->data['nome_gerente'];
        $this->nome_corretor                            = $this->con1->data['nome_corretor'];
        $this->nome_operador_coban                      = $this->con1->data['nome_operador_coban'];
        $this->pre_analise                              = $this->con1->data['pre_analise'];
        $this->nivel_pre_venda                          = $this->con1->data['nivel_pre_venda'];
        $this->aprovacao_contrato                       = $this->con1->data['aprovacao_contrato'];
        $this->aprovacao_assinatura_ccv                 = $this->con1->data['aprovacao_assinatura_ccv'];
        $this->aprovacao_assinatura_formularios         = $this->con1->data['aprovacao_assinatura_formularios'];
        $this->observacao_documentacao                  = $this->con1->data['observacao_documentacao'];
        $this->manutencoes                              = $this->con1->data['manutencoes'];
        $this->pendencias                               = $this->con1->data['pendencias'];
        $this->alertas                                  = $this->con1->data['alertas'];
        $this->conversas                                = $this->con1->data['conversas'];
        $this->ativo_inativo                            = $this->con1->data['ativo_inativo'];
        $this->evolucao                                 = $this->con1->data['evolucao'];
        $this->workflow                                 = $this->con1->data['workflow'];
        $this->etapa_workflow                           = $this->con1->data['etapa_workflow'];
        $this->nome_etapa_workflow                      = $this->con1->data['nome_etapa_workflow'];
        $this->data_venda                               = $this->con1->data['data_venda'];
        
        // DATAS
        $arrDataCadastro    = preg_split("/ /",$this->con1->data['cadastrado_em']);
        $arrDataAtualizacao = preg_split("/ /",$this->con1->data['atualizado_em']);

        $arrProponentes = preg_split('/#/',$this->proponentes);


        // VERIFICA SE HÁ MANUTENÇÕES ABERTAS PARA ESTE PROCESSO ABERTAS POR ESTE USUÁRIO
        $id_manutencao = null;
        $zonas_ativas = null;
        if($this->evolucao >= 1 && $this->manutencoes > 0){
          $this->con1->consulta("SELECT tb_manutencao.id as id_manutencao, tb_tipo_manutencao.zonas_liberadas, tb_zonas_manutencao.campos
                                 FROM tb_manutencao
                                 LEFT JOIN tb_tipo_manutencao ON tb_manutencao.tipo = tb_tipo_manutencao.id
                                 LEFT JOIN tb_zonas_manutencao ON tb_tipo_manutencao.zonas_liberadas LIKE CONCAT('%#',tb_zonas_manutencao.id,'#%')
                                 WHERE tb_manutencao.processo='" . $this->id_processo . "' AND tb_manutencao.tipo=18 AND tb_manutencao.cadastrado_por='" . $_SESSION['id_usuario'] . "' AND tb_manutencao.concluido_em IS NULL AND tb_manutencao.concluido_por IS NULL ORDER BY tb_manutencao.id DESC");
          if($this->con1->nrows > 0){
            $this->con1->proxRegistro();
            $zonas_ativas  = $this->con1->data['zonas_liberadas'];
            $id_manutencao = $this->con1->data['id_manutencao'];
            $campos_habilitados = $this->con1->data['campos'];
          }
        }
      }
      
      // CRIA UM ARRAY COM OS GESTORES DE COBAN HABILITADOS PARA ESTE EMPREENDIEMNTO
      $cobanAutorizado = array();
      $arrCoban = preg_split("/#/",$this->coban);
      for($i=1;$i<sizeOf($arrCoban)-1;$i++){
        $this->con1->consulta("SELECT nome, grupo_usuarios FROM tb_grupo_usuario WHERE id=" . $arrCoban[$i] . " AND ativo=1 AND status=1");
        $this->con1->proxRegistro();
        $arrUsuariosGrupo = preg_split("/>/",$this->con1->data['grupo_usuarios']);
        $cobanAutorizado[$i-1]['id'] = str_replace('#','',$arrUsuariosGrupo[0]);
        $cobanAutorizado[$i-1]['nome'] = $this->con1->data['nome'];
      }

      // LIBERA O ACESSO AOS OPERADORES COBAN AUTORIZADO A ATENDER DIRETAMENTE O GRUPO DE USUÁRIO PDV/IMOBILIÁRIA QUE ESTE PROCESSO ESTÁ CADASTRADO
      $totalCobanAutorizado = sizeOf($cobanAutorizado);
      $arrCobanAutorizado = preg_split("/#/",$this->coban_autorizado);
      for($i=1;$i<sizeOf($arrCobanAutorizado)-1;$i++){
        $this->con1->consulta("SELECT nome FROM tb_sgg3_autenticacao WHERE id=" . $arrCobanAutorizado[$i] . " AND ativo=1 AND status=1");
        $this->con1->proxRegistro();
        $cobanAutorizado[$totalCobanAutorizado + ($i-1)]['id'] = str_replace('#','',$arrCobanAutorizado[$i]);
        $cobanAutorizado[$totalCobanAutorizado + ($i-1)]['nome'] = $this->con1->data['nome'];
      }
      
      
      $botao = 'SALVAR';
      $opcao = 'alterar';
?>
      <script language="javascript">
        endLoading();
      </script>
      <form id="form_cadastro" name="form_cadastro" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div id="formulario">
          <div id="controles">
            <input type="button" id="botao_02" name="botao_02" value="NOVO" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=Mg=='" />
            <input type="button" id="botao_03" name="botao_03" value="REGISTROS" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=Mw=='" />
            <?php if($this->id){ ?>
            <input type="button" id="botao_04" name="botao_04" value="IMPRIMIR" onClick="window.open('relatorios/ficha_cadastro.php?id=<?php echo $this->id; ?>');" />
            <?php } ?>
          </div>
          <div id="titulo_tela">
            <?php echo $this->titulo_tela; ?>
          </div>

          <!-- // MENSAGEM DE ALERTA -->
          <div id="msg"></div>

          <div id="guias">
            <?php if($this->id_processo){ ?>
            <input type="button" id="botao_guias" name="botao_guias" value="CADASTRO" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=Mg==&id_processo=<?php echo $this->id_processo; ?>'" />
            <input type="button" id="botao_guias" name="botao_guias" value="DOCUMENTAÇÃO" class="guia_inativa" style="margin-bottom: 15px;" />
              <?php if($this->evolucao >= 1 && ($_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6)){ ?>
            <input type="button" id="botao_guias" name="botao_guias" value="ENTREVISTA" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=MTk=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
              <?php } ?>
              <?php if($this->evolucao >= 4 && ($_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6)){ ?>
            <input type="button" id="botao_guias" name="botao_guias" value="FINANCIAMENTO" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=MTE=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
              <?php } ?>
              <?php if($this->evolucao >= 5 && ((($_SESSION['tipo_usuario'] == 1 || $_SESSION['tipo_usuario'] == 2) || ($_SESSION['tipo_usuario'] >= 7 && $_SESSION['tipo_usuario'] <= 10)) || ($_SESSION['tipo_usuario'] == 3 && ($this->aprovacao_contrato == 'E' || $this->aprovacao_contrato == 'R' || $this->aprovacao_contrato == 'A' || $this->aprovacao_contrato == 'N')))){ ?>
            <input type="button" id="botao_guias" name="botao_guias" value="NEGOCIAÇÃO" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=MTI=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
              <?php } ?>
              <?php if((($this->evolucao >= 6 && $this->aprovacao_contrato == 'A') || $this->nivel_pre_venda == 3) && ($_SESSION['tipo_usuario'] >= 3 && $_SESSION['tipo_usuario'] <= 13)){ ?>
            <input type="button" id="botao_guias" name="botao_guias" value="CONTRATO" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=MTM=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
              <?php } ?>
              <?php if(($this->evolucao >= 9 && $this->aprovacao_assinatura_formularios == 'A') && ($_SESSION['tipo_usuario'] >= 1 && $_SESSION['tipo_usuario'] <= 6) || ($_SESSION['tipo_usuario'] >= 10 && $_SESSION['tipo_usuario'] <= 12)){ ?>
                <?php if($this->modo_repasse_registro == 'R'){ ?>
            <input type="button" id="botao_guias" name="botao_guias" value="REPASSE" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=NDQ=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
            <input type="button" id="botao_guias" name="botao_guias" value="REGISTRO" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=NDU=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
                <?php }else if($this->modo_repasse_registro == 'F'){ ?>
            <input type="button" id="botao_guias" name="botao_guias" value="FORMALIZAÇÃO" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=MTg=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
                <?php } ?>
              <?php } ?>
              <?php if($this->evolucao > 9 && ($_SESSION['tipo_usuario'] == 3 || $_SESSION['tipo_usuario'] == 4 || $_SESSION['tipo_usuario'] == 11 || $_SESSION['tipo_usuario'] == 12)){ ?>
            <input type="button" id="botao_guias" name="botao_guias" value="CUSTAS" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=Mzg=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
              <?php } ?>
              <?php if($this->evolucao >= 17 && (($_SESSION['tipo_usuario'] >= 3 && $_SESSION['tipo_usuario'] <= 4) || ($_SESSION['tipo_usuario'] >= 11 && $_SESSION['tipo_usuario'] <= 15))){ ?>
            <input type="button" id="botao_guias" name="botao_guias" value="CHAVES" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=NDA=&id_processo=<?php echo $this->id_processo; ?>'"  style="margin-bottom: 15px;" />
              <?php } ?>
            <input type="button" id="botao_guias" name="botao_guias" value="HISTÓRICO" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=MTc=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
            <input type="button" id="botao_guias" name="botao_guias" value="INTERAÇÕES" onClick="parent.location.href='index_sistema.php?mgr=MQ==&ui=NDM=&id_processo=<?php echo $this->id_processo; ?>'" style="margin-bottom: 15px;" />
            <?php } ?>
          </div>

          <?php require 'data/classe/functions/cabecalho_processo.php'; ?>

          <form id="form_documentacao" name="form_documentacao" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
          <div id="cabecalho">
            <div id="valor_imovel">
<?php
              // VALOR DO IMÓVEL A SER AVALIADO E DO CONTRATO
              $valor_imovel = 0;
              if($this->adimplencia_premiada_empreendimento == 'S'){
                $valor_imovel = $this->valor_avaliacao_unidade;
              }else if($this->adimplencia_premiada_empreendimento == 'N'){
                if($this->valor_unidade < $this->valor_avaliacao_unidade){
                  $valor_imovel = $this->valor_unidade;
                }else{
                  $valor_imovel = $this->valor_avaliacao_unidade;
                }
              }
?>
              <b>Valor do Imóvel (Avaliação e Contrato):</b> <?php echo 'R$ ' . number_format($valor_imovel,2,',','.'); ?>
            </div>
            <div id="bt_analise">
              <?php if($this->evolucao == 0 || $this->evolucao == 2){ ?>
                <?php if(($_SESSION['tipo_usuario'] >= 7 && $_SESSION['tipo_usuario'] <= 10) && ($this->nivel_pre_venda == 0 || $this->nivel_pre_venda == 3)){ ?>
<?php
                // PERMITE AO USUÁRIO DE VENDA SELECIONAR PARA QUAL OPERADOR COBAN ELE QUE ENVIAR A PASTA
                if($this->seleciona_coban == 'S'){
?>
                <select id="operador_coban" name="operador_coban">
                  <option value="">Enviar para a análise de:</option>
<?php
                  for($i=0;$i<sizeOf($cobanAutorizado);$i++){
?>
                  <option value="<?php echo $cobanAutorizado[$i]['id']; ?>"<?php if($this->operador_coban == $cobanAutorizado[$i]['id']){ echo ' selected'; } ?>><?php echo $cobanAutorizado[$i]['nome']; ?></option>
<?php
                  }
?>
                </select>
<?php
                }
?>
              <input id="bt_envia_analise" type="button" value="ENVIAR PARA ANÁLISE" />
              <input type="hidden" id="opcao" name="opcao" value="enviaAnalise">
                <?php } ?>
              <?php }else if($this->evolucao == 1){ ?>
                <?php if($_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6){ ?>
              <input type="submit" value="APROVAR / REPROVAR" />
              <input type="hidden" id="opcao" name="opcao" value="aprovaDocumentacao" />
                <?php }else if($_SESSION['tipo_usuario'] == 7 || $_SESSION['tipo_usuario'] == 8 || $_SESSION['tipo_usuario'] == 9 || $_SESSION['tipo_usuario'] == 10){ ?>
              <input type="button" value="ENVIADO PARA ANÁLISE" style="background: #999" onClick="alert('Este processo já foi enviado para análise. Aguarde o retorno.')" />
                <?php } ?>
              <?php }else if($this->evolucao == 3){ ?>
                <?php if($_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6){ ?>
              <input type="submit" value="ENVIAR PARA A INSTITUIÇÃO FINANCEIRA" />
              <input type="hidden" id="opcao" name="opcao" value="enviaInstituicaoFinanceira" />
                <?php }else if($_SESSION['tipo_usuario'] == 7 || $_SESSION['tipo_usuario'] == 8 || $_SESSION['tipo_usuario'] == 9 || $_SESSION['tipo_usuario'] == 10){ ?>
              <input type="button" value="DOCUMENTAÇÃO APROVADA" style="background: #999" onClick="alert('Documentação aprovada. Aguardando envio para a Instituição Financeira.')" />
                <?php } ?>
              <?php }else if($this->evolucao > 3){ ?>
              <input type="hidden" id="opcao" name="opcao" value="" />
              <?php } ?>

              <?php if(($this->evolucao >= 1) && $id_manutencao > 0 && $campos_habilitados == 'documentacao_proponentes'){ ?>
              <input id="bt_finalizar_manutencao" type="button" value="FINALIZAR MANUTENÇÃO" />
              <script>
                // OCULTA O BOTÃO DE ENVIO PARA ANÁLISE
                <?php if($this->evolucao == 2){ ?>
                $('#bt_envia_analise').hide();
                <?php } ?>
                
                // FINALIZA A MANUTENÇÃO
                $('#bt_finalizar_manutencao').click(function(){
                  $('#opcao').val('finalizaManutencao');
                  $('#form_cadastro').submit();
                });
              </script>
              <?php } ?>
              <input type="hidden" name="id_processo" value="<?php echo $this->id_processo; ?>" />
            </div>
          </div>
          <input type="hidden" id="mgr" name="mgr" value="<?php echo $this->mgr; ?>">
          <input type="hidden" id="ui" name="ui" value="<?php echo $this->ui; ?>">
          <input type="hidden" id="id_processo" name="id_processo" value="<?php echo $this->id_processo; ?>">
          <input type="hidden" id="pre_analise" name="pre_analise" value="<?php echo $this->pre_analise; ?>" />
          <input type="hidden" id="id_manutencao" name="id_manutencao" value="<?php echo $id_manutencao; ?>">
          <input type="hidden" id="workflow" name="workflow" value="<?php echo $this->workflow; ?>">
          <input type="hidden" id="etapa_workflow" name="etapa_workflow" value="<?php echo $this->etapa_workflow; ?>">
          </form>

<?php
          $verifica_todos = '>';
          $cont_documento = 1;
          for($i=1;$i<sizeOf($arrProponentes)-1;$i++){
            $arrArquivoDownload = null;

            $this->con1->consulta("SELECT nome, cpf, estado_civil, saldo_fgts, uso_fgts, valor_fgts, regularidade FROM " . $this->tabela . " WHERE id='" . $arrProponentes[$i] . "'");
            $this->con1->proxRegistro();

            $this->id             = $arrProponentes[$i];
            $this->nome           = $this->con1->data['nome'];
            $this->cpf            = $this->con1->data['cpf'];
            $this->estado_civil   = $this->con1->data['estado_civil'];
            $this->saldo_fgts     = $this->con1->data['saldo_fgts'];
            $this->uso_fgts       = $this->con1->data['uso_fgts'];
            $this->valor_fgts     = $this->con1->data['valor_fgts'];
            $this->regularidade   = $this->con1->data['regularidade'];

            $cont_renda = 1;
            $renda_proponente = '#';
            $this->con1->consulta("SELECT tb_tipo_renda.id as id_tipo_renda
                                   FROM tb_renda
                                   LEFT JOIN tb_tipo_renda ON tb_renda.tipo_renda = tb_tipo_renda.sigla
                                   WHERE tb_renda.id_pessoa_fisica='" . $arrProponentes[$i] . "' AND tb_renda.status=1");
            while($this->con1->proxRegistro()){
              $renda_proponente .= $this->con1->data['id_tipo_renda'] . '#';
            }
?>
            <h2><?php echo $i . 'º Proponente: ' . $this->nome; ?></h2>
<?php
          $id_categoria_documento = 0;
          $cont_arquivo_download = 0;
          $documentos_ocultos = '#';
          $ocultar_quadros = '#';

          // VERIFICA SE QUAIS DOCUMENTOS SERÃO OCULTADOS
          $this->con1->consulta("SELECT substituir
                                 FROM tb_documento
                                 WHERE (substituir IS NOT NULL AND substituir <> '') AND tb_documento.bancos LIKE '%#" . $this->instituicao_financiamento . "#%' AND (tb_documento.cadastrados_apos <= '" . $arrDataCadastro[0] . "' OR tb_documento.cadastrados_apos IS NULL OR tb_documento.cadastrados_apos = '0000-00-00') AND tb_documento.status=1
                                 ORDER BY tb_documento.categoria, tb_documento.ordem");

          while($this->con1->proxRegistro()){
            $documentos_ocultos .= substr($this->con1->data['substituir'],1);
          }

          $documentos_proponente[$i] = '#';
          $sql_documentos = "SELECT tb_documento.*, tb_categoria_documento.descricao as descricao_categoria
                             FROM tb_documento
                             LEFT JOIN tb_categoria_documento ON tb_documento.categoria = tb_categoria_documento.id
                             WHERE tb_documento.bancos LIKE '%#" . $this->instituicao_financiamento . "#%' AND (tb_documento.cadastrados_apos <= '" . $arrDataCadastro[0] . "' OR tb_documento.cadastrados_apos IS NULL OR tb_documento.cadastrados_apos = '0000-00-00') AND tb_documento.status=1
                             ORDER BY tb_documento.categoria, tb_documento.ordem";

          $this->con1->consulta($sql_documentos);
          while($this->con1->proxRegistro()){

          // VERIFICA SE A CATEGORIA DO DOCUMENTO FOI ALTERADA
          if($this->con1->data['categoria'] != $id_categoria_documento){
            $id_categoria_documento = $this->con1->data['categoria'];
            echo '<h3>' . $this->con1->data['descricao_categoria'] . '</h3>';
          }

          // VERIFICA SE O DOCUMENTO DEVE OU NÃO SER EXIBIDO PELAS CONDICIONANTES
          $exibe_documento = 0;
          if($this->con1->data['condicionantes']){
            $arrCondicionantes = preg_split("/#/",$this->con1->data['condicionantes']);
            for($k=1;$k<=sizeOf($arrCondicionantes)-2;$k++){
              $arrCondicionante = preg_split("/-/",$arrCondicionantes[$k]);
              // ESTADO CIVIL
              if($arrCondicionante[0] == 1){
                if($this->estado_civil == $arrCondicionante[1]){
                  $exibe_documento = 1;
                }
              // RENDA
              }else if($arrCondicionante[0] == 2){
                if(substr_count($renda_proponente,'#' . $arrCondicionante[1] . '#') > 0){
                  $exibe_documento = 1;
                }
              // EXTRATO DO FGTS
              }else if($arrCondicionante[0] == 3 && $arrCondicionante[1] == 1){
                if($this->saldo_fgts == 'S' && $this->uso_fgts == 'S' && $this->valor_fgts > 0){
                  $exibe_documento = 1;
                }
              }
            }
          }else{
            $exibe_documento = 1;
          }

          // VERIFICA SE O DOCUMENTO DEVE OU NÃO SER EXIBIDO PELO ESTADO CIVIL DO CLIENTE
          if($exibe_documento == 1){

            // REGISTRA OS DOCUMENTOS QUE DEVERÃO SER VERIFICADOS PARA ESTE PROPONENTE
            $documentos_proponente[$i] .= $this->con1->data['id'] . '#';

            // VERIFICA QUAIS QUADROS SERÃO OCULTOS
            if(substr_count($documentos_ocultos,'#'.$this->con1->data['id'].'#') > 0){
              $ocultar_quadros .= $this->php->strZero($cont_documento,2) . '#';
            }

//            $nome_arquivo = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($this->php->removeAcentos($this->con1->data['nomenclatura_padrao'])));
            $nome_arquivo = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($this->php->removeAcentos($this->con1->data['orientacao_descricao'])));
            $nome_arquivo = preg_replace("/\s+/","_",strtolower($nome_arquivo));

            $arquivos_aceitos = null;
            $arrTiposArquivo = split('#',$this->con1->data['tipo_arquivo']);
            for($j=1;$j<sizeOf($arrTiposArquivo);$j++){
              $this->con2->consulta("SELECT descricao FROM tb_tipo_arquivo WHERE id='" . $arrTiposArquivo[$j] . "' AND status=1");
              $this->con2->proxRegistro();
              if($this->con2->data['descricao'] == 'PDF'){
                $arquivos_aceitos .= ',pdf';
              }else if($this->con2->data['descricao'] == 'IMAGEM (jpg/png)'){
                $arquivos_aceitos .= ',jpg,png';
              }else if($this->con2->data['descricao'] == 'WORD (doc/docx)'){
                $arquivos_aceitos .= ',doc,docx';
              }else if($this->con2->data['descricao'] == 'EXCEL (xls/xlsx)'){
                $arquivos_aceitos .= ',xls,xlsx';
              }
            }
            $arquivos_aceitos = substr($arquivos_aceitos,1);
?>
          <div id="quadro_0<?php echo $this->php->strZero($cont_documento,2); ?>" class="estilo_quadros">
            <p><?php echo $this->con1->data['descricao']; ?>:</p>
            <div id="status_<?php echo $this->php->strZero($cont_documento,2); ?>" class="status"><img src='images/icones/carregar.png' border='0' /></div>
<?php
            if(($_SESSION['tipo_usuario'] != 5 && $_SESSION['tipo_usuario'] != 6) || ($id_manutencao > 0 && $campos_habilitados == 'documentacao_proponentes')){
              $exibe_pendencia = 0;
              $id_pendencia = null;
              $justificativa_pendencia = null;
              $validade_pendencia = null;

              // VERIFICA PENDÊNCIA
              $this->con2->consulta("SELECT * FROM tb_pendencia_documentacao WHERE processo='" . $this->id_processo . "' AND pessoa_fisica='" . $arrProponentes[$i] . "' AND documento='" . $this->con1->data['id'] . "' AND status=1 ORDER BY cadastrado_em DESC, id DESC");
              if($this->con2->nrows > 0){
                $this->con2->proxRegistro();
                $id_pendencia = $this->con2->data['id'];
                $justificativa_pendencia = $this->con2->data['justificativa'];
                $validade_pendencia = $this->con2->data['validade'];
                $exibe_pendencia = 1;
              }

              if($this->evolucao == 0 || ($this->evolucao == 2 && $exibe_pendencia == 1) || ($id_manutencao > 0 && $campos_habilitados == 'documentacao_proponentes')){
?>
            <div id="documento_<?php echo $this->php->strZero($cont_documento,2); ?>">Carregar</div>
<?php
              }

            // EXIBE OPÇÕES DE ANÁLISE DO ARQUIVO
            }else if(($_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6) && (!$id_manutencao || ($id_manutencao > 0 && $campos_habilitados != 'documentacao_proponentes'))){
              $this->con2->consulta("SELECT * FROM tb_pendencia_documentacao WHERE processo='" . $this->id_processo . "' AND pessoa_fisica='" . $arrProponentes[$i] . "' AND documento='" . $this->con1->data['id'] . "' AND status=1 ORDER BY cadastrado_em DESC, id DESC");
              $this->con2->proxRegistro();

              if($this->con2->data['aprovacao'] == 'R'){
                $aprovacao_arquivo = 'R';
              }else{
                $aprovacao_arquivo = 'A';
              }
?>
            <div id="analise_coban">
              <div id="aprovacao_documento">
                <input type="radio" id="aprovacao_documento_<?php echo $arrProponentes[$i]; ?>_<?php echo $this->con1->data['id']; ?>a" name="aprovacao_documento[<?php echo $arrProponentes[$i]; ?>][<?php echo $this->con1->data['id']; ?>]" value="A"<?php if($aprovacao_arquivo == 'A' && ($this->evolucao == 2 || $this->evolucao == 3)){ echo ' checked'; } ?> /> Documento APROVADO<br />
                <input type="radio" id="aprovacao_documento_<?php echo $arrProponentes[$i]; ?>_<?php echo $this->con1->data['id']; ?>b" name="aprovacao_documento[<?php echo $arrProponentes[$i]; ?>][<?php echo $this->con1->data['id']; ?>]" value="R"<?php if($aprovacao_arquivo == 'R' && ($this->evolucao == 2 || $this->evolucao == 3)){ echo ' checked'; } ?> /> Documento REPROVADO
              </div>
              <div id="justificativa_documento">
                <textarea id="justificativa_documento" name="justificativa_documento[<?php echo $arrProponentes[$i]; ?>][<?php echo $this->con1->data['id']; ?>]" placeholder="JUSTIFICATIVA"><?php if($this->con2->data['justificativa'] && ($this->evolucao == 2 || $this->evolucao == 3)){ echo $this->con2->data['justificativa']; } ?></textarea>
              </div>
              <div id="validade_documento">
                Validade:<br />
                <input type="text" id="validade_documento" name="validade_documento[<?php echo $arrProponentes[$i]; ?>][<?php echo $this->con1->data['id']; ?>]" placeholder="dd/mm/aaaa" value="<?php if($this->con2->data['validade'] && ($this->evolucao == 2 || $this->evolucao == 3)){ echo $this->php->inverteData($this->con2->data['validade']); } ?>" />
              </div>
            </div>
<?php
            }


            // EXIBE ARQUIVO CARREGADO

            $exibe_arquivo = 0;
            $this->con2->consulta("SELECT servidor, diretorio, referencia, data_hora FROM tb_log_upload2 WHERE proponente='" . $this->id . "' AND referencia IN ('C','R') AND documento='" . $this->con1->data['id'] . "' AND diretorio LIKE '%cadastros/" . $this->php->strZero($this->id,7) . "/" . $this->cpf . "_" . $nome_arquivo . "%' AND transferido!='E' ORDER BY data_hora DESC, id DESC LIMIT 1");
            if($this->con2->nrows > 0){
              $this->con2->proxRegistro();
              if($this->con2->data['referencia'] == 'C'){
                $diretorio_arquivo = $this->con2->data['servidor'] . $this->con2->data['diretorio'];
                $arrDirArquivo = explode("/",$this->con2->data['diretorio']);

                $arrArquivoDownload[$arrProponentes[$i]][$cont_arquivo_download] = end($arrDirArquivo);
                $cont_arquivo_download++;
?>
            <div id="arquivo_existente"<?php if(($_SESSION['tipo_usuario'] >= 7 && $_SESSION['tipo_usuario'] <= 10) || ($id_manutencao > 0 && $campos_habilitados == 'documentacao_proponentes')){ echo 'class="margem_arquivo_existente"'; } ?>>
              <a href="<?php echo $diretorio_arquivo; ?>" target="_blank" title="<?php echo end($arrDirArquivo); ?>">1) <?php echo end($arrDirArquivo); ?></a><br />
              <p>ARQUIVO CARREGADO</p>
              <input type="hidden" name="endereco_upload[<?php echo $arrProponentes[$i]; ?>][<?php echo $this->con1->data['id']; ?>]" value="<?php echo $diretorio_arquivo; ?>" />
            </div>
            <script>
              <?php if($this->evolucao == 0){ ?>
            	$("#status_<?php echo $this->php->strZero($cont_documento,2); ?>").html("<img src='images/icones/carregamento_ok.png' border='0' />");
              <?php }else if($this->evolucao == 1){ ?>
            	$("#status_<?php echo $this->php->strZero($cont_documento,2); ?>").html("<img src='images/icones/carregamento_analise.png' border='0' />");
              <?php } ?>
            </script>
<?php
              }
            }

            // EXIBE A JUSTIFICATIVA DA PENDÊNCIA, CASO EXISTA
            if($exibe_pendencia == 1){
              $exibeArquivoPendencia = null;
              $arrDiretorioPendencia = split('[.]',$diretorio_arquivo);

              $exibe_arquivo = 0;
              $this->con2->consulta("SELECT CONCAT(servidor,diretorio) AS caminho FROM tb_log_upload2 WHERE proponente='" . $this->id . "' AND referencia='R' AND documento='" . $this->con1->data['id'] . "' AND diretorio LIKE '%cadastros/" . $this->php->strZero($this->id,7) . "/" . $this->cpf . "_" . $nome_arquivo . "_reprovado_" . $id_pendencia . "%' AND transferido!='E' ORDER BY data_hora DESC, id DESC LIMIT 1");
              if($this->con2->nrows > 0){
                $this->con2->proxRegistro();
                $diretorio_arquivo = $this->con2->data['caminho'];
                $exibe_arquivo = 1;
              }

              if($exibe_arquivo == 1){
                $exibeArquivoPendencia = $diretorio_arquivo;
              }
/*              <h4<?php if(!file_exists($diretorio_arquivo)){ ?> style="margin-top: 65px"<?php } ?>>DOCUMENTO REPROVADO</h4> */
?>
              <h4<?php if($this->html->remote_file_exists($this->servidor_arquivos . $diretorio_arquivo) == 0){ echo ' style="margin-top: 65px"'; }else if($this->html->remote_file_exists($this->servidor_arquivos . $diretorio_arquivo) == 1){ echo ' style="margin-top: 0px"'; } ?>>DOCUMENTO REPROVADO</h4>
<?php
              echo 'Justificativa: <font color="#ff0000">' . $justificativa_pendencia . '</font>';
              if($validade_pendencia){
                echo '<br />Validade do Documento: <font color="#ff0000">' . $this->php->inverteData($validade_pendencia) . '</font>';
              }
              if($exibeArquivoPendencia){
                $arrExibeArquivoPendencia = split('[/]',$exibeArquivoPendencia);
                echo '<br />Arquivo Reprovado: <a href="' . $exibeArquivoPendencia . '" target="_blank">' . end($arrExibeArquivoPendencia) . '</a>';
              }
            }
?>
          </div>
          <script>
            $(document).ready(function(){

            var config_<?php echo $this->php->strZero($cont_documento,2); ?> = {
            	url: "data/ajax/upload.php",
            	method: "POST",
              datatype: 'json',
            	allowedTypes:"<?php echo $arquivos_aceitos; ?>",
            	fileName: "myfile",
              formData: {"acao":"create","url":"cadastros/<?php echo $this->php->strZero($this->id,7); ?>/","nome_arquivo":"<?php echo $this->cpf; ?>_<?php echo $nome_arquivo; ?>","id":"<?php echo $this->id; ?>","id_processo":"<?php echo $this->id_processo; ?>","documento":"<?php echo $this->con1->data['id']; ?>","cliente":"<?php echo $this->default_cliente_dommus; ?>","servidor_arquivos":"<?php echo preg_replace("/" . $this->default_cliente_dommus . "./","",$this->default_servidor_arquivos); ?>"},
            	multiple: false,
            	onSuccess:function(files,data,xhr)
            	{
                var arrResultado = data.split('=>');
                var retorno      = arrResultado[0].trim();
                var arquivo      = arrResultado[2].trim();
                var url          = arrResultado[3].trim();
                url = url.replace(/[\\"}]/g, '');  // "
            	  if(retorno == "1"){
              		$("#status_<?php echo $this->php->strZero($cont_documento,2); ?>").html("<img src='images/icones/carregamento_ok.png' border='0' />");
              		$("#quadro_0<?php echo $this->php->strZero($cont_documento,2); ?> .ajax-file-upload-filename").html("1) <a href='"+url+"' target='_blank'>"+arquivo+"</a>");
                }
            	},
            	onError: function(files,status,errMsg)
            	{
            		$("#status_<?php echo $this->php->strZero($cont_documento,2); ?>").html("<img src='images/icones/carregamento_falha.png' border='0' />");
            	},
            	showDelete: true,
              deleteCallback: function (data, pd) {
                var arrData = data.split(':');
                var newData = arrData[1].replace(/[\\"}]/g, '');  // "
                for (var i = 0; i < 1; i++) {
                  $.post("delete.php", {op: "delete",name: newData}, function(resp,textStatus, jqXHR){
                    //Show Message
                    alert("Arquivo apagado.");
                  });
                }
                pd.statusbar.hide(); //You choice.
              }
            }
            $("#documento_<?php echo $this->php->strZero($cont_documento,2); ?>").uploadFile(config_<?php echo $this->php->strZero($cont_documento,2); ?>);
            
            $(document).on({
              ajaxStart: function() { startLoading(); },
              ajaxStop:  function() { endLoading();   }
            });

            });
          </script>
<?php
            $cont_documento++;
          }
          }
?>
          <div id="download_all">
            <?php if($_SESSION['tipo_usuario'] == 3 || $_SESSION['tipo_usuario'] == 4 || $_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6){ ?>
            <a href="relatorios/imprime_dossie.php?pf=<?php echo $arrProponentes[$i]; ?>" target="_blank"><img src="images/icones/print.png" border="0" align="absmiddle" /> IMPRIMIR TODOS</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
            <a href="data/ajax/download_documentacao.php?ui=<?php echo preg_replace('/\"/','$', serialize($arrArquivoDownload)); ?>" target="atualiza"><img src="images/icones/zip.png" border="0" align="absmiddle" /> BAIXAR TODOS</a>
          </div>


          <?php if(($_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6) || $this->regularidade == 'I'){ ?>
          <h3>SITUAÇÃO CADASTRAL</h3>

          <div id="quadro_99<?php echo $i; ?>" class="estilo_quadros">

            <p>REGULARIDADE DO CLIENTE:</p>
            <div id="status_99<?php echo $i; ?>" class="status"><img src='images/icones/carregar.png' border='0' /></div>
<?php
            // SOMENTE COBAN
            if($_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6){
?>
            <div id="documento_99<?php echo $i; ?>">Carregar</div>
            <div id="analise_coban2">
              <div id="aprovacao_documento">
                <input type="radio" id="aprovacao_regularidade_<?php echo $arrProponentes[$i]; ?>a" name="regularidade[<?php echo $arrProponentes[$i]; ?>]" value="R"<?php if(!$this->regularidade || $this->regularidade == 'R' && ($this->evolucao == 2 || $this->evolucao == 3)){ echo ' checked'; } ?> /> Cliente REGULAR<br />
                <input type="radio" id="aprovacao_regularidade_<?php echo $arrProponentes[$i]; ?>b" name="regularidade[<?php echo $arrProponentes[$i]; ?>]" value="I"<?php if($this->regularidade == 'I' && ($this->evolucao == 2 || $this->evolucao == 3)){ echo ' checked'; } ?> /> Cliente IRREGULAR
              </div>
            </div>
            <?php
            // SE NÃO FO COBAN
            }else{
              if($this->regularidade == 'I'){
?>
            <div id="cliente_irregular">CLIENTE IRREGULAR</div>
<?php
              }
            }

            // EXIBE ARQUIVO CARREGADO
            $this->con2->consulta("SELECT servidor, diretorio FROM tb_log_upload2 WHERE proponente='" . $this->id . "' AND referencia = 'C' AND documento='130' AND diretorio LIKE '%cadastros/" . $this->php->strZero($this->id,7) . "/" . $this->cpf . "_regularidade%' AND transferido!='E' ORDER BY data_hora DESC, id DESC LIMIT 1");
            if($this->con2->nrows > 0){
              $this->con2->proxRegistro();
              $diretorio_arquivo = $this->con2->data['servidor'] . $this->con2->data['diretorio'];
              $arrDirArquivo = explode("/",$this->con2->data['diretorio']);
              
              $arrArquivoDownload[$arrProponentes[$i]][$cont_arquivo_download] = $this->cpf . '_' . $consulta_arquivo;
              $cont_arquivo_download++;
?>
            <div id="arquivo_existente"<?php if($_SESSION['tipo_usuario'] == 7 || $_SESSION['tipo_usuario'] == 8 || $_SESSION['tipo_usuario'] == 9 || $_SESSION['tipo_usuario'] == 10){ echo 'class="margem_arquivo_existente"'; }else if($_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6){ echo 'style="margin-top: 65px !important"'; } ?>>
              <a href="<?php echo $diretorio_arquivo; ?>" target="_blank" title="<?php echo end($arrDirArquivo); ?>">1) <?php echo end($arrDirArquivo); ?></a><br />
              <p>ARQUIVO CARREGADO</p>
            </div>
            <script>
              <?php if($this->evolucao == 0){ ?>
            	$("#status_<?php echo $this->php->strZero($cont_documento,2); ?>").html("<img src='images/icones/carregamento_ok.png' border='0' />");
              <?php }else if($this->evolucao == 1){ ?>
            	$("#status_<?php echo $this->php->strZero($cont_documento,2); ?>").html("<img src='images/icones/carregamento_analise.png' border='0' />");
              <?php } ?>
            </script>
<?php
              }
?>
            <script>
              $(document).ready(function(){

              var config_99<?php echo $i; ?> = {
              	url: "data/ajax/upload.php",
              	method: "POST",
                datatype: 'json',
              	allowedTypes:"<?php echo $arquivos_aceitos; ?>",
              	fileName: "myfile",
                formData: {"acao":"create","url":"cadastros/<?php echo $this->php->strZero($this->id,7); ?>/","nome_arquivo":"<?php echo $this->cpf; ?>_regularidade","id":"<?php echo $this->id; ?>","id_processo":"<?php echo $this->id_processo; ?>","documento":"130","cliente":"<?php echo $this->default_cliente_dommus; ?>","servidor_arquivos":"<?php echo preg_replace("/" . $this->default_cliente_dommus . "./","",$this->default_servidor_arquivos); ?>"},
              	multiple: true,
              	onSuccess:function(files,data,xhr)
              	{
                  var arrResultado = data.split('=>');
                  var retorno      = arrResultado[0].trim();
                  var arquivo      = arrResultado[2].trim();
                  var url          = arrResultado[3].trim();
                  url = url.replace(/[\\"}]/g, '');  // "
              	  if(retorno == "1"){
                		$("#status_99<?php echo $i; ?>").html("<img src='images/icones/carregamento_ok.png' border='0' />");
                		$("#quadro_99<?php echo $i; ?> .ajax-file-upload-filename").html("1) <a href='"+url+"' target='_blank'>"+arquivo+"</a>");
                  }
              	},
              	onError: function(files,status,errMsg)
              	{
              		$("#status_99<?php echo $i; ?>").html("<img src='images/icones/carregamento_falha.png' border='0' />");
              	},
              	showDelete: true,
                deleteCallback: function (data, pd) {
                  var arrData = data.split(':');
                  var newData = arrData[1].replace(/[\\"}]/g, '');  // "
                  for (var i = 0; i < 1; i++) {
                    $.post("delete.php", {op: "delete",name: newData}, function(resp,textStatus, jqXHR){
                      //Show Message
                      alert("Arquivo apagado.");
                    });
                  }
                  pd.statusbar.hide(); //You choice.
                }
              }

              $("#documento_99<?php echo $i; ?>").uploadFile(config_99<?php echo $i; ?>);

              });
            </script>

          </div>
          <?php } ?>

          <script>
          // OUCULTA OS QUADROS DE DOCUMENTOS SUBSTITUÍDOS - $documentos_ocultos
<?php
            $arrOcultarQuadros = preg_split("/#/",$ocultar_quadros);
            for($c=1;$c<sizeOf($arrOcultarQuadros)-1;$c++){
?>
            $('#quadro_<?php echo $this->php->strZero($arrOcultarQuadros[$c],3); ?>').hide();
            $('#status_<?php echo $arrOcultarQuadros[$c]; ?>').hide();
            $('#documento_<?php echo $arrOcultarQuadros[$c]; ?>').hide();
<?php
            }
?>
          </script>

<?php
          // VERIFICA QUAIS OS DOCUMENTOS SERÃO REALMENTE EXIGIDOS DO PROPONENTE
          $arrDocumentosProponente = preg_split("/#/",$documentos_proponente[$i]);
          $arrDocumentosOcultos = preg_split("/#/",$documentos_ocultos);

          // REMOVE O PRIMEIRO ITEM DO ARRAY
          array_shift($arrDocumentosProponente);
          array_shift($arrDocumentosOcultos);

          // REMOVE O ÚLTIMO ITEM DO ARRAY
          array_pop($arrDocumentosProponente);
          array_pop($arrDocumentosOcultos);

          $arrDiferencaDocumento[$i] = array_diff($arrDocumentosProponente,$arrDocumentosOcultos);
          $verifica_documentos[$i] = $arrProponentes[$i] . '-' . implode('#',$arrDiferencaDocumento[$i]);
          $verifica_todos .= $verifica_documentos[$i] . ">";

        }
?>

          <h2>OBSERVAÇÕES</h2>

          <div id="quadro_170" class="estilo_quadros" style="background: none !important; margin-top: 0px !important; border: 0px !important">
            <textarea id="campo_170" name="campo_170"><?php if($this->observacao_documentacao){ echo $this->observacao_documentacao; } ?></textarea>
          </div>

        </div>
        <script>
          $( "#form_cadastro" ).submit(function( event ) {
            $("#botao_01").attr("value", "Salvando...");
          });

          <?php if(!$this->id){ ?>
          document.getElementById('campo_001').focus();
          <?php } ?>

          // VERIFICA SE TODOS OS ARQUIVOS FORAM CARREGADOS CORRETAMENTE
          function verificaDownloads(endereco_arquivo,div_alterada,d1,d2) {
            $.ajax(
            {
              type: "POST",
              url: endereco_arquivo,
              data: "d1=" + d1 + "&d2=" + d2,
              beforeSend: function() {
                startLoading();
              },
           		success: function(txt) {
                endLoading();
                $('html, body').animate({ scrollTop: $('#container').offset().top }, 'slow');
                if(txt == 'true'){
                  $('#form_cadastro').submit();
                }else{
                  $(div_alterada).html(txt);
                  $(div_alterada).fadeIn();
                  setTimeout(function(){ $(div_alterada).fadeOut(); }, 3000);
                }
              },
              error: function(txt) {
                endLoading();
                alert('erro');
              }
            }
            );
          }

          $(document).ready(function(){
            // VERIFICA A DOCUMENTAÇÃO
            $('#bt_envia_analise').click(function(){
              verificaDownloads('data/ajax/verifica_downloads.php','#msg','<?php echo $this->id_processo; ?>','<?php echo $verifica_todos; ?>');
            });
          });




          // VALIDA A APROVAÇÃO/REPORVAÇÃO
          <?php if(($_SESSION['tipo_usuario'] == 5 || $_SESSION['tipo_usuario'] == 6) && !$id_manutencao){ ?>
          $().ready(function(){
            var validator = $("#form_cadastro").bind("invalid-form.validate",function(){
              $("#msg").html("Os campos marcados são de preenchimento obrigatório. Campos a verificar: <b>"+ validator.numberOfInvalids()+" campo(s)</b>");
              $("#msg").fadeIn();
            }).validate( {
              errorElement:"div",
              errorPlacement: function(error,element){
//                element.parent("td").next("td").html(error);
                  if( element.is(':radio') || element.is(':checkbox')) {
                    error.appendTo(element.parent());
                    element.parent(".error").css({"color": "red", "border": "2px solid red"});
                  } else {
//                    error.insertAfter(element);
                  }
              },
              success: function (label){
//                label.text("Ok!").removeClass("error").addClass("ok");
                  label.text("Ok!").fadeOut();
              },
              submitHandler: function(form){
                form.submit();
              },
              rules:{
                <?php
                for($i=1;$i<sizeOf($arrProponentes)-1;$i++){
                  $this->con1->consulta("SELECT id FROM tb_documento WHERE status=1 ORDER BY id");
                  while($this->con1->proxRegistro()){
                ?>
                'aprovacao_documento[<?php echo $arrProponentes[$i]; ?>][<?php echo $this->con1->data["id"]; ?>]':{required:true},
                'justificativa_documento[<?php echo $arrProponentes[$i]; ?>][<?php echo $this->con1->data["id"]; ?>]':{
                  required:{
                    depends: function(element) {
                      if($('#aprovacao_documento_<?php echo $arrProponentes[$i]; ?>_<?php echo $this->con1->data["id"]; ?>b').prop('checked') == true){
                        return true;
                      }else{
                        return false;
                      }
                    }
                  }
                },
                <?php
                  }
                }
                ?>
              },
              messages:{
                <?php
                for($i=1;$i<sizeOf($arrProponentes)-1;$i++){
                  $this->con1->consulta("SELECT id FROM tb_documento WHERE status=1 ORDER BY id");
                  while($this->con1->proxRegistro()){
                ?>
                'aprovacao_documento[<?php echo $arrProponentes[$i]; ?>][<?php echo $this->con1->data["id"]; ?>]':{required:"<img src='images/icones/ico_alert.png' border='0' />",},
                <?php
                  }
                }
                ?>
              }
            })
          });
          <?php } ?>




        </script>
      </form>
