<?php
  // CONSULTA DO PROCESSO
  $sql_processo = "SELECT tb_processo.*,
                   P1.nome as nome_proponente1, P1.cpf as cpf_proponente1,
                   P2.nome as nome_proponente2, P2.cpf as cpf_proponente2,
                   P3.nome as nome_proponente3, P3.cpf as cpf_proponente3,
                   tb_empreendimento.nome as nome_empreendimento, tb_empreendimento.zerar_sinal, tb_empreendimento.contrato_ativo, tb_empreendimento.contrato_reserva, tb_empreendimento.subsidio_estadual as subsidio_estadual_empreendimento, tb_empreendimento.exibe_pagos_negociacao, tb_empreendimento.modo_repasse_registro,
                   tb_unidade.descricao as descricao_unidade, tb_unidade.modulo as modulo_unidade, tb_tipo_unidade.descricao as descricao_tipo_unidade, tb_unidade.valor as valor_unidade, tb_unidade.valor_avaliacao as valor_avaliacao_unidade, tb_unidade.disponibilidade as disponibilidade_unidade,
                   tb_modulo_empreendimento.adimplencia_premiada as adimplencia_premiada_empreendimento,
                   tb_grupo_usuario.nome as nome_grupo_usuario, c.nome as nome_gerente, b.nome as nome_corretor, a.nome as nome_operador_coban,
                   tb_empreendimento.previsao_entrega, tb_empreendimento.cobrar_custas, tb_empreendimento.valor_custas, tb_empreendimento.parcelas_custas, tb_empreendimento.inicio_custas, tb_empreendimento.pos_chaves, tb_empreendimento.valor_pos_chaves, tb_empreendimento.parcelas_pos_chaves as parcelas_pos_chaves_empreendimento, tb_empreendimento.sinal, tb_empreendimento.valor_sinal,tb_empreendimento.pre_chaves, tb_empreendimento.valor_pre_chaves, tb_empreendimento.parcelas_pre_chaves as parcelas_pre_chaves_empreendimento, tb_empreendimento.intermediarias, tb_empreendimento.valor_intermediarias, tb_empreendimento.parcelas_intermediarias as parcelas_intermediarias_empreendimento, tb_empreendimento.chaves, tb_empreendimento.valor_chaves, tb_empreendimento.valor_avaliacao_flutuante, tb_empreendimento.corretagem_sinal as corretagem_sinal_empreendimento,
                   tb_etapas_workflow.nome AS nome_etapa_workflow
                   FROM tb_processo
                   INNER JOIN tb_pessoa_fisica P1 ON tb_processo.proponente1 = P1.id
                   LEFT JOIN tb_pessoa_fisica P2 ON tb_processo.proponente2 = P2.id
                   LEFT JOIN tb_pessoa_fisica P3 ON tb_processo.proponente3 = P3.id
                   LEFT JOIN tb_empreendimento ON tb_processo.empreendimento = tb_empreendimento.id
                   LEFT JOIN tb_unidade ON tb_processo.unidade = tb_unidade.id
                   LEFT JOIN tb_tipo_unidade ON tb_unidade.tipo = tb_tipo_unidade.id
                   LEFT JOIN tb_modulo_empreendimento ON tb_unidade.modulo = tb_modulo_empreendimento.modulo AND tb_empreendimento.id = tb_modulo_empreendimento.empreendimento
                   LEFT JOIN tb_grupo_usuario ON tb_processo.grupo_usuario = tb_grupo_usuario.id
                   LEFT JOIN tb_sgg3_autenticacao c ON tb_processo.gerente = c.id
                   LEFT JOIN tb_sgg3_autenticacao b ON tb_processo.corretor = b.id
                   LEFT JOIN tb_sgg3_autenticacao a ON tb_processo.operador_coban = a.id
                   LEFT JOIN tb_etapas_workflow ON tb_processo.etapa_workflow = tb_etapas_workflow.id
                   WHERE tb_processo.id='" . $this->id_processo . "'
                   GROUP BY tb_processo.id";
  $this->con1->consulta($sql_processo);
  if($this->con1->nrows > 0){
    $this->con1->proxRegistro();

    // DADOS DO PROCESSO
    $this->evolucao                             = $this->con1->data['evolucao'];
    $this->status_evolutivo                     = $this->con1->data['status_evolutivo'];
    $this->workflow                             = $this->con1->data['workflow'];
    $this->etapa_workflow                       = $this->con1->data['etapa_workflow'];
    $this->nome_etapa_workflow                  = $this->con1->data['nome_etapa_workflow'];

    // DADOS DO 1º PROPONENTE
    $this->id_proponente1                       = $this->con1->data['proponente1'];
    $this->nome_proponente1                     = $this->con1->data['nome_proponente1'];
    $this->cpf_proponente1                      = $this->con1->data['cpf_proponente1'];

    // DADOS DO 2º PROPONENTE, CASO EXISTA
    if($this->con1->data['proponente2']){
      $this->id_proponente2                     = $this->con1->data['proponente2'];
      $this->nome_proponente2                   = $this->con1->data['nome_proponente2'];
      $this->cpf_proponente2                    = $this->con1->data['cpf_proponente2'];
    }

    // DADOS DO 3º PROPONENTE, CASO EXISTA
    if($this->con1->data['proponente3']){
      $this->id_proponente3                     = $this->con1->data['proponente3'];
      $this->nome_proponente3                   = $this->con1->data['nome_proponente3'];
      $this->cpf_proponente3                    = $this->con1->data['cpf_proponente3'];
    }

    // DADOS DO EMPREENDIMENTO
    $this->empreendimento                       = $this->con1->data['empreendimento'];
    $this->nome_empreendimento                  = $this->con1->data['nome_empreendimento'];
    $this->instituicao_financiamento            = $this->con1->data['instituicao_financiamento'];

    // DADOS DA UNIDADE
    $this->unidade                              = $this->con1->data['unidade'];
    $this->descricao_unidade                    = $this->con1->data['descricao_unidade'];
    $this->modulo_unidade                       = $this->con1->data['modulo_unidade'];
    $this->descricao_tipo_unidade               = $this->con1->data['descricao_tipo_unidade'];
    $this->valor_unidade                        = $this->con1->data['valor_unidade'];
    $this->valor_avaliacao_unidade              = $this->con1->data['valor_avaliacao_unidade'];
    switch ($this->con1->data['disponibilidade_unidade']) {
      case 'D':
        $this->disponibilidade_unidade = "DISPONÍVEL";
        break;
      case 'I':
      case 'P':
        $this->disponibilidade_unidade = "INDISPONÍVEL";
        break;
      case 'V':
        $this->disponibilidade_unidade = "VENDIDA";
        break;
      case 'R':
        $this->disponibilidade_unidade = "RESERVADA";
        break;
    }

    // DADOS DA EQUIPE
    $this->nome_grupo_usuario                   = $this->con1->data['nome_grupo_usuario'];
    $this->nome_gerente                         = $this->con1->data['nome_gerente'];
    $this->nome_corretor                        = $this->con1->data['nome_corretor'];
    $this->nome_operador_coban                  = $this->con1->data['nome_operador_coban'];
    $this->nivel_pre_venda                      = $this->con1->data['nivel_pre_venda'];
  }

  require_once('inc/navegacao.php');
  require_once('inc/cabecalho-processo.php');
?>

      <div class="processo-section-2">
        <div class="row">
          <div class="col-sm-12 col-lg-8 item avaliacao-financiamento">
            <div class="avaliacao-title-wrapper">
              <h4 id="avalicao-financiamento">ANÁLISE DE CRÉDITO</h4>
              <a class="btn btn-aprovacao" href="#" data-toggle="tooltip" data-placement="left" title="Validar Financiamento"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
            </div>

            <div class="processo-section-2-wrapper toggle-out" id="toggle-on">
              <div class="row">
                <div class="col-sm-12 col-lg-3 item">
                  <label>Banco:</label>

                  <div class="btn-group">
                    <a id="instituicao-financeira" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">CEF (CAIXA)</a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <button class="dropdown-item" type="button">Banco do Brasil</button>
                      <button class="dropdown-item" type="button">Santander</button>
                      <button class="dropdown-item" type="button">Bradesco</button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-lg-2 item data-item">
                  <label>Data:</label>
                  <p id="data-avaliacao">30/10/2018</p>
                </div>
                <div class="col-sm-12 col-lg-2 item validade-item">
                  <label>Validade:</label>
                  <p id="validade-avaliacao">30/01/2019</p>
                </div>
                <div class="col-sm-12 col-lg-2 item price">
                  <label>Tabela:</label>
                  <p id="tabela-aprovada">PRICE</p>
                </div>
                <div class="col-sm-12 col-lg-2 item">
                  <label>Vr. Avaliado:</label>
                  <p id="valor-avaliado">110.000,00</p>
                </div>
                <div class="col-sm-12 col-lg-1 item aprovacao">
                  <p id="status-avaliacao">A</p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-lg-2 item">
                  <label>Desc. 0,5%:</label>
                  <p id="desconto-meio" >SIM</p>
                </div>
                <div class="col-sm-12 col-lg-2 item">
                  <label>Custas Finan.:</label>
                  <p id="valor-custas">0,00</p>
                </div>
                <div class="col-sm-12 col-lg-2 item fgts-item">
                  <label>FGTS:</label>
                  <p id="valor-fgts" >0,00</p>
                </div>
                <div class="col-sm-12 col-lg-2 item">
                  <label>Subsídio:</label>
                  <p id="valor-subsidio">14.267,00</p>
                </div>
                <div class="col-sm-12 col-lg-2 item financiamento-item">
                  <label>Financiamento:</label>
                  <p id="valor-financiamento">97.600,00</p>
                </div>
                <div class="col-sm-12 col-lg-2 item item-total-aprovado">
                  <label>Tot. Aprovado:</label>
                  <p id="totalidade-aprovada">111.867,00</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-lg-4 item unidade-interesse">
            <h4 id="unidade-interesse">UNIDADE DE INTERESSE</h4>
            <div class="processo-section-2-wrapper toggle-out" id="toggle-on">
              <label>Unidade:</label>
              <div class="form-group">
                <select class="form-control form-control-sm" id="unidade">
                  <option value="0">--- SELECIONE ---</option>
                  <option value="123500">BL04UN204-123.500,00 / AV: 122.000,00</option>
                  <option value="123500">BL05UN201-123.500,00 / AV: 122.000,00</option>
                  <option value="123500">BL06UN402-123.500,00 / AV: 122.000,00</option>
                  <option value="123500">BL20UN103-123.500,00 / AV: 122.000,00</option>
                  <option value="123500">BL22UN301-123.500,00 / AV: 122.000,00</option>
                </select>
              </div>
              <label>Tipo de negociação:</label>
              <div class="form-group">
                <select class="form-control form-control-sm" id="tipo-negociacao">
                  <option value="">--- SELECIONE ---</option>
                  <option value="I">FLUXO DE NEGOCIAÇÃO</option>
                  <option value="P">PARCELAS FIXAS</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="processo-section-3">
        <div class="row">
          <div class="col-sm-12 col-lg-8 ">
            <div class="fluxo-pagamento">
              <div class="processo-section-3-wrapper toggle-out" id="toggle-on">
              <div class="negociacao-title-wrapper">
                <h4>ENTRADA (NEGOCIAÇÃO)</h4>
                <div class="valor-distribuir" id="valor-distribuir">
                  Valor da Entrada: <span></span>
                </div>
              </div>
              <div class="fluxo-fields">
                <div class="row">
                  <div class="col-6 col-sm-6 col-lg-2 item">
                    <label>Vr. Unidade:</label>
                    <p id="valor-unidade" value="123.500,00">123.500,00</p>
                  </div>
                  <div class="col-6 col-sm-6 col-lg-2 item">
                    <label>Bônus:</label>
                    <p id="parcela-bonus">0,00</p>
                  </div>
                  <div class="col-6 col-sm-6 col-lg-2 item total-contrato">
                    <label>Tot. Contrato:</label>
                    <p id="total-contrato">123.500,00</p>
                  </div>
                  <div class="col-6 col-sm-6 col-lg-2 item item-total-aprovado">
                    <label>Tot. Aprovado:</label>
                    <p id="totalidade-aprovada">111.867,00</p>
                  </div>
                  <div class="col-6 col-sm-6 col-lg-2 item item-entrada">
                    <label>Vr. Entrada:</label>
                    <p id="valor-entrada">111.867,00</p>
                  </div>
                  <div class="col-6 col-sm-6 col-lg-2 item entrada" style="text-align:right;">
                    <label>Vr. à Distribuir:</label>
                    <p id="valor-entrada" style="color:#f19d1f;">11.633,00</p>
                  </div>
                </div>
              </div>
              <div class="negociacao-fields-wrapper">
                <div id="form-fluxo">
                  <div class="row">
                    <div class="col-sm-12 col-lg-3 item">
                      <label>Tipo da parcelas:</label>
                        <div class="form-group">
                          <select class="form-control custom-select" id="tipo-parcela" required>
                            <option>SINAL</option>
                            <option>MENSAL</option>
                            <option>SEMESTRAL</option>
                            <option>ANUAL</option>
                            <option>AVULSO</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 item">
                      <div class="form-group">
                        <label for="qtde-parcelas">Qtd parcelas:</label>
                        <input type="number" class="form-control" id="qtde-parcelas" required value="1" placeholder="1" required>
                      </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 item">
                      <div class="form-group">
                        <label for="valor-parcela">Valor parcela:</label>
                        <input type="text" class="form-control" id="valor-parcela" required placeholder="R$ 0,00" required>
                      </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 item">
                      <div class="form-group date">
                        <label for="dia-vencimento">Vencimento:</label>
                        <input type="text" class="form-control" id="dia-vencimento" placeholder="DD/MM/AAAA"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <div class="col-sm-12 col-lg-2">
                      <a id="btn-distribuir" class="btn btn-distribuir" href="#" type="button"><i class="fa fa-plus" aria-hidden="true" ></i>DISTRIBUIR</a>

                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Editar Fluxo -->
              <div class="modal fade" id="editar-fluxo" tabindex="-1" role="dialog" aria-labelledby="editar-fluxo" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="titulo-modal" value="">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <?php require_once 'inc/modal-editar.php'; ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-fechar-fluxo" data-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary btn-salvar-fluxo">Salvar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--Fim Modal Editar Fluxo -->
              <!-- Calculo Pro-soluto -->
              <div class="pro-soluto-wrapper">
                <div class="table-responsive">
                  <table id="table-fluxo" class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">TIPO</th>
                        <th scope="col">QTDE</th>
                        <th scope="col">VALOR</th>
                        <th scope="col">VENCIMENTO</th>
                        <th scope="col">PARCIAL</th>
                        <th scope="col">(%) CONTRATO</th>
                        <th scope="col" colspan=2>AÇÕES</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="linha-financiamento">
                        <td><b>PARCELA BANCO</b></td>
                        <td>1</td>
                        <td>0,00</td>
                        <td>-</td>
                        <td>0,00</td>
                        <td>%</td>
                        <td>-</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="btn-fluxo-wrapper">
                  <a id="abrir-validar-fluxo" class="btn btn-fluxo" href="#" data-toggle="modal" data-target="#validar-fluxo" type="button" name="button">VALIDAR FLUXO</a>
                </div>
              </div>
              <!-- Fim Calculo Pro-soluto -->
              </div>
            </div>
            <h4 id="toggle-fluxo">RESUMO DO FLUXO</h4>
            <div class="processo-section-4-wrapper" id="toggle-on">
              <div class="resumo-fluxo-wrapper">
                <div class="table-responsive">
                  <table class="table table-hover table-striped table-bordered" id="resumo-fluxo">
                    <caption><span>Previsão de Entrega do Empreendimento:</span> 31/12/2019</caption>
                    <thead>
                      <tr>
                        <th scope="col">TIPO</th>
                        <th scope="col">QTDE</th>
                        <th scope="col">VALOR</th>
                        <th scope="col">INÍCIO</th>
                        <th scope="col">TÉRMINO</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Pré-Aprovação -->
          <div class="col-sm-12 col-lg-4 ">
            <div class="desconto">
              <h4 id="pre-desconto">DESCONTO</h4>
              <div class="desconto-wrapper">
                <label>Campanha Promocional:</label>
                <div class="form-group">
                  <select class="form-control form-control-sm" id="camp-promocional" disabled>
                    <option>FINAL DE ANO VIA SUL</option>
                    <option>FEIRÃO CAIXA 2019</option>
                    <option>INDICAÇÃO PREMIADA</option>
                    <option>FEIRÃO DE JANEIRO CUIABA</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Código Promocional:</label>
                  <input type="email" class="form-control form-control-sm" id="codigo-promocional" disabled placeholder="XX-1234">
                </div>
              </div>
            </div>
            <div class="pre-aprovacao">
              <h4 id="pre-aprovacao">PRÉ-APROVAÇÃO</h4>
              <div class="requisitos toggle-out" id="toggle-on">
                <div class="item">
                  <h6>1) Flexibilização:</h6>
                  <i class="fa fa-check" aria-hidden"true"></i>
                </div>
                <div class="item">
                  <h6>2) Limites de valores:</h6>
                  <i class="fa fa-check" aria-hidden"true"></i>
                </div>
                <div class="item">
                  <h6>3) % da entrada sobre a unidade:</h6>
                  <i class="fa fa-check" aria-hidden"true"></i>
                </div>
                <div class="item">
                  <h6>4) % da renda do proponente: </h6>
                  <i class="fa fa-check" aria-hidden="true"></i>
                </div>
                <div class="item">
                  <h6>5) % do Pós-Chaves sobre o valor da unidade: </h6>
                  <i class="fa fa-check" aria-hidden="true"></i>
                </div>
                <div class="item">
                  <h6>6) % Distribuição da entrada: </h6>
                  <i class="fa fa-check" aria-hidden="true"></i>
                </div>
                <div class="item">
                  <h6>7) % VPL(valor presente liquido): </h6>
                  <i class="fa fa-check" aria-hidden="true"></i>
                </div>
                <button class="btn btn-danger btn-condicao disabled" type="button" name="button">CONDIÇÃO ESPECIAL</button>
                <button class="btn btn-primary btn-abrir-avalista" data-toggle="modal" data-target="##modal-avalista" type="button" name="button">INCLUIR AVALISTA</button>
                <!-- Modal Avalista -->
                <div class="modal fade bd-example-modal-lg" id="#modal-avalista" tabindex="-1" role="dialog" aria-labelledby="#modal-avalistaLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="pills-avalista-tab" data-toggle="pill" href="#pills-avalista" role="tab" aria-controls="pills-home" aria-selected="true">Dados do Avalista</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-documento-tab" data-toggle="pill" href="#pills-documento" role="tab" aria-controls="pills-profile" aria-selected="false" disabled>Documentação</a>
                          </li>
                        </ul>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php require_once 'inc/avalista.php'; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fim Modal Avalista -->
                <div class="avalistas-wrapper">
                  <a href="#" id="avalista-nome"></a>
                </div>
              </div>
            </div>
          </div>
          <!-- FIM PrÃ©-AprovaÃ§Ã£o -->
        </div>
      </div>
      <div class="meus-produtos">
        <h4 id="toggle-produtos">PRODUTOS</h4>
        <div class="produtos">
          <div class="valores-fixos">
            <div class="itens">
              <h6>1) Entrada</h6>
              <span>30.000,00</span>
            </div>
            <div class="infos">
              <h6>Fluxo</h6>
              <p>01/11/2018</p>
            </div>
            <div class="itens">
              <h6>2)Parcela Banco</h6>
              <span>3.500,00</span>
            </div>
            <div class="infos">
              <h6>Financimaneto + Subsidio + FGTS</h6>
              <p>01/01/2020</p>
            </div>
          </div>
          <div class="produtos-wrapper">
            <div class="itens">
              <h6>3) Custas Para Registro</h6>
              <span>3.500,00</span>
            </div>
            <div class="infos">
              <h6>48x 150,00</h6>
              <p>01/11/2018</p>
            </div>
            <div class="itens">
              <h6>4) Seguro Prestavista</h6>
              <span>480,00</span>
            </div>
            <div class="infos">
              <h6>48x 10,00</h6>
              <p>01/11/2018</p>
            </div>
            <div class="itens">
              <h6>5)Kit Acabamento</h6>
              <span>5.000,00</span>
            </div>
            <div class="infos">
              <h6>10x 500,00</h6>
              <p>01/01/2019</p>
            </div>
            <div class="total">
              <h6>TOTAL</h6>
              <p>48.480,00</p>
            </div>
          </div>
          <div class="button-add">
            <button class="btn btn-primary btn-abrir-produto" data-toggle="modal" data-target="#modal-produto" type="button" name="button">INCLUIR PRODUTO</button>
            <button class="btn btn-primary btn-abrir-fluxo" data-toggle="modal" data-target="#validar-fluxo" type="button" name="button">CONCLUIR NEGOCIAÇÃO</button>
          </div>
        </div>
      </div>

      <!-- Modal Fluxo -->
      <div class="modal fade bd-example-modal-lg" id="validar-fluxo" tabindex="-1" role="dialog" aria-labelledby="#modal-avalistaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="validar-fluxo">Tabela de Pagamento do Pró-soluto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php require_once 'inc/validar-fluxo.php'; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-imprimir-fluxo" >Imprimir</button>
              <button type="submit" class="btn btn-primary" id="ir-documentos">Enviar para análise</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal Produtos -->
    <div class="modal fade" id="modal-produto" tabindex="-1" role="dialog" aria-labelledby="modal-produtoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-produtoModalLabel">Selecione os produtos desejados</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="" action="index.html" method="post">
            <div class="modal-body">
              <?php require_once 'inc/add-produto.php'; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary">Inserir</button>
            </div>
          </form>

        </div>
      </div>
    </div>
      <!--Fim Tabela Resumo do Fluxo -->
