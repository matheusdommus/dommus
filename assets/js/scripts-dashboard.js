$(document).ready(function($){

  $('.selectpicker').selectpicker();

  // if($('.menu-empreendimento .selectpicker').find('.selected').val() != 'Todos'){
  //
  // }
  $('ul.dropdown-menu').children('li').children('a').click(function(){
    console.log($(this));
  });

  $('.toggle-empreendimento').click(function(e){
    e.preventDefault();
    $(this).parent().next('div').slideToggle("slow");
    console.log($(this).parent().next('div'));
  });

  $(".selectpicker").on("changed.bs.select", function(e, clickedIndex, newValue, oldValue){
    var selectedD = $(this).find('option').eq(clickedIndex).text();

    if (selectedD == 'Todos'){
      if($(this).parent().find('li:first').children('a').attr('aria-control') == 'false'){
        newValue = true;
        $(this).parent().find('li:first').children('a').attr('aria-control', true);
      }
      else if($(this).parent().find('li:first').children('a').attr('aria-control') == 'true'){
        newValue = false;
        $(this).parent().find('li:first').children('a').attr('aria-control', false);
      }

      if(newValue){
        $(this).find('option').each(function(){
          $(this).attr('selected', 'selected');
        });
        $(this).parent().find('li').each(function(){
          $(this).addClass('selected');
          var classOption = $(this).children('a').prop('class');
          $(this).children('a').addClass('todos-select dropdown-item selected');
          $(this).children('a').attr('aria-selected', true);
          $(this).children('a').attr('aria-control', true);
        });
      }
      else{
        $(this).find('option').each(function(){
          $(this).removeAttr('selected', 'selected');
        });
        $(this).parent().find('li').each(function(){
          $(this).removeClass('selected');
          $(this).children('a').removeClass('selected');
          $(this).children('a').attr('aria-selected', false);
          $(this).children('a').attr('aria-control', false);
        });
      }
    }else{

      $(this).parent().find('li').each(function(){
        if(selectedD == $(this).find('span:eq(1)').text()){
          controlDefinido = $(this).children('a').attr('aria-control');
          if(controlDefinido == 'false' || controlDefinido != 'true'){
            control = true;
            $(this).addClass('selected');
          }
          else{
           control = false;
           $(this).removeClass('selected');
          }
          $(this).children('a').attr('aria-control', control);
        }
      });
      $(this).parent().find('li:first').removeClass('selected').children('a').removeClass('selected');
      $(this).parent().find('li:first').children('a').attr('aria-control', false);
    }

    var todos = $(this).parent().find('li:first').prop('class');
    var itensSelecionados = (todos == 'selected') ? (($('.dropdown').find('.selected').length / 2) - 1) : ($('.dropdown').find('.selected').length / 2);
    var total = ($('.dropdown').find('.dropdown-item').length - 1);
    $('.filter-option-inner-inner').html("Selecionados " + itensSelecionados + " de " + total);

    if(itensSelecionados == total && todos != 'selected'){
      $(this).parent().find('li:first').addClass('selected');
      var addClassTodos = $(this).children('a').prop('class');
      $(this).parent().find('li:first').children('a').addClass('todos-select dropdown-item selected');
      // $(this).parent().find('li:first').children('a').attr('aria-selected', true);
      $(this).parent().find('li:first').children('a').attr('aria-control', true);
    }
});

// MASCARAS
$("#filtro-valor").maskMoney({
     // prefix: "R$",
     decimal: ",",
     thousands:  ''
 });

$('.graph').resize(function(){
  alert('entrou');
});

});

// Controle de Etapas
Highcharts.chart('controle_etapas', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Controle de Etapas - Vila tropical - 30/05/2018'
    },
    subtitle: {
        text: 'Clique nas colunas para detalhar as fases'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total de processos'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> processos<br/>'
    },

    "series": [
        {
            "name": "Fase",
            "colorByPoint": true,
            "data": [
                {
                    "name": "Cadastro",
                    "y": 15,
                    "drilldown": "coluna1"
                },
                {
                    "name": "Analise de Crédito",
                    "y": 25,
                    "drilldown": "coluna2"
                },
                {
                    "name": "Negociação e Contrato",
                    "y": 13,
                    "drilldown": "coluna3"
                },
                {
                    "name": "Repasse",
                    "y": 8,
                    "drilldown": "coluna4"
                },
                {
                    "name": "Registro",
                    "y": 21,
                    "drilldown": "coluna5"
                },
                {
                    "name": "Acerto de Custas",
                    "y": 14,
                    "drilldown": "coluna6"
                },
                {
                    "name": "Entrega de Chaves",
                    "y": 9,
                    "drilldown": "coluna7"
                }
            ]
        }
    ],
    "drilldown": {
        "series": [
            {
                "name": "Cadastro",
                "id": "coluna1",
                "data": [
                    [
                        "Aguardando Documentação",
                        15
                    ],
                    [
                        "Em Análise",
                        5
                    ],
                    [
                        "Documentação Reprovada",
                        2
                    ],
                    [
                        "Documentação Reprovada (Irregular)",
                        10
                    ],
                    [
                        "Documentação Aprovada",
                        8
                    ]
                ]
            },
            {
                "name": "Analise de Credito",
                "id": "coluna2",
                "data": [
                    [
                        "Enviado p/ IF",
                        3
                    ],
                    [
                        "Reprovado IF",
                        6
                    ],
                    [
                        "Aprovado IF",
                        9
                    ]
                ]
            },
            {
                "name": "Negociação e Contrato",
                "id": "coluna3",
                "data": [
                    [
                        "Condição Especial em Anï¿½lise",
                        2
                    ],
                    [
                        "Condição Especial Reprovada",
                        9
                    ],
                    [
                        "Condição Especial Aprovada",
                        7
                    ],
                    [
                        "Contrato Gerado",
                        4
                    ],
                    [
                        "Contrato Assinado Aprovado",
                        0
                    ],
                    [
                        "Formulários em Análise",
                        5
                    ],
                    [
                        "Assinaturas Aprovadas",
                        3
                    ]
                ]
            },
            {
                "name": "Repasse",
                "id": "coluna4",
                "data": [
                    [
                        "FGTS Ressarcido",
                        3
                    ],
                    [
                        "Internalizado",
                        6
                    ],
                    [
                        "Conforme",
                        0.36
                    ],
                    [
                        "Contrato Emitido",
                        9
                    ],
                    [
                        "Contrato Conferido",
                        1
                    ],
                    [
                        "Assinado pelo Cliente",
                        2
                    ]
                ]
            },
            {
                "name": "Registro",
                "id": "coluna5",
                "data": [
                    [
                        "Assinatura Construtora",
                        6
                    ],
                    [
                        "Liberado p/ Registro",
                        4
                    ],
                    [
                        "ITBI Protocolado",
                        0
                    ],
                    [
                        "Guia Emitida",
                        5
                    ],
                    [
                        "ITBI Quitado",
                        3
                    ],
                    [
                        "Entregue p/ Pré-calculo",
                        7
                    ],
                    [
                        "Pré-calculo á pagar",
                        5
                    ],
                    [
                        "Em Registro",
                        2
                    ],
                    [
                        "Registrado",
                        5
                    ],
                    [
                        "Recurso Liberado",
                        10
                    ]
                ]
            },
            {
                "name": "Acerto de Custas",
                "id": "coluna6",
                "data": [
                    [
                        "Acerto de Custas Gerado",
                        6
                    ],
                    [
                        "Acerto de Custas Realizado",
                        2
                    ],
                    [
                        "Acerto de Custas Reprovado",
                        4
                    ],
                    [
                        "Acerto de Custas Aprovado",
                        1
                    ]
                ]
            },
            {
                "name": "Entrega de Chaves",
                "id": "coluna7",
                "data": [
                    [
                        "Liberada Entrega de Chaves",
                        6
                    ],
                    [
                        "Acerto de Custas Realizado",
                        2
                    ],
                    [
                        "Acerto de Custas Reprovado",
                        4
                    ],
                    [
                        "Acerto de Custas Aprovado",
                        1
                    ]
                ]
            }
        ]
    }
});

// // Velocimetro



var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

    title: null,

    pane: {
        center: ['50%', '50%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    tooltip: {
        enabled: false
    },


    // the value axis
    yAxis: {
        stops: [
            [0.1, '#55BF3B'], // green
            [0.5, '#DDDF0D'], // yellow
            [0.9, '#DF5353'] // red
        ],
        lineWidth: 0,
        minorTickInterval: null,
        tickAmount: 2,
        title: {
            y: 0
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
};
// Velocidade de vendas
// The speed gauge
Highcharts.chart('container-speed', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },

    title: {
        text: ''
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: 'vendas/mês'
        },
        plotBands: [{
            from: 0,
            to: 120,
            color: '#55BF3B' // green
        }, {
            from: 120,
            to: 160,
            color: '#DDDF0D' // yellow
        }, {
            from: 160,
            to: 200,
            color: '#DF5353' // red
        }]
    },

    series: [{
        name: 'Vendas',
        data: [80],
        tooltip: {
            valueSuffix: ' vendas/mês'
        }
    }]

},
// Add some life
function (chart) {
    if (!chart.renderer.forExport) {
        setInterval(function () {
            var point = chart.series[0].points[0],
                newVal,
                inc = Math.round((Math.random() - 0.5) * 20);

            // newVal = point.y + inc;
            // if (newVal < 0 || newVal > 200) {
            //     newVal = point.y - inc;
            // }
            //
            // point.update(newVal);

        }, 3000);
    }
});
// Vendas Empreendimento


Highcharts.chart('vendas-empreendimento', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Vendas no mês por empreendimento'
    },

    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Poppins, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total de Vendas'
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
    series: {
        borderWidth: 0,
        dataLabels: {
            enabled: true,
            format: '{point.y}'
            }
        }
    },
    tooltip: {
        pointFormat: 'Qtd vendas: <b>{point.y:.1f}</b>'
    },
    "series": [
    {
        "name": "Fase",
        "data": [
            {
                "name": "Jan",
                "y": 61
            },
            {
                "name": "Fev",
                "y": 82
            },
            {
                "name": "Mar",
                "y": 114
            },
            {
                "name": "Abr",
                "y": 38
            },
            {
                "name": "Mai",
                "y": 65
            },
            {
                "name": "Jul",
                "y": 125
            },
            {
                "name": "Ago",
                "y": 75
            },
            {
                "name": "Set",
                "y": 110
            },
            {
                "name": "Out",
                "y": 500
            },
            {
                "name": "Nov",
                "y": 98
            },
            {
                "name": "Dez",
                "y": 256
            }
        ]
    }
]

});
// Distribuiï¿½ï¿½o unidade

// Build the chart
Highcharts.chart('distribuicao-unidade', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Distribuição de unidades no ano'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Valores',
        colorByPoint: true,
        data: [{
            name: 'Vendas',
            y: 66.1,
            sliced: true,
            selected: true
        }, {
            name: 'Instrumento de reserva',
            y: 12.7
        }, {
            name: 'Permutas',
            y: 11.7
        }, {
            name: 'Distratos',
            y: 4.5
        }, {
            name: 'Estoque',
            y: 5.0
        }]
    }]
});
// Crescimento mensal
Highcharts.chart('vaiaricao-crescimento', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Números de variação de crescimento'
    },
    xAxis: {
        categories: ['Jan', 'Fev', 'Marc', 'Abr', 'Jun','Jul','Ago','Set','Out','Nov','Dez']
    },
    yAxis: {
        title: {
            text: 'Total de Vendas'
        }
    },
    credits: {
        enabled: false
    },
    plotOptions: {
    series: {
        borderWidth: 0,
        dataLabels: {
            enabled: true,
            format: '{point.y}'
            }
        }
    },
    "series": [
    {
        "name": "Fase",
        "data": [
            {
                "y": 15
            },
            {
                "y": -10
            },
            {
                "y": 13
            },
            {
                "y": 8
            },
            {
                "y": 21
            },
            {
                "y": 14
            },
            {
                "y": 9
            },
            {
                "y": 10
            },
            {
                "y": 19
            },
            {
                "y": 11
            },
            {
                "y": 12
            }
        ]
    }
],
});
// Funil de vendas
Highcharts.chart('funil-vendas', {
    chart: {
        type: 'funnel'
    },
    title: {
        text: 'Dados do funil de vendas'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                softConnector: true
            },
            center: ['40%', '50%'],
            neckWidth: '30%',
            neckHeight: '25%',
            width: '80%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Valor',
        data: [
            ['Expetativa de vendas', 15654],
            ['Contratos', 4064],
            ['Repasse', 1987],
            ['Registro', 976]
        ]
    }]
});
