<?php 

// phpinfo();
// die;

// use Defuse\Crypto\Crypto;
// use Defuse\Crypto\Key;

// // Do this once then store it somehow:
// $key = 'teste';

// $message = 'We are all living in a yellow submarine';

// $ciphertext = Crypto::encrypt($message, $key);
// $plaintext = Crypto::decrypt($ciphertext, $key);

// var_dump($ciphertext);
// var_dump($plaintext);

require_once 'Header.php';

?>

<div class="card">

  <div class="text-center">
    <img src="http://homologacao1.dommus.com.br/img/logo_dommus.jpg">
  </div>

  <div class="card-header text-white bg-secondary" style="margin-top: 12px;">
    <i class="fas fa-laptop"></i> INTRANET
  </div>

  <div class="card-body">

    <div class="col-md-12">
      <div class="row">

      <div class="col-md-4" class="form-group">
          <p><a href="http://vic.sisg3.com.br/" class="btn btn-light btn-block" target="_blank"><i class="fas fa-home"></i> Dommus - Acesso Vic</a></p>
        </div>

        <div class="col-md-4" class="form-group">
          <p><a href="http://viasul.sisg3.com.br/" class="btn btn-light btn-block" role="button" target="_blank"><i class="fas fa-home"></i> Dommus - Acesso Via Sul </a></p>
        </div>

        <div class="col-md-4" class="form-group">
          <p><a href="#" class="btn btn-light btn-block" role="button" data-toggle="modal" data-target="#modalContatos"><i class="fas fa-home"></i> Dommus - Contatos Dommus</a></p>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="row text-center">
        <div class="col-md-4" class="form-group">
          <p><a href="#" class="btn btn-light btn-block" role="button" data-toggle="modal" data-target="#modalClientes"><i class="fas fa-home"></i> Contatos Clientes</a></p>
        </div>

        <div class="col-md-4" class="form-group">
          <p><a href="http://homologacao1.dommus.com.br/manual/manual.pdf" class="btn btn-light btn-block" target="_blank"><i class="fas fa-home"></i> Manual Suporte </a></p>
        </div>

        <div class="col-md-4" class="form-group">
          <p><a href="http://homologacao1.dommus.com.br/scripts/Login.php" class="btn btn-light btn-block" role="button" target="_blank"><i class="fas fa-home"></i> Scripts </a></p>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="row text-center">
        <div class="col-md-4" class="form-group">
          <p><a href="#" class="btn btn-light btn-block" role="button"><i class="fas fa-home"></i> Integrações </a></p>
        </div>

        <div class="col-md-4" class="form-group">
          <p><a href="#" class="btn btn-light btn-block" role="button"><i class="fas fa-home"></i> QUINTO </a></p>
        </div>

        <div class="col-md-4" class="form-group">
          <p><a href="#" class="btn btn-light btn-block" role="button"><i class="fas fa-home"></i> SEXTO </a></p>
        </div>
      </div>
    </div>

    <!-- Modal Contatos -->
    <div class="modal fade" id="modalContatos" tabindex="-1" role="dialog" aria-labelledby="modalContatosLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalContatosLabel">Contatos</h5>
          </div>
          <div class="modal-body">
            <div class="col-md-12" class="form-group">
              <label>Suporte</label>
              <p>(31) 3889-9776 ou (31) 98489-5755</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Clientes -->
    <div class="modal fade" id="modalClientes" tabindex="-1" role="dialog" aria-labelledby="modalClientesLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalClientesLabel">Contatos</h5>
          </div>
          <div class="modal-body">
            <div class="col-md-12" class="form-group">
              <h5>Via Sul Construtora</h5>
              <p><i class="fas fa-user-shield" data-toggle="tooltip" data-placement="top" title="Proprietário"></i> Rogério</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-tie" data-toggle="tooltip" data-placement="top" title="Diretor Comercial"></i> Cristian - cristian@viasul.com</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-tag" data-toggle="tooltip" data-placement="top" title="Secretária Vendas"></i> Nayara - 98896-8276 - correspondente9@viasul.com</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-tag" data-toggle="tooltip" data-placement="top" title="Gerente Cobrança"></i> Thamires - 98474-1283 - gestaocobranca@viasul.com</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-tag" data-toggle="tooltip" data-placement="top" title="Gerente Coban"></i> Isabela - despachante@viasul.com</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Gerente Registro"></i> Lúcio</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Breno</p>
            </div>
            <hr>
            <div class="col-md-12" class="form-group">
              <h5>Vic Construtora</h5>
              <p><i class="fas fa-user-shield" data-toggle="tooltip" data-placement="top" title="Proprietário"></i> Eduardo Guatmosim - eduardo@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-tie" data-toggle="tooltip" data-placement="top" title="Diretor Comercial"></i> Valdeci - 99981-9799 - waldecy@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-tag" data-toggle="tooltip" data-placement="top" title="Secretária Vendas"></i> João Victor - 99594-1992 - joao.nascimento@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-tag" data-toggle="tooltip" data-placement="top" title="Gerente Cobrança"></i> Daniela - 98802-1293 - daniela@prefisan.eng.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-tag" data-toggle="tooltip" data-placement="top" title="Gerente Coban"></i> Carla - 3262-0200 - carla@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Gerente Registro"></i> Allyson - 98803-9999 - allyson.caires@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Rômulo - romulo@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Jayro - jairo.junior@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Leonardo Moreira - 99163-1410 - leonardo.moreira@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Bruno Moreira - 99856-3416 - bruno.moreira@vicengenharia.com.br </p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Lucimara - 99546-0832 - lucimara.araujo@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Ricardo - 98737-1571 - ricardo.miguel@vicengenharia.com.br</p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Rômulo - </p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Rômulo - </p>
            </div>
            <div class="col-md-12" class="form-group">
              <p><i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top" title="Diretor Registro"></i> Rômulo - </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="card-footer text-muted text-center">
    Copyright © 2018 Dommus Sistemas
  </div>

</div>

<?php //require_once 'Footer.php'; ?>

<script>
$(document).ready(function() {

  $(function(){
    $('[data-toggle="tooltip"]').tooltip()
  });

  var now = new Date(Date.now());

  if(now.getHours() >= 06 && now.getHours() < 12)
    var saudacao = "BOM DIA...";

  else if(now.getHours() >= 12 && now.getHours() < 18)
    var saudacao = "BOA TARDE...";

  else
    var saudacao = "BOA NOITE...";

  swal(    
    saudacao,
    'SEJA BEM VINDO A INTRANET DOMMUS!',
    'success'
  );
  
});
  
</script>
