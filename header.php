<?php
  header('Content-type: text/html; charset=iso-8859-1');

 ini_set('display_errors', 1);

  require "verifica.php";
  require "connect.php";
  require "config.php";

  $ui    =   ((@$_REQUEST['ui'])    ? @$_REQUEST['ui']    : '' );
  $mgr   =   ((@$_REQUEST['mgr'])   ? @$_REQUEST['mgr']   : '' );
  $msg   =   ((@$_REQUEST['msg'])   ? @$_REQUEST['msg']   : 0 );

  // MENU GERAL
  if($mgr){
    $id_menu_geral = base64_decode($mgr);
  }else{
    $arrNivelPermissao1  = explode('#',$_SESSION["nivel_permissao_usuario"]);
    $arrNivelPermissao2  = explode("/",$arrNivelPermissao1[1]);
    $arrNivelPermissao3  = explode('>',$arrNivelPermissao2[0]);
    $id_menu_geral  = $arrNivelPermissao3[1];
  }

  // TELA A SER EXIBIDA
  if($ui){
    $tela_sistema = base64_decode($ui);
    $arrTelaSistema1 = explode('>',substr($_SESSION["nivel_permissao_usuario"],strpos($_SESSION["nivel_permissao_usuario"],'TS>'.$tela_sistema.'-'),10));
    $arrTelaSistema2 = explode(';',$arrTelaSistema1[1]);
    $arrTelaSistema3 = explode('-',$arrTelaSistema2[0]);
    $nivel_permissao_tela = $arrTelaSistema3[1];
  }else{
    $arrTelaSistema1 = explode('/',substr($_SESSION["nivel_permissao_usuario"],strpos($_SESSION["nivel_permissao_usuario"],'MG>'.$id_menu_geral.'/'),30));
    $arrTelaSistema2 = explode(';',$arrTelaSistema1[1]);
    $arrTelaSistema3 = explode('_',$arrTelaSistema2[1]);
    $arrTelaSistema4 = explode('>',$arrTelaSistema3[1]);
    $arrTelaSistema5 = explode('-',$arrTelaSistema4[1]);
    $tela_sistema = $arrTelaSistema5[0];
    $nivel_permissao_tela = $arrTelaSistema5[1];
  }

  // CONSULTA DADOS DO MENU
  $webclasse->banco->consulta("SELECT descricao FROM tb_sgg3_menu_geral WHERE id='" . $id_menu_geral . "'");
  $webclasse->banco->proxRegistro();

  $nome_sessao = $webclasse->banco->data['descricao'];


  // CONSULTA DADOS DA TELA DO SISTEMA
  if($tela_sistema){
    $webclasse->banco->consulta("SELECT * FROM tb_sgg3_tela_sistema WHERE id='" . $tela_sistema . "'");
    $webclasse->banco->proxRegistro();

    $destino_tela_sistema = '';
    if(substr_count($webclasse->banco->data['destino'],'relatorios/') == 0){
      $destino_tela_sistema .= 'data/';
    }
    $destino_tela_sistema .= $webclasse->banco->data['destino'];
    $titulo_tela_sistema = $webclasse->banco->data['titulo'];
    $css_tela_sistema .= $webclasse->banco->data['endereco_css'];
    $js_tela_sistema .= $webclasse->banco->data['endereco_js'];
    $opcao = $webclasse->banco->data['opcao'];
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/libs/sweetalert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/libs/datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $css_tela_sistema; ?>" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">


    <title><?php echo $default_nome_sistema; ?></title>
  </head>
  <body>
    <nav class="dommus-navigation">
      <div class="container-fluid">
        <div class="logo">
          <a href="#">
            <picture>
              <img src="assets/img/logomarca.png" alt="DOMMUS SISTEMAS">
            </picture>
          </a>
        </div>
        <div class="right-nav">
          <div class="info-nav">
            <div class="modulo-name">
              <span>
<?php
              echo 'Módulo: ';
              if($_SESSION['tipo_usuario'] == 1){
                echo 'ADMINISTRATIVO SISTEMA';
              }else if($_SESSION['tipo_usuario'] == 2){
                echo 'GESTOR GERAL';
              }else if($_SESSION['tipo_usuario'] == 3){
                echo 'GESTOR COMERCIAL';
              }else if($_SESSION['tipo_usuario'] == 4){
                echo 'OPERADOR COMERCIAL';
              }else if($_SESSION['tipo_usuario'] == 5){
                echo 'GESTOR COBAN';
              }else if($_SESSION['tipo_usuario'] == 6){
                echo 'OPERADOR COBAN';
              }else if($_SESSION['tipo_usuario'] == 7){
                echo 'GERENTE PDV';
              }else if($_SESSION['tipo_usuario'] == 8){
                echo 'OPERADOR PDV / CORRETOR';
              }else if($_SESSION['tipo_usuario'] == 9){
                echo 'REDE PDV';
              }else if($_SESSION['tipo_usuario'] == 10){
                echo 'PDV / IMOBILIï¿½RIA';
              }else if($_SESSION['tipo_usuario'] == 11){
                echo 'BACKOFFICE';
              }
?>
              </span></br>
              <span>
<?php
              if($_SESSION["tipo_usuario"] >= 7 && $_SESSION["tipo_usuario"] <= 10){
                echo '(Rede: ' . $_SESSION["nome_rede_pdv"] . ')';
              }
?>
              </span>
            </div>
            <div class="user-acess">
              <a href="#">
                <picture>
                  <img src="assets/img/user.svg" alt="USUARIO">
                </picture>
                <span>Olá <?php echo $_SESSION['nome_usuario']; ?></span>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
              </a>
              <div class="user-wrapper">
                <ul>
                  <li><a href="#"> Meus Dados <i class="fa fa-user-circle-o" aria-hidden="true"></i></a></li>
                  <li><a href="#">Sair <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="notification-nav">
            <a href="#">
              <picture>
                <svg  enable-background="new 0 0 510 510" version="1.1" viewBox="0 0 510 510" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                		<path d="m255 510c28.05 0 51-22.95 51-51h-102c0 28.05 22.95 51 51 51zm165.75-153v-140.25c0-79.05-53.55-142.8-127.5-160.65v-17.85c0-20.4-17.85-38.25-38.25-38.25s-38.25 17.85-38.25 38.25v17.85c-73.95 17.85-127.5 81.6-127.5 160.65v140.25l-51 51v25.5h433.5v-25.5l-51-51z" fill="#ddd"/>
                </svg>
              </picture>
              <div class="notification-icon">
                1
              </div>
            </a>
          </div>
          <div class="notifications-wrapper">
            <div class="notifications" id="notifications">
              <div class="notification-title">
                <h6><i class="fa fa-bell" aria-hidden="true"></i> Notificações</h6>
                <div class="notification-close" id="close-menu">
                  <a class="close_header__hamburger" href="#">
                    <span class="hamburger__bar"></span>
                    <span class="hamburger__bar"></span>
                  </a>
                </div>
              </div>
              <div class="read-all">
                Marcar todas como lida
              </div>
              <div class="notifications-holder">
                <ul>
                  <a href="#">
                    <li class="notification-damp">
                      <span>D</span>
                      <div class="notifications-item">
                        <div class="notification-info">
                          <p>Confira o fluxo e em seguida clique no botão</p>
                          <p>05421 - Nome do proponente responsável</p>
                          <div class="notifications-time">
                            <b>De: Joaquim Ferreira</b>
                            <time>09/10/2018 - 15:42</time>
                          </div>
                        </div>
                        <i class="fa fa-check" aria-hidden="true" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Marcar como Lida"></i>
                      </div>
                    </li>
                  </a>
                  <a href="#">
                    <li class="notification-alerta">
                      <span>A</span>
                      <div class="notifications-item">
                        <div class="notification-info">
                          <p>Confira o fluxo e em seguida clique no botão</p>
                          <p>05421 - Nome do proponente responsável</p>
                          <div class="notifications-time">
                            <b>De: Joaquim Ferreira</b>
                            <time>09/10/2018 - 15:42</time>
                          </div>
                        </div>
                        <i class="fa fa-check" aria-hidden="true" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Marcar como Lida"></i>
                      </div>
                    </li>
                  </a>
                  <a href="#">
                    <li class="notification-pendencia">
                      <span>P</span>
                      <div class="notifications-item">
                        <div class="notification-info">
                          <p>Confira o fluxo e em seguida clique no botão</p>
                          <p>05421 - Nome do proponente responsável</p>
                          <div class="notifications-time">
                            <b>De: Joaquim Ferreira</b>
                            <time>09/10/2018 - 15:42</time>
                          </div>
                        </div>
                        <i class="fa fa-check" aria-hidden="true" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Marcar como Lida"></i>
                      </div>
                    </li>
                  </a>
                  <div class="notifications-all">
                    <a href="#">
                      <li class="notification-pendencia">
                        <span>P</span>
                        <div class="notifications-item">
                          <div class="notification-info">
                            <p>Confira o fluxo e em seguida clique no botão</p>
                            <p>05421 - Nome do proponente responsável</p>
                            <div class="notifications-time">
                              <b>De: Joaquim Ferreira</b>
                              <time>09/10/2018 - 15:42</time>
                            </div>
                          </div>
                          <i class="fa fa-check" aria-hidden="true" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Marcar como Lida"></i>
                        </div>
                      </li>
                    </a>
                    <a href="#">
                      <li class="notification-pendencia">
                        <span>P</span>
                        <div class="notifications-item">
                          <div class="notification-info">
                            <p>Confira o fluxo e em seguida clique no botão</p>
                            <p>05421 - Nome do proponente responsável</p>
                            <div class="notifications-time">
                              <b>De: Joaquim Ferreira</b>
                              <time>09/10/2018 - 15:42</time>
                            </div>
                          </div>
                          <i class="fa fa-check" aria-hidden="true" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Marcar como Lida"></i>
                        </div>
                      </li>
                    </a>
                    <a href="#">
                      <li class="notification-pendencia">
                        <span>P</span>
                        <div class="notifications-item">
                          <div class="notification-info">
                            <p>Confira o fluxo e em seguida clique no botão</p>
                            <p>05421 - Nome do proponente responsável</p>
                            <div class="notifications-time">
                              <b>De: Joaquim Ferreira</b>
                              <time>09/10/2018 - 15:42</time>
                            </div>
                          </div>
                          <i class="fa fa-check" aria-hidden="true" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Marcar como Lida"></i>
                        </div>
                      </li>
                    </a>
                    <a href="#">
                      <li class="notification-pendencia">
                        <span>P</span>
                        <div class="notifications-item">
                          <div class="notification-info">
                            <p>Confira o fluxo e em seguida clique no botão</p>
                            <p>05421 - Nome do proponente responsável</p>
                            <div class="notifications-time">
                              <b>De: Joaquim Ferreira</b>
                              <time>09/10/2018 - 15:42</time>
                            </div>
                          </div>
                          <i class="fa fa-check" aria-hidden="true" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Marcar como Lida"></i>
                        </div>
                      </li>
                    </a>
                  </div>
                </ul>
              </div>
              <button class="btn btn-primary btn-ver-mais" type="button" name="button">Ver mais <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
            </div>
          </div>
          <div class="search-dommus">
            <a href="#" id="open-search">
              <picture>
                  <img src="assets/img/search.svg" alt="Filtrar">
              </picture>
            </a>
          </div>
          <div class="search-wrapper">
            <div class="search-content">
              <div class="search-title">
                <h3>filtro</h3>
                <div class="right-nav">
                  <div class="item item-ativos">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="filtro-ativo" checked>
                      <label class="custom-control-label" for="filtro-ativo">Ativos</label>
                    </div>
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="filtro-inativo">
                      <label class="custom-control-label" for="filtro-inativo">Inativos</label>
                    </div>
                  </div>
                  <ul>
                    <li data-toggle="tooltip" data-placement="bottom" title="Imprimir"><a href="#"><img src="assets/img/printer.svg" alt=""></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Exportar Tabela"><a href="#"><img src="assets/img/calendar.svg" alt=""></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Etiqueta de endereçamento"><a href="#"><img src="assets/img/tag.svg" alt=""></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Exportar SLA"><a href="#"><img src="assets/img/clock.svg" alt=""></a></li>
                  </ul>
                  <div class="close-search" id="close-search">
                    <picture>
                      <img src="assets/img/cross.svg" alt="">
                    </picture>
                  </div>
                </div>
              </div>
              <div class="filter-wrapper">
                <form>
                  <div class="filter-holder">
                    <div class="row">
                      <div class="col-sm-12 col-lg-3 item">
                        <div class="form-group">
                          <label>Nº processo / Nome / cpf :</label>
                          <input type="text" class="form-control" id="filtro-proponente">
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-3 item">
                        <div class="form-group">
                          <label>Logradouro / Cidade / Uf:</label>
                          <input type="text" class="form-control" id="filtro-endereco-proponente">
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-3 item">
                        <div class="form-group">
                          <label>Empreendimento:</label>
                          <select class="form-control" id="filtro-empreedimento">
                            <option>Vila Blla Lyon</option>
                            <option>Vila Blla Lyon</option>
                            <option>Vila Blla Lyon</option>
                            <option>Vila Blla Lyon</option>
                            <option>Vila Blla Lyon</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-3 item">
                        <div class="form-group">
                          <label>Unidade:</label>
                          <input type="text" class="form-control" id="filtro-unidade" placeholder="Ex:BL01UN101">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="valores-wrapper col-lg-6">
                        <div class="row">
                          <div class="col-sm-12 col-lg-12 item">
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="" data-toggle="tooltip" data-placement="bottom" title="Valores"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" id="filtro-valor" placeholder="00,00">
                                <select class="form-control" id="filtro-tipo-valor">
                                  <option>Valor avaliado</option>
                                  <option>Valor da unidade</option>
                                  <option>Valor de avaliação</option>
                                  <option>Renda estimada</option>
                                  <option>Renda validada banco</option>
                                  <option>Renda validada Coban</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="periodo-wrapper col-lg-6">
                        <div class="row">
                          <div class="col-sm-12 col-lg-12 item">
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="" data-toggle="tooltip" data-placement="bottom" title="Período"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" id="filtro-periodo" placeholder="DD/MM/AAAA" maxlength="10">
                                <select class="form-control" id="filtro-tipo-periodo">
                                  <option>Venda</option>
                                  <option>Última Atulização</option>
                                  <option>Entrevista</option>
                                  <option>Assinatura de financiamento</option>
                                  <option>Registro</option>
                                  <option>Validade Avaliação</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-lg-3 item">
                        <div class="form-group">
                          <label>Status:</label>
                          <select class="form-control" id="filtro-status">
                            <option>Venda</option>
                            <option>Última Atulização</option>
                            <option>Entrevista</option>
                            <option>Assinatura de financiamento</option>
                            <option>Registro</option>
                            <option>Validade Avaliação</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-3 item">
                        <div class="form-group date">
                          <label>Equipe / Gerente / Corretor:</label>
                          <input type="text" class="form-control" id="filtro-equipe">
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="filter-result">
                    <div class="processos-wrapper">
                      <div class="filter-processos">

                      </div>
                    </div>
                  </div>
                  <div class="filtrar-btn-wrapper">
                    <button class="btn btn-primary btn-filtrar" id="pesquisar" type="button" name="button">PESQUISAR</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="toggle-menu">
            <a class="header__hamburger" href="#" id="toggle">
              <span class="hamburger__bar"></span>
              <span class="hamburger__bar"></span>
              <span class="hamburger__bar"></span>
            </a>
          </div>
        </div>
      </div>
    </nav>
