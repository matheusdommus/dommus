
<script src="assets/libs/highcharts/code/highcharts.js"></script>
<script src="assets/libs/highcharts/code/highcharts-more.js"></script>
<script src="assets/libs/highcharts/code/modules/data.js"></script>
<script src="assets/libs/highcharts/code/modules/drilldown.js"></script>
<script src="assets/libs/highcharts/code/modules/funnel.js"></script>
<script src="assets/libs/highcharts/code/modules/solid-gauge.js"></script>
<script src="assets/libs/highcharts/code/modules/exporting.js"></script>
<script src="assets/libs/highcharts/code/modules/export-data.js"></script>

<div class="graphics-dashboard">
  <div class="row">
    <div class="col-sm-12 col-lg-6 graph">
      <div class="graph-title">
        Volume mensal de vendas
        <a class="toggle-empreendimento" href="#">
          <img src="assets/img/menu-options.svg" alt="">
        </a>
      </div>
      <div class="menu-empreendimento" id="empreendimento1">
        <div class="filtro-empreendimento">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="Vendas">Por Nº de vendas
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="VGV">Por VGV
            </label>
          </div>
          <div class="empreedimento-title">
            Empreendimentos
          </div>
        </div>
        <select class="selectpicker" multiple data-selected-text-format="count" data-live-search="true">
          <option class="todos-select">Todos</option>
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish 1</option>
          <option>Relish 2</option>
          <option>Relish 3</option>
        </select>
      </div>
      <div class="vendas-empreendimento">
        <div id="vendas-empreendimento" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
      </div>
      <div class="menu-empreendimento" id="empreendimento2">
        <div class="filtro-empreendimento">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="Vendas">Por Nº de vendas
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="VGV">Por VGV
            </label>
          </div>
          <div class="empreedimento-title">
            Empreendimentos
          </div>
        </div>
        <select class="selectpicker" multiple data-selected-text-format="count" data-live-search="true">
          <option class="todos-select">Todos</option>
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
          <option>Relish</option>
          <option>Relish</option>
        </select>
      </div>
    </div>
    <div class="col-sm-12 col-lg-6 graph">
      <div class="graph-title">
        Processos por Etapa
        <a class="toggle-empreendimento"href="#">
          <img src="assets/img/menu-options.svg" alt="">
        </a>
      </div>
      <div class="menu-empreendimento" id="empreendimento3">
        <div class="filtro-empreendimento">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="Vendas">Por Nº de vendas
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="VGV">Por VGV
            </label>
          </div>
          <div class="empreedimento-title">
            Empreendimentos
          </div>
        </div>
        <select class="selectpicker" multiple data-selected-text-format="count" data-live-search="true">
          <option class="todos-select">Todos</option>
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
          <option>Relish</option>
          <option>Relish</option>
        </select>
      </div>
      <div id="controle_etapas" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-sm-12 col-lg-4 graph">
      <div class="graph-title">
        Velocidade de Vendas
        <a class="toggle-empreendimento" href="#">
          <img src="assets/img/menu-options.svg" alt="">
        </a>
      </div>
      <div class="menu-empreendimento" id="empreendimento4">
        <div class="filtro-empreendimento">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="Vendas">Por Nº de vendas
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="VGV">Por VGV
            </label>
          </div>
          <div class="empreedimento-title">
            Empreendimentos
          </div>
        </div>
        <select class="selectpicker" multiple data-selected-text-format="count" data-live-search="true">
          <option class="todos-select">Todos</option>
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
          <option>Relish</option>
          <option>Relish</option>
        </select>
      </div>
      <div class="velocidade-vendas">
        <div id="container-speed" style="min-width: 310px; max-width: 350px; height: 261px; margin: 0 auto"></div>
      </div>
    </div>
    <div class="col-sm-12 col-lg-4 graph">
      <div class="graph-title">
        Top Corretores
        <a class="toggle-empreendimento" href="#">
          <img src="assets/img/menu-options.svg" alt="">
        </a>
      </div>
      <div class="menu-empreendimento" id="empreendimento5">
        <div class="filtro-empreendimento">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="Vendas">Por Nº de vendas
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="VGV">Por VGV
            </label>
          </div>
          <div class="empreedimento-title">
            Empreendimentos
          </div>
        </div>
        <select class="selectpicker" multiple data-selected-text-format="count" data-live-search="true">
          <option class="todos-select">Todos</option>
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
          <option>Relish</option>
          <option>Relish</option>
        </select>
      </div>
      <div class="top-corretores">
        <ul>
          <li>
            <div class="corretor-nome">
              Nome do corretor
            </div>
            <div class="vl-vendas">
              152
            </div>
          </li>
          <li>
            <div class="corretor-nome">
              Nome do corretor
            </div>
            <div class="vl-vendas">
              152
            </div>
          </li>
          <li>
            <div class="corretor-nome">
              Nome do corretor
            </div>
            <div class="vl-vendas">
              152
            </div>
          </li>
          <li>
            <div class="corretor-nome">
              Nome do corretor
            </div>
            <div class="vl-vendas">
              152
            </div>
          </li>
          <li>
            <div class="corretor-nome">
              Nome do corretor
            </div>
            <div class="vl-vendas">
              152
            </div>
          </li>
          <li>
            <div class="corretor-nome">
              <a href="#">
                [ Ver todos ]
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-sm-12 col-lg-4 graph">
      <div class="graph-title">
        Vendas por empreendimento
        <a class="toggle-empreendimento" href="#">
          <img src="assets/img/menu-options.svg" alt="">
        </a>
      </div>
      <div class="menu-empreendimento" id="empreendimento6">
        <div class="filtro-empreendimento">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="Vendas">Por Nº de vendas
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="VGV">Por VGV
            </label>
          </div>
          <div class="empreedimento-title">
            Empreendimentos
          </div>
        </div>
        <select class="selectpicker" multiple data-selected-text-format="count" data-live-search="true">
          <option class="todos-select">Todos</option>
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
          <option>Relish</option>
          <option>Relish</option>
        </select>
      </div>
      <div class="total-vendas">
        <ul>
          <li>
            <div class="empreendimento-nome">
              Lyon
            </div>
            <div class="qnt-vendas">
              152
            </div>
          </li>
          <li>
            <div class="empreendimento-nome">
              Rubi
            </div>
            <div class="qnt-vendas">
              152
            </div>
          </li>
          <li>
            <div class="empreendimento-nome">
              Nacional
            </div>
            <div class="qnt-vendas">
              152
            </div>
          </li>
          <li>
            <div class="empreendimento-nome">
              Empreendimento
            </div>
            <div class="qnt-vendas">
              152
            </div>
          </li>
          <li>
            <div class="empreendimento-nome">
              Empreendimento
            </div>
            <div class="qnt-vendas">
              152
            </div>
          </li>
          <li>
            <div class="empreendimento-nome">
              <a href="#">[ Ver todos ]</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-sm-12 col-lg-6 graph">
      <div class="graph-title">
        Distribuição de unidades
        <a class="toggle-empreendimento" href="#">
          <img src="assets/img/menu-options.svg" alt="">
        </a>
      </div>
      <div class="menu-empreendimento" id="empreendimento7">
        <div class="filtro-empreendimento">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="Vendas">Por Nº de vendas
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="VGV">Por VGV
            </label>
          </div>
          <div class="empreedimento-title">
            Empreendimentos
          </div>
        </div>
        <select class="selectpicker" multiple data-selected-text-format="count" data-live-search="true">
          <option class="todos-select">Todos</option>
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
          <option>Relish</option>
          <option>Relish</option>
        </select>
      </div>
      <div class="distribuicao-unidade">
        <div id="distribuicao-unidade"></div>
      </div>
    </div>
    <div class="col-sm-12 col-lg-6 graph">
      <div class="graph-title">
        Funil de Vendas
        <a class="toggle-empreendimento" href="#">
          <img src="assets/img/menu-options.svg" alt="">
        </a>
      </div>
      <div class="menu-empreendimento" id="empreendimento8">
        <div class="filtro-empreendimento">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="Vendas">Por Nº de vendas
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="VGV">Por VGV
            </label>
          </div>
          <div class="empreedimento-title">
            Empreendimentos
          </div>
        </div>
        <select class="selectpicker" multiple data-selected-text-format="count" data-live-search="true">
          <option class="todos-select">Todos</option>
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
          <option>Relish</option>
          <option>Relish</option>
        </select>
      </div>
      <div id="funil-vendas"></div>
    </div>
    <div class="col-sm-12 col-lg-12 graph">
      <div class="graph-title">
        Variação de crescimento mensal
        <a class="toggle-empreendimento" href="#">
          <img src="assets/img/menu-options.svg" alt="">
        </a>
      </div>
      <div class="menu-empreendimento" id="empreendimento9">
        <div class="filtro-empreendimento">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="Vendas">Por Nº de vendas
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="VGV">Por VGV
            </label>
          </div>
          <div class="empreedimento-title">
            Empreendimentos
          </div>
        </div>
        <select class="selectpicker" multiple data-selected-text-format="count" data-live-search="true">
          <option class="todos-select">Todos</option>
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
          <option>Relish</option>
          <option>Relish</option>
        </select>
      </div>
      <div id="vaiaricao-crescimento"></div>
    </div>
  </div>

</div>
