<?php
        $botao = 'AUTORIZAR ENTREGA DE CHAVES';
        $opcao = 'autorizar_chaves';
        
?>
      <script language="javascript">
        endLoading();
      </script>
      <form id="form_cadastro" name="form_cadastro" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" target="_parent">
        <div id="formulario">
          <div id="controles">
            <?php if($this->id){ ?>
            <input type="button" id="botao_04" name="botao_04" value="IMPRIMIR" onClick="window.open('relatorios/ficha_cadastro.php?id=<?php echo $this->id; ?>');" />
            <?php } ?>
          </div>
          <div id="titulo_tela">
            <?php echo $this->titulo_tela; ?>
          </div>

          <h2>Controle Etapas</i></h2>
          <div id="controle_etapas"></div>
          <script>
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
                                "name": "Analise de Credito",
                                "y": 25,
                                "drilldown": "coluna2"
                            },
                            {
                                "name": "Negociacao e Contrato",
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
                                    "Aguardando Documentacao",
                                    15
                                ],
                                [
                                    "Em Analise",
                                    5
                                ],
                                [
                                    "Documentacao Reprovada",
                                    2
                                ],
                                [
                                    "Documentacao Reprovada (Irregular)",
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
                            "name": "Negociacao e Contrato",
                            "id": "coluna3",
                            "data": [
                                [
                                    "Condição Especial em Analise",
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
                                    "Formulários em Analise",
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
                                    "Entregue p/ Pre-calculo",
                                    7
                                ],
                                [
                                    "Pre-calculo à pagar",
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
          </script>

          <h2>Média de Atraso</i></h2>
          <div id="controle_tempo"></div>
          <script>
            Highcharts.chart('controle_tempo', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Média de Atrasos - Vila Tropical'
                },
                subtitle: {
                  text: 'Processo Padrão: <b>86 dias</b> | Média de Atraso: <b>8 dias</b>'
                },
                xAxis: {
                    categories: ['Documentação em Análise - <b>03/03/2018</b>',
                                 'Documentação Aprovada - <b>06/03/2018</b>',
                                 'Aprovado pela Instituição Financeira - <b>10/03/2018</b>',
                                 'Contrato Gerado - <b>17/03/2018</b>',
                                 'Assinatura Contrato em Análise - <b>18/03/2018</b>',
                                 'Assinaturas Formulários em Análise - <b>20/03/2018</b>',
                                 'Assinaturas Aprovadas - <b>24/03/2018</b>',
                                 'FGTS Ressarcido - <b>31/03/2018</b>',
                                 'Internalizado - <b>06/04/2018</b>',
                                 'Conforme CEHOP - <b>11/04/2018</b>',
                                 'Contrato Final Emitido - <b>16/04/2018</b>',
                                 'Liberado para Registro - <b>21/04/2018</b>',
                                 'ITBI Protocolado - <b>25/04/2018</b>',
                                 'Guia Emitida à Pagar - <b>30/04/2018</b>',
                                 'ITBI Quitado - <b>03/05/2018</b>',
                                 'Entregue para Pré-calculo - <b>04/05/2018</b>',
                                 'Pré-calculo à Pagar - <b>09/05/2018</b>',
                                 'Em Registro - <b>11/05/2018</b>',
                                 'Registrado - <b>26/05/2018</b>',
                                 'Recurso Liberado - <b>03/06/2018</b>']
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Dias'
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                },
                legend: {
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal',
//                        dataLabels: {
//                            enabled: true,
//                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
//                        }
                    }
                },
                colors: ['#ff7a7a','#7a9aff','#a3ff7a'],
                series: [{
                    name: 'Atrasado',
                    data: [2, 3, 4, 0, 0, 3, 3, 5, 0, 0, 0, 1, 1, 0, 0, 2, 0, 0, 3, 0]
                }, {
                    name: 'Previsto',
                    data: [1, 1, 3, 0, 0, 1, 4, 1, 0, 2, 0, 3, 4, 0, 0, 3, 0, 4, 5, 0]
                }, {
                    name: 'Adiantado/Em dia',
                    data: [0, 0, 0, 1, 2, 0, 0, 0, 5, 3, 5, 0, 0, 3, 1, 0, 2, 11, 0, 0]
                }]
            });
          </script>
          
        </div>
      </form>
