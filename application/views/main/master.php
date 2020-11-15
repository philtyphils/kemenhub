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
        <div class="sidebar">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        <img src="<?php echo $baseurl;?>assets/img/logo.png" alt="logo" style="width: 100%;">
                    </a>
                </div>
    
                <ul class="nav">
                    <li class="<?php echo ($menu == 'Dashboard')?'active':'';?>" id="">
                        <a href="<?php echo $baseurl;?>Dashboard">
                            <i class="fa fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="<?php echo ($menu == 'Data')?'active':'';?>" id="">
                        <a href="<?php echo $baseurl;?>Data">
                            <i class="fa fa-folder-open"></i>
                            <p>Data</p>
                        </a>
                    </li>
                    <li class="<?php echo ($menu == 'Master')?'active':'';?>" id="">
                        <a href="<?php echo $baseurl;?>Master">
                            <i class="fa fa-tags"></i>
                            <p>Master</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="">
                            <i class="fa fa-cogs"></i>
                            <p>Setting</p>
                        </a>
                    </li>
                </ul>
            </div>          
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default nabvar-fixed">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse">
                       
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    <span class="notification">4</span>
                                      <p class="hidden-md hidden-lg">
                                      Message
                                      <b class="caret"></b>
                                      </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="masaberlaku.html">Notification 1</a></li>
                                    <li><a href="masaberlaku.html">Notification 2</a></li>
                                    <li><a href="masaberlaku.html">Notification 3</a></li>
                                    <li><a href="masaberlaku.html">Notification 4</a></li>
                                </ul>
                            </li>      
                            <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <p>
                                        Administrator
                                        <b class="caret"></b>
                                        </p>
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">Logout</a></li>
                                  </ul>
                            </li>    
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>

                </div>
            </nav>

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

                        <div class="col-md-5">
                            <div class="card">
                                <div class="header-master">
                                    <div class="header">
                                        <h4 class="title">WILAYAH KERJA</h4>
                                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah KELAS KUPP KSOP & OP</p>
                                    </div>
                                    <span class="fa fa-bar-chart"></span>
                                </div>
                                <div class="content">
                                    <div id="container-pie2"></div>   
                                </div>
                                <div class="footer">
                                    <a href="<?php echo $baseurl;?>Kelas" class="btn btn-fill btn-primary">VIEW</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card">
                                <div class="header-master">
                                    <div class="header">
                                        <h4 class="title">BIDANG USAHA</h4>
                                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah Bidang Usaha</p>
                                    </div>
                                    <span class="fa fa-bar-chart"></span>
                                </div>
                                <div class="content">
                                    <div id="container-pie3"></div>   
                                </div>
                                <div class="footer">
                                    <a href="bidangusaha.html" class="btn btn-fill btn-primary">VIEW</a>
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
        data: [{
            name: 'GALANGAN KAPAL',
            y: 20,
        }, {
            name: 'INDUSTRI BETON',
            y: 10
        },{
            name: 'PEMANFAATAN HASIL HUTAN KAYU',
            y: 8
        },
        {
            name: 'PERTAMBANGAN BATUBARA',
            y: 12
        },
        {
            name: 'INDUSTRI PEMBUATAN KAPAL',
            y: 11
        },
        {
            name: 'PENYEDIA TENAGA LISTRIK',
            y: 50
        },
        {
            name: 'INDUSTRI SEMEN',
            y: 52
        },
        {
            name: 'NIAGA MIGAS',
            y: 50
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
</script>
</html>