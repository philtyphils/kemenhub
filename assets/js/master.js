var siteurl = $("#txtsite").val();
var baseurl = $("#txtbase").val();

$(document).ready(function(){    


    var Total = 0;
    var chart_tusk = new Highcharts.chart({
        chart: {
            renderTo: 'container-pie',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            events: {
                load: function(event) {
                $('.highcharts-legend-item').last().append('<br/><div style="margin-left:2rem;"><hr/><span style="float:left;font-weight: bold;padding-bottom:2px;">Total:</span><span style="float:left;color:#9A9A9A;font-weight: 700;"> ' + Total + '</span> </div>')
                }
            }  
        },
        title: {
            text: ''
        },
        credits: {
        enabled: false
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
       legend: {
            useHTML: true,
            labelFormatter: function() {
                Total += this.y;
                return '<div style="width:auto"><span style="float:left">'+ this.name +' :'+'</span><span style="float:left;color:#9A9A9A;font-weight: 400;">' + this.y + '</span></div>';
            },
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x:-10,
            itemMarginTop: 2,
            itemMarginBottom: 2,
            
        },
        series: [{
            name: 'Jumlah',
            colorByPoint: true,
            innerSize: '50%',
            data: [{
                name: 'PERTAMBANGAN',
                y: 5000,
            }, {
                name: 'INDUSTRI',
                y: 105
            },{
                name: 'ENERGI',
                y: 1050
            },
            {
                name: 'DOK DAN GALANGAN',
                y: 999
            },
            {
                name: 'PERTANIAN',
                y: 10500
            },
            {
                name: 'KEHUTANAN',
                y: 10500
            },
            {
                name: 'PARIWISATA',
                y: 1050
            },
            {
                name: 'PERIKANAN',
                y: 555
            },
            ]
        }],
        navigation: {
            buttonOptions: {
                verticalAlign: 'top',
                align: 'left',
            }
        },
        exporting: {
            buttons: {
                contextButton: {
                    menuItems: ['downloadXLS','viewData']
                }
            }
        } 
    });


    var Total = 0;
    var chart_tusk = new Highcharts.chart({
        chart: {
            renderTo: 'container-pie2',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            events: {
                load: function(event) {
                $('.highcharts-legend-item').last().append('<br/><div style="margin-left:2rem;"><hr/><span style="float:left;font-weight: bold;padding-bottom:2px;">Total:</span><span style="float:left;color:#9A9A9A;font-weight: 700;"> ' + Total + '</span> </div>')
                }
            }  
        },
        title: {
            text: ''
        },
        credits: {
        enabled: false
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
       legend: {
            useHTML: true,
            labelFormatter: function() {
                Total += this.y;
                return '<div style="width:auto"><span style="float:left">'+ this.name +' :'+'</span><span style="float:left;color:#9A9A9A;font-weight: 400;">' + this.y + '</span></div>';
            },
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x:-10,
            itemMarginTop: 2,
            itemMarginBottom: 2,
            
        },
        series: [{
            name: 'Jumlah',
            colorByPoint: true,
            innerSize: '50%',
            data: [{
                name: 'KUPP KELAS II TOBELO',
                y: 5000,
            }, {
                name: 'KUPP KELAS II SANANA',
                y: 105
            },{
                name: 'KUPP KELAS II LABUHA/BABANG',
                y: 1050
            },
            {
                name: 'KUPP KELAS III LAIWUI',
                y: 999
            },
            {
                name: 'KUPP KELAS III BULI',
                y: 10500
            },
            {
                name: 'KUPP KELAS III WEDA',
                y: 10500
            },
            {
                name: 'KSOP KELAS II TERNATE',
                y: 1050
            },
            {
                name: 'KUPP KELAS III DARUBA',
                y: 555
            },
            ]
        }],
        navigation: {
            buttonOptions: {
                verticalAlign: 'top',
                align: 'left',
            }
        },
        exporting: {
            buttons: {
                contextButton: {
                    menuItems: ['downloadXLS','viewData']
                }
            }
        } 
    });

});