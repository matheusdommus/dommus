$(document).ready(function($){
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

  /*CLOSE NOTIFICAÇÕES*/
  $('.notification-nav a').on('click', function (event){
    event.stopPropagation();

    var status = $('.notifications').css('display');
    if(status != 'block')
      $(this).parent().next('div').children().slideToggle("slow");

      $('.btn-ver-mais').off('click').click(function(){
        $('.notifications-all').slideToggle("slow");
        // setTimeout(function(){
        //   alert($('.notifications-holder').outerHeight());
        // },500);
        var altura_item = $('.notifications ul a').height()*5;
        // alert(altura_item);
         $('.notifications-holder').css('max-height',altura_item);
         $('.notifications-holder').css('overflow', 'auto');
         $(this).removeClass('btn-ver-mais');
         $(this).addClass('btn-ver-todos');
         $(this).text('Ver Todos');

         $('.btn-ver-todos').off('click').click(function(){
           window.open('https://www.google.com.br', '_blank');
         });

      });
  });

  $('.user-acess a').click(function(){
    var status_user = $('.user-wrapper').css("display");

    if (status_user != 'block')
      $('.user-acess a').next('div').slideToggle("slow");
  })


  $('#close-menu').on('click', function () {
    $(this).parent().parent().slideToggle("slow");
    return false;
  });

$(document).mouseup(function(e){

  var container = $('.notifications');
  var status = container.css("display");

  var user_container = $('.user-wrapper');
  var status_user = user_container.css("display");

  if (!container.is(e.target) && container.has(e.target).length === 0 && status == 'block')
      $('.notification-nav a').parent().next('div').children().slideToggle("slow");


  if (!user_container.is(e.target) && user_container.has(e.target).length === 0 && status_user == 'block')
      $('.user-acess a').next('div').slideToggle("slow");
});

$(document).on('keydown',function(e){
  if ((e.altKey) && (e.which === 78)) {
    $('.notification-nav a').parent().next('div').children().slideToggle("slow");
  }
});



// Abrir notificacoes
$('.notifications ul li i').click(function(){
  $(this).parent().parent().toggleClass('read');
});
$('.read-all').click(function(){
  $('.notifications ul li').toggleClass('read');
  if($('.notifications ul li').hasClass('read')){
    $(this).text('Desmarcar todas');
  }else {
    $(this).text('Marcar todas como lida');
  }

});
  // INICIO MENU LATERAL

if ($(window).width() > 991) {
  $('#toggle-side-menu').click(function(){
    var bar_size = $('.dommus-wrapper .aside ul li a').outerWidth();
    $('.aside').toggleClass("hide-menu");
    $('.sidebar-footer').toggleClass('out');

    if ($('.aside').hasClass("hide-menu")) {
      $('.aside').find('h4, p').slideToggle(100);
      $('.dommus-wrapper .dommus-content').css('width', 'calc(100% - 60px)');
      $('.menu-lateral-wrapper').css('width', '60px');
    }else {
      $('.aside').find('h4, p').slideToggle(200);
      $('.dommus-wrapper .dommus-content').css('width', 'calc(100% - 255px)');
      $('.menu-lateral-wrapper').css('width', ' 255px');
    }
  });
}

// Abrir Suporte

$('.btn-ajuda').click(function(){
  $('.support-container').slideToggle('slow');
});

$('.close-support').click(function(){
  $('.support-container').slideToggle('slow');
})

  // FIM MENU LATERAL

  // // INICIO MENU CONTRATO FIXO
  // if ($(window).width() <= 425) {
  //   $(window).scroll(function () {
  //     if ($(this).scrollTop() > 125) {
  //         $('.float-content').addClass("fixed");
  //         $('.dommus-navigation').addClass("fixed");
  //     } else {
  //         $('.float-content').removeClass("fixed");
  //         $('.dommus-navigation').removeClass("fixed");
  //     }
  //   });
  //     var lastScrollTop = 0;
  //      $(window).scroll(function(event){
  //      var st = $(this).scrollTop();
  //      if ($(this).scrollTop() >= 125) {
  //          if (st > lastScrollTop){
  //               // downscroll code
  //               $('.dommus-navigation').css("top", "-94px");
  //               $('.float-content').css("top", "0");
  //           } else {
  //              // upscroll code
  //              $('.dommus-navigation').css("top", "0");
  //              $('.float-content').css("top", "-200px");
  //           }
  //      } else {
  //
  //      }
  //      lastScrollTop = st;
  //   });
  // }
  // FIM MENU CONTRATO FIXO

$(document).on('keydown',function(e){
  if ((e.altKey) && (e.which === 80)) {
    $('#open-search').parent().next('div').slideToggle("slow");
  }
});
// INICIO ABRIR PESQUISA/filtro
  $('#open-search').click(function(){
    $(this).parent().next('div').slideToggle("slow");
  });

  $('#close-search').click(function(){
    $(this).parent().parent().parent().parent().slideToggle("slow");
  });

  $('.btn-filtrar').click(function(){
    // $(this).parent().find('.row')
    $('.filter-holder').slideToggle("slow");
    $('.filter-result').slideToggle("slow");
    $(this).removeClass('btn-filtrar').addClass('btn-recuar');
    $('.search-title h3').text('RESULTADO');
    $(this).text('NOVO FILTRO');

    $('.btn-recuar').off('click').click(function(){
      $('.filter-holder').slideToggle("slow");
      $('.filter-result').slideToggle("slow");
      $(this).removeClass('btn-recuar').addClass('btn-filtrar');
      $('.search-title h3').text('FILTRO');
      $(this).text('PESQUISAR');
    });

  });

// FIM ABRIR PESQUISA/filtro
// Abrir Perfil



  // INICIO TOOLTIP
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  // FIM TOOLTIP

});
