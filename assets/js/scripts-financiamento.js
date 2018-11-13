jQuery(document).ready(function($){


    // ABRIR MENU MOBILE
    $('#toggle').on( "click", function(e) {
    	e.preventDefault();
    	$('.aside').toggleClass('fixed');
    	return;
    });
    $('#menu-lateral #close-menu').on( "click", function(e) {
      e.preventDefault();
      $('.aside').toggleClass('fixed');
      return;
    });
    // FIM TOGGLE SE√á√ïES

    /*CLOSE NOTIFICA√á√ïES*/
    $('.notification-nav').on('click', function () {
      $('.notifications').toggleClass('open')
    })
    $('#close-menu').on('click', function () {
      $('.notifications').toggleClass('open')
    })
    // INICIO MENU LATERAL

  if ($(window).width() > 991) {
    $('#toggle-side-menu').click(function(){
      var bar_size = $('.dommus-wrapper .aside ul li a').outerWidth();
      $('.aside').toggleClass("hide-menu");

      if ($('.aside').hasClass("hide-menu")) {
        $('.aside').find('h4, p').slideToggle(100);
        $('.dommus-wrapper .dommus-content').css('width', 'calc(100% - 60px)');
      }else {
        $('.aside').find('h4, p').slideToggle(200);
        $('.dommus-wrapper .dommus-content').css('width', 'calc(100% - 255px)');
      }

    });
  }

    // FIM MENU LATERAL

    // INICIO MENU CONTRATO FIXO
    $(window).scroll(function () {
      if ($(this).scrollTop() > 125) {
          $('.float-content').addClass("fixed");
          $('.dommus-navigation').addClass("fixed");
      } else {
          $('.float-content').removeClass("fixed");
          $('.dommus-navigation').removeClass("fixed");
      }
  });
      var lastScrollTop = 0;
  	   $(window).scroll(function(event){
  		 var st = $(this).scrollTop();
  		 if ($(this).scrollTop() >= 125) {
  				 if (st > lastScrollTop){
  							// downscroll code
  							$('.dommus-navigation').css("top", "-94px");
  							$('.float-content').css("top", "0");
  					} else {
  						 // upscroll code
  						 $('.dommus-navigation').css("top", "0");
  						 $('.float-content').css("top", "-200px");
  					}
  		 } else {

  		 }
  		 lastScrollTop = st;
  	});
    // FIM MENU CONTRATO FIXO

    function adicionarTooltip(){
      return $(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    }

    // INICIO TOGGLE
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    // FIM TOGGLE

    // Toggle Radio button
    $('.formulario-reprovacao').hide();
    /*FORM CONTATO*/
    $('.aprovacoes-wrapper input[type=radio][name=escolhe_form]').change(function(e) {
      e.preventDefault();
        if (this.value == '1') {
             $('.formulario-aprovacao').show("slow");
             $('.formulario-reprovacao').hide("slow");

             $('.formulario-aprovacao').find('input').each(function(){
               $(this).prop('required',true);
             });
             $('.formulario-reprovacao textarea').prop('required',false);
        }
        else if (this.value == '2') {
            $('.formulario-reprovacao').show("slow");
            $('.formulario-aprovacao').hide("slow");

            $('.formulario-aprovacao').find('input').each(function(){
              $(this).prop('required',false);
            });
            $('.formulario-reprovacao textarea').prop('required',true);
        }
    });
    // BOTAO ADICIONAR avaliacao


    // Dia atual

    var fullDate = new Date()
    console.log(fullDate);

    var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) :(fullDate.getMonth()+1);

    var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();


    $('#data-financiamento').text(currentDate);

    var data_financiamento = $('#data-financiamento').text();


    $('.btn-salvar').click(function(){

      var controle;
      var table_id = $('.avaliacao-wrapper').closest('div').prop('id');

      if (table_id){
        var arrayId = table_id.split('-');
        controle = parseInt(arrayId[1]) + 1;
      }
      else{
        controle = 1;
      }

      adicionarTooltip();

      var instituicao = $( "#banco-id option:selected" ).val();
      var valor_fgts = eedisplayFloatNDTh($('#fgts-id').val().replace(',','.'),2);
      var valor_subsidio = eedisplayFloatNDTh($('#subsidio-id').val().replace(',','.'),2);
      var valor_financiamento = eedisplayFloatNDTh($('#financiamento-id').val().replace(',','.'),2);
      var valor_aprovado = eedisplayFloatNDTh(parseFloat(valor_fgts) + parseFloat(valor_subsidio) + parseFloat(valor_financiamento),2);
      var valor_renda_bruta = eedisplayFloatNDTh($('#renda-bruta-id').val().replace(',','.'),2);
      var valor_parcela = eedisplayFloatNDTh($('#parcela-id').val().replace(',','.'),2);
      var valor_prazo = $('#prazo-id').val();
      var valor_parcela_prazo = eedisplayFloatNDTh(parseFloat(valor_parcela) * parseFloat(valor_prazo),2);
      var valor_avaliacao = $('#valor-avaliacao-id').val();
      var valor_renda = parseFloat($('#renda-id').val());
      var valor_custas_registro = eedisplayFloatNDTh($('#custas-regirsto-id').val().replace(',','.'),2);
      var valor_tabela = $(".radios-wrapper input[name='valor-tabela']:checked").val();
      var valor_desconto = $(".descontos-wrapper input[name='radio-desconto']:checked").val();

      // utilizar logica p/ editar.
      /*$('#valor-fgts').text('R$ ' + eedisplayFloatNDTh(valor_fgts,2));
      $('#valor-subsidio').text('R$ ' + eedisplayFloatNDTh(valor_subsidio,2));
      $('#valor-financiamento').text('R$ ' + eedisplayFloatNDTh(valor_financiamento,2));
      $('#valor-total-aprovado').text('R$ ' + eedisplayFloatNDTh(valor_aprovado,2));

      $('#valor-parcela').text('R$ ' + eedisplayFloatNDTh(valor_parcela,2));
      $('#prazo-financiamento').text(valor_prazo + ' meses');
      $('#valor-parcela-prazo').text('R$ ' + eedisplayFloatNDTh(valor_parcela_prazo,2));

      $('#valor-renda-bruta').text('R$ ' + eedisplayFloatNDTh(valor_renda_bruta,2));
      $('#valor-renda-validada').text('R$ ' + eedisplayFloatNDTh(valor_renda,2));
      $('#valor-custas-registro').text('R$ ' + eedisplayFloatNDTh(valor_custas_registro,2));

      $('#tabela-financiamento').text(valor_tabela);
      $('#financiamento-desconto').text(valor_desconto);*/

      var nova_avaliacao = '<div class="avaliacao-title">'+
                              '<h4>AVALIA«√O DE FINANCIAMENTO</h4>'+
                              '<div class="status-avaliacao">'+
                                 '<ul>'+
                                    '<li><a href="#" class="aprov-doc" data-toggle="tooltip" data-placement="left" title="Tela AprovaÁ„o" data-original-title="Tela AprovaÁ„o"><img src="assets/img/file.svg" alt="Tela AprovaÁ„o"></a></li>'+
                                    '<li><a href="#" class="form-caixa" data-toggle="tooltip" data-placement="left" title="FormulÔøΩrio Caixa(DAMP)" data-original-title="FormulÔøΩrio Caixa(DAMP)"><img src="assets/img/file.svg" alt="Formul√°rio Caixa"></a></li>'+
                                 '</ul>'+
                                 '<h5>APROVADA</h5>'+
                              '</div>'+
                            '</div>'+
                            '<div class="avaliacao-wrapper" id="avaliacao-'+controle+'"><div class="row"><div class="col-md-6 item"><label>InstituiÁ„o Financeira</label><p id="instituicao">'+ instituicao +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Data:</label><p id="data-financiamento">'+ currentDate +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Validade:</label><p id="validade-financiamento"></p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Valor Avaliado:</label><p id="valor-avaliado"></p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>FGTS:</label><p id="valor-fgts">'+ valor_fgts +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Subsidio:</label><p id="valor-subsidio">'+ valor_subsidio +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Financiamento:</label><p id="valor-financiamento">'+ valor_financiamento +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Total Aprovado:</label><p id="valor-total-aprovado">'+ valor_aprovado +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Renda Bruta:</label><p id="valor-renda-bruta">'+ valor_renda_bruta +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Renda Validada:</label><p id="valor-renda-validada"></p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Parcela:</label><p id="valor-parcela">'+ valor_parcela +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Prazo:</label><p id="prazo-financiamento">'+ valor_prazo + ' meses</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Parcela x Prazo:</label><p id="valor-parcela-prazo">'+ valor_parcela_prazo +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Custas Registro:</label><p id="valor-custas-registro">'+ valor_custas_registro +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Tabela:</label><p id="tabela-financiamento">'+ valor_tabela +'</p></div>'+
                            '<div class="col-sm-12 col-lg-2 item"><label>Desconto de 0,5%?:</label><p id="financiamento-desconto">'+ valor_desconto +'</p></div>'+
                            '<div class="financiamento-acoes col-md-12"><button class="btn btn-sm btn-primary btn-edit" type="button" name="button">Editar</button><button class="btn btn-sm btn-danger btn-excluir" type="button" name="button">Excluir</button></div>'+
                            '</div>';

      $('.avaliacao-container').prepend(nova_avaliacao);

      $('.btn-excluir').off('click').click(function(){
        swal({
          title: 'Tem certeza?',
          text: "VocÍ excluir· esta avaliaÁ„o",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sim, Deletar!'
        }).then((result) => {
          if (result.value) {
            const toast = swal.mixin({
              toast:true,
              position:'top-end',
              showConfirmButton:false,
              timer:2200

            });
            $(this).parent().parent().parent().remove();
            toast({
              type:'error',
              title: 'AvaliaÔøΩÔøΩo removida com sucesso!',
            });
          }
        });

      });

      $('.formulario-aprovacao').find('input, select').each(function(){
        $(this).val('');
      });
    });

    $('.btn-fechar').click(function(){
      $('.formulario-aprovacao').find('input, select').each(function(){
        $(this).val('');
      }) ;
    });
    $('#nova-avaliacao .close').click(function(){
      $('.formulario-aprovacao').find('input, select').each(function(){
        $(this).val('');
      });
    });

    // ADICIONA MESES A UM DATA ESPEC√çFICA.
      function adicionaMes(data, qtdeMes){

        // DECLARA√á√ÉO DAS VARI√ÅVEIS UTILIZADAS.
        var novaData;
        var dia;
        var mes;
        var ano;
        var mesConfigurado;

        var arrayVencimento = new Array();
        var arrayData       = data.split('/');

        // PERCORRE TODAS AS PARCELAS PARA IDENTIFICAR ADICIONANDO M√äS A M√äS.
        for(i = 1; i <= qtdeMes; i++){

          // REINICIALIZA AS VARI√ÅVEIS PARA REUTILIZA√á√ÉO.
          novaData       = null;
          dia            = null;
          mes            = null;
          ano            = null;
          mesConfigurado = null;

          // DEFINE A NOVA DATA COMO UMA VARI√ÅVEL DO TIPO DATA.
          novaData = new Date(arrayData[2], arrayData[1] - 1, arrayData[0]);

          // ADICIONA A QUANTIDADE DE M√äS PARA A DATA INFORMADA
          novaData.setMonth(novaData.getMonth() + i);
          mesConfigurado = novaData.getMonth() + 1;

          // DEFINI√á√ÉO DO DIA, M√äS E ANO FORMATADO CORRETAMENTE.
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
    //FIM SELE√á√ÉO DE UNIDADE

    var now = new Date();

    $('#dia-vencimento, #dia-vencimento-modal').datepicker({
        format: "dd/mm/yyyy",
        startDate: now,
        language: "pt-BR",
        orientation: "bottom left",
        autoclose: true,
        todayHighlight: true
    });

    //INICIO MASCARAS
    $('#dia-vencimento').mask('00/00/0000');
    $('#dia-vencimento-modal').mask('00/00/0000');
    $('#av-cpf').mask('000.000.000-00');
    $('#av-rg').mask('AA-00.000.000');
    $('#av-cep').mask('00.000.000');
    $('#av-telefone1').mask('(00) 0000-0000');
    $('#av-celular').mask('(00) 00000-0000');
    $("#fgts-id, #subsidio-id, #financiamento-id, #renda-bruta-id, #parcela-id, #valor-avaliacao-id, #renda-id, #custas-regirsto-id").maskMoney({
         // prefix: "R$",
         decimal: ",",
         thousands:  ''
     });
    //FIM MASCARAS

    // INICIO MANDANDO REQUISI√á√ÉO AJAX E FAZENDO UPLOAD DO ARQUIVO

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

// DOCUMENTO REPROVADO

      var config_1 = {

            url: "upload/upload.php",
            method: "POST",
            datatype: 'json',
            allowedTypes:"pdf,jpg,png",
            fileName: "myfile",
            formData: {"acao":"create","url":"cadastros/0006055/","nome_arquivo":"02286404151_check-list_via_sul","id":"6055","id_processo":"4890","documento":"23","cliente":"viasul","servidor_arquivos":"http://dommusdriver.com.br/","id_click":i},
            multiple: false,
            onSuccess:function(files,data,xhr)
            {

              // var arrResultado = data.split('=>');
              // var retorno      = arrResultado[0].trim();
              // var arquivo      = arrResultado[2].trim();
              // var url          = arrResultado[3].trim();
              // url = url.replace(/[\\"}]/g, '');  // "
              // if(retorno == "1"){
                $("#status-reprovado-1").html("<img src='assets/img/upload-success-file.svg' border='0' />");
              //   $("#quadro_001 .ajax-file-upload-filename").html("1) <a href='"+url+"' target='_blank'>"+arquivo+"</a>");
              // }
            },
            onError: function(files,status,errMsg)
            {
              $("#status-reprovado-1").html("<img src='assets/img/upload-error-file.svg' border='0' />");
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

        $('#documento-reprovado-1').uploadFile(config_1);

    // FIM MANDANDO REQUISI√á√ÉO AJAX E FAZENDO UPLOAD DO ARQUIVO
});
