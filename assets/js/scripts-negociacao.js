jQuery(document).ready(function($){

  // INICIO TOGGLE SEÇÕES
    $('.toggle-out#toggle-on').css('display','block');
    $('#processo').on( "click", function(e) {
    	e.preventDefault();
    	$(this).closest('div').find('#toggle-on').slideToggle("slow");

    	return;
    });
    $('#avalicao-financiamento').on( "click", function(e) {
    	e.preventDefault();
    	$(this).closest('div').find('#toggle-on').slideToggle("slow");

    	return;
    });
    $('#fluxo').on( "click", function(e) {
      e.preventDefault();
      $(this).closest('div').find('#toggle-on').slideToggle("slow");

      return;
    });
    $('#avalicao-financiamento').on( "click", function(e) {
      e.preventDefault();
      $(this).closest('div').find('#toggle-on').slideToggle("slow");

      return;
    });

    $('#unidade-interesse').on( "click", function(e) {
      e.preventDefault();
      $(this).closest('div').find('#toggle-on').slideToggle("slow");
      return;
    });
    $('#fluxo').on( "click", function(e) {
      e.preventDefault();
      $(this).closest('div').find('#toggle-on').toggle();

      return;
    });
    $('#pre-aprovacao').on( "click", function(e) {
      e.preventDefault();
      $(this).closest('div').find('#toggle-on').slideToggle("slow");
      return;
    });
    $('#toggle-fluxo').on( "click", function(e) {
      e.preventDefault();
      $(this).closest('div').find('#toggle-on').slideToggle("slow");
      return;
    });
    $('#orientacoes').on( "click", function(e) {
      e.preventDefault();
      $(this).closest('div').find('#toggle-on').toggle();
      return;
    });

    //Toggle PRODUTOS

    $('#toggle-produtos').click(function(){

      var status = $('.produtos').css('display');

      $(this).toggleClass('arrow');

      if(status != 'block')
        $(this).parent().children().next('div').slideToggle("slow");

    });

    $(document).on('keydown',function(e){
      if ((e.altKey) && (e.which === 78)) {
        $('#toggle-produtos').parent().children().next('div').slideToggle("slow")
      }
    });

    $(document).mouseup(function(e){

      var container = $('.produtos');
      var modal_produtos = $('#modal-produto');
      var status = container.css("display");
      var status_modal = modal_produtos.css("display");

      // alert(container.is(e.target) + ' - ' + container.has(e.target).length);

      if ((!container.is(e.target) && container.has(e.target).length === 0 && status == 'block') && (!modal_produtos.is(e.target) && modal_produtos.has(e.target).length === 0)){
          $('#toggle-produtos').parent().children().next('div').slideToggle("slow");
      }
    });



    // ADICIONA MESES A UM DATA ESPECÍFICA.
      function adicionaMes(data, qtdeMes){

        // DECLARAÇÃO DAS VARIÁVEIS UTILIZADAS.
        var novaData;
        var dia;
        var mes;
        var ano;
        var mesConfigurado;

        var arrayVencimento = new Array();
        var arrayData       = data.split('/');

        // PERCORRE TODAS AS PARCELAS PARA IDENTIFICAR ADICIONANDO MÊS A MÊS.
        for(i = 1; i <= qtdeMes; i++){

          // REINICIALIZA AS VARIÁVEIS PARA REUTILIZAÇÃO.
          novaData       = null;
          dia            = null;
          mes            = null;
          ano            = null;
          mesConfigurado = null;

          // DEFINE A NOVA DATA COMO UMA VARIÁVEL DO TIPO DATA.
          novaData = new Date(arrayData[2], arrayData[1] - 1, arrayData[0]);

          // ADICIONA A QUANTIDADE DE MÊS PARA A DATA INFORMADA
          novaData.setMonth(novaData.getMonth() + i);
          mesConfigurado = novaData.getMonth() + 1;

          // DEFINIÇÃO DO DIA, MÊS E ANO FORMATADO CORRETAMENTE.
          var dia = (novaData.getDate() < 10) ? '0' + novaData.getDate() : novaData.getDate();
          var mes = (mesConfigurado < 10) ? '0' + mesConfigurado  : mesConfigurado;
          var ano = novaData.getFullYear();

          // FORMATA A DATA (FORMATO PT/BR) PARA ADICIONAR AO ARRAY.
          var date = dia + '/' + mes + '/' + ano;

          // ADICIONA AO ARRAY A DATA SOMADA AOS MESES.
          arrayVencimento.push(date);
        }

        // RETORNA O ARRAY COM TODAS AS DATAS ESTABELECIDAS.
        return arrayVencimento;
      }

    //INICIO SELEÇÃO DE UNIDADE
    $('#unidade, #tipo-negociacao').change(function(){
      if($('#unidade').find(":selected").index() > 0 && $('#tipo-negociacao').find(":selected").index() > 0){

          $('.processo-section-3').show();
          $('.processo-section-4').show();
          $('#camp-promocional').removeAttr('disabled');
          $('#codigo-promocional').removeAttr('disabled');
          $('#produtos').removeAttr('disabled');
          $('html,body').animate({
            scrollTop:$('.processo-section-3-wrapper').offset().top - 95
          },500);
          var valor_unidade = parseFloat($("#unidade option:selected").val());
          var valor_fgts = parseFloat($("#valor-fgts").text().replace('.','').replace(',','.'));
          var valor_subsidio = parseFloat($("#valor-subsidio").text().replace('.','').replace(',','.'));
          var valor_financiamento = parseFloat($("#valor-financiamento").text().replace('.','').replace(',','.'));
          var valor_custas = parseFloat($("#valor-custas").text().replace('.','').replace(',','.'));
          var valor_prosoluto = valor_unidade - (valor_fgts + valor_subsidio + valor_financiamento) ;
          parseFloat($("#valor-distribuir span").text('R$ ' +eedisplayFloatNDTh(valor_prosoluto,2)));
        }else{
          $('.processo-section-3').slideUp('slow');
          $('.processo-section-4').hide();
          $('#camp-promocional').attr('disabled','disabled');
          $('#codigo-promocional').attr('disabled','disabled');
          $('#produtos').attr('disabled','disabled');
        }
    });
    //FIM SELEÇÃO DE UNIDADE

    var now = new Date();


    $('#dia-vencimento, #dia-vencimento-modal, #vencimento-produto').datepicker({
        format: "dd/mm/yyyy",
        startDate: now,
        language: "pt-BR",
        orientation: "bottom left",
        autoclose: true,
        todayHighlight: true
    });

    // INICIO BOTAO DISTRIBUIR FLUXO
    $('#btn-distribuir').on( 'click', function (e) {
      e.preventDefault();
      var entrou = true;
        $('.negociacao-fields-wrapper').find('select, input').each(function(){
          if($(this).prop('required')){
            if($(this).val() == '' || $(this).val() == '0'){
              const toast = swal.mixin({
                toast:true,
                position:'top-end',
                showConfirmButton:false,
                timer:2200
              });

              toast({
                type:'error',
                title: 'Campo Obrigatório não preenchido!',
              });
              entrou = false;
              $(this).focus();
              return false;
            }
          }
        });
        if (entrou) {

          // VARIAVEIS
          var controle = $('#table-fluxo tbody tr').length;
          var controle_resumo = $('#resumo-fluxo tr').length;
          var tipo_parcela = $( "#tipo-parcela option:selected" ).text();
          var qtde_parcelas = $("#qtde-parcelas").val();
          var valor_parcelas = parseFloat($('#valor-parcela').val().replace(',','.')).toFixed(2);
          var dia_vencimento = $("#dia-vencimento").val();
          var porcentagem_contatrato = $("#porcentagem-contatrato").val();
          var total = qtde_parcelas * valor_parcelas;
          var valor_contrato = parseFloat($("#valor-contrato").text().replace('.',''));
          var porcentagem_total = parseFloat(total * 100 / valor_contrato).toFixed(2);
          var total_aprovado = $('#totalidade-aprovada').val();

          var array_data = dia_vencimento.split('/');
          var d = new Date(array_data[2], array_data[1], array_data[0]); // January 1, 2000
          var data_final = d.setMonth(d.getMonth() + parseInt(qtde_parcelas))

          var string = total.toString();

          // CRIANDO A TR DA TABELA
          var btn_acoes = '<div class="dropdown show acoes"><a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-pencil" aria-hidden="true"></i></a>'+
          '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink"><a class="dropdown-item table-edit" data-toggle="modal" data-target="#editar-fluxo" href="#">Editar</a>';

          var btn_acoes2 = '<a class="dropdown-item table-remove" href="#">Remover</a>';

          botao_acoes = (controle > 1) ? btn_acoes + btn_acoes2 + '</div></div>' : btn_acoes+'</div></div>';
          // botao_acoes = btn_acoes + btn_acoes2 + '</div></div>';

          var tr_fluxo = '<tr class="negociacao'+controle+'" id="negociacao'+controle+'"><td class="tp-parcela" id="tp-parcela" style="font-weight:700;">'+ tipo_parcela +'</td> <td class="quantidade-parcela">'+ qtde_parcelas  +'</td> <td class="valor-parcela">'+ eedisplayFloatNDTh(valor_parcelas,2)  +'</td> <td class="data-vencimento">'+ dia_vencimento +'</td> <td>'+ eedisplayFloatNDTh(total,2) + '</td> <td >'+ porcentagem_total.toString()+' %' +'</td> <td>'+ botao_acoes +'</td></tr>';

          var tr_fluxo_resumo = '<tr class="resumo'+controle_resumo+'" id="resumo'+controle_resumo+'"><td style="font-weight:700;">'+ tipo_parcela +'</td> <td class="qnt-parcelas">'+ qtde_parcelas  +'</td> <td class="vl-parcelas">'+ eedisplayFloatNDTh(valor_parcelas,2)  +'</td> <td class="data-atual">'+ dia_vencimento +'</td>';

          // var tr_financiamento = '<tr class="resumo'+controle_resumo+'" id="resumo'+controle_resumo+'"><td style="font-weight:700;">'+ tipo_parcela +'</td> <td class="qnt-parcelas">'+ qtde_parcelas  +'</td> <td class="vl-parcelas">'+ eedisplayFloatNDTh(valor_parcelas,2)  +'</td> <td class="data-atual">'+ dia_vencimento +'</td>';

          // $('#table-fluxo').append(tr_fluxo);
          $('#table-fluxo tbody tr:last()').before(tr_fluxo);

          if($('#resumo-fluxo > tbody > tr').length == 0){

            var data_calculada = adicionaMes(dia_vencimento,parseInt(qtde_parcelas));

            tr_fluxo_resumo = tr_fluxo_resumo + '<td class="data-final">'+ data_calculada[qtde_parcelas-1] +'</td></tr>';

            $('#resumo-fluxo').append(tr_fluxo_resumo);
          }
          else{
              var array_texto_td = new Array();
              var array_class_tr = new Array();
              $('#resumo-fluxo > tbody > tr').each(function(){
                array_texto_td.push($(this).find('td:first').text());
                array_class_tr.push($(this).prop('id'));
              });

              var index = array_texto_td.indexOf(tipo_parcela);
              if(index > -1){

                var class_tr = "'#" + array_class_tr[index] + "'";

                //QUANTIDADE DE PARCELAS
                var quantidade_parcelas = parseInt(qtde_parcelas);
                var parcela_atual = parseInt($('#resumo-fluxo .'+array_class_tr[index]).children('td.qnt-parcelas').text());
                var parcela_final = parcela_atual + quantidade_parcelas;

                //VALOR DE PARCELAS
                var valor_parcela_atual = parseFloat($('#resumo-fluxo .'+array_class_tr[index]).children('td.vl-parcelas').text()).toFixed(2);
                valor_parcela_final = parseFloat(parseFloat(valor_parcela_atual) + parseFloat(valor_parcelas)).toFixed(2);

                //CALCULO DATA
                var data_fluxo_inicio = $('#resumo-fluxo .'+array_class_tr[index]).children('td.data-atual').text();

                var data_calculada = adicionaMes(data_fluxo_inicio,parseInt(parcela_final));

                $('#resumo-fluxo .'+array_class_tr[index]).children('td.qnt-parcelas').text(parcela_final);
                $('#resumo-fluxo .'+array_class_tr[index]).children('td.vl-parcelas').text(eedisplayFloatNDTh(valor_parcela_final,2));
                $('#resumo-fluxo .'+array_class_tr[index]).children('td.data-final').text(data_calculada[parcela_final-1]);
              }
              else{

                var data_calculada = adicionaMes(dia_vencimento,parseInt(qtde_parcelas));

                tr_fluxo_resumo = tr_fluxo_resumo + '<td class="data-final">'+ data_calculada[qtde_parcelas-1] +'</td></tr>';
                $('#resumo-fluxo').append(tr_fluxo_resumo);
              }
          }
          // LIMPA OS CAMPOS AO CLICAR DISTRIBUIR
          $('#valor-parcela').val('');
          $('#qtde-parcelas').val('1');
          $('#dia-vencimento').val('');

          const toast = swal.mixin({
            toast:true,
            position:'top-end',
            showConfirmButton:false,
            timer:2200
          });

          toast({
            type:'success',
            title: 'Fluxo adicionado com sucesso!',
          });

        }
        // FIM BOTAO DISTRIBUIR FLUXO

        // INICIO BOTAO REMOVER FLUXO
        $('.table-remove').off('click').on( 'click', function (e) {

          e.preventDefault();

          var excluir_tr = 'tr.' + $(this).parent().parent().parent().parent().prop('class');
          var get_td = $(excluir_tr).find('td:first').text();

          swal({
            title: 'Tem certeza?',
            text: "Você excluirá um fluxo",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Deletar!'
          }).then((result) => {
            if (result.value) {
              var array_texto_td = new Array();
              var array_class_tr = new Array();
              $('#resumo-fluxo > tbody > tr').each(function(){
                array_texto_td.push($(this).find('td:first').text());
                array_class_tr.push($(this).prop('id'));
              });
              var index = array_texto_td.indexOf(get_td);

              if(index > -1){

                var parcela_table = parseInt($(excluir_tr).children('td.quantidade-parcela').text());
                var parcela_resumo = parseInt($('#resumo-fluxo .'+ array_class_tr[index]).children('td.qnt-parcelas').text());

                var valor_table = parseFloat($(excluir_tr).children('td.valor-parcela').text()).toFixed(2);
                var valor_resumo = parseFloat($('#resumo-fluxo .'+ array_class_tr[index]).children('td.vl-parcelas').text()).toFixed(2);


                var parcela_resumo_final = parcela_resumo - parcela_table;
                $('#resumo-fluxo .'+array_class_tr[index]).children('td.qnt-parcelas').text(parcela_resumo_final);

                var valor_resumo_final = parseFloat(valor_resumo - valor_table).toFixed(2);
                $('#resumo-fluxo .'+array_class_tr[index]).children('td.vl-parcelas').text(valor_resumo_final);

                var data_inicio_fluxo = $('#resumo-fluxo .'+array_class_tr[index]).children('td.data-atual').text();

                var data_calculada = adicionaMes(data_inicio_fluxo,parseInt(parcela_resumo_final));
                $('#resumo-fluxo .'+array_class_tr[index]).children('td.data-final').text(data_calculada[parcela_resumo_final-1]);

              }
              $('#table-fluxo').find(excluir_tr).remove();


              var i = 1;

              //
              $('#table-fluxo tbody').find("tr[id^='negociacao']").each(function(){
                $(this).attr('class', 'negociacao'+i);
                $(this).attr('id', 'negociacao'+i);
                i++;
              });

              const toast = swal.mixin({
                toast:true,
                position:'top-end',
                showConfirmButton:false,
                timer:2200
              });

              toast({
                type:'error',
                title: 'Fluxo removido com sucesso!',
              });
            }
          })
        } );

        // FINAL BOTAO REMOVER FLUXO

        // INICIO BOTAO EDITAR FLUXO
          $('.table-edit').off('click').on( 'click', function (e) {

          e.preventDefault();

          // $('#editar-fluxo').modal('show');

          var editar_tr = 'tr.' + $(this).parent().parent().parent().parent().prop('class');
          var get_td = $(editar_tr).find('td:first').text();

          var parcela_anterior = parseInt($(editar_tr + ' td.quantidade-parcela').text());
          var valor_anterior = parseFloat($(editar_tr + ' td.valor-parcela').text());

          var array_texto_td = new Array();
          var array_class_tr = new Array();
          $('#resumo-fluxo > tbody > tr').each(function(){
            array_texto_td.push($(this).find('td:first').text());
            array_class_tr.push($(this).prop('id'));
          });

          var index = array_texto_td.indexOf(get_td);

          $('#valor-parcela-modal').val($(editar_tr + ' td.valor-parcela').text());
          $('#qtde-parcelas-modal').val($(editar_tr + ' td.quantidade-parcela').text());
          $('#dia-vencimento-modal').val($(editar_tr + ' td.data-vencimento').text());

          $('#titulo-modal').text(get_td);
          $(editar_tr).addClass('table-selecionada');
          // FIM BOTAO DISTRIBUIR FLUXO

          // INICIO BOTAO SALVAR FLUXO
          $('.btn-salvar-fluxo').on('click', function(){

            var parcela_final_editada = parseInt($('#qtde-parcelas-modal').val());
            var valor_final_editado = parseFloat($('#valor-parcela-modal').val());


            $(editar_tr + ' td.valor-parcela').text($('#valor-parcela-modal').val().replace(',','.'));
            $(editar_tr + ' td.quantidade-parcela').text($('#qtde-parcelas-modal').val());
            $(editar_tr + ' td.data-vencimento').text($('#dia-vencimento-modal').val());

            const toast = swal.mixin({
              toast:true,
              position:'top-end',
              showConfirmButton:false,
              timer:2200
            });

            toast({
              type:'success',
              title: 'Fluxo alterado com sucesso!'
            });

            $('#table-fluxo tbody tr.table-selecionada').removeClass('table-selecionada');

            $('#qtde-parcelas-modal').val('');
            $('#valor-parcela-modal').val('');
            $('#dia-vencimento-modal').val('');

            $('#editar-fluxo').modal('toggle');

            if (index > -1){

            var valor_resumo_fluxo = parseFloat($('#resumo-fluxo .'+array_class_tr[index]).children('td.vl-parcelas').text()).toFixed(2);
            valor_resumo_fluxo_final = parseFloat((valor_resumo_fluxo - valor_anterior) + valor_final_editado).toFixed(2);
            $('#resumo-fluxo .'+array_class_tr[index]).children('td.vl-parcelas').text(valor_resumo_fluxo_final);

            var parcela_resumo_fluxo = parseInt($('#resumo-fluxo .'+array_class_tr[index]).children('td.qnt-parcelas').text());
            parcela_resumo_fluxo_final = parseInt((parcela_resumo_fluxo - parcela_anterior) + parcela_final_editada);

            $('#resumo-fluxo .'+array_class_tr[index]).children('td.qnt-parcelas').text(parcela_resumo_fluxo_final);

            var data_inicio_fluxo = $('#resumo-fluxo .'+array_class_tr[index]).children('td.data-atual').text();

            var data_calculada = adicionaMes(dia_vencimento,parcela_resumo_fluxo_final);

            $('#resumo-fluxo .'+array_class_tr[index]).children('td.qnt-data-final').text(data_calculada[parcela_resumo_fluxo_final-1]);
          }
        // FIM BOTAO SALVAR FLUXO
      });
        // FIM BOTAO EDITAR FLUXO
      });

    } );
    // FIM BOTAO DISTRIBUIR FLUXO


    // INICIO LIMPAR CAMPOS AO FECHAR O MODAL DE EDIÇÃO
    $('.btn-fechar-fluxo, #editar-fluxo .close').click(function(){

      $('#qtde-parcelas-modal').val('');
      $('#valor-parcela-modal').val('');
      $('#dia-vencimento-modal').val('');

      $('#table-fluxo tbody tr.table-selecionada').removeClass('table-selecionada');

    })

    // FIM LIMPAR CAMPOS AO FECHAR O MODAL DE EDIÇÃO

    // FIM IMPRESSÃO DOS DADOS DO FLUXO DE PAGAMENTO
    $('.btn-imprimir-fluxo').on('click', function(){

      var divToPrint = document.getElementById('table_validar_fluxo');
      var htmlToPrint = '' +
          '<style type="text/css">' +
          'table{border-collapse: collapse;}'+
          'table thead{font-size:12px;font-family:Roboto}'+
          'table th{padding:5px 10px;font-size:12px;}'+
          'table td{padding:15px;font-size:12px;}'+
          'table th, table td {' +
          'border:1px solid #ddd;'+
          '}' +
          '</style>';
      htmlToPrint += divToPrint.outerHTML;
      newWin = window.open("");
      newWin.document.write("<h3 align='center'>Tabela de Pagamento do Pró-soluto</h3>");
      newWin.document.write(htmlToPrint);
      newWin.print();
      newWin.close();


    });
    // FIM IMPRESSÃO DOS DADOS DO FLUXO DE PAGAMENTO

    //INICIO MASCARAS
    $('#dia-vencimento').mask('00/00/0000');
    $('#dia-vencimento-modal').mask('00/00/0000');
    $('#av-cpf').mask('000.000.000-00');
    $('#av-rg').mask('AA-00.000.000');
    $('#av-cep').mask('00.000.000');
    $('#av-telefone1').mask('(00) 0000-0000');
    $('#av-celular').mask('(00) 00000-0000');
    $("#valor-parcela, #valor-parcela-modal, #parcelas-produto, #valor-produto").maskMoney({
         // prefix: "R$",
         decimal: ",",
         thousands:  ''
     });
    //FIM MASCARAS

    // INICIO MODAL DE AVALISTA
     $('#btn-ir-documentos').click(function(){

       if ($('#form-avalista')[0].checkValidity()) {

         $('#pills-tab a[href="#pills-documento"]').removeClass('disabled').tab('show');
         $('#btn-ir-documentos').attr("id","salvar-dados").text('Salvar Dados');
         $('#pills-tab a[href="#pills-documento"]').prop("disabled", false);

         return false;
       }
     });

    $('#pills-tab a[href="#pills-avalista"]').on('click', function(){
      $('#salvar-dados').attr("id","btn-ir-documentos").text('Próximo');
      $('#pills-tab a[href="#pills-documento"]').attr("class", 'nav-link disabled');
    });
    //FIM MODAL DE AVALISTA

    // INICIO VERIFICAR OS CAMPOS E LIMPAR, QUANDO CLICAR NO BOTAO FECHAR DO MODAL DO AVALISTA
    $('#fechar-avalista').on('click', function(){
        $('.form-dados-avalista').find('select, input').each(function(){
          alert('LIMPOU');
          $(this).val('');
          return false;
        });
    });
    // FIM VERIFICAR OS CAMPOS E LIMPAR, QUANDO CLICAR NO BOTAO FECHAR DO MODAL DO AVALISTA

    // INICIO VERIFICAR SE O CAMPO DE UNIAO(CASADO) ESTA SELECIONADO E RETIRAR OU INCLUIR O REQUIRED
    $('#estado-civil').change(function(){
      if ($(this).val() == 'Casado(a)') {
        $('#regime-comunhao').prop("disabled", false);
        $('#regime-comunhao').prop("required", true);
        $('#av-conjuge').prop("disabled", false);
        $('#av-cpf-conjuge').prop("disabled", false);
        $('#av-rg-conjuge').prop("disabled", false);
        $('#av-conjuge').prop("required", true);
        $('#av-cpf-conjuge').prop("required", true);
        $('#av-rg-conjuge').prop("required", true);
      }else if ($(this).val() == 'Divorciado(a)') {
        $('#regime-comunhao').prop("disabled", false);
      }else{
        $('#regime-comunhao').prop("disabled", true);
        $('#regime-comunhao').prop("required", false);
        $('#av-conjuge').prop("disabled", true);
        $('#av-cpf-conjuge').prop("disabled", true);
        $('#av-rg-conjuge').prop("disabled", true);
        $('#av-conjuge').prop("required", false);
        $('#av-cpf-conjuge').prop("required", false);
        $('#av-rg-conjuge').prop("required", false);
      }
    });
    // INICIO VERIFICAR SE O CAMPO DE UNIAO(CASADO) ESTA SELECIONADO E RETIRAR OU INCLUIR O REQUIRED

    // INICIO MANDANDO REQUISIÇÃO AJAX E FAZENDO UPLOAD DO ARQUIVO

      // var id_carregar = $(this).parent().parent().parent().parent().prop('id');


      var total_documentos = parseInt($('#total-documentos').val());

      for (var i = 1; i <= total_documentos; i++) {

        var s = 0;
        s++;

        $('.ajax-file-upload-container').next('div').find('status').each(function(){
          $(this).prop('id','status'+s)
        });

        var config_i = {

              url: "upload/upload.php",
              method: "POST",
              datatype: 'json',
              allowedTypes:"pdf,jpg,png",
              fileName: "myfile",
              formData: {"acao":"create","url":"cadastros/0006055/","nome_arquivo":"02286404151_check-list_via_sul","id":"6055","id_processo":"4890","documento":"23","cliente":"viasul","servidor_arquivos":"http://dommusdriver.com.br/","id_click":i},
              multiple: false,
              onSuccess:function(files,data,xhr)
              {

                console.log(xhr);
                // var arrResultado = data.split('=>');
                // var retorno      = arrResultado[0].trim();
                // var arquivo      = arrResultado[2].trim();
                // var url          = arrResultado[3].trim();
                // url = url.replace(/[\\"}]/g, '');  // "
                // if(retorno == "1"){
                  $("#status" +data).html("<img src='assets/img/upload-success-file.svg' border='0' />");
                //   $("#quadro_001 .ajax-file-upload-filename").html("1) <a href='"+url+"' target='_blank'>"+arquivo+"</a>");
                // }
              },
              onError: function(files,status,errMsg)
              {
                $("#status" +data).html("<img src='assets/img/upload-error-file.svg' border='0' />");
              },
              showDelete: false,
              deleteCallback: function (data, pd) {
                var arrData = data.split(':');
                var newData = arrData[1].replace(/[\\"}]/g, '');  // "
                for (var i = 0; i < 1; i++) {
                  $.post("delete.php", {op: "delete",name: newData}, function(resp,textStatus, jqXHR){
                    //Show Message
                    alert("Arquivo apagado.");
                  });
                }
                pd.statusbar.hide(); //You choice.
              }
          }

          $('#documento' +i).uploadFile(config_i);

        }
        // $('.upload-wrapper').find('form input').each(function(){
        //   $(this).prop('class','btn-carregar');
        // });
      // });



    // FIM MANDANDO REQUISIÇÃO AJAX E FAZENDO UPLOAD DO ARQUIVO
});



$("div[class^='upload-wrapper']").click(function(){
  //alert();
});
