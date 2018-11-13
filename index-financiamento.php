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
      </div>
    </div>
  </div>
  <?php

  require_once 'footer.php';

  ?>
