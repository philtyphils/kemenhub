


<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <h2 class="title"></h2>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">TUKS</h4>
                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah Total TUKS semua Provinsi</p>
                    </div>
                    <div id="container-pie"></div>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">TERSUS </h4>
                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah Total TERSUS semua Provinsi</p>
                    </div>
                    <div id="container-pie2"></div>  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">TERSUS & TUKS</h4>
                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah Per / Provinsi</p>
                    </div>
                    <div id="container-bar"></div>  
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	Highcharts.setOptions({
		colors: ['#A3A0FB', '#43425D']
	});
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
	                $('.highcharts-legend-item').last().append('<br/><div style="margin-left:2rem;"><hr/><span style="float:left;font-weight: bold;padding-bottom:2px;">Total</span><span style="float:left;color:#9A9A9A;font-weight: 700;"> ' + Total + '</span> </div>')
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
	        itemMarginTop: 5,
	        itemMarginBottom: 5,
	        
	    },
	    series: [{
	        name: 'Status',
	        colorByPoint: true,
	        innerSize: '50%',
	        data: <?php echo $tuks; ?>
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

	Highcharts.setOptions({
		colors: ['#6bd189', '#ffb700']
	});

	var Total = 0;
	var chart_tersus = new Highcharts.chart({
	    chart: {
	        renderTo: 'container-pie2',
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie',
	        events: {
	            load: function(event) {
	            $('.highcharts-legend-item').last().append('<br/><div style="margin-left:2rem;"><hr/><span style="float:left;font-weight: bold;padding-bottom:5px;">Total :</span><span style="float:left;color:#9A9A9A;font-weight: 700;"> ' + Total + '</span> </div>')
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
	        itemMarginTop: 5,
	        itemMarginBottom: 5,
	    },
	    series: [{
	        name: 'Status',
	        colorByPoint: true,
	        innerSize: '50%',
	        data: [{
	            name: 'AKTIF',
	            y: 50000000,
	        }, {
	            name: 'NON AKTIF',
	            y: 9000000
	        }]
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


	Highcharts.setOptions({
		colors: ['#43425D','#A3A0FB','#ffb700','#6bd189']
	});
	
	var chart_bar = new Highcharts.chart({
	    chart: {
	        renderTo: 'container-bar',
	        type: 'column',
	        scrollablePlotArea: {
	            minWidth: 1200,
	            scrollPositionX: 0,
	        }   
	    },
	  
	    xAxis: {
	        categories: [
	            'Aceh', 
	            'Jakarta',
	             'Sumatera', 
	             'Sulawesi', 
	             'Kalimantan',
	             'Jawa Timur',
	             'Papua',
	             'Kalimantan Timur',
	             'Jawa Barat'
	        ],
	        labels: {
	            style: {
	                fontSize: '16px',
	                color: '#43425D'
	            }
	        }   
	    },
	    yAxis: {
	        title: false
	    },
	    title: {
	        text: 'TERSUS & TUKS / Provinsi'
	    },
	    credits: {
	    enabled: false
	    },
	    tooltip: {
	        formatter: function () {
	        return '<b>' + this.x + '</b><br/>' +
	        '<b>'+ this.series.name +'</b>'+ ' : '+'<b>' + this.y + '</b>'+'<br/>' + 
	        'Total ' + this.series.userOptions.stack + ' : '+  this.point.stackTotal ;
	        }
	    },
	    plotOptions: {
	        series: {
	            point: {}
	        },
	        column: {
	            stacking: 'normal',
	            states: {
	                inactive: {
	                enabled: false
	                },
	                hover: {
	                color: '#4baee3',  
	                }
	            },
	            cursor: 'pointer',
	            showInLegend: true,
	        }
	    },
	   legend: {
	       enabled:true,
	    },
	    series: [{
	        name: 'Tuks Non Aktif',    
	        data: [5, 3, 4, 7, 2,10,10,5,10],
	        stack: 'Tuks',
	        // borderRadiusTopLeft: 10,
	        // borderRadiusTopRight: 10
	        },
	        {
	        name: 'Tuks Aktif',
	        data: [10,10,50,10,20,10,30,40,],
	        stack: 'Tuks'
	        },
	        {
	        name: 'Tersus Non Aktif',
	        data: [3, 4, 4, 2, 5,20,10,5,10],
	        stack: 'Tersus',
	        // borderRadiusTopLeft: 10,
	        // borderRadiusTopRight: 10
	        },
	        {
	        name: 'Tersus Aktif',
	        data: [30, 40, 40, 20, 51,20,10,52,10],
	        stack: 'Tersus'
	        }, 
	    ], 
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
	
});
</script>

<!-- comment bcos the value from controller couldnt get from js 
<script type="text/javascript" src="<?php echo $baseurl;?>assets/js/dashboard.js?v=<?php echo uniqid(); ?>"></script> 
-->