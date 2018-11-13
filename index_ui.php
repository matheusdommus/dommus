<?php
  require_once 'header.php';
?>
<body>
  <div id="pg_atualizacao"><iframe src id="atualiza" name="atualiza" marginwidth="0" marginheight="0"></iframe></div>
  <div class="dommus-wrapper">
    <!-- SIDEBAR -->
<?php
    require_once 'sidebar.php';
?>
    <!-- FIM SIDEBAR -->
    <!-- INICIO WRAPPER -->
    <div class="dommus-content">
<?php
    require_once('inc/conteudo.php');
?>
    </div>
    <!-- FIM WRAPPER -->
  </div>
<?php
  require_once 'footer.php';
?>
