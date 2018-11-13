
<?php require_once 'inc/conteudo.php'; ?>
      <div class="processo-section-2">
        <div class="avaliacao-container">
        </div>
        <div class="btn-nova-avalicao">
          <button class="btn btn-inserir" type="button" name="button" data-toggle="modal" data-target="#nova-avaliacao">INSERIR NOVA AVALIAÇÃO</button>
        </div>
      </div>
      <div class="processo-section-3">
        <div class="modal fade" id="nova-avaliacao" tabindex="-1" role="dialog" aria-labelledby="nova-avaliacao" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="avaliacao">Nova Avaliação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="form-dados-avaliacao" id="dados-avaliacao" action="#">
                <div class="modal-body">
                    <?php require_once 'inc/nova-avaliacao.php'; ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-fechar" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary btn-salvar">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
