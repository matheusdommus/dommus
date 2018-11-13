<?php $listaDocumentos = array(
  '1' => 'Check-list Via Sul',
  '2' => 'CNH ou RG e CPF',
  '3' => 'Certidão de nascimento',
  '4' => 'Comprovante de endereÃ§o',
  '5' => 'Comprovação Renda formal',
  '6' => 'CTPS',
  '7' => 'Declaração de Imposto de renda',
  '8' => 'Extrato Fgts',
  '9' => 'Documentos Comprobatórios'
); ?>

  <form class="form-dados-avalista" id="form-avalista" action="#">
    <div class="avalista-wrapper">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-avalista" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-6 av-item">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome:</label>
                  <input type="text" class="form-control" id="av-name"  placeholder="Nome" required>
                  <span class="help-text">Campo Obrigatório</span>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-2 av-item">
                <div class="form-group">
                  <label for="exampleInputEmail1">CPF:</label>
                  <input type="text" class="form-control" id="av-cpf"  placeholder="CPF" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-2 av-item">
                <div class="form-group">
                  <label for="exampleInputEmail1">RG:</label>
                  <input type="text" class="form-control" id="av-rg"  placeholder="AA-00.000.000" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-2 av-item">
                <div class="form-group">
                  <label for="estado-civil">Estado Civil: </label>
                  <select class="form-control" id="estado-civil" required>
                    <option value="0">---Selecione---</option>
                    <option value="Solteiro(a)">Solteiro(a)</option>
                    <option value="UniÃ£o EstÃ¡vel">União Estável</option>
                    <option value="Casado(a)">Casado(a)</option>
                    <option value="Divorciado(a)">Divorciado(a)</option>
                    <option value="ViÃºvo(a)">Viúvo(a)</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 av-item">
                <div class="form-group">
                  <label for="regime-comunhao">Regime Comunhão: </label>
                  <select class="form-control" id="regime-comunhao" disabled>
                    <option value="0">---Selecione---</option>
                    <option value="ComunhÃ£o total de bens">Comunhão total de bens</option>
                    <option value="ComunhÃ£o parcial de bens">Comunhão parcial de bens</option>
                    <option value="SeparaÃ§Ã£o total de bens">Separação total de bens</option>
                    <option value="ParticipaÃ§Ã£o final dos aquestos">Participação final dos aquestos</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-5 av-item">
                <div class="form-group">
                  <label for="av-conjuge">Nome Cônjuge:</label>
                  <input type="text" class="form-control" id="av-conjuge"  placeholder="Nome Cônjuge" disabled>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-2 av-item">
                <div class="form-group">
                  <label for="av-cpf-conjuge">CPF (Cônjugee):</label>
                  <input type="text" class="form-control" id="av-cpf-conjuge"  placeholder="000.000.000-00" disabled>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-2 av-item">
                <div class="form-group">
                  <label for="av-rg-conjuge">RG (Cônjuge):</label>
                  <input type="text" class="form-control" id="av-rg-conjuge"  placeholder="AA-00.000.000" disabled>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-2 av-item">
                <div class="form-group">
                  <label for="av-cep">CEP:</label>
                  <input type="text" class="form-control" id="av-cep"  placeholder="00.000.000" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-5 av-item">
                <div class="form-group">
                  <label for="av-endereco">Endereço:</label>
                  <input type="text" class="form-control" id="av-endereco"  placeholder="Endereço" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-2 av-item">
                <div class="form-group">
                  <label for="av-endereco">Número:</label>
                  <input type="text" class="form-control" id="av-numero"  placeholder="Número" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 av-item">
                <div class="form-group">
                  <label for="av-complemento">Complemento:</label>
                  <input type="text" class="form-control" id="av-complemento"  placeholder="Complemento">
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 av-item">
                <div class="form-group">
                  <label for="av-bairro">Bairro:</label>
                  <input type="text" class="form-control" id="av-bairro"  placeholder="Bairro" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6 av-item">
                <div class="form-group">
                  <label for="av-cidade">Cidade:</label>
                  <input type="text" class="form-control" id="av-cidade"  placeholder="Cidade" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-1 av-item">
                <div class="form-group">
                  <label for="av-uf">UF:</label>
                  <input type="text" class="form-control" id="av-uf"  placeholder="UF" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-2 av-item">
                <div class="form-group">
                  <label for="av-telefone1">Telefone 1:</label>
                  <input type="phone" class="form-control" id="av-telefone1"  placeholder="(00) 0000-0000" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 av-item">
                <div class="form-group">
                  <label for="av-celular">Celular:</label>
                  <input type="text" class="form-control" id="av-celular"  placeholder="(00) 00000-0000" required>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6 av-item">
                <div class="form-group">
                  <label for="av-email">Email:</label>
                  <input type="email" class="form-control" id="av-email"  placeholder="email@email.com.br" required>
                </div>
              </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-documento" role="tabpanel" aria-labelledby="pills-profile-tab" disabled>
          <div class="row">
            <?php foreach ($listaDocumentos  as $key => $documento) {
              echo '
              <div class="col-sm-12 col-md-6 col-lg-12 av-item select-file">
                <div class="form-group">
                  <label>'.$documento.'</label>
                  <div class="upload-wrapper" id="quadro'.$key.'">
                    <div id="documento'.$key.'" class="documento-wrapper"></div>
                    <div id="status'.$key.'" class="status"></div>
                  </div>
                </div>
              </div>';
            } ?>
            <input type="hidden" id="total-documentos" value="<?= count($listaDocumentos); ?>">

          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-danger" id="fechar-avalista" data-dismiss="modal">Fechar</button>
      <button type="submit" id="btn-ir-documentos" class="btn btn-primary" name="button">Próximo</button>
    </div>
  </form>
