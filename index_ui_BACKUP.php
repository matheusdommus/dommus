<?php

require_once 'header.php';

?>

<body>
  <div class="dommus-wrapper">
    <!-- SIDEBAR -->
    <?php require_once 'sidebar.php' ?>
    <!-- FIM SIDEBAR -->
    <!-- INICIO WRAPPER -->
    <div class="dommus-content">
      <div class="float-content">
        <div class="title-wrapper">
          <h4 class="page-title">CONTRATO</h4>
          <div class="btn-actions-wrapper">
            <a class="btn btn-novo" href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i><p>NOVO</p></a>
            <a class="btn btn-novo" href="#"><i class="fa fa-search" aria-hidden="true"></i><p>REGISTROS</p></a>
          </div>
        </div>
        <!-- NAVEGAÇÃO PASSOS -->
        <ul class="navigation-steps">
          <li>
            <a class="btn" href="#">Cadastro</a>
          </li>
          <li>
            <a class="btn" href="#">Documentação</a>
          </li>
          <li>
            <a class="btn active" href="#">Contrato</a>
          </li>
          <li>
            <a class="btn" href="#">Repasse</a>
          </li>
          <li>
            <a class="btn" href="#">Registro</a>
          </li>
          <li>
            <a class="btn" href="#">Custas</a>
          </li>
          <li>
            <a class="btn" href="#">Chaves</a>
          </li>
          <li>
            <a class="btn" href="#">Histórico</a>
          </li>
          <li>
            <a class="btn" href="#">Interações</a>
          </li>
        </ul>
        <!-- FIM NAVEGAÇÃO PASSOS -->
      </div>
      <div class="processo-wrapper">
        <h4  id="processo">INFORMAÇÃO DO PROCESSO</h4>
        <div class="processo-section-1-wrapper">
          <div class="processo-title">
            <div class="num-processo">
              <span id="num-processo">PROCESSO Nº:</span>
              <span>03810</span>
            </div>
            <div class="status-processo">
              <span>Status:</span>
              <span id="status-processo">REGISTRADO</span>
            </div>
          </div>
          <div class="processo-proponente">
            <div class="proponente">
              <span id="proponente-num">Proponentes:082.606.317-92</span>
              <span id="proponente-nome">BARBARA GOMES PEREIRA</span>
            </div>
            <div class="valor-avaliado">
              <span>Valor avaliado para o processo:</span>
              <span id="valor-avaliado">R$ 118.600,00</span>
            </div>
          </div>
          <div class="processo-content">
            <div class="row">
              <div class="col-md-4 itens produto">
                <h4>Produto:</h4>
                <p id="nome-empreendimento"><span>Empreendimento: </span>ÁGUAS DE GUANABARA </p>
                <p id="unidade-id"><span>Unidade: </span>BL09UN404 (VD: 124.999,00) </p>
                <p id="modulo-fase"><span>Módulo/Fase: </span>1</p>
                <p id="status-unidade"><span>Status da Unidade: </span>VENDIDA</p>
              </div>
              <div class="col-md-4 itens envolvidos">
                <h4>Envolvidos: </h4>
                <p id="pdv-nome"><span>PDV/Imobiliária: </span>IMOBILIÁRIA - ACELLERA (ÁGUAS DE GU... </p>
                <p id="pdv-gerente"><span>Gerente: </span>ARITAN CORDEIRO</p>
                <p id="pdv-corretor"><span>Corretor: </span>ANA PAULA PINTO ZOGAIB</p>
                <p id="pdv-operador"><span>Operador Coban: </span>RJ - CCA CONFIANCA</p>
              </div>
              <div class="col-md-4 itens prazos">
                <h4>Acompanhamento de Prazos:</h4>
                <p id="data-cadastro"><span>Data de Cadastro: </span>27/07/2018 (75 dias)</p>
                <p id="data-venda"><span>Data da Venda: </span>28/07/2018 (74 dias)</p>
                <p id="ultima-atualizacao"><span>Última Atualização: </span>10/10/2018 (0 dias)</p>
              </div>
            </div>
          </div>
        </div>
        <div class="processo-section-2">
          <div class="row">
            <div class="col-sm-12 col-lg-8 item avaliacao-financiamento">
              <div class="avaliacao-title-wrapper">
                <h4 id="avalicao-financiamento">AVALIAÇÃO DE FINANCIAMENTO</h4>
                <a class="btn btn-aprovacao" href="#" data-toggle="tooltip" data-placement="left" title="Validar Financiamento"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
              </div>

              <div class="processo-section-2-wrapper toggle-out" id="toggle-on">
                <div class="row">
                  <div class="col-sm-12 col-lg-3 item">
                    <label>Status da Avaliação:</label>
                    <p id="status-avaliacao" class="green">APROVADO</p>
                  </div>
                  <div class="col-sm-12 col-lg-2 item">
                    <label>Validade:</label>
                    <p id="validade-avaliacao">30/06/2018</p>
                  </div>
                  <div class="col-sm-12 col-lg-2 item">
                    <label>Renda Validada:</label>
                    <p id="renda-valiada">1.200,00</p>
                  </div>
                  <div class="col-sm-12 col-lg-5 item">
                    <label>Total Aprovado (FGTS + Subsídio + Fin.):</label>
                    <p id="totalidade-aprovada">110.000,00</p>
                  </div>
                  <div class="col-sm-12 col-lg-2 item">
                    <label>FGTS:</label>
                    <p id="valor-fgts" >1000,00</p>
                  </div>
                  <div class="col-sm-12 col-lg-2 item">
                    <label>Subsídio:</label>
                    <p id="valor-subsidio">1000,00</p>
                  </div>
                  <div class="col-sm-12 col-lg-2 item">
                    <label>Financiamento:</label>
                    <p id="valor-financiamento">100000,00</p>
                  </div>
                  <div class="col-sm-12 col-lg-2 item">
                    <label>Prazo:</label>
                    <p id="prazo-financiamento">360 meses</p>
                  </div>
                  <div class="col-sm-12 col-lg-2 item">
                    <label>Parcela:</label>
                    <p id="vl-parcela-financiada">500,00</p>
                  </div>
                  <div class="col-sm-12 col-lg-2 item">
                    <label>Valor Custas:</label>
                    <p id="valor-custas">3.000,00</p>
                  </div>
                </div>
                <h4 id="fluxo">FLUXO DE PAGAMENTO (NEGOCIAÇÃO)</h4>
                <div class="fluxo-fields">
                  <div class="row">
                    <div class="col-sm-12 col-lg-3 item">
                      <label>Valor do Contrato:</label>
                      <p id="valor-contrato" value="16000000">160.000,00</p>
                    </div>
                    <div class="col-sm-12 col-lg-2 item">
                      <label>Parcela Bônus:</label>
                      <p id="parcela-bonus">10.000,00</p>
                    </div>
                    <div class="col-sm-12 col-lg-2 item">
                      <label>Aprovado:</label>
                      <p id="valor-aprovado">110.000,00</p>
                    </div>
                    <div class="col-sm-12 col-lg-2 item">
                      <label>Pró-Soluto:</label>
                      <p id="vl-prosoluto">30.000,00</p>
                    </div>
                    <div class="col-sm-12 col-lg-3 item">
                      <label>Custas de Registro:</label>
                      <p id="valor-custas-registro">3.500,00</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-4 item unidade-interesse">
              <h4 id="unidade-interesse">UNIDADE DE INTERESSE</h4>
              <div class="processo-section-2-wrapper toggle-out" id="toggle-on">
                <label>Unidade:</label>
                <div class="form-group">
                  <select class="form-control" id="unidade">
                    <option value="0">--- SELECIONE ---</option>
                    <option value="250000">ÁGUAS DE GUANABARA</option>
                    <option value="415000">AQUARELA MAIS</option>
                    <option value="375000">IDEALE PREMIUM</option>
                    <option value="525000">JARDIM DAS ÁGUAS</option>
                    <option value="6250000">PARK CLUB</option>
                  </select>
                </div>
                <label>Campanha Promocional:</label>
                <div class="form-group">
                  <select class="form-control" id="camp-promocional" disabled>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Código Promocional:</label>
                  <input type="email" class="form-control" id="codigo-promocional" disabled placeholder="R$ 0,00">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="processo-section-3">
        <div class="row">
          <div class="col-sm-12 col-lg-8 fluxo-pagamento">
            <div class="processo-section-3-wrapper toggle-out" id="toggle-on">
              <div class="negociacao-title-wrapper">
                <h4>NEGOCIAÇÃO PRÓ-SOLUTO</h4>
                <div class="valor-distribuir" id="valor-distribuir">
                  Valor à distribuir: <span></span>
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
                        <label for="qtde-parcelas">Qtde parcelas:</label>
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
              </div>
              <!-- Fim Calculo Pro-soluto -->
            </div>
          </div>
          <!-- Pré-Aprovação -->
          <div class="col-sm-12 col-lg-4 pre-aprovacao">
            <h4 id="pre-aprovacao">PRÉ-APROVAÇÃO</h4>
            <div class="requisitos toggle-out" id="toggle-on">
              <div class="item">
                <h6>1) <b>MIN</b> e <b>MÁX</b> de valores e parcelas</h6>
                <i class="fa fa-check" aria-hidden="true"></i>
              </div>
              <div class="item">
                <h6>2) % <b>Máximo</b> da Renda Mensal: <span>30%</span> / <span>30%</span></h6>
                <i class="fa fa-times" aria-hidden="true"></i>
              </div>
              <div class="item">
                <h6>3) % <b>Mínimo</b> de Pré-Chaves: <span>85%</span> / <span>90%</span></h6>
                <i class="fa fa-check" aria-hidden="true"></i>
              </div>
              <div class="item">
                <h6>4) % <b>de Perda</b> do VPL: <span>4,75%</span> / <span>5,00%</span></h6>
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
          <!-- FIM Pré-Aprovação -->
        </div>
      </div>
      <!-- Tabela Resumo do Fluxo -->
      <div class="processo-section-4">
        <div class="row">
          <div class="col-sm-12 col-lg-8 fluxo">
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
        </div>
      </div>
      <!--Fim Tabela Resumo do Fluxo -->
    </div>
    <!-- FIM WRAPPER -->
  </div>
  <?php

  require_once 'footer.php';

  ?>
