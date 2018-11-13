<?php
  class g3_class{

    // IDENTIFICADORES DA CLASSE
    var $con1;
    var $con2;

    var $php;
    var $html;

/*-------------------------DEFINIÇÃO DAS VARIÁVEIS------------------------*/

    // Campos da tabela usuario
    var $empreendimento;
    var $unidade;
    var $n_proponentes;
    var $grupo_usuario;
    var $gerente;
    var $corretor;

    var $cpf;
    var $rg;
    var $cnh;
    var $data_nascimento;
    var $genero;
    var $nome;
    var $estado_civil;
    var $regime_comunhao;
    var $tipo_logradouro;
    var $logradouro;
    var $numero;
    var $complemento;
    var $bairro;
    var $cidade;
    var $uf;
    var $cep;
    var $referencia;
    var $telefone1;
    var $telefone2;
    var $celular;
    var $email;
    var $grau_instrucao;
    var $curso;
    var $conclusao;

    var $tipo_renda;
    var $profissao;
    var $outra_profissao;
    var $inicio_renda;
    var $empresa;
    var $cargo;
    var $telefone_comercial;
    var $ramal;
    var $valor_renda;

    var $nome_referencia;
    var $telefone_referencia;
    var $parentesco;

    var $carro;
    var $prestacao_carro;
    var $prestacoes_carro;

    var $emprestimo;
    var $prestacao_emprestimo;
    var $prestacoes_emprestimo;

    var $consorcio;
    var $prestacao_consorcio;
    var $prestacoes_consorcio;

    var $fies;
    var $prestacao_fies;
    var $prestacoes_fies;

    var $cartao_credito;
    var $proxima_fatura;
    var $media_pagamentos;
    var $faturas_atraso;

    var $cpf2;
    var $rg2;
    var $cnh2;
    var $data_nascimento2;
    var $genero2;
    var $nome2;
    var $estado_civil2;
    var $regime_comunhao2;
    var $tipo_logradouro2;
    var $logradouro2;
    var $numero2;
    var $complemento2;
    var $bairro2;
    var $cidade2;
    var $uf2;
    var $cep2;
    var $referencia2;
    var $telefone12;
    var $telefone22;
    var $celular2;
    var $email2;
    var $grau_instrucao2;
    var $curso2;
    var $conclusao2;

    var $tipo_renda2;
    var $profissao2;
    var $outra_profissao2;
    var $inicio_renda2;
    var $empresa2;
    var $cargo2;
    var $telefone_comercial2;
    var $ramal2;
    var $valor_renda2;

    var $nome_referencia2;
    var $telefone_referencia2;
    var $parentesco2;

    var $carro2;
    var $prestacao_carro2;
    var $prestacoes_carro2;

    var $emprestimo2;
    var $prestacao_emprestimo2;
    var $prestacoes_emprestimo2;

    var $consorcio2;
    var $prestacao_consorcio2;
    var $prestacoes_consorcio2;

    var $fies2;
    var $prestacao_fies2;
    var $prestacoes_fies2;

    var $cartao_credito2;
    var $proxima_fatura2;
    var $media_pagamentos2;
    var $faturas_atraso2;

    var $cpf3;
    var $rg3;
    var $cnh3;
    var $data_nascimento3;
    var $genero3;
    var $nome3;
    var $estado_civil3;
    var $regime_comunhao3;
    var $tipo_logradouro3;
    var $logradouro3;
    var $numero3;
    var $complemento3;
    var $bairro3;
    var $cidade3;
    var $uf3;
    var $cep3;
    var $referencia3;
    var $telefone13;
    var $telefone23;
    var $celular3;
    var $email3;
    var $grau_instrucao3;
    var $curso3;
    var $conclusao3;

    var $tipo_renda3;
    var $profissao3;
    var $outra_profissao3;
    var $inicio_renda3;
    var $empresa3;
    var $cargo3;
    var $telefone_comercial3;
    var $ramal3;
    var $valor_renda3;

    var $nome_referencia3;
    var $telefone_referencia3;
    var $parentesco3;

    var $carro3;
    var $prestacao_carro3;
    var $prestacoes_carro3;

    var $emprestimo3;
    var $prestacao_emprestimo3;
    var $prestacoes_emprestimo3;

    var $consorcio3;
    var $prestacao_consorcio3;
    var $prestacoes_consorcio3;

    var $fies3;
    var $prestacao_fies3;
    var $prestacoes_fies3;

    var $cartao_credito3;
    var $proxima_fatura3;
    var $media_pagamentos3;
    var $faturas_atraso3;

    var $observacao;

    var $ordem;
    
    var $tsrc;
    var $pagina;
    var $max_por_pagina;

/*--------------------------------------------------------------------*/

/*-------------------MÉTODO CONSTRUTOR DA CLASSE----------------------*/

    function g3_class() {

      $this->con1 = new banco;
      $this->con1->configura('connectsql.php');
      $this->con1->conecta();

      $this->con2 = new banco;
      $this->con2->configura('connectsql.php');
      $this->con2->conecta();
      
      $this->con3 = new banco;
      $this->con3->configura('connectsql.php');
      $this->con3->conecta();

      $this->con4 = new banco;
      $this->con4->configura('connectsql.php');
      $this->con4->conecta();

      $this->php           = new php;
      $this->html          = new html;

      $this->tabela        = 'tb_pessoa_fisica';

    }

/*--------------------------------------------------------------------*/

/*-------------------------FUNÇÕES DE INCLUSÃO------------------------*/

    function incluir() {
    
      // DADOS QUE SERÃO INCLUÍDOS NO BANCO
      
      // 1º PROPONENTE
      if($this->cpf){
      
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0]    = 'id';
        $campo[$aux][1]    = $this->con1->lastId($this->tabela, 'id');
        $aux++;
        $campo[$aux][0]    = 'cpf';
        $campo[$aux][1]    = preg_replace("/[^0-9]/","",$this->cpf);
        $aux++;
        $campo[$aux][0]    = 'rg';
        $campo[$aux][1]    = $this->rg;
        $aux++;
        $campo[$aux][0]    = 'cnh';
        $campo[$aux][1]    = $this->cnh;
        $aux++;
        if($this->data_nascimento){
          $campo[$aux][0]    = 'data_nascimento';
          $campo[$aux][1]    = $this->php->inverteData($this->data_nascimento);
          $aux++;
        }
        $campo[$aux][0]    = 'genero';
        $campo[$aux][1]    = $this->genero;
        $aux++;
        $campo[$aux][0]    = 'nome';
        $campo[$aux][1]    = trim($this->nome);
        $aux++;
        $campo[$aux][0]    = 'estado_civil';
        $campo[$aux][1]    = $this->estado_civil;
        $aux++;
        $campo[$aux][0]    = 'regime_comunhao';
        $campo[$aux][1]    = $this->regime_comunhao;
        $aux++;
        $campo[$aux][0]    = 'tipo_logradouro';
        $campo[$aux][1]    = $this->tipo_logradouro;
        $aux++;
        $campo[$aux][0]   = 'logradouro';
        $campo[$aux][1]   = trim($this->logradouro);
        $aux++;
        $campo[$aux][0]   = 'numero';
        $campo[$aux][1]   = $this->numero;
        $aux++;
        $campo[$aux][0]   = 'complemento';
        $campo[$aux][1]   = $this->complemento;
        $aux++;
        $campo[$aux][0]   = 'bairro';
        $campo[$aux][1]   = trim($this->bairro);
        $aux++;
        $campo[$aux][0]   = 'cidade';
        $campo[$aux][1]   = trim($this->cidade);
        $aux++;
        $campo[$aux][0]   = 'uf';
        $campo[$aux][1]   = $this->uf;
        $aux++;
        $campo[$aux][0]   = 'cep';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->cep);
        $aux++;
        $campo[$aux][0]   = 'referencia';
        $campo[$aux][1]   = $this->referencia;
        $aux++;
        $campo[$aux][0]   = 'telefone1';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone1);
        $aux++;
        $campo[$aux][0]   = 'telefone2';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone2);
        $aux++;
        $campo[$aux][0]   = 'celular';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->celular);
        $aux++;
        $campo[$aux][0]   = 'email';
        $campo[$aux][1]   = trim($this->email);
        $aux++;
        $campo[$aux][0]   = 'grau_instrucao';
        $campo[$aux][1]   = $this->grau_instrucao;
        $aux++;
        $campo[$aux][0]   = 'curso';
        $campo[$aux][1]   = $this->curso;
        $aux++;
        if($this->conclusao){
          $campo[$aux][0]   = 'conclusao';
          $campo[$aux][1]   = $this->conclusao;
          $aux++;
        }
        $campo[$aux][0]   = 'declarou_irpf';
        $campo[$aux][1]   = $this->declarou_irpf;
        $aux++;
        $campo[$aux][0]   = 'numero_pis';
        $campo[$aux][1]   = $this->numero_pis;
        $aux++;
        $campo[$aux][0]   = 'possui_conta_banco';
        $campo[$aux][1]   = $this->possui_conta_banco;
        $aux++;
        $campo[$aux][0]   = 'carteira_assinada';
        $campo[$aux][1]   = $this->carteira_assinada;
        $aux++;
        $campo[$aux][0]   = 'saldo_fgts';
        $campo[$aux][1]   = $this->saldo_fgts;
        $aux++;
        $campo[$aux][0]   = 'uso_fgts';
        $campo[$aux][1]   = $this->uso_fgts;
        $aux++;
        if($this->valor_fgts){
          $campo[$aux][0]   = 'valor_fgts';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->valor_fgts));
          $aux++;
        }
        $campo[$aux][0]   = 'carro';
        $campo[$aux][1]   = $this->carro;
        $aux++;
        if($this->prestacao_carro){
          $campo[$aux][0]   = 'prestacao_carro';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_carro));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_carro';
        $campo[$aux][1]   = $this->prestacoes_carro;
        $aux++;
        $campo[$aux][0]   = 'emprestimo';
        $campo[$aux][1]   = $this->emprestimo;
        $aux++;
        if($this->prestacao_emprestimo){
          $campo[$aux][0]   = 'prestacao_emprestimo';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_emprestimo));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_emprestimo';
        $campo[$aux][1]   = $this->prestacoes_emprestimo;
        $aux++;
        $campo[$aux][0]   = 'consorcio';
        $campo[$aux][1]   = $this->consorcio;
        $aux++;
        if($this->prestacao_consorcio){
          $campo[$aux][0]   = 'prestacao_consorcio';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_consorcio));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_consorcio';
        $campo[$aux][1]   = $this->prestacoes_consorcio;
        $aux++;
        $campo[$aux][0]   = 'fies';
        $campo[$aux][1]   = $this->fies;
        $aux++;
        if($this->prestacao_fies){
          $campo[$aux][0]   = 'prestacao_fies';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_fies));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_fies';
        $campo[$aux][1]   = $this->prestacoes_fies;
        $aux++;
        $campo[$aux][0]   = 'cartao_credito';
        $campo[$aux][1]   = $this->cartao_credito;
        $aux++;
        if($this->proxima_fatura){
          $campo[$aux][0]   = 'proxima_fatura';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->proxima_fatura));
          $aux++;
        }
        if($this->media_pagamentos){
          $campo[$aux][0]   = 'media_pagamentos';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->media_pagamentos));
          $aux++;
        }
        $campo[$aux][0]   = 'faturas_atraso';
        $campo[$aux][1]   = $this->faturas_atraso;
        $aux++;
        $campo[$aux][0]   = 'cadastrado_em';
        $campo[$aux][1]   = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0]   = 'cadastrado_por';
        $campo[$aux][1]   = $_SESSION["id_usuario"];
        $aux++;

        $this->id = $campo[0][1];

        // AÇÃO DE ALTERAÇÃO NO BANCO
        $this->con1->executa($this->tabela, $campo);

        // GERA DIRETÓRIO DO CADASTRO
        $dir_base = "cadastros/" . $this->php->strZero($this->id,7);
//        mkdir($dir_base,0777);
        $arrCliente = explode('.',$_SERVER['HTTP_HOST']); $cliente = $arrCliente[0];
?>
          <script>
       			$.getJSON('data/ajax/upload.php?search=',{url: '<?php echo $cliente . "/" . $dir_base . "/"; ?>', acao: 'diretorio', ajax: 'true'}, function(j){});
          </script>
<?php
        
        // INSERE OS TIPOS DE RENDA DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->tipo_renda);$i++){
          if($this->tipo_renda[$i] && $this->valor_renda[$i]){

            $campo = null;
            $chave = null;

            $aux = 0;
            $campo[$aux][0]   = 'id';
            $campo[$aux][1]   = $this->con1->lastId('tb_renda', 'id');
            $aux++;
            $campo[$aux][0]   = 'id_pessoa_fisica';
            $campo[$aux][1]   = $this->id;
            $aux++;
            $campo[$aux][0]   = 'tipo_renda';
            $campo[$aux][1]   = $this->tipo_renda[$i];
            $aux++;
            $campo[$aux][0]   = 'profissao';
            $campo[$aux][1]   = $this->profissao[$i];
            $aux++;
            $campo[$aux][0]   = 'outra_profissao';
            $campo[$aux][1]   = $this->outra_profissao[$i];
            $aux++;
            if($this->inicio_renda[$i]){
              $campo[$aux][0]   = 'inicio_renda';
              $campo[$aux][1]   = $this->php->inverteData($this->inicio_renda[$i]);
              $aux++;
            }
            $campo[$aux][0]   = 'empresa';
            $campo[$aux][1]   = $this->empresa[$i];
            $aux++;
            $campo[$aux][0]   = 'cargo';
            $campo[$aux][1]   = $this->cargo[$i];
            $aux++;
            $campo[$aux][0]   = 'telefone_comercial';
            $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial[$i]);
            $aux++;
            $campo[$aux][0]   = 'ramal';
            $campo[$aux][1]   = $this->ramal[$i];
            $aux++;
            if($this->valor_renda[$i]){
              $campo[$aux][0]  = 'valor_renda';
              $campo[$aux][1]  = str_replace(',','.',str_replace('.','',$this->valor_renda[$i]));
              $aux++;
            }
            $campo[$aux][0]  = 'cadastrado_em';
            $campo[$aux][1]  = date('Y-m-d H:i:s');
            $aux++;
            $campo[$aux][0]  = 'cadastrado_por';
            $campo[$aux][1]  = $_SESSION["id_usuario"];
            $aux++;

            // AÇÃO DE ALTERAÇÃO NO BANCO
            $this->con1->executa('tb_renda', $campo);

          }
        }


        // INSERE AS REFERÊNCIAS DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->nome_referencia);$i++){
          if($this->nome_referencia[$i] && $this->telefone_referencia[$i]){

            $campo = null;
            $chave = null;

            $aux = 0;
            $campo[$aux][0]   = 'id';
            $campo[$aux][1]   = $this->con1->lastId('tb_referencia', 'id');
            $aux++;
            $campo[$aux][0]   = 'id_pessoa_fisica';
            $campo[$aux][1]   = $this->id;
            $aux++;
            $campo[$aux][0]   = 'nome_referencia';
            $campo[$aux][1]   = trim($this->nome_referencia[$i]);
            $aux++;
            $campo[$aux][0]   = 'telefone_referencia';
            $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia[$i]);
            $aux++;
            $campo[$aux][0]   = 'parentesco';
            $campo[$aux][1]   = $this->parentesco[$i];
            $aux++;
            $campo[$aux][0]   = 'cadastrado_em';
            $campo[$aux][1]   = date('Y-m-d H:i:s');
            $aux++;
            $campo[$aux][0]   = 'cadastrado_por';
            $campo[$aux][1]   = $_SESSION["id_usuario"];
            $aux++;

            // AÇÃO DE ALTERAÇÃO NO BANCO
            $this->con1->executa('tb_referencia', $campo);

          }
        }
      
      }


      // 2º PROPONENTE
      if($this->cpf2){
      
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0]    = 'id';
        $campo[$aux][1]    = $this->con1->lastId($this->tabela, 'id');
        $aux++;
        $campo[$aux][0]    = 'cpf';
        $campo[$aux][1]    = preg_replace("/[^0-9]/","",$this->cpf2);
        $aux++;
        $campo[$aux][0]    = 'rg';
        $campo[$aux][1]    = $this->rg2;
        $aux++;
        $campo[$aux][0]    = 'cnh';
        $campo[$aux][1]    = $this->cnh2;
        $aux++;
        if($this->data_nascimento2){
          $campo[$aux][0]    = 'data_nascimento';
          $campo[$aux][1]    = $this->php->inverteData($this->data_nascimento2);
          $aux++;
        }
        $campo[$aux][0]    = 'genero';
        $campo[$aux][1]    = $this->genero2;
        $aux++;
        $campo[$aux][0]    = 'nome';
        $campo[$aux][1]    = trim($this->nome2);
        $aux++;
        $campo[$aux][0]    = 'estado_civil';
        $campo[$aux][1]    = $this->estado_civil2;
        $aux++;
        $campo[$aux][0]    = 'regime_comunhao';
        $campo[$aux][1]    = $this->regime_comunhao2;
        $aux++;
        $campo[$aux][0]    = 'tipo_logradouro';
        $campo[$aux][1]    = $this->tipo_logradouro2;
        $aux++;
        $campo[$aux][0]   = 'logradouro';
        $campo[$aux][1]   = trim($this->logradouro2);
        $aux++;
        $campo[$aux][0]   = 'numero';
        $campo[$aux][1]   = $this->numero2;
        $aux++;
        $campo[$aux][0]   = 'complemento';
        $campo[$aux][1]   = $this->complemento2;
        $aux++;
        $campo[$aux][0]   = 'bairro';
        $campo[$aux][1]   = trim($this->bairro2);
        $aux++;
        $campo[$aux][0]   = 'cidade';
        $campo[$aux][1]   = trim($this->cidade2);
        $aux++;
        $campo[$aux][0]   = 'uf';
        $campo[$aux][1]   = $this->uf2;
        $aux++;
        $campo[$aux][0]   = 'cep';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->cep2);
        $aux++;
        $campo[$aux][0]   = 'referencia';
        $campo[$aux][1]   = trim($this->referencia2);
        $aux++;
        $campo[$aux][0]   = 'telefone1';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone12);
        $aux++;
        $campo[$aux][0]   = 'telefone2';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone22);
        $aux++;
        $campo[$aux][0]   = 'celular';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->celular2);
        $aux++;
        $campo[$aux][0]   = 'email';
        $campo[$aux][1]   = $this->email2;
        $aux++;
        $campo[$aux][0]   = 'grau_instrucao';
        $campo[$aux][1]   = $this->grau_instrucao2;
        $aux++;
        $campo[$aux][0]   = 'curso';
        $campo[$aux][1]   = $this->curso2;
        $aux++;
        if($this->conclusao2){
          $campo[$aux][0]   = 'conclusao';
          $campo[$aux][1]   = $this->conclusao2;
          $aux++;
        }
        $campo[$aux][0]   = 'declarou_irpf';
        $campo[$aux][1]   = $this->declarou_irpf2;
        $aux++;
        $campo[$aux][0]   = 'numero_pis';
        $campo[$aux][1]   = $this->numero_pis2;
        $aux++;
        $campo[$aux][0]   = 'possui_conta_banco';
        $campo[$aux][1]   = $this->possui_conta_banco2;
        $aux++;
        $campo[$aux][0]   = 'carteira_assinada';
        $campo[$aux][1]   = $this->carteira_assinada2;
        $aux++;
        $campo[$aux][0]   = 'saldo_fgts';
        $campo[$aux][1]   = $this->saldo_fgts2;
        $aux++;
        $campo[$aux][0]   = 'uso_fgts';
        $campo[$aux][1]   = $this->uso_fgts2;
        $aux++;
        if($this->valor_fgts2){
          $campo[$aux][0]   = 'valor_fgts';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->valor_fgts2));
          $aux++;
        }
        $campo[$aux][0]   = 'carro';
        $campo[$aux][1]   = $this->carro2;
        $aux++;
        if($this->prestacao_carro2){
          $campo[$aux][0]   = 'prestacao_carro';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_carro2));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_carro';
        $campo[$aux][1]   = $this->prestacoes_carro2;
        $aux++;
        $campo[$aux][0]   = 'emprestimo';
        $campo[$aux][1]   = $this->emprestimo2;
        $aux++;
        if($this->prestacao_emprestimo2){
          $campo[$aux][0]   = 'prestacao_emprestimo';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_emprestimo2));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_emprestimo';
        $campo[$aux][1]   = $this->prestacoes_emprestimo2;
        $aux++;
        $campo[$aux][0]   = 'consorcio';
        $campo[$aux][1]   = $this->consorcio2;
        $aux++;
        if($this->prestacao_consorcio2){
          $campo[$aux][0]   = 'prestacao_consorcio';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_consorcio2));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_consorcio';
        $campo[$aux][1]   = $this->prestacoes_consorcio2;
        $aux++;
        $campo[$aux][0]   = 'fies';
        $campo[$aux][1]   = $this->fies2;
        $aux++;
        if($this->prestacao_fies2){
          $campo[$aux][0]   = 'prestacao_fies';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_fies2));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_fies';
        $campo[$aux][1]   = $this->prestacoes_fies2;
        $aux++;
        $campo[$aux][0]   = 'cartao_credito';
        $campo[$aux][1]   = $this->cartao_credito2;
        $aux++;
        if($this->proxima_fatura2){
          $campo[$aux][0]   = 'proxima_fatura';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->proxima_fatura2));
          $aux++;
        }
        if($this->media_pagamentos2){
          $campo[$aux][0]   = 'media_pagamentos';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->media_pagamentos2));
          $aux++;
        }
        $campo[$aux][0]   = 'faturas_atraso';
        $campo[$aux][1]   = $this->faturas_atraso2;
        $aux++;
        $campo[$aux][0]   = 'cadastrado_em';
        $campo[$aux][1]   = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0]   = 'cadastrado_por';
        $campo[$aux][1]   = $_SESSION["id_usuario"];
        $aux++;

        $this->id2 = $campo[0][1];

        // AÇÃO DE ALTERAÇÃO NO BANCO
        $this->con1->executa($this->tabela, $campo);
        
        // GERA DIRETÓRIO DO CADASTRO
        $dir_base2 = "cadastros/" . $this->php->strZero($this->id2,7);
//        mkdir($dir_base2,0777);
?>
          <script>
       			$.getJSON('data/ajax/upload.php?search=',{url: '<?php echo $cliente . "/" . $dir_base2 . "/"; ?>', acao: 'diretorio', ajax: 'true'}, function(j){});
          </script>
<?php
        
        // INSERE OS TIPOS DE RENDA DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->tipo_renda2);$i++){
          if($this->tipo_renda2[$i] && $this->valor_renda2[$i]){

            $campo = null;
            $chave = null;

            $aux = 0;
            $campo[$aux][0]   = 'id';
            $campo[$aux][1]   = $this->con1->lastId('tb_renda', 'id');
            $aux++;
            $campo[$aux][0]   = 'id_pessoa_fisica';
            $campo[$aux][1]   = $this->id2;
            $aux++;
            $campo[$aux][0]   = 'tipo_renda';
            $campo[$aux][1]   = $this->tipo_renda2[$i];
            $aux++;
            $campo[$aux][0]   = 'profissao';
            $campo[$aux][1]   = $this->profissao2[$i];
            $aux++;
            $campo[$aux][0]   = 'outra_profissao';
            $campo[$aux][1]   = $this->outra_profissao2[$i];
            $aux++;
            if($this->inicio_renda2[$i]){
              $campo[$aux][0]   = 'inicio_renda';
              $campo[$aux][1]   = $this->php->inverteData($this->inicio_renda2[$i]);
              $aux++;
            }
            $campo[$aux][0]   = 'empresa';
            $campo[$aux][1]   = $this->empresa2[$i];
            $aux++;
            $campo[$aux][0]   = 'cargo';
            $campo[$aux][1]   = $this->cargo2[$i];
            $aux++;
            $campo[$aux][0]   = 'telefone_comercial';
            $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial2[$i]);
            $aux++;
            $campo[$aux][0]   = 'ramal';
            $campo[$aux][1]   = $this->ramal2[$i];
            $aux++;
            $campo[$aux][0]  = 'valor_renda';
            $campo[$aux][1]  = str_replace(',','.',str_replace('.','',$this->valor_renda2[$i]));
            $aux++;
            $campo[$aux][0]  = 'cadastrado_em';
            $campo[$aux][1]  = date('Y-m-d H:i:s');
            $aux++;
            $campo[$aux][0]  = 'cadastrado_por';
            $campo[$aux][1]  = $_SESSION["id_usuario"];
            $aux++;

            // AÇÃO DE ALTERAÇÃO NO BANCO
            $this->con1->executa('tb_renda', $campo);
          }
        }


        // INSERE AS REFERÊNCIAS DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->nome_referencia2);$i++){
          if($this->nome_referencia2[$i] && $this->telefone_referencia2[$i]){

            $campo = null;
            $chave = null;

            $aux = 0;
            $campo[$aux][0]   = 'id';
            $campo[$aux][1]   = $this->con1->lastId('tb_referencia', 'id');
            $aux++;
            $campo[$aux][0]   = 'id_pessoa_fisica';
            $campo[$aux][1]   = $this->id2;
            $aux++;
            $campo[$aux][0]   = 'nome_referencia';
            $campo[$aux][1]   = trim($this->nome_referencia2[$i]);
            $aux++;
            $campo[$aux][0]   = 'telefone_referencia';
            $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia2[$i]);
            $aux++;
            $campo[$aux][0]   = 'parentesco';
            $campo[$aux][1]   = $this->parentesco2[$i];
            $aux++;
            $campo[$aux][0]   = 'cadastrado_em';
            $campo[$aux][1]   = date('Y-m-d H:i:s');
            $aux++;
            $campo[$aux][0]   = 'cadastrado_por';
            $campo[$aux][1]   = $_SESSION["id_usuario"];
            $aux++;

            // AÇÃO DE ALTERAÇÃO NO BANCO
            $this->con1->executa('tb_referencia', $campo);

          }
        }
      
      }
      
      

      // 3º PROPONENTE
      if($this->cpf2 && $this->cpf3){
      
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0]    = 'id';
        $campo[$aux][1]    = $this->con1->lastId($this->tabela, 'id');
        $aux++;
        $campo[$aux][0]    = 'cpf';
        $campo[$aux][1]    = preg_replace("/[^0-9]/","",$this->cpf3);
        $aux++;
        $campo[$aux][0]    = 'rg';
        $campo[$aux][1]    = $this->rg3;
        $aux++;
        $campo[$aux][0]    = 'cnh';
        $campo[$aux][1]    = $this->cnh3;
        $aux++;
        if($this->data_nascimento3){
          $campo[$aux][0]    = 'data_nascimento';
          $campo[$aux][1]    = $this->php->inverteData($this->data_nascimento3);
          $aux++;
        }
        $campo[$aux][0]    = 'genero';
        $campo[$aux][1]    = $this->genero3;
        $aux++;
        $campo[$aux][0]    = 'nome';
        $campo[$aux][1]    = trim($this->nome3);
        $aux++;
        $campo[$aux][0]    = 'estado_civil';
        $campo[$aux][1]    = $this->estado_civil3;
        $aux++;
        $campo[$aux][0]    = 'regime_comunhao';
        $campo[$aux][1]    = $this->regime_comunhao3;
        $aux++;
        $campo[$aux][0]    = 'tipo_logradouro';
        $campo[$aux][1]    = $this->tipo_logradouro3;
        $aux++;
        $campo[$aux][0]   = 'logradouro';
        $campo[$aux][1]   = trim($this->logradouro3);
        $aux++;
        $campo[$aux][0]   = 'numero';
        $campo[$aux][1]   = $this->numero3;
        $aux++;
        $campo[$aux][0]   = 'complemento';
        $campo[$aux][1]   = $this->complemento3;
        $aux++;
        $campo[$aux][0]   = 'bairro';
        $campo[$aux][1]   = trim($this->bairro3);
        $aux++;
        $campo[$aux][0]   = 'cidade';
        $campo[$aux][1]   = trim($this->cidade3);
        $aux++;
        $campo[$aux][0]   = 'uf';
        $campo[$aux][1]   = $this->uf3;
        $aux++;
        $campo[$aux][0]   = 'cep';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->cep3);
        $aux++;
        $campo[$aux][0]   = 'referencia';
        $campo[$aux][1]   = $this->referencia3;
        $aux++;
        $campo[$aux][0]   = 'telefone1';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone13);
        $aux++;
        $campo[$aux][0]   = 'telefone2';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone23);
        $aux++;
        $campo[$aux][0]   = 'celular';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->celular3);
        $aux++;
        $campo[$aux][0]   = 'email';
        $campo[$aux][1]   = $this->email3;
        $aux++;
        $campo[$aux][0]   = 'grau_instrucao';
        $campo[$aux][1]   = $this->grau_instrucao3;
        $aux++;
        $campo[$aux][0]   = 'curso';
        $campo[$aux][1]   = $this->curso3;
        $aux++;
        if($this->conclusao3){
          $campo[$aux][0]   = 'conclusao';
          $campo[$aux][1]   = $this->conclusao3;
          $aux++;
        }
        $campo[$aux][0]   = 'declarou_irpf';
        $campo[$aux][1]   = $this->declarou_irpf3;
        $aux++;
        $campo[$aux][0]   = 'numero_pis';
        $campo[$aux][1]   = $this->numero_pis3;
        $aux++;
        $campo[$aux][0]   = 'possui_conta_banco';
        $campo[$aux][1]   = $this->possui_conta_banco3;
        $aux++;
        $campo[$aux][0]   = 'carteira_assinada';
        $campo[$aux][1]   = $this->carteira_assinada3;
        $aux++;
        $campo[$aux][0]   = 'saldo_fgts';
        $campo[$aux][1]   = $this->saldo_fgts3;
        $aux++;
        $campo[$aux][0]   = 'uso_fgts';
        $campo[$aux][1]   = $this->uso_fgts3;
        $aux++;
        if($this->valor_fgts3){
          $campo[$aux][0]   = 'valor_fgts';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->valor_fgts3));
          $aux++;
        }
        $campo[$aux][0]   = 'carro';
        $campo[$aux][1]   = $this->carro3;
        $aux++;
        if($this->prestacao_carro3){
          $campo[$aux][0]   = 'prestacao_carro';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_carro3));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_carro';
        $campo[$aux][1]   = $this->prestacoes_carro3;
        $aux++;
        $campo[$aux][0]   = 'emprestimo';
        $campo[$aux][1]   = $this->emprestimo3;
        $aux++;
        if($this->prestacao_emprestimo3){
          $campo[$aux][0]   = 'prestacao_emprestimo';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_emprestimo3));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_emprestimo';
        $campo[$aux][1]   = $this->prestacoes_emprestimo3;
        $aux++;
        $campo[$aux][0]   = 'consorcio';
        $campo[$aux][1]   = $this->consorcio3;
        $aux++;
        if($this->prestacao_consorcio3){
          $campo[$aux][0]   = 'prestacao_consorcio';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_consorcio3));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_consorcio';
        $campo[$aux][1]   = $this->prestacoes_consorcio3;
        $aux++;
        $campo[$aux][0]   = 'fies';
        $campo[$aux][1]   = $this->fies3;
        $aux++;
        if($this->prestacao_fies3){
          $campo[$aux][0]   = 'prestacao_fies';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_fies3));
          $aux++;
        }
        $campo[$aux][0]   = 'prestacoes_fies';
        $campo[$aux][1]   = $this->prestacoes_fies3;
        $aux++;
        $campo[$aux][0]   = 'cartao_credito';
        $campo[$aux][1]   = $this->cartao_credito3;
        $aux++;
        if($this->proxima_fatura3){
          $campo[$aux][0]   = 'proxima_fatura';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->proxima_fatura3));
          $aux++;
        }
        if($this->media_pagamentos3){
          $campo[$aux][0]   = 'media_pagamentos';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->media_pagamentos3));
          $aux++;
        }
        $campo[$aux][0]   = 'faturas_atraso';
        $campo[$aux][1]   = $this->faturas_atraso3;
        $aux++;
        $campo[$aux][0]   = 'cadastrado_em';
        $campo[$aux][1]   = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0]   = 'cadastrado_por';
        $campo[$aux][1]   = $_SESSION["id_usuario"];
        $aux++;

        $this->id3 = $campo[0][1];

        // AÇÃO DE ALTERAÇÃO NO BANCO
        $this->con1->executa($this->tabela, $campo);
        
        // GERA DIRETÓRIO DO CADASTRO
        $dir_base3 = "cadastros/" . $this->php->strZero($this->id3,7);
//        mkdir($dir_base3,0777);
?>
          <script>
       			$.getJSON('data/ajax/upload.php?search=',{url: '<?php echo $cliente . "/" . $dir_base3 . "/"; ?>', acao: 'diretorio', ajax: 'true'}, function(j){});
          </script>
<?php


        // INSERE OS TIPOS DE RENDA DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->tipo_renda3);$i++){
          if($this->tipo_renda3[$i] && $this->valor_renda3[$i]){

            $campo = null;
            $chave = null;

            $aux = 0;
            $campo[$aux][0]   = 'id';
            $campo[$aux][1]   = $this->con1->lastId('tb_renda', 'id');
            $aux++;
            $campo[$aux][0]   = 'id_pessoa_fisica';
            $campo[$aux][1]   = $this->id3;
            $aux++;
            $campo[$aux][0]   = 'tipo_renda';
            $campo[$aux][1]   = $this->tipo_renda3[$i];
            $aux++;
            $campo[$aux][0]   = 'profissao';
            $campo[$aux][1]   = $this->profissao3;
            $aux++;
            $campo[$aux][0]   = 'outra_profissao';
            $campo[$aux][1]   = $this->outra_profissao3[$i];
            $aux++;
            if($this->inicio_renda3[$i]){
              $campo[$aux][0]   = 'inicio_renda';
              $campo[$aux][1]   = $this->php->inverteData($this->inicio_renda3[$i]);
              $aux++;
            }
            $campo[$aux][0]   = 'empresa';
            $campo[$aux][1]   = $this->empresa3[$i];
            $aux++;
            $campo[$aux][0]   = 'cargo';
            $campo[$aux][1]   = $this->cargo3[$i];
            $aux++;
            $campo[$aux][0]   = 'telefone_comercial';
            $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial3[$i]);
            $aux++;
            $campo[$aux][0]   = 'ramal';
            $campo[$aux][1]   = $this->ramal3;
            $aux++;
            if($this->valor_renda3[$i]){
              $campo[$aux][0]  = 'valor_renda';
              $campo[$aux][1]  = str_replace(',','.',str_replace('.','',$this->valor_renda3[$i]));
              $aux++;
            }
            $campo[$aux][0]  = 'cadastrado_em';
            $campo[$aux][1]  = date('Y-m-d H:i:s');
            $aux++;
            $campo[$aux][0]  = 'cadastrado_por';
            $campo[$aux][1]  = $_SESSION["id_usuario"];
            $aux++;

            // AÇÃO DE ALTERAÇÃO NO BANCO
            $this->con1->executa('tb_renda', $campo);

          }
        }


        // INSERE AS REFERÊNCIAS DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->nome_referencia3);$i++){
          if($this->nome_referencia3[$i] && $this->telefone_referencia3[$i]){

            $campo = null;
            $chave = null;

            $aux = 0;
            $campo[$aux][0]   = 'id';
            $campo[$aux][1]   = $this->con1->lastId('tb_referencia', 'id');
            $aux++;
            $campo[$aux][0]   = 'id_pessoa_fisica';
            $campo[$aux][1]   = $this->id3;
            $aux++;
            $campo[$aux][0]   = 'nome_referencia';
            $campo[$aux][1]   = trim($this->nome_referencia3[$i]);
            $aux++;
            $campo[$aux][0]   = 'telefone_referencia';
            $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia3[$i]);
            $aux++;
            $campo[$aux][0]   = 'parentesco';
            $campo[$aux][1]   = $this->parentesco3[$i];
            $aux++;
            $campo[$aux][0]   = 'cadastrado_em';
            $campo[$aux][1]   = date('Y-m-d H:i:s');
            $aux++;
            $campo[$aux][0]   = 'cadastrado_por';
            $campo[$aux][1]   = $_SESSION["id_usuario"];
            $aux++;

            // AÇÃO DE ALTERAÇÃO NO BANCO
            $this->con1->executa('tb_referencia', $campo);

          }
        }
      
      }


      
      // DADOS DO PROCESSO
      $campo = null;
      $chave = null;
      
      $proponentes = '#' . $this->id . '#';
      if($this->id2){
        $proponentes .= $this->id2 . '#';
        if($this->id3){
          $proponentes .= $this->id3 . '#';
        }
      }

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_processo', 'id');
      $aux++;
      $campo[$aux][0]   = 'proponentes';
      $campo[$aux][1]   = $proponentes;
      $aux++;
      $campo[$aux][0]   = 'proponente1';
      $campo[$aux][1]   = $this->id;
      $aux++;
      if($this->id2){
        $campo[$aux][0]   = 'proponente2';
        $campo[$aux][1]   = $this->id2;
        $aux++;
        if($this->id3){
          $campo[$aux][0]   = 'proponente3';
          $campo[$aux][1]   = $this->id3;
          $aux++;
        }
      }
      $campo[$aux][0]   = 'empreendimento';
      $campo[$aux][1]   = $this->empreendimento;
      $aux++;
      $campo[$aux][0]   = 'instituicao_financiamento';
      $campo[$aux][1]   = $this->instituicao_financiamento;
      $aux++;
      // POR UNIDADE
      if($this->unidade > 0){
        if($this->default_cadastro_unidade_avaliacao == 'U'){
          $campo[$aux][0] = 'unidade';
          $campo[$aux][1] = $this->unidade;
          $aux++;
        // POR VALOR DE AVALIAÇÃO
        }else if($this->default_cadastro_unidade_avaliacao == 'A'){
          $campo[$aux][0] = 'valor_avaliacao';
          $campo[$aux][1] = $this->unidade;
          $aux++;
        }
      }
      $campo[$aux][0]   = 'n_proponentes';
      $campo[$aux][1]   = $this->n_proponentes;
      $aux++;
      $campo[$aux][0]   = 'grupo_usuario';
      $campo[$aux][1]   = $this->grupo_usuario;
      $aux++;
      $campo[$aux][0]   = 'gerente';
      $campo[$aux][1]   = $this->gerente;
      $aux++;
      $campo[$aux][0]   = 'corretor';
      $campo[$aux][1]   = $this->corretor;
      $aux++;
    if($this->codigo_relacionamento > 0){
      $campo[$aux][0]   = 'codigo_relacionamento';
      $campo[$aux][1]   = $this->codigo_relacionamento;
      $aux++;
    }
      $campo[$aux][0]   = 'observacao';
      $campo[$aux][1]   = $this->observacao;
      $aux++;
      if($_SESSION['pre_analise'] > 0){
        $campo[$aux][0] = 'pre_analise';
        $campo[$aux][1] = 1;
        $aux++;
        $campo[$aux][0] = 'grupo_pre_analise';
        $campo[$aux][1] = $_SESSION['pre_analise'];
        $aux++;
      }
      $campo[$aux][0]   = 'cadastrado_em';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]  = 'cadastrado_por';
      $campo[$aux][1]  = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]  = 'workflow';
      $campo[$aux][1]  = $this->workflow;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 1: AGUARDANDO DOCUMENTAÇÃO
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 1;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $this->id_processo = $campo[0][1];

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo);
      
      // GERA DIRETÓRIO DO PROCESSO
      $dir_processo = "processos/" . $this->php->strZero($this->id_processo,7);
//      mkdir($dir_processo,0777);
?>
          <script>
       			$.getJSON('data/ajax/upload.php?search=',{url: '<?php echo $cliente . "/" . $dir_processo . "/"; ?>', acao: 'diretorio', ajax: 'true'}, function(j){});
          </script>
<?php
      
      
      // GERA DIRETÓRIO PARA FUTUROS AVALISTAS
      $dir_processo = "avalistas/" . $this->php->strZero($this->id_processo,7);
//      mkdir($dir_processo,0777);
?>
          <script>
       			$.getJSON('data/ajax/upload.php?search=',{url: '<?php echo $cliente . "/" . $dir_processo . "/"; ?>', acao: 'diretorio', ajax: 'true'}, function(j){});
          </script>
<?php
      

      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');
      
      $campo = null;
      $chave = null;
      
      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;
      
      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 1; // NOVO CADASTRO DE CLIENTE
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];
      
      $this->con1->executa('tb_log_evolutivo', $campo);



      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->redireciona($_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);
    }

/*--------------------------------------------------------------------*/

/*-------------------------FUNÇÕES DE ALTERAÇÃO------------------------*/

    function alterar() {

      // DADOS QUE SERÃO ALTERADOS NO BANCO

      // 1º PROPONENTE
      if($this->cpf){

        $campo = null;
        $chave = null;
        $aux = 0;

        $campo[$aux][0]   = 'cpf';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->cpf);
        $aux++;
        $campo[$aux][0]   = 'rg';
        $campo[$aux][1]   = $this->rg;
        $aux++;
        $campo[$aux][0]   = 'cnh';
        $campo[$aux][1]   = $this->cnh;
        $aux++;
        if($this->data_nascimento){
          $campo[$aux][0]   = 'data_nascimento';
          $campo[$aux][1]   = $this->php->inverteData($this->data_nascimento);
          $aux++;
        }
        $campo[$aux][0]   = 'genero';
        $campo[$aux][1]   = $this->genero;
        $aux++;
        $campo[$aux][0]   = 'nome';
        $campo[$aux][1]   = trim($this->nome);
        $aux++;
        $campo[$aux][0]   = 'estado_civil';
        $campo[$aux][1]   = $this->estado_civil;
        $aux++;
        $campo[$aux][0]   = 'regime_comunhao';
        $campo[$aux][1]   = $this->regime_comunhao;
        $aux++;
        $campo[$aux][0]   = 'tipo_logradouro';
        $campo[$aux][1]   = $this->tipo_logradouro;
        $aux++;
        $campo[$aux][0]   = 'logradouro';
        $campo[$aux][1]   = trim($this->logradouro);
        $aux++;
        $campo[$aux][0]   = 'numero';
        $campo[$aux][1]   = $this->numero;
        $aux++;
        $campo[$aux][0]   = 'complemento';
        $campo[$aux][1]   = $this->complemento;
        $aux++;
        $campo[$aux][0]   = 'bairro';
        $campo[$aux][1]   = trim($this->bairro);
        $aux++;
        $campo[$aux][0]   = 'cidade';
        $campo[$aux][1]   = trim($this->cidade);
        $aux++;
        $campo[$aux][0]   = 'uf';
        $campo[$aux][1]   = $this->uf;
        $aux++;
        $campo[$aux][0]   = 'cep';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->cep);
        $aux++;
        $campo[$aux][0]   = 'referencia';
        $campo[$aux][1]   = $this->referencia;
        $aux++;
        $campo[$aux][0]   = 'telefone1';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone1);
        $aux++;
        $campo[$aux][0]   = 'telefone2';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone2);
        $aux++;
        $campo[$aux][0]   = 'celular';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->celular);
        $aux++;
        $campo[$aux][0]   = 'email';
        $campo[$aux][1]   = $this->email;
        $aux++;
        $campo[$aux][0]   = 'grau_instrucao';
        $campo[$aux][1]   = $this->grau_instrucao;
        $aux++;
        $campo[$aux][0]   = 'curso';
        $campo[$aux][1]   = $this->curso;
        $aux++;
        if($this->conclusao){
          $campo[$aux][0]   = 'conclusao';
          $campo[$aux][1]   = $this->conclusao;
          $aux++;
        }
        $campo[$aux][0]   = 'declarou_irpf';
        $campo[$aux][1]   = $this->declarou_irpf;
        $aux++;
        $campo[$aux][0]   = 'numero_pis';
        $campo[$aux][1]   = $this->numero_pis;
        $aux++;
        $campo[$aux][0]   = 'possui_conta_banco';
        $campo[$aux][1]   = $this->possui_conta_banco;
        $aux++;
        $campo[$aux][0]   = 'carteira_assinada';
        $campo[$aux][1]   = $this->carteira_assinada;
        $aux++;
        $campo[$aux][0]   = 'saldo_fgts';
        $campo[$aux][1]   = $this->saldo_fgts;
        $aux++;
        $campo[$aux][0]   = 'uso_fgts';
        $campo[$aux][1]   = $this->uso_fgts;
        $aux++;
        $campo[$aux][0]   = 'valor_fgts';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->valor_fgts));
        $aux++;
        $campo[$aux][0]   = 'carro';
        $campo[$aux][1]   = $this->carro;
        $aux++;
        $campo[$aux][0]   = 'prestacao_carro';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_carro));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_carro';
        $campo[$aux][1]   = $this->prestacoes_carro;
        $aux++;
        $campo[$aux][0]   = 'emprestimo';
        $campo[$aux][1]   = $this->emprestimo;
        $aux++;
        $campo[$aux][0]   = 'prestacao_emprestimo';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_emprestimo));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_emprestimo';
        $campo[$aux][1]   = $this->prestacoes_emprestimo;
        $aux++;
        $campo[$aux][0]   = 'consorcio';
        $campo[$aux][1]   = $this->consorcio;
        $aux++;
        $campo[$aux][0]   = 'prestacao_consorcio';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_consorcio));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_consorcio';
        $campo[$aux][1]   = $this->prestacoes_consorcio;
        $aux++;
        $campo[$aux][0]   = 'fies';
        $campo[$aux][1]   = $this->fies;
        $aux++;
        $campo[$aux][0]   = 'prestacao_fies';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_fies));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_fies';
        $campo[$aux][1]   = $this->prestacoes_fies;
        $aux++;
        $campo[$aux][0]   = 'cartao_credito';
        $campo[$aux][1]   = $this->cartao_credito;
        $aux++;
        $campo[$aux][0]   = 'proxima_fatura';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->proxima_fatura));
        $aux++;
        $campo[$aux][0]   = 'media_pagamentos';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->media_pagamentos));
        $aux++;
        $campo[$aux][0]   = 'faturas_atraso';
        $campo[$aux][1]   = $this->faturas_atraso;
        $aux++;
        $campo[$aux][0]   = 'atualizado_em';
        $campo[$aux][1]   = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0]   = 'atualizado_por';
        $campo[$aux][1]   = $_SESSION["id_usuario"];
        $aux++;

        $chave[0][0] = 'id';
        $chave[0][1] = $this->id;

        // AÇÃO DE ALTERAÇÃO NO BANCO
        $this->con1->executa($this->tabela, $campo, $chave);


        // LIMPA OS REGISTROS ANTERIORES DA RENDA
//        $this->con1->execSql("","UPDATE tb_renda SET status=0 WHERE id_pessoa_fisica='" . $this->id . "'");
        $this->con1->execSql("","DELETE FROM tb_renda WHERE id_pessoa_fisica='" . $this->id . "'");

        // INSERE OS TIPOS DE RENDA DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->tipo_renda);$i++){
          if($this->tipo_renda[$i] && $this->valor_renda[$i]){

            $this->con1->consulta("SELECT * FROM tb_renda WHERE id_pessoa_fisica='" . $this->id . "' AND tipo_renda='" . $this->tipo_renda[$i] . "' AND valor_renda='" . str_replace(',','.',str_replace('.','',$this->valor_renda[$i])) . "'");
            if($this->con1->nrows > 0){
              $this->con1->proxRegistro();
              
              $campo = null;
              $chave = null;

              $aux = 0;

              $campo[$aux][0]   = 'tipo_renda';
              $campo[$aux][1]   = $this->tipo_renda[$i];
              $aux++;
              $campo[$aux][0]   = 'profissao';
              $campo[$aux][1]   = $this->profissao[$i];
              $aux++;
              $campo[$aux][0]   = 'outra_profissao';
              $campo[$aux][1]   = $this->outra_profissao[$i];
              $aux++;
              if($this->inicio_renda[$i]){
                $campo[$aux][0]   = 'inicio_renda';
                $campo[$aux][1]   = $this->php->inverteData($this->inicio_renda[$i]);
                $aux++;
              }
              $campo[$aux][0]   = 'empresa';
              $campo[$aux][1]   = $this->empresa[$i];
              $aux++;
              $campo[$aux][0]   = 'cargo';
              $campo[$aux][1]   = $this->cargo[$i];
              $aux++;
              $campo[$aux][0]   = 'telefone_comercial';
              $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial[$i]);
              $aux++;
              $campo[$aux][0]   = 'ramal';
              $campo[$aux][1]   = $this->ramal[$i];
              $aux++;
              $campo[$aux][0]   = 'valor_renda';
              $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->valor_renda[$i]));
              $aux++;
              $campo[$aux][0]   = 'atualizado_em';
              $campo[$aux][1]   = date('Y-m-d H:i:s');
              $aux++;
              $campo[$aux][0]  = 'atualizado_por';
              $campo[$aux][1]  = $_SESSION["id_usuario"];
              $aux++;
              $campo[$aux][0]  = 'status';
              $campo[$aux][1]  = 1;
              $aux++;
              
              $chave[0][0] = 'id';
              $chave[0][1] = $this->con1->data['id'];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_renda', $campo, $chave);


            }else{

              $campo = null;
              $chave = null;

              $aux = 0;

              $campo[$aux][0]   = 'id';
              $campo[$aux][1]   = $this->con1->lastId('tb_renda', 'id');
              $aux++;
              $campo[$aux][0]   = 'id_pessoa_fisica';
              $campo[$aux][1]   = $this->id;
              $aux++;
              $campo[$aux][0]   = 'tipo_renda';
              $campo[$aux][1]   = $this->tipo_renda[$i];
              $aux++;
              $campo[$aux][0]   = 'profissao';
              $campo[$aux][1]   = $this->profissao[$i];
              $aux++;
              $campo[$aux][0]   = 'outra_profissao';
              $campo[$aux][1]   = $this->outra_profissao[$i];
              $aux++;
              if($this->inicio_renda[$i]){
                $campo[$aux][0]   = 'inicio_renda';
                $campo[$aux][1]   = $this->php->inverteData($this->inicio_renda[$i]);
                $aux++;
              }
              $campo[$aux][0]   = 'empresa';
              $campo[$aux][1]   = $this->empresa[$i];
              $aux++;
              $campo[$aux][0]   = 'cargo';
              $campo[$aux][1]   = $this->cargo[$i];
              $aux++;
              $campo[$aux][0]   = 'telefone_comercial';
              $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial[$i]);
              $aux++;
              $campo[$aux][0]   = 'ramal';
              $campo[$aux][1]   = $this->ramal[$i];
              $aux++;
              $campo[$aux][0]  = 'valor_renda';
              $campo[$aux][1]  = str_replace(',','.',str_replace('.','',$this->valor_renda[$i]));
              $aux++;
              $campo[$aux][0]  = 'cadastrado_em';
              $campo[$aux][1]  = date('Y-m-d H:i:s');
              $aux++;
              $campo[$aux][0]  = 'cadastrado_por';
              $campo[$aux][1]  = $_SESSION["id_usuario"];
              $aux++;

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_renda', $campo);

            }

          }
        }


        // LIMPA OS REGISTROS ANTERIORES DA REFERENCIA
//        $this->con1->execSql("","UPDATE tb_referencia SET status=0 WHERE id_pessoa_fisica='" . $this->id . "'");
        $this->con1->execSql("","DELETE FROM tb_referencia WHERE id_pessoa_fisica='" . $this->id . "'");

        // INSERE AS REFERÊNCIAS DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->nome_referencia);$i++){
          if($this->nome_referencia[$i] && $this->telefone_referencia[$i]){
          
            $this->con1->consulta("SELECT * FROM tb_referencia WHERE id_pessoa_fisica='" . $this->id . "' AND nome_referencia='" . $this->nome_referencia[$i] . "'");
            if($this->con1->nrows > 0){
              $this->con1->proxRegistro();

              $campo = null;
              $chave = null;
              
              $campo[1][0]   = 'nome_referencia';
              $campo[1][1]   = trim($this->nome_referencia[$i]);
              $campo[2][0]   = 'telefone_referencia';
              $campo[2][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia[$i]);
              $campo[3][0]   = 'parentesco';
              $campo[3][1]   = $this->parentesco[$i];
              $campo[4][0]   = 'atualizado_em';
              $campo[4][1]   = date('Y-m-d H:i:s');
              $campo[5][0]   = 'atualizado_por';
              $campo[5][1]   = $_SESSION["id_usuario"];
              $campo[6][0]   = 'status';
              $campo[6][1]   = 1;
              
              $chave[0][0] = 'id';
              $chave[0][1] = $this->con1->data['id'];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_referencia', $campo, $chave);
              
            }else{

              $campo = null;
              $chave = null;

              $campo[0][0]   = 'id';
              $campo[0][1]   = $this->con1->lastId('tb_referencia', 'id');
              $campo[1][0]   = 'id_pessoa_fisica';
              $campo[1][1]   = $this->id;
              $campo[2][0]   = 'nome_referencia';
              $campo[2][1]   = trim($this->nome_referencia[$i]);
              $campo[3][0]   = 'telefone_referencia';
              $campo[3][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia[$i]);
              $campo[4][0]   = 'parentesco';
              $campo[4][1]   = $this->parentesco[$i];
              $campo[5][0]   = 'cadastrado_em';
              $campo[5][1]   = date('Y-m-d H:i:s');
              $campo[6][0]   = 'cadastrado_por';
              $campo[6][1]   = $_SESSION["id_usuario"];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_referencia', $campo);
              
            }

          }
        }

      }


      // 2º PROPONENTE
      if($this->cpf2){

        $campo = null;
        $chave = null;
        $aux = 0;
        
        // CASO O 2º PROPONENTE AINDA NÃO EXISTA
        if(!$this->id2){
          $campo[$aux][0]    = 'id';
          $campo[$aux][1]    = $this->con1->lastId($this->tabela, 'id');
          $id2 = $campo[$aux][1];
          $aux++;
        }

        $campo[$aux][0]   = 'cpf';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->cpf2);
        $aux++;
        $campo[$aux][0]   = 'rg';
        $campo[$aux][1]   = $this->rg2;
        $aux++;
        $campo[$aux][0]   = 'cnh';
        $campo[$aux][1]   = $this->cnh2;
        $aux++;
        if($this->data_nascimento2){
          $campo[$aux][0]   = 'data_nascimento';
          $campo[$aux][1]   = $this->php->inverteData($this->data_nascimento2);
        }
        $aux++;
        $campo[$aux][0]   = 'genero';
        $campo[$aux][1]   = $this->genero2;
        $aux++;
        $campo[$aux][0]   = 'nome';
        $campo[$aux][1]   = trim($this->nome2);
        $aux++;
        $campo[$aux][0]   = 'estado_civil';
        $campo[$aux][1]   = $this->estado_civil2;
        $aux++;
        $campo[$aux][0]   = 'regime_comunhao';
        $campo[$aux][1]   = $this->regime_comunhao2;
        $aux++;
        $campo[$aux][0]   = 'tipo_logradouro';
        $campo[$aux][1]   = $this->tipo_logradouro2;
        $aux++;
        $campo[$aux][0]   = 'logradouro';
        $campo[$aux][1]   = trim($this->logradouro2);
        $aux++;
        $campo[$aux][0]   = 'numero';
        $campo[$aux][1]   = $this->numero2;
        $aux++;
        $campo[$aux][0]   = 'complemento';
        $campo[$aux][1]   = $this->complemento2;
        $aux++;
        $campo[$aux][0]   = 'bairro';
        $campo[$aux][1]   = trim($this->bairro2);
        $aux++;
        $campo[$aux][0]   = 'cidade';
        $campo[$aux][1]   = trim($this->cidade2);
        $aux++;
        $campo[$aux][0]   = 'uf';
        $campo[$aux][1]   = $this->uf2;
        $aux++;
        $campo[$aux][0]   = 'cep';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->cep2);
        $aux++;
        $campo[$aux][0]   = 'referencia';
        $campo[$aux][1]   = $this->referencia2;
        $aux++;
        $campo[$aux][0]   = 'telefone1';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone12);
        $aux++;
        $campo[$aux][0]   = 'telefone2';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone22);
        $aux++;
        $campo[$aux][0]   = 'celular';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->celular2);
        $aux++;
        $campo[$aux][0]   = 'email';
        $campo[$aux][1]   = $this->email2;
        $aux++;
        $campo[$aux][0]   = 'grau_instrucao';
        $campo[$aux][1]   = $this->grau_instrucao2;
        $aux++;
        $campo[$aux][0]   = 'curso';
        $campo[$aux][1]   = $this->curso2;
        $aux++;
        if($this->conclusao2){
          $campo[$aux][0]   = 'conclusao';
          $campo[$aux][1]   = $this->conclusao2;
          $aux++;
        }
        $campo[$aux][0]   = 'declarou_irpf';
        $campo[$aux][1]   = $this->declarou_irpf2;
        $aux++;
        $campo[$aux][0]   = 'numero_pis';
        $campo[$aux][1]   = $this->numero_pis2;
        $aux++;
        $campo[$aux][0]   = 'possui_conta_banco';
        $campo[$aux][1]   = $this->possui_conta_banco2;
        $aux++;
        $campo[$aux][0]   = 'carteira_assinada';
        $campo[$aux][1]   = $this->carteira_assinada2;
        $aux++;
        $campo[$aux][0]   = 'saldo_fgts';
        $campo[$aux][1]   = $this->saldo_fgts2;
        $aux++;
        $campo[$aux][0]   = 'uso_fgts';
        $campo[$aux][1]   = $this->uso_fgts2;
        $aux++;
        $campo[$aux][0]   = 'valor_fgts';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->valor_fgts2));
        $aux++;
        $campo[$aux][0]   = 'carro';
        $campo[$aux][1]   = $this->carro2;
        $aux++;
        $campo[$aux][0]   = 'prestacao_carro';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_carro2));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_carro';
        $campo[$aux][1]   = $this->prestacoes_carro2;
        $aux++;
        $campo[$aux][0]   = 'emprestimo';
        $campo[$aux][1]   = $this->emprestimo2;
        $aux++;
        $campo[$aux][0]   = 'prestacao_emprestimo';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_emprestimo2));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_emprestimo';
        $campo[$aux][1]   = $this->prestacoes_emprestimo2;
        $aux++;
        $campo[$aux][0]   = 'consorcio';
        $campo[$aux][1]   = $this->consorcio2;
        $aux++;
        $campo[$aux][0]   = 'prestacao_consorcio';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_consorcio2));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_consorcio';
        $campo[$aux][1]   = $this->prestacoes_consorcio2;
        $aux++;
        $campo[$aux][0]   = 'fies';
        $campo[$aux][1]   = $this->fies2;
        $aux++;
        $campo[$aux][0]   = 'prestacao_fies';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_fies2));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_fies';
        $campo[$aux][1]   = $this->prestacoes_fies2;
        $aux++;
        $campo[$aux][0]   = 'cartao_credito';
        $campo[$aux][1]   = $this->cartao_credito2;
        $aux++;
        $campo[$aux][0]   = 'proxima_fatura';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->proxima_fatura2));
        $aux++;
        $campo[$aux][0]   = 'media_pagamentos';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->media_pagamentos2));
        $aux++;
        $campo[$aux][0]   = 'faturas_atraso';
        $campo[$aux][1]   = $this->faturas_atraso2;
        $aux++;
        $campo[$aux][0]   = 'atualizado_em';
        $campo[$aux][1]   = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0]   = 'atualizado_por';
        $campo[$aux][1]   = $_SESSION["id_usuario"];
        $aux++;

        // O 2º PROPONENTE JÁ EXISTE
        if($this->id2){
          $chave[0][0] = 'id';
          $chave[0][1] = $this->id2;

          // AÇÃO DE ALTERAÇÃO NO BANCO
          $this->con1->executa($this->tabela, $campo, $chave);
          
        // O 2º PROPONENTE AINDA NÃO EXISTE
        }else{

          $this->id2 = $id2;
          
          // AÇÃO DE ALTERAÇÃO NO BANCO
          $this->con1->executa($this->tabela, $campo);
          
          // ALTERA OS PROPONENTES DO PROCESSO
          $campo = null;
          $chave = null;
          
          $aux = 0;
          $campo[$aux][0] = 'proponentes';
          $campo[$aux][1] = '#' . $this->id . '#' . $this->id2 . '#';
          $aux++;
          $campo[$aux][0]   = 'proponente1';
          $campo[$aux][1]   = $this->id;
          $aux++;
          if($this->id2){
            $campo[$aux][0]   = 'proponente2';
            $campo[$aux][1]   = $this->id2;
            $aux++;
          }
          $campo[$aux][0] = 'n_proponentes';
          $campo[$aux][1] = 2;
          $aux++;
          
          $chave[0][0] = 'id';
          $chave[0][1] = $this->id_processo;
          
          $this->con1->executa('tb_processo', $campo, $chave);
          
          // GERA DIRETÓRIO DO CADASTRO
          $dir_base = "cadastros/" . $this->php->strZero($this->id2,7);
          mkdir($dir_base,0777);
        }
        

        // LIMPA OS REGISTROS ANTERIORES DA RENDA
//        $this->con1->execSql("","UPDATE tb_renda SET status=0 WHERE id_pessoa_fisica='" . $this->id2 . "'");
        $this->con1->execSql("","DELETE FROM tb_renda WHERE id_pessoa_fisica='" . $this->id2 . "'");

        // INSERE OS TIPOS DE RENDA DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->tipo_renda2);$i++){
          if($this->tipo_renda2[$i] && $this->valor_renda2[$i]){

            $this->con1->consulta("SELECT * FROM tb_renda WHERE id_pessoa_fisica='" . $this->id2 . "' AND tipo_renda='" . $this->tipo_renda2[$i] . "' AND valor_renda='" . str_replace(',','.',str_replace('.','',$this->valor_renda2[$i])) . "'");
            if($this->con1->nrows > 0){
              $this->con1->proxRegistro();

              $campo = null;
              $chave = null;

              $aux = 0;

              $campo[$aux][0]   = 'tipo_renda';
              $campo[$aux][1]   = $this->tipo_renda2[$i];
              $aux++;
              $campo[$aux][0]   = 'profissao';
              $campo[$aux][1]   = $this->profissao2[$i];
              $aux++;
              $campo[$aux][0]   = 'outra_profissao';
              $campo[$aux][1]   = $this->outra_profissao2[$i];
              $aux++;
              if($this->inicio_renda2[$i]){
                $campo[$aux][0]   = 'inicio_renda';
                $campo[$aux][1]   = $this->php->inverteData($this->inicio_renda2[$i]);
                $aux++;
              }
              $campo[$aux][0]   = 'empresa';
              $campo[$aux][1]   = $this->empresa2[$i];
              $aux++;
              $campo[$aux][0]   = 'cargo';
              $campo[$aux][1]   = $this->cargo2[$i];
              $aux++;
              $campo[$aux][0]   = 'telefone_comercial';
              $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial2[$i]);
              $aux++;
              $campo[$aux][0]   = 'ramal';
              $campo[$aux][1]   = $this->ramal2[$i];
              $aux++;
              $campo[$aux][0]   = 'valor_renda';
              $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->valor_renda2[$i]));
              $aux++;
              $campo[$aux][0]   = 'atualizado_em';
              $campo[$aux][1]   = date('Y-m-d H:i:s');
              $aux++;
              $campo[$aux][0]  = 'atualizado_por';
              $campo[$aux][1]  = $_SESSION["id_usuario"];
              $aux++;
              $campo[$aux][0]  = 'status';
              $campo[$aux][1]  = 1;
              $aux++;

              $chave[0][0] = 'id';
              $chave[0][1] = $this->con1->data['id'];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_renda', $campo, $chave);


            }else{

              $campo = null;
              $chave = null;

              $aux = 0;

              $campo[$aux][0]   = 'id';
              $campo[$aux][1]   = $this->con1->lastId('tb_renda', 'id');
              $aux++;
              $campo[$aux][0]   = 'id_pessoa_fisica';
              $campo[$aux][1]   = $this->id2;
              $aux++;
              $campo[$aux][0]   = 'tipo_renda';
              $campo[$aux][1]   = $this->tipo_renda2[$i];
              $aux++;
              $campo[$aux][0]   = 'profissao';
              $campo[$aux][1]   = $this->profissao2[$i];
              $aux++;
              $campo[$aux][0]   = 'outra_profissao';
              $campo[$aux][1]   = $this->outra_profissao2[$i];
              $aux++;
              if($this->inicio_renda2[$i]){
                $campo[$aux][0]   = 'inicio_renda';
                $campo[$aux][1]   = $this->php->inverteData($this->inicio_renda2[$i]);
                $aux++;
              }
              $campo[$aux][0]   = 'empresa';
              $campo[$aux][1]   = $this->empresa2[$i];
              $aux++;
              $campo[$aux][0]   = 'cargo';
              $campo[$aux][1]   = $this->cargo2[$i];
              $aux++;
              $campo[$aux][0]   = 'telefone_comercial';
              $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial2[$i]);
              $aux++;
              $campo[$aux][0]   = 'ramal';
              $campo[$aux][1]   = $this->ramal2[$i];
              $aux++;
              $campo[$aux][0]  = 'valor_renda';
              $campo[$aux][1]  = str_replace(',','.',str_replace('.','',$this->valor_renda2[$i]));
              $aux++;
              $campo[$aux][0]  = 'cadastrado_em';
              $campo[$aux][1]  = date('Y-m-d H:i:s');
              $aux++;
              $campo[$aux][0]  = 'cadastrado_por';
              $campo[$aux][1]  = $_SESSION["id_usuario"];
              $aux++;

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_renda', $campo);

            }

          }
        }


        // LIMPA OS REGISTROS ANTERIORES DA REFERENCIA
//        $this->con1->execSql("","UPDATE tb_referencia SET status=0 WHERE id_pessoa_fisica='" . $this->id2 . "'");
        $this->con1->execSql("","DELETE FROM tb_referencia WHERE id_pessoa_fisica='" . $this->id2 . "'");

        // INSERE AS REFERÊNCIAS DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->nome_referencia2);$i++){
          if($this->nome_referencia2[$i] && $this->telefone_referencia2[$i]){

            $this->con1->consulta("SELECT * FROM tb_referencia WHERE id_pessoa_fisica='" . $this->id2 . "' AND nome_referencia='" . $this->nome_referencia2[$i] . "'");
            if($this->con1->nrows > 0){
              $this->con1->proxRegistro();

              $campo = null;
              $chave = null;

              $campo[1][0]   = 'nome_referencia';
              $campo[1][1]   = trim($this->nome_referencia2[$i]);
              $campo[2][0]   = 'telefone_referencia';
              $campo[2][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia2[$i]);
              $campo[3][0]   = 'parentesco';
              $campo[3][1]   = $this->parentesco2[$i];
              $campo[4][0]   = 'atualizado_em';
              $campo[4][1]   = date('Y-m-d H:i:s');
              $campo[5][0]   = 'atualizado_por';
              $campo[5][1]   = $_SESSION["id_usuario"];
              $campo[6][0]   = 'status';
              $campo[6][1]   = 1;

              $chave[0][0] = 'id';
              $chave[0][1] = $this->con1->data['id'];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_referencia', $campo, $chave);

            }else{

              $campo = null;
              $chave = null;

              $campo[0][0]   = 'id';
              $campo[0][1]   = $this->con1->lastId('tb_referencia', 'id');
              $campo[1][0]   = 'id_pessoa_fisica';
              $campo[1][1]   = $this->id2;
              $campo[2][0]   = 'nome_referencia';
              $campo[2][1]   = trim($this->nome_referencia2[$i]);
              $campo[3][0]   = 'telefone_referencia';
              $campo[3][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia2[$i]);
              $campo[4][0]   = 'parentesco';
              $campo[4][1]   = $this->parentesco2[$i];
              $campo[5][0]   = 'cadastrado_em';
              $campo[5][1]   = date('Y-m-d H:i:s');
              $campo[6][0]   = 'cadastrado_por';
              $campo[6][1]   = $_SESSION["id_usuario"];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_referencia', $campo);

            }

          }
        }


      }



      // 3º PROPONENTE
      if($this->cpf3){

        $campo = null;
        $chave = null;
        $aux = 0;
        
        // CASO O 3º PROPONENTE AINDA NÃO EXISTA
        if(!$this->id3){
          $campo[$aux][0]    = 'id';
          $campo[$aux][1]    = $this->con1->lastId($this->tabela, 'id');
          $id3 = $campo[$aux][1];
          $aux++;
        }

        $campo[$aux][0]   = 'cpf';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->cpf3);
        $aux++;
        $campo[$aux][0]   = 'rg';
        $campo[$aux][1]   = $this->rg3;
        $aux++;
        $campo[$aux][0]   = 'cnh';
        $campo[$aux][1]   = $this->cnh3;
        $aux++;
        if($this->data_nascimento3){
          $campo[$aux][0]   = 'data_nascimento';
          $campo[$aux][1]   = $this->php->inverteData($this->data_nascimento3);
          $aux++;
        }
        $campo[$aux][0]   = 'genero';
        $campo[$aux][1]   = $this->genero3;
        $aux++;
        $campo[$aux][0]   = 'nome';
        $campo[$aux][1]   = trim($this->nome3);
        $aux++;
        $campo[$aux][0]   = 'estado_civil';
        $campo[$aux][1]   = $this->estado_civil3;
        $aux++;
        $campo[$aux][0]   = 'regime_comunhao';
        $campo[$aux][1]   = $this->regime_comunhao3;
        $aux++;
        $campo[$aux][0]   = 'tipo_logradouro';
        $campo[$aux][1]   = $this->tipo_logradouro3;
        $aux++;
        $campo[$aux][0]   = 'logradouro';
        $campo[$aux][1]   = trim($this->logradouro3);
        $aux++;
        $campo[$aux][0]   = 'numero';
        $campo[$aux][1]   = $this->numero3;
        $aux++;
        $campo[$aux][0]   = 'complemento';
        $campo[$aux][1]   = $this->complemento3;
        $aux++;
        $campo[$aux][0]   = 'bairro';
        $campo[$aux][1]   = trim($this->bairro3);
        $aux++;
        $campo[$aux][0]   = 'cidade';
        $campo[$aux][1]   = trim($this->cidade3);
        $aux++;
        $campo[$aux][0]   = 'uf';
        $campo[$aux][1]   = $this->uf3;
        $aux++;
        $campo[$aux][0]   = 'cep';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->cep3);
        $aux++;
        $campo[$aux][0]   = 'referencia';
        $campo[$aux][1]   = $this->referencia3;
        $aux++;
        $campo[$aux][0]   = 'telefone1';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone13);
        $aux++;
        $campo[$aux][0]   = 'telefone2';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone23);
        $aux++;
        $campo[$aux][0]   = 'celular';
        $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->celular3);
        $aux++;
        $campo[$aux][0]   = 'email';
        $campo[$aux][1]   = $this->email3;
        $aux++;
        $campo[$aux][0]   = 'grau_instrucao';
        $campo[$aux][1]   = $this->grau_instrucao3;
        $aux++;
        $campo[$aux][0]   = 'curso';
        $campo[$aux][1]   = $this->curso3;
        $aux++;
        if($this->conclusao3){
          $campo[$aux][0]   = 'conclusao';
          $campo[$aux][1]   = $this->conclusao3;
          $aux++;
        }
        $campo[$aux][0]   = 'declarou_irpf';
        $campo[$aux][1]   = $this->declarou_irpf3;
        $aux++;
        $campo[$aux][0]   = 'numero_pis';
        $campo[$aux][1]   = $this->numero_pis3;
        $aux++;
        $campo[$aux][0]   = 'possui_conta_banco';
        $campo[$aux][1]   = $this->possui_conta_banco3;
        $aux++;
        $campo[$aux][0]   = 'carteira_assinada';
        $campo[$aux][1]   = $this->carteira_assinada3;
        $aux++;
        $campo[$aux][0]   = 'saldo_fgts';
        $campo[$aux][1]   = $this->saldo_fgts3;
        $aux++;
        $campo[$aux][0]   = 'uso_fgts';
        $campo[$aux][1]   = $this->uso_fgts3;
        $aux++;
        $campo[$aux][0]   = 'valor_fgts';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->valor_fgts3));
        $aux++;
        $campo[$aux][0]   = 'carro';
        $campo[$aux][1]   = $this->carro3;
        $aux++;
        $campo[$aux][0]   = 'prestacao_carro';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_carro3));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_carro';
        $campo[$aux][1]   = $this->prestacoes_carro3;
        $aux++;
        $campo[$aux][0]   = 'emprestimo';
        $campo[$aux][1]   = $this->emprestimo3;
        $aux++;
        $campo[$aux][0]   = 'prestacao_emprestimo';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_emprestimo3));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_emprestimo';
        $campo[$aux][1]   = $this->prestacoes_emprestimo3;
        $aux++;
        $campo[$aux][0]   = 'consorcio';
        $campo[$aux][1]   = $this->consorcio3;
        $aux++;
        $campo[$aux][0]   = 'prestacao_consorcio';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_consorcio3));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_consorcio';
        $campo[$aux][1]   = $this->prestacoes_consorcio3;
        $aux++;
        $campo[$aux][0]   = 'fies';
        $campo[$aux][1]   = $this->fies3;
        $aux++;
        $campo[$aux][0]   = 'prestacao_fies';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_fies3));
        $aux++;
        $campo[$aux][0]   = 'prestacoes_fies';
        $campo[$aux][1]   = $this->prestacoes_fies3;
        $aux++;
        $campo[$aux][0]   = 'cartao_credito';
        $campo[$aux][1]   = $this->cartao_credito3;
        $aux++;
        $campo[$aux][0]   = 'proxima_fatura';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->proxima_fatura3));
        $aux++;
        $campo[$aux][0]   = 'media_pagamentos';
        $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->media_pagamentos3));
        $aux++;
        $campo[$aux][0]   = 'faturas_atraso';
        $campo[$aux][1]   = $this->faturas_atraso3;
        $aux++;
        $campo[$aux][0]   = 'atualizado_em';
        $campo[$aux][1]   = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0]   = 'atualizado_por';
        $campo[$aux][1]   = $_SESSION["id_usuario"];
        $aux++;
        
        // O 3º PROPONENTE JÁ EXISTE
        if($this->id3){
          $chave[0][0] = 'id';
          $chave[0][1] = $this->id3;

          // AÇÃO DE ALTERAÇÃO NO BANCO
          $this->con1->executa($this->tabela, $campo, $chave);

        // O 3º PROPONENTE AINDA NÃO EXISTE
        }else{

          $this->id3 = $id3;

          // AÇÃO DE ALTERAÇÃO NO BANCO
          $this->con1->executa($this->tabela, $campo);

          // ALTERA OS PROPONENTES DO PROCESSO
          $campo = null;
          $chave = null;

          $aux = 0;
          $campo[$aux][0] = 'proponentes';
          $campo[$aux][1] = '#' . $this->id . '#' . $this->id2 . '#' . $this->id3 . '#';
          $aux++;
          $campo[$aux][0]   = 'proponente1';
          $campo[$aux][1]   = $this->id;
          $aux++;
          if($this->id2){
            $campo[$aux][0]   = 'proponente2';
            $campo[$aux][1]   = $this->id2;
            $aux++;
            if($this->id3){
              $campo[$aux][0]   = 'proponente3';
              $campo[$aux][1]   = $this->id3;
              $aux++;
            }
          }
          $campo[$aux][0] = 'n_proponentes';
          $campo[$aux][1] = 3;
          $aux++;

          $chave[0][0] = 'id';
          $chave[0][1] = $this->id_processo;

          $this->con1->executa('tb_processo', $campo, $chave);
          
          // GERA DIRETÓRIO DO CADASTRO
          $dir_base = "cadastros/" . $this->php->strZero($this->id3,7);
          mkdir($dir_base,0777);
        }


        // LIMPA OS REGISTROS ANTERIORES DA RENDA
//        $this->con1->execSql("","UPDATE tb_renda SET status=0 WHERE id_pessoa_fisica='" . $this->id3 . "'");
        $this->con1->execSql("","DELETE FROM tb_renda WHERE id_pessoa_fisica='" . $this->id3 . "'");


        // INSERE OS TIPOS DE RENDA DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->tipo_renda3);$i++){
          if($this->tipo_renda3[$i] && $this->valor_renda3[$i]){

            $this->con1->consulta("SELECT * FROM tb_renda WHERE id_pessoa_fisica='" . $this->id3 . "' AND tipo_renda='" . $this->tipo_renda3[$i] . "' AND valor_renda='" . str_replace(',','.',str_replace('.','',$this->valor_renda3[$i])) . "'");
            if($this->con1->nrows > 0){
              $this->con1->proxRegistro();

              $campo = null;
              $chave = null;

              $aux = 0;

              $campo[$aux][0]   = 'tipo_renda';
              $campo[$aux][1]   = $this->tipo_renda3[$i];
              $campo[$aux][0]   = 'profissao';
              $campo[$aux][1]   = $this->profissao3[$i];
              $campo[$aux][0]   = 'outra_profissao';
              $campo[$aux][1]   = $this->outra_profissao3[$i];
              if($this->inicio_renda3[$i]){
                $campo[$aux][0]   = 'inicio_renda';
                $campo[$aux][1]   = $this->php->inverteData($this->inicio_renda3[$i]);
              }
              $campo[$aux][0]   = 'empresa';
              $campo[$aux][1]   = $this->empresa3[$i];
              $campo[$aux][0]   = 'cargo';
              $campo[$aux][1]   = $this->cargo3[$i];
              $campo[$aux][0]   = 'telefone_comercial';
              $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial3[$i]);
              $campo[$aux][0]   = 'ramal';
              $campo[$aux][1]   = $this->ramal3[$i];
              $campo[$aux][0]   = 'valor_renda';
              $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->valor_renda3[$i]));
              $campo[$aux][0]   = 'atualizado_em';
              $campo[$aux][1]   = date('Y-m-d H:i:s');
              $campo[$aux][0]  = 'atualizado_por';
              $campo[$aux][1]  = $_SESSION["id_usuario"];
              $campo[$aux][0]  = 'status';
              $campo[$aux][1]  = 1;

              $chave[0][0] = 'id';
              $chave[0][1] = $this->con1->data['id'];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_renda', $campo, $chave);


            }else{

              $campo = null;
              $chave = null;

              $aux = 0;

              $campo[$aux][0]   = 'id';
              $campo[$aux][1]   = $this->con1->lastId('tb_renda', 'id');
              $campo[$aux][0]   = 'id_pessoa_fisica';
              $campo[$aux][1]   = $this->id3;
              $campo[$aux][0]   = 'tipo_renda';
              $campo[$aux][1]   = $this->tipo_renda3[$i];
              $campo[$aux][0]   = 'profissao';
              $campo[$aux][1]   = $this->profissao3[$i];
              $campo[$aux][0]   = 'outra_profissao';
              $campo[$aux][1]   = $this->outra_profissao3[$i];
              if($this->inicio_renda3[$i]){
                $campo[$aux][0]   = 'inicio_renda';
                $campo[$aux][1]   = $this->php->inverteData($this->inicio_renda3[$i]);
              }
              $campo[$aux][0]   = 'empresa';
              $campo[$aux][1]   = $this->empresa3[$i];
              $campo[$aux][0]   = 'cargo';
              $campo[$aux][1]   = $this->cargo3[$i];
              $campo[$aux][0]   = 'telefone_comercial';
              $campo[$aux][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial3[$i]);
              $campo[$aux][0]   = 'ramal';
              $campo[$aux][1]   = $this->ramal3[$i];
              $campo[$aux][0]  = 'valor_renda';
              $campo[$aux][1]  = str_replace(',','.',str_replace('.','',$this->valor_renda3[$i]));
              $campo[$aux][0]  = 'cadastrado_em';
              $campo[$aux][1]  = date('Y-m-d H:i:s');
              $campo[$aux][0]  = 'cadastrado_por';
              $campo[$aux][1]  = $_SESSION["id_usuario"];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_renda', $campo);

            }

          }
        }


        // LIMPA OS REGISTROS ANTERIORES DA REFERENCIA
//        $this->con1->execSql("","UPDATE tb_referencia SET status=0 WHERE id_pessoa_fisica='" . $this->id3 . "'");
        $this->con1->execSql("","DELETE FROM tb_referencia WHERE id_pessoa_fisica='" . $this->id3 . "'");

        // INSERE AS REFERÊNCIAS DA PESSOA FÍSICA
        for($i=0;$i<sizeOf($this->nome_referencia3);$i++){
          if($this->nome_referencia3[$i] && $this->telefone_referencia3[$i]){

            $this->con1->consulta("SELECT * FROM tb_referencia WHERE id_pessoa_fisica='" . $this->id3 . "' AND nome_referencia='" . $this->nome_referencia3[$i] . "'");
            if($this->con1->nrows > 0){
              $this->con1->proxRegistro();

              $campo = null;
              $chave = null;

              $campo[1][0]   = 'nome_referencia';
              $campo[1][1]   = trim($this->nome_referencia3[$i]);
              $campo[2][0]   = 'telefone_referencia';
              $campo[2][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia3[$i]);
              $campo[3][0]   = 'parentesco';
              $campo[3][1]   = $this->parentesco3[$i];
              $campo[4][0]   = 'atualizado_em';
              $campo[4][1]   = date('Y-m-d H:i:s');
              $campo[5][0]   = 'atualizado_por';
              $campo[5][1]   = $_SESSION["id_usuario"];
              $campo[6][0]  = 'status';
              $campo[6][1]  = 1;

              $chave[0][0] = 'id';
              $chave[0][1] = $this->con1->data['id'];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_referencia', $campo, $chave);

            }else{

              $campo = null;
              $chave = null;

              $campo[0][0]   = 'id';
              $campo[0][1]   = $this->con1->lastId('tb_referencia', 'id');
              $campo[1][0]   = 'id_pessoa_fisica';
              $campo[1][1]   = $this->id3;
              $campo[2][0]   = 'nome_referencia';
              $campo[2][1]   = trim($this->nome_referencia3[$i]);
              $campo[3][0]   = 'telefone_referencia';
              $campo[3][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia3[$i]);
              $campo[4][0]   = 'parentesco';
              $campo[4][1]   = $this->parentesco3[$i];
              $campo[5][0]   = 'cadastrado_em';
              $campo[5][1]   = date('Y-m-d H:i:s');
              $campo[6][0]   = 'cadastrado_por';
              $campo[6][1]   = $_SESSION["id_usuario"];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_referencia', $campo);

            }

          }
        }

      }


      // DADOS DO PROCESSO
      $campo = null;
      $chave = null;
      $aux = 0;

      $campo[$aux][0]   = 'empreendimento';
      $campo[$aux][1]   = $this->empreendimento;
      $aux++;
      $campo[$aux][0]   = 'instituicao_financiamento';
      $campo[$aux][1]   = $this->instituicao_financiamento;
      $aux++;
      // POR UNIDADE
      if($this->unidade > 0){
        if($this->default_cadastro_unidade_avaliacao == 'U'){
          $campo[$aux][0] = 'unidade';
          $campo[$aux][1] = $this->unidade;
          $aux++;
        // POR VALOR DE AVALIAÇÃO
        }else if($this->default_cadastro_unidade_avaliacao == 'A'){
          $campo[$aux][0] = 'valor_avaliacao';
          $campo[$aux][1] = $this->unidade;
          $aux++;
        }
      }
      $campo[$aux][0]   = 'n_proponentes';
      $campo[$aux][1]   = $this->n_proponentes;
      $aux++;
      $campo[$aux][0]   = 'grupo_usuario';
      $campo[$aux][1]   = $this->grupo_usuario;
      $aux++;
      $campo[$aux][0]   = 'gerente';
      $campo[$aux][1]   = $this->gerente;
      $aux++;
      $campo[$aux][0]   = 'corretor';
      $campo[$aux][1]   = $this->corretor;
      $aux++;
      $campo[$aux][0]   = 'codigo_relacionamento';
      $campo[$aux][1]   = $this->codigo_relacionamento;
      $aux++;
      $campo[$aux][0]   = 'observacao';
      $campo[$aux][1]   = $this->observacao;
      $aux++;
      $campo[$aux][0]   = 'atualizado_em';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'atualizado_por';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      
      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);
      

      // REGISTRA A CONCLUSÃO DE UMA MANUTENÇÃO, CASO ELA EXISTA
      if($this->id_manutencao){
        $arrManutencao = preg_split("/#/",$this->id_manutencao);
        for($i=1;$i<sizeOf($arrManutencao);$i++){
        
          $campo = null;
          $chave = null;
        
          $aux = 0;
          $campo[$aux][0] = 'concluido_em';
          $campo[$aux][1] = date('Y-m-d H:i:s');
          $aux++;
          $campo[$aux][0] = 'concluido_por';
          $campo[$aux][1] = $_SESSION['id_usuario'];
          $aux++;
        
          $chave[0][0] = 'id';
          $chave[0][1] = $arrManutencao[$i];
        
          $this->con1->executa('tb_manutencao', $campo, $chave);

        }
      }
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 2; // ALTERAÇÃO DOS DADOS CADASTRAIS DO PROCESSO
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);
      
      

      // EXI8BIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->redireciona($_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);
    }

/*--------------------------------------------------------------------*/

/*-------------------------FUNÇÕES DE DESABILITAR------------------------*/

    function desabilitar() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $campo[0][0] = 'status';
      $campo[0][1] = 0;

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id_processo';
      $chave[0][1]   = $this->id;
      
      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);

      // EXI8BIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Registro excluído com sucesso!',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=Mw==');
    }

/*--------------------------------------------------------------------*/

/*-------------------------FUNÇÃO DE ENVIO PARA ANÁLISE------------------------*/

    function enviaAnalise() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      
      $campo = null;
      $chave = null;
      
      $aux = 0;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      if($this->operador_coban > 0){
        $campo[$aux][0] = 'operador_coban';
        $campo[$aux][1] = $this->operador_coban;
        $aux++;
      }
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 1;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 11: DOCUMENTAÇÃO EM ANÁLISE
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 11;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }
      
      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);
      
      $this->con1->consulta("SELECT proponentes FROM tb_processo WHERE id='" . $this->id_processo . "'");
      while($this->con1->proxRegistro()){
        $arrProponentes = split("#",$this->con1->data['proponentes']);
        for($i=1;$i<sizeOf($arrProponentes)-1;$i++){
          // LIMPA OS REGISTROS ANTERIORES DA RENDA
          $this->con1->execSql("","UPDATE tb_pendencia_documentacao SET status=0 WHERE pessoa_fisica='" . $arrProponentes[$i] . "'");
        }
      }
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 4; // ENVIO DA DOCUMENTAÇÃO PARA ANÁLISE
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);
      

      // EXI8BIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Processo enviado para a análise do COBAN. Aguarde o retorno.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTA=&id_processo=' . $this->id_processo);
    }
    
    
    function enviaInstituicaoFinanceira() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      
      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 4;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 15: ENVIADO PARA A INSTITUIÇÃO FINANCEIRA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 15;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;
      
      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 7; // ENVIADO PARA A INSTITUIÇÃO FINANCEIRA
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Processo enviado para a INSTITUIÇÃO FINANCEIRA. Aguarde o retorno.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTA=&id_processo=' . $this->id_processo);
    }

/*--------------------------------------------------------------------*/

/*-------------------------FUNÇÃO DE ENVIO PARA ANÁLISE------------------------*/

    function aprovaDocumentacao() {
    
      $pendencia = 0;
      $proponente_irregular = 0;
      while($arrAprovacao = current($this->aprovacao_documento)){
        $proponente = key($this->aprovacao_documento);
        while($aprovacao = current($arrAprovacao)){
          $documento = key($arrAprovacao);

          // REPROVADO
          if($aprovacao == 'R'){
            $campo = null;
            $chave = null;

//            echo 'ATENÇÃO: ESTAMOS REALIZANDO UMA PEQUENA MANUTENÇÃO NO SISTEMA QUE IMPOSSIBILITA A REPROVAÇÃO DE DOCUMENTOS. EM ALGUNS INSTANTES IREMOS LIBERÁ-LO. PEDIMOS A GENTILEZA DE AGUARDAR. OBRIGADO.<br /><br />';
          
            $campo[0][0] = 'id';
            $campo[0][1] = $this->con1->lastId('tb_pendencia_documentacao', 'id');
            $campo[1][0] = 'processo';
            $campo[1][1] = $this->id_processo;
            $campo[2][0] = 'pessoa_fisica';
            $campo[2][1] = $proponente;
            $campo[3][0] = 'documento';
            $campo[3][1] = $documento;
            $campo[4][0] = 'aprovacao';
            $campo[4][1] = $aprovacao;
            $campo[5][0] = 'justificativa';
            $campo[5][1] = $this->justificativa_documento[$proponente][$documento];
            $campo[6][0] = 'validade';
            $campo[6][1] = $this->php->inverteData($this->validade_documento[$proponente][$documento]);
            $campo[7][0] = 'cadastrado_em';
            $campo[7][1] = date('Y-m-d H:i:s');
            $campo[8][0] = 'cadastrado_por';
            $campo[8][1] = $_SESSION['id_usuario_sistema'];
            
            $id_pendencia = $campo[0][1];

            $this->con1->executa('tb_pendencia_documentacao', $campo);
            
            $pendencia++;
            
            // RENOMEIA O ARQUIVO
            $endereco_autal_arquivo = $this->endereco_upload[$proponente][$documento];
            $arrEnderecoAtual = explode(".",$endereco_autal_arquivo);
            $arrEnderecoAtual2 = explode("/",$endereco_autal_arquivo);
            $extensao_arquivo = end($arrEnderecoAtual);
            $novo_endereco_arquivo = str_replace("." . $extensao_arquivo . "","_reprovado_" . $id_pendencia . "." . $extensao_arquivo,$endereco_autal_arquivo);
            $arrNovoEnderecoArquivo = explode("/",$novo_endereco_arquivo);

//            rename($arquivo_final,$endereco_arquivo.'_reprovado_'.$id_pendencia.$extensao);
//            unlink($arquivo_final);
?>
          <script>
       			$.getJSON('data/ajax/upload.php?search=',{url: '<?php echo $this->default_cliente_dommus . "/" . $arrEnderecoAtual2[3] . "/" . $arrEnderecoAtual2[4] . "/"; ?>', nome_arquivo: '<?php echo end($arrEnderecoAtual2); ?>', novo_nome: '<?php echo end($arrNovoEnderecoArquivo); ?>', documento: '<?php echo $documento; ?>', id: '<?php echo $proponente; ?>', id_processo: '<?php echo $this->id_processo; ?>', cliente: '<?php echo $this->default_cliente_dommus; ?>', servidor_arquivos: '<?php echo preg_replace("/" . $this->default_cliente_dommus . "./","",$this->default_servidor_arquivos); ?>', acao: 'rename', ajax: 'true'}, function(j){});
          </script>
<?php
            
          }
          next($arrAprovacao);
        }
        
        // REGISTRA A REGULARIDADE DO PROPONENTE
        $campo = null;
        $chave = null;

        $campo[0][0] = 'regularidade';
        if($this->regularidade[$proponente]){
          $campo[0][1] = $this->regularidade[$proponente];
        }else{
          $campo[0][1] = 'R';
        }

        $chave[0][0] = 'id';
        $chave[0][1] = $proponente;

        $this->con1->executa('tb_pessoa_fisica', $campo, $chave);
        
        // PENDENCIA A IRREGULARIDADE
        if($this->regularidade[$proponente] == 'I'){
          $pendencia++;
          $proponente_irregular++;
        }
        
        
        // PASSA PARA O PRÓXIMO PROPONENTE
        next($this->aprovacao_documento);
      }

      $campo = null;
      $chave = null;
      
      // APROVACAO
      if($pendencia == 0){

        // DADOS QUE SERÃO ALTERADOS NO BANCO
        $aux = 0;
        $campo[$aux][0] = 'observacao_documentacao';
        $campo[$aux][1] = $this->observacao;
        $aux++;
        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        if($this->pre_analise == 1){
          $campo[$aux][0] = 'evolucao';
          $campo[$aux][1] = 1;
          $aux++;
          $campo[$aux][0] = 'pre_analise';
          $campo[$aux][1] = 2;
          $aux++;
        }else{
          $campo[$aux][0] = 'evolucao';
          $campo[$aux][1] = 3;
          $aux++;
        }
        
        // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 11: DOCUMENTAÇÃO EM ANÁLISE | EVOLUÇÃO 14: DOCUMENTAÇÃO APROVADA
        $nova_etapa_workflow = null;
        // DOCUMENTAÇÃO EM ANÁLISE
        if($this->pre_analise == 1){
          $evolucao_etapa_workflow = 11;
        // DOCUMENTAÇÃO APROVADA
        }else{
          $evolucao_etapa_workflow = 14;
        }
        if($evolucao_etapa_workflow > 0){
          $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
          if($this->con1->nrows > 0){
            $this->con1->proxRegistro();
            $nova_etapa_workflow = $this->con1->data['id'];
            $campo[$aux][0]  = 'etapa_workflow';
            $campo[$aux][1]  = $nova_etapa_workflow;
            $aux++;
          }
        }

        // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_processo;

        // AÇÃO DE ALTERAÇÃO NO BANCO
        $this->con1->executa('tb_processo', $campo, $chave);


        // REGISTRA O CONTROLE DE SLA
        $data_registro_sla = date('Y-m-d H:i:s');

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
        $campo[1][0]   = 'processo';
        $campo[1][1]   = $this->id_processo;
        $campo[2][0]   = 'etapa_workflow';
        $campo[2][1]   = $nova_etapa_workflow;
        $campo[3][0]   = 'data_hora';
        $campo[3][1]   = $data_registro_sla;
        $campo[4][0]   = 'cadastrado_em';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'cadastrado_por';
        $campo[5][1]   = $_SESSION["id_usuario"];

        $this->con1->executa('tb_controle_sla', $campo);


        // LOG EVOLUTIVO
        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 6; // DOCUMENTAÇÃO APROVADA
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);
        
        
        // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
        $this->html->js('DOCUMENTAÇÃO APROVADA.\nVocê já pode realizar o envio para a Instituição Financeira.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTA=&id_processo=' . $this->id_processo);

      // PENDENCIAS
      }else{

        // DADOS QUE SERÃO ALTERADOS NO BANCO
        $aux = 0;
        $campo[$aux][0] = 'observacao_documentacao';
        $campo[$aux][1] = $this->observacao;
        $aux++;
        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $campo[$aux][0] = 'evolucao';
        $campo[$aux][1] = 2;
        $aux++;
        
        // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 13: DOCUMENTAÇÃO REPROVADA (IRREGULAR) | EVOLUÇÃO 12: DOCUMENTAÇÃO REPROVADA
        $nova_etapa_workflow = null;
        // DOCUMENTAÇÃO REPROVADA (IRREGULAR)
        if($proponente_irregular > 0){
          $evolucao_etapa_workflow = 13;
        // DOCUMENTAÇÃO REPROVADA
        }else{
          $evolucao_etapa_workflow = 12;
        }
        if($evolucao_etapa_workflow > 0){
          $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
          if($this->con1->nrows > 0){
            $this->con1->proxRegistro();
            $nova_etapa_workflow = $this->con1->data['id'];
            $campo[$aux][0]  = 'etapa_workflow';
            $campo[$aux][1]  = $nova_etapa_workflow;
            $aux++;
          }
        }

        // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_processo;

        // AÇÃO DE ALTERAÇÃO NO BANCO
        $this->con1->executa('tb_processo', $campo, $chave);
        
        
        // REGISTRA O CONTROLE DE SLA
        $data_registro_sla = date('Y-m-d H:i:s');

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
        $campo[1][0]   = 'processo';
        $campo[1][1]   = $this->id_processo;
        $campo[2][0]   = 'etapa_workflow';
        $campo[2][1]   = $nova_etapa_workflow;
        $campo[3][0]   = 'data_hora';
        $campo[3][1]   = $data_registro_sla;
        $campo[4][0]   = 'cadastrado_em';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'cadastrado_por';
        $campo[5][1]   = $_SESSION["id_usuario"];

        $this->con1->executa('tb_controle_sla', $campo);
        
        
        // LOG EVOLUTIVO
        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 5; // DOCUMENTAÇÃO REPROVADA
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);
        
        
        // CONSULTA OS DADOS DO PDV RESPONSÁVEL PELO PROCESSO, PARA O ENVIO DO E-MAIL
        $this->con1->consulta("SELECT tb_pessoa_fisica.nome, tb_sgg3_autenticacao.email as email_usuario
                               FROM tb_processo
                               LEFT JOIN tb_pessoa_fisica ON tb_processo.proponentes LIKE CONCAT('%#',tb_pessoa_fisica.id,'#%')
                               LEFT JOIN tb_sgg3_autenticacao ON tb_processo.cadastrado_por = tb_sgg3_autenticacao.id
                               WHERE tb_processo.id='" . $this->id_processo . "'");
        $this->con1->proxRegistro();
        
        $nome_cliente  = $this->con1->data['nome'];
        $email_usuario = $this->con1->data['email_usuario'];
        
        
        
        // =========== DISPARA O EMAIL DE CONFIRMAÇÃO DO CADASTRO E ENVIO DA SENHA ===========

        // INÍCIO DO HTML
        $message .= "<html>\n";
        $message .= "<head>\n";
        $message .= "<META content=\"text/html; charset=ISO-8859-1\" http-equiv=Content-Type>\n";
        $message .= "</head>\n";
        $message .= "<body leftmargin=\"0\" topmargin=\"0\">\n";
        $message .= "<table width=\"100%\" cellpadding=\"10\" cellspacing=\"0\" border=\"0\" style=\"font-family: verdana; font-size: 12px; line-height: 18px;\">\n";
        $message .= "<tr>\n";
        $message .= "<td>\n";
        $message .= "<b>Prezado,</b><br /><br />\n\n";
        $message .= "Informamos que o cadastro do cliente <b>" . $nome_cliente . "</b> teve sua documentação reprovada pelo Coban da <b>" . $this->default_nome_cliente . "</b> no processo <b>Nº " . $this->php->strZero($this->id_processo,5) . "</b>.<br /><br />\n\n";
        $message .= "Verifique a documentação do cliente e reencaminhe os documentos reprovados para uma reavaliação.<br /><br />\n\n";
        $message .= "Em caso de dúvidas entre em contato através do telelfone: " . $this->default_telefone_atendimento . ".<br /><br />\n\n";
        $message .= "Atenciosamente,<br /><br />\n\n";
        $message .= "<b><i>DEP. COBAN - " . $this->default_nome_cliente . "</i></b><br /><br />\n\n";
        $message .= "<b>Atenção:</b> Não responda a esta mensagem.<br />\n";
        $message .= "</td>\n";
        $message .= "</tr>\n";
        $message .= "</table>\n";
        $message .= "</body>\n";
        $message .= "</html>\n";
        // TERMINO DO HTML


        // DADOS DA MENSAGEM QUE SERÁ ENVIADA
        $nome_remetente  = "SISG3 " . $this->default_nome_cliente;
        $email_remetente = $this->default_email_disparo;
        $senha_remetente = "@Gsds1285";
        $servidor_smtp   = $this->default_servidor_smtp;

//        $destinatario = $this->email;
        $destinatario = "gregorduarte@gmail.com";
//        $destinatario_copia = "gregorduarte@gmail.com";

        $assunto = 'DOCUMENTAÇÃO REPROVADA';

      //  $mime_boundary = $empresa.md5(time());

        $headers = "MIME-Version: 1.1\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
      //  $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
        $headers .= "From: ".$nome_remetente."<".$email_remetente.">\n";
        $headers .= "Return-Path: ".$nome_remetente."<".$email_remetente.">\n";
        $headers .= "Reply-To: ".$nome_remetente."<".$email_remetente.">\n";
      //  $headers .= "Bcc: contato@g3comunicacao.com.br\n";
        // FIM DOS DADOS DA MENSAGEM QUE SERÁ ENVIADA


        // ENVIA A MENSAGEM VIA PHP MAILER
        require_once('data/classe/php_mailer/class.phpmailer.php');

        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->SMTPDebug = 1;
        $mailer->Port = 587;                                              // INDICA A PORTA DE CONEXÃO PARA A SAÍDA DE EMAILS
        $mailer->Host = 'smtp.g3server.com.br';
        $mailer->SMTPAuth = true;                                         // DEFINE SE HAVERÁ OU NÃO AUTENTICAÇÃO NO SMTP
        $mailer->SMTPSecure = "tls";                                      // sets the prefix to the servier
        $mailer->Username = $email_remetente;                             // ENDERECO DE EMAIL COMPLETO DO REMETENTE
        $mailer->Password = $senha_remetente;                             // SENHA DO EMAIL REMETENTE
        $mailer->FromName = $nome_remetente;                              // NOME DO REMETENTE A SER EXIBIDO
        $mailer->From = $email_remetente;                                 // OBRIGATÓRIO SER ENDERECO DE EMAIL COMPLETO DO REMETENTE
        $mailer->AddAddress($destinatario);                               // DESTINATÁRIOS
        $mailer->Subject = $assunto;                                      // ASSUNTO
        $mailer->Body = $message;                                         // CORPO DA MENSAGEM
        $mailer->IsHTML(true);                                            // DEFINE QUE O EMAIL SERÁ ENVIADI COMO HTML
        $mailer->CharSet = 'ISO-8859-1';                                  // CHARSET DA MENSAGEM (opcional)


        // DISPARA A MENSAGEM
/*        if(!$mailer->Send()){
          echo "A mensagem não pode ser enviada.";
          echo "Mailer Error: " . $mailer->ErrorInfo;
          die();
        }else{
          $campo = null;
          $chave = null;

          $campo[0][0] = 'id';
          $campo[0][1] = $this->con1->lastId('tb_log_envio_email', 'id');
          $campo[1][0] = 'id_usuario';
          $campo[1][1] = $id_autenticacao;
          $campo[2][0] = 'email';
          $campo[2][1] = $this->email;
          $campo[3][0] = 'data_hora_envio';
          $campo[3][1] = date('Y-m-d H:i:s');

          // AÇÃO DE ALTERAÇÃO NO BANCO
          $this->con1->executa('tb_log_envio_email', $campo);
        }             */
        
        
        // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
        $this->html->js('DOCUMENTAÇÃO COM PENDÊNCIAS.\nO corretor já foi informado.\nAguarde a regularização da documentação.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTA=&id_processo=' . $this->id_processo);

      }
      
    }
    
    
    function finalizaManutencao() {

      // REGISTRA A CONCLUSÃO DE UMA MANUTEÇÃO, CASO ELA EXISTA
      if($this->id_manutencao > 0){
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0] = 'concluido_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'concluido_por';
        $campo[$aux][1] = $_SESSION['id_usuario'];
        $aux++;

        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_manutencao;

        $this->con1->executa('tb_manutencao', $campo, $chave);

        
        // ATUALIZA O PROCESSO PARA SUBIR NA AGENDA DO OPERADOS DE COBAN, APÓS A ATUALIZAÇÃO DOS ARQUIVOS
        $campo = null;
        $chave = null;
        
        $aux = 0;
        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $_SESSION['id_usuario'];
        $aux++;

        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_processo;

//        $this->con1->executa('tb_processo', $campo, $chave);   // DESABILITADO EM 14/03/2018 - DEPENDENDO DO STATUS, PODE INFLUENCIAR O USUÁRIO PARECENDO QUE A ATUALIZAÇÃO SE DEVE AO STATUS E NÃO À MANUTENÇÃO
        
      }

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('MANUTENÇÃO FINALIZADA',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTA=&id_processo=' . $this->id_processo);
    }

/*--------------------------------------------------------------------*/


/*-------------------------REGISTRA ENTREVISTA DE PARECER TÉCNICO DE ANÁLISE DE CRÉDITO------------------------*/

    function registra_entrevista() {
    
      $this->con1->consulta("SELECT proponentes FROM tb_processo WHERE id='" . $this->id_processo . "'");
      $this->con1->proxRegistro();
      $this->proponentes = $this->con1->data['proponentes'];
      $arrProponentes = preg_split('/#/',$this->proponentes);
    
      for($i=1;$i<sizeOf($arrProponentes)-1;$i++){
      
        $this->con1->consulta("SELECT * FROM tb_entrevista WHERE id_processo='" . $this->id_processo . "' AND id_pessoa_fisica='" . $arrProponentes[$i] . "' AND status=1");
        // INSERE REGISTRO
        if($this->con1->nrows == 0){

          $campo = null;
          $chave = null;

          $aux = 0;

          $campo[$aux][0]   = 'id';
          $campo[$aux][1]   = $this->con1->lastId('tb_entrevista', 'id');
          $aux++;
          $campo[$aux][0]   = 'id_processo';
          $campo[$aux][1]   = $this->id_processo;
          $aux++;
          $campo[$aux][0]   = 'id_pessoa_fisica';
          $campo[$aux][1]   = $arrProponentes[$i];
          $aux++;
          $campo[$aux][0]   = 'carro';
          $campo[$aux][1]   = $this->carro_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'prestacao_carro';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_carro_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'prestacoes_carro';
          $campo[$aux][1]   = $this->prestacoes_carro_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'emprestimo';
          $campo[$aux][1]   = $this->emprestimo_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'prestacao_emprestimo';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_emprestimo_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'prestacoes_emprestimo';
          $campo[$aux][1]   = $this->prestacoes_emprestimo_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'consorcio';
          $campo[$aux][1]   = $this->consorcio_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'prestacao_consorcio';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_consorcio_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'prestacoes_consorcio';
          $campo[$aux][1]   = $this->prestacoes_consorcio_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'fies';
          $campo[$aux][1]   = $this->fies_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'prestacao_fies';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_fies_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'prestacoes_fies';
          $campo[$aux][1]   = $this->prestacoes_fies_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'cartao_credito';
          $campo[$aux][1]   = $this->cartao_credito_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'proxima_fatura';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->proxima_fatura_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'media_pagamentos';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->media_pagamentos_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'faturas_atraso';
          $campo[$aux][1]   = $this->faturas_atraso_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'parecer';
          $campo[$aux][1]   = $this->parecer_entrevista;
          $aux++;
          $campo[$aux][0]  = 'cadastrado_em';
          $campo[$aux][1]  = date('Y-m-d H:i:s');
          $aux++;
          $campo[$aux][0]  = 'cadastrado_por';
          $campo[$aux][1]  = $_SESSION["id_usuario"];
          $aux++;
          
          $this->con1->executa('tb_entrevista', $campo);
          
          
          // INSERE OS TIPOS DE RENDA DA PESSOA FÍSICA
          for($j=0;$j<sizeOf($this->tipo_renda_entrevista[$i]);$j++){
            if($this->tipo_renda_entrevista[$i][$j] && $this->valor_renda_entrevista[$i][$j]){

              $campo = null;
              $chave = null;
              
              $this->outra_profissao_entrevista[$i][$j] = array();

              $campo[0][0]   = 'id';
              $campo[0][1]   = $this->con1->lastId('tb_renda_entrevista', 'id');
              $campo[1][0]   = 'id_pessoa_fisica';
              $campo[1][1]   = $arrProponentes[$i];
              $campo[2][0]   = 'tipo_renda';
              $campo[2][1]   = $this->tipo_renda_entrevista[$i][$j];
              $campo[3][0]   = 'profissao';
              $campo[3][1]   = $this->profissao_entrevista[$i][$j];
              $campo[4][0]   = 'outra_profissao';
              $campo[4][1]   = $this->outra_profissao_entrevista[$i][$j];
              $campo[5][0]   = 'inicio_renda';
              $campo[5][1]   = $this->php->inverteData($this->inicio_renda_entrevista[$i][$j]);
              $campo[6][0]   = 'empresa';
              $campo[6][1]   = $this->empresa_entrevista[$i][$j];
              $campo[7][0]   = 'cargo';
              $campo[7][1]   = $this->cargo_entrevista[$i][$j];
              $campo[8][0]   = 'telefone_comercial';
              $campo[8][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial_entrevista[$i][$j]);
              $campo[9][0]   = 'ramal';
              $campo[9][1]   = $this->ramal_entrevista[$i][$j];
              $campo[10][0]  = 'valor_renda';
              $campo[10][1]  = str_replace(',','.',str_replace('.','',$this->valor_renda_entrevista[$i][$j]));
              $campo[11][0]  = 'cadastrado_em';
              $campo[11][1]  = date('Y-m-d H:i:s');
              $campo[12][0]  = 'cadastrado_por';
              $campo[12][1]  = $_SESSION["id_usuario"];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_renda_entrevista', $campo);

            }
          }
          
          
          // INSERE AS REFERÊNCIAS DA PESSOA FÍSICA
          for($j=0;$j<sizeOf($this->nome_referencia_entrevista[$i]);$j++){
            if($this->nome_referencia_entrevista[$i][$j] && $this->telefone_referencia_entrevista[$i][$j]){

              $campo = null;
              $chave = null;

              $campo[0][0]   = 'id';
              $campo[0][1]   = $this->con1->lastId('tb_referencia_entrevista', 'id');
              $campo[1][0]   = 'id_pessoa_fisica';
              $campo[1][1]   = $arrProponentes[$i];
              $campo[2][0]   = 'nome_referencia';
              $campo[2][1]   = trim($this->nome_referencia_entrevista[$i][$j]);
              $campo[3][0]   = 'telefone_referencia';
              $campo[3][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia_entrevista[$i][$j]);
              $campo[4][0]   = 'parentesco';
              $campo[4][1]   = $this->parentesco_entrevista[$i][$j];
              $campo[5][0]   = 'cadastrado_em';
              $campo[5][1]   = date('Y-m-d H:i:s');
              $campo[6][0]   = 'cadastrado_por';
              $campo[6][1]   = $_SESSION["id_usuario"];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_referencia_entrevista', $campo);

            }
          }
          

        // ALTERA REGISTRO
        }else{
          $this->con1->proxRegistro();
          $this->id_entrevista = $this->con1->data['id'];

          $campo = null;
          $chave = null;
          
          $aux = 0;

          $campo[$aux][0]   = 'carro';
          $campo[$aux][1]   = $this->carro_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'prestacao_carro';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_carro_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'prestacoes_carro';
          $campo[$aux][1]   = $this->prestacoes_carro_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'emprestimo';
          $campo[$aux][1]   = $this->emprestimo_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'prestacao_emprestimo';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_emprestimo_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'prestacoes_emprestimo';
          $campo[$aux][1]   = $this->prestacoes_emprestimo_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'consorcio';
          $campo[$aux][1]   = $this->consorcio_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'prestacao_consorcio';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_consorcio_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'prestacoes_consorcio';
          $campo[$aux][1]   = $this->prestacoes_consorcio_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'fies';
          $campo[$aux][1]   = $this->fies_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'prestacao_fies';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->prestacao_fies_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'prestacoes_fies';
          $campo[$aux][1]   = $this->prestacoes_fies_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'cartao_credito';
          $campo[$aux][1]   = $this->cartao_credito_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'proxima_fatura';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->proxima_fatura_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'media_pagamentos';
          $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->media_pagamentos_entrevista[$i]));
          $aux++;
          $campo[$aux][0]   = 'faturas_atraso';
          $campo[$aux][1]   = $this->faturas_atraso_entrevista[$i];
          $aux++;
          $campo[$aux][0]   = 'parecer';
          $campo[$aux][1]   = $this->parecer_entrevista;
          $aux++;
          $campo[$aux][0]  = 'atualizado_em';
          $campo[$aux][1]  = date('Y-m-d H:i:s');
          $aux++;
          $campo[$aux][0]  = 'atualizado_por';
          $campo[$aux][1]  = $_SESSION["id_usuario"];
          $aux++;

          $chave[0][0] = 'id';
          $chave[0][1] = $this->id_entrevista;

          $this->con1->executa('tb_entrevista', $campo, $chave);
          
          
          // LIMPA OS REGISTROS ANTERIORES DA RENDA
          $this->con1->execSql("","UPDATE tb_renda_entrevista SET status=0 WHERE id_pessoa_fisica='" . $arrProponentes[$i] . "'");
          
          // INSERE OS TIPOS DE RENDA DA PESSOA FÍSICA
          for($j=0;$j<sizeOf($this->tipo_renda_entrevista[$i]);$j++){
            if($this->tipo_renda_entrevista[$i][$j] && $this->valor_renda_entrevista[$i][$j]){

              $campo = null;
              $chave = null;
              
              $this->outra_profissao_entrevista[$i][$j] = array();

              $campo[0][0]   = 'id';
              $campo[0][1]   = $this->con1->lastId('tb_renda_entrevista', 'id');
              $campo[1][0]   = 'id_pessoa_fisica';
              $campo[1][1]   = $arrProponentes[$i];
              $campo[2][0]   = 'tipo_renda';
              $campo[2][1]   = $this->tipo_renda_entrevista[$i][$j];
              $campo[3][0]   = 'profissao';
              $campo[3][1]   = $this->profissao_entrevista[$i][$j];
              $campo[4][0]   = 'outra_profissao';
              $campo[4][1]   = $this->outra_profissao_entrevista[$i][$j];
              $campo[5][0]   = 'inicio_renda';
              $campo[5][1]   = $this->php->inverteData($this->inicio_renda_entrevista[$i][$j]);
              $campo[6][0]   = 'empresa';
              $campo[6][1]   = $this->empresa_entrevista[$i][$j];
              $campo[7][0]   = 'cargo';
              $campo[7][1]   = $this->cargo_entrevista[$i][$j];
              $campo[8][0]   = 'telefone_comercial';
              $campo[8][1]   = preg_replace("/[^0-9]/","",$this->telefone_comercial_entrevista[$i][$j]);
              $campo[9][0]   = 'ramal';
              $campo[9][1]   = $this->ramal_entrevista[$i][$j];
              $campo[10][0]  = 'valor_renda';
              $campo[10][1]  = str_replace(',','.',str_replace('.','',$this->valor_renda_entrevista[$i][$j]));
              $campo[11][0]  = 'cadastrado_em';
              $campo[11][1]  = date('Y-m-d H:i:s');
              $campo[12][0]  = 'cadastrado_por';
              $campo[12][1]  = $_SESSION["id_usuario"];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_renda_entrevista', $campo);

            }
          }
          
          
          // LIMPA OS REGISTROS DE REFERÊNCIAS ANTERIORES
          $this->con1->execSql("","UPDATE tb_referencia_entrevista SET status=0 WHERE id_pessoa_fisica='" . $arrProponentes[$i] . "'");
          
          // INSERE AS REFERÊNCIAS DA PESSOA FÍSICA
          for($j=0;$j<sizeOf($this->nome_referencia_entrevista[$i]);$j++){
            if($this->nome_referencia_entrevista[$i][$j] && $this->telefone_referencia_entrevista[$i][$j]){

              $campo = null;
              $chave = null;

              $campo[0][0]   = 'id';
              $campo[0][1]   = $this->con1->lastId('tb_referencia_entrevista', 'id');
              $campo[1][0]   = 'id_pessoa_fisica';
              $campo[1][1]   = $arrProponentes[$i];
              $campo[2][0]   = 'nome_referencia';
              $campo[2][1]   = trim($this->nome_referencia_entrevista[$i][$j]);
              $campo[3][0]   = 'telefone_referencia';
              $campo[3][1]   = preg_replace("/[^0-9]/","",$this->telefone_referencia_entrevista[$i][$j]);
              $campo[4][0]   = 'parentesco';
              $campo[4][1]   = $this->parentesco_entrevista[$i][$j];
              $campo[5][0]   = 'cadastrado_em';
              $campo[5][1]   = date('Y-m-d H:i:s');
              $campo[6][0]   = 'cadastrado_por';
              $campo[6][1]   = $_SESSION["id_usuario"];

              // AÇÃO DE ALTERAÇÃO NO BANCO
              $this->con1->executa('tb_referencia_entrevista', $campo);

            }
          }
          

        } // FIM ALTERA REGISTRO

        
      } // FIM LOOP PROPONENTES
      



      // LOG EVOLUTIVO

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = '48'; // ENTREVISTA PROPONENTES - PARECER DE ANÁLISE TÉCNICA
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

//      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('ENTREVISTA REGISTRADA COM SUCESSO.',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }

/*--------------------------------------------------------------------*/


/*-------------------------REGISTRA DADOS DO FINANCIAMENTO------------------------*/

    function registraFinanciamentoReserva() {
    
      $campo = null;
      $chave = null;
    
      $aux = 0;

      $campo[$aux][0] = 'nivel_pre_venda';
      $campo[$aux][1] = 1;
      $aux++;
      $campo[$aux][0] = 'fgts_aprovado';
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->fgts_reserva));
      $aux++;
      $campo[$aux][0] = 'subsidio_aprovado';
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->subsidio_reserva));
      $aux++;
      $campo[$aux][0] = 'valor_financiamento';
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->financiamento_reserva));
      $aux++;
      $campo[$aux][0] = 'valor_avaliacao';
      $campo[$aux][1] = $this->valor_avaliacao;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 2: RESERVA INICIADA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 2;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }
      
      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      
      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('A RESERVA DO IMÓVEL FOI INICIADA.\n\nPROSSIGA COM A NEGOCIAÇÃO DE PAGAMENTO.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTI=&id_processo=' . $this->id_processo);

    }
    
    
    function liberarReserva() {

      $campo = null;
      $chave = null;

      $aux = 0;

      $campo[$aux][0] = 'nivel_pre_venda';
      $campo[$aux][1] = 0;
      $aux++;
      $campo[$aux][0] = 'fgts_aprovado';
      $campo[$aux][1] = '';
      $aux++;
      $campo[$aux][0] = 'subsidio_aprovado';
      $campo[$aux][1] = '';
      $aux++;
      $campo[$aux][0] = 'valor_financiamento';
      $campo[$aux][1] = '';
      $aux++;
      $campo[$aux][0] = 'valor_avaliacao';
      $campo[$aux][1] = '';
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 1: AGUARDANDO DOCUMENTAÇÃO
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 1;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('RESERVA LIBERADA.\n\nO STATUS do processo foi alterado para AGUARDANDO DOCUMENTAÇÃO.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    
    function cancelarReserva() {

      $campo = null;
      $chave = null;
      
      // VERIFICA SE EXISTE DESCONTO NA UNIDADE PARA RETORNAR O VALOR ORIGINAL DA MESMA
      $this->con1->consulta("SELECT valor_desconto FROM tb_processo WHERE id='" . $this->id_processo . "'");
      $this->con1->proxRegistro();
      
      $valor_desconto = $this->con1->data['valor_desconto'];

      $aux = 0;

      $campo[$aux][0] = 'nivel_pre_venda';
      $campo[$aux][1] = 0;
      $aux++;

      $campo[$aux][0] = 'aprovacao_banco';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'fgts_aprovado';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'subsidio_aprovado';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'valor_financiamento';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'parcela_financiamento';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'prazo_financiamento';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'custas_registro';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'valor_avaliacao_simulado';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'renda_bruta';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'renda_validada';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'tabela_financiamento';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'desconto_financiamento';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'justificativa_reprovacao';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'aprovacao_contrato';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'data_venda';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'sinal_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_sinal';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'pre_chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelas_pre_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_pre_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'detalhamento_pre_chaves';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'intermediarias_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelas_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'periodicidade_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'detalhamento_intermediarias';
      $campo[$aux][1] = 'N';
      $aux++;
      
      $campo[$aux][0] = 'subsidio_estadual';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_subsidio_estadual';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'pos_chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelas_pos_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_pos_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'mensal_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelamento_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'detalhamento_custas';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'periodicidade_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'juros_custas';
      $campo[$aux][1] = 'S';
      $aux++;
      
      if($valor_desconto > 0){
        $campo[$aux][0] = 'id_desconto';
        $campo[$aux][1] = 'null';
        $aux++;

        $campo[$aux][0] = 'codigo_desconto';
        $campo[$aux][1] = 'null';
        $aux++;
        
        $campo[$aux][0] = 'percentual_desconto';
        $campo[$aux][1] = 'null';
        $aux++;
        
        $campo[$aux][0] = 'valor_desconto';
        $campo[$aux][1] = 'null';
        $aux++;
      }

      $campo[$aux][0] = 'condicao_especial';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'texto_condicao_especial';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'justificativa_condicao_especial';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'exige_avalista';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;

      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;

      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 0;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 1: AGUARDANDO DOCUMENTAÇÃO
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 1;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);

      // EXCLUI DETALHAENTOS DESSE PROCESSO CASO HAJAM
      $this->con1->execSql("","DELETE FROM tb_detalhamento_parcelas WHERE processo='" . $this->id_processo . "'");
      
      // EXCLUI DETALHAENTOS DA PRÉ-VENDA DESSE PROCESSO CASO HAJAM
      $this->con1->execSql("","DELETE FROM tb_detalhamento_parcelas_pre_venda WHERE processo='" . $this->id_processo . "'");

      // EXCLUI AVALISTAS DESSE PROCESSO CASO HAJAM
      $this->con1->execSql("","DELETE FROM tb_avalista WHERE processo='" . $this->id_processo . "'");

      // LIBERA A UNIDADE DE INTERESSE
      if($this->unidade_interesse_cancelamento){
        $campo = null;
        $chave = null;

        $campo[0][0] = 'disponibilidade';
        $campo[0][1] = 'D';

        $chave[0][0] = 'id';
        $chave[0][1] = $this->unidade_interesse_cancelamento;

        $this->con1->executa('tb_unidade',$campo,$chave);
      }


      // REGISTRA O CANCELAMENTO
      $campo = null;
      $chave = null;

      $campo[0][0] = 'id';
      $campo[0][1] = $this->con1->lastId('tb_cancelamento_processo','id');
      $campo[1][0] = 'tipo';
      $campo[1][1] = 'I';
      $campo[2][0] = 'processo';
      $campo[2][1] = $this->id_processo;
      $campo[3][0] = 'motivo';
      $campo[3][1] = $this->motivo_cancelamento;
      $campo[4][0] = 'descricao';
      $campo[4][1] = $this->descricao_cancelamento;
      $campo[5][0] = 'data_hora';
      $campo[5][1] = date('Y-m-d H:i:s');

      $this->con1->executa('tb_cancelamento_processo',$campo);


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 80; // CANCELAMENTO DE INSTRUMENTO DE RESERVA
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);



      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
?>
      <script>
        alert("INSTRUMENTO DE RESERVA CANCELADO. A UNIDADE FOI LIBERADA.");
        parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=MQ==&id_processo=' . $this->id_processo; ?>";
      </script>
<?php

    }
    
    
    function continuarReserva() {
    
      // TRANSFERE OS DADOS DE FINANCIAMENTO E NEGOCIACAO EM UMA TABELA DE RESERVAS
      $this->con1->consulta("SELECT * FROM tb_processo WHERE id='" . $this->id_processo . "'");
      $this->con1->proxRegistro();

      $campo = null;
      $chave = null;
      
      $aux = 0;
      $campo[$aux][0]  = 'id';
      $campo[$aux][1]  = $this->con1->lastId('tb_pre_venda','id');
      $aux++;
      $campo[$aux][0]  = 'processo';
      $campo[$aux][1]  = $this->id_processo;
      $aux++;
      $campo[$aux][0]  = 'fgts_aprovado';
      $campo[$aux][1]  = $this->con1->data['fgts_aprovado'];
      $aux++;
      $campo[$aux][0]  = 'subsidio_aprovado';
      $campo[$aux][1]  = $this->con1->data['subsidio_aprovado'];
      $aux++;
      $campo[$aux][0]  = 'valor_financiamento';
      $campo[$aux][1]  = $this->con1->data['valor_financiamento'];
      $aux++;
      $campo[$aux][0]  = 'valor_avaliacao';
      $campo[$aux][1]  = $this->con1->data['valor_avaliacao'];
      $aux++;
      $campo[$aux][0]  = 'sinal_prosoluto';
      $campo[$aux][1]  = $this->con1->data['sinal_prosoluto'];
      $aux++;
      $campo[$aux][0]  = 'vencimento_sinal';
      $campo[$aux][1]  = $this->con1->data['vencimento_sinal'];
      $aux++;
      $campo[$aux][0]  = 'pre_chaves_prosoluto';
      $campo[$aux][1]  = $this->con1->data['pre_chaves_prosoluto'];
      $aux++;
      $campo[$aux][0]  = 'parcelas_pre_chaves';
      $campo[$aux][1]  = $this->con1->data['parcelas_pre_chaves'];
      $aux++;
      $campo[$aux][0] = 'vencimento_pre_chaves';
      $campo[$aux][1] = $this->con1->data['vencimento_pre_chaves'];
      $aux++;
      $campo[$aux][0] = 'detalhamento_pre_chaves';
      $campo[$aux][1] = $this->con1->data['detalhamento_pre_chaves'];
      $aux++;
      $campo[$aux][0] = 'intermediarias_prosoluto';
      $campo[$aux][1] = $this->con1->data['intermediarias_prosoluto'];
      $aux++;
      $campo[$aux][0] = 'parcelas_intermediarias';
      $campo[$aux][1] = $this->con1->data['parcelas_intermediarias'];
      $aux++;
      $campo[$aux][0] = 'vencimento_intermediarias';
      $campo[$aux][1] = $this->con1->data['vencimento_intermediarias'];
      $aux++;
      $campo[$aux][0] = 'detalhamento_intermediarias';
      $campo[$aux][1] = $this->con1->data['detalhamento_intermediarias'];
      $aux++;
      $campo[$aux][0] = 'periodicidade_intermediarias';
      $campo[$aux][1] = $this->con1->data['periodicidade_intermediarias'];
      $aux++;
    if($this->subsidio_estadual > 0){
      $campo[$aux][0] = 'subsidio_estadual';
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->subsidio_estadual));
      $aux++;
      $campo[$aux][0] = 'vencimento_subsidio_estadual';
      $campo[$aux][1] = $this->php->inverteData($this->vencimento_subsidio);
      $aux++;
    }
      $campo[$aux][0] = 'chaves_prosoluto';
      $campo[$aux][1] = $this->con1->data['chaves_prosoluto'];
      $aux++;
      $campo[$aux][0] = 'vencimento_chaves';
      $campo[$aux][1] = $this->con1->data['vencimento_chaves'];
      $aux++;
      $campo[$aux][0] = 'pos_chaves_prosoluto';
      $campo[$aux][1] = $this->con1->data['pos_chaves_prosoluto'];
      $aux++;
      $campo[$aux][0] = 'parcelas_pos_chaves';
      $campo[$aux][1] = $this->con1->data['parcelas_pos_chaves'];
      $aux++;
      $campo[$aux][0] = 'vencimento_pos_chaves';
      $campo[$aux][1] = $this->con1->data['vencimento_pos_chaves'];
      $aux++;
      $campo[$aux][0] = 'mensal_custas';
      $campo[$aux][1] = $this->con1->data['mensal_custas'];
      $aux++;
      $campo[$aux][0] = 'parcelamento_custas';
      $campo[$aux][1] = $this->con1->data['parcelamento_custas'];
      $aux++;
      $campo[$aux][0] = 'vencimento_custas';
      $campo[$aux][1] = $this->con1->data['vencimento_custas'];
      $aux++;
      $campo[$aux][0] = 'detalhamento_custas';
      $campo[$aux][1] = $this->con1->data['detalhamento_custas'];
      $aux++;
      $campo[$aux][0] = 'periodicidade_custas';
      $campo[$aux][1] = $this->con1->data['periodicidade_custas'];
      $aux++;
      $campo[$aux][0] = 'juros_custas';
      $campo[$aux][1] = $this->con1->data['juros_custas'];
      $aux++;
      $campo[$aux][0] = 'condicao_especial';
      $campo[$aux][1] = $this->con1->data['condicao_especial'];
      $aux++;
      $campo[$aux][0] = 'texto_condicao_especial';
      $campo[$aux][1] = $this->con1->data['texto_condicao_especial'];
      $aux++;
      $campo[$aux][0] = 'justificativa_condicao_especial';
      $campo[$aux][1] = $this->con1->data['justificativa_condicao_especial'];
      $aux++;
      $campo[$aux][0] = 'exige_avalista';
      $campo[$aux][1] = $this->con1->data['exige_avalista'];
      $aux++;
      $campo[$aux][0] = 'aprovacao_avalista';
      $campo[$aux][1] = $this->con1->data['aprovacao_avalista'];
      $aux++;
      $campo[$aux][0] = 'cadastrado_em';
      $campo[$aux][1] = $this->con1->data['cadastrado_em'];
      $aux++;
      $campo[$aux][0] = 'cadastrado_por';
      $campo[$aux][1] = $this->con1->data['cadastrado_por'];
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = $this->con1->data['cadastrado_em'];
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $this->con1->data['cadastrado_por'];
      $aux++;

      $this->con1->executa('tb_pre_venda',$campo);
      
      
      // TRANSFERE OS DADOS DO DETALHAMENTO DE PARCELAS PARA A TABELA ESPECÍFICA DA PRÉ VENDA
      $this->con1->consulta("SELECT * FROM tb_detalhamento_parcelas WHERE processo='" . $this->id_processo . "' ORDER BY id");
      while($this->con1->proxRegistro()){

        $campo = null;
        $chave = null;

        $campo[0][0] = 'id';
        $campo[0][1] = $this->con1->lastid('tb_detalhamento_parcelas_pre_venda','id');
        $campo[1][0] = 'processo';
        $campo[1][1] = $this->id_processo;
        $campo[2][0] = 'tipo_parcela';
        $campo[2][1] = $this->con1->data['tipo_parcela'];
        $campo[3][0] = 'valor';
        $campo[3][1] = $this->con1->data['valor'];
        $campo[4][0] = 'parcelas';
        $campo[4][1] = $this->con1->data['parcelas'];
        $campo[5][0] = 'vencimento';
        $campo[5][1] = $this->con1->data['vencimento'];

        $this->con1->executa('tb_detalhamento_parcelas_pre_venda',$campo);

      }

      $campo = null;
      $chave = null;

      $aux = 0;

      $campo[$aux][0] = 'nivel_pre_venda';
      $campo[$aux][1] = 3;
      $aux++;
      $campo[$aux][0]  = 'aprovacao_banco';
      $campo[$aux][1]  = 'null';
      $aux++;
      $campo[$aux][0]  = 'fgts_aprovado';
      $campo[$aux][1]  = 'null';
      $aux++;
      $campo[$aux][0]  = 'subsidio_aprovado';
      $campo[$aux][1]  = 'null';
      $aux++;
      $campo[$aux][0]  = 'valor_financiamento';
      $campo[$aux][1]  = 'null';
      $aux++;
      $campo[$aux][0]  = 'aprovacao_contrato';
      $campo[$aux][1]  = 'null';
      $aux++;
      $campo[$aux][0]  = 'sinal_prosoluto';
      $campo[$aux][1]  = 'null';
      $aux++;
      $campo[$aux][0]  = 'vencimento_sinal';
      $campo[$aux][1]  = 'null';
      $aux++;
      $campo[$aux][0]  = 'pre_chaves_prosoluto';
      $campo[$aux][1]  = 'null';
      $aux++;
      $campo[$aux][0]  = 'parcelas_pre_chaves';
      $campo[$aux][1]  = 'null';
      $aux++;
      $campo[$aux][0] = 'vencimento_pre_chaves';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'detalhamento_pre_chaves';
      $campo[$aux][1] = 'N';
      $aux++;
      $campo[$aux][0] = 'intermediarias_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'parcelas_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'vencimento_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'detalhamento_intermediarias';
      $campo[$aux][1] = 'N';
      $aux++;
      $campo[$aux][0] = 'periodicidade_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'subsidio_estadual';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'vencimento_chaves';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'pos_chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'parcelas_pos_chaves';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'vencimento_pos_chaves';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'mensal_custas';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'parcelamento_custas';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'vencimento_custas';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'detalhamento_custas';
      $campo[$aux][1] = 'N';
      $aux++;
      $campo[$aux][0] = 'periodicidade_custas';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'juros_custas';
      $campo[$aux][1] = 'S';
      $aux++;
      $campo[$aux][0] = 'condicao_especial';
      $campo[$aux][1] = 'N';
      $aux++;
      $campo[$aux][0] = 'texto_condicao_especial';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'justificativa_condicao_especial';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'exige_avalista';
      $campo[$aux][1] = 'N';
      $aux++;
      $campo[$aux][0] = 'aprovacao_avalista';
      $campo[$aux][1] = 'null';
      $aux++;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 0;
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION['id_usuario'];
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 9: CONTINUIDADE DA VENDA AUTORIZADA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 9;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 51; // CONTINUIDADE DE VENDA
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('CONINUIDADE DE VENDA REGISTRADA.\n\nO STATUS do processo foi alterado para AGUARDANDO DOCUMENTAÇÃO e enviado ao PDV.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }


    function registra_financiamento() {
    
      // CONSULTA A INSTITUIÇÃO DE FINANCIAMENTO
      $this->con1->consulta("SELECT instituicao_financiamento FROM tb_processo WHERE id='" . $this->id_processo . "'");
      $this->con1->proxRegistro();
      
      $instituicao_financiamento = $this->con1->data['instituicao_financiamento'];

      $campo = null;
      $chave = null;
      
      $aux = 0;
      
      $campo[$aux][0] = 'aprovacao_banco';
      $campo[$aux][1] = $this->aprovacao_banco;
      $aux++;
      $campo[$aux][0] = 'fgts_aprovado';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->fgts_aprovado));
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;
      $campo[$aux][0] = 'subsidio_aprovado';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->subsidio_aprovado));
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;
      $campo[$aux][0] = 'valor_financiamento';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_financiamento));
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;
      $campo[$aux][0] = 'parcela_financiamento';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->parcela_financiamento));
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;
      $campo[$aux][0] = 'prazo_financiamento';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = $this->prazo_financiamento;
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;
      $campo[$aux][0] = 'custas_registro';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->custas_registro));
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'valor_avaliacao';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_avaliacao));
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'valor_avaliacao_simulado';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_avaliacao_simulado));
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'tabela_financiamento';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = $this->tabela_financiamento;
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;
      $campo[$aux][0] = 'desconto_financiamento';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = $this->desconto_financiamento;
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'renda_bruta';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->renda_bruta));
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'renda_validada';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->renda_validada));
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'justificativa_reprovacao';
    if($this->aprovacao_banco == 'A'){
      $campo[$aux][1] = 'null';
    }else if($this->aprovacao_banco == 'R'){
      $campo[$aux][1] = $this->justificativa_reprovacao;
      $aux++;
    }
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 5;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 17: APROVADO PELA INSTITUIÇÃO FINANCEIRA | EVOLUÇÃO 16: REPROVADO PELA INSTITUIÇÃO FINANCEIRA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = null;
      if($this->aprovacao_banco == 'A'){
        $evolucao_etapa_workflow = 17;
      }else if($this->aprovacao_banco == 'R'){
        $evolucao_etapa_workflow = 16;
      }
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }
      
      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // INSERE O REGISTRO NA TABELA DE AVALIAÇÃO DE FINANCIAMENTO
      if(!$this->id_avaliacao_financiamento){
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0]  = 'id';
        $campo[$aux][1]  = $this->con1->lastId('tb_avaliacao_financiamento','id');
        $aux++;
        $campo[$aux][0]  = 'processo';
        $campo[$aux][1]  = $this->id_processo;
        $aux++;
        $campo[$aux][0]  = 'banco';
        $campo[$aux][1]  = $instituicao_financiamento;
        $aux++;
        $campo[$aux][0]  = 'aprovacao_banco';
        $campo[$aux][1] = $this->aprovacao_banco;
        $aux++;
        if($this->aprovacao_banco == 'A'){
          $campo[$aux][0]  = 'fgts_aprovado';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->fgts_aprovado));
          $aux++;
          $campo[$aux][0]  = 'subsidio_aprovado';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->subsidio_aprovado));
          $aux++;
          $campo[$aux][0]  = 'valor_financiamento';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_financiamento));
          $aux++;
          $campo[$aux][0]  = 'parcela_financiamento';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->parcela_financiamento));
          $aux++;
          $campo[$aux][0]  = 'prazo_financiamento';
          $campo[$aux][1] = $this->prazo_financiamento;
          $aux++;
          $campo[$aux][0]  = 'custas_registro';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->custas_registro));
          $aux++;
          $campo[$aux][0] = 'valor_avaliado';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_avaliacao));
          $aux++;
          $campo[$aux][0] = 'renda_bruta';
          if($this->aprovacao_banco == 'A'){
            $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->renda_bruta));
          }else{
            $campo[$aux][1] = 'null';
          }
          $aux++;
          $campo[$aux][0] = 'renda_validada';
          if($this->aprovacao_banco == 'A'){
            $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->renda_validada));
          }else{
            $campo[$aux][1] = 'null';
          }
          $aux++;
          $campo[$aux][0] = 'tabela_financiamento';
          if($this->aprovacao_banco == 'A'){
            $campo[$aux][1] = $this->tabela_financiamento;
          }else{
            $campo[$aux][1] = 'null';
          }
          $aux++;
          $campo[$aux][0] = 'desconto_financiamento';
          if($this->aprovacao_banco == 'A'){
            $campo[$aux][1] = $this->desconto_financiamento;
          }else{
            $campo[$aux][1] = 'null';
          }
          $aux++;
        }
        $campo[$aux][0] = 'cadastrado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'cadastrado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        
        $id_avaliacao_financiamento = $campo[0][1];

        $this->con1->executa('tb_avaliacao_financiamento',$campo);
        
        
        // ATUALIZA O id_valaiacao_finanaciamento NA TABELA DO PROCESSO
        $campo = null;
        $chave = null;
        
        $campo[0][0] = 'avaliacao_financiamento';
        $campo[0][1] = $id_avaliacao_financiamento;
        
        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_processo;

        $this->con1->executa('tb_processo', $campo, $chave);
        
      }else{
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0]  = 'banco';
        $campo[$aux][1]  = $instituicao_financiamento;
        $aux++;
        $campo[$aux][0]  = 'aprovacao_banco';
        $campo[$aux][1] = $this->aprovacao_banco;
        $aux++;
        if($this->con1->data['aprovacao_banco'] == 'A'){
          $campo[$aux][0]  = 'fgts_aprovado';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->fgts_aprovado));
          $aux++;
          $campo[$aux][0]  = 'subsidio_aprovado';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->subsidio_aprovado));
          $aux++;
          $campo[$aux][0]  = 'valor_financiamento';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_financiamento));
          $aux++;
          $campo[$aux][0]  = 'parcela_financiamento';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->parcela_financiamento));
          $aux++;
          $campo[$aux][0]  = 'prazo_financiamento';
          $campo[$aux][1] = $this->prazo_financiamento;
          $aux++;
          $campo[$aux][0]  = 'custas_registro';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->custas_registro));
          $aux++;
          $campo[$aux][0] = 'valor_avaliado';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_avaliacao));
          $aux++;
          $campo[$aux][0] = 'renda_bruta';
          if($this->aprovacao_banco == 'A'){
            $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->renda_bruta));
          }else{
            $campo[$aux][1] = 'null';
          }
          $aux++;
          $campo[$aux][0] = 'renda_validada';
          if($this->aprovacao_banco == 'A'){
            $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->renda_validada));
          }else{
            $campo[$aux][1] = 'null';
          }
          $aux++;
          $campo[$aux][0] = 'tabela_financiamento';
          if($this->aprovacao_banco == 'A'){
            $campo[$aux][1] = $this->tabela_financiamento;
          }else{
            $campo[$aux][1] = 'null';
          }
          $aux++;
          $campo[$aux][0] = 'desconto_financiamento';
          if($this->aprovacao_banco == 'A'){
            $campo[$aux][1] = $this->desconto_financiamento;
          }else{
            $campo[$aux][1] = 'null';
          }
          $aux++;
        }
        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        
        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_avaliacao_financiamento;

        $this->con1->executa('tb_avaliacao_financiamento',$campo,$chave);
      }
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      if($this->aprovacao_banco == 'A'){

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 10; // INCLUSÃO/EDIÇÃO DE DADOS DE AVALIAÇÃO DE FINANCIAMENTO
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);
      
      }else if($this->aprovacao_banco == 'R'){

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 8; // REPROVADO PELA INSTITUIÇÃO FINANCEIRA
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);

      }
      
      
      
      /* REGISTRA FORMULÁRIOS */
      
      // BANCO DO BRASIL
      if($instituicao_financiamento == 1){
      
      $campo = null;
      $chave = null;
      
      $aux = 0;      
      
      // FORMULÁRIO 1
      $this->con1->consulta("SELECT id FROM tb_formulario1 WHERE id_processo='" . $this->id_processo . "' AND status=1");
      if($this->con1->nrows > 0){
        // ALTERA O REGISTRO
        
        $this->con1->proxRegistro();
        
        $campo[$aux][0] = 'agencia';
        $campo[$aux][1] = $this->agencia;
        $aux++;
        $campo[$aux][0] = 'conta_corrente';
        $campo[$aux][1] = $this->conta_corrente;
        $aux++;
        $campo[$aux][0] = 'numero_proposta';
        $campo[$aux][1] = $this->numero_proposta;
        $aux++;
        $campo[$aux][0] = 'p1_compoe_renda';
        $campo[$aux][1] = $this->p1_compoe_renda;
        $aux++;
        $campo[$aux][0] = 'p1_nome_conjuge';
        $campo[$aux][1] = $this->p1_nome_conjuge;
        $aux++;
        $campo[$aux][0] = 'p1_cpf_conjuge';
        $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->p1_cpf_conjuge);
        $aux++;
        $campo[$aux][0] = 'p1_estado_civil_conjuge';
        $campo[$aux][1] = $this->p1_estado_civil_conjuge;
        $aux++;
        $campo[$aux][0] = 'p2_nome_conjuge';
        $campo[$aux][1] = $this->p2_nome_conjuge;
        $aux++;
        $campo[$aux][0] = 'p2_cpf_conjuge';
        $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->p2_cpf_conjuge);
        $aux++;
        $campo[$aux][0] = 'p2_estado_civil_conjuge';
        $campo[$aux][1] = $this->p2_estado_civil_conjuge;
        $aux++;
        $campo[$aux][0] = 'p3_nome_conjuge';
        $campo[$aux][1] = $this->p3_nome_conjuge;
        $aux++;
        $campo[$aux][0] = 'p3_cpf_conjuge';
        $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->p3_cpf_conjuge);
        $aux++;
        $campo[$aux][0] = 'p3_estado_civil_conjuge';
        $campo[$aux][1] = $this->p3_estado_civil_conjuge;
        $aux++;
        $campo[$aux][0] = 'possui_compromissos';
        $campo[$aux][1] = $this->possui_compromissos;
        $aux++;
        $campo[$aux][0] = 'custos_certidoes';
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->custos_certidoes));
        $aux++;
        $campo[$aux][0] = 'itbi';
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->itbi));
        $aux++;
        $campo[$aux][0] = 'registro_cartorario';
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->registro_cartorario));
        $aux++;
        $campo[$aux][0] = 'dia_pagamento_parcela';
        $campo[$aux][1] = $this->dia_pagamento_parcela;
        $aux++;
        $campo[$aux][0] = 'possui_vaga';
        $campo[$aux][1] = $this->possui_vaga;
        $aux++;
        $campo[$aux][0] = 'quantidade_vagas';
        $campo[$aux][1] = $this->quantidade_vagas;
        $aux++;
        $campo[$aux][0] = 'matricula_garagem';
        $campo[$aux][1] = $this->matricula_garagem;
        $aux++;
        $campo[$aux][0] = 'pergunta1';
        $campo[$aux][1] = $this->pergunta1;
        $aux++;
        $campo[$aux][0] = 'pergunta2';
        $campo[$aux][1] = $this->pergunta2;
        $aux++;
        $campo[$aux][0] = 'pergunta3';
        $campo[$aux][1] = $this->pergunta3;
        $aux++;
        $campo[$aux][0] = 'pergunta4';
        $campo[$aux][1] = $this->pergunta4;
        $aux++;
        $campo[$aux][0] = 'pergunta5';
        $campo[$aux][1] = $this->pergunta5;
        $aux++;
        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        
        $chave[0][0] = 'id';
        $chave[0][1] = $this->con1->data['id'];
        
        $id_formulario1 = $this->con1->data['id'];
  
        $this->con1->executa('tb_formulario1', $campo, $chave);
        
      }else{
        // INSERE UM NOVO REGISTRO
        
        $campo[$aux][0] = 'id';
        $campo[$aux][1] = $this->con1->lastId('tb_formulario1', 'id');
        $aux++;
        $campo[$aux][0] = 'id_processo';
        $campo[$aux][1] = $this->id_processo;
        $aux++;
        $campo[$aux][0] = 'agencia';
        $campo[$aux][1] = $this->agencia;
        $aux++;
        $campo[$aux][0] = 'conta_corrente';
        $campo[$aux][1] = $this->conta_corrente;
        $aux++;
        $campo[$aux][0] = 'numero_proposta';
        $campo[$aux][1] = $this->numero_proposta;
        $aux++;
        $campo[$aux][0] = 'p1_compoe_renda';
        $campo[$aux][1] = $this->p1_compoe_renda;
        $aux++;
        $campo[$aux][0] = 'p1_nome_conjuge';
        $campo[$aux][1] = $this->p1_nome_conjuge;
        $aux++;
        $campo[$aux][0] = 'p1_cpf_conjuge';
        $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->p1_cpf_conjuge);
        $aux++;
        $campo[$aux][0] = 'p1_estado_civil_conjuge';
        $campo[$aux][1] = $this->p1_estado_civil_conjuge;
        $aux++;
        $campo[$aux][0] = 'p2_nome_conjuge';
        $campo[$aux][1] = $this->p2_nome_conjuge;
        $aux++;
        $campo[$aux][0] = 'p2_cpf_conjuge';
        $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->p2_cpf_conjuge);
        $aux++;
        $campo[$aux][0] = 'p2_estado_civil_conjuge';
        $campo[$aux][1] = $this->p2_estado_civil_conjuge;
        $aux++;
        $campo[$aux][0] = 'p3_nome_conjuge';
        $campo[$aux][1] = $this->p3_nome_conjuge;
        $aux++;
        $campo[$aux][0] = 'p3_cpf_conjuge';
        $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->p3_cpf_conjuge);
        $aux++;
        $campo[$aux][0] = 'p3_estado_civil_conjuge';
        $campo[$aux][1] = $this->p3_estado_civil_conjuge;
        $aux++;
        $campo[$aux][0] = 'possui_compromissos';
        $campo[$aux][1] = $this->possui_compromissos;
        $aux++;
        $campo[$aux][0] = 'custos_certidoes';
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->custos_certidoes));
        $aux++;
        $campo[$aux][0] = 'itbi';
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->itbi));
        $aux++;
        $campo[$aux][0] = 'registro_cartorario';
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->registro_cartorario));
        $aux++;
        $campo[$aux][0] = 'dia_pagamento_parcela';
        $campo[$aux][1] = $this->dia_pagamento_parcela;
        $aux++;
        $campo[$aux][0] = 'possui_vaga';
        $campo[$aux][1] = $this->possui_vaga;
        $aux++;
        $campo[$aux][0] = 'quantidade_vagas';
        $campo[$aux][1] = $this->quantidade_vagas;
        $aux++;
        $campo[$aux][0] = 'matricula_garagem';
        $campo[$aux][1] = $this->matricula_garagem;
        $aux++;
        $campo[$aux][0] = 'pergunta1';
        $campo[$aux][1] = $this->pergunta1;
        $aux++;
        $campo[$aux][0] = 'pergunta2';
        $campo[$aux][1] = $this->pergunta2;
        $aux++;
        $campo[$aux][0] = 'pergunta3';
        $campo[$aux][1] = $this->pergunta3;
        $aux++;
        $campo[$aux][0] = 'pergunta4';
        $campo[$aux][1] = $this->pergunta4;
        $aux++;
        $campo[$aux][0] = 'pergunta5';
        $campo[$aux][1] = $this->pergunta5;
        $aux++;
        $campo[$aux][0] = 'cadastrado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'cadastrado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        
        $id_formulario1 = $campo[0][1];
  
        $this->con1->executa('tb_formulario1', $campo);
        
      }
      
      // TABELA DE COMPROMISSOS FINANCEIROS    
      
      // LIMPA OS REGISTROS ANTERIORES DA TABELA DE COMPROMISSOS FINANCEIROS
      $this->con1->execSql("","DELETE FROM tb_compromissos_financeiros WHERE id_formulario1='" . $id_formulario1 . "'");

      // INSERE OS REGISTROS DE COMPROMISSOS FINANCEIROS
      for($i=0;$i<sizeOf($this->tipo_compromisso);$i++){
        if($this->tipo_compromisso[$i] && $this->empresa_compromisso[$i] && $this->valor_compromisso[$i]){      
    
          $campo = null;
          $chave = null;
      
          $aux = 0;    
    
          $campo[$aux][0] = 'id';
          $campo[$aux][1] = $this->con1->lastId('tb_compromissos_financeiros', 'id');
          $aux++;
          $campo[$aux][0] = 'id_formulario1';
          $campo[$aux][1] = $id_formulario1;
          $aux++;
          $campo[$aux][0] = 'tipo';
          $campo[$aux][1] = $this->tipo_compromisso[$i];
          $aux++;
          $campo[$aux][0] = 'empresa';
          $campo[$aux][1] = $this->empresa_compromisso[$i];
          $aux++;
          $campo[$aux][0] = 'valor';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_compromisso[$i]));
          $aux++;
          $campo[$aux][0] = 'prestacoes_vencer';
          $campo[$aux][1] = $this->prestacoes_vencer_compromisso[$i];
          $aux++;
          $campo[$aux][0] = 'ultima_prestacao_paga';
          $campo[$aux][1] = $this->php->inverteData($this->ultima_prestacao_paga_compromisso[$i]);
          $aux++;
          
          $this->con1->executa('tb_compromissos_financeiros', $campo);
          
        }
      }  
      
      // TABELA DE DESPESAS MENSAIS

      // LIMPA OS REGISTROS ANTERIORES DA TABELA DE DESPESAS MENSAIS
      $this->con1->execSql("","DELETE FROM tb_despesas_mensais WHERE id_formulario1='" . $id_formulario1 . "'");

      // INSERE AS REFERÊNCIAS DA PESSOA FÍSICA
      for($i=0;$i<sizeOf($this->tipo_despesas);$i++){
        if($this->tipo_despesas[$i] && $this->valor_despesas[$i]){
          
          $campo = null;
          $chave = null;
      
          $aux = 0;            
          
          $campo[$aux][0] = 'id';
          $campo[$aux][1] = $this->con1->lastId('tb_despesas_mensais', 'id');
          $aux++;
          $campo[$aux][0] = 'id_formulario1';
          $campo[$aux][1] = $id_formulario1;
          $aux++;          
          $campo[$aux][0] = 'tipo';
          $campo[$aux][1] = $this->tipo_despesas[$i];
          $aux++;
          $campo[$aux][0] = 'valor';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_despesas[$i]));
          $aux++;
          
          $this->con1->executa('tb_despesas_mensais', $campo);
          
        }
      }  

      
      // FORMULÁRIO 2
      
      // CONSULTA OS PROPONENTES DO PROCESSO
      $this->con1->consulta("SELECT proponentes FROM tb_processo WHERE id='" . $this->id_processo . "' AND status=1");
      $this->con1->proxRegistro();
      
      $arrProponentes = split("#",$this->con1->data['proponentes']);
      
      for($i=1;$i<sizeOf($arrProponentes)-1;$i++){

        $campo = null;
        $chave = null;
      
        $aux = 0;
        
        $this->con1->consulta("SELECT id FROM tb_formulario2 WHERE id_processo='" . $this->id_processo . "' AND id_pessoa_fisica='" . $arrProponentes[$i] . "' AND status=1");
        if($this->con1->nrows > 0){
          // ALTERA O REGISTRO
        
          $this->con1->proxRegistro();
          
          $campo[$aux][0] = 'pis';
          $campo[$aux][1] = $this->pis[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'empresa_laboral';
          $campo[$aux][1] = $this->empresa_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'cnpj_laboral';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->cnpj_laboral[$arrProponentes[$i]]);
          $aux++;
          $campo[$aux][0] = 'municipio_laboral';
          $campo[$aux][1] = $this->municipio_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'uf_laboral';
          $campo[$aux][1] = $this->uf_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'data_uniao_estavel';
          $campo[$aux][1] = $this->php->inverteData($this->data_uniao_estavel[$arrProponentes[$i]]);
          $aux++;
          $campo[$aux][0] = 'proprietario_imoveis';
          $campo[$aux][1] = $this->proprietario_imoveis[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'declaracao_saida';
          $campo[$aux][1] = $this->declaracao_saida[$arrProponentes[$i]];
          $aux++;
          
/*
          $campo[$aux][0] = 'municipio_residencia';
          $campo[$aux][1] = $this->municipio_residencia[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'tempo_residencia';
          $campo[$aux][1] = $this->tempo_residencia[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'ocupacao_laboral';
          $campo[$aux][1] = $this->ocupacao_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'municipio_laboral';
          $campo[$aux][1] = $this->municipio_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'desempregado';
          $campo[$aux][1] = $this->desempregado[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'isencao_dirpf';
          $campo[$aux][1] = $this->isencao_dirpf[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'ano_declaracao';
          $campo[$aux][1] = $this->ano_declaracao[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'exercicio_declaracao';
          $campo[$aux][1] = $this->exercicio_declaracao[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'fidelidade_copia';
          $campo[$aux][1] = $this->fidelidade_copia[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'exercicio_fidelidade';
          $campo[$aux][1] = $this->exercicio_fidelidade[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'estado_civil';
          $campo[$aux][1] = $this->estado_civil_formulario[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'regime_comunhao';
          $campo[$aux][1] = $this->regime_comunhao_formulario[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'residencia_uniao_estavel';
          $campo[$aux][1] = $this->residencia_uniao_estavel[$arrProponentes[$i]];
          $aux++;
*/
          $campo[$aux][0] = 'atualizado_em';
          $campo[$aux][1] = date('Y-m-d H:i:s');
          $aux++;
          $campo[$aux][0] = 'atualizado_por';
          $campo[$aux][1] = $_SESSION["id_usuario"];
          $aux++;          
          
          $chave[0][0] = 'id';
          $chave[0][1] = $this->con1->data['id'];
          
          $id_formulario2 = $this->con1->data['id'];
    
          $this->con1->executa('tb_formulario2', $campo, $chave);          
          
        }else{
          // INCLUI O REGISTRO
        
          $campo[$aux][0] = 'id';
          $campo[$aux][1] = $this->con1->lastId('tb_formulario2', 'id');
          $aux++;
          $campo[$aux][0] = 'id_processo';
          $campo[$aux][1] = $this->id_processo;
          $aux++;
          $campo[$aux][0] = 'id_pessoa_fisica';
          $campo[$aux][1] = $arrProponentes[$i];
          $aux++;
          $campo[$aux][0] = 'pis';
          $campo[$aux][1] = $this->pis[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'empresa_laboral';
          $campo[$aux][1] = $this->empresa_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'cnpj_laboral';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->cnpj_laboral[$arrProponentes[$i]]);
          $aux++;
          $campo[$aux][0] = 'municipio_laboral';
          $campo[$aux][1] = $this->municipio_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'uf_laboral';
          $campo[$aux][1] = $this->uf_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'data_uniao_estavel';
          $campo[$aux][1] = $this->php->inverteData($this->data_uniao_estavel[$arrProponentes[$i]]);
          $aux++;
          $campo[$aux][0] = 'proprietario_imoveis';
          $campo[$aux][1] = $this->proprietario_imoveis[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'declaracao_saida';
          $campo[$aux][1] = $this->declaracao_saida[$arrProponentes[$i]];
          $aux++;
          
/*
          $campo[$aux][0] = 'municipio_residencia';
          $campo[$aux][1] = $this->municipio_residencia[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'tempo_residencia';
          $campo[$aux][1] = $this->tempo_residencia[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'ocupacao_laboral';
          $campo[$aux][1] = $this->ocupacao_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'municipio_laboral';
          $campo[$aux][1] = $this->municipio_laboral[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'desempregado';
          $campo[$aux][1] = $this->desempregado[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'isencao_dirpf';
          $campo[$aux][1] = $this->isencao_dirpf[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'ano_declaracao';
          $campo[$aux][1] = $this->ano_declaracao[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'exercicio_declaracao';
          $campo[$aux][1] = $this->exercicio_declaracao[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'fidelidade_copia';
          $campo[$aux][1] = $this->fidelidade_copia[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'exercicio_fidelidade';
          $campo[$aux][1] = $this->exercicio_fidelidade[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'estado_civil';
          $campo[$aux][1] = $this->estado_civil_formulario[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'regime_comunhao';
          $campo[$aux][1] = $this->regime_comunhao_formulario[$arrProponentes[$i]];
          $aux++;
          $campo[$aux][0] = 'residencia_uniao_estavel';
          $campo[$aux][1] = $this->residencia_uniao_estavel[$arrProponentes[$i]];
          $aux++;
*/
          $campo[$aux][0] = 'cadastrado_em';
          $campo[$aux][1] = date('Y-m-d H:i:s');
          $aux++;
          $campo[$aux][0] = 'cadastrado_por';
          $campo[$aux][1] = $_SESSION["id_usuario"];
          $aux++;
          
          $id_formulario2 = $campo[0][1];
    
          $this->con1->executa('tb_formulario2', $campo);
          
        }  
        
       
        // TABELA DE CONTA DO FGTS  
        
        // LIMPA OS REGISTROS ANTERIORES DA TABELA DE CONTAS DO FGTS
        $this->con1->execSql("","DELETE FROM tb_conta_fgts WHERE id_formulario2='" . $id_formulario2 . "'");

        // INSERE OS REGISTROS DE CONTA DO FGTS
        for($j=0;$j<sizeOf($this->conta_fgts[$arrProponentes[$i]]);$j++){
          if($this->conta_fgts[$arrProponentes[$i]][$j] && $this->empregador_fgts[$arrProponentes[$i]][$j]){
            
          $campo = null;
          $chave = null;
      
          $aux = 0;            

          $campo[$aux][0] = 'id';
          $campo[$aux][1] = $this->con1->lastId('tb_conta_fgts', 'id');
          $aux++;
          $campo[$aux][0] = 'id_formulario2';
          $campo[$aux][1] = $id_formulario2;
          $aux++;          
          $campo[$aux][0] = 'conta';
          $campo[$aux][1] = $this->conta_fgts[$arrProponentes[$i]][$j];
          $aux++;
          $campo[$aux][0] = 'empregador';
          $campo[$aux][1] = $this->empregador_fgts[$arrProponentes[$i]][$j];
          $aux++;
          $campo[$aux][0] = 'utilizacao_fmp';
          $campo[$aux][1] = $this->utilizacao_fmp[$arrProponentes[$i]][$j];
          $aux++;
          $campo[$aux][0] = 'valor_saque';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->valor_saque_fgts[$arrProponentes[$i]][$j]));
          $aux++;
          
          $this->con1->executa('tb_conta_fgts', $campo);
          
          }
        }          
        
      }        
        
      // FORMULÁRIO 3

      $campo = null;
      $chave = null;
      
      $aux = 0;
      
      $this->con1->consulta("SELECT id FROM tb_formulario3 WHERE id_processo='" . $this->id_processo . "' AND status=1");
      if($this->con1->nrows > 0){
        // ALTERA O REGISTRO
        
        $this->con1->proxRegistro();
        
        $campo[$aux][0] = 'id_processo';
        $campo[$aux][1] = $this->id_processo;
        $aux++;
        $campo[$aux][0] = 'beneficiario_desconto';
        $campo[$aux][1] = $this->beneficiario_desconto;
        $aux++;
        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        
        $chave[0][0] = 'id';
        $chave[0][1] = $this->con1->data['id'];
        
        $this->con1->executa('tb_formulario3', $campo, $chave);
        
      }else{
        // INCLUI O REGISTRO
        
        $campo[$aux][0] = 'id';
        $campo[$aux][1] = $this->con1->lastId('tb_formulario3', 'id');
        $aux++;
        $campo[$aux][0] = 'id_processo';
        $campo[$aux][1] = $this->id_processo;
        $aux++;        
        $campo[$aux][0] = 'beneficiario_desconto';
        $campo[$aux][1] = $this->beneficiario_desconto;
        $aux++;
        $campo[$aux][0] = 'cadastrado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'cadastrado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        
        $this->con1->executa('tb_formulario3', $campo);
        
      }
      
      }
      
      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('RETORNO DA INSTITUIÇÃO FINANCEIRA REGISTRADO.\nO corretor responsável por este processo já foi informado.',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }

/*--------------------------------------------------------------------*/


/*-------------------------REGISTRA NEGOCIAÇÃO------------------------*/

    function registra_negociacao(){

    // VERIFICA SE A VENDA JÁ FOI REALIZADA PARA OUTRO CLIENTE
    $id_processo_vendido = null;
    $disponibilidade_unidade = 'D';
    
    // VERIFICA SE JÁ EXISTE OUTRO PROCESSO COM CONTRATO GERADO NESTA UNIDADE
    $this->con1->consulta("SELECT id FROM tb_processo WHERE unidade='" . $this->unidade_interesse . "' AND evolucao>=6 AND aprovacao_contrato='A' AND status=1");
    if($this->con1->nrows > 0){
      $this->con1->proxRegistro();
      $id_processo_vendido = $this->con1->data['id'];
    }
    
    // VERIFICA O STATUS DA UNIDADE
    $this->con1->consulta("SELECT disponibilidade FROM tb_unidade WHERE id='" . $this->unidade_interesse . "' AND status=1");
    if($this->con1->nrows > 0){
      $this->con1->proxRegistro();
      $disponibilidade_unidade = $this->con1->data['disponibilidade'];
    }

//    if(($id_processo_vendido && ($this->id_processo != $id_processo_vendido)) || $disponibilidade_unidade <> 'D'){
//
//      <script>
//      alert("ATENÇÃO: Esta unidade não está mais disponível para venda. Selecione uma outra unidade para a venda.");
//      </script>
//
//    }else{
    
      $campo = null;
      $chave = null;

      $aux = 0;

    if($this->nivel_pre_venda == 1 && $this->condicao_especial == 'N'){
      $campo[$aux][0] = 'nivel_pre_venda';
      $campo[$aux][1] = 2;
      $aux++;
    }

      $campo[$aux][0] = 'aprovacao_contrato';
    if($this->condicao_especial == 'S'){
      $campo[$aux][1] = 'E';
    }else{
      $campo[$aux][1] = 'A';
    }
      $aux++;

    if($this->condicao_especial != 'S'){
      $campo[$aux][0] = 'data_venda';
      $campo[$aux][1] = date('Y-m-d');
      $aux++;
    }

      $campo[$aux][0] = 'sinal_prosoluto';
    if($this->sinal == 'S'){
      if($this->zerar_sinal == 'S'){
        if(str_replace(',','.',str_replace('.','',$this->sinal_prosoluto)) > 0 && str_replace(',','.',str_replace('.','',$this->sinal_prosoluto)) < 1){
          $campo[$aux][1] = 0;
        }else{
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
        }
      }else{
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
      }
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'vencimento_sinal';
    if($this->sinal == 'S'){
      $campo[$aux][1] = $this->php->inverteData($this->sinal_vencimento);
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'pre_chaves_prosoluto';
    if($this->pre_chaves == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->pre_chaves_prosoluto)));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'parcelas_pre_chaves';
    if($this->pre_chaves == 'S'){
      $campo[$aux][1] = $this->parcelas_pre_chaves;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'vencimento_pre_chaves';
    if($this->pre_chaves == 'S'){
      if($this->condicao_especial == 'S'){
        if($this->pre_chaves_valor_d[0] > 0){
          $campo[$aux][1] = $this->php->inverteData($this->pre_chaves_vencimento_d[0]);
        }else{
          $campo[$aux][1] = date('Y-m-d', mktime(0, 0, 0, date(m) + 1, $this->php->strZero($this->pre_chaves_vencimento,2), date(Y)));
        }
      }else{
        $campo[$aux][1] = date('Y-m-d', mktime(0, 0, 0, date(m) + 1, $this->php->strZero($this->pre_chaves_vencimento,2), date(Y)));
      }
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'detalhamento_pre_chaves';
    if($this->pre_chaves_valor_d[0]){
      $campo[$aux][1] = 'S';
    }else{
      $campo[$aux][1] = 'N';
    }
      $aux++;

      $campo[$aux][0] = 'intermediarias_prosoluto';
    if($this->intermediarias == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->intermediarias_prosoluto)));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'vencimento_intermediarias';
    if($this->intermediarias == 'S'){
      if($this->intermediarias_valor_d[0]){
        $campo[$aux][1] = $this->php->inverteData($this->intermediarias_vencimento_d[0]);
      }else{
        $campo[$aux][1] = date('Y-m-d', mktime(0, 0, 0, date(m) + 2, $this->php->strZero($this->intermediarias_vencimento,2), date(Y)));
      }
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'parcelas_intermediarias';
    if($this->intermediarias == 'S'){
      $campo[$aux][1] = $this->parcelas_intermediarias;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'periodicidade_intermediarias';
    if($this->intermediarias == 'S'){
      $campo[$aux][1] = $this->periodicidade_intermediarias;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'detalhamento_intermediarias';
    if($this->intermediarias_valor_d[0]){
      $campo[$aux][1] = 'S';
    }else{
      $campo[$aux][1] = 'N';
    }
      $aux++;
      
      $campo[$aux][0] = 'chaves_prosoluto';
    if($this->chaves == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->chaves_prosoluto));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
    if($this->subsidio_estadual > 0){
      $campo[$aux][0] = 'subsidio_estadual';
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->subsidio_estadual));
      $aux++;
      $campo[$aux][0] = 'vencimento_subsidio_estadual';
      $campo[$aux][1] = $this->php->inverteData($this->vencimento_subsidio);
      $aux++;
    }
      
      $campo[$aux][0] = 'vencimento_chaves';
    if($this->chaves == 'S'){
      $campo[$aux][1] = $this->php->inverteData($this->chaves_vencimento);
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'pos_chaves_prosoluto';
    if($this->pos_chaves == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->pos_chaves_prosoluto));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'parcelas_pos_chaves';
    if($this->pos_chaves == 'S'){
      $campo[$aux][1] = $this->parcelas_pos_chaves;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'vencimento_pos_chaves';
    if($this->pos_chaves == 'S'){
      $campo[$aux][1] = $this->php->inverteData($this->pos_chaves_vencimento);
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      
      $campo[$aux][0] = 'mensal_custas';
    if($this->cobranca_custas == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->mensal_custas));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'parcelamento_custas';
    if($this->cobranca_custas == 'S'){
      $campo[$aux][1] = $this->parcelamento_custas;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'vencimento_custas';
    if($this->cobranca_custas == 'S'){
      $campo[$aux][1] = $this->php->inverteData($this->vencimento_custas);
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'detalhamento_custas';
    if($this->custas_valor_d[0]){
      $campo[$aux][1] = 'S';
    }else{
      $campo[$aux][1] = 'N';
    }
      $aux++;
      
      $campo[$aux][0] = 'periodicidade_custas';
    if($this->cobranca_custas == 'S'){
      $campo[$aux][1] = $this->periodicidade_custas;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      /* NÃO INSERIR JUROS DE CUSTAS NO REGISTRO DA NEGOCIAÇÃO */

      
    if($this->condicao_especial == 'S'){
      $campo[$aux][0] = 'condicao_especial';
      $campo[$aux][1] = 'S';
      $aux++;
      
      $campo[$aux][0] = 'texto_condicao_especial';
      $campo[$aux][1] = $this->texto_condicao_especial;
      $aux++;
      
      if($this->quantidade_avalistas > 0){
        $campo[$aux][0] = 'exige_avalista';
        $campo[$aux][1] = 'S';
        $aux++;

        $campo[$aux][0] = 'quantidade_avalistas';
        $campo[$aux][1] = $this->quantidade_avalistas;
        $aux++;
      }
    }
    
    if($this->corretagem_sinal == 'S'){
      $campo[$aux][0] = 'corretagem_sinal';
      $campo[$aux][1] = 'S';
      $aux++;
    }
      
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;

      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 6;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 17: APROVADO PELA INSTITUIÇÃO FINANCEIRA | EVOLUÇÃO 16: REPROVADO PELA INSTITUIÇÃO FINANCEIRA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = null;
      if($this->nivel_pre_venda == 0 || $this->nivel_pre_venda == 3){
        // CONDIÇÃO ESPECIAL EM ANÁLISE
        if($this->condicao_especial == 'S'){
          $evolucao_etapa_workflow = 18;
        // CONTRATO DE VENDA (CCV) GERADO
        }else{
          $evolucao_etapa_workflow = 21;
        }
      }else if($this->nivel_pre_venda == 1){
        // CONDIÇÃO ESPECIAL DE RESERVA EM ANÁLISE
        if($this->condicao_especial == 'S'){
          $evolucao_etapa_workflow = 3;
        // INSTRUMENTO DE RESERVA GERADO
        }else{
          $evolucao_etapa_workflow = 6;
        }
      }
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // CASO O EMPREENDIMENTO ESTEJA CONFIGURADO PARA ZERAR O SINAL EM CASO DE CENTAVOS, E ESTE SEJA O CASO, AJUSTA O VALOR DA UNIDADE AQUI
      if($this->zerar_sinal == 'S'){
        if(str_replace(',','.',str_replace('.','',$this->sinal_prosoluto)) > 0 && str_replace(',','.',str_replace('.','',$this->sinal_prosoluto)) < 1){
          if($this->unidade_interesse){
            $this->con1->consulta("SELECT valor FROM tb_unidade WHERE id='" . $this->unidade_interesse . "'");
            $this->con1->proxRegistro();
            
            $campo = null;
            $chave = null;
            
            $novo_valor_unidade = $this->con1->data['valor'] - str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
            
            $campo[0][0] = 'valor';
            $campo[0][1] = $novo_valor_unidade;
            
            $chave[0][0] = 'id';
            $chave[0][1] = $this->unidade_interesse;
            
            $this->con1->executa('tb_unidade', $campo, $chave);
          }
        }
      }
      


      // EXCLUI INSERÇÕES ANTERIORES DESSE PROCESSO CASO HAJAM
      $this->con1->execSql("","DELETE FROM tb_detalhamento_parcelas WHERE processo='" . $this->id_processo . "'");

      // DETALHAMENTO PRÉ-CHAVES
      if($this->pre_chaves_valor_d[0] > 0){
      
        for($i=0;$i<sizeOf($this->pre_chaves_valor_d);$i++){
          if($this->pre_chaves_valor_d[$i] > 0){
            $campo = null;
            $chave = null;
          
            $campo[0][0] = 'id';
            $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas', 'id');
            $campo[1][0] = 'processo';
            $campo[1][1] = $this->id_processo;
            $campo[2][0] = 'tipo_parcela';
            $campo[2][1] = 'PR';
            $campo[3][0] = 'valor';
            $campo[3][1] = str_replace(',','.',str_replace('.','',$this->pre_chaves_valor_d[$i]));
            $campo[4][0] = 'parcelas';
            $campo[4][1] = $this->pre_chaves_parcelas_d[$i];
            $campo[5][0] = 'vencimento';
            $campo[5][1] = $this->php->inverteData($this->pre_chaves_vencimento_d[$i]);
          
            $this->con1->executa('tb_detalhamento_parcelas', $campo);
          }
        }
      }
      

      // DETALHAMENTO INTERMEDIÁRIAS
      if($this->intermediarias_valor_d[0] > 0){

        for($i=0;$i<sizeOf($this->intermediarias_valor_d);$i++){
          if($this->intermediarias_valor_d[$i] > 0){
            $campo = null;
            $chave = null;

            $campo[0][0] = 'id';
            $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas', 'id');
            $campo[1][0] = 'processo';
            $campo[1][1] = $this->id_processo;
            $campo[2][0] = 'tipo_parcela';
            $campo[2][1] = 'IN';
            $campo[3][0] = 'valor';
            $campo[3][1] = str_replace(',','.',str_replace('.','',$this->intermediarias_valor_d[$i]));
            $campo[4][0] = 'parcelas';
            $campo[4][1] = 1;
            $campo[5][0] = 'vencimento';
            $campo[5][1] = $this->php->inverteData($this->intermediarias_vencimento_d[$i]);

            $this->con1->executa('tb_detalhamento_parcelas', $campo);
          }
        }
      }
      
      
      // DETALHAMENTO CUSTAS
      if($this->custas_valor_d[0] > 0){

        for($i=0;$i<sizeOf($this->custas_valor_d);$i++){
          if($this->custas_valor_d[$i] > 0){
            $campo = null;
            $chave = null;

            $campo[0][0] = 'id';
            $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas', 'id');
            $campo[1][0] = 'processo';
            $campo[1][1] = $this->id_processo;
            $campo[2][0] = 'tipo_parcela';
            $campo[2][1] = 'CS';
            $campo[3][0] = 'valor';
            $campo[3][1] = str_replace(',','.',str_replace('.','',$this->custas_valor_d[$i]));
            $campo[4][0] = 'parcelas';
            $campo[4][1] = 1;
            $campo[5][0] = 'vencimento';
            $campo[5][1] = $this->php->inverteData($this->custas_vencimento_d[$i]);

            $this->con1->executa('tb_detalhamento_parcelas', $campo);
          }
        }
      }
      
      
      // AVALISTAS
      if($this->quantidade_avalistas > 0){
        for($i=1;$i<=$this->quantidade_avalistas;$i++){

          $campo = null;
          $chave = null;

          $aux = 0;
          $campo[$aux][0]  = 'id';
          $campo[$aux][1]  = $this->con1->lastId('tb_avalista', 'id');
          $aux++;
          $campo[$aux][0]  = 'processo';
          $campo[$aux][1]  = $this->id_processo;
          $aux++;
          $campo[$aux][0]  = 'nome';
          $campo[$aux][1]  = trim($this->nome_avalista[$i]);
          $aux++;
          $campo[$aux][0]  = 'cpf';
          $campo[$aux][1]  = preg_replace("/[^0-9]/","",$this->cpf_avalista[$i]);
          $aux++;
          $campo[$aux][0]  = 'rg';
          $campo[$aux][1]  = $this->rg_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'estado_civil';
          $campo[$aux][1]  = $this->estado_civil_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'regime_comunhao';
          $campo[$aux][1]  = $this->regime_comunhao_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'endereco';
          $campo[$aux][1]  = $this->endereco_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'numero';
          $campo[$aux][1]  = $this->numero_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'complemento';
          $campo[$aux][1]  = $this->complemento_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'bairro';
          $campo[$aux][1] = $this->bairro_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'cidade';
          $campo[$aux][1] = $this->cidade_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'uf';
          $campo[$aux][1] = $this->uf_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'cep';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->cep_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'telefone1';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->telefone1_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'telefone2';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->telefone2_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'celular';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->celular_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'email';
          $campo[$aux][1] = $this->email_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'conjuge';
          $campo[$aux][1] = $this->conjuge_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'cpf_conjuge';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->cpf_conjuge_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'rg_conjuge';
          $campo[$aux][1] = $this->rg_conjuge_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'cadastrado_em';
          $campo[$aux][1] = date('Y-m-d H:i:s');
          $aux++;
          $campo[$aux][0] = 'cadastrado_por';
          $campo[$aux][1] = $_SESSION["id_usuario"];
          $aux++;

          $this->con1->executa('tb_avalista', $campo);

        }
        
        // LOG EVOLUTIVO
        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 14; // CADASTRO DE AVALISTA
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);
      }
      
      
      // ALTERA O STATUS DA UNIDADE
      $this->con1->consulta("SELECT unidade FROM tb_processo WHERE id='" . $this->id_processo . "'");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();
      
        $campo = null;
        $chave = null;

        $campo[0][0] = 'disponibilidade';
        if($this->nivel_pre_venda == 1 && $this->condicao_especial == 'N'){
          $campo[0][1] = 'R';
        }else{
          $campo[0][1] = 'V';
        }

        $chave[0][0] = 'id';
        $chave[0][1] = $this->con1->data['unidade'];

        $this->con1->executa('tb_unidade', $campo, $chave);
      }
      
      
      
      /* ======= INSERE OS DADOS NA NOVA TABELA DE NEGOCIAÇÃO (tb_negociacao_prosoluto) E REGISTRA NA TABELA tb_detalhamento_parcelas AS PARCELAS NO NOVO FORMATO - POR ENQUANTO SERÃO MANTIDAS NA TABELA DE DETALHAMENTO AS PARCELAS NO FORMATO ANTIGO E NO NOVO FORMATO. - ATUALIZADO EM 19/03/2018 ========= */
      
      
      //  CALCULA O VALOR DO PRÓ-SOLUTO
      $this->con1->consulta("SELECT tb_processo.avaliacao_financiamento, tb_processo.fgts_aprovado, tb_processo.subsidio_aprovado, tb_processo.valor_financiamento, tb_unidade.valor as valor_unidade, tb_processo.negociacao_prosoluto
                             FROM tb_processo
                             LEFT JOIN tb_unidade ON tb_processo.unidade = tb_unidade.id
                             WHERE tb_processo.id='" . $this->id_processo . "'");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();
        $valor_unidade = $this->con1->data['valor_unidade'];
        $valor_prosoluto = $this->con1->data['valor_unidade'] - ($this->con1->data['fgts_aprovado'] + $this->con1->data['subsidio_aprovado'] + $this->con1->data['valor_financiamento']);
        $avaliacao_financiamento = $this->con1->data['avaliacao_financiamento'];
        $id_negociacao_prosoluto = $this->con1->data['negociacao_prosoluto'];
      }


      // BUSCA OS AVALISTAS DO PROCESSO
      $avalistas = null;
      if($this->quantidade_avalistas > 0){
        $this->con1->consulta("SELECT * FROM tb_avalista WHERE processo='" . $this->id_processo . "' AND status=1");
        if($this->con1->nrows > 0){
          $avalistas = '#';
          while($this->con1->proxRegistro()){
            $avalistas .= $this->con1->data['id'] . '#';
          }
        }
      }
      

      // INSERE OS DADOS NA TABELA DE NEGOCIAÇÃO DO PRO-SOLUTO
      if(!$id_negociacao_prosoluto){
      
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0] = 'id';
        $campo[$aux][1] = $this->con1->lastId('tb_negociacao_prosoluto','id');
        $aux++;
        $campo[$aux][0] = 'processo';
        $campo[$aux][1] = $this->id_processo;
        $aux++;

        $campo[$aux][0] = 'avaliacao_financiamento';
        $campo[$aux][1] = $avaliacao_financiamento;
        $aux++;

        $campo[$aux][0] = 'aprovacao_contrato';
        if($this->condicao_especial == 'S'){
          $campo[$aux][1] = 'E';
        }else{
          $campo[$aux][1] = 'A';
        }
        $aux++;

        $campo[$aux][0] = 'valor_unidade';
        $campo[$aux][1] = $valor_unidade;
        $aux++;

        $campo[$aux][0] = 'tipo_negociacao';
        if($this->cobranca_custas == 'S' && $this->mensal_custas > 0){
          $campo[$aux][1] = 'PS+CS';
        }else{
          $campo[$aux][1] = 'PS';
        }
        $aux++;
        $campo[$aux][0] = 'data_negociacao';
        $campo[$aux][1] = date('Y-m-d');
        $aux++;
        if($this->id_desconto){
          $campo[$aux][0] = 'id_desconto';
          $campo[$aux][1] = $this->id_desconto;
          $aux++;
        }
        if($this->codigo_desconto){
          $campo[$aux][0] = 'codigo_desconto';
          $campo[$aux][1] = $this->codigo_desconto;
          $aux++;
        }
        if($this->valor_desconto){
          $campo[$aux][0] = 'valor_desconto';
          $campo[$aux][1] = $this->valor_desconto;
          $aux++;
        }
        if($this->percentual_desconto){
          $campo[$aux][0] = 'percentual_desconto';
          $campo[$aux][1] = $this->percentual_desconto;
          $aux++;
        }

        $campo[$aux][0] = 'valor_prosoluto';
        $campo[$aux][1] = $valor_prosoluto;
        $aux++;

        $campo[$aux][0] = 'sinal';
        if($this->sinal == 'S'){
          if($this->zerar_sinal == 'S'){
            if(str_replace(',','.',str_replace('.','',$this->sinal_prosoluto)) > 0 && str_replace(',','.',str_replace('.','',$this->sinal_prosoluto)) < 1){
              $campo[$aux][1] = 0;
            }else{
              $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
            }
          }else{
            $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
          }
        }else{
          $campo[$aux][1] = 'null';
        }
        $aux++;

        $campo[$aux][0] = 'vencimento_sinal';
        if($this->sinal == 'S'){
          $campo[$aux][1] = $this->php->inverteData($this->sinal_vencimento);
        }else{
          $campo[$aux][1] = 'null';
        }
        $aux++;

        $campo[$aux][0] = 'total_mensais';
        if($this->pre_chaves_valor_d[0]){
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->pre_chaves_prosoluto))) + (str_replace(',','.',str_replace('.','',$this->pos_chaves_prosoluto)) * $this->parcelas_pos_chaves);
        }else{
          $campo[$aux][1] = (str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->pre_chaves_prosoluto))) * $this->parcelas_pre_chaves) + (str_replace(',','.',str_replace('.','',$this->pos_chaves_prosoluto)) * $this->parcelas_pos_chaves);
        }
        $aux++;

        $campo[$aux][0] = 'total_intermediarias';
        if($this->intermediarias_valor_d[0]){
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->intermediarias_prosoluto)));
        }else{
          $campo[$aux][1] = (str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->intermediarias_prosoluto))) * $this->parcelas_intermediarias);
        }
        $aux++;

        $campo[$aux][0] = 'chaves';
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->chaves_prosoluto));
        $aux++;
        $campo[$aux][0] = 'vencimento_chaves';
        $campo[$aux][1] = $this->php->inverteData($this->chaves_vencimento);
        $aux++;

        $campo[$aux][0] = 'juros_prosoluto';
        $campo[$aux][1] = 1;
        $aux++;

        if($this->subsidio_estadual > 0){
          $campo[$aux][0] = 'subsidio_estadual';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->subsidio_estadual));
          $aux++;
          $campo[$aux][0] = 'vencimento_subsidio_estadual';
          $campo[$aux][1] = $this->php->inverteData($this->vencimento_subsidio);
          $aux++;
        }

        $campo[$aux][0] = 'valor_custas';
        if($this->custas_valor_d[0]){
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->mensal_custas));
        }else{
          $campo[$aux][1] = (str_replace(',','.',str_replace('.','',$this->mensal_custas)) * $this->parcelamento_custas);
        }
        $aux++;

        $campo[$aux][0] = 'cobrar_juros_custas';
        $campo[$aux][1] = 'S';
        $aux++;
        $campo[$aux][0] = 'juros_custas';
        $campo[$aux][1] = 2;
        $aux++;

        if($this->condicao_especial == 'S'){
          $campo[$aux][0] = 'condicao_especial';
          $campo[$aux][1] = 'S';
          $aux++;
          $campo[$aux][0] = 'texto_condicao_especial';
          $campo[$aux][1] = $this->texto_condicao_especial;
          $aux++;
          if($this->quantidade_avalistas > 0){
            $campo[$aux][0] = 'exige_avalista';
            $campo[$aux][1] = 'S';
            $aux++;
            $campo[$aux][0] = 'quantidade_avalistas';
            $campo[$aux][1] = $this->quantidade_avalistas;
            $aux++;
            if($avalistas){
              $campo[$aux][0] = 'avalistas';
              $campo[$aux][1] = $avalistas;
              $aux++;
            }
          }
        }
        if($this->corretagem_sinal == 'S'){
          $campo[$aux][0] = 'corretagem_sinal';
          $campo[$aux][1] = 'S';
          $aux++;
        }
        $campo[$aux][0] = 'cadastrado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'cadastrado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;

        $id_negociacao_prosoluto = $campo[0][1];

        $this->con1->executa('tb_negociacao_prosoluto',$campo);
        
      }else{
      
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0] = 'avaliacao_financiamento';
        $campo[$aux][1] = $avaliacao_financiamento;
        $aux++;

        $campo[$aux][0] = 'aprovacao_contrato';
        if($this->condicao_especial == 'S'){
          $campo[$aux][1] = 'E';
        }else{
          $campo[$aux][1] = 'A';
        }
        $aux++;

        $campo[$aux][0] = 'valor_unidade';
        $campo[$aux][1] = $valor_unidade;
        $aux++;

        $campo[$aux][0] = 'tipo_negociacao';
        if($this->cobranca_custas == 'S' && $this->mensal_custas > 0){
          $campo[$aux][1] = 'PS+CS';
        }else{
          $campo[$aux][1] = 'PS';
        }
        $aux++;
        $campo[$aux][0] = 'data_negociacao';
        $campo[$aux][1] = date('Y-m-d');
        $aux++;
        if($this->id_desconto){
          $campo[$aux][0] = 'id_desconto';
          $campo[$aux][1] = $this->id_desconto;
          $aux++;
        }
        if($this->codigo_desconto){
          $campo[$aux][0] = 'codigo_desconto';
          $campo[$aux][1] = $this->codigo_desconto;
          $aux++;
        }
        if($this->valor_desconto){
          $campo[$aux][0] = 'valor_desconto';
          $campo[$aux][1] = $this->valor_desconto;
          $aux++;
        }
        if($this->percentual_desconto){
          $campo[$aux][0] = 'percentual_desconto';
          $campo[$aux][1] = $this->percentual_desconto;
          $aux++;
        }

        $campo[$aux][0] = 'valor_prosoluto';
        $campo[$aux][1] = $valor_prosoluto;
        $aux++;

        $campo[$aux][0] = 'sinal';
        if($this->sinal == 'S'){
          if($this->zerar_sinal == 'S'){
            if(str_replace(',','.',str_replace('.','',$this->sinal_prosoluto)) > 0 && str_replace(',','.',str_replace('.','',$this->sinal_prosoluto)) < 1){
              $campo[$aux][1] = 0;
            }else{
              $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
            }
          }else{
            $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
          }
        }else{
          $campo[$aux][1] = 'null';
        }
        $aux++;

        $campo[$aux][0] = 'vencimento_sinal';
        if($this->sinal == 'S'){
          $campo[$aux][1] = $this->php->inverteData($this->sinal_vencimento);
        }else{
          $campo[$aux][1] = 'null';
        }
        $aux++;

        $campo[$aux][0] = 'total_mensais';
        if($this->pre_chaves_valor_d[0]){
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->pre_chaves_prosoluto))) + (str_replace(',','.',str_replace('.','',$this->pos_chaves_prosoluto)) * $this->parcelas_pos_chaves);
        }else{
          $campo[$aux][1] = (str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->pre_chaves_prosoluto))) * $this->parcelas_pre_chaves) + (str_replace(',','.',str_replace('.','',$this->pos_chaves_prosoluto)) * $this->parcelas_pos_chaves);
        }
        $aux++;

        $campo[$aux][0] = 'total_intermediarias';
        if($this->intermediarias_valor_d[0]){
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->intermediarias_prosoluto)));
        }else{
          $campo[$aux][1] = (str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->intermediarias_prosoluto))) * $this->parcelas_intermediarias);
        }
        $aux++;

        $campo[$aux][0] = 'chaves';
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->chaves_prosoluto));
        $aux++;
        $campo[$aux][0] = 'vencimento_chaves';
        $campo[$aux][1] = $this->php->inverteData($this->chaves_vencimento);
        $aux++;

        $campo[$aux][0] = 'juros_prosoluto';
        $campo[$aux][1] = 1;
        $aux++;

        if($this->subsidio_estadual > 0){
          $campo[$aux][0] = 'subsidio_estadual';
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->subsidio_estadual));
          $aux++;
          $campo[$aux][0] = 'vencimento_subsidio_estadual';
          $campo[$aux][1] = $this->php->inverteData($this->vencimento_subsidio);
          $aux++;
        }

        $campo[$aux][0] = 'valor_custas';
        if($this->custas_valor_d[0]){
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->mensal_custas));
        }else{
          $campo[$aux][1] = (str_replace(',','.',str_replace('.','',$this->mensal_custas)) * $this->parcelamento_custas);
        }

        $campo[$aux][0] = 'cobrar_juros_custas';
        $campo[$aux][1] = 'S';
        $aux++;
        $campo[$aux][0] = 'juros_custas';
        $campo[$aux][1] = 2;
        $aux++;

        if($this->condicao_especial == 'S'){
          $campo[$aux][0] = 'condicao_especial';
          $campo[$aux][1] = 'S';
          $aux++;
          $campo[$aux][0] = 'texto_condicao_especial';
          $campo[$aux][1] = $this->texto_condicao_especial;
          $aux++;
          if($this->quantidade_avalistas > 0){
            $campo[$aux][0] = 'exige_avalista';
            $campo[$aux][1] = 'S';
            $aux++;
            $campo[$aux][0] = 'quantidade_avalistas';
            $campo[$aux][1] = $this->quantidade_avalistas;
            $aux++;
            if($avalistas){
              $campo[$aux][0] = 'avalistas';
              $campo[$aux][1] = $avalistas;
              $aux++;
            }
          }
        }
        if($this->corretagem_sinal == 'S'){
          $campo[$aux][0] = 'corretagem_sinal';
          $campo[$aux][1] = 'S';
          $aux++;
        }
        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = $this->con1->data['data_venda'];
        $aux++;
        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $this->con1->data['cadastrado_por'];
        $aux++;

        $chave[0][0] = 'id';
        $chave[0][1] = $id_negociacao_prosoluto;

        $this->con1->executa('tb_negociacao_prosoluto',$campo,$chave);

      }
      
      
      
      /* ******************************************************* */
      
      
      // INCLUI AS PRÉ-CHAVES NO FORMATO DE MENSAIS
      $ids_mensais = null;
      if(str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->pre_chaves_prosoluto))) > 0 && $this->parcelas_pre_chaves > 0){
        $ids_mensais = '#';
        if($this->pre_chaves_valor_d[0]){
          $this->con1->consulta("SELECT * FROM tb_detalhamento_parcelas WHERE processo='" . $this->id_processo . "' AND tipo_parcela='PR' AND valor > 0 AND parcelas > 0");
          while($this->con1->proxRegistro()){
            $campo = null;
            $chave = null;

            $campo[0][0] = 'id';
            $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas','id');
            $campo[1][0] = 'processo';
            $campo[1][1] = $this->id_processo;
            $campo[2][0] = 'negociacao';
            $campo[2][1] = $id_negociacao_prosoluto;
            $campo[3][0] = 'tipo_parcela';
            $campo[3][1] = 'ME';
            $campo[4][0] = 'valor';
            $campo[4][1] = $this->con1->data['valor'];
            $campo[5][0] = 'parcelas';
            $campo[5][1] = $this->con1->data['parcelas'];
            $campo[6][0] = 'vencimento';
            $campo[6][1] = $this->con1->data['vencimento'];

            $ids_mensais .= $campo[0][1] . '#';

            $this->con1->executa('tb_detalhamento_parcelas',$campo);
          }
        }else{
          $campo = null;
          $chave = null;

          $campo[0][0] = 'id';
          $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas','id');
          $campo[1][0] = 'processo';
          $campo[1][1] = $this->id_processo;
          $campo[2][0] = 'negociacao';
          $campo[2][1] = $id_negociacao_prosoluto;
          $campo[3][0] = 'tipo_parcela';
          $campo[3][1] = 'ME';
          $campo[4][0] = 'valor';
          $campo[4][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->pre_chaves_prosoluto)));
          $campo[5][0] = 'parcelas';
          $campo[5][1] = $this->parcelas_pre_chaves;
          $campo[6][0] = 'vencimento';
          if($this->condicao_especial == 'S'){
            if($this->pre_chaves_valor_d[0] > 0){
              $campo[6][1] = $this->php->inverteData($this->pre_chaves_vencimento_d[0]);
            }else{
              $campo[6][1] = date('Y-m-d', mktime(0, 0, 0, date(m) + 1, $this->php->strZero($this->pre_chaves_vencimento,2), date(Y)));
            }
          }else{
            $campo[6][1] = date('Y-m-d', mktime(0, 0, 0, date(m) + 1, $this->php->strZero($this->pre_chaves_vencimento,2), date(Y)));
          }
          
          $ids_mensais .= $campo[0][1] . '#';

          $this->con1->executa('tb_detalhamento_parcelas',$campo);
        }
      }


      // INCLUI AS INTERMEDIÁRIAS NO NOVO FORMATO DE PARCELAS
      $ids_intermediarias = null;
      if(str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->intermediarias_prosoluto))) > 0 && $this->parcelas_intermediarias > 0){
        $ids_intermediarias = '#';
        if($this->intermediarias_valor_d[0]){
          $this->con1->consulta("SELECT* FROM tb_detalhamento_parcelas WHERE processo='" . $this->id_processo . "' AND tipo_parcela='IN' AND valor > 0 AND parcelas > 0");
          while($this->con1->proxRegistro()){
            $campo = null;
            $chave = null;

            $campo[0][0] = 'id';
            $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas','id');
            $campo[1][0] = 'processo';
            $campo[1][1] = $this->id_processo;
            $campo[2][0] = 'negociacao';
            $campo[2][1] = $id_negociacao_prosoluto;
            $campo[3][0] = 'tipo_parcela';
            $campo[3][1] = 'ES';
            $campo[4][0] = 'valor';
            $campo[4][1] = $this->con1->data['valor'];
            $campo[5][0] = 'parcelas';
            $campo[5][1] = $this->con1->data['parcelas'];
            $campo[6][0] = 'vencimento';
            $campo[6][1] = $this->con1->data['vencimento'];

            $ids_intermediarias .= $campo[0][1] . '#';

            $this->con1->executa('tb_detalhamento_parcelas',$campo);
          }
        }else{
          $campo = null;
          $chave = null;

          $campo[0][0] = 'id';
          $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas','id');
          $campo[1][0] = 'processo';
          $campo[1][1] = $this->id_processo;
          $campo[2][0] = 'negociacao';
          $campo[2][1] = $id_negociacao_prosoluto;
          $campo[3][0] = 'tipo_parcela';
          $campo[3][1] = 'ES';
          $campo[4][0] = 'valor';
          $campo[4][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->intermediarias_prosoluto)));
          $campo[5][0] = 'parcelas';
          $campo[5][1] = $this->parcelas_intermediarias;
          $campo[6][0] = 'vencimento';
          if($this->intermediarias_valor_d[0]){
            $campo[6][1] = $this->php->inverteData($this->intermediarias_vencimento_d[0]);
          }else{
            $campo[6][1] = date('Y-m-d', mktime(0, 0, 0, date(m) + 2, $this->php->strZero($this->intermediarias_vencimento,2), date(Y)));
          }
          
          $ids_intermediarias .= $campo[0][1] . '#';

          $this->con1->executa('tb_detalhamento_parcelas',$campo);
        }
      }


      // INCLUI AS CUSTAS NO NOVO FORMATO DE PARCELAS
      $ids_custas = null;
      if(str_replace(',','.',str_replace('.','',$this->mensal_custas)) > 0 && $this->parcelamento_custas > 0){
        $ids_custas = '#';
        if(!$this->custas_valor_d[0]){
          $campo = null;
          $chave = null;

          $campo[0][0] = 'id';
          $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas','id');
          $campo[1][0] = 'processo';
          $campo[1][1] = $this->id_processo;
          $campo[2][0] = 'negociacao';
          $campo[2][1] = $id_negociacao_prosoluto;
          $campo[3][0] = 'tipo_parcela';
          $campo[3][1] = 'CS';
          $campo[4][0] = 'valor';
          $campo[4][1] = str_replace(',','.',str_replace('.','',$this->mensal_custas));
          $campo[5][0] = 'parcelas';
          $campo[5][1] = $this->parcelamento_custas;
          $campo[6][0] = 'vencimento';
          $campo[6][1] = $this->php->inverteData($this->vencimento_custas);
          
          $ids_custas .= $campo[0][1] . '#';

          $this->con1->executa('tb_detalhamento_parcelas',$campo);
        }
      }


      // INCLUI AS PÓS-CHAVES NO DETALHAMENTO
      if(str_replace(',','.',str_replace('.','',$this->pos_chaves_prosoluto)) > 0 && $this->parcelas_pos_chaves > 0){
        if(!$ids_mensais){
          $ids_mensais = '#';
        }
      
        $campo = null;
        $chave = null;

        $campo[0][0] = 'id';
        $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas','id');
        $campo[1][0] = 'processo';
        $campo[1][1] = $this->id_processo;
        $campo[2][0] = 'negociacao';
        $campo[2][1] = $id_negociacao_prosoluto;
        $campo[3][0] = 'tipo_parcela';
        $campo[3][1] = 'ME';
        $campo[4][0] = 'valor';
        $campo[4][1] = str_replace(',','.',str_replace('.','',$this->pos_chaves_prosoluto));
        $campo[5][0] = 'parcelas';
        $campo[5][1] = $this->parcelas_pos_chaves;
        $campo[6][0] = 'vencimento';
        $campo[6][1] = $this->php->inverteData($this->pos_chaves_vencimento);
        
        $ids_mensais .= $campo[0][1] . '#';

        $this->con1->executa('tb_detalhamento_parcelas',$campo);

      }


      // INSERE OS ID`s DE DETALHAMENTO DE PARCELAS NA TABELA DE NEGOCIAÇÃO DO PRÓ-SOLUTO
      if($ids_mensais || $ids_intermediarias || $ids_custas){
        $campo = null;
        $chave = null;

        $aux = 0;
        if($ids_mensais){
          $campo[$aux][0] = 'mensais';
          $campo[$aux][1] = $ids_mensais;
          $aux++;
        }
        if($ids_intermediarias){
          $campo[$aux][0] = 'intermediarias';
          $campo[$aux][1] = $ids_intermediarias;
          $aux++;
        }
        if($ids_custas){
          $campo[$aux][0] = 'custas';
          $campo[$aux][1] = $ids_custas;
          $aux++;
        }
        
        $chave[0][0] = 'id';
        $chave[0][1] = $id_negociacao_prosoluto;

        $this->con1->executa('tb_negociacao_prosoluto',$campo,$chave);
      }


      // INSERE O id_negociacao_prosoluto NA TABELA DO PROCESSO
      $campo = null;
      $chave = null;

      $campo[0][0] = 'negociacao_prosoluto';
      $campo[0][1] = $id_negociacao_prosoluto;

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo',$campo,$chave);

      
      
      /* ******************************************************* */
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      if($this->condicao_especial == 'S'){

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 11; // SOLICITAÇÃO DE CONDIÇÃO ESPECIAL - NEGOCIAÇÃO
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);
        
      }else{

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 15; // CONTRATO GERADO
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);

      }

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      if($this->condicao_especial == 'S'){
?>
        <script>
          alert("CONDIÇÃO ESPECIAL ENVIADA PARA ANÁLISE. AGUARDE RETORNO.");
          parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo; ?>";
        </script>
<?php
      }else{
?>
        <script>
          alert("NEGOCIAÇÃO APROVADA.\nCONTRATO GERADO.\n\nImprima o contrato a seguir, colha as assinaturas e carregue-o novamente no sistema.");
          parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=MTM=&id_processo=' . $this->id_processo; ?>";
        </script>
<?php
      }
      
//    }

    }

/*--------------------------------------------------------------------*/

/*-------------------------APROVA NEGOCIAÇÃO------------------------*/

    function visualiza_negociacao() {
    
      $this->con1->consulta("SELECT tb_processo.*, tb_empreendimento.nome as nome_empreendimento, tb_unidade.descricao as descricao_unidade, tb_sgg3_autenticacao.nome as nome_corretor, tb_empreendimento.previsao_entrega, tb_empreendimento.pos_chaves, tb_empreendimento.valor_pos_chaves, tb_empreendimento.parcelas_pos_chaves as parcelas_pos_chaves_empreendimento, tb_empreendimento.sinal, tb_empreendimento.valor_sinal, tb_empreendimento.pre_chaves, tb_empreendimento.valor_pre_chaves, tb_empreendimento.parcelas_pre_chaves as parcelas_pre_chaves_empreendimento, tb_empreendimento.intermediarias, tb_empreendimento.valor_intermediarias, tb_empreendimento.parcelas_intermediarias as parcelas_intermediarias_empreendimento, tb_empreendimento.chaves, tb_empreendimento.valor_chaves
                             FROM tb_processo
                             LEFT JOIN tb_empreendimento ON tb_processo.empreendimento = tb_empreendimento.id
                             LEFT JOIN tb_unidade ON tb_processo.unidade = tb_unidade.id
                             LEFT JOIN tb_sgg3_autenticacao ON tb_processo.corretor = tb_sgg3_autenticacao.id
                             WHERE tb_processo.id='" . $this->id_processo . "'");
      $this->con1->proxRegistro();

      // DADO DO PROCESSO
      $this->proponentes                  = $this->con1->data['proponentes'];
      $this->empreendimento               = $this->con1->data['empreendimento'];
      $this->nome_empreendimento          = $this->con1->data['nome_empreendimento'];
      $this->unidade                      = $this->con1->data['unidade'];
      $this->descricao_unidade            = $this->con1->data['descricao_unidade'];
      $this->n_proponentes                = $this->con1->data['n_proponentes'];
      $this->corretor                     = $this->con1->data['corretor'];
      $this->nome_corretor                = $this->con1->data['nome_corretor'];
      $this->observacao                   = $this->con1->data['observacao'];
      $this->aprovacao_contrato           = $this->con1->data['aprovacao_contrato'];
      $this->aprovacao_assinatura         = $this->con1->data['aprovacao_assinatura_ccv'];
      $this->condicao_especial            = $this->con1->data['condicao_especial'];
      $this->ativo_inativo                = $this->con1->data['ativo_inativo'];
      $this->evolucao                     = $this->con1->data['evolucao'];
      
      $arrProponentes = preg_split('/#/',$this->proponentes);
        

      // MONTA TELA DE EXIBIÇÃO DOS VALORES
      $txt_janela = '<h5>Tabela de Pagamento do Pró-soluto</h5><div id="content_tabela"></div>';
    if(!$this->aprovacao_contrato || $this->aprovacao_contrato == 'N'){
      if(!$this->aprovacao_contrato){
        $txt_janela .= '<input type="submit" id="contratar" value="ENVIAR PARA ANÁLISE" />';
      }else if($this->aprovacao_contrato == 'N'){
        $txt_janela .= '<input type="submit" id="contratar" value="CONTRATAR" />';
      }
    }
      $txt_janela .= '<input type="button" id="imprimir" value="IMPRIMIR" />';

      // MONTA TABELA DE EXIBIÇÃO DOS VALORES
      $txt_tabela = '';

      // DADOS PRÓ SOLUTO PROCESSO
    if($this->sinal == 'S'){
      if($this->zerar_sinal == 'S'){
        if($this->sinal > 0 && $this->sinal < 1){
          $this->sinal_prosoluto            = 0;
        }else{
          $this->sinal_prosoluto            = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
        }
      }else{
        $this->sinal_prosoluto              = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
      }
    }else{
      $this->sinal_prosoluto                = null;
    }
    
    if($this->sinal == 'S'){
      $this->vencimento_sinal               = str_replace('/','-',$this->php->inverteData($this->sinal_vencimento));
    }else{
      $this->vencimento_sinal               = null;
    }
      
    if($this->pre_chaves == 'S'){
      $this->pre_chaves_prosoluto           = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->pre_chaves_prosoluto)));
    }else{
      $this->pre_chaves_prosoluto           = null;
    }

    if($this->pre_chaves == 'S'){
      $this->parcelas_pre_chaves            = $this->parcelas_pre_chaves;
    }else{
      $this->parcelas_pre_chaves            = null;
    }
      
    if($this->pre_chaves == 'S'){
      $this->vencimento_pre_chaves          = date('Y-m-d', mktime(0, 0, 0, date(m) + 1, $this->php->strZero($this->pre_chaves_vencimento,2), date(Y)));
    }else{
      $this->vencimento_pre_chaves          = null;
    }
    
    if($this->pre_chaves_valor_d[0]){
      $this->detalhamento_pre_chaves        = 'S';
    }else{
      $this->detalhamento_pre_chaves        = 'N';
    }
    
    if($this->intermediarias == 'S'){
      $this->intermediarias_prosoluto       = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->intermediarias_prosoluto)));
    }else{
      $this->intermediarias_prosoluto       = null;
    }

    if($this->intermediarias == 'S'){
      $this->parcelas_intermediarias        = $this->parcelas_intermediarias;
    }else{
      $this->parcelas_intermediarias        = null;
    }

    if($this->intermediarias == 'S'){
      if($this->intermediarias_valor_d[0]){
        $this->vencimento_intermediarias    = str_replace('/','-',$this->php->inverteData($this->intermediarias_vencimento_d[0]));
      }else{
        $this->vencimento_intermediarias    = date('Y-m-d', mktime(0, 0, 0, date(m) + 2, $this->php->strZero($this->intermediarias_vencimento,2), date(Y)));
      }
    }else{
      $this->vencimento_intermediarias      = null;
    }
    
    if($this->intermediarias_valor_d[0]){
      $this->detalhamento_intermediarias    = 'S';
    }else{
      $this->detalhamento_intermediarias    = 'N';
    }
    
    if($this->intermediarias == 'S'){
      $this->periodicidade_intermediarias   = $this->periodicidade_intermediarias;
    }else{
      $this->periodicidade_intermediarias   = null;
    }
    
    if($this->subsidio_estadual > 0){
      $this->subsidio_estadual              = str_replace(',','.',str_replace('.','',$this->subsidio_estadual));
    }else{
      $this->subsidio_estadual              = null;
    }
    
    if($this->chaves == 'S'){
      $this->chaves_prosoluto               = str_replace(',','.',str_replace('.','',$this->chaves_prosoluto));
    }else{
      $this->chaves_prosoluto               = null;
    }

    if($this->chaves == 'S'){
      $this->vencimento_chaves              = str_replace('/','-',$this->php->inverteData($this->chaves_vencimento));
    }else{
      $this->vencimento_chaves              = null;
    }
    
    if($this->pos_chaves == 'S'){
      $this->pos_chaves_prosoluto           = str_replace(',','.',str_replace('.','',$this->pos_chaves_prosoluto));
    }else{
      $this->pos_chaves_prosoluto           = null;
    }
    
    if($this->pos_chaves == 'S'){
      $this->parcelas_pos_chaves            = $this->parcelas_pos_chaves;
    }else{
      $this->parcelas_pos_chaves            = null;
    }

    if($this->pos_chaves == 'S'){
      $this->vencimento_pos_chaves          = str_replace('/','-',$this->php->inverteData($this->pos_chaves_vencimento));
    }else{
      $this->vencimento_pos_chaves          = null;
    }
    
    if($this->cobranca_custas == 'S'){
      $this->mensal_custas                  = str_replace(',','.',str_replace('.','',$this->mensal_custas));
    }else{
      $this->mensal_custas                  = null;
    }

    if($this->cobranca_custas == 'S'){
      $this->parcelamento_custas            = $this->parcelamento_custas;
    }else{
      $this->parcelamento_custas            = null;
    }

    if($this->cobranca_custas == 'S'){
      $this->vencimento_custas              = str_replace('/','-',$this->php->inverteData($this->vencimento_custas));
    }else{
      $this->vencimento_custas              = null;
    }
    
    if($this->cobranca_custas == 'S'){
      $this->detalhamento_custas            = $this->detalhamento_custas;
    }else{
      $this->parcelamento_custas            = null;
    }
    
    if($this->cobranca_custas == 'S'){
      $this->periodicidade_custas           = $this->periodicidade_custas;
    }else{
      $this->periodicidade_custas           = null;
    }
    
    if($this->cobranca_custas == 'S'){
      $this->juros_custas                   = $this->juros_custas;
    }else{
      $this->juros_custas                   = null;
    }
    
      $cont_parcelas = 1;
      $detalhes_parcelas = array();

      // SINAL
      if($this->sinal_prosoluto){
        $detalhes_parcelas[$cont_parcelas]['tipo'] = 'SINAL';
        $detalhes_parcelas[$cont_parcelas]['valor'] = $this->sinal_prosoluto;
        $detalhes_parcelas[$cont_parcelas]['vencimento'] = $this->vencimento_sinal;
        $cont_parcelas++;
      }

      // PRÉ-CHAVES
      if($this->pre_chaves_prosoluto){
        $soma_pre_chaves = 0;
        if($this->detalhamento_pre_chaves == 'S'){
          if($this->pre_chaves_valor_d[0] > 0){
            for($i=0;$i<sizeOf($this->pre_chaves_valor_d);$i++){
              $arrVencimentoPreChaves = split('-',str_replace('/','-',$this->php->inverteData($this->pre_chaves_vencimento_d[$i])));
              for($j=0;$j<$this->pre_chaves_parcelas_d[$i];$j++){
                $detalhes_parcelas[$cont_parcelas]['tipo'] = 'MENSAL';
                $detalhes_parcelas[$cont_parcelas]['valor'] = str_replace(',','.',str_replace('.','',$this->pre_chaves_valor_d[$i]));
                $detalhes_parcelas[$cont_parcelas]['vencimento'] = date('Y-m-d', mktime(0, 0, 0, $arrVencimentoPreChaves[1] + $j, $arrVencimentoPreChaves[2], $arrVencimentoPreChaves[0]));
                $cont_parcelas++;
              }
            }
          }
        }else{
          $arrVencimentoPreChaves = split('-',$this->vencimento_pre_chaves);
          for($i=0;$i<$this->parcelas_pre_chaves;$i++){
            $detalhes_parcelas[$cont_parcelas]['tipo'] = 'MENSAL';
            $detalhes_parcelas[$cont_parcelas]['valor'] = $this->pre_chaves_prosoluto;
            $detalhes_parcelas[$cont_parcelas]['vencimento'] = date('Y-m-d', mktime(0, 0, 0, $arrVencimentoPreChaves[1] + $i, $arrVencimentoPreChaves[2], $arrVencimentoPreChaves[0]));
            $soma_pre_chaves += $this->pre_chaves_prosoluto;
            $cont_parcelas++;
          }
        }
      }

      // INTERMEDIÁRIAS
      if($this->intermediarias_prosoluto){
        if($this->detalhamento_intermediarias == 'S'){
          if($this->intermediarias_valor_d[0] > 0){
            for($i=0;$i<sizeOf($this->intermediarias_valor_d);$i++){
              $arrVencimentoIntermediarias = split('-',str_replace('/','-',$this->php->inverteData($this->intermediarias_vencimento_d[$i])));

              $detalhes_parcelas[$cont_parcelas]['tipo'] = 'INTERMEDIÁRIA';
              $detalhes_parcelas[$cont_parcelas]['valor'] = str_replace(',','.',str_replace('.','',$this->intermediarias_valor_d[$i]));
              $detalhes_parcelas[$cont_parcelas]['vencimento'] = date('Y-m-d', mktime(0, 0, 0, $arrVencimentoIntermediarias[1], $arrVencimentoIntermediarias[2], $arrVencimentoIntermediarias[0]));
              $cont_parcelas++;

            }
          }
        }else{
          $arrVencimentoIntermediarias = split('-',$this->vencimento_intermediarias);
          for($i=0;$i<$this->parcelas_intermediarias;$i++){
            $detalhes_parcelas[$cont_parcelas]['tipo'] = 'INTERMEDIÁRIA';
            $detalhes_parcelas[$cont_parcelas]['valor'] = $this->intermediarias_prosoluto;
            $detalhes_parcelas[$cont_parcelas]['vencimento'] = date('Y-m-d', mktime(0, 0, 0, $arrVencimentoIntermediarias[1] + $i, $arrVencimentoIntermediarias[2], $arrVencimentoIntermediarias[0]));
            $soma_intermediarias += $this->intermediarias_prosoluto;
            $cont_parcelas++;
          }
        }
      }

      // SUBSIDIO ESTADUAL
      if($this->subsidio_estadual > 0){
        $detalhes_parcelas[$cont_parcelas]['tipo'] = 'SUBSÍDIO ESTADUAL';
        $detalhes_parcelas[$cont_parcelas]['valor'] = $this->subsidio_estadual;
        $detalhes_parcelas[$cont_parcelas]['vencimento'] = $this->php->inverteData($this->vencimento_subsidio);
        $cont_parcelas++;
      }

      // CHAVES
      if($this->chaves_prosoluto){
        $detalhes_parcelas[$cont_parcelas]['tipo'] = 'CHAVES';
        $detalhes_parcelas[$cont_parcelas]['valor'] = $this->chaves_prosoluto;
        $detalhes_parcelas[$cont_parcelas]['vencimento'] = $this->vencimento_chaves;
        $cont_parcelas++;
      }

      // PÓS CHAVES
      if($this->pos_chaves_prosoluto){
        $soma_pos_chaves = 0;
        $arrVencimentoPosChaves = split('-',$this->vencimento_pos_chaves);
        for($i=0;$i<$this->parcelas_pos_chaves;$i++){
          $detalhes_parcelas[$cont_parcelas]['tipo'] = 'MENSAL';
          $detalhes_parcelas[$cont_parcelas]['valor'] = $this->pos_chaves_prosoluto;
          $detalhes_parcelas[$cont_parcelas]['vencimento'] = date('Y-m-d', mktime(0, 0, 0, $arrVencimentoPosChaves[1] + $i, $arrVencimentoPosChaves[2], $arrVencimentoPosChaves[0]));
          $soma_pos_chaves += $this->pos_chaves_prosoluto;
          $cont_parcelas++;
        }
      }
      
      // CUSTAS
      if($this->mensal_custas > 0 && $this->parcelamento_custas > 0){
        $soma_custas = 0;
        $arrVencimentoCustas = split('-',$this->vencimento_custas);
        for($i=0;$i<$this->parcelamento_custas;$i++){
          $detalhes_parcelas[$cont_parcelas]['tipo'] = 'CUSTAS';
          $detalhes_parcelas[$cont_parcelas]['valor'] = $this->mensal_custas;
          $detalhes_parcelas[$cont_parcelas]['vencimento'] = date('Y-m-d', mktime(0, 0, 0, $arrVencimentoCustas[1] + $i, $arrVencimentoCustas[2], $arrVencimentoCustas[0]));
          $soma_custas += $this->mensal_custas;
          $cont_parcelas++;
        }
      }


      function cmp($a, $b){
        $order = 'vencimento';

        if ($a[$order] == $b[$order]) {
            return 0;
        }
        return ($a[$order] < $b[$order]) ? ($desc ? 1 : -1) : ($desc ? -1 : 1);
      }
      usort($detalhes_parcelas, "cmp");

      // SOMA VALORES DO PROSOLUTO
      $total_pro_soluto = 0;
      for($i=0;$i<sizeOf($detalhes_parcelas);$i++){
        $total_pro_soluto += $detalhes_parcelas[$i]['valor'];
      }
      
      $txt_tabela .= '<div style="float: left; display: table; font-size: 11px;"><b>Empreendimento:</b> ' . $this->nome_empreendimento . '<br />';
      $txt_tabela .= '<b>Unidade:</b> ' . $this->descricao_unidade . '<br />';
      $txt_tabela .= '<b>Corretor:</b> ' . $this->nome_corretor . '</div>';
      $txt_tabela .= '<div style="float: right; display: table; font-size: 11px; margin: 0px 0px 20px 0px;"><b>Proponentes:</b><br />';
      
      for($i=1;$i<sizeOf($arrProponentes)-1;$i++){

        $this->con1->consulta("SELECT nome, cpf, estado_civil FROM " . $this->tabela . " WHERE id='" . $arrProponentes[$i] . "'");
        $this->con1->proxRegistro();

        $txt_tabela .= $this->con1->data['cpf'] . ' - ' . $this->con1->data['nome'] . '&nbsp;&nbsp;&nbsp;<br />';
      }
      
      $txt_tabela .= '</div>';

      // EXIBE VALORES
//      $txt_tabela .= '<br />SI - VA: ' . $this->sinal_prosoluto;
//      $txt_tabela .= '<br />SI - VE: ' . $this->vencimento_sinal;
//      $txt_tabela .= '<br />PR - VA: ' . $this->pre_chaves_prosoluto;
//      $txt_tabela .= '<br />PR - PA: ' . $this->parcelas_pre_chaves;
//      $txt_tabela .= '<br />PR - VE: ' . $this->vencimento_pre_chaves;
//      $txt_tabela .= '<br />PR - DE: ' . $this->detalhamento_pre_chaves;
//      $txt_tabela .= '<br />IN - VA: ' . $this->intermediarias_prosoluto;
//      $txt_tabela .= '<br />IN - PA: ' . $this->parcelas_intermediarias;
//      $txt_tabela .= '<br />IN - VE: ' . $this->vencimento_intermediarias;
//      $txt_tabela .= '<br />IN - DE: ' . $this->detalhamento_intermediarias;
//      $txt_tabela .= '<br />IN - PE: ' . $this->periodicidade_intermediarias;
//      $txt_tabela .= '<br />CH - VA: ' . $this->chaves_prosoluto;
//      $txt_tabela .= '<br />CH - VE: ' . $this->vencimento_chaves;
//      $txt_tabela .= '<br />PO - VA: ' . $this->pos_chaves_prosoluto;
//      $txt_tabela .= '<br />PO - PA: ' . $this->parcelas_pos_chaves;
//      $txt_tabela .= '<br />PO - VE: ' . $this->vencimento_pos_chaves;
//      $txt_tabela .= '<br /><br /><br />';


      $txt_tabela .= '<table>';
      $txt_tabela .= '<tr>';
      $txt_tabela .= '<td rowspan="2" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>CONDIÇÃO</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td rowspan="2" align="center" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>VENCIMENTO</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td colspan="2" align="center" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>DO IMÓVEL</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td colspan="2" align="center" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>DESPESAS TRANSFERÊNCIA</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td rowspan="2" align="center" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>VALOR TOTAL(R$)</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '</tr>';
      $txt_tabela .= '<tr>';
      $txt_tabela .= '<td align="right" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>VALOR(R$)</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="center" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>CORREÇÃO</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="right" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>VALOR(R$)</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="center" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>CORREÇÃO</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '</tr>';


    $cont_correcao = 1;
    $exibe_sinal=0;
    $exibe_correcao=0;
    $vencimento_anterior = null;

    // QUANTIDADE DE CUSTAS
    $tipo_detalhe = array();
    foreach($detalhes_parcelas as $a){
      $tipo_detalhe[] = $a['tipo'];
    }
    $arrDetalhes = array_count_values($tipo_detalhe);
    $quantidade_custas = $arrDetalhes['CUSTAS'];

    // QUANTIDADE DE PARCELAS - AS CUSTAS
    $quantidade_parcelas = sizeOf($detalhes_parcelas) - $quantidade_custas;

    // VERIFICA QUAL QUANTIDADE DE PARCELAS É MAIOR PARA SER UTILIZADA NO FOR
    if($quantidade_parcelas >= $quantidade_custas){
      $total_parcelas = $quantidade_parcelas;
    }else{
      $total_parcelas = $quantidade_custas;
    }


    for($i=0;$i<sizeOf($detalhes_parcelas);$i++){
      if($detalhes_parcelas[$i]['tipo'] != 'CHAVES'){

        if($detalhes_parcelas[$i]['tipo'] != 'CUSTAS'){

          $vencimento_atual = $detalhes_parcelas[$i]['vencimento'];
          if(substr($vencimento_anterior,0,7) == substr($vencimento_atual,0,7)){
            $cor_linha = '#eee';
          }else{
            $cor_linha = '#fff';
            $vencimento_anterior = $vencimento_atual;
          }
      $txt_tabela .= '<tr>';
      $txt_tabela .= '<td>';
      $txt_tabela .= '<b>' . $detalhes_parcelas[$i]['tipo'] . '</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="center" style="background: ' . $cor_linha . '">';
      $txt_tabela .= $this->php->inverteData($detalhes_parcelas[$i]['vencimento']);
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="right">';
      $txt_tabela .= number_format($detalhes_parcelas[$i]['valor'],2,',','.');
      $txt_tabela .= '</td>';
          if($detalhes_parcelas[$i]['tipo'] == 'SINAL'){
      $txt_tabela .= '<td align="center">';
      $txt_tabela .= '<span>SEM CORREÇÃO</span>';
      $txt_tabela .= '</td>';
      $exibe_sinal = 1;
          }else{
            if($exibe_sinal == 1 && $exibe_correcao == 0){
      $txt_tabela .= '<td rowspan="' . (sizeOf($detalhes_parcelas) - $cont_correcao) . '" align="center" class="rotate">';
      $txt_tabela .= '<div>ATÉ A ENTREGA CHAVES: INCC<br />';
      $txt_tabela .= 'APÓS A ENTREGA CHAVES: IGPM+1%</div>';
      $txt_tabela .= '</td>';
      $exibe_correcao = 1;
            }else{
              if($cont_correcao == 1){
      $txt_tabela .= '<td align="center">';
      $txt_tabela .= '<span>INCC</span>';
      $txt_tabela .= '</td>';
              }
            }
            $cont_correcao++;
          }

          if($detalhes_parcelas[$i+1]['tipo'] == 'CUSTAS' && $detalhes_parcelas[$i+1]['vencimento'] == $detalhes_parcelas[$i]['vencimento']){
      $txt_tabela .= '<td align="right">';
      $txt_tabela .= number_format($detalhes_parcelas[$i+1]['valor'],2,',','.');
      $txt_tabela .= '</td>';
            if($i == 0){
      $txt_tabela .= '<td rowspan="' . (sizeOf($detalhes_parcelas) + 1) . '" align="center" class="rotate">';
      $txt_tabela .= '<div>1% AO MÊS</div>';
      $txt_tabela .= '</td>';
            }
      $txt_tabela .= '<td align="right">';
      $txt_tabela .= number_format(($detalhes_parcelas[$i]['valor'] + $detalhes_parcelas[$i+1]['valor']),2,',','.');
      $txt_tabela .= '</td>';
          }else if($detalhes_parcelas[$i-1]['tipo'] == 'CUSTAS' && $detalhes_parcelas[$i-1]['vencimento'] == $detalhes_parcelas[$i]['vencimento']){
      $txt_tabela .= '<td align="right">';
      $txt_tabela .= number_format($detalhes_parcelas[$i-1]['valor'],2,',','.');
      $txt_tabela .= '</td>';
            if($i == 0){
      $txt_tabela .= '<td rowspan="' . (sizeOf($detalhes_parcelas) + 1) . '" align="center" class="rotate">';
      $txt_tabela .= '<div>1% AO MÊS</div>';
      $txt_tabela .= '</td>';
            }
      $txt_tabela .= '<td align="right">';
      $txt_tabela .= number_format(($detalhes_parcelas[$i]['valor'] + $detalhes_parcelas[$i-1]['valor']),2,',','.');
      $txt_tabela .= '</td>';
          }else{
      $txt_tabela .= '<td align="center">';
      $txt_tabela .= '-';
      $txt_tabela .= '</td>';
            if($i == 0){
      $txt_tabela .= '<td rowspan="' . (sizeOf($detalhes_parcelas) + 1) . '" align="center" class="rotate2">';
      $txt_tabela .= '<div>1% AO MÊS</div>';
      $txt_tabela .= '</td>';
            }
      $txt_tabela .= '<td align="right">';
      $txt_tabela .= number_format($detalhes_parcelas[$i]['valor'],2,',','.');
      $txt_tabela .= '</td>';
          }
      $txt_tabela .= '</tr>';
        }else if($detalhes_parcelas[$i]['tipo'] == 'CUSTAS' && ($detalhes_parcelas[$i]['vencimento'] != $detalhes_parcelas[$i-1]['vencimento']) && ($detalhes_parcelas[$i]['vencimento'] != $detalhes_parcelas[$i+1]['vencimento'])){
      $txt_tabela .= '<tr>';
      $txt_tabela .= '<td>';
      $txt_tabela .= '<b>MENSAL</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="center" style="background: ' . $cor_linha . '">';
      $txt_tabela .= $this->php->inverteData($detalhes_parcelas[$i]['vencimento']);
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="center">';
      $txt_tabela .= '-';
      $txt_tabela .= '</td>';
    if($i<=1){
      $txt_tabela .= '<td rowspan="' . ($quantidade_custas + 1) . '">';
      $txt_tabela .= '</td>';
    }
      $txt_tabela .= '<td align="right">';
      $txt_tabela .= number_format($detalhes_parcelas[$i]['valor'],2,',','.');
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="right">';
      $txt_tabela .= number_format($detalhes_parcelas[$i]['valor'],2,',','.');
      $txt_tabela .= '</td>';
      $txt_tabela .= '</tr>';
        }
      }else{
        $valor_chaves = $detalhes_parcelas[$i]['valor'];
        $vencimento_chaves = $detalhes_parcelas[$i]['vencimento'];
      }
    }
      $txt_tabela .= '<tr>';
      $txt_tabela .= '<td colspan="2">';
      $txt_tabela .= '<b>ENTREGA DAS CHAVES</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="right">';
      $txt_tabela .= number_format($valor_chaves,2,',','.');
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="center">';
      $txt_tabela .= '-';
      $txt_tabela .= '</td>';
    if($i == 0){
      $txt_tabela .= '<td rowspan="' . (sizeOf($detalhes_parcelas) + 1) . '" align="center" class="rotate">';
      $txt_tabela .= '<div>1% AO MÊS</div>';
      $txt_tabela .= '</td>';
    }
      $txt_tabela .= '<td align="center">';
      $txt_tabela .= '-';
      $txt_tabela .= '</td>';
      $txt_tabela .= '</tr>';
      $txt_tabela .= '</table>';

/*
      $txt_tabela .= '<table>';
      $txt_tabela .= '<tr>';
      $txt_tabela .= '<td style="background: #666; color: #fff">';
      $txt_tabela .= '<b>CONDIÇÃO</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="center" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>VENCIMENTO</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="right" style="background: #666; color: #fff">';
      $txt_tabela .= '<b>VALOR(R$)</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '<td align="center" style="width: 20%; background: #666; color: #fff">';
      $txt_tabela .= '<b>CORREÇÃO</b>';
      $txt_tabela .= '</td>';
      $txt_tabela .= '</tr>';

      $cont_correcao = 1;
      $exibe_sinal=0;
      $exibe_correcao=0;
      $vencimento_anterior = null;
      for($i=0;$i<sizeOf($detalhes_parcelas);$i++){
        if($detalhes_parcelas[$i]['tipo'] != 'CHAVES'){
          $vencimento_atual = $detalhes_parcelas[$i]['vencimento'];
          if(substr($vencimento_anterior,0,7) == substr($vencimento_atual,0,7)){
            $cor_linha = '#eee';
          }else{
            $cor_linha = '#fff';
            $vencimento_anterior = $vencimento_atual;
          }

          $txt_tabela .= '<tr>';
          $txt_tabela .= '<td>';
          $txt_tabela .= '<b>' . $detalhes_parcelas[$i]['tipo'] . '</b>';
          $txt_tabela .= '</td>';
          $txt_tabela .= '<td align="center" style="background: ' . $cor_linha . '">';
          $txt_tabela .= $this->php->inverteData($detalhes_parcelas[$i]['vencimento']);
          $txt_tabela .= '</td>';
          $txt_tabela .= '<td align="right">';
          $txt_tabela .= number_format($detalhes_parcelas[$i]['valor'],2,',','.');
          $txt_tabela .= '</td>';

          if($detalhes_parcelas[$i]['tipo'] == 'SINAL'){

            $txt_tabela .= '<td align="center">';
            $txt_tabela .= '<span>SEM CORREÇÃO</span>';
            $txt_tabela .= '</td>';

            $exibe_sinal = 1;

          }else{

            if($exibe_sinal == 1 && $exibe_correcao == 0){

              $txt_tabela .= '<td rowspan="' . intval(sizeOf($detalhes_parcelas) - $cont_correcao) . '" align="center" class="rotate">';
              $txt_tabela .= '<div>ATÉ A ENTREGA CHAVES: INCC<br />';
              $txt_tabela .= 'APÓS A ENTREGA CHAVES: IGPM+1%</div>';
              $txt_tabela .= '</td>';

              $exibe_correcao = 1;
            }else{
              if($cont_correcao == 1){

                $txt_tabela .= '<td align="center">';
                $txt_tabela .= '<span>INCC</span>';
                $txt_tabela .= '</td>';

              }
            }
            $cont_correcao++;
          }

          $txt_tabela .= '</tr>';

        }else{
          $valor_chaves = $detalhes_parcelas[$i]['valor'];
          $vencimento_chaves = $detalhes_parcelas[$i]['vencimento'];
        }
      }

      if($valor_chaves > 0){
        $txt_tabela .= '<tr>';
        $txt_tabela .= '<td colspan="2">';
        $txt_tabela .= '<b>ENTREGA DAS CHAVES</b>';
        $txt_tabela .= '</td>';
        $txt_tabela .= '<td align="right">';
        $txt_tabela .= number_format($valor_chaves,2,',','.');
        $txt_tabela .= '</td>';
        $txt_tabela .= '</tr>';
      }
      $txt_tabela .= '</table>';
*/
      $txt_tabela .= '</div>';

?>
      <script>
        <?php if(!$this->aprovacao_contrato){ ?>

        /* TRAVA NOVAMENTE OS CAMPOS NECESSÁRIOS */
//        $('#campo_313',parent.document).prop('disabled','true');

        <?php if($this->pre_chaves != 'S'){ ?>
        $('#campo_316',parent.document).prop('disabled','true');  // VALOR PRÉ-CHAVES
        $('#campo_317',parent.document).prop('disabled','true');  // PARCELAS PRÉ-CHAVES
        $('#campo_317v',parent.document).prop('disabled','true'); // VENCIMENTO PRÉ-CHAVES
        <?php } ?>

        <?php if($this->intermediarias != 'S'){ ?>
        $('#campo_319',parent.document).prop('disabled','true');  // VALOR INTERMEDIÁRIAS
        $('#campo_320',parent.document).prop('disabled','true');  // PARCELAS INTERMEDIÁRIAS
        $('#campo_320v',parent.document).prop('disabled','true'); // VENCIMENTO INTERMEDIÁRIAS
        $('#campo_321',parent.document).prop('disabled','true');  // PERIODICIDADE INTERMEDIÁRIAS
        <?php } ?>

        <?php if($this->chaves != 'S'){ ?>
        $('#campo_322',parent.document).prop('disabled','true');  // VALOR CHAVES
        $('#campo_323v',parent.document).prop('disabled','true'); // VENCIMENTO CHAVES
        <?php } ?>

        <?php if($this->pos_chaves != 'S'){ ?>
        $('#campo_325',parent.document).prop('disabled','true');
        $('#campo_326',parent.document).prop('disabled','true');
        $('#campo_326v',parent.document).prop('disabled','true');
        <?php } ?>
        
        <?php if($this->cobranca_custas != 'S'){ ?>
        $('#campo_325a_custas',parent.document).prop('disabled','true');
        $('#campo_325_custas',parent.document).prop('disabled','true');
        $('#campo_326_custas',parent.document).prop('disabled','true');
        $('#campo_326v_custas',parent.document).prop('disabled','true');
        $('#campo_327_custas',parent.document).prop('disabled','true');
        $('#campo_328_custas',parent.document).prop('disabled','true');
        <?php } ?>

        // DESABILITA OS CAMPOS DO DETALHAMENTO DE PRÉ-CHAVES
        <?php if($this->pre_chaves == 'S' && !$this->pre_chaves_valor_d[0]){ ?>
        $('input[id^="campo_316d"]',parent.document).prop('disabled','true');
        $('input[id^="campo_317d"]',parent.document).prop('disabled','true');
        $('input[id^="campo_317vd"]',parent.document).prop('disabled','true');
        <?php }else if($this->pre_chaves == 'S' && $this->pre_chaves_valor_d[0]){ ?>
        $('#campo_316',parent.document).prop('disabled','true');  // VALOR PRÉ-CHAVES
        $('#campo_316',parent.document).prop('placeholder',$('#campo_316',parent.document).val());
        $('#campo_316',parent.document).prop('value','');
        $('#campo_317',parent.document).prop('disabled','true');  // PARCELAS PRÉ-CHAVES
        $('#campo_317v',parent.document).prop('disabled','true'); // VENCIMENTO PRÉ-CHAVES
        <?php } ?>

        // DESABILITA OS CAMPOS DO DETALHAMENTO DE INTERMEDIÁRIAS
        <?php if($this->intermediarias == 'S' && !$this->intermediarias_valor_d[0]){ ?>
        $('input[id^="campo_319d"]',parent.document).removeAttr('disabled');
        $('input[id^="campo_320d"]',parent.document).removeAttr('disabled');
        $('input[id^="campo_320vd"]',parent.document).removeAttr('disabled');
        <?php }else if($this->intermediarias == 'S' && $this->intermediarias_valor_d[0]){ ?>
        $('#campo_319',parent.document).prop('disabled','true');  // VALOR INTERMEDIÁRIAS
        $('#campo_319',parent.document).prop('placeholder',$('#campo_319',parent.document).val());
        $('#campo_319',parent.document).prop('value','');
        $('#campo_320',parent.document).prop('disabled','true');  // PARCELAS INTERMEDIÁRIAS
        $('#campo_320v',parent.document).prop('disabled','true'); // VENCIMENTO INTERMEDIÁRIAS
        $('#campo_321',parent.document).prop('disabled','true');  // PERIODICIDADE INTERMEDIÁRIAS
        <?php } ?>
        
        <?php }else{ ?>
        
        /* TRAVA NOVAMENTE OS CAMPOS NECESSÁRIOS */
//        $('#campo_313',parent.document).prop('disabled','true');

        $('#campo_316',parent.document).prop('disabled','true');  // VALOR PRÉ-CHAVES
        $('#campo_317',parent.document).prop('disabled','true');  // PARCELAS PRÉ-CHAVES
        $('#campo_317v',parent.document).prop('disabled','true'); // VENCIMENTO PRÉ-CHAVES

        $('#campo_319',parent.document).prop('disabled','true');  // VALOR INTERMEDIÁRIAS
        $('#campo_320',parent.document).prop('disabled','true');  // PARCELAS INTERMEDIÁRIAS
        $('#campo_320v',parent.document).prop('disabled','true'); // VENCIMENTO INTERMEDIÁRIAS
        $('#campo_321',parent.document).prop('disabled','true');  // PERIODICIDADE INTERMEDIÁRIAS

        $('#campo_322',parent.document).prop('disabled','true');  // VALOR CHAVES
        $('#campo_323v',parent.document).prop('disabled','true'); // VENCIMENTO CHAVES

        $('#campo_325',parent.document).prop('disabled','true');
        $('#campo_326',parent.document).prop('disabled','true');
        $('#campo_326v',parent.document).prop('disabled','true');
        
        $('#campo_325a_custas',parent.document).prop('disabled','true');
        $('#campo_325_custas',parent.document).prop('disabled','true');
        $('#campo_326_custas',parent.document).prop('disabled','true');
        $('#campo_326v_custas',parent.document).prop('disabled','true');
        $('#campo_327_custas',parent.document).prop('disabled','true');
        $('#campo_328_custas',parent.document).prop('disabled','true');

        // DESABILITA OS CAMPOS DO DETALHAMENTO DE PRÉ-CHAVES
        <?php if($this->detalhamento_pre_chaves == 'S'){ ?>
        $('#campo_316',parent.document).prop('placeholder',$('#campo_316',parent.document).val());
        $('#campo_316',parent.document).prop('value','');
        <?php } ?>
        $('input[id^="campo_316d"]',parent.document).prop('disabled','true');
        $('input[id^="campo_317d"]',parent.document).prop('disabled','true');
        $('input[id^="campo_317vd"]',parent.document).prop('disabled','true');

        // DESABILITA OS CAMPOS DO DETALHAMENTO DE INTERMEDIÁRIAS
        <?php if($this->detalhamento_intermediarias == 'S'){ ?>
        $('#campo_319',parent.document).prop('placeholder',$('#campo_319',parent.document).val());
        $('#campo_319',parent.document).prop('value','');
        <?php } ?>
        $('input[id^="campo_319d"]',parent.document).prop('disabled','true');
        $('input[id^="campo_320d"]',parent.document).prop('disabled','true');
        $('input[id^="campo_320vd"]',parent.document).prop('disabled','true');

        <?php } ?>

      
        /* ABRE JANELA DE CONFERÊNCIA DOS VALORES */
        $("#conteudo_janela",parent.document).html('<?php echo $txt_janela; ?>');
        $("#content_tabela",parent.document).html('<?php echo $txt_tabela; ?>');
        $("#janela",parent.document).show();
        $("#imprimir",parent.document).click(function(){
          $("#content_tabela",parent.document).printThis({
            debug: false,              /* show the iframe for debugging */
            importCSS: true,           /* import page CSS */
            printContainer: false,      /* grab outer container as well as the contents of the selector */
            loadCSS: "http://viasul.g3server.com.br/css/relatorios/tabela_prosoluto.css", /* path to additional css file */
            pageTitle: "",             /* add title to print page */
            removeInline: false        /* remove all inline styles from print elements */
          });
        });
        
        /* SE PRESSIONAR O BOTÃO CONTRATAR */
        $("#contratar",parent.document).click(function(){
        
          /* DESBLOQUEIA OS CAMPOS PARA O SUBMIT */
          $('#campo_313',parent.document).removeAttr('disabled');  // VALOR SINAL
          $('#campo_314v',parent.document).removeAttr('disabled');  // VENCIMENTO SINAL

          $('#campo_316',parent.document).removeAttr('disabled');  // VALOR PRÉ-CHAVES
        if(!$('#campo_316',parent.document).val() && $('#detalhamento_pre_chaves',parent.document).is(":visible")){
          $('#campo_316',parent.document).prop('value',$('#campo_316',parent.document).prop('placeholder'));
        }
          $('#campo_317',parent.document).removeAttr('disabled');
          $('#campo_317v',parent.document).removeAttr('disabled'); // VENCIMENTO PRÉ-CHAVES

          $('#campo_319',parent.document).removeAttr('disabled');  // VALOR INTERMEDIÁRIAS
        if(!$('#campo_319',parent.document).val() && $('#detalhamento_intermediarias',parent.document).is(":visible")){
          $('#campo_319',parent.document).prop('value',$('#campo_319',parent.document).prop('placeholder'));
        }
          $('#campo_320',parent.document).removeAttr('disabled');
          $('#campo_320v',parent.document).removeAttr('disabled'); // VENCIMENTO INTERMEDIÁRIAS
          $('#campo_321',parent.document).removeAttr('disabled');  // PERIODICIDADE INTERMEDIÁRIAS

          $('#campo_322',parent.document).removeAttr('disabled');
          $('#campo_323v',parent.document).removeAttr('disabled');

          $('#campo_325',parent.document).removeAttr('disabled');
          $('#campo_326',parent.document).removeAttr('disabled');
          $('#campo_326v',parent.document).removeAttr('disabled');
          
          $('#campo_325a_custas',parent.document).removeAttr('disabled');
          $('#campo_325_custas',parent.document).removeAttr('disabled');
          $('#campo_326_custas',parent.document).removeAttr('disabled');
          $('#campo_326v_custas',parent.document).removeAttr('disabled');
          $('#campo_327_custas',parent.document).removeAttr('disabled');
          $('#campo_328_custas',parent.document).removeAttr('disabled');

          // DESABILITA OS CAMPOS DO DETALHAMENTO DE PRÉ-CHAVES
          $('input[id^="campo_316d"]',parent.document).removeAttr('disabled');
          $('input[id^="campo_317d"]',parent.document).removeAttr('disabled');
          $('input[id^="campo_317vd"]',parent.document).removeAttr('disabled');

          // DESABILITA OS CAMPOS DO DETALHAMENTO DE INTERMEDIÁRIAS
          $('input[id^="campo_319d"]',parent.document).removeAttr('disabled');
          $('input[id^="campo_320d"]',parent.document).removeAttr('disabled');
          $('input[id^="campo_320vd"]',parent.document).removeAttr('disabled');
        
          $("#opcao",parent.document).prop('value','registra_negociacao');
          $("#form_cadastro",parent.document).prop('target','_parent');
          $("#form_cadastro",parent.document).submit();
        });
      </script>
<?php

    }
    
/*--------------------------------------------------------------------*/


/*-------------------------APROVA NEGOCIAÇÃO------------------------*/

    function aprova_negociacao() {

      $campo = null;
      $chave = null;

      $aux = 0;

      $campo[$aux][0] = 'aprovacao_contrato';
    if($this->aprova_condicao_especial == 'S'){
      $campo[$aux][1] = 'N';
    }else if($this->aprova_condicao_especial == 'N'){
      $campo[$aux][1] = 'R';
    }
      $aux++;

    if($this->aprova_condicao_especial == 'S'){

      $campo[$aux][0] = 'sinal_prosoluto';
    if($this->sinal == 'S'){
      if($this->zerar_sinal == 'S'){
        if($this->sinal > 0 && $this->sinal < 1){
          $campo[$aux][1] = 0;
        }else{
          $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
        }
      }else{
        $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));
      }
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'vencimento_sinal';
    if($this->sinal == 'S'){
      $campo[$aux][1] = $this->php->inverteData($this->sinal_vencimento);
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'pre_chaves_prosoluto';
    if($this->pre_chaves == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->pre_chaves_prosoluto)));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'parcelas_pre_chaves';
    if($this->pre_chaves == 'S'){
      $campo[$aux][1] = $this->parcelas_pre_chaves;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'vencimento_pre_chaves';
    if($this->pre_chaves == 'S'){
      if($this->pre_chaves_valor_d[0]){
        $campo[$aux][1] = $this->php->inverteData($this->pre_chaves_vencimento_d[0]);
      }else{
        $campo[$aux][1] = date('Y-m-d', mktime(0, 0, 0, date(m) + 1, $this->php->strZero($this->pre_chaves_vencimento,2), date(Y)));
      }
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'detalhamento_pre_chaves';
    if($this->pre_chaves_valor_d[0]){
      $campo[$aux][1] = 'S';
    }else{
      $campo[$aux][1] = 'N';
    }
      $aux++;

      $campo[$aux][0] = 'intermediarias_prosoluto';
    if($this->intermediarias == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',str_replace('T: ','',$this->intermediarias_prosoluto)));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'vencimento_intermediarias';
    if($this->intermediarias == 'S'){
      if($this->intermediarias_valor_d[0]){
        $campo[$aux][1] = $this->php->inverteData($this->intermediarias_vencimento_d[0]);
      }else{
        $campo[$aux][1] = date('Y-m-d', mktime(0, 0, 0, date(m) + 2, $this->php->strZero($this->intermediarias_vencimento,2), date(Y)));
      }
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'parcelas_intermediarias';
    if($this->intermediarias == 'S'){
      $campo[$aux][1] = $this->parcelas_intermediarias;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'periodicidade_intermediarias';
    if($this->intermediarias == 'S'){
      $campo[$aux][1] = $this->periodicidade_intermediarias;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'detalhamento_intermediarias';
    if($this->intermediarias_valor_d[0]){
      $campo[$aux][1] = 'S';
    }else{
      $campo[$aux][1] = 'N';
    }
      $aux++;

      $campo[$aux][0] = 'chaves_prosoluto';
    if($this->chaves == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->chaves_prosoluto));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'vencimento_chaves';
    if($this->chaves == 'S'){
      $campo[$aux][1] = $this->php->inverteData($this->chaves_vencimento);
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'pos_chaves_prosoluto';
    if($this->pos_chaves == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->pos_chaves_prosoluto));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'parcelas_pos_chaves';
    if($this->pos_chaves == 'S'){
      $campo[$aux][1] = $this->parcelas_pos_chaves;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'vencimento_pos_chaves';
    if($this->pos_chaves == 'S'){
      $campo[$aux][1] = $this->php->inverteData($this->pos_chaves_vencimento);
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      
      $campo[$aux][0] = 'mensal_custas';
    if($this->cobranca_custas == 'S'){
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->mensal_custas));
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'parcelamento_custas';
    if($this->cobranca_custas == 'S'){
      $campo[$aux][1] = $this->parcelamento_custas;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'vencimento_custas';
    if($this->cobranca_custas == 'S'){
      $campo[$aux][1] = $this->php->inverteData($this->vencimento_custas);
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;
      
      $campo[$aux][0] = 'detalhamento_custas';
    if($this->custas_valor_d[0]){
      $campo[$aux][1] = 'S';
    }else{
      $campo[$aux][1] = 'N';
    }
      $aux++;
      
      $campo[$aux][0] = 'periodicidade_custas';
    if($this->cobranca_custas == 'S'){
      $campo[$aux][1] = $this->periodicidade_custas;
    }else{
      $campo[$aux][1] = 'null';
    }
      $aux++;

      $campo[$aux][0] = 'juros_custas';
    if($this->cobranca_custas == 'S'){
      if($this->juros_custas == 'S'){
        $campo[$aux][1] = 'S';
      }else{
        $campo[$aux][1] = 'N';
      }
    }else{
      $campo[$aux][1] = 'S';
    }
      $aux++;


    }

    if($this->justificativa_condicao_especial){
      $campo[$aux][0] = 'justificativa_condicao_especial';
      $campo[$aux][1] = $this->justificativa_condicao_especial;
      $aux++;
    }

    if(!$this->aprovacao_avalista){
      $campo[$aux][0] = 'exige_avalista';
    if($this->exige_avalista == 'S'){
      $campo[$aux][1] = 'S';
      $aux++;
      $campo[$aux][0] = 'quantidade_avalistas';
      $campo[$aux][1] = 1;
    }else{
      $campo[$aux][1] = 'N';
    }
      $aux++;
    }
    
    if($this->aprovacao_avalista){
      $campo[$aux][0] = 'aprovacao_avalista';
      $campo[$aux][1] = $this->aprovacao_avalista;
      $aux++;
    }
    
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 5;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 17: APROVADO PELA INSTITUIÇÃO FINANCEIRA | EVOLUÇÃO 16: REPROVADO PELA INSTITUIÇÃO FINANCEIRA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = null;
      if($this->nivel_pre_venda == 0 || $this->nivel_pre_venda == 3){
        // CONDIÇÃO ESPECIAL APROVADA
        if($this->aprova_condicao_especial == 'S'){
          $evolucao_etapa_workflow = 20;
        // CONDIÇÃO ESPECIAL REPROVADA
        }else if($this->aprova_condicao_especial == 'N'){
          $evolucao_etapa_workflow = 19;
        }
      }else if($this->nivel_pre_venda == 1){
        // CONDIÇÃO ESPECIAL DE RESERVA APROVADA
        if($this->aprova_condicao_especial == 'S'){
          $evolucao_etapa_workflow = 5;
        // CONDIÇÃO ESPECIAL DE RESERVA REPROVADA
        }else if($this->aprova_condicao_especial == 'N'){
          $evolucao_etapa_workflow = 4;
        }
      }
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

//      AJUSTES NA CONDIÇÃO ESPECIAL
//      print_r($campo);
//      print_r($chave);
//      die();

      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // CASO O EMPREENDIMENTO ESTEJA CONFIGURADO PARA ZERAR O SINAL EM CASO DE CENTAVOS, E ESTE SEJA O CASO, AJUSTA O VALOR DA UNIDADE AQUI
      if($this->zerar_sinal == 'S'){
        if($this->sinal > 0 && $this->sinal < 1){
          if($this->unidade_interesse){
            $this->con1->consulta("SELECT valor FROM tb_unidade WHERE id='" . $this->unidade_interesse . "'");
            $this->con1->proxRegistro();

            $campo = null;
            $chave = null;

            $novo_valor_unidade = $this->con1->data['valor'] - str_replace(',','.',str_replace('.','',$this->sinal_prosoluto));

            $campo[0][0] = 'valor';
            $campo[0][1] = $novo_valor_unidade;

            $chave[0][0] = 'id';
            $chave[0][1] = $this->unidade_interesse;

            $this->con1->executa('tb_unidade', $campo, $chave);
          }
        }
      }


      // EXCLUI INSERÇÕES ANTERIORES DESSE PROCESSO CASO HAJAM
      $this->con1->execSql("","DELETE FROM tb_detalhamento_parcelas WHERE processo='" . $this->id_processo . "'");

      // DETALHAMENTO PRÉ-CHAVES
      if($this->pre_chaves_valor_d[0] > 0){

        for($i=0;$i<sizeOf($this->pre_chaves_valor_d);$i++){
          if($this->pre_chaves_parcelas_d[$i] > 0){
            $campo = null;
            $chave = null;

            $campo[0][0] = 'id';
            $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas', 'id');
            $campo[1][0] = 'processo';
            $campo[1][1] = $this->id_processo;
            $campo[2][0] = 'tipo_parcela';
            $campo[2][1] = 'PR';
            $campo[3][0] = 'valor';
            $campo[3][1] = str_replace(',','.',str_replace('.','',$this->pre_chaves_valor_d[$i]));
            $campo[4][0] = 'parcelas';
            $campo[4][1] = $this->pre_chaves_parcelas_d[$i];
            $campo[5][0] = 'vencimento';
            $campo[5][1] = $this->php->inverteData($this->pre_chaves_vencimento_d[$i]);

            $this->con1->executa('tb_detalhamento_parcelas', $campo);
          }

        }
      }


      // DETALHAMENTO INTERMEDIÁRIAS
      if($this->intermediarias_valor_d[0] > 0){

        for($i=0;$i<sizeOf($this->intermediarias_valor_d);$i++){
          $campo = null;
          $chave = null;

          $campo[0][0] = 'id';
          $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas', 'id');
          $campo[1][0] = 'processo';
          $campo[1][1] = $this->id_processo;
          $campo[2][0] = 'tipo_parcela';
          $campo[2][1] = 'IN';
          $campo[3][0] = 'valor';
          $campo[3][1] = str_replace(',','.',str_replace('.','',$this->intermediarias_valor_d[$i]));
          $campo[4][0] = 'parcelas';
          $campo[4][1] = 1;
          $campo[5][0] = 'vencimento';
          $campo[5][1] = $this->php->inverteData($this->intermediarias_vencimento_d[$i]);

          $this->con1->executa('tb_detalhamento_parcelas', $campo);

        }
      }
      
      
      // DETALHAMENTO CUSTAS
      if($this->custas_valor_d[0] > 0){

        for($i=0;$i<sizeOf($this->custas_valor_d);$i++){
          $campo = null;
          $chave = null;

          $campo[0][0] = 'id';
          $campo[0][1] = $this->con1->lastId('tb_detalhamento_parcelas', 'id');
          $campo[1][0] = 'processo';
          $campo[1][1] = $this->id_processo;
          $campo[2][0] = 'tipo_parcela';
          $campo[2][1] = 'CS';
          $campo[3][0] = 'valor';
          $campo[3][1] = str_replace(',','.',str_replace('.','',$this->custas_valor_d[$i]));
          $campo[4][0] = 'parcelas';
          $campo[4][1] = 1;
          $campo[5][0] = 'vencimento';
          $campo[5][1] = $this->php->inverteData($this->custas_vencimento_d[$i]);

          $this->con1->executa('tb_detalhamento_parcelas', $campo);

//          echo '<br /><br />';
//          print_r($campo);

        }
      }
//      die();


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);

      
      // LOG EVOLUTIVO
      if($this->aprova_condicao_especial == 'S'){

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 12; // APROVAÇÃO DE CONDIÇÃO ESPECIAL - NEGOCIAÇÃO
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);

      }else if($this->aprova_condicao_especial == 'N'){

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 13; // REPROVAÇÃO DE CONDIÇÃO ESPECIAL - NEGOCIAÇÃO
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);

      }
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      if($this->aprova_condicao_especial == 'S'){
?>
        <script>
          alert("CONDIÇÃO ESPECIAL APROVADA.");
          parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo; ?>";
        </script>
<?php
      }else{
?>
        <script>
          alert("CONDIÇÃO ESPECIAL REPROVADA.");
          parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo; ?>";
        </script>
<?php
      }

    }

/*--------------------------------------------------------------------*/


/*-------------------------CANCELA NEGOCIAÇÃO------------------------*/

    function cancela_condicao_especial() {

      $campo = null;
      $chave = null;

      $aux = 0;

      $campo[$aux][0] = 'aprovacao_contrato';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'sinal_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_sinal';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'pre_chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelas_pre_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_pre_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'detalhamento_pre_chaves';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'intermediarias_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelas_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'periodicidade_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'detalhamento_intermediarias';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'pos_chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelas_pos_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_pos_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'mensal_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelamento_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_custas';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'detalhamento_custas';
      $campo[$aux][1] = 'null';
      $aux++;
      
      $campo[$aux][0] = 'periodicidade_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'condicao_especial';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'texto_condicao_especial';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'justificativa_condicao_especial';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'exige_avalista';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'evolucao';
      if($this->nivel_pre_venda == 0 || $this->nivel_pre_venda == 3){
        $campo[$aux][1] = 5;
      }else if($this->nivel_pre_venda == 1){
        $campo[$aux][1] = 0;
      }
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 17: APROVADO PELA INSTITUIÇÃO FINANCEIRA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = null;
      // APROVADO PELA INSTITUIÇÃO FINANCEIRA
      if($this->nivel_pre_venda == 0 || $this->nivel_pre_venda == 3){
        $evolucao_etapa_workflow = 17;
      // AGUARDANDO DOCUMENTAÇÃO
      }else if($this->nivel_pre_venda == 1){
        $evolucao_etapa_workflow = 1;
      }
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);
      
      // EXCLUI DETALHAENTOS DESSE PROCESSO CASO HAJAM
      $this->con1->execSql("","DELETE FROM tb_detalhamento_parcelas WHERE processo='" . $this->id_processo . "'");
      
      // EXCLUI AVALISTAS DESSE PROCESSO CASO HAJAM
      $this->con1->execSql("","DELETE FROM tb_avalista WHERE processo='" . $this->id_processo . "'");
      
      // LIBERA A UNIDADE DE INTERESSE
      if($this->unidade_interesse_cancelamento){
        $campo = null;
        $chave = null;
      
        $campo[0][0] = 'disponibilidade';
        $campo[0][1] = 'D';
      
        $chave[0][0] = 'id';
        $chave[0][1] = $this->unidade_interesse_cancelamento;
      
        $this->con1->executa('tb_unidade',$campo,$chave);
      }
      
      
      // REGISTRA O CANCELAMENTO
      $campo = null;
      $chave = null;

      $campo[0][0] = 'id';
      $campo[0][1] = $this->con1->lastId('tb_cancelamento_processo','id');
      $campo[1][0] = 'tipo';
      $campo[1][1] = 'N';
      $campo[2][0] = 'processo';
      $campo[2][1] = $this->id_processo;
      $campo[3][0] = 'motivo';
      $campo[3][1] = $this->motivo_cancelamento;
      $campo[4][0] = 'descricao';
      $campo[4][1] = $this->descricao_cancelamento;
      $campo[5][0] = 'data_hora';
      $campo[5][1] = date('Y-m-d H:i:s');

      $this->con1->executa('tb_cancelamento_processo',$campo);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      

      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 53; // CANCELAMENTO DE CONDIÇÃO ESPECIAL - NEGOCIAÇÃO
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);
      
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
?>
      <script>
        alert("NEGOCIAÇÃO CANCELADA.");
        parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=MTI=&id_processo=' . $this->id_processo; ?>";
      </script>
<?php

    }

/*--------------------------------------------------------------------*/

/*-------------------------CANCELA CONTRATO------------------------*/

    function cancela_negociacao() {

      $campo = null;
      $chave = null;

      $aux = 0;

      $campo[$aux][0] = 'aprovacao_contrato';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'data_venda';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'sinal_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_sinal';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'pre_chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelas_pre_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_pre_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'detalhamento_pre_chaves';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'intermediarias_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelas_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'periodicidade_intermediarias';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'detalhamento_intermediarias';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'pos_chaves_prosoluto';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelas_pos_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_pos_chaves';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'mensal_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'parcelamento_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'vencimento_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'detalhamento_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'periodicidade_custas';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'condicao_especial';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'texto_condicao_especial';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'justificativa_condicao_especial';
      $campo[$aux][1] = 'null';
      $aux++;

      $campo[$aux][0] = 'exige_avalista';
      $campo[$aux][1] = 'N';
      $aux++;

      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;

      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;

      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 5;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 17: APROVADO PELA INSTITUIÇÃO FINANCEIRA | EVOLUÇÃO 16: REPROVADO PELA INSTITUIÇÃO FINANCEIRA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = null;
      // APROVADO PELA INSTITUIÇÃO FINANCEIRA
      if($this->nivel_pre_venda == 0 || $this->nivel_pre_venda == 3){
        $evolucao_etapa_workflow = 17;
      // AGUARDANDO DOCUMENTAÇÃO
      }else if($this->nivel_pre_venda == 2){
        $evolucao_etapa_workflow = 1;
      }
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);

      // EXCLUI DETALHAENTOS DESSE PROCESSO CASO HAJAM
      $this->con1->execSql("","DELETE FROM tb_detalhamento_parcelas WHERE processo='" . $this->id_processo . "'");

      // EXCLUI AVALISTAS DESSE PROCESSO CASO HAJAM
      $this->con1->execSql("","DELETE FROM tb_avalista WHERE processo='" . $this->id_processo . "'");

      // LIBERA A UNIDADE DE INTERESSE
      if($this->unidade_interesse_cancelamento){
        $campo = null;
        $chave = null;

        $campo[0][0] = 'disponibilidade';
        $campo[0][1] = 'D';

        $chave[0][0] = 'id';
        $chave[0][1] = $this->unidade_interesse_cancelamento;

        $this->con1->executa('tb_unidade',$campo,$chave);
      }


      // REGISTRA O CANCELAMENTO
      $campo = null;
      $chave = null;

      $campo[0][0] = 'id';
      $campo[0][1] = $this->con1->lastId('tb_cancelamento_processo','id');
      $campo[1][0] = 'tipo';
      $campo[1][1] = 'N';
      $campo[2][0] = 'processo';
      $campo[2][1] = $this->id_processo;
      $campo[3][0] = 'motivo';
      $campo[3][1] = $this->motivo_cancelamento;
      $campo[4][0] = 'descricao';
      $campo[4][1] = $this->descricao_cancelamento;
      $campo[5][0] = 'data_hora';
      $campo[5][1] = date('Y-m-d H:i:s');

      $this->con1->executa('tb_cancelamento_processo',$campo);


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 54; // CANCELAMENTO DE NEGOCIAÇÃO
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);



      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
?>
      <script>
        alert("CONTRATO CANCELADO. A UNIDADE FOI LIBERADA.");
        parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=MTI=&id_processo=' . $this->id_processo; ?>";
      </script>
<?php

    }

/*--------------------------------------------------------------------*/

/*------------------------- DISTRATO ------------------------*/

    function solicita_distrato() {
    
      // CONSULTA O NOME DO EMPREENDIMENTO E A UNIDADE
      $this->con1->consulta("SELECT tb_empreendimento.nome AS nome_empreendimento, tb_unidade.descricao AS descricao_unidade
                             FROM tb_processo
                             LEFT JOIN tb_empreendimento ON tb_processo.empreendimento = tb_empreendimento.id
                             LEFT JOIN tb_unidade ON tb_processo.unidade = tb_unidade.id
                             WHERE tb_processo.id='" . $this->id_processo . "'");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();
        $this->nome_empreendimento = $this->con1->data['nome_empreendimento'];
        $this->descricao_unidade   = $this->con1->data['descricao_unidade'];
      }

      $campo = null;
      $chave = null;

      $aux = 0;

      $campo[$aux][0] = 'distrato';
      $campo[$aux][1] = 'S';
      $aux++;

      $campo[$aux][0] = 'evolucao_distrato';
      $campo[$aux][1] = $this->evolucao_distrato;
      $aux++;

      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;

      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;

      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 21;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 17: APROVADO PELA INSTITUIÇÃO FINANCEIRA | EVOLUÇÃO 16: REPROVADO PELA INSTITUIÇÃO FINANCEIRA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = null;
      // DISTRATO SOLICITADO
      if($this->nivel_pre_venda == 0 || $this->nivel_pre_venda == 3){
        $evolucao_etapa_workflow = 50;
      // DISTRATO DE RESERVA SOLICITADO
      }else if($this->nivel_pre_venda == 2){
        $evolucao_etapa_workflow = 54;
      }
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);


      // REGISTRA A SOLICITAÇÃO NA TABELA DE CANCELAMENTO DE PROCESSO
      $campo = null;
      $chave = null;

      $campo[0][0] = 'id';
      $campo[0][1] = $this->con1->lastId('tb_cancelamento_processo','id');
      $campo[1][0] = 'tipo';
      $campo[1][1] = 'D';
      $campo[2][0] = 'processo';
      $campo[2][1] = $this->id_processo;
      $campo[3][0] = 'motivo';
      $campo[3][1] = $this->motivo_distrato;
      $campo[4][0] = 'descricao';
      $campo[4][1] = $this->descricao_distrato;
      $campo[5][0] = 'data_hora';
      $campo[5][1] = date('Y-m-d H:i:s');

      $this->con1->executa('tb_cancelamento_processo',$campo);


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 61; // SOLICITAÇÃO DE DISTRATO
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);
      
      
      // DISPARA MENSAGEM INFORMANDO OS ENVLVIDOS
      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=3 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();
        
        require_once('data/classe/functions/preparaDisparoEmail.php');
        
        if($destinatarios){

          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';
          
          // DISPARA A MENSAGEM
          $this->php->disparaEmail('G3 DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);

        }
      }

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
?>
      <script>
        alert("O DISTRATO DESTE PROCESSO FOI SOLICITADO COM SUCESSO. PROCESSO DE DISTRATO INICIADO.\n\nAGUARDE SUA CONCLUSÃO.");
        parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=MTM=&id_processo=' . $this->id_processo; ?>";
      </script>
<?php

    }
    
    function autoriza_distrato() {

      // REGISTRA A NEGOCIAÇÃO NA TABELA DE CANCELAMENTO DE PROCESSO
      
      $campo = null;
      $chave = null;

      $aux = 0;

      $campo[$aux][0] = 'motivo';
      $campo[$aux][1] = $this->motivo_distrato;
      $aux++;
      $campo[$aux][0] = 'reversao';
      $campo[$aux][1] = $this->reversao_distrato;
      $aux++;
      $campo[$aux][0] = 'negociacao';
      $campo[$aux][1] = $this->negociacao_distrato;
      $aux++;
      $campo[$aux][0] = 'data_hora_reversao';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      
      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_cancelamento_processo;

      $this->con1->executa('tb_cancelamento_processo',$campo,$chave);
      

      if($this->reversao_distrato == 'S'){
      
        $campo = null;
        $chave = null;
        $aux = 0;

        $campo[$aux][0] = 'distrato';
        $campo[$aux][1] = 'C';
        $aux++;

        $campo[$aux][0] = 'evolucao';
        $campo[$aux][1] = $this->evolucao_distrato;
        $aux++;

        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;

        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];

        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_processo;

        $this->con1->executa('tb_processo', $campo, $chave);

        // LOG EVOLUTIVO
        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 63; // DISTRATO REVERTIDO
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);

?>
        <script>
          alert("DISTRATO CANCELADO COM SUCESSO.");
          parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=MTM=&id_processo=' . $this->id_processo; ?>";
        </script>
<?php

      }else if($this->reversao_distrato == 'N'){
      
        $campo = null;
        $chave = null;
        $aux = 0;
        
        $campo[$aux][0] = 'distrato';
        $campo[$aux][1] = 'A';
        $aux++;

        $campo[$aux][0] = 'distrato_autorizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;

        $campo[$aux][0] = 'distrato_autorizado_por';
        $campo[$aux][1] = $_SESSION['id_usuario'];
        $aux++;

        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;

        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        
        
        // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 17: APROVADO PELA INSTITUIÇÃO FINANCEIRA | EVOLUÇÃO 16: REPROVADO PELA INSTITUIÇÃO FINANCEIRA
        $nova_etapa_workflow = null;
        $evolucao_etapa_workflow = null;
        // DISTRATO AUTORIZADO
        if($this->nivel_pre_venda == 0 || $this->nivel_pre_venda == 3){
          $evolucao_etapa_workflow = 51;
        // DISTRATO DE RESERVA AUTORIZADO
        }else if($this->nivel_pre_venda == 2){
          $evolucao_etapa_workflow = 55;
        }
        if($evolucao_etapa_workflow > 0){
          $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
          if($this->con1->nrows > 0){
            $this->con1->proxRegistro();
            $nova_etapa_workflow = $this->con1->data['id'];
            $campo[$aux][0]  = 'etapa_workflow';
            $campo[$aux][1]  = $nova_etapa_workflow;
            $aux++;
          }
        }
        

        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_processo;

        $this->con1->executa('tb_processo', $campo, $chave);

        
        // LOG EVOLUTIVO
        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 62; // DISTRATO AUTORIZADO
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);
        
        // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
?>
        <script>
          alert("DISTRATO AUTORIZADO COM SUCESSO.");
          parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=MTM=&id_processo=' . $this->id_processo; ?>";
        </script>
<?php

      }

    }
    
    
    function gera_distrato() {
    
      // REGISTRA A NEGOCIAÇÃO NA TABELA DE CANCELAMENTO DE PROCESSO

      $campo = null;
      $chave = null;

      $aux = 0;

      $campo[$aux][0] = 'restituir_valores';
      $campo[$aux][1] = str_replace(',','.',str_replace('.','',$this->restituir_valores));
      $aux++;

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_cancelamento_processo;

      $this->con1->executa('tb_cancelamento_processo',$campo,$chave);
      

      // ATUALIZA O PROCESSO

      $campo = null;
      $chave = null;
      $aux = 0;

      $campo[$aux][0] = 'distrato';
      $campo[$aux][1] = 'R';
      $aux++;

      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;

      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 17: APROVADO PELA INSTITUIÇÃO FINANCEIRA | EVOLUÇÃO 16: REPROVADO PELA INSTITUIÇÃO FINANCEIRA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = null;
      // DISTRATO GERADO
      if($this->nivel_pre_venda == 0 || $this->nivel_pre_venda == 3){
        $evolucao_etapa_workflow = 52;
      // DISTRATO DE RESERVA GERADO
      }else if($this->nivel_pre_venda == 2){
        $evolucao_etapa_workflow = 56;
      }
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }
      

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 50; // DISTRATO REALIZADO
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);

?>
      <script>
        alert("DISTRATO REALIZADO COM SUCESSO.");
        parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=MTM=&id_processo=' . $this->id_processo; ?>";
      </script>
<?php

    }

/*--------------------------------------------------------------------*/

/*-------------------------APROVA NEGOCIAÇÃO------------------------*/

    function cadastra_avalista() {
    
      $campo = null;
      $chave = null;

      if($this->quantidade_avalistas > 0){
        for($i=1;$i<=$this->quantidade_avalistas;$i++){

          $campo = null;
          $chave = null;

          $aux = 0;
          $campo[$aux][0]  = 'id';
          $campo[$aux][1]  = $this->con1->lastId('tb_avalista', 'id');
          $aux++;
          $campo[$aux][0]  = 'processo';
          $campo[$aux][1]  = $this->id_processo;
          $aux++;
          $campo[$aux][0]  = 'nome';
          $campo[$aux][1]  = trim($this->nome_avalista[$i]);
          $aux++;
          $campo[$aux][0]  = 'cpf';
          $campo[$aux][1]  = preg_replace("/[^0-9]/","",$this->cpf_avalista[$i]);
          $aux++;
          $campo[$aux][0]  = 'rg';
          $campo[$aux][1]  = $this->rg_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'estado_civil';
          $campo[$aux][1]  = $this->estado_civil_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'regime_comunhao';
          $campo[$aux][1]  = $this->regime_comunhao_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'endereco';
          $campo[$aux][1]  = $this->endereco_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'numero';
          $campo[$aux][1]  = $this->numero_avalista[$i];
          $aux++;
          $campo[$aux][0]  = 'complemento';
          $campo[$aux][1]  = $this->complemento_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'bairro';
          $campo[$aux][1] = $this->bairro_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'cidade';
          $campo[$aux][1] = $this->cidade_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'uf';
          $campo[$aux][1] = $this->uf_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'cep';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->cep_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'telefone1';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->telefone1_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'telefone2';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->telefone2_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'celular';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->celular_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'email';
          $campo[$aux][1] = $this->email_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'conjuge';
          $campo[$aux][1] = $this->conjuge_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'cpf_conjuge';
          $campo[$aux][1] = preg_replace("/[^0-9]/","",$this->cpf_conjuge_avalista[$i]);
          $aux++;
          $campo[$aux][0] = 'rg_conjuge';
          $campo[$aux][1] = $this->rg_conjuge_avalista[$i];
          $aux++;
          $campo[$aux][0] = 'cadastrado_em';
          $campo[$aux][1] = date('Y-m-d H:i:s');
          $aux++;
          $campo[$aux][0] = 'cadastrado_por';
          $campo[$aux][1] = $_SESSION["id_usuario"];
          $aux++;

          $this->con1->executa('tb_avalista', $campo);

        }

        // LOG EVOLUTIVO
        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 14; // CADASTRO DE AVALISTA
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);
      }
      
      $campo = null;
      $chave = null;
      
      $campo[0][0] = 'aprovacao_contrato';
      $campo[0][1] = 'E';
      $campo[1][0] = 'quantidade_avalistas';
      $campo[1][1] = $this->quantidade_avalistas;
      $campo[2][0] = 'evolucao';
      $campo[2][1] = 6;

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;
      
      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 14; // CADASTRO DE AVALISTA
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
?>
      <script>
        alert("AVALISTA CADASTRADO. AGUARDE A APROVAÇÃO DO MESMO PELO COBAN.");
        parent.location.href = "<?php echo $_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo; ?>";
      </script>
<?php

    }

/*--------------------------------------------------------------------*/

/*-------------------------FUNÇÃO DE ENVIO PARA ANÁLISE------------------------*/

    function solicita_damp() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      $campo = null;
      $chave = null;

      $aux = 0;
      
      $campo[$aux][0] = 'solicitacao_damp';
      $campo[$aux][1] = 'S';
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 76; // SOLICITAÇÃO DE EMISSÃO ANTECIPADA DE DAMP
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];
      
      $this->con1->executa('tb_log_evolutivo', $campo);


      /* ============ DISPARA O E-MAIL DE SOLICITAÇÃO DA DAMP PARA OS RESPONSÁVEIS ============ */
      
      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=1 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');

        if($destinatarios){

          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';

          // DISPARA A MENSAGEM
          $this->php->disparaEmail('G3 DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);

        }
      }

    }

/*--------------------------------------------------------------------*/

/*-------------------------FUNÇÃO DE ENVIO PARA ANÁLISE------------------------*/

    function enviaContratoAnalise() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      
      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
      $campo[$aux][0] = 'aprovacao_assinatura_ccv';
      $campo[$aux][1] = 'E';
      $aux++;

      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;

      // SOMENTE ATUALIZA O STATUS DO PROCESSO SE O STATUS ATUAL FOR CONTRATO DE COMPRA E VENDA GERADO.
      if($this->evolucao == 6){
        $campo[$aux][0] = 'evolucao';
        $campo[$aux][1] = 7;
        $aux++;

      
        // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 23: ASSINATURA DOS FORMLUÁRIOS EM ANÁLISE (ISSO MESMO ESTÁ CORRETO - CONTRATO E FORMULÁRIOS TEM A MESMA AÇÃO)
        $nova_etapa_workflow = null;
        $evolucao_etapa_workflow = 26;
        if($evolucao_etapa_workflow > 0){
          $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
          if($this->con1->nrows > 0){
            $this->con1->proxRegistro();
            $nova_etapa_workflow = $this->con1->data['id'];
            $campo[$aux][0]  = 'etapa_workflow';
            $campo[$aux][1]  = $nova_etapa_workflow;
            $aux++;
          }
        }
      
      }

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // SOMENTE ATUALIZA O STATUS DO PROCESSO SE O STATUS ATUAL FOR CONTRATO DE COMPRA E VENDA GERADO.
      if($this->evolucao == 6){
      
        // REGISTRA O CONTROLE DE SLA
        $data_registro_sla = date('Y-m-d H:i:s');

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
        $campo[1][0]   = 'processo';
        $campo[1][1]   = $this->id_processo;
        $campo[2][0]   = 'etapa_workflow';
        $campo[2][1]   = $nova_etapa_workflow;
        $campo[3][0]   = 'data_hora';
        $campo[3][1]   = $data_registro_sla;
        $campo[4][0]   = 'cadastrado_em';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'cadastrado_por';
        $campo[5][1]   = $_SESSION["id_usuario"];

        $this->con1->executa('tb_controle_sla', $campo);
      
      }
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 21; // ENVIO DE CONTRATO PARA ANÁLISE
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);
      
      
      // DISPARA E-MAIL INFORMANDO DA ANÁLISE AOS RESPONSÁVEIS PELA MESMA
      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=10 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');

        if($destinatarios){

          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';

          // DISPARA A MENSAGEM
          $this->php->disparaEmail('G3 DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);

        }
      }
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('O contrato assinado foi enviado para a análise. Aguarde o retorno.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }
    
    function aprovaContratoCoban() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      
      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'aprovacao_assinatura';
      $campo[$aux][1] = 'A';
      $aux++;
      $campo[$aux][0] = 'observacao_contrato';
      $campo[$aux][1] = $this->observacao_contrato;
      $aux++;
      $campo[$aux][0] = 'observacao_formularios';
      $campo[$aux][1] = $this->observacao_formularios;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 25: ASSINATURA DO CCV APROVADA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 25;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 22; // APROVAÇÃO DA ASSINATURA - COBAN
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('A assinatura do Contrato foi aprovada. O processo retornou ao PDV para carregar os formulários.\n\nCaso os formulários ainda não tenham sido carregados, faça-o.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }
    
    function reprovaContratoCoban() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      
      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'aprovacao_assinatura';
      $campo[$aux][1] = 'R';
      $aux++;
      $campo[$aux][0] = 'observacao_contrato';
      $campo[$aux][1] = $this->observacao_contrato;
      $aux++;
      $campo[$aux][0] = 'observacao_formularios';
      $campo[$aux][1] = $this->observacao_formularios;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 25: ASSINATURA DO CCV APROVADA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 25;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;
      
      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 23; // REPORVAÇÃO DA ASSINATURA - COBAN
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('A assinatura do Contrato foi reprovada. O processo foi devolvido ao PDV.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }
    
    
    function enviaFormulariosAnalise() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE

      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
//      $campo[$aux][0] = 'aprovacao_assinatura';
//      $campo[$aux][1] = 'E';
//      $aux++;
      $campo[$aux][0] = 'aprovacao_assinatura_formularios';
      $campo[$aux][1] = 'E';
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 8;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 26: ASSINATURA DOS FORMLUÁRIOS EM ANÁLISE
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 26;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 55; // ENVIO DE FORMULÁRIOS ASSINADOS PARA ANÁLISE
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Os formulários assinados enviados para a análise. Aguarde o retorno.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }
    
    
    function aprovaContratoComercial() {
    
      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      
      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 9;
      $aux++;
      $campo[$aux][0] = 'aprovacao_assinatura';
      $campo[$aux][1] = 'A';
      $aux++;
      $campo[$aux][0] = 'observacao_contrato';
      $campo[$aux][1] = $this->observacao_contrato;
      $aux++;
      $campo[$aux][0] = 'observacao_formularios';
      $campo[$aux][1] = $this->observacao_formularios;
      $aux++;
      $campo[$aux][0] = 'documentacao_validada';
      $campo[$aux][1] = $this->documentacao_validada;
      $aux++;

      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 29: LIBERADO PARA REPASSE / ASSINATURAS APROVADAS
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 29;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);


      
      // INSERE O REGISTRO DA FORMALIZAÇÃO COM O QUESTIONÁRIO CONECTADO AO EMPREENDIMENTO
      $this->con1->consulta("SELECT tb_empreendimento.questionario_formalizacao
                             FROM tb_processo
                             LEFT JOIN tb_empreendimento ON tb_processo.empreendimento = tb_empreendimento.id
                             WHERE tb_processo.id='" . $this->id_processo . "'");
      $this->con1->proxRegistro();
      
      $questionario_formalizacao = $this->con1->data['questionario_formalizacao'];
      
      $campo =  null;
      $chave =  null;
      
      $aux = 0;
      $campo[$aux][0] = 'id';
      $campo[$aux][1] = $this->con1->lastId('tb_formalizacao','id');
      $aux++;
      $campo[$aux][0] = 'id_processo';
      $campo[$aux][1] = $this->id_processo;
      $aux++;
      $campo[$aux][0] = 'questionario';
      $campo[$aux][1] = $questionario_formalizacao;
      $aux++;
      $campo[$aux][0] = 'cadastrado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'cadastrado_por';
      $campo[$aux][1] = $_SESSION['id_usuario'];
      $aux++;
      
      $this->con1->executa('tb_formalizacao',$campo);


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $aux++;
      $campo[$aux][0]   = 'processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'etapa_workflow';
      $campo[$aux][1]   = $nova_etapa_workflow;
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = $data_registro_sla;
      $aux++;
      $campo[$aux][0]   = 'cadastrado_em';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'cadastrado_por';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;

      $this->con1->executa('tb_controle_sla', $campo);

      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 24; // FORMULÁRIOS ASSINADOS APROVADOS
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('As assiaturas do Contrato e do Formulários foram aprovadas.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }
    
    function reprovaContratoComercial() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      
      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'aprovacao_assinatura';
      $campo[$aux][1] = 'R';
      $aux++;
      $campo[$aux][0] = 'observacao_contrato';
      $campo[$aux][1] = $this->observacao_contrato;
      $aux++;
      $campo[$aux][0] = 'observacao_formularios';
      $campo[$aux][1] = $this->observacao_formularios;
      $aux++;
      $campo[$aux][0] = 'documentacao_validada';
      $campo[$aux][1] = $this->documentacao_validada;
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 27: ASSINATURA DE FORMULÁRIOS REPROVADA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 27;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      $campo[1][1]   = 25; // REPROVAÇÃO DA ASSINATURA - COMERCIAL
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('A assinatura dos Formulários foi reprovada. O processo foi devolvido ao PDV.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }
    
/*--------------------------------------------------------------------*/

/*-------------------------APROVAÇÃO OU REPROVAÇÃO DA ASSINATURA CONTRATO-------------------------*/

    function aprovaAssinaturaContrato() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE

      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
//      $campo[$aux][0] = 'aprovacao_assinatura';
//      $campo[$aux][1] = 'A';
//      $aux++;
      $campo[$aux][0] = 'aprovacao_assinatura_ccv';
      $campo[$aux][1] = 'A';
      $aux++;
      $campo[$aux][0] = 'observacao_contrato';
      $campo[$aux][1] = $this->observacao_contrato;
      $aux++;

      // NÃO HAVERÁ ALTERAÇÃO DE ETAPA WORKFLOW

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);

      // NÃO HAVERÁ REGISTRO DE CONTROLE DO SLA, POIS NÃO HOUVE EVOLUÇÃO DE ETAPA WORKFLOW (ESTUDAR MAIS, POIS O PRAZO PARA APROVAÇÃO DO CONTRATO DEVERÁ SER DE 2 DIAS)

      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 22; // CONTRATO ASSINADO APROVADO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('ASSINATURA DE CONTRATO DE VENDA (CCV) APROVADA.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }
    
    function aprovaAssinaturaContratoDigital() {
    
      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE

      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
      $campo[$aux][0] = 'aprovacao_assinatura_ccv';
      $campo[$aux][1] = 'A';
      $aux++;
      $campo[$aux][0] = 'observacao_contrato';
      $campo[$aux][1] = $this->observacao_contrato;
      $aux++;

      // NÃO HAVERÁ ALTERAÇÃO DE ETAPA WORKFLOW

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);

      // NÃO HAVERÁ REGISTRO DE CONTROLE DO SLA, POIS NÃO HOUVE EVOLUÇÃO DE ETAPA WORKFLOW (ESTUDAR MAIS, POIS O PRAZO PARA APROVAÇÃO DO CONTRATO DEVERÁ SER DE 2 DIAS)

      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 22; // CONTRATO ASSINADO APROVADO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('ASSINATURA DE CONTRATO DE VENDA (CCV) APROVADA.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }
    
    function reprovaAssinaturaContrato() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE

      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
//      $campo[$aux][0] = 'aprovacao_assinatura';
//      $campo[$aux][1] = 'R';
//      $aux++;
      $campo[$aux][0] = 'aprovacao_assinatura_ccv';
      $campo[$aux][1] = 'R';
      $aux++;
      $campo[$aux][0] = 'observacao_contrato';
      $campo[$aux][1] = $this->observacao_contrato;
      $aux++;

      // NÃO HAVERÁ ALTERAÇÃO DE ETAPA WORKFLOW

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);

      // NÃO HAVERÁ REGISTRO DE CONTROLE DO SLA, POIS NÃO HOUVE EVOLUÇÃO DE ETAPA WORKFLOW (ESTUDAR MAIS, POIS O PRAZO PARA APROVAÇÃO DO CONTRATO DEVERÁ SER DE 2 DIAS)

      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 23; // CONTRATO ASSINADO REPROVADO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('ASSINATURA DE CONTRATO DE VENDA (CCV) APROVADA.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }

/*--------------------------------------------------------------------*/


/*-------------------------APROVAÇÃO OU REPROVAÇÃO DA ASSINATURA FORMULÁRIOS-------------------------*/

    function aprovaAssinaturaFormularios() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
//      $campo[$aux][0] = 'aprovacao_assinatura';
//      $campo[$aux][1] = 'A';
//      $aux++;
      $campo[$aux][0] = 'aprovacao_assinatura_formularios';
      $campo[$aux][1] = 'A';
      $aux++;
      $campo[$aux][0] = 'observacao_formularios';
      $campo[$aux][1] = $this->observacao_formularios;
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 9;
      $aux++;

      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 29: LIBERADO PARA REPASSE / ASSINATURAS APROVADAS
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 29;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      
      // INSERE O REGISTRO DA FORMALIZAÇÃO COM O QUESTIONÁRIO CONECTADO AO EMPREENDIMENTO
      $this->con1->consulta("SELECT tb_empreendimento.questionario_formalizacao
                             FROM tb_processo
                             LEFT JOIN tb_empreendimento ON tb_processo.empreendimento = tb_empreendimento.id
                             WHERE tb_processo.id='" . $this->id_processo . "'");
      $this->con1->proxRegistro();

      $questionario_formalizacao = $this->con1->data['questionario_formalizacao'];

      $campo =  null;
      $chave =  null;

      $aux = 0;
      $campo[$aux][0] = 'id';
      $campo[$aux][1] = $this->con1->lastId('tb_formalizacao','id');
      $aux++;
      $campo[$aux][0] = 'id_processo';
      $campo[$aux][1] = $this->id_processo;
      $aux++;
      $campo[$aux][0] = 'questionario';
      $campo[$aux][1] = $questionario_formalizacao;
      $aux++;
      $campo[$aux][0] = 'cadastrado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'cadastrado_por';
      $campo[$aux][1] = $_SESSION['id_usuario'];
      $aux++;

      $this->con1->executa('tb_formalizacao',$campo);
      
      

      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $aux++;
      $campo[$aux][0]   = 'processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'etapa_workflow';
      $campo[$aux][1]   = $nova_etapa_workflow;
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = $data_registro_sla;
      $aux++;
      $campo[$aux][0]   = 'cadastrado_em';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'cadastrado_por';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;

      $this->con1->executa('tb_controle_sla', $campo);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 24; // FORMULÁRIOS ASSINADOS APROVADOS
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('ASSINATURA DE FORMULÁRIOS APROVADA.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }

    function reprovaAssinaturaFormularios() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE

      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
//      $campo[$aux][0] = 'aprovacao_assinatura';
//      $campo[$aux][1] = 'R';
//      $aux++;
      $campo[$aux][0] = 'aprovacao_assinatura_formularios';
      $campo[$aux][1] = 'R';
      $aux++;
      $campo[$aux][0] = 'observacao_formularios';
      $campo[$aux][1] = $this->observacao_formularios;
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;

      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 27: ASSINATURA DE FORMULÁRIOS REPROVADA
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 27;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $aux++;
      $campo[$aux][0]   = 'processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'etapa_workflow';
      $campo[$aux][1]   = $nova_etapa_workflow;
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = $data_registro_sla;
      $aux++;
      $campo[$aux][0]   = 'cadastrado_em';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'cadastrado_por';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;

      $this->con1->executa('tb_controle_sla', $campo);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 25; // FORMULÁRIOS ASSINADDOS REPROVADOS
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('ASSINATURA DE FORMULÁRIOS APROVADA.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }

/*--------------------------------------------------------------------*/


/*-------------------------REGISTRA DOCUMENTAÇÃO VALIDADA-------------------------*/

    function registraValidacaoDocs() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE

      $campo = null;
      $chave = null;

      // DADOS QUE SERÃO ALTERADOS NO BANCO
      $aux = 0;
      $campo[$aux][0] = 'documentacao_validada';
      $campo[$aux][1] = $this->documentacao_validada;
      $aux++;

      // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
      $chave[0][0]   = 'id';
      $chave[0][1]   = $this->id_processo;

      // AÇÃO DE ALTERAÇÃO NO BANCO
      $this->con1->executa('tb_processo', $campo, $chave);


      // REGISTRA O CONTROLE DE SLA
/*
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
*/

      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $campo[1][0]   = 'tipo';
      if($this->documentacao_validada == 'S'){
        $campo[1][1]   = 97; // DOCUMENTAÇÃO ATPA PARA CONFORMIDADE
      }else if($this->documentacao_validada == 'N'){
        $campo[1][1]   = 98; // DOCUMENTAÇÃO NÃO APTA PARA CONFORMIDADE
      }
      $campo[2][0]   = 'id_processo';
      $campo[2][1]   = $this->id_processo;
      $campo[3][0]   = 'id_autenticacao';
      $campo[3][1]   = $_SESSION["id_usuario"];
      $campo[4][0]   = 'data_hora';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'ip';
      $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Validação de documentação registrada.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTM=&id_processo=' . $this->id_processo);
    }

/*--------------------------------------------------------------------*/

/*-------------------------RESPOSTA FORMALIZAÇÃO-------------------------*/
    
    function resposta_formalizacao() {

      // NÃO ALTERE A ORDEM DO CAMPO E DA CHAVE
      
      $this->con1->consulta("SELECT id FROM tb_formalizacao WHERE id_processo='" . $this->id_processo . "'");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();
        $id_formalizacao = $this->con1->data['id'];
      }

      $campo = null;
      $chave = null;
      
      $aux = 0;
      
      if(!$id_formalizacao){
        $campo[$aux][0] = 'id';
        $campo[$aux][1] = $this->con1->lastid('tb_formalizacao','id');
        $aux++;
        $campo[$aux][0] = 'id_processo';
        $campo[$aux][1] = $this->id_processo;
        $aux++;
      }
      
      if($this->check_01){
        $campo[$aux][0] = 'backoffice';
        $campo[$aux][1] = $this->backoffice;
        $aux++;
        $campo[$aux][0] = 'check_01';
        $campo[$aux][1] = $this->check_01;
        $aux++;
        $campo[$aux][0] = 'data_01';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_01';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 10;
        if($this->check_01 == 'S'){
          $log_evolutivo = 28;
        }
      }
      if($this->justificativa_01){
        $campo[$aux][0] = 'justificativa_01';
        $campo[$aux][1] = $this->justificativa_01;
        $aux++;
      }
      
      if($this->check_02){
        $campo[$aux][0] = 'check_02';
        $campo[$aux][1] = $this->check_02;
        $aux++;
        $campo[$aux][0] = 'data_02';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_02';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 11;
        if($this->check_02 == 'S'){
          $log_evolutivo = 29;
        }
      }
      if($this->justificativa_02){
        $campo[$aux][0] = 'justificativa_02';
        $campo[$aux][1] = $this->justificativa_02;
        $aux++;
      }
      
      if($this->check_03){
        $campo[$aux][0] = 'check_03';
        $campo[$aux][1] = $this->check_03;
        $aux++;
        $campo[$aux][0] = 'data_03';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_03';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 12;
        if($this->check_03 == 'S'){
          $log_evolutivo = 30;
        }
      }
      if($this->justificativa_03){
        $campo[$aux][0] = 'justificativa_03';
        $campo[$aux][1] = $this->justificativa_03;
        $aux++;
      }
      
      if($this->check_04){
        $campo[$aux][0] = 'check_04';
        $campo[$aux][1] = $this->check_04;
        $aux++;
        $campo[$aux][0] = 'data_04';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_04';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 13;
        if($this->check_04 == 'S'){
          $log_evolutivo = 31;
        }
      }
      if($this->justificativa_04){
        $campo[$aux][0] = 'justificativa_04';
        $campo[$aux][1] = $this->justificativa_04;
        $aux++;
      }
      
      if($this->check_04a){
        $campo[$aux][0] = 'check_04a';
        $campo[$aux][1] = $this->check_04a;
        $aux++;
        $campo[$aux][0] = 'data_04a';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_04a';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 13;
        if($this->check_04a == 'S'){
          $log_evolutivo = 32;
        }
      }
      if($this->justificativa_04a){
        $campo[$aux][0] = 'justificativa_04a';
        $campo[$aux][1] = $this->justificativa_04a;
        $aux++;
      }
      
      if($this->check_04b){
        $campo[$aux][0] = 'check_04b';
        $campo[$aux][1] = $this->check_04b;
        $aux++;
        $campo[$aux][0] = 'data_04b';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_04b';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 13;
        if($this->check_04b == 'S'){
          $log_evolutivo = 33;
        }
      }
      if($this->justificativa_04b){
        $campo[$aux][0] = 'justificativa_04b';
        $campo[$aux][1] = $this->justificativa_04b;
        $aux++;
      }
      
      if($this->check_04c){
        $campo[$aux][0] = 'check_04c';
        $campo[$aux][1] = $this->check_04c;
        $aux++;
        $campo[$aux][0] = 'data_04c';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_04c';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 13;
        if($this->check_04c == 'S'){
          $log_evolutivo = 34;
        }
      }
      if($this->justificativa_04c){
        $campo[$aux][0] = 'justificativa_04c';
        $campo[$aux][1] = $this->justificativa_04c;
        $aux++;
      }

      if($this->check_05){
        $campo[$aux][0] = 'check_05';
        $campo[$aux][1] = $this->check_05;
        $aux++;
        $campo[$aux][0] = 'data_05';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_05';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 14;
        if($this->check_05 == 'S'){
          $log_evolutivo = 36;
        }
      }
      if($this->justificativa_05){
        $campo[$aux][0] = 'justificativa_05';
        $campo[$aux][1] = $this->justificativa_05;
        $aux++;
      }
      
      if($this->check_06){
        $campo[$aux][0] = 'check_06';
        $campo[$aux][1] = $this->check_06;
        $aux++;
        $campo[$aux][0] = 'data_06';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_06';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 15;
        if($this->check_06 == 'S'){
          $log_evolutivo = 37;
        }
      }
      if($this->justificativa_06){
        $campo[$aux][0] = 'justificativa_06';
        $campo[$aux][1] = $this->justificativa_06;
        $aux++;
      }

      if($this->check_07a){
        $campo[$aux][0] = 'check_07a';
        $campo[$aux][1] = $this->check_07a;
        $aux++;
        $campo[$aux][0] = 'data_07a';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_07a';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 16;
        if($this->check_07a == 'S'){
          $log_evolutivo = 39;
        }
      }
      if($this->justificativa_07a){
        $campo[$aux][0] = 'justificativa_07a';
        $campo[$aux][1] = $this->justificativa_07a;
        $aux++;
      }
      
      if($this->check_07b){
        $campo[$aux][0] = 'check_07b';
        $campo[$aux][1] = $this->check_07b;
        $aux++;
        $campo[$aux][0] = 'data_07b';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_07b';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 16;
        if($this->check_07b == 'S'){
          $log_evolutivo = 40;
        }
      }
      if($this->justificativa_07b){
        $campo[$aux][0] = 'justificativa_07b';
        $campo[$aux][1] = $this->justificativa_07b;
        $aux++;
      }
      
      if($this->check_07c){
        $campo[$aux][0] = 'check_07c';
        $campo[$aux][1] = $this->check_07c;
        $aux++;
        $campo[$aux][0] = 'data_07c';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_07c';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 17;
        if($this->check_07c == 'S'){
          $log_evolutivo = 41;
        }
      }
      if($this->justificativa_07c){
        $campo[$aux][0] = 'justificativa_07c';
        $campo[$aux][1] = $this->justificativa_07c;
        $aux++;
      }
      if($this->previsao_07c){
        $campo[$aux][0] = 'previsao_07c';
        $campo[$aux][1] = $this->php->inverteData($this->previsao_07c);
        $aux++;
      }

      if($this->check_08){
        $campo[$aux][0] = 'check_08';
        $campo[$aux][1] = $this->check_08;
        $aux++;
        $campo[$aux][0] = 'data_08';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_08';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 18;
        if($this->check_08 == 'S'){
          $log_evolutivo = 44;
        }
      }
      if($this->justificativa_08){
        $campo[$aux][0] = 'justificativa_08';
        $campo[$aux][1] = $this->justificativa_08;
        $aux++;
      }
      
      if($this->check_09){
        $campo[$aux][0] = 'check_09';
        $campo[$aux][1] = $this->check_09;
        $aux++;
        $campo[$aux][0] = 'data_09';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'id_usuario_09';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        $evolucao = 20;
        if($this->check_09 == 'S'){
          $log_evolutivo = 45;
        }
      }
      if($this->justificativa_09){
        $campo[$aux][0] = 'justificativa_09';
        $campo[$aux][1] = $this->justificativa_09;
        $aux++;
      }

      if(!$id_formalizacao){
        $campo[$aux][0] = 'cadastrado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'cadastrado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        
        // AÇÃO DE ALTERAÇÃO NO BANCO
        $this->con1->executa('tb_formalizacao', $campo);
      }else{

        // IDENTIFICAÇÃO DO REGISTRO QUE SERÁ ALTERADO
        $chave[0][0]   = 'id';
        $chave[0][1]   = $id_formalizacao;

        // AÇÃO DE ALTERAÇÃO NO BANCO
        $this->con1->executa('tb_formalizacao', $campo, $chave);

      }
      
      // ALTERA A EVOLUÇÃO DO PROCESSO
      if($evolucao){

        $campo = null;
        $chave = null;
        
        $aux = 0;
        $campo[$aux][0] = 'evolucao';
        $campo[$aux][1] = $evolucao;
        $aux++;
        $campo[$aux][0] = 'atualizado_em';
        $campo[$aux][1] = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0] = 'atualizado_por';
        $campo[$aux][1] = $_SESSION["id_usuario"];
        $aux++;
        
        // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 30: FASE DE REPASSE (FGTS DEBITADO / EM ACOLHIMENTO) | EVOLUÇÃO 34: FASE DE REGISTRO (LIBERADO PARA REGISTRO)
        $nova_etapa_workflow = null;
        if($evolucao >= 10 && $evolucao <= 13){
          $evolucao_etapa_workflow = 30;
        }else if($evolucao >= 14 && $evolucao <= 17){
          $evolucao_etapa_workflow = 34;
        }
        if($evolucao_etapa_workflow > 0){
          $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
          if($this->con1->nrows > 0){
            $this->con1->proxRegistro();
            $nova_etapa_workflow = $this->con1->data['id'];
            $campo[$aux][0]  = 'etapa_workflow';
            $campo[$aux][1]  = $nova_etapa_workflow;
            $aux++;
          }
        }
        
        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_processo;

        $this->con1->executa('tb_processo', $campo, $chave);
        
      }
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      if($log_evolutivo){

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = $log_evolutivo;
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);
        
       }


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Resposta registrada com SUCESSO.',$_SERVER['PHP_SELF'] . '?mgr=MQ==&ui=MTg=&id_processo=' . $this->id_processo);
    }


/*--------------------------------------------------------------------*/


/*-------------------------RESPOSTA FORMALIZAÇÃO-------------------------*/

    function estorna_formalizacao() {
    
      // CONSULTA O REGISTRO NA TABELA DE FORMALIZAÇÃO
      $this->con1->consulta("SELECT id FROM tb_formalizacao WHERE id_processo='" . $this->id_processo . "'");
      $this->con1->proxRegistro();
      
      $id_formalizacao = $this->con1->data['id'];
    
      if($id_formalizacao){
    
        $referencia_arquivo = 'processos/' . $this->php->strZero($this->id_processo,7) . '/' . $this->php->strZero($this->id_processo,7) . '_checklist_';

        $letras = array(
          "1" => "A",
          "2" => "B",
          "3" => "C",
          "4" => "D",
          "5" => "E",
        );

        $passo_checklist = $this->opcao_estorno[0];
        $subpasso_checklist = null;
        $chave_subpasso = null;
        if(strlen($this->opcao_estorno) == 2){
          if(is_numeric($this->opcao_estorno[1])){
            $passo_checklist = $passo_checklist . $this->opcao_estorno[1];
          }else{
            $subpasso_checklist = $this->opcao_estorno[1];
            $chave_subpasso = array_search($subpasso_checklist, $letras);
          }
        }

        $total_subpassos = 0;
        $cont = 1;
        $aux_campo = 0;

        for($i=$passo_checklist;$i<=11;$i++){

          $endereco_arquivo = null;

          $aux = null;
          if($cont == 1){
            if($subpasso_checklist){
              $aux = $subpasso_checklist;
            }else{
              if($i == 4){
                $aux = 'A';
                $chave_subpasso = null;
              }else if($i == 6 || $i == 7){
                $aux = 'A';
                $chave_subpasso = 1;
              }else{
                $chave_subpasso = null;
              }
            }
            $cont++;
          }else{
            if($i == 4){
              $aux = 'A';
              $chave_subpasso = null;
            }else if($i == 6 || $i == 7){
              $aux = 'A';
              $chave_subpasso = 1;
            }else{
              $chave_subpasso = null;
            }
          }

          if($i == 4){
             $total_subpassos = 4; // A, B, C e D
          }else if($i == 6){
             $total_subpassos = 2; // A e B
          }else if($i == 7){
             $total_subpassos = 5; // A, B, C, D e E
          }

          if(!$aux){
            $coluna1 = 'check_' . $this->php->strZero($i,2);
            $coluna2 = 'justificativa_' . $this->php->strZero($i,2);
            $coluna3 = 'data_' . $this->php->strZero($i,2);
            $coluna4 = 'id_usuario_' . $this->php->strZero($i,2);

            // AÇAO DE LIMPEZA DOS REGISTROS
            $campo[$aux_campo][0] = $coluna1;
            $campo[$aux_campo][1] = null;
            $aux_campo++;
            $campo[$aux_campo][0] = $coluna2;
            $campo[$aux_campo][1] = null;
            $aux_campo++;
            $campo[$aux_campo][0] = $coluna3;
            $campo[$aux_campo][1] = null;
            $aux_campo++;
            $campo[$aux_campo][0] = $coluna4;
            $campo[$aux_campo][1] = null;
            $aux_campo++;

            // VERIFICA SE EXISTE O ARQUIVO DAS QUESTÕES 4 e 10 E OS REMOVE
            if($i == 4 || $i == 10){
              $endereco_arquivo = $referencia_arquivo . $this->php->strZero($i,2) . '.pdf';
              if(file_exists($endereco_arquivo)){
  //              echo '<br />ARQUIVO REMOVIDO: ' . $endereco_arquivo;
  //              unlink($endereco_arquivo);
              }
            }

          }else{

            for($j=$chave_subpasso;$j<=$total_subpassos;$j++){

              $coluna5 = null;
              $endereco_arquivo = null;

              $coluna1 = 'check_' . $this->php->strZero($i,2) . strtolower($letras[$j]);
              $coluna2 = 'justificativa_' . $this->php->strZero($i,2) . strtolower($letras[$j]);
              $coluna3 = 'data_' . $this->php->strZero($i,2) . strtolower($letras[$j]);
              $coluna4 = 'id_usuario_' . $this->php->strZero($i,2) . strtolower($letras[$j]);
              if($i == 7 && $j == 3){
                $coluna5 = 'previsao_' . $this->php->strZero($i,2) . strtolower($letras[$j]);
              }

              // AÇAO DE LIMPEZA DOS REGISTROS
              $campo[$aux_campo][0] = $coluna1;
              $campo[$aux_campo][1] = null;
              $aux_campo++;
              $campo[$aux_campo][0] = $coluna2;
              $campo[$aux_campo][1] = null;
              $aux_campo++;
              $campo[$aux_campo][0] = $coluna3;
              $campo[$aux_campo][1] = null;
              $aux_campo++;
              $campo[$aux_campo][0] = $coluna4;
              $campo[$aux_campo][1] = null;
              $aux_campo++;
              if($coluna5){
                $campo[$aux_campo][0] = $coluna5;
                $campo[$aux_campo][1] = null;
                $aux_campo++;
              }

              // VERIFICA SE EXISTE O ARQUIVO DAS QUESTÕES 6 (A e B) e 7 (A, B, C, D e E) E OS REMOVE
              if(($i == 6 && ($j == 1 || $j == 2)) || ($i == 7 && ($j >= 1 && $j <=5))){
                $endereco_arquivo = $referencia_arquivo . $this->php->strZero($i,2) . strtolower($letras[$j]) . '.pdf';
                if(file_exists($endereco_arquivo)){
  //                echo '<br />ARQUIVO REMOVIDO: ' . $endereco_arquivo;
  //                unlink($endereco_arquivo);
                }
              }

            }

          }

        }

        $chave[0][0] = 'id';
        $chave[0][1] = $id_formalizacao;

        $this->con1->executa('tb_formalizacao',$campo,$chave);
        
        
        // ALTERA A EVOLUÇÃO DO PROCESSO
        $nova_evolucao == null;
        if($passo_checklist == 1){
          $nova_evolucao = 10;
        }else if($passo_checklist == 2){
          $nova_evolucao = 11;
        }else if($passo_checklist == 3){
          $nova_evolucao = 12;
        }else if($passo_checklist == 4){
          $nova_evolucao = 13;
        }else if($passo_checklist == 5){
          $nova_evolucao = 14;
        }else if($passo_checklist == 6){
          $nova_evolucao = 15;
        }else if($passo_checklist == 7){
          $nova_evolucao = 16;
        }else if($passo_checklist == 8){
          $nova_evolucao = 17;
        }else if($passo_checklist == 9){
          $nova_evolucao = 18;
        }else if($passo_checklist == 10){
          $nova_evolucao = 19;
        }else if($passo_checklist == 11){
          $nova_evolucao = 20;
        }
        
        if($nova_evolucao){
        
          $campo = null;
          $chave = null;

          $aux = 0;
          $campo[$aux][0] = 'evolucao';
          $campo[$aux][1] = $nova_evolucao;
          $aux++;
          
          // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 30: FASE DE REPASSE (FGTS DEBITADO / EM ACOLHIMENTO) | EVOLUÇÃO 34: FASE DE REGISTRO (LIBERADO PARA REGISTRO)
          $nova_etapa_workflow = null;
          if($nova_evolucao >= 10 && $nova_evolucao <= 13){
            $evolucao_etapa_workflow = 30;
          }else if($nova_evolucao >= 14 && $nova_evolucao <= 17){
            $evolucao_etapa_workflow = 34;
          }
          if($evolucao_etapa_workflow > 0){
            $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
            if($this->con1->nrows > 0){
              $this->con1->proxRegistro();
              $nova_etapa_workflow = $this->con1->data['id'];
              $campo[$aux][0]  = 'etapa_workflow';
              $campo[$aux][1]  = $nova_etapa_workflow;
              $aux++;
            }
          }
        
          $chave[0][0] = 'id';
          $chave[0][1] = $this->id_processo;
        
          $this->con1->executa('tb_processo',$campo,$chave);
          
        }


        // REGISTRA O CONTROLE DE SLA
        $data_registro_sla = date('Y-m-d H:i:s');

        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
        $campo[1][0]   = 'processo';
        $campo[1][1]   = $this->id_processo;
        $campo[2][0]   = 'etapa_workflow';
        $campo[2][1]   = $nova_etapa_workflow;
        $campo[3][0]   = 'data_hora';
        $campo[3][1]   = $data_registro_sla;
        $campo[4][0]   = 'cadastrado_em';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'cadastrado_por';
        $campo[5][1]   = $_SESSION["id_usuario"];

        $this->con1->executa('tb_controle_sla', $campo);


        // LOG EVOLUTIVO
        $campo = null;
        $chave = null;

        $campo[0][0]   = 'id';
        $campo[0][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
        $campo[1][0]   = 'tipo';
        $campo[1][1]   = 49; // ESTORNO DE FORMALIZAÇÃO
        $campo[2][0]   = 'id_processo';
        $campo[2][1]   = $this->id_processo;
        $campo[3][0]   = 'id_autenticacao';
        $campo[3][1]   = $_SESSION["id_usuario"];
        $campo[4][0]   = 'data_hora';
        $campo[4][1]   = date('Y-m-d H:i:s');
        $campo[5][0]   = 'ip';
        $campo[5][1]   = $_SERVER["REMOTE_ADDR"];

        $this->con1->executa('tb_log_evolutivo', $campo);
        
      }else{
?>
      <script>
        alert('ERRO: PROCESSO NÃO IDENTIFICADO.');
      </script>
<?php
      }



      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->redireciona($_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }

/*--------------------------------------------------------------------*/

/*------------------------- REGISTRA ETAPA WORKFLOW -------------------------*/

    function registraEtapaWorkflow(){

      // CONSULTA QUAL A EVOLUÇÃO DESTA ETAPA PARA SER REGISTRADA NO PROCESSO
      $evolucao_etapa_workflow = 0;
      $this->con1->consulta("SELECT tb_etapas_workflow.nivel, tb_etapas_workflow.subnivel, tb_evolucao.evolucao as evolucao_etapa_workflow, tb_evolucao.check_formalizacao
                             FROM tb_etapas_workflow
                             LEFT JOIN tb_evolucao ON tb_etapas_workflow.evolucao = tb_evolucao.id
                             WHERE tb_etapas_workflow.id='" . $this->etapa_workflow . "'");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();
        $nivel_etapa_atual = $this->con1->data['nivel'];
        $subnivel_etapa_atual = $this->con1->data['subnivel'];
        $evolucao_etapa_workflow = $this->con1->data['evolucao_etapa_workflow'];
        $check_formalizacao = $this->con1->data['check_formalizacao'];
      }
      
      // CORRIGE O FORMATO DA DATA DA EVOLUÇÃO
      $arrDataEtapaEvolucao = preg_split("/ /",$this->data_etapa_evolucao);
      $novaDataEtapaEvolucao = $this->php->inverteData($arrDataEtapaEvolucao[0]) . ' ' . $arrDataEtapaEvolucao[1];
      
      
      
      // VERIFICA QUAL A ÚTLTIMA ETAPA RESPONDIDA PARA ESTE PROCESSO
      $this->con1->consulta("SELECT tb_controle_sla.etapa_workflow, tb_etapas_workflow.nivel, tb_etapas_workflow.subnivel
                             FROM tb_controle_sla
                             LEFT JOIN tb_etapas_workflow ON tb_controle_sla.etapa_workflow = tb_etapas_workflow.id
                             WHERE tb_controle_sla.processo='" . $this->id_processo . "'
                             ORDER BY tb_etapas_workflow.nivel DESC, tb_etapas_workflow.subnivel DESC LIMIT 1");
      $this->con1->proxRegistro();

      $ultima_etapa_marcada = $this->con1->data['etapa_workflow'];
      $ultimo_nivel_marcada = $this->con1->data['nivel'];

      // VERIFICA QUAIS A ETAPAS QUE PRECISAM SER MARCADAS ENTRE A ÚLTIMA QUE FOI MARCADA E A ATUAL
      $etapas_a_marcar = '';
      $this->con1->consulta("SELECT tb_etapas_workflow.id as id_etapa, tb_evolucao.check_formalizacao
                             FROM tb_etapas_workflow
                             LEFT JOIN tb_evolucao ON tb_etapas_workflow.evolucao = tb_evolucao.id
                             WHERE tb_etapas_workflow.workflow='" . $this->workflow . "' AND (
                             (tb_etapas_workflow.nivel='" . $ultimo_nivel_marcada . "' AND tb_etapas_workflow.subnivel > '" . $ultimo_subnivel_marcada . "') OR
                             (tb_etapas_workflow.nivel > '" . $ultimo_nivel_marcada . "')
                             ) AND (
                             (tb_etapas_workflow.nivel='" . $nivel_etapa_atual . "' AND tb_etapas_workflow.subnivel < '" . $subnivel_etapa_atual . "') OR
                             (tb_etapas_workflow.nivel < '" . $nivel_etapa_atual . "')
                             ) AND tb_etapas_workflow.subnivel > 0 AND (opcao IS NULL OR opcao=0) AND tb_etapas_workflow.online=1 AND tb_etapas_workflow.status=1 ORDER BY tb_etapas_workflow.nivel, tb_etapas_workflow.subnivel");
      if($this->con1->nrows){
        while($this->con1->proxRegistro()){
          $etapas_a_marcar .= $this->con1->data['id_etapa'] . ',';
          $formalizacao_a_marcar .= $this->con1->data['check_formalizacao'] . ',';
        }
      }

      $etapas_a_marcar .= $this->etapa_workflow;
      $formalizacao_a_marcar .= $check_formalizacao;

      $arrEtapasAMarcar = explode(',',$etapas_a_marcar);
      $arrFormalizacaoAMarcar = explode(',',$formalizacao_a_marcar);

      // ALTERA A ETAPA E EVOLUÇÃO DO PROCESSO
      $campo = null;
      $chave = null;
      
      if($evolucao_etapa_workflow > 0){
      
        // REGISTRA A ETAPA COM EVOLUÇÃO DO PROCESSO
        $aux = 0;
        $campo[$aux][0] = 'evolucao';
        $campo[$aux][1] = $evolucao_etapa_workflow;
        $aux++;
        $campo[$aux][0] = 'etapa_workflow';
        $campo[$aux][1] = $this->etapa_workflow;
        $aux++;
        $campo[$aux][0]   = 'atualizado_em';
        $campo[$aux][1]   = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0]   = 'atualizado_por';
        $campo[$aux][1]   = $_SESSION["id_usuario"];
        $aux++;

        $chave[0][0] = 'id';
        $chave[0][1] = $this->id_processo;
        
        $this->con1->executa('tb_processo',$campo,$chave);


       // REGISTRA A FORMALIZAÇÃO, CASO EXISTA. SÓ EXISTE FORMALIZAÇÃO SE HOUVER EVOLUÇÃO
       if($check_formalizacao){
       
         for($i=0;$i<sizeOf($arrFormalizacaoAMarcar);$i++){
           if($arrFormalizacaoAMarcar[$i] > 0){
             $campo = null;
             $chave = null;

             $aux = 0;
             $campo[$aux][0] = 'check_0' . $arrFormalizacaoAMarcar[$i];
             $campo[$aux][1] = 'S';
             $aux++;
             $campo[$aux][0] = 'justificativa_0' . $arrFormalizacaoAMarcar[$i];
             $campo[$aux][1] = $this->historico_etapa_evolucao;
             $aux++;
             $campo[$aux][0] = 'data_0' . $arrFormalizacaoAMarcar[$i];
             $campo[$aux][1] = $novaDataEtapaEvolucao;
             $aux++;
             $campo[$aux][0] = 'id_usuario_0' . $arrFormalizacaoAMarcar[$i];
             $campo[$aux][1] = $_SESSION['id_usuario'];
             $aux++;

             $chave[0][0] = 'id_processo';
             $chave[0][1] = $this->id_processo;

             $this->con1->executa('tb_formalizacao', $campo, $chave);

           }
         }
         
       }

      }else{
      
        // VERIFICA SE A ATUAL  EVOLUÇÃO DO PROCESSO É MAIOR QUE 9. SE NÃO, ATUALIZA PARA 10.
        $this->con1->consulta("SELECT evolucao FROM tb_processo WHERE id='" . $this->id_processo . "'");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          
          // REGISTRA APENAS A EVOLUÇÃO DA ETAPA DO WORKFLOW E A EVOLUÇÃO, CASO A EVOLUÇÃO DO PROCESSO SEJA MENOR QUE 10 ATUALIZA PARA 10.
          $aux = 0;
          if($this->con1->data['evolucao'] < 10){
            $campo[$aux][0] = 'evolucao';
            $campo[$aux][1] = 10;
            $aux++;
          }
          $campo[$aux][0] = 'etapa_workflow';
          $campo[$aux][1] = $this->etapa_workflow;
          $aux++;
          $campo[$aux][0]   = 'atualizado_em';
          $campo[$aux][1]   = date('Y-m-d H:i:s');
          $aux++;
          $campo[$aux][0]   = 'atualizado_por';
          $campo[$aux][1]   = $_SESSION["id_usuario"];
          $aux++;

          $chave[0][0] = 'id';
          $chave[0][1] = $this->id_processo;

          $this->con1->executa('tb_processo',$campo,$chave);
          
        }else{
          echo 'ERRO 840: Evolução de processo NÃO IDENTIFICADA. Contate a DOMMUS Sistemas e informe o código do erro juntamente com  o código do processo. A evolução não foi registrada';
          die();
        }
        
      }
      
      // REGISTRA O CONTROLE DE SLA
      for($i=0;$i<sizeOf($arrEtapasAMarcar);$i++){
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0]   = 'id';
        $campo[$aux][1]   = $this->con1->lastId('tb_controle_sla', 'id');
        $aux++;
        $campo[$aux][0]   = 'processo';
        $campo[$aux][1]   = $this->id_processo;
        $aux++;
        $campo[$aux][0]   = 'etapa_workflow';
        $campo[$aux][1]   = $arrEtapasAMarcar[$i];
        $aux++;
        $campo[$aux][0]   = 'data_hora';
        $campo[$aux][1]   = $novaDataEtapaEvolucao;
        $aux++;
        $campo[$aux][0]   = 'historico';
        $campo[$aux][1]   = $this->historico_etapa_evolucao;
        $aux++;
        $campo[$aux][0]   = 'cadastrado_em';
        $campo[$aux][1]   = date('Y-m-d H:i:s');
        $aux++;
        $campo[$aux][0]   = 'cadastrado_por';
        $campo[$aux][1]   = $_SESSION["id_usuario"];
        $aux++;

        $this->con1->executa('tb_controle_sla', $campo);
      }
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 96; // EVOLUÇÃO DE REPASSE / REGISTRO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_referencia';
      $campo[$aux][1]   = $this->etapa_workflow;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Etapa(s) evoluída com sucesso.',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }

/*--------------------------------------------------------------------*/

/*------------------------- REGISTRA CRÍTICA DE VALORES -------------------------*/

    function registraCriticaValores(){

      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_avaliacao_financiamento', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 'CR';
      $aux++;
      $campo[$aux][0]   = 'processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'aprovacao_banco';
      $campo[$aux][1]   = 'A';
      $aux++;
      $campo[$aux][0]   = 'fgts_aprovado';
      $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->fgts_critica));
      $aux++;
      $campo[$aux][0]   = 'subsidio_aprovado';
      $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->subsidio_critica));
      $aux++;
      $campo[$aux][0]   = 'valor_financiamento';
      $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->financiamento_critica));
      $aux++;
      $campo[$aux][0]   = 'cadastrado_em';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'cadastrado_por';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;

      $this->con1->executa('tb_avaliacao_financiamento', $campo);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 115; // CRÍTICA DE VALORES REGISTRADA
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Valores de crítica registrados com sucesso.',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }

/*--------------------------------------------------------------------*/

/*-------------------------DADOS DE REPASSE E REGISTRO-------------------------*/

    function agendamentoEntrevista(){

      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'entrevista_exigida';
      $campo[$aux][1]   = $this->entrevista_exigida;
      $aux++;
      $campo[$aux][0]   = 'agendamento_entrevista';
      $campo[$aux][1]   = $this->php->inverteData($this->data_agendamento_entrevista) . ' ' . $this->hora_agendamento_entrevista;
      $aux++;

      $chave[0][0]      = 'id';
      $chave[0][1]      = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 116; // AGENDAMENTO DE ENTREVISTA REGISTRADO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);
      
      
      // DISPARA E-MAIL INFORMANDO DA ANÁLISE AOS RESPONSÁVEIS PELA MESMA
      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=21 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');

        if($destinatarios){

          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';

          // DISPARA A MENSAGEM
          $this->php->disparaEmail('G3 DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);

        }
      }
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Entrevista agendada com sucesso.',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    function agendamentoAssinatura(){

      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'numero_contrato_if';
      $campo[$aux][1]   = $this->numero_contrato_if;
      $aux++;
      $campo[$aux][0]   = 'agendamento_assinatura';
      $campo[$aux][1]   = $this->php->inverteData($this->data_agendamento_assinatura) . ' ' . $this->hora_agendamento_assinatura;
      $aux++;
      $campo[$aux][0]   = 'assinaturas_contrato_if';
      $campo[$aux][1]   = '#' . implode('#',$this->assinaturas_contrato_if) . '#';
      $aux++;

      $chave[0][0]      = 'id';
      $chave[0][1]      = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);
      
      
      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 117; // AGENDAMENTO DE ASSINATURA DE CONTRATO DE FINANCIAMENTO REGISTRADO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);
      
      
      // DISPARA E-MAIL INFORMANDO DA ANÁLISE AOS RESPONSÁVEIS PELA MESMA
      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=22 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');

        if($destinatarios){

          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';

          // DISPARA A MENSAGEM
          $this->php->disparaEmail('G3 DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);

        }
      }
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Entrevista agendada com sucesso.',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    
    function infoContratoRegistrado(){

      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'data_registro';
      $campo[$aux][1]   = $this->php->inverteData($this->data_registro);
      $aux++;

      $chave[0][0]      = 'id';
      $chave[0][1]      = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);


      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 119; // DATA DO REGISTRO INFORMADA
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Data de registro registrada com sucesso.',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    function infoRecursoLiberado(){

      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'data_liberacao_recurso';
      $campo[$aux][1]   = $this->php->inverteData($this->data_liberacao_recurso);
      $aux++;
      $campo[$aux][0]   = 'recurso_liberado';
      $campo[$aux][1]   = str_replace(',','.',str_replace('.','',$this->recurso_liberado));
      $aux++;

      $chave[0][0]      = 'id';
      $chave[0][1]      = $this->id_processo;

      $this->con1->executa('tb_processo', $campo, $chave);


      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 120; // INFORMAÇÕES SOBRE A LIBERAÇÃO DO RECURSO REGISTRADAS
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Data de registro registrada com sucesso.',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }

/*--------------------------------------------------------------------*/

/*-------------------------ENTREGA DE CHAVES-------------------------*/

    function forcarLiberacaoChaves(){
    
      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;
      
      $aux = 0;
      $campo[$aux][0] = 'autorizacao_chaves_sistema';
      $campo[$aux][1] = 'S';
      $aux++;
      $campo[$aux][0] = 'autorizacao_chaves_financeiro';
      $campo[$aux][1] = 'S';
      $aux++;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 19; // LIBERADA ENTREGA DE CHAVES
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 44: AUTORIZADA ENTREGA DE CHAVES
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 44;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }
      
      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;
      
      $this->con1->executa('tb_processo',$campo,$chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO - LIBERAÇÃO DE IMPEDIMENTO PARA ENTREGA DE CHAVES
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 65; // LIBERAÇÃO DE IMPEDIMENTO PARA ENTREGA DE CHAVES
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);
      
      // LOG EVOLUTIVO - AUTORIZAÇÃO PARA ENTREGA DE CHAVES
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 68; // AUTORIZADA ENTREGA DE CHAVES
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);
      
      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Processo LIBERADO para a Entrega de Chaves',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    
    function bloquearChaves(){
    
      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'autorizacao_chaves_financeiro';
      $campo[$aux][1] = 'N';
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 43: BLOQUEADA ENTREGA DE CHAVES
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 43;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo',$campo,$chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 67; // BLOQUEADA ENTREGA DE CHAVES
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);
      
      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Processo BLOQUEADO para a Entrega de Chaves',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    
    function autorizarChaves(){
    
      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'autorizacao_chaves_financeiro';
      $campo[$aux][1] = 'S';
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 44: AUTORIZADA ENTREGA DE CHAVES
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 44;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo',$campo,$chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      

      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 68; // AUTORIZADA ENTREGA DE CHAVES
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Processo AUTORIZADO para a Entrega de Chaves',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    
    function agendarChaves(){

      // LIBERA QUALQUER AGENDAMENTO ANTERIOR QUE TENHA SIDO REGISTRADO
      $this->con1->execSql("","UPDATE tb_agenda_entrega SET status=0 WHERE processo='" . $this->id_processo . "'");

      // CRIA REGISTRO DA AGENDA DE ENTREGA DE CHAVES
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_agenda_entrega', 'id');
      $aux++;
      $campo[$aux][0]   = 'processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'data';
      $campo[$aux][1]   = $this->php->inverteData($this->data_agendamento_chaves);
      $aux++;
      $campo[$aux][0]   = 'horario';
      $campo[$aux][1]   = $this->horario_agendamento_chaves;
      $aux++;
      $campo[$aux][0]   = 'reagendamento';
      $campo[$aux][1]   = $this->reagendamento;
      $aux++;
      $campo[$aux][0]   = 'recomendacoes';
      $campo[$aux][1]   = $this->recomendacoes_agendamento_chaves;
      $aux++;
      $campo[$aux][0]   = 'cadastrado_em';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'cadastrado_por';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;

      $this->con1->executa('tb_agenda_entrega', $campo);
      
      
      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'chaves_entregue';
      $campo[$aux][1] = 'A';
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 45: AGENDADA ENTREGA DE CHAVES
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 45;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo',$campo,$chave);
      
      
      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);
      
      
      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 69; // AGENDADA ENTREGA DE CHAVES
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Agendamento para a Entrega de Chaves realizado',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }

    
    function registrarEntrega(){
    
      if(!$this->chaves_entregue){
        $this->chaves_entregue = 'S';
      }
    
       // REGISTRA A ENTREGA NO AGENDAMENTO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'realizado';
      $campo[$aux][1] = $this->chaves_entregue;
      $aux++;
      if($this->motivo_recusa > 0){
        $campo[$aux][0] = 'motivo_recusa';
        $campo[$aux][1] = $this->motivo_recusa;
        $aux++;
      }
      $campo[$aux][0] = 'observacoes';
      $campo[$aux][1] = $this->observacoes_entrega;
      $aux++;

      $chave[0][0] = 'processo';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_agenda_entrega',$campo,$chave);

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'chaves_entregue';
      $campo[$aux][1] = $this->chaves_entregue;
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 47: CHAVES ENTREGUE | ECOLUÇÃO 46: CHAVES NÃO ENTREGUE
      $nova_etapa_workflow = null;
      if($this->chaves_entregue == 'S'){
        $evolucao_etapa_workflow = 47;
      }else if($this->chaves_entregue == 'N'){
        $evolucao_etapa_workflow = 46;
      }
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo',$campo,$chave);


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      if($this->chaves_entregue == 'S'){
        $campo[$aux][1]   = 71; // CHAVES ENTREGUE
      }else if($this->entrega_realizada == 'N'){
        $campo[$aux][1]   = 72; // CHAVES RECUSADA
      }
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);
      

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('ENTREGA DE CHAVES REGISTRADA',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    
    function aprovarTermo(){
    
       // REGISTRA OS DADOS DA AVALIAÇÃO DO TERMO DE RECEBIMENTO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'data_assinatura';
      $campo[$aux][1] = $this->data_termo;
      $aux++;
      $campo[$aux][0] = 'avaliacao';
      $campo[$aux][1] = $this->avaliacao_termo;
      $aux++;

      $chave[0][0] = 'processo';
      $chave[0][1] = $this->id_processo;
      
      $this->con1->executa('tb_agenda_entrega',$campo,$chave);
      

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'evolucao';
      $campo[$aux][1] = 20;
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 49: PROCESSO FINALIZADO
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 49;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo',$campo,$chave);


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 86; // TERMO DE ENTREGA DE CHAVES APROVADO E PROCESSO FINALIZADO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('TERMO DE ENTREGA DE CHAVES APROVADO COM SUCESSO. O PROCESSO DE VENDA CHEGOU À SUA ETAPA FINAL E ESTÁ FINALIZADO. PARABÉNS!!!',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    function reprovarTermo(){
    
       // REGISTRA OS DADOS DA AVALIAÇÃO DO TERMO DE RECEBIMENTO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'data_assinatura';
      $campo[$aux][1] = $this->data_termo;
      $aux++;
      $campo[$aux][0] = 'avaliacao';
      $campo[$aux][1] = $this->avaliacao_termo;
      $aux++;

      $chave[0][0] = 'processo';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_agenda_entrega',$campo,$chave);
    

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'chaves_entregue';
      $campo[$aux][1] = 'R';
      $aux++;
      $campo[$aux][0] = 'atualizado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'atualizado_por';
      $campo[$aux][1] = $_SESSION["id_usuario"];
      $aux++;
      
      // VERIFICA QUE A PRÓXIMA ETAPA DO WORKFLOW DO PROCESSO E ALTERA A COLUNA - EVOLUÇÃO 48: TERMO DE ENTREGA REPROVADO
      $nova_etapa_workflow = null;
      $evolucao_etapa_workflow = 48;
      if($evolucao_etapa_workflow > 0){
        $this->con1->consulta("SELECT id FROM tb_etapas_workflow WHERE workflow='" . $this->workflow . "' AND evolucao='" . $evolucao_etapa_workflow . "' AND online=1 AND status=1");
        if($this->con1->nrows > 0){
          $this->con1->proxRegistro();
          $nova_etapa_workflow = $this->con1->data['id'];
          $campo[$aux][0]  = 'etapa_workflow';
          $campo[$aux][1]  = $nova_etapa_workflow;
          $aux++;
        }
      }

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_processo;

      $this->con1->executa('tb_processo',$campo,$chave);


      // REGISTRA O CONTROLE DE SLA
      $data_registro_sla = date('Y-m-d H:i:s');

      $campo = null;
      $chave = null;

      $campo[0][0]   = 'id';
      $campo[0][1]   = $this->con1->lastId('tb_controle_sla', 'id');
      $campo[1][0]   = 'processo';
      $campo[1][1]   = $this->id_processo;
      $campo[2][0]   = 'etapa_workflow';
      $campo[2][1]   = $nova_etapa_workflow;
      $campo[3][0]   = 'data_hora';
      $campo[3][1]   = $data_registro_sla;
      $campo[4][0]   = 'cadastrado_em';
      $campo[4][1]   = date('Y-m-d H:i:s');
      $campo[5][0]   = 'cadastrado_por';
      $campo[5][1]   = $_SESSION["id_usuario"];

      $this->con1->executa('tb_controle_sla', $campo);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 87; // TERMO DE ENTREGA DE CHAVES REPROVADO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('O TERMO DE ENTREGA DE CHAVES FOI REPROVADO. AGUARDE UM NOVO CARREGAMENTO.',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }

/*--------------------------------------------------------------------*/

/*-------------------------TELA DE CADASTRO-------------------------*/

    function registraManutencao(){
    
      // CONSULTA PARA QUAIS E-MAILS A MENSAGEM DEVE SER ENVIADA (RETORNA: $emails_disparo)
      require_once('data/classe/functions/consulta_emails_disparo.php');
      
      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'processo';
      $campo[$aux][1] = $this->id_processo;
      $aux++;
      $campo[$aux][0] = 'tipo';
      $campo[$aux][1] = $this->tipo_manutencao;
      $aux++;
      $campo[$aux][0] = 'descricao';
      $campo[$aux][1] = $this->descricao_manutencao;
      $aux++;
      if($this->informar_via_email){
        $campo[$aux][0] = 'informar_via_email';
        $campo[$aux][1] = '#' . implode('#',$this->informar_via_email) . '#';
        $aux++;
      }
      if($this->emails_copia){
        $campo[$aux][0] = 'emails_copia';
        $campo[$aux][1] = $this->emails_copia;
        $aux++;
      }
      $campo[$aux][0] = 'cadastrado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'cadastrado_por';
      $campo[$aux][1] = $_SESSION['id_usuario'];
      $aux++;

      $this->con1->executa('tb_manutencao',$campo);
      
      
      // BUSCA A CATEGORIA E O TIPO DA MANUTENÇÃO PARA O DISPARO DO E-MAIL
      $this->con1->consulta("SELECT tb_categoria_interacao.descricao as descricao_categoria, tb_tipo_manutencao.descricao as descricao_tipo
                             FROM tb_tipo_manutencao
                             LEFT JOIN tb_categoria_interacao ON tb_tipo_manutencao.categoria = tb_categoria_interacao.id
                             WHERE tb_tipo_manutencao.id='" . $this->tipo_manutencao . "'");
      $this->con1->proxRegistro();
      
      $descricao_categoria = $this->con1->data['descricao_categoria'];
      $descricao_tipo = $this->con1->data['descricao_tipo'];
      

      // DETALHE DA MANUTENÇÃO
      $detalhe_manutencao  = '';
      $detalhe_manutencao .= '<b>CATEGORIA:</b> ' . $descricao_categoria . '<br />';
      $detalhe_manutencao .= '<b>MOTIVO:</b> ' . $descricao_tipo . '<br />';
      $detalhe_manutencao .= '<b>DESCRIÇÃO:</b> ' . $this->descricao_manutencao;
      
      
      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=4 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');
        
        // MODIFICA AS INFORMAÇÕES PADRÃO
        $destinatarios = $emails_disparo;
        $mensagem = preg_replace("@\[DETALHE_MANUTENCAO\]@",$detalhe_manutencao,$mensagem);

        if($destinatarios){
          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';
        
          // DISPARA A MENSAGEM
          $this->php->disparaEmail('DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);
        }
      }
      
      // INCREMENTA O CONTADOR DE MANUTENÇÕES NO PROCESSO
      $this->con1->consulta("SELECT manutencoes FROM tb_processo WHERE id='" . $this->id_processo . "'");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();
      
        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0] = 'manutencoes';
        $campo[$aux][1] = $this->con1->data['manutencoes'] + 1;
        $aux++;

        $chave[0][0]   = 'id';
        $chave[0][1]   = $this->id_processo;

        $this->con1->executa('tb_processo', $campo, $chave);
        
      }


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 81; // REGISTRO DE MANUTENÇÃO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);

      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      if($this->redirecionamento){
        $this->html->js('MANUTENÇÃO LIBERADA',$_SERVER['PHP_SELF'] . preg_replace("@\[ID_PROCESSO\]@",$this->id_processo,$this->redirecionamento));
      }else{
        $this->html->js('MANUTENÇÃO REGISTRADA',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);
      }

    }
    
    function registraAlerta(){
    
      // TRANSFERE OS SETORES QUE SERÃO INFORMADOS VIA E-MAIL
      $this->informar_via_email = $this->permitir_visualizacao;
    
      // CONSULTA PARA QUAIS E-MAILS A MENSAGEM DEVE SER ENVIADA (RETORNA: $emails_disparo)
      require_once('data/classe/functions/consulta_emails_disparo.php');

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'processo';
      $campo[$aux][1] = $this->id_processo;
      $aux++;
      $campo[$aux][0] = 'tipo';
      $campo[$aux][1] = $this->tipo_alerta;
      $aux++;
      $campo[$aux][0] = 'descricao';
      $campo[$aux][1] = $this->descricao_alerta;
      $aux++;
      if($this->permitir_visualizacao){
        $campo[$aux][0] = 'permitir_visualizacao';
        $campo[$aux][1] = '#' . implode('#',$this->permitir_visualizacao) . '#';
        $aux++;
      }
      $campo[$aux][0] = 'informar_envolvidos';
      $campo[$aux][1] = $this->informar_envolvidos;
      $aux++;
      if($this->emails_copia){
        $campo[$aux][0] = 'emails_copia';
        $campo[$aux][1] = $this->emails_copia;
        $aux++;
      }
      $campo[$aux][0] = 'cadastrado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'cadastrado_por';
      $campo[$aux][1] = $_SESSION['id_usuario'];
      $aux++;

      $this->con1->executa('tb_alerta',$campo);
      
      
      // BUSCA A CATEGORIA E O TIPO DA MANUTENÇÃO PARA O DISPARO DO E-MAIL
      $this->con1->consulta("SELECT tb_categoria_interacao.descricao as descricao_categoria, tb_tipo_alerta.descricao as descricao_tipo
                             FROM tb_tipo_alerta
                             LEFT JOIN tb_categoria_interacao ON tb_tipo_alerta.categoria = tb_categoria_interacao.id
                             WHERE tb_tipo_alerta.id='" . $this->tipo_alerta . "'");
      $this->con1->proxRegistro();

      $descricao_categoria = $this->con1->data['descricao_categoria'];
      $descricao_tipo = $this->con1->data['descricao_tipo'];


      // DETALHE DO ALERTA
      $detalhe_alerta  = '';
      $detalhe_alerta .= '<b>CATEGORIA:</b> ' . $descricao_categoria . '<br />';
      $detalhe_alerta .= '<b>MOTIVO:</b> ' . $descricao_tipo . '<br />';
      $detalhe_alerta .= '<b>DESCRIÇÃO:</b> ' . $this->descricao_alerta . '<br />';

      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=6 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');

        // MODIFICA AS INFORMAÇÕES PADRÃO
        $destinatarios = $emails_disparo;
        $mensagem = preg_replace("@\[DETALHE_ALERTA\]@",$detalhe_alerta,$mensagem);

        if($destinatarios){
          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';

          // DISPARA A MENSAGEM
          $this->php->disparaEmail('DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);
        }
      }

      

      // INCREMENTA O CONTADOR DE ALERTAS NO PROCESSO
      $this->con1->consulta("SELECT alertas FROM tb_processo WHERE id='" . $this->id_processo . "'");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0] = 'alertas';
        $campo[$aux][1] = $this->con1->data['alertas'] + 1;
        $aux++;

        $chave[0][0]   = 'id';
        $chave[0][1]   = $this->id_processo;

        $this->con1->executa('tb_processo', $campo, $chave);

      }


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 83; // REGISTRO DE ALERTA
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('ALERTA REGISTRADO',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    function excluirAlerta(){

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'status';
      $campo[$aux][1] = 0;
      $aux++;

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_alerta;

      $this->con1->executa('tb_alerta',$campo,$chave);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 93; // ALERTA EXCLUÍDO
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Alerta EXCLUÍDA com sucesso',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    function registraPendencia(){
    
      // TRANSFERE OS SETORES QUE SERÃO INFORMADOS VIA E-MAIL
      $this->informar_via_email = $this->permitir_visualizacao;

      // CONSULTA PARA QUAIS E-MAILS A MENSAGEM DEVE SER ENVIADA (RETORNA: $emails_disparo)
      require_once('data/classe/functions/consulta_emails_disparo.php');

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'processo';
      $campo[$aux][1] = $this->id_processo;
      $aux++;
      $campo[$aux][0] = 'motivo';
      $campo[$aux][1] = $this->tipo_pendencia;
      $aux++;
      $campo[$aux][0] = 'descricao';
      $campo[$aux][1] = $this->descricao_pendencia;
      $aux++;
      $campo[$aux][0] = 'responsavel';
      $campo[$aux][1] = $this->responsavel_pendencia;
      $aux++;
      $campo[$aux][0] = 'dias';
      $campo[$aux][1] = $this->dias_pendencia;
      $aux++;
      $campo[$aux][0] = 'horas';
      $campo[$aux][1] = $this->horas_pendencia;
      $aux++;
      $campo[$aux][0] = 'minutos';
      $campo[$aux][1] = $this->minutos_pendencia;
      $aux++;
      $campo[$aux][0] = 'prazo_limite';
      $campo[$aux][1] = $this->prazo_limite;
      $aux++;
      $campo[$aux][0] = 'pausar_processo';
      $campo[$aux][1] = $this->pausar_processo;
      $aux++;
      $campo[$aux][0] = 'validar_solucao';
      $campo[$aux][1] = $this->validar_solucao;
      $aux++;
      $campo[$aux][0] = 'gera_manutencao';
      $campo[$aux][1] = $this->gera_manutencao;
      $aux++;
      $campo[$aux][0] = 'informar_envolvidos';
      $campo[$aux][1] = $this->informar_envolvidos;
      $aux++;
      if($this->emails_copia){
        $campo[$aux][0] = 'emails_copia';
        $campo[$aux][1] = $this->emails_copia;
        $aux++;
      }
      if($this->permitir_visualizacao){
        $campo[$aux][0] = 'permitir_visualizacao';
        $campo[$aux][1] = '#' . implode('#',$this->permitir_visualizacao) . '#';
        $aux++;
      }
      $campo[$aux][0] = 'cadastrado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'cadastrado_por';
      $campo[$aux][1] = $_SESSION['id_usuario'];
      $aux++;

      $this->con1->executa('tb_pendencia',$campo);
      
      
      // BUSCA A CATEGORIA E O MOTIVO DA PENDÊNCIA PARA O DISPARO DO E-MAIL
      $this->con1->consulta("SELECT tb_categoria_interacao.descricao as descricao_categoria, tb_motivo_pendencia.descricao as descricao_tipo
                             FROM tb_motivo_pendencia
                             LEFT JOIN tb_categoria_interacao ON tb_motivo_pendencia.categoria = tb_categoria_interacao.id
                             WHERE tb_motivo_pendencia.id='" . $this->tipo_pendencia . "'");
      $this->con1->proxRegistro();

      $descricao_categoria = $this->con1->data['descricao_categoria'];
      $descricao_tipo = $this->con1->data['descricao_tipo'];


      // DETALHE DA PENDÊNCIA
      $detalhe_pendencia  = '';
      $detalhe_pendencia .= '<b>CATEGORIA:</b> ' . $descricao_categoria . '<br />';
      $detalhe_pendencia .= '<b>MOTIVO:</b> ' . $descricao_tipo . '<br />';
      $detalhe_pendencia .= '<b>DESCRIÇÃO:</b> ' . $this->descricao_pendencia . '<br />';

      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=5 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');

        // MODIFICA AS INFORMAÇÕES PADRÃO
        $destinatarios = $emails_disparo;
        $mensagem = preg_replace("@\[DETALHE_PENDENCIA\]@",$detalhe_pendencia,$mensagem);

        if($destinatarios){
          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';

          // DISPARA A MENSAGEM
          $this->php->disparaEmail('DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);
        }
      }
      
      // INCREMENTA O CONTADOR DE PENDÊNCIAS NO PROCESSO
      $this->con1->consulta("SELECT pendencias FROM tb_processo WHERE id='" . $this->id_processo . "'");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0]   = 'pendencias';
        $campo[$aux][1]   = $this->con1->data['pendencias'] + 1;
        $aux++;

        $chave[0][0]   = 'id';
        $chave[0][1]   = $this->id_processo;

        $this->con1->executa('tb_processo', $campo, $chave);

      }


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 82; // REGISTRO DE PENDÊNCIA
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('PENDÊNCIA REGISTRADA',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    function concluirPendencia(){

      // CONSULTA PARA QUAIS E-MAILS A MENSAGEM DEVE SER ENVIADA (RETORNA: $emails_disparo)
      require_once('data/classe/functions/consulta_emails_disparo.php');

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'concluido_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'concluido_por';
      $campo[$aux][1] = $_SESSION['id_usuario'];
      $aux++;
      
      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_pendencia;

      $this->con1->executa('tb_pendencia',$campo,$chave);
      
      
      // BUSCA A CATEGORIA E O MOTIVO DA PENDÊNCIA PARA O DISPARO DO E-MAIL
      $this->con1->consulta("SELECT A.nome as nome_cadastrado_por, tb_pendencia.cadastrado_em, tb_categoria_interacao.descricao as descricao_categoria, tb_motivo_pendencia.descricao as descricao_tipo
                             FROM tb_pendencia
                             INNER JOIN tb_motivo_pendencia ON tb_pendencia.motivo = tb_motivo_pendencia.id
                             INNER JOIN tb_categoria_interacao ON tb_motivo_pendencia.categoria = tb_categoria_interacao.id
                             LEFT JOIN tb_sgg3_autenticacao A ON tb_pendencia.cadastrado_por = A.id
                             WHERE tb_pendencia.id=' . $this->id_pendencia . '");
      $this->con1->proxRegistro();

      $descricao_categoria = $this->con1->data['descricao_categoria'];
      $descricao_tipo      = $this->con1->data['descricao_tipo'];
      $cadastrado_por      = $this->con1->data['nome_cadastrado_por'];
      $arrCadastradoEm     = preg_split("/ /",$this->con1->data['cadastrado_em']);
      $cadastrado_em       = $this->php->inverteData($arrCadastradoEm[0]) . ' às ' . str_replace(':','h',substr($arrCadastradoEm[1],0,5));


      // DETALHE DA PENDÊNCIA
      $detalhe_pendencia  = '';
      $detalhe_pendencia .= '<b>CATEGORIA:</b> ' . $descricao_categoria . '<br />';
      $detalhe_pendencia .= '<b>MOTIVO:</b> ' . $descricao_tipo . '<br />';
      $detalhe_pendencia .= '<b>DESCRIÇÃO:</b> ' . $this->descricao_pendencia . '<br />';


      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=8 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');

        // MODIFICA AS INFORMAÇÕES PADRÃO
        $destinatarios = $emails_disparo;
        $mensagem = preg_replace("@\[DETALHE_PENDENCIA\]@",$detalhe_pendencia,$mensagem);
        $mensagem = preg_replace("@\[USUARIO_PENDENCIA\]@",$cadastrado_por,$mensagem);
        $mensagem = preg_replace("@\[DATA_PENDENCIA\]@",$cadastrado_em,$mensagem);

        if($destinatarios){
          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';
        
          // DISPARA A MENSAGEM
          $this->php->disparaEmail('DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);
        }
      }


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 90; // PENDÊNCIA CONCLUÍDA
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Pendência CONCLUÍDA com sucesso',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    function excluirPendencia(){

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'status';
      $campo[$aux][1] = 0;
      $aux++;
      
      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_pendencia;

      $this->con1->executa('tb_pendencia',$campo,$chave);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 91; // PENDÊNCIA EXCLUÍDA
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Pendência EXCLUÍDA com sucesso',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    function validarPendencia(){
    
      // CONSULTA PARA QUAIS E-MAILS A MENSAGEM DEVE SER ENVIADA (RETORNA: $emails_disparo)
      require_once('data/classe/functions/consulta_emails_disparo.php');

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'validado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'validado_por';
      $campo[$aux][1] = $_SESSION['id_usuario'];
      $aux++;
      
      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_pendencia;

      $this->con1->executa('tb_pendencia',$campo,$chave);
      
      
      // BUSCA A CATEGORIA E O MOTIVO DA PENDÊNCIA PARA O DISPARO DO E-MAIL
      $this->con1->consulta("SELECT A.nome as nome_cadastrado_por, tb_pendencia.cadastrado_em, B.nome as nome_concluido_por, tb_pendencia.concluido_em, tb_categoria_interacao.descricao as descricao_categoria, tb_motivo_pendencia.descricao as descricao_tipo
                             FROM tb_pendencia
                             INNER JOIN tb_motivo_pendencia ON tb_pendencia.motivo = tb_motivo_pendencia.id
                             INNER JOIN tb_categoria_interacao ON tb_motivo_pendencia.categoria = tb_categoria_interacao.id
                             LEFT JOIN tb_sgg3_autenticacao A ON tb_pendencia.cadastrado_por = A.id
                             LEFT JOIN tb_sgg3_autenticacao B ON tb_pendencia.concluido_por = B.id
                             WHERE tb_pendencia.id=' . $this->id_pendencia . '");
      $this->con1->proxRegistro();

      $descricao_categoria = $this->con1->data['descricao_categoria'];
      $descricao_tipo      = $this->con1->data['descricao_tipo'];
      $cadastrado_por      = $this->con1->data['nome_cadastrado_por'];
      $arrCadastradoEm     = preg_split("/ /",$this->con1->data['cadastrado_em']);
      $cadastrado_em       = $this->php->inverteData($arrCadastradoEm[0]) . ' às ' . str_replace(':','h',substr($arrCadastradoEm[1],0,5));
      $concluido_por       = $this->con1->data['nome_concluido_por'];
      $arrConcluidoEm      = preg_split("/ /",$this->con1->data['concluido_em']);
      $concluido_em        = $this->php->inverteData($arrConcluidoEm[0]) . ' às ' . str_replace(':','h',substr($arrConcluidoEm[1],0,5));


      // DETALHE DA PENDÊNCIA
      $detalhe_pendencia  = '';
      $detalhe_pendencia .= '<b>CATEGORIA:</b> ' . $descricao_categoria . '<br />';
      $detalhe_pendencia .= '<b>MOTIVO:</b> ' . $descricao_tipo . '<br />';
      $detalhe_pendencia .= '<b>DESCRIÇÃO:</b> ' . $this->descricao_pendencia . '<br />';



      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=9 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');

        // MODIFICA AS INFORMAÇÕES PADRÃO
        $destinatarios = $emails_disparo;
        $mensagem = preg_replace("@\[DETALHE_PENDENCIA\]@",$detalhe_pendencia,$mensagem);
        $mensagem = preg_replace("@\[USUARIO_PENDENCIA\]@",$cadastrado_por,$mensagem);
        $mensagem = preg_replace("@\[DATA_PENDENCIA\]@",$cadastrado_em,$mensagem);
        $mensagem = preg_replace("@\[NOME_CONCLUSAO_PENDENCIA\]@",$concluido_por,$mensagem);
        $mensagem = preg_replace("@\[CONCLUSAO_PENDENCIA\]@",$concluido_em,$mensagem);

        if($destinatarios){
          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';
        
          // DISPARA A MENSAGEM
          $this->php->disparaEmail('DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);
        }
      }


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 92; // PENDÊNCIA VALIDADA
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Pendência VALIDADA com sucesso',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    

    function registraConversa(){
    
      // TRANSFERE OS SETORES QUE SERÃO INFORMADOS VIA E-MAIL
      $this->informar_via_email = $this->permitir_visualizacao;
    
      // CONSULTA PARA QUAIS E-MAILS A MENSAGEM DEVE SER ENVIADA (RETORNA: $emails_disparo)
      require_once('data/classe/functions/consulta_emails_disparo.php');

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'processo';
      $campo[$aux][1] = $this->id_processo;
      $aux++;
      $campo[$aux][0] = 'atendente';
      $campo[$aux][1] = $this->atendente_conversa;
      $aux++;
      $campo[$aux][0] = 'data_hora';
      $campo[$aux][1] = $this->php->inverteData($this->data_conversa) . ' ' . $this->hora_conversa . ':' . date(s);
      $aux++;
      $campo[$aux][0] = 'meio_comunicacao';
      $campo[$aux][1] = $this->meio_comunicacao;
      $aux++;
      $campo[$aux][0] = 'descricao';
      $campo[$aux][1] = $this->descricao_conversa;
      $aux++;
      $campo[$aux][0] = 'retorno';
      $campo[$aux][1] = $this->retorno_conversa;
      $aux++;
      if($this->permitir_visualizacao){
        $campo[$aux][0] = 'permitir_visualizacao';
        $campo[$aux][1] = '#' . implode('#',$this->permitir_visualizacao) . '#';
        $aux++;
      }
      $campo[$aux][0] = 'informar_envolvidos';
      $campo[$aux][1] = $this->informar_envolvidos;
      $aux++;
      if($this->emails_copia){
        $campo[$aux][0] = 'emails_copia';
        $campo[$aux][1] = $this->emails_copia;
        $aux++;
      }
      $campo[$aux][0] = 'cadastrado_em';
      $campo[$aux][1] = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0] = 'cadastrado_por';
      $campo[$aux][1] = $_SESSION['id_usuario'];

      $this->con1->executa('tb_conversa',$campo);
      
      
      // BUSCA A CATEGORIA E O MOTIVO DA PENDÊNCIA PARA O DISPARO DO E-MAIL
      $this->con1->consulta("SELECT descricao
                             FROM tb_meio_comunicacao
                             WHERE id='" . $this->meio_comunicacao . "'");
      $this->con1->proxRegistro();

      $descricao_meio_comunicacao = $this->con1->data['descricao'];


      // DETALHE DA PENDÊNCIA
      $detalhe_pendencia  = '';
      $detalhe_pendencia .= '<b>MEIO DE COMUNICAÇÃO:</b> ' . $descricao_meio_comunicacao . '<br />';
      $detalhe_pendencia .= '<b>ATENDENTE:</b> ' . $atendente . '<br />';
      $detalhe_pendencia .= '<b>INFORMAÇÕES PASSADAS AO CLIENTE:</b> ' . $this->descricao_conversa . '<br />';
      $detalhe_pendencia .= '<b>RETORNO OBTIDO JUNTO AO CLIENTE:</b> ' . $this->retorno_conversa . '<br />';


      $this->con1->consulta("SELECT * FROM tb_padrao_email WHERE id=7 AND status=1");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        require_once('data/classe/functions/preparaDisparoEmail.php');

        // MODIFICA AS INFORMAÇÕES PADRÃO
        $destinatarios = $emails_disparo;
        $mensagem = preg_replace("@\[DETALHE_PENDENCIA\]@",$detalhe_pendencia,$mensagem);

        if($destinatarios){
          // CÓPIA DE SEGURANÇA - P/ TESTE
          $destinatarios .= ';Gregor Duarte#gregorduarte@gmail.com';
        
          // DISPARA A MENSAGEM
          $this->php->disparaEmail('DOMMUS ' . $this->default_nome_cliente . '#' . $this->default_email_disparo, base64_encode('@Gsds1285'), $this->default_servidor_smtp, 465, $destinatarios, $assunto, $mensagem, $assinatura);
        }
      }
      
      
      // INCREMENTA O CONTADOR DE CONVERSAS NO PROCESSO
      $this->con1->consulta("SELECT conversas FROM tb_processo WHERE id='" . $this->id_processo . "'");
      if($this->con1->nrows > 0){
        $this->con1->proxRegistro();

        $campo = null;
        $chave = null;

        $aux = 0;
        $campo[$aux][0]   = 'conversas';
        $campo[$aux][1]   = $this->con1->data['conversas'] + 1;
        $aux++;

        $chave[0][0]   = 'id';
        $chave[0][1]   = $this->id_processo;

        $this->con1->executa('tb_processo', $campo, $chave);

      }


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 84; // REGISTRO DE CONVERSA
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('CONVERSA REGISTRADA',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }
    
    function excluirConversa(){

      // ALTERA DADOS DO PROCESSO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0] = 'status';
      $campo[$aux][1] = 0;
      $aux++;

      $chave[0][0] = 'id';
      $chave[0][1] = $this->id_conversa;

      $this->con1->executa('tb_conversa',$campo,$chave);


      // LOG EVOLUTIVO
      $campo = null;
      $chave = null;

      $aux = 0;
      $campo[$aux][0]   = 'id';
      $campo[$aux][1]   = $this->con1->lastId('tb_log_evolutivo', 'id');
      $aux++;
      $campo[$aux][0]   = 'tipo';
      $campo[$aux][1]   = 94; // CONVERSA EXCLUÍDA
      $aux++;
      $campo[$aux][0]   = 'id_processo';
      $campo[$aux][1]   = $this->id_processo;
      $aux++;
      $campo[$aux][0]   = 'id_autenticacao';
      $campo[$aux][1]   = $_SESSION["id_usuario"];
      $aux++;
      $campo[$aux][0]   = 'data_hora';
      $campo[$aux][1]   = date('Y-m-d H:i:s');
      $aux++;
      $campo[$aux][0]   = 'ip';
      $campo[$aux][1]   = $_SERVER["REMOTE_ADDR"];
      $aux++;

      $this->con1->executa('tb_log_evolutivo', $campo);


      // EXIBIÇÃO DA MENSAGEM DE CONFIRMAÇÃO E REDIRECIONAMENTO DA PÁGINA
      $this->html->js('Alerta EXCLUÍDA com sucesso',$_SERVER['PHP_SELF'] . '?mgr=' . $this->mgr . '&ui=' . $this->ui . '&id_processo=' . $this->id_processo);

    }

/*--------------------------------------------------------------------*/

/*-------------------------TELA DE CADASTRO-------------------------*/

    function cadastro(){
      require_once('data/classe/functions/pessoa_fisica.cadastro.function.php');
    }

    function documentacao(){
      require_once('data/classe/functions/pessoa_fisica.documentacao.function.php');
    }
    
    function entrevista(){
      require_once('data/classe/functions/pessoa_fisica.entrevista.function.php');
    }
    
    function financiamento(){
      require_once('data/classe/functions/pessoa_fisica.financiamento.function.php');
    }
    function financiamentoUi(){
      require_once('data/classe/functions/pessoa_fisica.financiamento-ui.function.php');
    }

    function negociacao(){
      require_once('data/classe/functions/pessoa_fisica.negociacao.function.php');
    }
    
    // HOMOLOGAÇÃO
    function negociacaoTeste(){
      require_once('data/classe/functions/pessoa_fisica.negociacaoTeste.function.php');
    }
    function negociacaoUi(){
      require_once('data/classe/functions/pessoa_fisica.negociacao-ui.function.php');
    }
    
    function contrato(){
      require_once('data/classe/functions/pessoa_fisica.contrato.function.php');
    }

    function repasse(){
      require_once('data/classe/functions/pessoa_fisica.repasse.function.php');
    }
    
    function registro(){
      require_once('data/classe/functions/pessoa_fisica.registro.function.php');
    }

    function formalizacao(){
      require_once('data/classe/functions/pessoa_fisica.formalizacao.function.php');
    }

    function controleFormalizacao(){
      require_once('data/classe/functions/pessoa_fisica.controleFormalizacao.function.php');
    }
    
    function entregaChaves(){
      require_once('data/classe/functions/pessoa_fisica.entregaChaves.function.php');
    }

    function agendaEntregaChaves(){
      require_once('data/classe/functions/pessoa_fisica.agendaEntregaChaves.function.php');
    }

    function exibeRegistros(){
      // MÉTODO DE EXIBIÇÃO DOS STATUS | F = FIXO (PELA EVOLUÇÃO) OU D = DINÂMICO (PELA ETAPA WORKFLOW)
      if($this->default_metodo_exibe_status == 'F'){
        require_once('data/classe/functions/pessoa_fisica.exibeRegistros.function.php');
      }else if($this->default_metodo_exibe_status == 'D'){
        require_once('data/classe/functions/pessoa_fisica.exibeRegistrosDinamico.function.php');
      }else if($this->default_metodo_exibe_status == 'O'){
        require_once('data/classe/functions/pessoa_fisica.exibeRegistrosOficial.function.php');
      }else{
        echo 'ERRO: Método de exibição de status não configurado.';
      }
    }
    
    function alertas(){
      // MÉTODO DE EXIBIÇÃO DOS STATUS | F = FIXO (PELA EVOLUÇÃO) OU D = DINÂMICO (PELA ETAPA WORKFLOW)
      if($this->default_metodo_exibe_status == 'F'){
        require_once('data/classe/functions/pessoa_fisica.alertas.function.php');
      }else if($this->default_metodo_exibe_status == 'D'){
        require_once('data/classe/functions/pessoa_fisica.alertasDinamico.function.php');
      }else if($this->default_metodo_exibe_status == 'O'){
        require_once('data/classe/functions/pessoa_fisica.alertasOficial.function.php');
      }else{
        echo 'ERRO: Método de exibição de status não configurado.';
      }
    }
    
    function placarEstatistico(){
      require_once('data/classe/functions/pessoa_fisica.placarEstatistico.function.php');
    }
    
    function metricasEmpreendimento(){
      require_once('data/classe/functions/pessoa_fisica.metricasEmpreendimento.function.php');
    }
    
    function historicoArquivos(){
      require_once('data/classe/functions/pessoa_fisica.historicoArquivos.function.php');
    }
    
    function interacoes(){
      require_once('data/classe/functions/pessoa_fisica.interacoes.function.php');
    }

    function dashboards(){
      require_once('data/classe/functions/pessoa_fisica.dashboards.function.php');
    }

  }
?>
