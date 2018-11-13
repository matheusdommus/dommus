<?php
    /*
  Descri��o ..........: Classe com v�rios m�todos PHP
  Modifica��es .......:
 		16/08/2004 - 17/08/2004:
			* implementado o m�todo execSql,
        que executa comando SQL no banco de dados

      *modificado o m�todo strSpace() da classe php,
        agora possui um terceiro par�metro (html ou txt),
        que serve para definir o tipo de espa�o, espa�o normal
        (para arquivos txt por ex) ou espa�o &nbsp; (para html)

      * classe subdivida em subclasses para facilitar o uso.
					  ----------------> Banco de Dados <----------------
             Antes                                   Depois
          $obj->conecta();                    $obj->banco->conecta();
          $obj->consulta();                   $obj->banco->consulta();
          $obj->lastId();                     $obj->banco->lastId();
          $obj->executa();                    $obj->banco->executa();
          $obj->proxResgistro();              $obj->banco->proxRegistro();
          $obj->anteResgistro();              $obj->banco->anteRegistro();
          $obj->data['campo'];                $obj->banco->data['campo'];
          $obj->exclui();                    	$obj->banco->exclui();
            --------------> Fim Banco de Dados <--------------

            --------------> HTML / Java Script <--------------
             Antes                                   Depois
          $obj->geraCombo();                  $obj->html->geraCombo();
          $obj->js();                         $obj->html->js();
          $obj->redireciona();                $obj->html->redireciona();
            ------------> Fim HTML / Java Script <------------

            ---------------------> PHP <---------------------
             Antes                                   Depois
          $obj->inverteData();                $obj->php->inverteData();
          $obj->strZero();                    $obj->php->strZero();
          $obj->eliminaZero();                $obj->php->eliminaZero();
          $obj->strSpace();                   $obj->php->strSpace();
            -------------------> Fim PHP <-------------------

		22/12/2004
      * suporte total a access na subclasse banco, como usar:
				declarar que ira usar banco access da seguinte forma:
				
						$obj->banco->db = 'access'; // access n�o precisa ser case sensitive

			* acrescentado "@" antes das fun��es para que apenas os erros programados apare�am
        */

  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
	class banco {
    /* variaveis para conex�o com o banco de dados */
    var $db;		                  // tipo de banco a ser usado (access ou *mysql)   *padrao
    var $host;                    // host do banco de dados MySQL
    var $user;                    // usu�rio v�lido no banco de dados
    var $password;                // senha do usu�rio
    var $database;                // nome do banco de dados
    /* fim vari�veis conex�o */

    /*  */
    var $data;                    // mysql_fetch_array atual
    var $numLin;                	// n�mero da linha atual.
    var $nrows;                   // num�ro de linhas da consulta atual
    var $idtLink;                	// liga��o com o registro no banco de dados
    var $idtQuery;                // consulta ativa no banco de dados

    var $maxRegistro;             // M�ximo de registros exibidos por p�gina no m�todo pagina��o
    var $maxPaginacao;            // M�ximo de p�ginas exibidas
    /*  */

    /* m�todo construtor da classe */
    function banco() {
		$this->db		                = 'mysql';
    	$this->host         			= '';
	    $this->user         			= '';
	    $this->password     			= '';
	    $this->database     			= '';

	    $this->data               = array();
	    $this->nrows              = 0;
	    $this->idtLink            = 0;
	    $this->idtQuery           = 0;

      $this->maxRegistro        = 10;
      $this->maxPaginacao       = 11;
    }
    /* fim do m�todo construtor da classe */

   	/*
    	m�todo ...............: erroPadrao
      descri��o ............: mostra uma msg de erro e para a execu��o do script
      par�metros ...........:  message .....: mensagem de erro a ser exibida
      uso ..................: $this->erroPadrao('mensagem do erro');
    */
    function erroPadrao($message) {
      echo '<p><b>Erro no sistema!</b><br>Descri��o do erro:</p>';
      echo '<p><font color=red><b>' . $message . '</b></font></p>';
      echo '<p>Entre em contato com o <b>Administrador.</b></p>';
      die();
    }
    /* fim do m�todo erroPadrao */

    /*
      m�todo ...............: configura
      descri��o ............: configura as vari�veis de conex�o com o MySQL
      par�metros ...........: arquivo .....: arquivo com as configura��es MySQL
      uso ..................: $this->configura('arquivo.php');
    */
    function configura($arquivo) {
      if($arquivo == '')
        return false;

      $part = explode('.', $arquivo);
      if(count($part) <= 0)
        $this->erroPadrao('Arquivo de configura��o inv�lido.');

      require $arquivo;
      
      $this->db                    	 = ((isset($db))        ? $db       : $this->db         );
      $this->host                    = ((isset($host))      ? $host     : $this->host       );
      $this->user                    = ((isset($user))      ? $user     : $this->user       );
      $this->password                = ((isset($password))  ? $password : $this->password   );
      $this->database                = ((isset($database))  ? $database : $this->database   );
    }
    /* fim do m�todo configura */

		/*
      m�todo ...............: conecta
      descri��o ............: abre conex�o com o banco de dados mysql
      par�metros ...........: nenhum
      uso ..................: $this->conecta();
    */
    function conecta() {
      if(0 == $this->idtLink) {
        // se database for igual a MYSQL
        if(strtolower($this->db) == 'mysql') {
          // faz a conex�o
	        $this->idtLink = @mysql_connect($this->host, $this->user, $this->password);
	        // caso n�o consiga conectar exibe um erro
	        if(!$this->idtLink)
	          $this->erroPadrao('N�o foi possivel conectar ao banco de dados.');

					// tenta selecionar o banco de dados, caso n�o consiga, exibe um erro
	        if(!@mysql_query(sprintf('use %s', $this->database), $this->idtLink))
	          $this->erroPadrao('N�o foi possivel selecionar o banco de dados.');
				}
				// sen�o se database for igual a ACCESS
				elseif(strtolower($this->db) == 'access') {
				  // faz a conex�o
          $this->idtLink = @odbc_connect($this->host, $this->user, $this->password);
          // caso n�o consiga conectar exibe um erro
	        if(!$this->idtLink)
	          $this->erroPadrao('N�o foi possivel conectar ao banco de dados.');
				}
				
				// se nenhum dos bancos v�lidos retorna falso
				else
				  return false;
      }
    }
    /* fim do m�todo conecta */

    function geraComboBanco($nome, $tabela, $mostra, $passa, $padrao = null, $condicao = '', $campos_antes = null) {
      if(0 == $this->idtLink)
        $this->conecta();

      $tag                = '
                            <select name="'.$nome.'">
                                                              ';

      if($campos_antes != null && is_array($campos_antes)) {
        for($i = 0; $i < count($campos_antes); $i++) {
          if($padrao == $campos_antes[$i][1])
            $tag .= '<option value="'.$campos_antes[$i][1].'" selected>'.$campos_antes[$i][0].'</option>
                                                                        ';
          elseif($padrao != $campos_antes[$i][1])
            $tag .= '<option value="'.$campos_antes[$i][1].'">'.$campos_antes[$i][0].'</option>
                                                                        ';
        }
      }

      $sql = "SELECT " . $mostra . ", " . $passa . " FROM " . $tabela;
      if($condicao != '' && $condicao != null)
        $sql .= " WHERE " . $condicao;

      $this->consulta($sql);

      while($this->proxRegistro()) {
        if($padrao == $this->data[$passa])
          $tag .= '<option value="'.$this->data[$passa].'" selected>'.$this->data[$mostra].'</option>
                                                                ';
        elseif($padrao != $this->data[$passa])
          $tag .= '<option value="'.$this->data[$passa].'">'.$this->data[$mostra].'</option>
                                                                ';
      }

      $tag .= '</select>
      ';

      return $tag;
    }

    /*
      m�todo ...............: consulta
      descri��o ............: executa uma consulta SQL no banco de dados e retorna o resultado
      par�metros ...........: $cmdQuery ....: consulta SQL a ser rodados no banco de dados
      uso ..................: $this->consulta('SELECT * FROM usuarios');
    */
    function consulta($sqlOrTable, $chave = null) {
      // verifica se a conex�o com o banco ainda n�o foi feita, caso true, chama a fun��o conecta
      if(0 == $this->idtLink)
        $this->conecta();

			if(stristr($sqlOrTable, 'SELECT') || stristr($sqlOrTable, 'FROM')) {
				$cmdQuery = $sqlOrTable;
			}
			else {
				$sql[0] = 'SELECT * FROM ' . $sqlOrTable;
				$sql[1] = '';
				
				if(is_array($chave)) {
					$sql[1] = ' WHERE ';
					
					for($i = 0; $i < sizeof($chave); $i++) {
					  if(stristr($chave[$i][0], '>=')) {
							$chave[$i][0] = str_ireplace('>=', '', $chave[$i][0]);
							if(is_int($chave[$i][1]))
								$sql[1]				.= " " . $chave[$i][0] . " >= " . $chave[$i][1] . "";
							else
							  $sql[1]				.= " " . $chave[$i][0] . " >= '" . $chave[$i][1] . "'";
						}
						
						elseif(stristr($chave[$i][0], '>')) {
						  $chave[$i][0] = str_ireplace('>', '', $chave[$i][0]);
						  $sql[1] .= " " . $chave[$i][0] . " > '" . $chave[$i][1] . "'";
						}
							
						elseif(stristr($chave[$i][0], '<=')) {
						  $chave[$i][0] = str_ireplace('<=', '', $chave[$i][0]);
						  $sql[1] .= " " . $chave[$i][0] . " <= '" . $chave[$i][1] . "'";
						}
						
						elseif(stristr($chave[$i][0], '<')) {
						  $chave[$i][0] = str_ireplace('<', '', $chave[$i][0]);
						  $sql[1] .= " " . $chave[$i][0] . " < '" . $chave[$i][1] . "'";
						}
						
						elseif(stristr($chave[$i][0], '<>')) {
						  $chave[$i][0] = str_ireplace('<>', '', $chave[$i][0]);
						  $sql[1] .= " " . $chave[$i][0] . " <> '" . $chave[$i][1] . "'";
						}
						
						elseif(stristr($chave[$i][0], '%LIKE%')) {
						  $chave[$i][0] = str_ireplace('%LIKE%', '', $chave[$i][0]);
						  $sql[1] .= " " . $chave[$i][0] . " LIKE '%" . $chave[$i][1] . "%'";
						}
						
						elseif(stristr($chave[$i][0], '%LIKE')) {
						  $chave[$i][0] = str_ireplace('%LIKE', '', $chave[$i][0]);
						  $sql[1] .= " " . $chave[$i][0] . " LIKE '%" . $chave[$i][1] . "'";
						}
						
						elseif(stristr($chave[$i][0], 'LIKE%')) {
						  $chave[$i][0] = str_ireplace('LIKE%', '', $chave[$i][0]);
						  $sql[1] .= " " . $chave[$i][0] . " LIKE '" . $chave[$i][1] . "%'";
						}
						  
						else {
						  if(stristr($chave[$i][0], '##')) {
                $chave[$i][0] = str_ireplace('##', '', $chave[$i][0]);
                $sql[1] .= " " . $chave[$i][0] . " = " . $chave[$i][1] . "";
							}
							else
							  $sql[1] .= " " . $chave[$i][0] . " = '" . $chave[$i][1] . "'";
						}
						
						if(sizeof($chave) > ($i + 1))
						  $sql[1] .= ' AND ';
					}
				}

				$cmdQuery = $sql[0] . $sql[1];
				
				if(strtolower($this->db) == 'access') {
					$cmdQuery = str_ireplace("'#", "#", $cmdQuery);
					$cmdQuery = str_ireplace("#'", "#", $cmdQuery);
				}

			}
	    // se database for igual a MYSQL
			if(strtolower($this->db) == 'mysql') {
	      $this->idtQuery = @mysql_query($cmdQuery, $this->idtLink);
	      $this->numLin   = 0;
	      if(!$this->idtQuery)
	        $this->erroPadrao('Erro na consulta SQL.<br>' . $cmdQuery . '<br>' . mysql_error());

	      $this->nrows = @mysql_num_rows($this->idtQuery);
			}
			
			// se database for igual a ACCESS
			elseif(strtolower($this->db) == 'access') {
	      $this->idtQuery = @odbc_exec($this->idtLink, $cmdQuery);

	      $this->numLin   = 0;
	      if(!$this->idtQuery)
	        $this->erroPadrao('Erro na consulta SQL.<br>' . $cmdQuery . '<br>' . odbc_error());

				$this->nrows = @odbc_num_rows($this->idtQuery);

				if($this->nrows < 0) {
					$parteQuery				= explode("FROM", $cmdQuery);
					$sql_count				= "SELECT count(*) as nrows FROM ".$parteQuery[1]."";
		  		$res_count				= @odbc_exec($this->idtLink, $sql_count);
			   	$this->nrows 			= @odbc_result ($res_count, "nrows");
				}
			}
			
			// se nenhum dos banco validos retorna falso
			else
			  return false;
			
      return $this->idtQuery;
    }
    /* fim do m�todo consulta */

    /*
      m�todo ...............: proxRegistro
      descri��o ............:
      par�metros ...........: nenhum
      uso ..................: $this->proxRegistro();
    */
    function proxRegistro() {
      // se database for igual a MYSQL
			if(strtolower($this->db) == 'mysql') {
	      $this->data = @mysql_fetch_array($this->idtQuery);
	      $this->numLin += 1;

	      $fimDados = is_array($this->data);
	      if(!$fimDados) {
	        @mysql_free_result($this->idtQuery);
	        $this->idtQuery = 0;
	      }
			}
			
			// se database for igual a ACCESS
			elseif(strtolower($this->db) == 'access') {
			  $this->data = @odbc_fetch_array($this->idtQuery);
	      $this->numLin += 1;

	      $fimDados = is_array($this->data);
	      if(!$fimDados) {
	        @odbc_free_result($this->idtQuery);
	        $this->idtQuery = 0;
	      }
			}
			
		  // se nenhum dos banco validos retorna falso
			else
			  return false;

      return $fimDados;
    }
    /* fim do m�todo proxRegistro */
    
    /*
      m�todo ...............: anteRegistro
      descri��o ............:
      par�metros ...........: nenhum
      uso ..................: $this->anteRegistro();
    */
    function anteRegistro() {
      // se database for igual a MYSQL
			if(strtolower($this->db) == 'mysql') {
	      $this->data = @mysql_fetch_array($this->idtQuery);
	      $this->numLin -= 1;

	      $fimDados = is_array($this->data);
	      if(!$fimDados) {
	        @mysql_free_result($this->idtQuery);
	        $this->idtQuery = 0;
	      }
			}

			// se database for igual a ACCESS
			elseif(strtolower($this->db) == 'access') {
			  $this->data = @odbc_fetch_array($this->idtQuery);
	      $this->numLin -= 1;

	      $fimDados = is_array($this->data);
	      if(!$fimDados) {
	        @odbc_free_result($this->idtQuery);
	        $this->idtQuery = 0;
	      }
			}

		  // se nenhum dos banco validos retorna falso
			else
			  return false;

      return $fimDados;
    }
    /* fim do m�todo anteRegistro */

    /*
      m�todo ...............: executa
      descri��o ............: executa uma inser��o ou atualiza��o no banco de dados
      par�metros ...........: $tabela .....: nome da tabela no banco de dados
                              $campo ......: array contendo os nomes dos campos e valores
                              $chave ......: array contendo as condi��es (caso for atualiz�o)
      uso ..................: $this->executa('usuarios', $campos, $chave);
    */
    function executa($tabela, $campo, $chave = null) {
      // verifica se a conex�o com o banco ainda n�o foi feita, caso true, chama a fun��o conecta
      if(0 == $this->idtLink)
        $this->conecta();

      if($chave[0][1] == null) {
        $cmd1 = 'INSERT INTO ' . $tabela . ' (';
        $cmd2 = ' VALUES (';

        $i = 0;
        for($aux = 0; $aux < count($campo); $aux++) {
          if($campo[$i][0] != '' || $campo[$i][0] != null) {
            $cmd1 .= $campo[$i][0];
            if(stristr($campo[$i][1],"'")) {
              if(stristr($campo[$i][0],"senha") || stristr($campo[$i][0],"password"))
                $cmd2 .= 'PASSWORD("' . $campo[$i][1] . '")';
              else
                $cmd2 .= '"' . $campo[$i][1] . '"';
            }
						else {
              if(stristr($campo[$i][0],"senha") || stristr($campo[$i][0],"password"))
                $cmd2 .= "PASSWORD('" . $campo[$i][1] . "')";
              else
                $cmd2 .= "'" . $campo[$i][1] . "'";
            }

//            if($i + 1 < count($campo) || ($campo[$i + 1][0] != '' || $campo[$i + 1][0] != null)) {
            if($i + 1 < count($campo) || (!empty($campo[$i + 1][0]))){
              $cmd1 .= ',';
              $cmd2 .= ',';
            }
						else {
              $cmd1 .= ')';
              $cmd2 .= ')';
              break;
            }
            $i++;
          } // FIM IF(CAMPO[$i][0] != null || CAMPO ...)
          else {
            $i++;
            $aux--;
          }
        } // FIM FOR
        $cmdQuery = $cmd1 . $cmd2;
      }
			elseif($chave[0][1] != null) {
        $cmd1 = 'UPDATE ' . $tabela;
        $cmd2 = ' SET ';

        $i = 0;
        for($aux = 0; $aux < count($campo); $aux++) {
          if($campo[$i][0] != '' || $campo[$i][0] != null) {
            $cmd2 .= $campo[$i][0];
            if(stristr($campo[$i][0],"senha") || stristr($campo[$i][0],"password")){
	            $cmd2 .= " = PASSWORD('" . $campo[$i][1] . "')";
						}else{
              if(stristr($campo[$i][1],"null"))
	              $cmd2 .= " = NULL";
	            else
						  $cmd2 .= " = '" . $campo[$i][1] . "'";
						}

//            if($i + 1 < count($campo) || ($campo[$i + 1][0] != '' || $campo[$i + 1][0] != null))
            if($i + 1 < count($campo) || (!empty($campo[$i + 1][0])))
              $cmd2 .= ', ';
              
            $i++;
					}
					else {
            $i++;
            $aux--;
          }
        }

        $cmd3 = '';
        if(count($chave) >= 1) {
          $cmd3 = ' WHERE ';

          for($i = 0; $i < count($chave); $i++) {
            $cmd3 .= $chave[$i][0];
            $cmd3 .= " = '" . $chave[$i][1] . "'";

            if($i + 1 < count($chave))
              $cmd3 .= ' AND ';
            else
              break;
          }
        } // fim se chave >= 1
        $cmdQuery = $cmd1 . $cmd2 . $cmd3;
      }

      // se database for igual a MYSQL
			if(strtolower($this->db) == 'mysql') {
	      if(!@mysql_query($cmdQuery, $this->idtLink))
	      	$this->erroPadrao('Erro SQL. ' . mysql_error());
	      else
	        return 1;
			}
			// se database for igual a ACCESS
			elseif(strtolower($this->db) == 'access') {
        if(!@odbc_exec($this->idtLink, $cmdQuery))
	      	$this->erroPadrao('Erro SQL. ' . odbc_error());
	      else
	        return 1;
			}
			
			// se nenhum dos banco validos retorna falso
			else
			  return false;
			
		}
    /* fim do m�todo executa */

    /*
      m�todo ...............: execSql
      descri��o ............: executa um comando SQL no banco de dados
      par�metros ...........: $tabela .....: nome da tabela no banco de dados
                              $sql ........: comando SQL a ser executado
      uso ..................: $this->exclui('usuarios', $sql);
    */
    function execSql($tabela, $sql) {
      // verifica se a conex�o com o banco ainda n�o foi feita, caso true, chama a fun��o conecta
      if(0 == $this->idtLink)
        $this->conecta();

      // se database for igual a MYSQL
			if(strtolower($this->db) == 'mysql') {
	      if(!@mysql_query($sql, $this->idtLink))
	        $this->erroPadrao('Erro SQL.<br>' . mysql_error());
	      else
	        return 1;
			}
			
			// se database for igual a ACCESS
			elseif(strtolower($this->db) == 'access') {
			  if(!@odbc_exec($this->idtLink, $sql))
	        $this->erroPadrao('Erro SQL.<br>' . odbc_error());
	      else
	        return 1;
			}
			
			// se nenhum dos banco validos retorna falso
			else
			  return false;
    }
    /* fim do m�todo exclui */
    
    
    /*
      m�todo ...............: verificaTabela
      descri��o ............: verifica se uma tabela existe no banco de dados
      par�metros ...........: $tabela .....: nome da tabela no banco de dados a ser verificada
      uso ..................: $this->verificaTabela('usuarios');
    */
    function verificaTabela($tabela) {
      if(!(mysql_query("SELECT * FROM " . $tabela . ""))) {
        return false;
      } else {
        return true;
      }
    }
    /* fim do m�todo exclui */
    

    /*
      m�todo ...............: exclui
      descri��o ............: executa uma exclus�o no banco de dados
      par�metros ...........: $tabela .....: nome da tabela no banco de dados
                              $chave ......: array contendo as condi��es
      uso ..................: $this->exclui('usuarios', $chave);
    */
    function exclui($tabela, $chave = null, $comparacao = 'AND') {
      if(0 == $this->idtLink)
        $this->conecta();

      $cmd1 = 'DELETE FROM ' . $tabela;
      $cmd2 = '';
      if(count($chave) >= 1) {
        $cmd2 = ' WHERE ';

    	  for($i = 0; $i < count($chave); $i++) {
	        $cmd2 .= $chave[$i][0];
	        $cmd2 .= " = '" . $chave[$i][1] . "'";

	        if($i + 1 < count($chave))
	          $cmd2 .= ' ' . $comparacao . ' ';
	        else
	          break;
	      }
	    }

      $cmdQuery = $cmd1 . $cmd2;

      // se database for igual a MYSQL
			if(strtolower($this->db) == 'mysql') {
      	if(!@mysql_query($cmdQuery, $this->idtLink))
          $this->erroPadrao('Erro SQL.<br>' . mysql_error());
        else
          return 1;
			}
			
			// se database for igual a ACCESS
			elseif(strtolower($this->db) == 'access') {
			  if(!@odbc_exec($this->idtLink, $cmdQuery))
          $this->erroPadrao('Erro SQL.<br>' . odbc_error());
        else
          return 1;
			}
			
			// se nenhum dos banco validos retorna falso
			else
			  return false;
    }
    /* fim do m�todo exclui */

    /*
      m�todo ...............: lastId
      descri��o ............: Seleciona o pr�ximo id que deve ser colocado em uma tabela (maior id + 1)
      par�metros ...........: $tabela .....: nome da tabela no banco de dados
                              $campo ......: nome do campo do id (exs.: id, id_usu, id_tab, etc)
                              $chave ......: array contendo as condi��es
      uso ..................: $this->lastId('usuarios','id_usu');
    */
    function lastId($tabela, $campo, $chave = null) {
      if(0 == $this->idtLink)
        $this->conecta();

      $cmd1 = 'SELECT MAX(' . $campo . ') + 1 as maxseq FROM ' . $tabela;
      $cmd2 = '';

      if($chave[0][1] != null) {
        $cmd2 = ' WHERE ';

        for($i = 0; $i < count($chave); $i++) {
          $cmd2 .= $chave[$i][0];
          $cmd2 .= " = '" . $chave[$i][1] . "'";

          if($i + 1 < count($chave))
            $cmd2 .= ' AND ';
          else
            break;
        }
      }
      $cmdQuery = $cmd1 . $cmd2;

      // se database for igual a MYSQL
			if(strtolower($this->db) == 'mysql') {
	      if(!($result = mysql_query($cmdQuery, $this->idtLink)))
	      	$this->erroPadrao('Erro SQL.<br>' . mysql_error());
	      else {
	        if(@mysql_result($result, 0, 'maxseq') == null)
	          return '1';
	        else
	          return @mysql_result($result, 0, 'maxseq');
	      }
			}
			
			// se database for igual a ACCESS
			elseif(strtolower($this->db) == 'access') {
        if(!($result = odbc_exec($this->idtLink, $cmdQuery)))
	      	$this->erroPadrao('Erro SQL.<br>' . odbc_error());
	      else {
	        if(@odbc_result($result, 'maxseq') == null)
	          return '1';
	        else
	          return @odbc_result($result, 'maxseq');
	      }
			}

			// se nenhum dos banco validos retorna falso
			else
			  return false;
    }
    /* fim do m�todo last_id */

    function paginacao($dados_select, $pagina_atual, $parametro, $estilo = '', $estilo_atual = '',$opcao='') {
      if(!is_int($this->maxPaginacao))
        round($this->maxPaginacao);

      if($this->maxPaginacao % 2 == 0)
        $this->maxPaginacao += 1;

      if($this->maxRegistro == null || $this->maxRegistro <= 0)
        $this->maxRegistro = 10;

			if ($opcao=='')
					 $opcao='selecionar';


			$this->consulta($dados_select);
      $total_paginas = $this->nrows / $this->maxRegistro + 1;
      $temp = round($total_paginas);

      $total_paginas = (($temp > $total_paginas)? $temp - 1 : $temp);

      $paginacao = '';

      $comeco = (($pagina_atual > $this->maxPaginacao - 2)? $pagina_atual - (($this->maxPaginacao - 1) / 2) : 1 );
      $final  = (($pagina_atual > $this->maxPaginacao - 2)? $pagina_atual + (($this->maxPaginacao - 1) / 2) : $this->maxPaginacao );

      $falta	= $total_paginas - $pagina_atual;

      if($falta < $this->maxPaginacao - 2) {
        $comeco += $total_paginas - $final;
        $final  += $total_paginas - $final;
      }
      elseif($falta <= ($this->maxPaginacao - 1) / 2) {
      	$comeco -= (($this->maxPaginacao - 1) / 2) - $falta;
      }

      if($final > $total_paginas)
      	$final = $total_paginas;

      if($comeco < 1)
        $comeco = 1;

      if($total_paginas > $this->maxPaginacao) {
      	$atras = $pagina_atual - 1;
        $esquerda = (($this->maxPaginacao - 1) / 2);
        if($atras > $esquerda && $atras >= $this->maxPaginacao - 2) {
          $voltar     = $comeco - 1;
          $paginacao .= ' <a style="'.$estilo.'" href="'.$_SERVER['PHP_SELF'].'?opcao='.$opcao.'&pagina=1&'.$parametro.'">1</a>';
          $paginacao .= ' <a style="'.$estilo.'" href="'.$_SERVER['PHP_SELF'].'?opcao='.$opcao.'&pagina='. $voltar .'&'.$parametro.'">...</a>';
        }
      }

      for($i = $comeco; $i <= $final; $i++) {
        if($i == $pagina_atual)
          $paginacao .= ' <font style="'.$estilo_atual.'">'.$i.'</font>';
        else
          $paginacao .= ' <a style="'.$estilo.'" href="'.$_SERVER['PHP_SELF'].'?opcao='.$opcao.'&pagina='.$i.'&'.$parametro.'">'.$i.'</a>';
      }

      if($total_paginas > $this->maxPaginacao) {
        $frente = $total_paginas - $pagina_atual;
        $direita = (($this->maxPaginacao - 1) / 2);
        if($frente > $direita && $falta >= $this->maxPaginacao - 2) {
          $ir     = $final + 1;
          $paginacao .= ' <a style="'.$estilo.'" href="'.$_SERVER['PHP_SELF'].'?opcao='.$opcao.'&pagina='. $ir .'&'.$parametro.'">...</a>';
          $paginacao .= ' <a style="'.$estilo.'" href="'.$_SERVER['PHP_SELF'].'?opcao='.$opcao.'&pagina='.$total_paginas.'&'.$parametro.'">'.$total_paginas.'</a>';
        }
      }

      return $paginacao;
    }
    
    function paginas($pagina_destino,$sql_paginacao,$max_por_pagina,$pagina,$mgr,$ui,$tsrc){
      $this->consulta($sql_paginacao);
      $total_registros = $this->nrows;
      $total_paginas = ceil($total_registros/$max_por_pagina);

      if($pagina_destino == 'TOTAL GERAL'){
        return $total_registros;
      }else{
        // N�mero m�ximos de bot�es de pagina��o
        $max_links = 3;

        $paginacao = "<div id=\"paginacao\">";

        // Exibe o primeiro link "primeira p�gina", que n�o entra na contagem acima(3)
        if($pagina > 1){
          $paginacao .= "<a href=\"".$pagina_destino."?mrg=".$mgr."&ui=".$ui."&tsrc=".$tsrc."&p=1\" class=\"pagina_extrema\">1</a>";
        }
        // Cria um for() para exibir os 3 links antes da p�gina atual
        for($i = $pagina-$max_links; $i <= $pagina-1; $i++){
          // Se o n�mero da p�gina for menor ou igual a zero, n�o faz nada
          // (afinal, n�o existe p�gina 0, -1, -2..)
          if($i <=0){
          //faz nada
          // Se estiver tudo OK, cria o link para outra p�gina
          }else{
            if(($i == 1 && $pagina == 1) || $i > 1){
              $paginacao .= "<a href=\"".$pagina_destino."?mrg=".$mgr."&ui=".$ui."&tsrc=".$tsrc."&p=".$i."\" class=\"link_paginas\">".$i."</a>";
            }
          }
        }
        // Exibe a p�gina atual, sem link, apenas o n�mero
        $paginacao .= "<a class=\"pagina_atual\">" . $pagina . "</a>";
        // Cria outro for(), desta vez para exibir 3 links ap�s a p�gina atual
        for($i = $pagina+1; $i <= $pagina+$max_links; $i++) {
          // Verifica se a p�gina atual � maior do que a �ltima p�gina. Se for, n�o faz nada.
          if($i > $total_paginas){
            //faz nada
            // Se tiver tudo Ok gera os links.
          }else{
            if(($i == $total_paginas && $pagina == $total_paginas) || $i < $total_paginas){
              $paginacao .= "<a href=\"".$pagina_destino."?mrg=".$mgr."&ui=".$ui."&tsrc=".$tsrc."&p=".$i."\" class=\"link_paginas\">".$i."</a>";
            }
          }
        }
        // Exibe o link "�ltima p�gina"
        if($pagina < $total_paginas){
          $paginacao .= "<a href=\"".$pagina_destino."?mrg=".$mgr."&ui=".$ui."&tsrc=".$tsrc."&p=".$total_paginas."\" class=\"pagina_extrema\">" . $total_paginas . "</a>";
        }
        $paginacao .= "</div>";

        return $paginacao;
      
      }
    }
    
  }

  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */

  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  class html {
    var $xx;

    function html() {

    }

    /*
      m�todo ...............: erroPadrao
      descri��o ............: mostra uma msg de erro e para a execu��o do script
      par�metros ...........:  message .....: mensagem de erro a ser exibida
      uso ..................: $this->erroPadrao('mensagem do erro');
    */
    function erroPadrao($message) {
      echo '<p><b>Erro no sistema!</b><br>Descri��o do erro:</p>';
      echo '<p><font color=red><b>' . $message . '</b></font></p>';
      echo '<p>Entre em contato com o <b>Administrador.</b></p>';
      die();
    }
    /* fim do m�todo erroPadrao */

    /*
      m�todo ...............: geraCombo
      descri��o ............: gera combo HTML (<select><option></option>...</select>)
      par�metros ...........: $nome ......: nome do select (<select name="">)
                              $valor .....: array com os valores da combo
                              $default ...: valor a ser selecionado
      uso ..................: $this->geraCombo('nomes',$valor, $valor[0][1]);
    */
    function geraCombo($nome, $valor, $default = '', $estilo, $cores = null) {
    	$tag = '<select name="' . $nome . '" style="'.$estilo.'">';
      $aux = 0;
      for($i = 0; $i < count($valor); $i++) {
        if($valor[$i][0] == $default)
          $tag .= '<option value="' . $valor[$i][1] . '" style="color:'.$cores[$aux].';" selected>' . $valor[$i][0] . '</option>';
        else
          $tag .= '<option value="' . $valor[$i][1] . '" style="color:'.$cores[$aux].';">' . $valor[$i][0] . '</option>';

        if($cores[$aux + 1] == '' || $cores[$aux] == null)
          $aux--;

        $aux++;
      }

      $tag .= '</select>';
      return $tag;
    }
    /* fim do m�todo geraCombo */

    /*
      m�todo ...............: comboEstado()
      descri��o ............: gera combo HTML com nome dos estados brasileiros
      par�metros ...........: $nome ......: nome do select (<select name="">)
      uso ..................: $this->comboEstado('estado');
    */
    function comboEstado($nome, $padrao = 'Selecione:::::', $estilo = '', $cores = null) {
      $tag = '<select name="' . $nome . '" style="'.$estilo.'" onKeyUp="ai(this, event)" onFocus="this.select();">';

      $estado = array(
                     		array('Selecione',''),
                        array('AC','AC'),
                        array('AL','AL'),
                        array('AP','AP'),
                        array('AM','AM'),
                        array('BA','BA'),
                        array('CE','CE'),
                        array('DF','DF'),
                        array('ES','ES'),
                        array('GO','GO'),
                        array('MA','MA'),
                        array('MT','MT'),
                        array('MS','MS'),
                        array('MG','MG'),
                        array('PA','PA'),
                        array('PB','PB'),
                        array('PR','PR'),
                        array('PE','PE'),
                        array('PI','PI'),
                        array('RJ','RJ'),
                        array('RN','RN'),
                        array('RS','RS'),
                        array('RO','RO'),
                        array('RR','RR'),
                        array('SC','SC'),
                        array('SP','SP'),
                        array('SE','SE'),
                        array('TO','TO')
                     );
      $aux = 0;
      for($i = 0; $i < count($estado); $i++) {
        if($estado[$i][1] == $padrao)
          $tag .= '<option value="' . $estado[$i][1] . '" style="color:'.$cores[$aux].';" selected>' . $estado[$i][0] . '</option>';
        else
          $tag .= '<option value="' . $estado[$i][1] . '" style="color:'.$cores[$aux].';">' . $estado[$i][0] . '</option>';

				if($cores[$aux + 1] == '' || $cores[$aux] == null)
          $aux--;

        $aux++;
      }

      $tag .= '</select>';
      return $tag;
    }
    /* fim do m�todo comboEstado */

    /*
      m�todo ...............: js
      descri��o ............: da um alert do javascript e redireciona para alguma p�gina
      par�metros ...........: $alert ......: mensagem a ser exibida no alert
                              $pagina .....: pagina a ser carregada depois do alert (redirecionamento)
      uso ..................: $this->js('Login Inv�lido!','login.php');
    */
    function js($alert, $pagina, $focus = false) {
      switch($pagina) {
				case 'volta':
					echo '
               <script language="JavaScript">
	                  alert("' . $alert . '");
	                  window.history.go(-1);
	             </script>
		      ';
					break;
				case 'fecha':
				  if($focus) {
          	echo '
		             <script language="JavaScript">
		        	     alert("' . $alert . '");
		               window.opener.focus();
		               window.close();
		             </script>
			      ';
					}
					else {
						echo '
		             <script language="JavaScript">
		               alert("' . $alert . '");
		               window.close();
		             </script>
			      ';
					}
					break;
				default:
					echo '
	             <script language="JavaScript">
	               alert("' . $alert . '");
	               window.location = "' . $pagina . '";
	             </script>
		      ';
					break;
			}
      die();
    }
    /* fim do m�todo js */

    /*
      m�todo ...............: redireciona
      descri��o ............: redireciona a p�gina
      par�metros ...........: $pagina .....: pagina a ser redirecionada
      uso ..................: $this->redireciona('login.php');
    */
    function redireciona($pagina, $metodo = '') {
      $metodo = strtolower($metodo);
			echo '<script language="JavaScript">';
      switch($metodo) {
        case 'parent':
          echo 'parent.window.location = "' . $pagina . '"';
          break;
        case 'self':
          echo 'self.window.location = "' . $pagina . '"';
          break;
        case 'blank':
          echo 'blank.window.location = "' . $pagina . '"';
          break;
        default:
          echo 'window.location = "' . $pagina . '"';
          break;
      }
      echo '</script>';
      die();
    }
    /* fim do m�todo redireciona */
    
    /*
      M�todo ...............: navegador
      Descri��o ............: Verifica qual navegador est� sendo utilizado pelo usu�rio
      Par�metros ...........: Nenhum
      Uso ..................: $this->html->navegador();
    */
    function navegador(){
      $u_agent = $_SERVER['HTTP_USER_AGENT'];
      $bname = 'Unknown';
      $platform = 'Unknown';
      $version= "";

      //First get the platform?
      if (preg_match('/linux/i', $u_agent)){
          $platform = 'linux';
      }
      elseif (preg_match('/macintosh|mac os x/i', $u_agent)){
          $platform = 'mac';
      }
      elseif (preg_match('/windows|win32/i', $u_agent)){
          $platform = 'windows';
      }

      // Next get the name of the useragent yes seperately and for good reason
      if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
        $bname = 'Internet Explorer';
        $ub = "MSIE";
      }elseif(preg_match('/Firefox/i',$u_agent)){
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
      }elseif(preg_match('/Chrome/i',$u_agent)){
        $bname = 'Google Chrome';
        $ub = "Chrome";
      }elseif(preg_match('/Safari/i',$u_agent)){
        $bname = 'Apple Safari';
        $ub = "Safari";
      }elseif(preg_match('/Opera/i',$u_agent)){
        $bname = 'Opera';
        $ub = "Opera";
      }elseif(preg_match('/Netscape/i',$u_agent)){
        $bname = 'Netscape';
        $ub = "Netscape";
      }

      // finally get the correct version number
      $known = array('Version', $ub, 'other');
      $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
      if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
        // EST� DANDO PROBLEMA AQUI CORRIGIR DEPOIS
      }

      // see how many we have
      $i = count($matches['browser']);
      if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
      }else{
        $version= $matches['version'][0];
      }

      // check if we have a number
      if ($version == null || $version == ""){
        $version="?";
      }

      return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
      );
    }
    /* FIM A FUN��O QUE VERIFICA O NAVEGADOR */
    
    /*
      M�todo ...............: navegador
      Descri��o ............: Verifica se uma determinada URL existe ou n�o
      Par�metros ...........: $url
      Uso ..................: $this->html->verificaUrl($url);
    */
    function verificaUrl($url){
        if(!filter_var($url, FILTER_VALIDATE_URL))
            return false;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $r = curl_exec($ch);
        curl_close($ch);
        return $r ? true : false;
    }
    /* FIM DA FUN��O QUE VERIFICA SE UMA DETERMINADA URL EXISTE*/
    
    
    /*
      M�todo ...............: remote_file_exists
      Descri��o ............: Verifica se um arquivo remoto existe ou n�o
      Par�metros ...........: $url
      Uso ..................: $this->html->remote_file_exists($url);
    */
    function remote_file_exists($url){
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_NOBODY, true);
      curl_exec($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      if( $httpCode == 200 ){return true;}
    }
    
    
  }
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */

  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  class php {
  	var $xx;

/*    function php() {

    }
*/

    /*
      m�todo ...............: erroPadrao
      descri��o ............: mostra uma msg de erro e para a execu��o do script
      par�metros ...........:  message .....: mensagem de erro a ser exibida
      uso ..................: $this->erroPadrao('mensagem do erro');
    */
    function erroPadrao($message) {
      echo '<p><b>Erro no sistema!</b><br>Descri��o do erro:</p>';
      echo '<p><font color=red><b>' . $message . '</b></font></p>';
      echo '<p>Entre em contato com o <b>Administrador.</b></p>';
      die();
    }
    /* fim do m�todo erroPadrao */

    /*
      m�todo ...............: inverteData
      descri��o ............: inverte datas do formato yyyy/mm/dd para dd/mm/yyyy e vice-versa
      par�metros ...........: $data .....: data a ser invertida
      uso ..................: $this->inverteData('25/10/1986');
    */
    function inverteData($data) {
      if($data == '00/00/0000' || $data == '00-00-0000' || $data == '0000-00-00' || $data == '0000/00/00')
        return '';

      if(stristr($data, '/'))
        $separador = '/';
      elseif(stristr($data, '-'))
        $separador = '-';
      else
        return '';

      $parte = explode($separador, $data);

      if(strlen($parte[0]) == 2 && strlen($parte[1]) == 2 && strlen($parte[2]) == 4)
        $data_invertida = $parte[2] . '/' . $parte[1] . '/' . $parte[0];

      elseif(strlen($parte[0]) == 4 && strlen($parte[1]) == 2 && strlen($parte[2]) == 2)
        $data_invertida = $parte[2] . '/' . $parte[1] . '/' . $parte[0];

      else
        $this->erroPadrao('Formato de data inv�lido.');

      return $data_invertida;
    }
    /* fim do m�todo inverteData */
    
    /*
      m�todo ...............: diaSemana
      descri��o ............: retorna o dia da semana de acordo com o n�mero informado: 0 - DOMINGO ... 6 - S�BADO
      par�metros ...........: $numero_dia .....: dia da semana em numeral
      uso ..................: $this->diaSemana(1) -> SEGUNDA;
    */
    function diaSemana($numero_dia) {
      if($numero_dia == 0){
        $dia_semana = 'DOMINGO';
      }else if($numero_dia == 1){
        $dia_semana = 'SEGUNDA-FEIRA';
      }else if($numero_dia == 2){
        $dia_semana = 'TER�A-FEIRA';
      }else if($numero_dia == 3){
        $dia_semana = 'QUARTA-FEIRA';
      }else if($numero_dia == 4){
        $dia_semana = 'QUINTA-FEIRA';
      }else if($numero_dia == 5){
        $dia_semana = 'SEXTA-FEIRA';
      }else if($numero_dia == 6){
        $dia_semana = 'S�BADO';
      }

      return $dia_semana;
    }
    /* fim do m�todo diaSemana */
    
    /*
      m�todo ...............: idade
      descri��o ............: inverte datas do formato yyyy/mm/dd para dd/mm/yyyy e vice-versa
      par�metros ...........: $data .....: data a ser invertida
      uso ..................: $this->inverteData('25/10/1986');
    */
    function idade($data, $curr = 'now') {

      list($dia, $mes, $ano) = explode('/', $data);
      $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
      $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
      $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

      return $idade;

    }
    /* fim do m�todo idade */

    
    /*
      m�todo ...............: m�sPorExtenso
      descri��o ............: inverte datas do formato yyyy/mm/dd para dd/mm/yyyy e vice-versa
      par�metros ...........: $data .....: data a ser invertida
      uso ..................: $this->inverteData('25/10/1986');
    */
    function mesPorExtenso($valor) {
      if($valor == 1){
        $mes = 'Janeiro';
      }else if($valor == 2){
        $mes = 'Fevereiro';
      }else if($valor == 3){
        $mes = 'Mar�o';
      }else if($valor == 4){
        $mes = 'Abril';
      }else if($valor == 5){
        $mes = 'Maio';
      }else if($valor == 6){
        $mes = 'Junho';
      }else if($valor == 7){
        $mes = 'Julho';
      }else if($valor == 8){
        $mes = 'Agosto';
      }else if($valor == 9){
        $mes = 'Setembro';
      }else if($valor == 10){
        $mes = 'Outubro';
      }else if($valor == 11){
        $mes = 'Novembro';
      }else if($valor == 12){
        $mes = 'Dezembro';
      }else{
        $mes = '';
      }
      return $mes;
    }
    /* fim do m�todo inverteData */
    
    /*
      m�todo ...............: diferencaDatas
      descri��o ............: retorna a diferen�a entre 2 datas
      par�metros ...........: $data .....: data a ser invertida
      uso ..................: $this->inverteData('25/10/1986');
    */
    function diferencaDatas($start, $end = "NOW", $return = 'days') {

      //Transforma a data inicial em time
      $sdate = strtotime($start);

      //Transforma a data final em time
      $edate = strtotime($end);

      //Faz o c�lculo para achar a diferen�a em dias
      $pday = ($edate - $sdate) / 86400;

      //Faz o c�lculo para achar a diferen�a em menses
      $pmonth = $pday / 30;

      if ($return == 'days')
          $r = explode('.', $pday);

      elseif ($return == 'months')
          $r = explode('.', $pmonth);

      return $r[0];
    }
    /* fim do m�todo inverteData */
    
    
    /*
      m�todo ...............: valorPorExtenso
      descri��o ............: retorna uma string com valores por extenso
      par�metros ...........: $valor ......: formato que a fun��o number_format entenda
      uso ..................: $this->valorPorExtenso(25,50);
    */

    function valorPorExtenso($valor=0) {

      //   $valor = str_replace(".","",$valor);
      //   $valor = str_replace(",",".",$valor);

      $singular = array("centavo", "real", "mil", "milh�o", "bilh�o", "trilh�o", "quatrilh�o");
      $plural = array("centavos", "reais", "mil", "milh�es", "bilh�es", "trilh�es", "quatrilh�es");

      $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
      $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
      $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove");
      $u = array("", "um", "dois", "tr�s", "quatro", "cinco", "seis", "sete", "oito", "nove");

      $z=0;

      $valor = number_format($valor, 2, ".", ".");

      $inteiro = explode(".", $valor);
      for($i=0;$i<count($inteiro);$i++)
        for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
          $inteiro[$i] = "0".$inteiro[$i];

      // $fim identifica onde que deve se dar jun��o de centenas por "e" ou por "," ;)
      $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
      for ($i=0;$i<count($inteiro);$i++) {
        $valor = $inteiro[$i];
        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

        $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;
        $t = count($inteiro)-1-$i;
        $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
        if ($valor == "000")$z++; elseif ($z > 0) $z--;
        if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
        if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
      }
	
//      $rt = str_replace('um mil','mil',$rt);

      return($rt ? $rt : "zero");
    }
    /* fim do m�todo valorPorExtenso */
    
    
    /*
      m�todo ...............: parcelaPrice
      descri��o ............: retorna o valor de parcela de um financiamento utilizando o m�todo PRICE
      par�metros ...........: $valor .........: Valor total a ser emprestado
                              $parcelas ......: Quantidade de parcelas para pagamento
                              $juros .........: Taxa de juros ao m�s. Ex: 1 (Para 1%)
      uso ..................: $this->parcelaPrice(1000,5,1.5);
    */

    function parcelaPrice($valor,$parcelas,$juros){
      $juros = bcdiv($juros,100,15);
      $e = 1.0;
      $cont = 1.0;

      for($k=1;$k<=$parcelas;$k++){
        $cont = bcmul($cont,bcadd($juros,1,15),15);
        $e = bcadd($e, $cont, 15);
      }

      $e = bcsub($e, $cont, 15);
      $valor = bcmul($valor, $cont, 15);

      return bcdiv($valor, $e, 15);
    }
    /* fim do m�todo parcelaPrice */
    

    /*
      m�todo ...............: strZero
      descri��o ............: coloca zeros a esquerda de um n�mero
      par�metros ...........: $num ......: n�mero que receber� os zeros
                              $tamanho ..: tamanho que o n�mero deve ficar (ser� completado com zero(s))
      uso ..................: $this->strzero(12,5);
    */
    
    function strZero($num, $tamanho) {
      $zeros = null;
      
      if($tamanho < strlen($num))
        return $num;

      if($tamanho == strlen($num))
        return $num;

      for($i = $tamanho; $i > strlen($num); $i--)
        $zeros = '0' . $zeros;

      return $zeros . $num;
    }
    /* fim do m�todo strZero */

    /*
      m�todo ...............: eliminaZeros
      descri��o ............: elimina todos os zeros de um n�mero (zeros a esquerda)
      par�metros ...........: $num ......: n�mero que ter� os zeros excluidos
      uso ..................: $this->eliminaZero(00000000012);
    */
    function eliminaZero($num) {
      if(!is_string($num))
        $efraim->erroPadrao("Dados incompativeis!");

      $num_return = '';
      if($num[0] != '0')
        $num_return = $num;
      else {
        for($i = 0; $i < strlen($num); $i++) {
          if($num[$i] != '0')
            break;
        }

        for($x = 0; $i < strlen($num); $i++)
          $num_return[$x] .= $num[$i];
      }

        $num_return = implode('', $num_return);
        return($num_return);
    }
    /* fim do m�todo strZero */
    

    /*
      m�todo ...............: M�scara
      descri��o ............: retorna o valor passado baseado em uma m�scara tamb�m enviada
      par�metros ...........: $val ......: valor a ser mascarado
                              $mask ......: m�scara a ser adotada
      uso ..................: $this->mascara($cnpj,'##.###.###/####-##');
    */
    
    function mascara($val, $mask){
      $maskared = '';
      $k = 0;
      for($i = 0; $i<=strlen($mask)-1; $i++){
        if($mask[$i] == '#'){
          if(isset($val[$k]))
            $maskared .= $val[$k++];
        }else{
          if(isset($mask[$i]))
            $maskared .= $mask[$i];
        }
      }
      return $maskared;
    }


    /*
      m�todo ...............: Dia Portugu�s
      descri��o ............: retorna o nome do dia em portugu�s
      par�metros ...........: $dia ......: nome do dia em ingl�s
      uso ..................: $this->dia_portugues('Monday');
      autor.................: Fausto Andrade
    */

 function dia_portugues($dia) {

  $dia=strtoupper($dia);
  switch ($dia) {
   case 'MONDAY':
      return('Segunda');
      break;
   case 'TUESDAY':
      return('Ter�a');
      break;
   case 'WEDNESDAY':
      return('Quarta');
      break;
   case 'THURSDAY':
      return('Quinta');
      break;
   case 'FRIDAY':
      return('Sexta');
      break;
   case 'SATURDAY':
      return('S�bado');
      break;
   case 'SUNDAY':
      return('Domingo');
      break;
  }
 }
    /* fim do m�todo dia_portugues */


    /*
      m�todo ...............: Format
      descri��o ............: formata um n�mero decimal para gravar no banco.
      par�metros ...........: $str ......: vari�vel que ser� formatada.
      uso ..................: $this->format($str);
      autor.................: Fausto Andrade
    */

 function format($str) {

    $str=str_replace(".","",$str);
    $str=str_replace(",",".",$str);
    return($str);

  }
/* fim do m�todo format */

    /*
      m�todo ...............: n_formata
      descri��o ............: formata um n�mero com casas decimais e de milhar.
      par�metros ...........: $str ......: vari�vel que ser� formatada.
      uso ..................: $this->n_formata($str);
      autor.................: Fausto Andrade
    */

 function n_formata($str) {
    return(number_format($str,2,",","."));
  }

/* fim do m�todo n_formata */


    /*
      m�todo ...............: strSpace
      descri��o ............: coloca espa�os a direita de uma string
      par�metros ...........: $string ......: string que receber� os espa�os
                              $caracters ..: tamanho que a string deve ficar (ser� completada com espaco(s))
      uso ..................: $this->strSpace('Rodrigo',12);
    */
    function strSpace($string,$caracteres, $tipo = 'txt') {
      if(strlen($string) > $caracteres)
        die('o n�mero de caracteres do texto � maior do que o permitido');

      $num_espacos = $caracteres - strlen($string);
      $novo_texto = $string;
      
      if($num_espacos == 0)
        return $novo_texto;

      for($i = 0; $i < $num_espacos; $i++) {
        if(strtolower($tipo) == 'txt')
					$novo_texto .= " ";
					
        if(strtolower($tipo) == 'html')
					$novo_texto .= "&nbsp;";
      }
      return $novo_texto;
    }
    /* fim do m�todo strSpace */

    /*
      m�todo ...............: geraSenha
      descri��o ............: gera uma senha aleat�ria com X caracteres
      par�metros ...........: $tamanho ....: quantidade de caracteres que a senha deve conter
      uso ..................: $this->geraSenha('12');
    */
    function geraSenha($tamanho) {
      if($tamanho <= 0)
        $this->erroPadrao('O tamanho da senha � inv�lido.');

      $senha = '';
      $abc = 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwXxWyYzZ0123456789';
      srand((double)microtime()*1000000);

      for($i = 0; $i < $tamanho; $i++)
        $senha .= $abc[rand()%strlen($abc)];

      return $senha;
    }
    /* fim do m�todo geraSenha */
    
    /*
      m�todo ...............: enviaEmail
      descri��o ............: envia email n�.... d�
      par�metros ...........: $reme ....: quantidade de caracteres que a senha deve conter
      uso ..................: $this->geraSenha('12');
    */
    function enviaEmail($destino, $assunto, $mensagem, $remetente) {
      $headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

			/* headers adicionais */
			$headers .= "To: " 	. $destino 		. "\r\n";
			$headers .= "From:" . $remetente 	. "\r\n";

      if(!@mail($destino, $assunto, $mensagem, $headers))
        return 0;
			else
			  return 1;
    }
    /* fim do m�todo geraSenha */
    
    /*
      m�todo ...............: disparaEmail
      descri��o ............: dispara um e-mail
      par�metros ...........: $remetente (nome#email), $destinatarios (nome#email;nome2#email), $assunto, $mensagem
      uso ..................: $this->geraSenha('12');
    */
    function disparaEmail($remetente, $senha_cript, $servidor_smtp, $porta_smtp, $destinatarios, $assunto, $mensagem, $assinatura) {

      if($destinatarios){

        $arrDadosRemetente = preg_split("/#/",$remetente);
        $arrDestinatarios = preg_split("/;/",$destinatarios);

        // DADOS DO REMETENTE(SITE) QUE IR� REALIZAR O ENVIO DA MENSAGEM
        $nome_remetente  = $arrDadosRemetente[0];
        $email_remetente = $arrDadosRemetente[1];
        $senha_remetente = base64_decode($senha_cript);

  //    $mime_boundary = $empresa.md5(time());

        $headers = "MIME-Version: 1.1\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  //    $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
        $headers .= "From: ".$nome_remetente."<".$email_remetente.">\n";
        $headers .= "Return-Path: ".$nome_remetente."<".$email_remetente.">\n";
        $headers .= "Reply-To: ".$nome_remetente."<".$email_remetente.">\n";
  //    $headers .= "Bcc: contato@g3comunicacao.com.br\n";
        // FIM DOS DADOS DA MENSAGEM QUE SER� ENVIADA


        // IN�CIO DO HTML - MENSAGEM
        $mensagem_email .= "<html>\n";
        $mensagem_email .= "<head>\n";
        $mensagem_email .= "<META content=\"text/html; charset=ISO-8859-1\" http-equiv=Content-Type>\n";
        $mensagem_email .= "</head>\n";
        $mensagem_email .= "<body leftmargin=\"0\" topmargin=\"0\">\n";
        $mensagem_email .= "<table width=\"100%\" cellpadding=\"10\" cellspacing=\"0\" border=\"0\" style=\"font-family: verdana; font-size: 12px; line-height: 18px;\">\n";
        $mensagem_email .= "<tr>\n";
        $mensagem_email .= "<td>\n";
        $mensagem_email .= $mensagem;
        $mensagem_email .= "<br /><br />\n\n";
        $mensagem_email .= "Atenciosamente,<br /><br />\n\n";
        $mensagem_email .= $assinatura;
        $mensagem_email .= "<b>Aten��o:</b> Esta � uma mensagem autom�tica. N�o responda � mesma.<br />\n";
        $mensagem_email .= "</td>\n";
        $mensagem_email .= "</tr>\n";
        $mensagem_email .= "</table>\n";
        $mensagem_email .= "</body>\n";
        $mensagem_email .= "</html>\n";
        // TERMINO DO HTML


        // ENVIA A MENSAGEM VIA PHP MAILER
        require_once('php_mailer/class.phpmailer.php');

        $mailer = new PHPMailer();
        $mailer->Mailer = "smtp";
        $mailer->IsSMTP();
        $mailer->SMTPDebug = 1;
        $mailer->Port = $porta_smtp;                                                        // 465 OU 587 - INDICA A PORTA DE CONEX�O PARA A SA�DA DE EMAILS
        $mailer->Host = $servidor_smtp;
        $mailer->SMTPAuth = true;                                                           // DEFINE SE HAVER� OU N�O AUTENTICA��O NO SMTP
        $mailer->Username = $email_remetente;                                               // ENDERECO DE EMAIL COMPLETO DO REMETENTE
        $mailer->Password = $senha_remetente;                                               // SENHA DO EMAIL REMETENTE
        $mailer->FromName = $nome_remetente;                                                // NOME DO REMETENTE A SER EXIBIDO
        $mailer->From = $email_remetente;                                                   // OBRIGAT�RIO SER ENDERECO DE EMAIL COMPLETO DO REMETENTE
        for($i=0;$i<sizeOf($arrDestinatarios);$i++){
          if(substr_count($arrDestinatarios[$i],'#') > 0){
            $arrDadosDestinatario[$i] = preg_split("/#/",$arrDestinatarios[$i]);
            $mailer->AddAddress($arrDadosDestinatario[$i][1],$arrDadosDestinatario[$i][0]);  // DESTINAT�RIOS
          }else{
            $mailer->AddAddress($arrDestinatarios[$i]);                                      // DESTINAT�RIOS
          }
        }
        $mailer->Subject = $assunto;                                                         // ASSUNTO
        $mailer->Body = $mensagem_email;                                                           // CORPO DA MENSAGEM
        $mailer->IsHTML(true);                                                               // DEFINE QUE O EMAIL SER� ENVIADI COMO HTML
        $mailer->CharSet = 'ISO-8859-1';                                                     // CHARSET DA MENSAGEM (opcional)

        // DISPARA A MENSAGEM
        if(!$mailer->Send()){
          echo "A mensagem n�o pode ser enviada.";
          echo "Mailer Error: " . $mailer->ErrorInfo;
          return 0;
        }else{
          echo "A mensagem enviada com sucesso.";
  			  return 1;
        }
        
      }else{
        echo "Destinat�rio desconhecido. Informe ao administrador do sistema";
        return 0;
      }

    }
    /* fim do m�todo disparaEmail */
    
    
    /*
      m�todo ...............: download
      descri��o ............: for�a o download de um arquivo TXT ou similar
      par�metros ...........: $endereco_arquivo ....: endere�o do arquivo a ser baixado
      uso ..................: $this->download('pasta/arquivo.txt');
    */
    function download($endereco_arquivo) {
      header("Content-Type: application/force-download");
      header("Content-Type: application/octet-stream;");
      header("Content-Length:".filesize($endereco_arquivo));
      header("Content-disposition: attachment; filename=".$endereco_arquivo);
      header("Pragma: no-cache");
      header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
      header("Expires: 0");
      readfile($endereco_arquivo);
      flush();
    }
    /* fim do m�todo geraSenha */
    

    /*
      m�todo ...............: removeAcentos
      descri��o ............: Remove os acentos de uma string
      par�metros ...........: $string ....: String acentuada
      uso ..................: $this->php->removeAcentos('String acentuada',true);
    */
    function removeAcentos($string) {
      $table = array(
          '�'=>'S', '�'=>'s', '�'=>'D', 'd'=>'d', '�'=>'Z', '�'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
          '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'C', '�'=>'E', '�'=>'E',
          '�'=>'E', '�'=>'E', '�'=>'I', '�'=>'I', '�'=>'I', '�'=>'I', '�'=>'N', '�'=>'O', '�'=>'O', '�'=>'O',
          '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'U', '�'=>'U', '�'=>'U', '�'=>'U', '�'=>'Y', '�'=>'B', '�'=>'Ss',
          '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'c', '�'=>'e', '�'=>'e',
          '�'=>'e', '�'=>'e', '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'o', '�'=>'n', '�'=>'o', '�'=>'o',
          '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'u', '�'=>'u', '�'=>'u', '�'=>'y', '�'=>'y', '�'=>'b',
          '�'=>'y', 'R'=>'R', 'r'=>'r',
      );

      return strtr($string, $table);
    }
    /* fim do m�todo removeAcentos */
  }
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */

  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
  class webclasse {
    /* SubClasses */
    var $banco;
    var $html;
    var $php;
    /* Fim SubClasses */

    /* m�todo construtor da classe */
    function webclasse() {
      $this->banco        = new banco;
      $this->html         = new html;
      $this->php          = new php;
    }
    /* fim do m�todo construtor da classe */
  }
  /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
?>
