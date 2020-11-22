<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo $baseurl;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>assets/sass/main.css">
    <link href="<?php echo $baseurl;?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo $baseurl;?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?php echo $baseurl;?>assets/css/google-roboto-300-700.css" rel="stylesheet" />
    
</head>
<body>
    <input type="hidden" id="txtsite" value="<?php echo $siteurl;?>" />
<input type="hidden" id="txtbase" value="<?php echo $baseurl;?>" />
    <div class="wrapper">
            <div class="contents">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="title"></h2>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="header-master">
                                    <div class="header">
                                        <h4 class="title">KATEGORI</h4>
                                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah Total Kategori</p>
                                    </div>
                                    <span class="fa fa-cog"></span>
                                </div>
                                <div class="content">
                                    <div id="container-pie"></div>   
                                </div>
                                <div class="footer">
                                    <a href="<?php echo $baseurl;?>Kategori" class="btn btn-fill btn-primary">VIEW</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="card">
                                <div class="header-master">
                                    <div class="header">
                                        <h4 class="title">WILAYAH KERJA</h4>
                                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah KELAS OP KSOP & KUPP</p>
                                    </div>
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="content">
                                    <div id="container-bar-wilayahkerja"></div>   
                                </div>
                                <div class="footer">
                                    <a href="<?php echo $baseurl;?>Kelas" class="btn btn-fill btn-primary">VIEW</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="card">
                                <div class="header-master">
                                    <div class="header">
                                        <h4 class="title">BIDANG USAHA</h4>
                                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah Bidang Usaha</p>
                                    </div>
                                    <span class="fa fa-bar-chart"></span>
                                </div>
                                <div class="content">
                                    <div id="container-bar-bidangusaha"></div>   
                                </div>
                                <div class="footer">
                                    <a href="<?php echo $baseurl;?>bidang_usaha" class="btn btn-fill btn-primary">VIEW</a>
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="<?php echo $baseurl;?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo $baseurl;?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $baseurl;?>assets/js/light-bootstrap-dashboard.js"></script>
<script src="<?php echo $baseurl;?>assets/js/highchart/highcharts.js"></script>
<script src="<?php echo $baseurl;?>assets/js/highchart/highcharts-exporting.js"></script>
<script src="<?php echo $baseurl;?>assets/js/highchart/highcharts-export.js"></script>
<script src="<?php echo $baseurl;?>assets/js/highchart/highcharts-access.js"></script>
<script> 
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
        data: <?php echo $kategori_chart;?>
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
                enabled: false,
                padding:0
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
        data: <?php echo $wilayah_kerja;?>
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
        renderTo: 'container-pie3',
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
        data: <?php echo $bidang_usaha;?>
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
</script>

<!-- ===================================================== NEW BAR CHART COLUMN  WILAYAH KERJA ====================================================== -->

<script>
    const jsonWilayahKerjaName = [{
      "name": "KUPP KELAS IV MANOKWARI"
    }, {
      "name": "KUPP KELAS IV MANOKWARI"
    }, {
      "name": "KUPP KELAS IV MANOKWARI"
    }, {
      "name": "KUPP KELAS IV MANOKWARI"
    }, {
      "name": "KUPP KELAS IV MANOKWARI"
    }, {
      "name": "KUPP KELAS IV MANOKWARI"
    },{
      "name": "KUPP KELAS IV MANOKWARI"
    },{
      "name": "KUPP KELAS IV MANOKWARI"
    },{
      "name": "KUPP KELAS IV MANOKWARI"
    },];
    
    const jsonWilayahKerjaTotal = [{
    //   "name": "GALANGAN KAPAL",
      "jumlahWilayahKerja": "3400"
    }, {
    //   "name": "INDUSTRI BETON",
      "jumlahWilayahKerja": "210"
    }, {
    //   "name": "PERTAMBANGAN BATUBARA",
      "jumlahWilayahKerja": "100"
    }, {
    //   "name": "INDUSTRI PEMBUATAN KAPAL",
      "jumlahWilayahKerja": "4500"
    }, {
    //   "name": "PENYEDIA TENAGA LISTRIK",
      "jumlahWilayahKerja": "3400"
    }, {
    //   "name": "INDUSTRI SEMEN",
      "jumlahWilayahKerja": "3300"
    },{
    //   "name": "NIAGA MIGAS",
      "jumlahWilayahKerja": "33"
    },
    {
    //   "name": "NIAGA MIGAS",
      "jumlahWilayahKerja": "3300"
    },{
    //   "name": "NIAGA MIGAS",
      "jumlahWilayahKerja": "33"
    },];
    
    const categoriesKelas =jsonWilayahKerjaName.map(o => o.name);
    
    let seriesKelas = jsonWilayahKerjaTotal.map((o, i) => ({
      name: o.name,
      stacking: 'normal',
      data: [{
          x: i,
        y: Number(o.jumlahWilayahKerja)
      }]
    }));
    
    var chart_bar = new Highcharts.chart({
        chart: {
            renderTo: 'container-bar-wilayahkerja',
            type: 'column',
            
        },
        xAxis: {
        categories: categoriesKelas,
            labels: {
            style: {
            fontSize: '12px',
            color: '#43425D'
            }
            }, 
            title: {
                text: null
            },
            min: 0,
            max:5,
            scrollbar: {
            enabled: true
            },
            tickLength: 0,   
        },
        series:seriesKelas,
    
        yAxis: {
            min: 0,
            title: false, 
        },
        title: {
            text: ''
        },
        credits: {
        enabled: false
        },
        tooltip: {
            formatter: function () {
            return '<b>' + this.x + '</b><br/>' +
            '<b>'+ 'Total :' +'</b>'+' '+' ' +'<b>' + this.y + '</b>'+'<br/>'
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                states: {
                    hover: {
                    color: '#4baee3',  
                    }
                },
                cursor: 'pointer',
                showInLegend: false,
                borderWidth: 0.
            }
        },
    
        navigation: {
            buttonOptions: {
                verticalAlign: 'top',
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
</script>
<!-- =============================================================================================================================================== -->

<!-- ===================================================== NEW BAR CHART COLUMN BIDANG USAHA ====================================================== -->
<script>
const json1 = [{
  "name": "GALANGAN KAPAL"
}, {
  "name": "INDUSTRI BETON"
}, {
  "name": "PERTAMBANGAN BATUBARA"
}, {
  "name": "INDUSTRI PEMBUATAN KAPAL"
}, {
  "name": "PENYEDIA TENAGA LISTRIK"
}, {
  "name": "INDUSTRI SEMEN"
},{
  "name": "NIAGA MIGAS"
},{
  "name": "Industri Makanan"
},{
  "name": "Industri Minuman"
},];

const json2 = [{
//   "name": "GALANGAN KAPAL",
  "jumlahBidangKerja": "34000"
}, {
//   "name": "INDUSTRI BETON",
  "jumlahBidangKerja": "23000"
}, {
//   "name": "PERTAMBANGAN BATUBARA",
  "jumlahBidangKerja": "20000"
}, {
//   "name": "INDUSTRI PEMBUATAN KAPAL",
  "jumlahBidangKerja": "45000"
}, {
//   "name": "PENYEDIA TENAGA LISTRIK",
  "jumlahBidangKerja": "34000"
}, {
//   "name": "INDUSTRI SEMEN",
  "jumlahBidangKerja": "33000"
},{
//   "name": "NIAGA MIGAS",
  "jumlahBidangKerja": "33000"
},
{
//   "name": "NIAGA MIGAS",
  "jumlahBidangKerja": "33000"
},{
//   "name": "NIAGA MIGAS",
  "jumlahBidangKerja": "33000"
},];

const categoriesUsaha= json1.map(o => o.name);

let  seriesUsaha = json2.map((o, i) => ({
  name: o.name,
  stacking: 'normal',
  data: [{
  	x: i,
    y: Number(o.jumlahBidangKerja)
  }]
}));

var chart_bar = new Highcharts.chart({
    chart: {
        renderTo: 'container-bar-bidangusaha',
        type: 'column',
        
    },
    xAxis: {
    categories:categoriesUsaha,
        labels: {
        style: {
        fontSize: '12px',
        color: '#43425D'
        }
        }, 
        title: {
            text: null
        },
        min: 0,
        max:5,
        scrollbar: {
        enabled: true
        },
        tickLength: 0,   
    },
    series:seriesUsaha,

    yAxis: {
        min: 0,
        title: false, 
    },
    title: {
        text: ''
    },
    credits: {
    enabled: false
    },
    tooltip: {
        formatter: function () {
        return '<b>' + this.x + '</b><br/>' +
        '<b>'+ 'Total :' +'</b>'+' '+' ' +'<b>' + this.y + '</b>'+'<br/>'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            states: {
                hover: {
                color: '#4baee3',  
                }
            },
            cursor: 'pointer',
            showInLegend: false,
        }
    },

    navigation: {
        buttonOptions: {
            verticalAlign: 'top',
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
</script>

<!-- =========================================================================================================== -->
</html>