<?php $listaDocumentos = array(
  '1' => 'Carregue os arquivos de APROVAÇÃO DA ANÁLISE emitidos banco (Ex: Aprovação/Condicionantes/Simulação):',
  '2' => 'Carregue o arquivo com os FORMULÁRIOS EMITIDOS PELO SISTEMA DA CAIXA:',
  '3' => 'Carregue o arquivo da PROPOSTA DE SEGURO (DPS) para assinatura do cliente:'
);

  ?>
<?php $listaDocumentosReprovados = array(
  '1' => 'Carregue o print da TELA DE REPROVAÇÃO do banco:');
  ?>

<div class="nova-avaliacao">
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-aprovado-tab" data-toggle="pill" href="#pills-aprovado" role="tab" aria-controls="pills-aprovado" aria-selected="true">Aprovação</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-documentos-tab" data-toggle="pill" href="#pills-documentos" role="tab" aria-controls="pills-documentos" aria-selected="false">Documentação</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-aprovado" role="tabpanel" aria-labelledby="pills-aprovado-tab">
      <div class="aprovacoes-wrapper">
        <div class="form-group">
          <select class="form-control" id="banco-id">
            <option value="">-- Instituição Financeira --</option>
            <option value="CAIXA ECONOMICA FEDERAL"></option>
            <option value="BANCO DO BRASIL"></option>
            <option value="BANCO SANTANDER"></option>
            <option value="BANCO BRADESCO"></option>
          </select>
        </div>
        <div class="escolhas-wrapper">
          <div class="form-check form-check-inline">
            <input class="form-check-input" name=escolhe_form type="radio" id="aprovado" checked value="1">
            <label class="form-check-label" for="inlineCheckbox1">Aprovado</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name=escolhe_form type="radio" id="reprovado" value="2">
            <label class="form-check-label" for="inlineCheckbox2">Reprovado</label>
          </div>
        </div>
      </div>
      <div class="formulario-aprovacao">
        <div class="row">
          <div class="col-sm-12 col-lg-2 item">
            <div class="form-group">
              <label for="fgts">FGTS:</label>
              <input type="text" class="form-control" id="fgts-id" required>
            </div>
          </div>
          <div class="col-sm-12 col-lg-2 item">
            <div class="form-group">
              <label>Subsí­dio:</label>
              <input type="text" class="form-control" id="subsidio-id" required>
            </div>
          </div>
          <div class="col-sm-12 col-lg-2 item">
            <div class="form-group">
              <label>Financiamento:</label>
              <input type="text" class="form-control" id="financiamento-id" required>
            </div>
          </div>
          <div class="col-sm-12 col-lg-2 item">
            <div class="form-group">
              <label>Total Aprovado:</label>
              <input type="text" class="form-control" id="tota-aprovado-id" readonly required>
            </div>
          </div>
          <div class="col-sm-12 col-lg-2 item">
            <div class="form-group">
              <label>Renda Bruta:</label>
              <input type="text" class="form-control" id="renda-bruta-id" required>
            </div>
          </div>
          <div class="col-sm-12 col-lg-2 item">
            <div class="form-group">
              <label>Parcela:</label>
              <input type="text" class="form-control" id="parcela-id" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-lg-2">
            <div class="form-group item">
              <label>Prazo:</label>
              <input type="text" class="form-control" id="prazo-id" required>
            </div>
          </div>
          <div class="col-sm-12 col-lg-3 ">
            <div class="form-group item">
              <label>Parcela x Prazo:</label>
              <input type="text" class="form-control" id="parcela-prazo-id" readonly required>
            </div>
          </div>
          <div class="col-sm-12 col-lg-2 item">
            <div class="form-group">
              <label>Valor Avaliação:</label>
              <input type="text" class="form-control" id="valor-avaliacao-id" required>
            </div>
          </div>
          <div class="col-sm-12 col-lg-2 item">
            <div class="form-group">
              <label>Renda Validada:</label>
              <input type="text" class="form-control" id="renda-id" required>
            </div>
          </div>
          <div class="col-sm-12 col-lg-3 item">
            <div class="form-group">
              <label>Custa Registro:</label>
              <input type="text" class="form-control" id="custas-regirsto-id" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <label>Tabela:</label>
            <div class="radios-wrapper">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="valor-tabela" type="radio" id="price-id" value="PRICE">
                <label class="form-check-label" for="inlineCheckbox1">PRICE</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="valor-tabela" type="radio" id="sac-id" value="SAC">
                <label class="form-check-label" for="inlineCheckbox2">SAC</label>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <label>Desconto 5%?</label>
            <div class="descontos-wrapper">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="radio-desconto" type="radio" id="aprovado" value="SIM">
                <label class="form-check-label" for="inlineCheckbox1">SIM</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="radio-desconto" type="radio" id="reprovado" value="NÃO">
                <label class="form-check-label" for="inlineCheckbox2">NÃO</label>
              </div>
            </div>
          </div>
          <?php
          // foreach ($listaDocumentos  as $key => $documento) {
          //   echo '
          //   <div class="col-sm-12 col-lg-12 av-item select-file">
          //     <div class="form-group">
          //       <label>'.$documento.'</label>
          //       <div class="upload-wrapper" id="quadro'.$key.'">
          //         <div id="documento'.$key.'" class="documento-wrapper"></div>
          //         <div id="status'.$key.'" class="status"></div>
          //       </div>
          //     </div>
          //   </div>';
          // }
          ?>
          <input type="hidden" id="total-documentos" value="<?= count($listaDocumentos); ?>">
        </div>
      </div>
      <div class="formulario-reprovacao">
        <div class="row">
          <div class="form-group col-sm-12 col-lg-12 item">
            <label for="justificacao">Justificação Negativa:</label>
            <textarea class="form-control" id="textarea-just" rows="3" required></textarea>
          </div>
          <div class="col-sm-12 col-lg-12 av-item select-file">
            <div class="form-group">
              <label>Carregue o print da TELA DE REPROVAÇÃO do banco:</label>
              <div class="upload-wrapper" id="quadro-reprovado-1">
                <div id="documento-reprovado-1" class="documento-wrapper"></div>
                <div id="status-reprovado-1" class="status"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-documentos" role="tabpanel" aria-labelledby="pills-reprovado-tab">
      ...
    </div>
  </div>
</div>
