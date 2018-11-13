        <!-- NAVEGAÇÃO PASSOS -->
        <ul class="navigation-steps">
<?php
        $this->con1->consulta("SELECT * FROM tb_sgg3_navegacao_processo WHERE visualizacao LIKE '%#" . $_SESSION['tipo_usuario'] . "#%' AND oculto='N' AND status=1 ORDER BY ordem");
        while($this->con1->proxRegistro()){
?>
          <li>
            <a class="btn<?php if(base64_decode($this->ui) == $this->con1->data['tela']){ echo ' active'; } ?>" href="?mgr=<?php echo $this->mgr; ?>&ui=<?php echo base64_encode($this->con1->data['tela']); ?>&id_processo=<?php echo $this->id_processo; ?>"><?php echo $this->con1->data['descricao']; ?></a>
          </li>
<?php
        }
?>
        </ul>
        <!-- FIM NAVEGAÇÃO PASSOS -->
