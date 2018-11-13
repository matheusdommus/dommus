      <div class="processo-wrapper">
        <h4  id="processo">INFORMAÇÕES DO PROCESSO</h4>
        <div class="processo-section-1-wrapper">
          <div class="processo-title">
            <div class="num-processo">
              <span id="num-processo">PROCESSO N:</span>
              <span><?php echo $this->php->strZero($this->id_processo,5); ?></span>
            </div>
            <div class="status-processo">
              <span>Status:</span>
              <span id="status-processo"><?php echo $this->nome_etapa_workflow; ?></span>
            </div>
          </div>
          <div class="processo-proponente">
            <div class="proponente">
              <span id="proponente-num">Proponentes: <?php echo $this->php->mascara($this->cpf_proponente1,'###.###.###-##'); ?></span>
              <span id="proponente-nome"><?php echo $this->nome_proponente1; ?></span>
              <?php if($this->id_proponente2){ ?>
              <span id="proponente-num"><?php echo $this->php->mascara($this->cpf_proponente2,'###.###.###-##'); ?></span>
              <span id="proponente-nome"><?php echo $this->nome_proponente2; ?></span>
              <?php } ?>
              <?php if($this->id_proponente3){ ?>
              <span id="proponente-num"><?php echo $this->php->mascara($this->cpf_proponente3,'###.###.###-##'); ?></span>
              <span id="proponente-nome"><?php echo $this->nome_proponente3; ?></span>
              <?php } ?>
            </div>
            <div class="valor-avaliado">
              <span>Valor avaliado para o processo:</span>
              <span id="valor-avaliado">R$ xxx.xxx,xx</span>
            </div>
          </div>
          <div class="processo-content">
            <div class="row">
              <div class="col-md-4 itens produto">
                <h4>Produto:</h4>
                <p id="nome-empreendimento"><span>Empreendimento: </span><?php echo $this->nome_empreendimento; ?></p>
                <p id="unidade-id"><span>Unidade: </span><?php echo $this->descricao_unidade; ?> (<?php echo 'VE: ' . number_format($this->valor_unidade,2,',','.') . ' | AV: ' . number_format($this->valor_avaliacao_unidade,2,',','.'); ?>)</p>
                <p id="modulo-fase"><span>Módulo/Fase: </span><?php echo $this->modulo_unidade; ?> / Tipo Unidade: <?php echo $this->descricao_tipo_unidade; ?></p>
                <p id="status-unidade"><span>Status da Unidade: </span><?php echo $this->disponibilidade_unidade; ?></p>
              </div>
              <div class="col-md-4 itens envolvidos">
                <h4>Envolvidos: </h4>
                <p id="pdv-nome"><span>PDV/Imobiliária: </span><?php echo $this->nome_grupo_usuario; ?></p>
                <p id="pdv-gerente"><span>Gerente: </span><?php echo $this->nome_gerente; ?></p>
                <p id="pdv-corretor"><span>Corretor: </span><?php echo $this->nome_corretor; ?></p>
                <p id="pdv-operador"><span>Operador Coban: </span><?php echo $this->nome_operador_coban; ?></p>
              </div>
              <div class="col-md-4 itens prazos">
                <h4>Acompanhamento de Prazos:</h4>
                <p id="data-cadastro"><span>Data de Cadastro: </span><?php echo $this->php->inverteData($arrDataCadastro[0]) . ' (' . floor((strtotime(now) - strtotime($arrDataCadastro[0])) / (24 * 60 * 60 )) . ' dias' . ')'; ?></p>
                <p id="data-venda"><span>Data da Venda: </span></p>
                <p id="ultima-atualizacao"><span>Última Atualização: </span>31/10/2018 (1 dia)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
